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
<center><br><br>
<span class="gizle">
<?php
@setlocale(LC_ALL, 'turkish');
$makale_tarih = strftime("%d %B %Y", time());
$makale_saat = strftime("%H:%M:%S ", time());
$makale_gun = strftime("%A ", time());
$makale_baslik = $_POST["konu"];
$makale_icerik = $_POST["metin"];
?>
</span>
<?php

@include"yonetim/hbv/postcode_kontrol.php";
if ($makale_baslik == "")
echo "<br><br><center><b>Konu Ba�l���'n� yazmad���n�z� alg�lad� !! Yoksa alg� yap�lar�m�z m� farkl� ?</b></center>";
elseif ($makale_icerik == "")
echo "<br><br><center><b>Konu ��eri�i'ni yazmad���n�z� alg�lad� !! Yoksa alg� yap�lar�m�z m� farkl� ?</b></center>";

else
$SQL = "INSERT INTO makale (makale_tarih,makale_saat,makale_gun,makale_baslik,makale_icerik) VALUES ('$makale_tarih','$makale_saat','$makale_gun','$makale_baslik','$makale_icerik')"; //'$_POST[konu]','$_POST[metin]'
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
echo "<br>Sorgulama i�lemi ger�ekle�tirilemedi. L�tfen Tekrar Deneyiniz.</br></br>";
?>
<a href="javascript: history.go(-1)" class="red">Geri D�n</a>
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
E�er hala y�nlenmediyseniz <a href="?shf=doc&amp;islem=oku" class="red">t�klay�n�z</a><br />

<meta http-equiv="refresh" content="3;URL=?shf=doc&amp;islem=oku"></center>
<?
}else{
// giri� yap�lmam�� ise ;
@include ("../../hata.php");
}
?>