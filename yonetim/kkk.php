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
//G�nl�k Sayfas�
@include ("gwlabs/blog/kkk.php");
//Hakk�mda Sayfas�
@include ("gwlabs/hakkimda/kkk.php");
//Makale-D�k�man Sayfas�
@include ("gwlabs/makale/kkk.php");
//Network Sayfas�
@include ("gwlabs/network/kkk.php");
//�al��malar�m Sayfas�
@include ("gwlabs/calisma/kkk.php");
//�leti�im Sayfas�
@include ("gwlabs/iletisim/kkk.php");
//Ayarlar sayfas�
#Ayarlar ana men�
@include ("gwlabs/ayarlar/kkk.php");
#User
@include ("yonetim/acrophobia/kkk.php");
?>
<?
}else{
// giri� yap�lmam�� ise ;
@include ("../hata.php");
}
?>