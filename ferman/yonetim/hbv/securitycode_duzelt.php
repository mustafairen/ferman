<?
//giri� kontrol
@include ("giris_kontrol.php");
// oturumu baslatal�m
@session_start();
// giri� bilgilerini alal�m.
$giris=$_SESSION["giris"];
$ad=$_SESSION["user_kadi"];
// giri� kontrol� yapal�m
// giri� yap�lm�� ise $giris true olmal�
if($giris){
// giri� yap�lm�� ho�geldin..
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
print '<script>alert(" Yeni Post Kodlar Uyu�muyor ! ");history.back(-1);</script>';
}
else
{
$securitycode1=md5($securitycode);
$securitycode_y1=md5($securitycode_y);
include ("yonetim/db.php");
$securitycode_kontrol = mysql_query("select code_id from code where securitycode = '".$securitycode1."'");
if( mysql_num_rows($securitycode_kontrol) != 1 )
{
print '<script>alert("Yanl�� G�venlik Kodu girdiniz!");history.back(-1);</script>';
exit; 
}
$SQL = "UPDATE code SET securitycode = '$securitycode_y1'";
$sorgu= @mysql_query($SQL,$baglanti);
if (!$sorgu)
{
echo "sorgu yap�lamad�";
exit();
}
}
mysql_close($baglanti);
//sorgu bitti
?><br />
kay�t veritaban�ndan d�zeltilmi�tir...<br /><br />
L�tfen Bekleyiniz<br />
<img src="resim/lodos/bekleyin_ms.gif" width="32" height="32" border="0" /><br />
Y�nlendiriliyorsunuz<br />
<br />
<meta http-equiv="refresh" content="2;URL=?shf=ayarlar&amp;islem=oku">

E�er hala y�nlenmediyseniz <a href="?shf=ayarlar&amp;islem=oku" class="red">t�klay�n�z</a>
<?
}else{
// giri� yap�lmam�� ise ;
@include ("../../hata.php");
}
?>