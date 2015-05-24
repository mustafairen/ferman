<?
//giriş kontrol
@include ("giris_kontrol.php");
// oturumu baslatalım
@session_start();
// giriş bilgilerini alalım.
$giris=$_SESSION["giris"];
$ad=$_SESSION["cwuser_kadi"];
// giriş kontrolü yapalım
// giriş yapılmış ise $giris true olmalı
if($giris){
// giriş yapılmış hoşgeldin..
?>
<span class="hidden">
<?php
@setlocale(LC_ALL, 'turkish');
$editsaat = strftime("%H:%M:%S ", time());	
$edittarih = strftime("%d %B %Y, %A ", time());
$makale_baslik = $_POST["konu"];
$makale_icerik = $_POST["metin"];
$makale_id = $_POST["metin"];
?>
</span>
<?
@include"yonetim/hbv/postcode_kontrol.php";
if ($makale_baslik == "")
echo "<br><center><b>Konu Başlığı'nı yazmadığınızı algıladı !! 
<br>Yoksa algı yapılarımız mı farklı ?</b></center>";
elseif ($makale_icerik == "")
echo "<br><center><b>Konu İçeriği'ni yazmadığınızı algıladı !! 
<br>Yoksa algı yapılarımız mı farklı ?</b></center>";
else
$SQL = "UPDATE makale SET makale_baslik = '$makale_baslik', makale_icerik = '$makale_icerik' WHERE makale_id = '{$_POST[id]}'";
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
?><center><br />
kayıt veritabanından düzeltilmiştir...<br /><br />
Lütfen Bekleyiniz<br />
<img src="resim/lodos/bekleyin_ms.gif" width="32" height="32" border="0" /><br />
Yönlendiriliyorsunuz<br />
<br />
<meta http-equiv="refresh" content="3;URL=?shf=doc&amp;islem=oku">

Eğer hala yönlenmediyseniz <a href="?shf=doc&amp;islem=oku" class="red">tıklayınız</a></center>
<?
}else{
// giriş yapılmamış ise ;
@include ("../../hata.php");
}
?>