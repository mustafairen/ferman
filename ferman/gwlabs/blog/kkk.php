<?
//giriþ kontrol
@include ("giris_kontrol.php");
// oturumu baslatalým
@session_start();
// giriþ bilgilerini alalým.
$giris=$_SESSION["giris"];
$ad=$_SESSION["user_kadi"];
// giriþ kontrolü yapalým
// giriþ yapýlmýþ ise $giris true olmalý
if($giris){
// giriþ yapýlmýþ hoþgeldin..
?>
<?php
//********** blog sayfasý **********
////////////////////////////////////

//kategoriye göre okuma iþlemi
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
// veri ekleme iþlemi
if ($shf == "blog" && $islem == "ekleniyor")
{
include "gwlabs/blog/islem_ekle.php";
}
//veri sil
if ($shf == "blog" && $islem == "sil")
{
include "gwlabs/blog/sil.php";
}
//veri silme iþlemi
if ($shf == "blog" && $islem == "siliniyor")
{
include "gwlabs/blog/islem_sil.php";
}
//veri düzeneleme
if ($shf == "blog" && $islem == "duzelt")
{
include "gwlabs/blog/duzelt.php";
}
//veri düzenleme iþlemi
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
//yorum edit iþlem
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
//yorum onay kaldýr
if ($shf == "yorum" && $islem == "onayk")
{
include "gwlabs/blog/yorum/yorumonaykaldir.php";
}
//onaysýzlar
if ($shf == "yorum" && $islem == "oku_tum")
{
include "gwlabs/blog/yorum/yorumoku_tum.php";
}
// onaylýlar
if ($shf == "yorum" && $islem == "oku_onay")
{
include "gwlabs/blog/yorum/yorumoku_onay.php";
}
/*
sayfa karar kontrol mekanizmasý sonu
*/
?>
<?
}else{
// giriþ yapýlmamýþ ise ;
@include ("../../../hata.php");
}
?>