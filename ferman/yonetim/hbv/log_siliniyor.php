<?
//giri� kontrol
@include ("giris_kontrol.php");
// oturumu baslatal�m
@session_start();
// giri� bilgilerini alal�m.
$giris=$_SESSION["giris"];
$ad=$_SESSION["user_kadi"];
// giri� kontrol� yapal�m
// giri� yap�lm�� ise $giris true olmal�
if($giris){
// giri� yap�lm�� ho�geldin..
?>
<?
@include"yonetim/hbv/securitycode_kontrol.php";
$SQL = "DELETE FROM log WHERE log_id = '$id'";
# sorgu c�mlemiz haz�r. art�k mysql ile ba�lant� kural�m
{
require ("yonetim/db.php");
}
# sql c�mlesini mysql e iletiyoruz ve cvp istiyoruz
$sorgu= @mysql_query($SQL,$baglanti);
if (!$sorgu)
{
echo "sorgu yap�lamad�";
exit();
}
mysql_close($baglanti);
//sorgu bitti
?>
<br />
Tutulan Log Veritaban�ndan Silinmi�tir...<br />
<br />
L�tfen Bekleyiniz<br />
<img src="resim/lodos/bekleyin_ms.gif" width="32" height="32" border="0" /><br />
Y�nlendiriliyorsunuz<br />
<br />
E�er hala y�nlenmediyseniz <a href="?shf=ayarlar&amp;islem=log_oku" class="red">t�klay�n�z</a><br />

<meta http-equiv="refresh" content="3;URL=?shf=ayarlar&amp;islem=log_oku">
<?
//mysql ba�lant�s�n�n kapat�lmas�
mysql_close ($baglanti);
?>
<?
}else{
// giri� yap�lmam�� ise ;
@include ("../../hata.php");
}
?>