<?php
//mysql baðlantýsý
@include("yonetim/db.php");
$sorgu_avatar = mysql_query("SELECT * FROM portal");       
while($oku_avtr = mysql_fetch_array($sorgu_avatar))
{
$avatar=$oku_avtr[portal_avatar];
$nick=$oku_avtr[portal_nick];
}
?>
<?
//baðlantýnýn kapatýlmasý
@mysql_close ($baglanti);
?>