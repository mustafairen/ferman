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
<?
@include"yonetim/hbv/securitycode_kontrol.php";
$SQL = "DELETE FROM log WHERE log_id = '$id'";
# sorgu cümlemiz hazýr. artýk mysql ile baðlantý kuralým
{
require ("yonetim/db.php");
}
# sql cümlesini mysql e iletiyoruz ve cvp istiyoruz
$sorgu= @mysql_query($SQL,$baglanti);
if (!$sorgu)
{
echo "sorgu yapýlamadý";
exit();
}
mysql_close($baglanti);
//sorgu bitti
?>
<br />
Tutulan Log Veritabanýndan Silinmiþtir...<br />
<br />
Lütfen Bekleyiniz<br />
<img src="resim/lodos/bekleyin_ms.gif" width="32" height="32" border="0" /><br />
Yönlendiriliyorsunuz<br />
<br />
Eðer hala yönlenmediyseniz <a href="?shf=ayarlar&amp;islem=log_oku" class="red">týklayýnýz</a><br />

<meta http-equiv="refresh" content="3;URL=?shf=ayarlar&amp;islem=log_oku">
<?
//mysql baðlantýsýnýn kapatýlmasý
mysql_close ($baglanti);
?>
<?
}else{
// giriþ yapýlmamýþ ise ;
@include ("../../hata.php");
}
?>