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
//********** blog sayfası **********
////////////////////////////////////

//kategoriye göre okuma işlemi
if ($shf == "blog" && $islem == "oku")
{
include "gwlabs/blog/oku.php";
}
//kategorideki veriye id'ye göre okuma
if ($shf == "blog" && $islem == "oku_detay" && $blog_id == $_GET["blog_id"])
{
include "gwlabs/blog/konuoku.php";
}
//veri ekleme
if ($shf == "blog" && $islem == "ekle")
{
include "gwlabs/blog/ekle.php";
}
// veri ekleme işlemi
if ($shf == "blog" && $islem == "ekleniyor")
{
include "gwlabs/blog/islem_ekle.php";
}
//veri sil
if ($shf == "blog" && $islem == "sil")
{
include "gwlabs/blog/sil.php";
}
//veri silme işlemi
if ($shf == "blog" && $islem == "siliniyor")
{
include "gwlabs/blog/islem_sil.php";
}
//veri düzeneleme
if ($shf == "blog" && $islem == "duzelt")
{
include "gwlabs/blog/duzelt.php";
}
//veri düzenleme işlemi
if ($shf == "blog" && $islem == "duzeltiliyor")
{
include "gwlabs/blog/islem_duzelt.php";
}

//************yorum bölümü***************
//yorum yaz
if ($shf == "yorum" && $islem == "ekle")
{
include "gwlabs/blog/yorum/yorumekleisle.php";
}
//yorum edit
if ($shf == "yorum" && $islem == "edit")
{
include "gwlabs/blog/yorum/yorumedit.php";
}
//yorum edit işlem
if ($shf == "yorum" && $islem == "editisle")
{
include "gwlabs/blog/yorum/yorumeditisle.php";
}
//yorum sil
if ($shf == "yorum" && $islem == "sil")
{
include "gwlabs/blog/yorum/sil.php";
}
//yorum siliniyor
if ($shf == "yorum" && $islem == "siliniyor")
{
include "gwlabs/blog/yorum/islem_sil.php";
}
//yorum onay
if ($shf == "yorum" && $islem == "onay")
{
include "gwlabs/blog/yorum/yorumonay.php";
}
//yorum onay kaldır
if ($shf == "yorum" && $islem == "onayk")
{
include "gwlabs/blog/yorum/yorumonaykaldir.php";
}
//onaysızlar
if ($shf == "yorum" && $islem == "oku_tum")
{
include "gwlabs/blog/yorum/yorumoku_tum.php";
}
// onaylılar
if ($shf == "yorum" && $islem == "oku_onay")
{
include "gwlabs/blog/yorum/yorumoku_onay.php";
}
/*
sayfa karar kontrol mekanizması sonu
*/
?>
<?
}else{
// giriş yapılmamış ise ;
@include ("../../../hata.php");
}
?>