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
<span class="gizle">
<?php
@setlocale(LC_ALL, 'turkish');
$editsaat = strftime("%H:%M:%S ", time());	
$edittarih = strftime("%d %B %Y, %A ", time());
$network_isim = $_POST["konu"];
$network_icerik = $_POST["metin"];
$network_link = $_POST["link"];
$network_id = $_POST["id"];
?>
</span>
<?
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

$SQL = "UPDATE network SET network_isim = '$network_isim', network_icerik = '$network_icerik', network_link = '$network_link' WHERE network_id = '{$_POST[id]}'";
/*
* sorgu c�mlemiz haz�r. art�k mysql ile ba�lant� kural�m
*/
{
include ("yonetim/db.php");
}
/*
* sql c�mlesini mysql e iletiyoruz ve cvp istiyoruz
*/
$sorgu= @mysql_query($SQL,$baglanti);
if (!$sorgu)
{
echo "sorgu yap�lamad�";
exit();
}
mysql_close($baglanti);
//sorgu bitti
?><br />
kay�t veritaban�ndan d�zeltilmi�tir...<br /><br />
L�tfen Bekleyiniz<br />
<img src="resim/lodos/bekleyin_ms.gif" width="32" height="32" border="0" /><br />
Y�nlendiriliyorsunuz<br />
<br />
<meta http-equiv="refresh" content="3;URL=?shf=network&amp;islem=oku">

E�er hala y�nlenmediyseniz <a href="?shf=network&amp;islem=oku" class="red">t�klay�n�z</a>
</center>
<?
}else{
// giri� yap�lmam�� ise ;
@include ("../../hata.php");
}
?>