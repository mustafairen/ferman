<?
//giriþ kontrol
@include ("giris_kontrol.php");
// oturumu baslatalým
@session_start();
// giriþ bilgilerini alalým.
$giris=$_SESSION["giris"];
$ad=$_SESSION["cwuser_kadi"];
// giriþ kontrolü yapalým
// giriþ yapýlmýþ ise $giris true olmalý
if($giris){
// giriþ yapýlmýþ hoþgeldin..
?>
<center><br><br>
<span class="gizle">
<?php
@setlocale(LC_ALL, 'turkish');
$makale_tarih = strftime("%d %B %Y", time());
$makale_saat = strftime("%H:%M:%S ", time());
$makale_gun = strftime("%A ", time());
$makale_baslik = $_POST["konu"];
$makale_icerik = $_POST["metin"];
?>
</span>
<?php

@include"yonetim/hbv/postcode_kontrol.php";
if ($makale_baslik == "")
echo "<br><br><center><b>Konu Baþlýðý'ný yazmadýðýnýzý algýladý !! Yoksa algý yapýlarýmýz mý farklý ?</b></center>";
elseif ($makale_icerik == "")
echo "<br><br><center><b>Konu Ýçeriði'ni yazmadýðýnýzý algýladý !! Yoksa algý yapýlarýmýz mý farklý ?</b></center>";

else
$SQL = "INSERT INTO makale (makale_tarih,makale_saat,makale_gun,makale_baslik,makale_icerik) VALUES ('$makale_tarih','$makale_saat','$makale_gun','$makale_baslik','$makale_icerik')"; //'$_POST[konu]','$_POST[metin]'
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
echo "<br>Sorgulama iþlemi gerçekleþtirilemedi. Lütfen Tekrar Deneyiniz.</br></br>";
?>
<a href="javascript: history.go(-1)" class="red">Geri Dön</a>
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
Eðer hala yönlenmediyseniz <a href="?shf=doc&amp;islem=oku" class="red">týklayýnýz</a><br />

<meta http-equiv="refresh" content="3;URL=?shf=doc&amp;islem=oku"></center>
<?
}else{
// giriþ yapýlmamýþ ise ;
@include ("../../hata.php");
}
?>