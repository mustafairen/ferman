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
<?php
$iletisim_mail = $_POST["mail"];
$iletisim_msn = $_POST["msn"];
$iletisim_icerik = $_POST["metin"];

@include"yonetim/hbv/postcode_kontrol.php";

$SQL = "INSERT INTO iletisim (iletisim_mail,iletisim_msn,iletisim_icerik) VALUES ('$iletisim_mail','$iletisim_msn','$iletisim_icerik')"; //'$_POST[konu]','$_POST[metin]'
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
Eğer hala yönlenmediyseniz <a href="?shf=iletisim&amp;islem=oku" class="red">tıklayınız</a><br />

<meta http-equiv="refresh" content="3;URL=?shf=iletisim&amp;islem=oku">
</center><?
}else{
// giriş yapılmamış ise ;
@include ("../../hata.php");
}
?>