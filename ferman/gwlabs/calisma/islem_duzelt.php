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
$calisma_baslik = $_POST["konu"];
$calisma_icerik = $_POST["metin"];
$calisma_id = $_POST["metin"];
?>
</span>
<?
@include"yonetim/hbv/postcode_kontrol.php";
if ($calisma_baslik == "")
echo "<br><center><b>Konu Baþlýðý'ný yazmadýðýnýzý algýladý !! 
<br>Yoksa algý yapýlarýmýz mý farklý ?</b></center>";
elseif ($calisma_icerik == "")
echo "<br><center><b>Konu Ýçeriði'ni yazmadýðýnýzý algýladý !! 
<br>Yoksa algý yapýlarýmýz mý farklý ?</b></center>";
else
$SQL = "UPDATE calisma SET calisma_baslik = '$calisma_baslik', calisma_icerik = '$calisma_icerik' WHERE calisma_id = '{$_POST[id]}'";
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
<center>
kayýt veritabanýndan düzeltilmiþtir...<br /><br />
Lütfen Bekleyiniz<br />
<img src="resim/lodos/bekleyin_ms.gif" width="32" height="32" border="0" /><br />
Yönlendiriliyorsunuz<br />
<br />
<meta http-equiv="refresh" content="3;URL=?shf=work&amp;islem=oku">

Eðer hala yönlenmediyseniz <a href="?shf=work&amp;islem=oku" class="red">týklayýnýz</a>
</center>
<?
}else{
// giriþ yapýlmamýþ ise ;
@include ("../../hata.php");
}
?>