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
<span class="gizle">
<?php
@setlocale(LC_ALL, 'turkish');
$network_tarih = strftime("%d %B %Y", time());
$network_saat = strftime("%H:%M:%S ", time());
$network_gun = strftime("%A ", time());
$network_isim = $_POST["konu"];
$network_link = $_POST["link"];
$network_icerik = $_POST["metin"];
$postcode = $_POST["postcode"];
$network_icerik_test = $_POST["metin"];
$data =substr($network_icerik_test,0,5);

$network_link_test = $_POST["link"];
$data2 =substr($network_link_test,0,5);
?>
</span>
<?php
@include"yonetim/hbv/postcode_kontrol.php";
if ($network_isim == "")
echo "<br><br><center><b>isim/Nick yazmad���n�z� alg�lad� !! Yoksa alg� yap�lar�m�z m� farkl� ?</b></center>";
elseif ($network_link == "")
echo "<br><br><center><b>Link'i yazmad���n�z� alg�lad� !! Yoksa alg� yap�lar�m�z m� farkl� ?</b></center>";
elseif ($data == "<meta")
{
?>
<br><br><center><b><h2><span class="red">Geri Zekal� !!!</span></h2></b></center>
<?
}
elseif ($data2 == "<meta")
{
?>
<br><br><center><b><h2><span class="red">Geri Zekal� !!!</span></h2></b></center>
<?
}
else
$SQL = "INSERT INTO network (network_isim,network_link,network_icerik) VALUES ('$network_isim','$network_link','$network_icerik')";
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
E�er hala y�nlenmediyseniz <a href="?shf=network&amp;islem=oku" class="red">t�klay�n�z</a><br />

<meta http-equiv="refresh" content="3;URL=?shf=network&amp;islem=oku">
</center>
<?

}else{
// giri� yap�lmam�� ise ;
@include ("../../hata.php");
}
?>