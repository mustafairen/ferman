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
// Ayarlar Karar Komuta Kontrol
//üyelere bak
if ($shf == "user" && $islem == "oku")
{
include "yonetim/acrophobia/oku.php";
}
//üye ekle
if ($shf == "user" && $islem == "ekle")
{
include "yonetim/acrophobia/ekle.php";
}
if ($shf == "user" && $islem == "ekleniyor")
{
include "yonetim/acrophobia/islem_ekle.php";
}
//üye bilgi güncelle
if ($shf == "user" && $islem == "duzelt")
{
include "yonetim/acrophobia/duzelt.php";
}
if ($shf == "user" && $islem == "duzeltiliyor")
{
include "yonetim/acrophobia/islem_duzelt.php";
}
//üye sil
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
// giriş yapılmamış ise ;
@include ("../../hata.php");
}
?>