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
<?php
//********** Hakk�mda sayfas� **********
////////////////////////////////////

//kategoriye g�re okuma i�lemi
if ($shf == "hakkimda" && $islem == "oku")
{
include "gwlabs/hakkimda/oku.php";
}
//kategorideki veriye id'ye g�re okuma
if ($shf == "hakkimda" && $islem == "oku_detay" && $id == $_GET["hakkimda_id"])
{
include "gwlabs/hakkimda/konuoku.php";
}
//veri ekleme
if ($shf == "hakkimda" && $islem == "ekle")
{
include "gwlabs/hakkimda/ekle.php";
}
// veri ekleme i�lemi
if ($shf == "hakkimda" && $islem == "ekleniyor")
{
include "gwlabs/hakkimda/islem_ekle.php";
}
//veri sil
if ($shf == "hakkimda" && $islem == "sil")
{
include "gwlabs/hakkimda/sil.php";
}
//veri silme i�lemi
if ($shf == "hakkimda" && $islem == "siliniyor")
{
include "gwlabs/hakkimda/islem_sil.php";
}
//veri d�zeneleme
if ($shf == "hakkimda" && $islem == "duzelt")
{
include "gwlabs/hakkimda/duzelt.php";
}
//veri d�zenleme i�lemi
if ($shf == "hakkimda" && $islem == "duzeltiliyor")
{
include "gwlabs/hakkimda/islem_duzelt.php";
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