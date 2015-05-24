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
<?
//Günlük Sayfasý
@include ("gwlabs/blog/kkk.php");
//Hakkýmda Sayfasý
@include ("gwlabs/hakkimda/kkk.php");
//Makale-Döküman Sayfasý
@include ("gwlabs/makale/kkk.php");
//Network Sayfasý
@include ("gwlabs/network/kkk.php");
//Çalýþmalarým Sayfasý
@include ("gwlabs/calisma/kkk.php");
//Ýletiþim Sayfasý
@include ("gwlabs/iletisim/kkk.php");
//Ayarlar sayfasý
#Ayarlar ana menü
@include ("gwlabs/ayarlar/kkk.php");
#User
@include ("yonetim/acrophobia/kkk.php");
?>
<?
}else{
// giriþ yapýlmamýþ ise ;
@include ("../hata.php");
}
?>