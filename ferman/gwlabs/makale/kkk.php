<?
//giri� kontrol
@include ("giris_kontrol.php");
// oturumu baslatal�m
@session_start();
// giri� bilgilerini alal�m.
$giris=$_SESSION["giris"];
$ad=$_SESSION["cwuser_kadi"];
// giri� kontrol� yapal�m
// giri� yap�lm�� ise $giris true olmal�
if($giris){
// giri� yap�lm�� ho�geldin..
?>
<?php
//********** D�k�man-Makale sayfas� **********
////////////////////////////////////

//kategoriye g�re okuma i�lemi
if ($shf == "doc" && $islem == "oku")
{
include "gwlabs/makale/oku.php";
}
//kategorideki veriye id'ye g�re okuma
if ($shf == "doc" && $islem == "oku_detay" && $id == $_GET["makale_id"])
{
include "gwlabs/makale/konuoku.php";
}
//veri ekleme
if ($shf == "doc" && $islem == "ekle")
{
include "gwlabs/makale/ekle.php";
}
// veri ekleme i�lemi
if ($shf == "doc" && $islem == "ekleniyor")
{
include "gwlabs/makale/islem_ekle.php";
}
//veri sil
if ($shf == "doc" && $islem == "sil")
{
include "gwlabs/makale/sil.php";
}
//veri silme i�lemi
if ($shf == "doc" && $islem == "siliniyor")
{
include "gwlabs/makale/islem_sil.php";
}
//veri d�zeneleme
if ($shf == "doc" && $islem == "duzelt")
{
include "gwlabs/makale/duzelt.php";
}
//veri d�zenleme i�lemi
if ($shf == "doc" && $islem == "duzeltiliyor")
{
include "gwlabs/makale/islem_duzelt.php";
}
/*
sayfa karar kontrol mekanizmas� sonu
*/
?>
<?
}else{
// giri� yap�lmam�� ise ;
@include ("../../hata.php");
}
?>