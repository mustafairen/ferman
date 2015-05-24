<br />
<?
@include("yonetim/db.php");
$sorgu = @mysql_query("SELECT * FROM network ORDER BY `network_id`");       
while($network_oku = mysql_fetch_array($sorgu))
{
?>
&nbsp;&fnof;&nbsp;<a href="http://<?=$network_oku[network_link]?>" title="<?=$network_oku[network_icerik]?>" target="_blank" class="cp1"><span class="cp1"><?=$network_oku[network_isim]?></span></a><br />
<? }?>