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
$SQL = "INSERT INTO network (network_isim,network_link,network_icerik) VALUES ('$network_isim','$network_link','$network_icerik')";
/*
* sorgu cümlemiz hazır. artık mysql ile bağlantı kuralım
*/
{
require ("yonetim/db.php");
}
/*
* sql cümlesini mysql e iletiyoruz ve cvp istiyoruz
*/
$sorgu= @mysql_query($SQL,$baglanti);
if (!$sorgu)
{
echo "<br>Sorgulama işlemi gerçekleştirilemedi. Lütfen Tekrar Deneyiniz.</br></br>";
?>
<a href="javascript: history.go(-1)" class="red">Geri Dön</a>
<?
exit();
}
mysql_close($baglanti);
?><br />
veritabanına kayıt eklenmiştir...<br />
<br />
Lütfen Bekleyiniz<br />
<img src="resim/lodos/bekleyin_ms.gif" width="32" height="32" border="0" /><br />
Yönlendiriliyorsunuz<br />
<br />
Eğer hala yönlenmediyseniz <a href="?shf=network&amp;islem=oku" class="red">tıklayınız</a><br />

<meta http-equiv="refresh" content="3;URL=?shf=network&amp;islem=oku">
</center>
<?

}else{
// giriş yapılmamış ise ;
@include ("../../hata.php");
}
?>