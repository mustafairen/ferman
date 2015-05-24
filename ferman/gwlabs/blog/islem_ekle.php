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
echo "<br><center><b>Konu Baþlýðý'ný yazmadýðýnýzý algýladý !! 
<br>Yoksa algý yapýlarýmýz mý farklý ?</b></center>";
elseif ($blog_icerik == "")
echo "<br><center><b>Konu Ýçeriði'ni yazmadýðýnýzý algýladý !! 
<br>Yoksa algý yapýlarýmýz mý farklý ?</b></center>";

else
$SQL = "INSERT INTO blog (blog_tarih,blog_saat,blog_gun,blog_baslik,blog_icerik) VALUES ('$blog_tarih','$blog_saat','$blog_gun','$blog_baslik','$blog_icerik')";
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
Eðer hala yönlenmediyseniz <a href="?shf=blog&amp;islem=oku" class="red">týklayýnýz</a><br />

<meta http-equiv="refresh" content="3;URL=?shf=blog&amp;islem=oku">
</center>
<?
}else{
// giriþ yapýlmamýþ ise ;
@include ("../../hata.php");
}
?>
