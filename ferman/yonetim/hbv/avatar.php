<?php
//mysql bağlantısı
@include("yonetim/db.php");
$sorgu_avatar = mysql_query("SELECT * FROM portal");       
while($oku_avtr = mysql_fetch_array($sorgu_avatar))
{
$avatar=$oku_avtr[portal_avatar];
$nick=$oku_avtr[portal_nick];
}
?>
<?
//bağlantının kapatılması
@mysql_close ($baglanti);
?>