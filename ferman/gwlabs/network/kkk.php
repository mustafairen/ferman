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
//********** Network sayfası **********
////////////////////////////////////

//kategoriye göre okuma işlemi
if ($shf == "network" && $islem == "oku")
{
include "gwlabs/network/oku.php";
}
//kategorideki veriye id'ye göre okuma
if ($shf == "network" && $islem == "oku_detay" && $id == $_GET["network_id"])
{
include "gwlabs/network/konuoku.php";
}
//veri ekleme
if ($shf == "network" && $islem == "ekle")
{
include "gwlabs/network/ekle.php";
}
// veri ekleme işlemi
if ($shf == "network" && $islem == "ekleniyor")
{
include "gwlabs/network/islem_ekle.php";
}
//veri sil
if ($shf == "network" && $islem == "sil")
{
include "gwlabs/network/sil.php";
}
//veri silme işlemi
if ($shf == "network" && $islem == "siliniyor")
{
include "gwlabs/network/islem_sil.php";
}
//veri düzeneleme
if ($shf == "network" && $islem == "duzelt")
{
include "gwlabs/network/duzelt.php";
}
//veri düzenleme işlemi
if ($shf == "network" && $islem == "duzeltiliyor")
{
include "gwlabs/network/islem_duzelt.php";
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