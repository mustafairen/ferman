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
if ($shf == "ayarlar" && $islem == "oku")
{
include "gwlabs/ayarlar/oku.php";
}
if ($shf == "codecenter" && $islem == "oku")
{
include "yonetim/hbv/oku.php";
}
//Post Code
if ($shf == "postcode" && $islem == "oku")
{
include "yonetim/hbv/postcode_oku.php";
}
if ($shf == "postcode" && $islem == "duzeltiliyor")
{
include "yonetim/hbv/postcode_duzelt.php";
}
//Güvenlik Kodu
if ($shf == "securitycode" && $islem == "oku")
{
include "yonetim/hbv/securitycode_oku.php";
}
if ($shf == "securitycode" && $islem == "duzeltiliyor")
{
include "yonetim/hbv/securitycode_duzelt.php";
}
//Portal
if ($shf == "portal" && $islem == "oku")
{
include "gwlabs/ayarlar/portal_oku.php";
}
if ($shf == "portal" && $islem == "ekle")
{
include "gwlabs/ayarlar/portal_isle.php";
}

if ($shf == "help" && $islem == "oku")
{
include "gwlabs/ayarlar/yardim.html";
}
if ($shf == "info" && $islem == "oku")
{
include "gwlabs/ayarlar/info.html";
}
?>
<?
}else{
// giriş yapılmamış ise ;
@include ("../../hata.php");
}
?>