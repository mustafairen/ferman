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
print '<script>alert(" Mail Adresi Geçersiz ! ");history.back(-1);</script>';
}
elseif ( $user_sifre != $user_sifre2 ) {
print '<script>alert(" Şifreler Uyuşmuyor ! ");history.back(-1);</script>';
}
else
{
@include"yonetim/hbv/securitycode_kontrol.php";
$s = @mysql_query("SELECT user_id FROM user WHERE user_nick='$user_nick'");
if ( @mysql_num_rows($s) >= 1) 
{
?>
<script>alert(" <?=$user_nick?> Kullanıcı adı kayıtlı ! ");history.back(-1);</script>
<?
exit();
}
$sorgu_mail = @mysql_query("SELECT user_mail FROM user WHERE user_mail='$user_mail'");
if ( @mysql_num_rows($sorgu_mail) >= 1) 
{
?>
<script>alert(" <?=$user_mail?> Mail Adresi kayıtlı ! ");history.back();</script>
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
  alert(" Kayıt işlemi Tamamlandı ");
  window.top.location = '?shf=user&islem=oku';
</script>
<?
} else {
?>
<script>alert("  Hata Algılandı Tekrar Deneyiniz ! ");history.back(-1);</script>
<?
}
}
?>
<?
}else{
// giriş yapılmamış ise ;
@include ("../../hata.php");
}
?>