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
//G�venlik Kodu
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
// giri� yap�lmam�� ise ;
@include ("../../hata.php");
}
?>