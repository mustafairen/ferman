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
<?
$portal_avatar=trim($_POST[portal_avatar]);
$portal_nick=trim($_POST[portal_nick]);

if (
empty($portal_avatar) || empty($portal_nick) 
)
{
print '<script>alert(" Formu Eksik Doldurdunuz ! ");history.back(-1);</script>';
}
@include ("yonetim/db.php");
@include"yonetim/hbv/postcode_kontrol.php";

$portal_kontrol = mysql_query("select portal_id from portal");


if( mysql_num_rows($portal_kontrol) >= 1 )
{
$SQL = "UPDATE portal SET portal_avatar = '$portal_avatar' , portal_nick='$portal_nick'";
  $sorgu= @mysql_query($SQL,$baglanti);
if (!$sorgu)
{
echo "sorgu yapýlamadý";
exit();
}
}else{

$sqlekle = "insert into portal (portal_avatar,portal_nick) values('$portal_avatar' , '$portal_nick')";
  $sorgu_ekle= @mysql_query($sqlekle,$baglanti);
if (!$sorgu_ekle)
{
echo "sorgu yapýlamadý";
exit();
}

}
mysql_close($baglanti);
//sorgu bitti
?>
<img src="resim/lodos/tamam.jpg" width="25" height="25" border="0" /><br />
kayýt veritabanýndan düzeltilmiþtir...<br /><br />
Lütfen Bekleyiniz<br />
<img src="resim/lodos/bekleyin_ms.gif" width="32" height="32" border="0" /><br />
Yönlendiriliyorsunuz<br />
<br />
<meta http-equiv="refresh" content="2;URL=?shf=ayarlar&amp;islem=oku">

Eðer hala yönlenmediyseniz <a href="?shf=ayarlar&amp;islem=oku" class="red">týklayýnýz</a>

<?
}else{
// giriþ yapýlmamýþ ise ;
@include ("../../hata.php");
}
?>