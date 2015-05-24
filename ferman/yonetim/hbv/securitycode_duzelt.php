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
$securitycode = trim($_POST['securitycode']);
$securitycode_y = trim($_POST['securitycode_y']);
$securitycode_y_t = trim($_POST['securitycode_y_t']);
if (
empty($securitycode) || empty($securitycode_y) || empty($securitycode_y_t) 
)
{
print '<script>alert(" Formu Eksik Doldurdunuz ! ");history.back(-1);</script>';
}
elseif ( $securitycode_y != $securitycode_y_t ) {
print '<script>alert(" Yeni Post Kodlar Uyuşmuyor ! ");history.back(-1);</script>';
}
else
{
$securitycode1=md5($securitycode);
$securitycode_y1=md5($securitycode_y);
include ("yonetim/db.php");
$securitycode_kontrol = mysql_query("select code_id from code where securitycode = '".$securitycode1."'");
if( mysql_num_rows($securitycode_kontrol) != 1 )
{
print '<script>alert("Yanlış Güvenlik Kodu girdiniz!");history.back(-1);</script>';
exit; 
}
$SQL = "UPDATE code SET securitycode = '$securitycode_y1'";
$sorgu= @mysql_query($SQL,$baglanti);
if (!$sorgu)
{
echo "sorgu yapılamadı";
exit();
}
}
mysql_close($baglanti);
//sorgu bitti
?><br />
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