<?
//giriþ kontrol
@include ("giris_kontrol.php");
// oturumu baslatalým
@session_start();
// giriþ bilgilerini alalým.
$giris=$_SESSION["giris"];
$ad=$_SESSION["user_kadi"];
// giriþ kontrolü yapalým
// giriþ yapýlmýþ ise $giris true olmalý
if($giris){
// giriþ yapýlmýþ hoþgeldin..
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
print "mail adresi yanlýþ yazýldý.";
}
elseif ( $sifre != $sifre2 ) {
print "þifreler uyuþmuyor";
}
else
{
$veriler[1] = trim($nick);
$veriler[2] = trim($sifre);
$veriler[3] = trim($mail);
$s = mysql_query("SELECT * FROM user WHERE nick='$user_nick'");
if ( mysql_num_rows($s) >= 1) {
print "$user_nick kullanýcý adý veritabanýnda kayýtlý.";
exit();
}
$yeni_sifre = md5($veriler[2]);
$tablo = "INSERT INTO user VALUES ('','$veriler[1]','$yeni_sifre','$veriler[3]'";
if ( mysql_query($tablo) ) {
print "kayýt iþlemi tamam";
} else {
print "kayýt baþarýsýz";
}
}
?>
<?
}else{
// giriþ yapýlmamýþ ise ;
@include ("../../hata.php");
}
?>