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
//********** blog sayfas� **********
////////////////////////////////////

//kategoriye g�re okuma i�lemi
if ($shf == "blog" && $islem == "oku")
{
include "gwlabs/blog/oku.php";
}
//kategorideki veriye id'ye g�re okuma
if ($shf == "blog" && $islem == "oku_detay" && $blog_id == $_GET["blog_id"])
{
include "gwlabs/blog/konuoku.php";
}
//veri ekleme
if ($shf == "blog" && $islem == "ekle")
{
include "gwlabs/blog/ekle.php";
}
// veri ekleme i�lemi
if ($shf == "blog" && $islem == "ekleniyor")
{
include "gwlabs/blog/islem_ekle.php";
}
//veri sil
if ($shf == "blog" && $islem == "sil")
{
include "gwlabs/blog/sil.php";
}
//veri silme i�lemi
if ($shf == "blog" && $islem == "siliniyor")
{
include "gwlabs/blog/islem_sil.php";
}
//veri d�zeneleme
if ($shf == "blog" && $islem == "duzelt")
{
include "gwlabs/blog/duzelt.php";
}
//veri d�zenleme i�lemi
if ($shf == "blog" && $islem == "duzeltiliyor")
{
include "gwlabs/blog/islem_duzelt.php";
}

//************yorum b�l�m�***************
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
//yorum edit i�lem
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
//yorum onay kald�r
if ($shf == "yorum" && $islem == "onayk")
{
include "gwlabs/blog/yorum/yorumonaykaldir.php";
}
//onays�zlar
if ($shf == "yorum" && $islem == "oku_tum")
{
include "gwlabs/blog/yorum/yorumoku_tum.php";
}
// onayl�lar
if ($shf == "yorum" && $islem == "oku_onay")
{
include "gwlabs/blog/yorum/yorumoku_onay.php";
}
/*
sayfa karar kontrol mekanizmas� sonu
*/
?>
<?
}else{
// giri� yap�lmam�� ise ;
@include ("../../../hata.php");
}
?>