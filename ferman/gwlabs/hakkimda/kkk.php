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
<?php
//********** Hakkımda sayfası **********
////////////////////////////////////

//kategoriye göre okuma işlemi
if ($shf == "hakkimda" && $islem == "oku")
{
include "gwlabs/hakkimda/oku.php";
}
//kategorideki veriye id'ye göre okuma
if ($shf == "hakkimda" && $islem == "oku_detay" && $id == $_GET["hakkimda_id"])
{
include "gwlabs/hakkimda/konuoku.php";
}
//veri ekleme
if ($shf == "hakkimda" && $islem == "ekle")
{
include "gwlabs/hakkimda/ekle.php";
}
// veri ekleme işlemi
if ($shf == "hakkimda" && $islem == "ekleniyor")
{
include "gwlabs/hakkimda/islem_ekle.php";
}
//veri sil
if ($shf == "hakkimda" && $islem == "sil")
{
include "gwlabs/hakkimda/sil.php";
}
//veri silme işlemi
if ($shf == "hakkimda" && $islem == "siliniyor")
{
include "gwlabs/hakkimda/islem_sil.php";
}
//veri düzeneleme
if ($shf == "hakkimda" && $islem == "duzelt")
{
include "gwlabs/hakkimda/duzelt.php";
}
//veri düzenleme işlemi
if ($shf == "hakkimda" && $islem == "duzeltiliyor")
{
include "gwlabs/hakkimda/islem_duzelt.php";
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