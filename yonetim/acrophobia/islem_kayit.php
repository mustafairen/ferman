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
<?Php
if (
empty($adi) || empty($soyadi) || empty($mail) || empty($kullanici_adi) || empty($sifre)
)
{
print "Formu eksik doldurdunuz";
}
elseif (!(eregi("^[_a-z0-9-]+(\.[a-z0-9-]+)*@([0-9a-z][0-9a-z-]*[0-9a-z]\.)+[a-z]{4}[mtgvu]?$", $mail)))
{
print "mail adresi yanl�� yaz�ld�.";
}
elseif ( $sifre != $sifre2 ) {
print "�ifreler uyu�muyor";
}
else
{
$veriler[1] = trim($nick);
$veriler[2] = trim($sifre);
$veriler[3] = trim($mail);
$s = mysql_query("SELECT * FROM user WHERE nick='$user_nick'");
if ( mysql_num_rows($s) >= 1) {
print "$user_nick kullan�c� ad� veritaban�nda kay�tl�.";
exit();
}
$yeni_sifre = md5($veriler[2]);
$tablo = "INSERT INTO user VALUES ('','$veriler[1]','$yeni_sifre','$veriler[3]'";
if ( mysql_query($tablo) ) {
print "kay�t i�lemi tamam";
} else {
print "kay�t ba�ar�s�z";
}
}
?>
<?
}else{
// giri� yap�lmam�� ise ;
@include ("../../hata.php");
}
?>