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
//********** �leti�im sayfas� **********
////////////////////////////////////

//kategoriye g�re okuma i�lemi
if ($shf == "iletisim" && $islem == "oku")
{
include "gwlabs/iletisim/oku.php";
}
//kategorideki veriye id'ye g�re okuma
if ($shf == "iletisim" && $islem == "oku_detay" && $id == $_GET["iletisim_id"])
{
include "gwlabs/iletisim/konuoku.php";
}
//veri ekleme
if ($shf == "iletisim" && $islem == "ekle")
{
include "gwlabs/iletisim/ekle.php";
}
// veri ekleme i�lemi
if ($shf == "iletisim" && $islem == "ekleniyor")
{
include "gwlabs/iletisim/islem_ekle.php";
}

//veri d�zeneleme
if ($shf == "iletisim" && $islem == "duzelt")
{
include "gwlabs/iletisim/duzelt.php";
}
//veri d�zenleme i�lemi
if ($shf == "iletisim" && $islem == "duzeltiliyor")
{
include "gwlabs/iletisim/islem_duzelt.php";
}
?>
<?
}else{
// giri� yap�lmam�� ise ;
@include ("../../hata.php");
}
?>