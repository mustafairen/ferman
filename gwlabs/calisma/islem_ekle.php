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
$calisma_tarih = strftime("%d %B %Y", time());
$calisma_saat = strftime("%H:%M:%S ", time());
$calisma_gun = strftime("%A ", time());
$calisma_baslik = $_POST["konu"];
$calisma_icerik = $_POST["metin"];
?>
</span>
<?php
@include"yonetim/hbv/postcode_kontrol.php";

if ($calisma_baslik == "")
echo "<br><br><center><b>Konu Ba�l���'n� yazmad���n�z� alg�lad� !! Yoksa alg� yap�lar�m�z m� farkl� ?</b></center>";
elseif ($calisma_icerik == "")
echo "<br><br><center><b>Konu ��eri�i'ni yazmad���n�z� alg�lad� !! Yoksa alg� yap�lar�m�z m� farkl� ?</b></center>";

else
$SQL = "INSERT INTO calisma (calisma_tarih,calisma_saat,calisma_gun,calisma_baslik,calisma_icerik) VALUES (\"$calisma_tarih\",\"$calisma_saat\",\"$calisma_gun\",\"$calisma_baslik\",\"$calisma_icerik\")"; //'$_POST[konu]','$_POST[metin]'
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
E�er hala y�nlenmediyseniz <a href="?shf=work&amp;islem=oku" class="red">t�klay�n�z</a><br />

<meta http-equiv="refresh" content="3;URL=?shf=work&amp;islem=oku">
</center>
<?
}else{
// giri� yap�lmam�� ise ;
@include ("../../hata.php");
}
?>