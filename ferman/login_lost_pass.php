<?
                                        ####################################
                                        # Ferman                           #
                                        # Y�netim Sayfas�                  #
                                        # Web Master: m. iren | z. korucu  #
                                        ####################################
@session_start();
include "yonetim/db.php";
$gecici = $_POST["gecici"];
$yeni = $_POST["yeni"];
$yeni2 = $_POST["yeni2"];
$securitycode = $_POST["securitycode"];
@include"yonetim/hbv/securitycode_kontrol.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
<title>Ferman | Design-Turk</title>
<link rel="stylesheet" href="gw.css" type="text/css" media="screen" />
</head>

<body>
<center>
<?
if
//bo� mu ? dolu mu ?
(
empty($gecici) || empty($yeni) || empty($yeni2) || empty($securitycode)
)
{
print '<script>alert(" Formu Eksik Doldurdunuz ! ");history.back(-1);</script>';
}
// �ifreler uyu�uyor mu ?
elseif ( $yeni != $yeni2 )

print '<script>alert(" �ifreler Uyu�muyor ! ");history.back();</script>';

else
{
// ge�ici �ifre do�ru mu ?
$gecici_sifre = md5($_POST[gecici]);

$gecici_sifre_sql =  @mysql_query("SELECT user_id FROM user WHERE user_lost_sifre = '".$gecici_sifre."'");
if( mysql_num_rows($gecici_sifre_sql) != 1 )
{

    print '<script>alert("Ge�ici �ifrenizi Yanl�� Girdiniz!");history.back();</script>';
  
}
else
{
// yeni ge�ici �ifre i�in Rastgele karakter �ret
 $karakter = 6;
 $baslangic = rand(1,24);
 $rastgelekod = md5(rand(0,500));
 $rastgele = strtoupper(substr($rastgelekod,$baslangic,$karakter));
   
   
$new_user_lost_sifre = $rastgele;
//yeni �ifreyi md5'le
$yeni_sifre = md5($_POST[yeni]);
// Yeni �ifreler i�in sorgu haz�rla
$normal_sql = @mysql_query("SELECT * FROM `user` where user_lost_sifre = '$gecici_sifre' ORDER BY `user_id` DESC");
while($oku = mysql_fetch_array($normal_sql))
{
$user_id_sql = $oku["user_id"];
$SQL = "UPDATE user SET user_sifre ='$yeni_sifre', user_lost_sifre = '$new_user_lost_sifre' WHERE user_id = '$user_id_sql'";
// �ifreyi sorgula
$sorgu= @mysql_query($SQL,$baglanti);
if (!$sorgu)
{
?>
<br /><br />
<br />
�ste�iniz Ger�ekle�tirilemedi...<br /><br />
L�tfen Bekleyiniz<br />
<img src="resim/lodos/bekleyin_ms2.gif" width="24" height="24" border="0" /><br />
Y�nlendiriliyorsunuz<br />
<br />
<meta http-equiv="refresh" content="3;URL=login.html">

E�er hala y�nlenmediyseniz <a href="login.html" class="red">t�klay�n�z</a>
<?
// sorgu olmad� ��k art�k
exit();
}
?>
<br /><br />
<br />
kay�t veritaban�ndan d�zeltilmi�tir...<br /><br />
L�tfen Bekleyiniz<br />
<img src="resim/lodos/bekleyin_ms2.gif" width="24" height="24" border="0" /><br />
Y�nlendiriliyorsunuz<br />
<br />
<meta http-equiv="refresh" content="3;URL=login.php">

E�er hala y�nlenmediyseniz <a href="login.php" class="red">t�klay�n�z</a>
<?
}
}
}
//i�imiz bitti MySQL'i kapatal�m art�k
@mysql_close($baglanti);
//iyi yolculuklar...
?>
</center>
</body>
</html>
