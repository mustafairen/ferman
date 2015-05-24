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
<?Php
if (
empty($adi) || empty($soyadi) || empty($mail) || empty($kullanici_adi) || empty($sifre)
)
{
print "Formu eksik doldurdunuz";
}
elseif (!(eregi("^[_a-z0-9-]+(\.[a-z0-9-]+)*@([0-9a-z][0-9a-z-]*[0-9a-z]\.)+[a-z]{4}[mtgvu]?$", $mail)))
{
print "mail adresi yanlış yazıldı.";
}
elseif ( $sifre != $sifre2 ) {
print "şifreler uyuşmuyor";
}
else
{
$veriler[1] = trim($nick);
$veriler[2] = trim($sifre);
$veriler[3] = trim($mail);
$s = mysql_query("SELECT * FROM user WHERE nick='$user_nick'");
if ( mysql_num_rows($s) >= 1) {
print "$user_nick kullanıcı adı veritabanında kayıtlı.";
exit();
}
$yeni_sifre = md5($veriler[2]);
$tablo = "INSERT INTO user VALUES ('','$veriler[1]','$yeni_sifre','$veriler[3]'";
if ( mysql_query($tablo) ) {
print "kayıt işlemi tamam";
} else {
print "kayıt başarısız";
}
}
?>
<?
}else{
// giriş yapılmamış ise ;
@include ("../../hata.php");
}
?>