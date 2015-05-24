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
//********** Hakkýmda sayfasý **********
////////////////////////////////////

//kategoriye göre okuma iþlemi
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
// veri ekleme iþlemi
if ($shf == "hakkimda" && $islem == "ekleniyor")
{
include "gwlabs/hakkimda/islem_ekle.php";
}
//veri sil
if ($shf == "hakkimda" && $islem == "sil")
{
include "gwlabs/hakkimda/sil.php";
}
//veri silme iþlemi
if ($shf == "hakkimda" && $islem == "siliniyor")
{
include "gwlabs/hakkimda/islem_sil.php";
}
//veri düzeneleme
if ($shf == "hakkimda" && $islem == "duzelt")
{
include "gwlabs/hakkimda/duzelt.php";
}
//veri düzenleme iþlemi
if ($shf == "hakkimda" && $islem == "duzeltiliyor")
{
include "gwlabs/hakkimda/islem_duzelt.php";
}
/*
sayfa karar kontrol mekanizmasý sonu
*/
?>
<?
}else{
// giriþ yapýlmamýþ ise ;
@include ("../../hata.php");
}
?>