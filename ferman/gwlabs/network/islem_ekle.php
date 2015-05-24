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
echo "<br><br><center><b>isim/Nick yazmadýðýnýzý algýladý !! Yoksa algý yapýlarýmýz mý farklý ?</b></center>";
elseif ($network_link == "")
echo "<br><br><center><b>Link'i yazmadýðýnýzý algýladý !! Yoksa algý yapýlarýmýz mý farklý ?</b></center>";
elseif ($data == "<meta")
{
?>
<br><br><center><b><h2><span class="red">Geri Zekalý !!!</span></h2></b></center>
<?
}
elseif ($data2 == "<meta")
{
?>
<br><br><center><b><h2><span class="red">Geri Zekalý !!!</span></h2></b></center>
<?
}
else
$SQL = "INSERT INTO network (network_isim,network_link,network_icerik) VALUES ('$network_isim','$network_link','$network_icerik')";
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
Eðer hala yönlenmediyseniz <a href="?shf=network&amp;islem=oku" class="red">týklayýnýz</a><br />

<meta http-equiv="refresh" content="3;URL=?shf=network&amp;islem=oku">
</center>
<?

}else{
// giriþ yapýlmamýþ ise ;
@include ("../../hata.php");
}
?>