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
//Günlük Sayfası
@include ("gwlabs/blog/kkk.php");
//Hakkımda Sayfası
@include ("gwlabs/hakkimda/kkk.php");
//Makale-Döküman Sayfası
@include ("gwlabs/makale/kkk.php");
//Network Sayfası
@include ("gwlabs/network/kkk.php");
//Çalışmalarım Sayfası
@include ("gwlabs/calisma/kkk.php");
//İletişim Sayfası
@include ("gwlabs/iletisim/kkk.php");
//Ayarlar sayfası
#Ayarlar ana menü
@include ("gwlabs/ayarlar/kkk.php");
#User
@include ("yonetim/acrophobia/kkk.php");
?>
<?
}else{
// giriş yapılmamış ise ;
@include ("../hata.php");
}
?>