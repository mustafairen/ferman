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
<center>
<br><br>
<span class="gizle">
<?php
@setlocale(LC_ALL, 'turkish');
$blog_tarih = strftime("%d %B %Y", time());
$blog_saat = strftime("%H:%M:%S", time());
$blog_gun = strftime("%A", time());
$blog_baslik = $_POST["konu"];
$blog_icerik = $_POST["metin"];
$postcode = $_POST["postcode"];
?>
</span>
<?php
@include"yonetim/hbv/postcode_kontrol.php";

if ($blog_baslik == "")
echo "<br><center><b>Konu Ba�l���'n� yazmad���n�z� alg�lad� !! 
<br>Yoksa alg� yap�lar�m�z m� farkl� ?</b></center>";
elseif ($blog_icerik == "")
echo "<br><center><b>Konu ��eri�i'ni yazmad���n�z� alg�lad� !! 
<br>Yoksa alg� yap�lar�m�z m� farkl� ?</b></center>";

else
$SQL = "INSERT INTO blog (blog_tarih,blog_saat,blog_gun,blog_baslik,blog_icerik) VALUES ('$blog_tarih','$blog_saat','$blog_gun','$blog_baslik','$blog_icerik')";
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
E�er hala y�nlenmediyseniz <a href="?shf=blog&amp;islem=oku" class="red">t�klay�n�z</a><br />

<meta http-equiv="refresh" content="3;URL=?shf=blog&amp;islem=oku">
</center>
<?
}else{
// giri� yap�lmam�� ise ;
@include ("../../hata.php");
}
?>
