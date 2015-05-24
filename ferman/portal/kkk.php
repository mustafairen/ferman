<?
//********** portal sayfası **********
////////////////////////////////////

//portal okuma
//indexde blog çağır
if ($shf == NULL)
{
@include "portal/blog_oku.php";
}
//Günlük okuma
if ($shf == "blog" && $islem == "oku")
{
@include "portal/blog_oku.php";
}
//Günlük yorum okuma
if ($shf == "blog" && $islem == "oku_detay" && $blog_id == $_GET["blog_id"])
{
@include "portal/blog_detay.php";
}
//yorum ekleniyor
if ($shf == "yorum" && $islem == "ekle")
{
@include "portal/yorum/yorumekleisle.php";
}
//çalışmlarım okuma
if ($shf == "work" && $islem == "oku")
{
@include "portal/calisma_oku.php";
}
//dökümanlar okuma    
if ($shf == "doc" && $islem == "oku")
{
@include "portal/makale_oku.php";
}
//dökümanlar detay okuma
if ($shf == "doc" && $islem == "oku_detay" && $doc_id == $_GET["doc_id"])
{
@include "portal/makale_detay.php";
}
//hakkımda okuma
if ($shf == "hakkimda" && $islem == "oku")
{
@include "portal/hakkimda_oku.php";
}
//iletişim okuma
if ($shf == "iletisim" && $islem == "oku")
{
@include "portal/iletisim_oku.php";
}
//Ferman hakkında
if ($shf == "info" && $islem == "oku")
{
@include "gwlabs/ayarlar/info.html";
}
?>