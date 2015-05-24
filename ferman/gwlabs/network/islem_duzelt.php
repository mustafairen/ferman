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
<span class="gizle">
<?php
@setlocale(LC_ALL, 'turkish');
$editsaat = strftime("%H:%M:%S ", time());	
$edittarih = strftime("%d %B %Y, %A ", time());
$network_isim = $_POST["konu"];
$network_icerik = $_POST["metin"];
$network_link = $_POST["link"];
$network_id = $_POST["id"];
?>
</span>
<?
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

$SQL = "UPDATE network SET network_isim = '$network_isim', network_icerik = '$network_icerik', network_link = '$network_link' WHERE network_id = '{$_POST[id]}'";
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
?><br />
kayýt veritabanýndan düzeltilmiþtir...<br /><br />
Lütfen Bekleyiniz<br />
<img src="resim/lodos/bekleyin_ms.gif" width="32" height="32" border="0" /><br />
Yönlendiriliyorsunuz<br />
<br />
<meta http-equiv="refresh" content="3;URL=?shf=network&amp;islem=oku">

Eðer hala yönlenmediyseniz <a href="?shf=network&amp;islem=oku" class="red">týklayýnýz</a>
</center>
<?
}else{
// giriþ yapýlmamýþ ise ;
@include ("../../hata.php");
}
?>