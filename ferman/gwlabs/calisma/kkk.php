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
//********** calisma sayfas� **********
////////////////////////////////////

//kategoriye g�re okuma i�lemi
if ($shf == "work" && $islem == "oku")
{
include "gwlabs/calisma/oku.php";
}
//kategorideki veriye id'ye g�re okuma
if ($shf == "work" && $islem == "oku_detay" && $id == $_GET["calisma_id"])
{
include "gwlabs/calisma/konuoku.php";
}
//veri ekleme
if ($shf == "work" && $islem == "ekle")
{
include "gwlabs/calisma/ekle.php";
}
// veri ekleme i�lemi
if ($shf == "work" && $islem == "ekleniyor")
{
include "gwlabs/calisma/islem_ekle.php";
}
//veri sil
if ($shf == "work" && $islem == "sil")
{
include "gwlabs/calisma/sil.php";
}
//veri silme i�lemi
if ($shf == "work" && $islem == "siliniyor")
{
include "gwlabs/calisma/islem_sil.php";
}
//veri d�zeneleme
if ($shf == "work" && $islem == "duzelt")
{
include "gwlabs/calisma/duzelt.php";
}
//veri d�zenleme i�lemi
if ($shf == "work" && $islem == "duzeltiliyor")
{
include "gwlabs/calisma/islem_duzelt.php";
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