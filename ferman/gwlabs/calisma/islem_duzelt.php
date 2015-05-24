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
<span class="hidden">
<?php
@setlocale(LC_ALL, 'turkish');
$editsaat = strftime("%H:%M:%S ", time());	
$edittarih = strftime("%d %B %Y, %A ", time());
$calisma_baslik = $_POST["konu"];
$calisma_icerik = $_POST["metin"];
$calisma_id = $_POST["metin"];
?>
</span>
<?
@include"yonetim/hbv/postcode_kontrol.php";
if ($calisma_baslik == "")
echo "<br><center><b>Konu Başlığı'nı yazmadığınızı algıladı !! 
<br>Yoksa algı yapılarımız mı farklı ?</b></center>";
elseif ($calisma_icerik == "")
echo "<br><center><b>Konu İçeriği'ni yazmadığınızı algıladı !! 
<br>Yoksa algı yapılarımız mı farklı ?</b></center>";
else
$SQL = "UPDATE calisma SET calisma_baslik = '$calisma_baslik', calisma_icerik = '$calisma_icerik' WHERE calisma_id = '{$_POST[id]}'";
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
<center>
kayıt veritabanından düzeltilmiştir...<br /><br />
Lütfen Bekleyiniz<br />
<img src="resim/lodos/bekleyin_ms.gif" width="32" height="32" border="0" /><br />
Yönlendiriliyorsunuz<br />
<br />
<meta http-equiv="refresh" content="3;URL=?shf=work&amp;islem=oku">

Eğer hala yönlenmediyseniz <a href="?shf=work&amp;islem=oku" class="red">tıklayınız</a>
</center>
<?
}else{
// giriş yapılmamış ise ;
@include ("../../hata.php");
}
?>