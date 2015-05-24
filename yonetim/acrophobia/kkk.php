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
// giriþ yapýlmamýþ ise ;
@include ("../../hata.php");
}
?>