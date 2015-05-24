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
echo "<br><center><b>Konu Başlığı'nı yazmadığınızı algıladı !! 
<br>Yoksa algı yapılarımız mı farklı ?</b></center>";
elseif ($blog_icerik == "")
echo "<br><center><b>Konu İçeriği'ni yazmadığınızı algıladı !! 
<br>Yoksa algı yapılarımız mı farklı ?</b></center>";

else
$SQL = "INSERT INTO blog (blog_tarih,blog_saat,blog_gun,blog_baslik,blog_icerik) VALUES ('$blog_tarih','$blog_saat','$blog_gun','$blog_baslik','$blog_icerik')";
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
// Tüh Hata Yaptı. De get haber ver hemen düzeltsin hatasını...
?>
<br>Hata Oluştu.<br>
Lütfen <a href="javascript: history.go(-1)" class="red">Tekrar Deneyiniz</a></br></br>
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
Eğer hala yönlenmediyseniz <a href="?shf=blog&amp;islem=oku" class="red">tıklayınız</a><br />

<meta http-equiv="refresh" content="3;URL=?shf=blog&amp;islem=oku">
</center>
<?
}else{
// giriş yapılmamış ise ;
@include ("../../hata.php");
}
?>
