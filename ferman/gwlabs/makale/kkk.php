<?
//giriþ kontrol
@include ("giris_kontrol.php");
// oturumu baslatalým
@session_start();
// giriþ bilgilerini alalým.
$giris=$_SESSION["giris"];
$ad=$_SESSION["cwuser_kadi"];
// giriþ kontrolü yapalým
// giriþ yapýlmýþ ise $giris true olmalý
if($giris){
// giriþ yapýlmýþ hoþgeldin..
?>
<?php
//********** Döküman-Makale sayfasý **********
////////////////////////////////////

//kategoriye göre okuma iþlemi
if ($shf == "doc" && $islem == "oku")
{
include "gwlabs/makale/oku.php";
}
//kategorideki veriye id'ye göre okuma
if ($shf == "doc" && $islem == "oku_detay" && $id == $_GET["makale_id"])
{
include "gwlabs/makale/konuoku.php";
}
//veri ekleme
if ($shf == "doc" && $islem == "ekle")
{
include "gwlabs/makale/ekle.php";
}
// veri ekleme iþlemi
if ($shf == "doc" && $islem == "ekleniyor")
{
include "gwlabs/makale/islem_ekle.php";
}
//veri sil
if ($shf == "doc" && $islem == "sil")
{
include "gwlabs/makale/sil.php";
}
//veri silme iþlemi
if ($shf == "doc" && $islem == "siliniyor")
{
include "gwlabs/makale/islem_sil.php";
}
//veri düzeneleme
if ($shf == "doc" && $islem == "duzelt")
{
include "gwlabs/makale/duzelt.php";
}
//veri düzenleme iþlemi
if ($shf == "doc" && $islem == "duzeltiliyor")
{
include "gwlabs/makale/islem_duzelt.php";
}
/*
sayfa karar kontrol mekanizmasý sonu
*/
?>
<?
}else{
// giriþ yapýlmamýþ ise ;
@include ("../../hata.php");
}
?>