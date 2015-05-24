<?
//giriş kontrol
@include ("giris_kontrol.php");
// oturumu baslatalım
@session_start();
// giriş bilgilerini alalım.
$giris=$_SESSION["giris"];
$ad=$_SESSION["user_kadi"];
// giriş kontrolü yapalım
// giriş yapılmış ise $giris true olmalı
if($giris){
// giriş yapılmış hoşgeldin..
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
echo "<br><br><center><b>isim/Nick yazmadığınızı algıladı !! Yoksa algı yapılarımız mı farklı ?</b></center>";
elseif ($network_link == "")
echo "<br><br><center><b>Link'i yazmadığınızı algıladı !! Yoksa algı yapılarımız mı farklı ?</b></center>";
elseif ($data == "<meta")
{
?>
<br><br><center><b><h2><span class="red">Geri Zekalı !!!</span></h2></b></center>
<?
}
elseif ($data2 == "<meta")
{
?>
<br><br><center><b><h2><span class="red">Geri Zekalı !!!</span></h2></b></center>
<?
}
else

$SQL = "UPDATE network SET network_isim = '$network_isim', network_icerik = '$network_icerik', network_link = '$network_link' WHERE network_id = '{$_POST[id]}'";
/*
* sorgu cümlemiz hazır. artık mysql ile bağlantı kuralım
*/
{
include ("yonetim/db.php");
}
/*
* sql cümlesini mysql e iletiyoruz ve cvp istiyoruz
*/
$sorgu= @mysql_query($SQL,$baglanti);
if (!$sorgu)
{
echo "sorgu yapılamadı";
exit();
}
mysql_close($baglanti);
//sorgu bitti
?><br />
kayıt veritabanından düzeltilmiştir...<br /><br />
Lütfen Bekleyiniz<br />
<img src="resim/lodos/bekleyin_ms.gif" width="32" height="32" border="0" /><br />
Yönlendiriliyorsunuz<br />
<br />
<meta http-equiv="refresh" content="3;URL=?shf=network&amp;islem=oku">

Eğer hala yönlenmediyseniz <a href="?shf=network&amp;islem=oku" class="red">tıklayınız</a>
</center>
<?
}else{
// giriş yapılmamış ise ;
@include ("../../hata.php");
}
?>