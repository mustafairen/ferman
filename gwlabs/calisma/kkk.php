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
//********** calisma sayfasý **********
////////////////////////////////////

//kategoriye göre okuma iþlemi
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
// veri ekleme iþlemi
if ($shf == "work" && $islem == "ekleniyor")
{
include "gwlabs/calisma/islem_ekle.php";
}
//veri sil
if ($shf == "work" && $islem == "sil")
{
include "gwlabs/calisma/sil.php";
}
//veri silme iþlemi
if ($shf == "work" && $islem == "siliniyor")
{
include "gwlabs/calisma/islem_sil.php";
}
//veri düzeneleme
if ($shf == "work" && $islem == "duzelt")
{
include "gwlabs/calisma/duzelt.php";
}
//veri düzenleme iþlemi
if ($shf == "work" && $islem == "duzeltiliyor")
{
include "gwlabs/calisma/islem_duzelt.php";
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