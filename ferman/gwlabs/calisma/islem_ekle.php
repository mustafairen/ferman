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
echo "<br><br><center><b>Konu Başlığı'nı yazmadığınızı algıladı !! Yoksa algı yapılarımız mı farklı ?</b></center>";
elseif ($calisma_icerik == "")
echo "<br><br><center><b>Konu İçeriği'ni yazmadığınızı algıladı !! Yoksa algı yapılarımız mı farklı ?</b></center>";

else
$SQL = "INSERT INTO calisma (calisma_tarih,calisma_saat,calisma_gun,calisma_baslik,calisma_icerik) VALUES (\"$calisma_tarih\",\"$calisma_saat\",\"$calisma_gun\",\"$calisma_baslik\",\"$calisma_icerik\")"; //'$_POST[konu]','$_POST[metin]'
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
Eğer hala yönlenmediyseniz <a href="?shf=work&amp;islem=oku" class="red">tıklayınız</a><br />

<meta http-equiv="refresh" content="3;URL=?shf=work&amp;islem=oku">
</center>
<?
}else{
// giriş yapılmamış ise ;
@include ("../../hata.php");
}
?>