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
//********** Network sayfas� **********
////////////////////////////////////

//kategoriye g�re okuma i�lemi
if ($shf == "network" && $islem == "oku")
{
include "gwlabs/network/oku.php";
}
//kategorideki veriye id'ye g�re okuma
if ($shf == "network" && $islem == "oku_detay" && $id == $_GET["network_id"])
{
include "gwlabs/network/konuoku.php";
}
//veri ekleme
if ($shf == "network" && $islem == "ekle")
{
include "gwlabs/network/ekle.php";
}
// veri ekleme i�lemi
if ($shf == "network" && $islem == "ekleniyor")
{
include "gwlabs/network/islem_ekle.php";
}
//veri sil
if ($shf == "network" && $islem == "sil")
{
include "gwlabs/network/sil.php";
}
//veri silme i�lemi
if ($shf == "network" && $islem == "siliniyor")
{
include "gwlabs/network/islem_sil.php";
}
//veri d�zeneleme
if ($shf == "network" && $islem == "duzelt")
{
include "gwlabs/network/duzelt.php";
}
//veri d�zenleme i�lemi
if ($shf == "network" && $islem == "duzeltiliyor")
{
include "gwlabs/network/islem_duzelt.php";
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