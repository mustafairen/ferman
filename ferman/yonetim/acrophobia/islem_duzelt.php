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
?><center>
<?php
$user_nick = trim($_POST['nick']);
$user_sifre = trim($_POST['sifre']);
$user_sifre_e = trim($_POST['sifre_e']);
$user_sifre_t = trim($_POST['sifre_t']);
$user_mail = trim($_POST['mail']);
$user_security = trim($_POST['securitycode']);
include ("yonetim/db.php");
if (
empty($user_nick) || empty($user_sifre_e) || empty($user_mail) || empty($user_security)
)
{
print '<script>alert(" Formu Eksik Doldurdunuz ! ");history.back(-1);</script>';
}
elseif (!preg_match("/[A-Za-z0-9_.-]+@([A-Za-z0-9_]+\.)+[A-Za-z]{2,4}/i", $user_mail))
{
print '<script>alert(" Mail Adresi Geçersiz ! ");history.back(-1);</script>';
}
elseif ( $user_sifre != $user_sifre_t ) {
print '<script>alert(" Şifreler Uyuşmuyor ! ");history.back(-1);</script>';
}
else
{
@include"yonetim/hbv/securitycode_kontrol.php";
$user_sifre_kont = md5($user_sifre_e);
$sifre_kontrol = mysql_query("select user_nick from user where user_sifre = '".$user_sifre_kont."'");
if( mysql_num_rows($sifre_kontrol) == 0 )
{
print '<script>alert("Yanlış şifre girdiniz!");history.back(-1);</script>';
exit;
}
if($user_nick!=$_POST[nick_e]) { 
//Kullanıcı Adı Kontrol  
$s = @mysql_query("SELECT user_id FROM user WHERE user_nick='$user_nick'");
if ( @mysql_num_rows($s) >= 1) 
{
?>
<script>alert(" <?=$user_nick?> Kullanıcı adı kayıtlı ! ");history.back(-1);</script>
<?
exit();
}
}
if($user_mail!=$_POST[mail_e]) {
//Mail Sorgulama
$sorgu_mail = @mysql_query("SELECT user_mail FROM user WHERE user_mail='$user_mail'");
if ( @mysql_num_rows($sorgu_mail) >= 1) 
{
?>
<script>alert(" <?=$user_mail?> Mail Adresi kayıtlı ! ");history.back();</script>
<?
exit();
} 
}
// Rastgele karakter
$karakter = 6;
$baslangic = rand(1,24);
$rastgelekod = md5(rand(0,500));
$kod = strtoupper(substr($rastgelekod,$baslangic,$karakter));  
$user_lost_sifre = "$kod";
if(empty($user_sifre)){
$user_sifre=$user_sifre_e;
}
$yeni_sifre = md5($user_sifre);
$SQL = "UPDATE user SET user_nick = '$user_nick', user_sifre = '$yeni_sifre', user_lost_sifre = '$kod', user_mail = '$user_mail' WHERE user_id = '{$_POST[id]}'";
$sorgu= @mysql_query($SQL,$baglanti);
if (!$sorgu)
{
?><br />
İsteğiniz Gerçekleştirilemedi...<br /><br />
Lütfen Bekleyiniz<br />
<img src="resim/lodos/bekleyin_ms.gif" width="32" height="32" border="0" /><br />
Yönlendiriliyorsunuz<br />
<br />
<meta http-equiv="refresh" content="2;URL=?shf=user&amp;islem=oku">
Eğer hala yönlenmediyseniz <a href="?shf=user&amp;islem=oku" class="red">tıklayınız</a>
<?
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
<meta http-equiv="refresh" content="2;URL=?shf=user&amp;islem=oku">
Eğer hala yönlenmediyseniz <a href="?shf=user&amp;islem=oku" class="red">tıklayınız</a></center>
<?
}else{
// giriş yapılmamış ise ;
@include ("../../hata.php");
}
?>