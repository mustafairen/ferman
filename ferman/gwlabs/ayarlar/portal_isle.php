<?
//giri� kontrol
@include ("giris_kontrol.php");
// oturumu baslatal�m
@session_start();
// giri� bilgilerini alal�m.
$giris=$_SESSION["giris"];
$ad=$_SESSION["cwuser_kadi"];
// giri� kontrol� yapal�m
// giri� yap�lm�� ise $giris true olmal�
if($giris){
// giri� yap�lm�� ho�geldin..
?>
<?
$portal_avatar=trim($_POST[portal_avatar]);
$portal_nick=trim($_POST[portal_nick]);

if (
empty($portal_avatar) || empty($portal_nick) 
)
{
print '<script>alert(" Formu Eksik Doldurdunuz ! ");history.back(-1);</script>';
}
@include ("yonetim/db.php");
@include"yonetim/hbv/postcode_kontrol.php";

$portal_kontrol = mysql_query("select portal_id from portal");


if( mysql_num_rows($portal_kontrol) >= 1 )
{
$SQL = "UPDATE portal SET portal_avatar = '$portal_avatar' , portal_nick='$portal_nick'";
  $sorgu= @mysql_query($SQL,$baglanti);
if (!$sorgu)
{
echo "sorgu yap�lamad�";
exit();
}
}else{

$sqlekle = "insert into portal (portal_avatar,portal_nick) values('$portal_avatar' , '$portal_nick')";
  $sorgu_ekle= @mysql_query($sqlekle,$baglanti);
if (!$sorgu_ekle)
{
echo "sorgu yap�lamad�";
exit();
}

}
mysql_close($baglanti);
//sorgu bitti
?>
<img src="resim/lodos/tamam.jpg" width="25" height="25" border="0" /><br />
kay�t veritaban�ndan d�zeltilmi�tir...<br /><br />
L�tfen Bekleyiniz<br />
<img src="resim/lodos/bekleyin_ms.gif" width="32" height="32" border="0" /><br />
Y�nlendiriliyorsunuz<br />
<br />
<meta http-equiv="refresh" content="2;URL=?shf=ayarlar&amp;islem=oku">

E�er hala y�nlenmediyseniz <a href="?shf=ayarlar&amp;islem=oku" class="red">t�klay�n�z</a>

<?
}else{
// giri� yap�lmam�� ise ;
@include ("../../hata.php");
}
?>