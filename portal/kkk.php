<?
//********** portal sayfas� **********
////////////////////////////////////

//portal okuma
//indexde blog �a��r
if ($shf == NULL)
{
@include "portal/blog_oku.php";
}
//G�nl�k okuma
if ($shf == "blog" && $islem == "oku")
{
@include "portal/blog_oku.php";
}
//G�nl�k yorum okuma
if ($shf == "blog" && $islem == "oku_detay" && $blog_id == $_GET["blog_id"])
{
@include "portal/blog_detay.php";
}
//yorum ekleniyor
if ($shf == "yorum" && $islem == "ekle")
{
@include "portal/yorum/yorumekleisle.php";
}
//�al��mlar�m okuma
if ($shf == "work" && $islem == "oku")
{
@include "portal/calisma_oku.php";
}
//d�k�manlar okuma    
if ($shf == "doc" && $islem == "oku")
{
@include "portal/makale_oku.php";
}
//d�k�manlar detay okuma
if ($shf == "doc" && $islem == "oku_detay" && $doc_id == $_GET["doc_id"])
{
@include "portal/makale_detay.php";
}
//hakk�mda okuma
if ($shf == "hakkimda" && $islem == "oku")
{
@include "portal/hakkimda_oku.php";
}
//ileti�im okuma
if ($shf == "iletisim" && $islem == "oku")
{
@include "portal/iletisim_oku.php";
}
//Ferman hakk�nda
if ($shf == "info" && $islem == "oku")
{
@include "gwlabs/ayarlar/info.html";
}
?>