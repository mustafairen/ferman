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
@include"yonetim/hbv/postcode_kontrol.php";
$SQL = "DELETE FROM network WHERE network_id = '$id'";
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
?><center><br />
Kayıt Veritabanından Silinmiştir...<br />
<br />
Lütfen Bekleyiniz<br />
<img src="resim/lodos/bekleyin_ms.gif" width="32" height="32" border="0" /><br />
Yönlendiriliyorsunuz<br />
<br />
Eğer hala yönlenmediyseniz <a href="?shf=network&amp;islem=oku" class="red">tıklayınız</a><br />

<meta http-equiv="refresh" content="3;URL=?shf=network&amp;islem=oku">
</center>
<?
}else{
// giriş yapılmamış ise ;
@include ("../../hata.php");
}