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
//********** calisma sayfası **********
////////////////////////////////////

//kategoriye göre okuma işlemi
if ($shf == "work" && $islem == "oku")
{
include "gwlabs/calisma/oku.php";
}
//kategorideki veriye id'ye göre okuma
if ($shf == "work" && $islem == "oku_detay" && $id == $_GET["calisma_id"])
{
include "gwlabs/calisma/konuoku.php";
}
//veri ekleme
if ($shf == "work" && $islem == "ekle")
{
include "gwlabs/calisma/ekle.php";
}
// veri ekleme işlemi
if ($shf == "work" && $islem == "ekleniyor")
{
include "gwlabs/calisma/islem_ekle.php";
}
//veri sil
if ($shf == "work" && $islem == "sil")
{
include "gwlabs/calisma/sil.php";
}
//veri silme işlemi
if ($shf == "work" && $islem == "siliniyor")
{
include "gwlabs/calisma/islem_sil.php";
}
//veri düzeneleme
if ($shf == "work" && $islem == "duzelt")
{
include "gwlabs/calisma/duzelt.php";
}
//veri düzenleme işlemi
if ($shf == "work" && $islem == "duzeltiliyor")
{
include "gwlabs/calisma/islem_duzelt.php";
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