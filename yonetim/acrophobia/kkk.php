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
// Ayarlar Karar Komuta Kontrol
//�yelere bak
if ($shf == "user" && $islem == "oku")
{
include "yonetim/acrophobia/oku.php";
}
//�ye ekle
if ($shf == "user" && $islem == "ekle")
{
include "yonetim/acrophobia/ekle.php";
}
if ($shf == "user" && $islem == "ekleniyor")
{
include "yonetim/acrophobia/islem_ekle.php";
}
//�ye bilgi g�ncelle
if ($shf == "user" && $islem == "duzelt")
{
include "yonetim/acrophobia/duzelt.php";
}
if ($shf == "user" && $islem == "duzeltiliyor")
{
include "yonetim/acrophobia/islem_duzelt.php";
}
//�ye sil
if ($shf == "user" && $islem == "sil")
{
include "yonetim/acrophobia/sil.php";
}
if ($shf == "user" && $islem == "siliniyor")
{
include "yonetim/acrophobia/islem_sil.php";
}
//Log Sistemi
if ($shf == "ayarlar" && $islem == "log_oku")
{
include "yonetim/hbv/log.php";
}
if ($shf == "ayarlar" && $islem == "log_sil")
{
include "yonetim/hbv/log_sil.php";
}
if ($shf == "ayarlar" && $islem == "log_siliniyor")
{
include "yonetim/hbv/log_siliniyor.php";
}
?>
<?
}else{
// giri� yap�lmam�� ise ;
@include ("../../hata.php");
}
?>