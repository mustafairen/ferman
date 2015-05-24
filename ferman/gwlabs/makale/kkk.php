<?
//giriş kontrol
@include ("giris_kontrol.php");
// oturumu baslatalım
@session_start();
// giriş bilgilerini alalım.
$giris=$_SESSION["giris"];
$ad=$_SESSION["cwuser_kadi"];
// giriş kontrolü yapalım
// giriş yapılmış ise $giris true olmalı
if($giris){
// giriş yapılmış hoşgeldin..
?>
<?php
//********** Döküman-Makale sayfası **********
////////////////////////////////////

//kategoriye göre okuma işlemi
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
// veri ekleme işlemi
if ($shf == "doc" && $islem == "ekleniyor")
{
include "gwlabs/makale/islem_ekle.php";
}
//veri sil
if ($shf == "doc" && $islem == "sil")
{
include "gwlabs/makale/sil.php";
}
//veri silme işlemi
if ($shf == "doc" && $islem == "siliniyor")
{
include "gwlabs/makale/islem_sil.php";
}
//veri düzeneleme
if ($shf == "doc" && $islem == "duzelt")
{
include "gwlabs/makale/duzelt.php";
}
//veri düzenleme işlemi
if ($shf == "doc" && $islem == "duzeltiliyor")
{
include "gwlabs/makale/islem_duzelt.php";
}
/*
sayfa karar kontrol mekanizması sonu
*/
?>
<?
}else{
// giriş yapılmamış ise ;
@include ("../../hata.php");
}
?>