<?php
//mysql ba�lant�s�
@include("yonetim/db.php");
$sorgu_avatar = mysql_query("SELECT * FROM portal");       
while($oku_avtr = mysql_fetch_array($sorgu_avatar))
{
$avatar=$oku_avtr[portal_avatar];
$nick=$oku_avtr[portal_nick];
}
?>
<?
//ba�lant�n�n kapat�lmas�
@mysql_close ($baglanti);
?>