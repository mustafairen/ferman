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
$user_nick = trim($_POST['nick']);
$user_sifre = trim($_POST['sifre']);
$user_sifre2 = trim($_POST['sifre2']);
$user_mail = trim($_POST['mail']);
$user_security = trim($_POST['securitycode']);
@include("yonetim/db.php");
if (
empty($user_nick) || empty($user_sifre) || empty($user_mail) || empty($user_security)
)
{
print '<script>alert(" Formu Eksik Doldurdunuz ! ");history.back(-1);</script>';
}
elseif (!preg_match("/[A-Za-z0-9_.-]+@([A-Za-z0-9_]+\.)+[A-Za-z]{2,4}/i", $user_mail))
{
print '<script>alert(" Mail Adresi Ge�ersiz ! ");history.back(-1);</script>';
}
elseif ( $user_sifre != $user_sifre2 ) {
print '<script>alert(" �ifreler Uyu�muyor ! ");history.back(-1);</script>';
}
else
{
@include"yonetim/hbv/securitycode_kontrol.php";
$s = @mysql_query("SELECT user_id FROM user WHERE user_nick='$user_nick'");
if ( @mysql_num_rows($s) >= 1) 
{
?>
<script>alert(" <?=$user_nick?> Kullan�c� ad� kay�tl� ! ");history.back(-1);</script>
<?
exit();
}
$sorgu_mail = @mysql_query("SELECT user_mail FROM user WHERE user_mail='$user_mail'");
if ( @mysql_num_rows($sorgu_mail) >= 1) 
{
?>
<script>alert(" <?=$user_mail?> Mail Adresi kay�tl� ! ");history.back();</script>
<?
exit();
}
$yeni_sifre = md5($user_sifre);
// Rastgele karakter
$karakter = 6;
$baslangic = rand(1,24);
$rastgelekod = md5(rand(0,500));
$kod = strtoupper(substr($rastgelekod,$baslangic,$karakter));
$user_lost_sifre = "$kod";
$tablo = "INSERT INTO user (user_nick, user_sifre, user_lost_sifre, user_mail) VALUES ('$user_nick','$yeni_sifre','$user_lost_sifre', '$user_mail')";
if ( mysql_query($tablo) ) {
?>
<script>
  alert(" Kay�t i�lemi Tamamland� ");
  window.top.location = '?shf=user&islem=oku';
</script>
<?
} else {
?>
<script>alert("  Hata Alg�land� Tekrar Deneyiniz ! ");history.back(-1);</script>
<?
}
}
?>
<?
}else{
// giri� yap�lmam�� ise ;
@include ("../../hata.php");
}
?>