<?
//giriþ kontrol
@include ("giris_kontrol.php");
// oturumu baslatalým
@session_start();
// giriþ bilgilerini alalým.
$giris=$_SESSION["giris"];
$ad=$_SESSION["cwuser_kadi"];
// giriþ kontrolü yapalým
// giriþ yapýlmýþ ise $giris true olmalý
if($giris){
// giriþ yapýlmýþ hoþgeldin..
?>
<?php
//********** Network sayfasý **********
////////////////////////////////////

//kategoriye göre okuma iþlemi
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
// veri ekleme iþlemi
if ($shf == "network" && $islem == "ekleniyor")
{
include "gwlabs/network/islem_ekle.php";
}
//veri sil
if ($shf == "network" && $islem == "sil")
{
include "gwlabs/network/sil.php";
}
//veri silme iþlemi
if ($shf == "network" && $islem == "siliniyor")
{
include "gwlabs/network/islem_sil.php";
}
//veri düzeneleme
if ($shf == "network" && $islem == "duzelt")
{
include "gwlabs/network/duzelt.php";
}
//veri düzenleme iþlemi
if ($shf == "network" && $islem == "duzeltiliyor")
{
include "gwlabs/network/islem_duzelt.php";
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