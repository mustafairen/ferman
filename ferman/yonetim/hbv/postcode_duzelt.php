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
$postcode = trim($_POST['postcode']);
$postcode_y = trim($_POST['postcode_y']);
$postcode_y_t = trim($_POST['postcode_y_t']);


if (
empty($postcode) || empty($postcode_y) || empty($postcode_y_t) 
)
{
print '<script>alert(" Formu Eksik Doldurdunuz ! ");history.back(-1);</script>';
}
elseif ( $postcode_y != $postcode_y_t ) {
print '<script>alert(" Yeni Post Kodlar Uyuşmuyor ! ");history.back(-1);</script>';
}
else
{

$postcode1=md5($postcode);
$postcode_y1=md5($postcode_y);

@include ("yonetim/db.php");

@include"yonetim/hbv/securitycode_kontrol.php";
@include"yonetim/hbv/postcode_kontrol.php";
  
  $SQL = "UPDATE code SET postcode = '$postcode_y1'";
  $sorgu= @mysql_query($SQL,$baglanti);
if (!$sorgu)
{
echo "sorgu yapılamadı";
exit();
}
}
mysql_close($baglanti);
//sorgu bitti
?>
<br />
kayıt veritabanından düzeltilmiştir...<br /><br />
Lütfen Bekleyiniz<br />
<img src="resim/lodos/bekleyin_ms.gif" width="32" height="32" border="0" /><br />
Yönlendiriliyorsunuz<br />
<br />
<meta http-equiv="refresh" content="2;URL=?shf=ayarlar&amp;islem=oku">

Eğer hala yönlenmediyseniz <a href="?shf=ayarlar&amp;islem=oku" class="red">tıklayınız</a>
<?
}else{
// giriş yapılmamış ise ;
@include ("../../hata.php");
}
?>