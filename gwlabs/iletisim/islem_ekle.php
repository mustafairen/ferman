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
<center><br><br>
<?php
$iletisim_mail = $_POST["mail"];
$iletisim_msn = $_POST["msn"];
$iletisim_icerik = $_POST["metin"];

@include"yonetim/hbv/postcode_kontrol.php";

$SQL = "INSERT INTO iletisim (iletisim_mail,iletisim_msn,iletisim_icerik) VALUES ('$iletisim_mail','$iletisim_msn','$iletisim_icerik')"; //'$_POST[konu]','$_POST[metin]'
/*
* sorgu c�mlemiz haz�r. art�k mysql ile ba�lant� kural�m
*/
{
require ("yonetim/db.php");
}
/*
* sql c�mlesini mysql e iletiyoruz ve cvp istiyoruz
*/
$sorgu= @mysql_query($SQL,$baglanti);
if (!$sorgu)
{
// T�h Hata Yapt�. De get haber ver hemen d�zeltsin hatas�n�...
?>
<br>Hata Olu�tu.<br>
L�tfen <a href="javascript: history.go(-1)" class="red">Tekrar Deneyiniz</a></br></br>
<?
exit();
}
mysql_close($baglanti);
?><br />
veritaban�na kay�t eklenmi�tir...<br />
<br />
L�tfen Bekleyiniz<br />
<img src="resim/lodos/bekleyin_ms.gif" width="32" height="32" border="0" /><br />
Y�nlendiriliyorsunuz<br />
<br />
E�er hala y�nlenmediyseniz <a href="?shf=iletisim&amp;islem=oku" class="red">t�klay�n�z</a><br />

<meta http-equiv="refresh" content="3;URL=?shf=iletisim&amp;islem=oku">
</center><?
}else{
// giri� yap�lmam�� ise ;
@include ("../../hata.php");
}
?>