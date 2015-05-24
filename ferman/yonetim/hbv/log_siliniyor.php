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
<?
@include"yonetim/hbv/securitycode_kontrol.php";
$SQL = "DELETE FROM log WHERE log_id = '$id'";
# sorgu cümlemiz hazır. artık mysql ile bağlantı kuralım
{
require ("yonetim/db.php");
}
# sql cümlesini mysql e iletiyoruz ve cvp istiyoruz
$sorgu= @mysql_query($SQL,$baglanti);
if (!$sorgu)
{
echo "sorgu yapılamadı";
exit();
}
mysql_close($baglanti);
//sorgu bitti
?>
<br />
Tutulan Log Veritabanından Silinmiştir...<br />
<br />
Lütfen Bekleyiniz<br />
<img src="resim/lodos/bekleyin_ms.gif" width="32" height="32" border="0" /><br />
Yönlendiriliyorsunuz<br />
<br />
Eğer hala yönlenmediyseniz <a href="?shf=ayarlar&amp;islem=log_oku" class="red">tıklayınız</a><br />

<meta http-equiv="refresh" content="3;URL=?shf=ayarlar&amp;islem=log_oku">
<?
//mysql bağlantısının kapatılması
mysql_close ($baglanti);
?>
<?
}else{
// giriş yapılmamış ise ;
@include ("../../hata.php");
}
?>