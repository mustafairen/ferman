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
<?php
//********** Ýletiþim sayfasý **********
////////////////////////////////////

//kategoriye göre okuma iþlemi
if ($shf == "iletisim" && $islem == "oku")
{
include "gwlabs/iletisim/oku.php";
}
//kategorideki veriye id'ye göre okuma
if ($shf == "iletisim" && $islem == "oku_detay" && $id == $_GET["iletisim_id"])
{
include "gwlabs/iletisim/konuoku.php";
}
//veri ekleme
if ($shf == "iletisim" && $islem == "ekle")
{
include "gwlabs/iletisim/ekle.php";
}
// veri ekleme iþlemi
if ($shf == "iletisim" && $islem == "ekleniyor")
{
include "gwlabs/iletisim/islem_ekle.php";
}

//veri düzeneleme
if ($shf == "iletisim" && $islem == "duzelt")
{
include "gwlabs/iletisim/duzelt.php";
}
//veri düzenleme iþlemi
if ($shf == "iletisim" && $islem == "duzeltiliyor")
{
include "gwlabs/iletisim/islem_duzelt.php";
}
?>
<?
}else{
// giriþ yapýlmamýþ ise ;
@include ("../../hata.php");
}
?>