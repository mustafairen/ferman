<?
                                        ####################################
                                        # Ferman                           #
                                        # Yönetim Sayfası                  #
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
//boş mu ? dolu mu ?
(
empty($gecici) || empty($yeni) || empty($yeni2) || empty($securitycode)
)
{
print '<script>alert(" Formu Eksik Doldurdunuz ! ");history.back(-1);</script>';
}
// şifreler uyuşuyor mu ?
elseif ( $yeni != $yeni2 )

print '<script>alert(" Şifreler Uyuşmuyor ! ");history.back();</script>';

else
{
// geçici şifre doğru mu ?
$gecici_sifre = md5($_POST[gecici]);

$gecici_sifre_sql =  @mysql_query("SELECT user_id FROM user WHERE user_lost_sifre = '".$gecici_sifre."'");
if( mysql_num_rows($gecici_sifre_sql) != 1 )
{

    print '<script>alert("Geçici Şifrenizi Yanlış Girdiniz!");history.back();</script>';
  
}
else
{
// yeni geçici şifre için Rastgele karakter üret
 $karakter = 6;
 $baslangic = rand(1,24);
 $rastgelekod = md5(rand(0,500));
 $rastgele = strtoupper(substr($rastgelekod,$baslangic,$karakter));
   
   
$new_user_lost_sifre = $rastgele;
//yeni şifreyi md5'le
$yeni_sifre = md5($_POST[yeni]);
// Yeni şifreler için sorgu hazırla
$normal_sql = @mysql_query("SELECT * FROM `user` where user_lost_sifre = '$gecici_sifre' ORDER BY `user_id` DESC");
while($oku = mysql_fetch_array($normal_sql))
{
$user_id_sql = $oku["user_id"];
$SQL = "UPDATE user SET user_sifre ='$yeni_sifre', user_lost_sifre = '$new_user_lost_sifre' WHERE user_id = '$user_id_sql'";
// şifreyi sorgula
$sorgu= @mysql_query($SQL,$baglanti);
if (!$sorgu)
{
?>
<br /><br />
<br />
İsteğiniz Gerçekleştirilemedi...<br /><br />
Lütfen Bekleyiniz<br />
<img src="resim/lodos/bekleyin_ms2.gif" width="24" height="24" border="0" /><br />
Yönlendiriliyorsunuz<br />
<br />
<meta http-equiv="refresh" content="3;URL=login.html">

Eğer hala yönlenmediyseniz <a href="login.html" class="red">tıklayınız</a>
<?
// sorgu olmadı çık artık
exit();
}
?>
<br /><br />
<br />
kayıt veritabanından düzeltilmiştir...<br /><br />
Lütfen Bekleyiniz<br />
<img src="resim/lodos/bekleyin_ms2.gif" width="24" height="24" border="0" /><br />
Yönlendiriliyorsunuz<br />
<br />
<meta http-equiv="refresh" content="3;URL=login.php">

Eğer hala yönlenmediyseniz <a href="login.php" class="red">tıklayınız</a>
<?
}
}
}
//işimiz bitti MySQL'i kapatalım artık
@mysql_close($baglanti);
//iyi yolculuklar...
?>
</center>
</body>
</html>
