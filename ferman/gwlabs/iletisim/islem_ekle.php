<?
//giriþ kontrol
@include ("giris_kontrol.php");
// oturumu baslatalým
@session_start();
// giriþ bilgilerini alalým.
$giris=$_SESSION["giris"];
$ad=$_SESSION["user_kadi"];
// giriþ kontrolü yapalým
// giriþ yapýlmýþ ise $giris true olmalý
if($giris){
// giriþ yapýlmýþ hoþgeldin..
?>
<center><br><br>
<?php
$iletisim_mail = $_POST["mail"];
$iletisim_msn = $_POST["msn"];
$iletisim_icerik = $_POST["metin"];

@include"yonetim/hbv/postcode_kontrol.php";

$SQL = "INSERT INTO iletisim (iletisim_mail,iletisim_msn,iletisim_icerik) VALUES ('$iletisim_mail','$iletisim_msn','$iletisim_icerik')"; //'$_POST[konu]','$_POST[metin]'
/*
* sorgu cümlemiz hazýr. artýk mysql ile baðlantý kuralým
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
// Tüh Hata Yaptý. De get haber ver hemen düzeltsin hatasýný...
?>
<br>Hata Oluþtu.<br>
Lütfen <a href="javascript: history.go(-1)" class="red">Tekrar Deneyiniz</a></br></br>
<?
exit();
}
mysql_close($baglanti);
?><br />
veritabanýna kayýt eklenmiþtir...<br />
<br />
Lütfen Bekleyiniz<br />
<img src="resim/lodos/bekleyin_ms.gif" width="32" height="32" border="0" /><br />
Yönlendiriliyorsunuz<br />
<br />
Eðer hala yönlenmediyseniz <a href="?shf=iletisim&amp;islem=oku" class="red">týklayýnýz</a><br />

<meta http-equiv="refresh" content="3;URL=?shf=iletisim&amp;islem=oku">
</center><?
}else{
// giriþ yapýlmamýþ ise ;
@include ("../../hata.php");
}
?>