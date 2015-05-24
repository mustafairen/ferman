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
//********** İletişim sayfası **********
////////////////////////////////////

//kategoriye göre okuma işlemi
if ($shf == "iletisim" && $islem == "oku")
{
include "gwlabs/iletisim/oku.php";
}
//kategorideki veriye id'ye göre okuma
if ($shf == "iletisim" && $islem == "oku_detay" && $id == $_GET["iletisim_id"])
{
include "gwlabs/iletisim/konuoku.php";
}
//veri ekleme
if ($shf == "iletisim" && $islem == "ekle")
{
include "gwlabs/iletisim/ekle.php";
}
// veri ekleme işlemi
if ($shf == "iletisim" && $islem == "ekleniyor")
{
include "gwlabs/iletisim/islem_ekle.php";
}

//veri düzeneleme
if ($shf == "iletisim" && $islem == "duzelt")
{
include "gwlabs/iletisim/duzelt.php";
}
//veri düzenleme işlemi
if ($shf == "iletisim" && $islem == "duzeltiliyor")
{
include "gwlabs/iletisim/islem_duzelt.php";
}
?>
<?
}else{
// giriş yapılmamış ise ;
@include ("../../hata.php");
}
?>