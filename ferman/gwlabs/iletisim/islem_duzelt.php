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

<span class="hidden">
<?php
@setlocale(LC_ALL, 'turkish');
$editsaat = strftime("%H:%M:%S ", time());	
$edittarih = strftime("%d %B %Y, %A ", time());
$iletisim_mail = $_POST["mail"];
$iletisim_msn = $_POST["msn"];
$iletisim_icerik = $_POST["metin"];
?>
</span>
<?
@include"yonetim/hbv/postcode_kontrol.php";

$SQL = "UPDATE iletisim SET iletisim_mail = '$iletisim_mail', iletisim_msn = '$iletisim_msn', iletisim_icerik = '$iletisim_icerik' WHERE iletisim_id = '{$_POST[id]}'";
/*
* sorgu cümlemiz hazýr. artýk mysql ile baðlantý kuralým
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
echo "sorgu yapýlamadý";
exit();
}
mysql_close($baglanti);
//sorgu bitti
?><center><br />
kayýt veritabanýndan düzeltilmiþtir...<br /><br />
Lütfen Bekleyiniz<br />
<img src="resim/lodos/bekleyin_ms.gif" width="32" height="32" border="0" /><br />
Yönlendiriliyorsunuz<br />
<br />
<meta http-equiv="refresh" content="3;URL=?shf=iletisim&amp;islem=oku">

Eðer hala yönlenmediyseniz <a href="?shf=iletisim&amp;islem=oku" class="red">týklayýnýz</a>
</center>
<?
}else{
// giriþ yapýlmamýþ ise ;
@include ("../../hata.php");
}
?>