<br />
<table width="230" border="0" cellpadding="0" cellspacing="0">
<?
@include("yonetim/db.php");
$y_sorgu = @mysql_query("SELECT * FROM yorum WHERE yorum_onay='1' ORDER BY `yorum_id` DESC LIMIT 0,5 ");       
while($y_oku = mysql_fetch_array($y_sorgu))
{
?>
<tr><td>
&nbsp;&Xi;&nbsp;<a href="?shf=blog&amp;islem=oku_detay&amp;blog_id=<?=$y_oku[bolum_id]?>" class="style3">
<? print substr($y_oku[yorum_icerik],0,50) ?>...</a><br /><div align="right"><?=$y_oku[yorum_yazar]?> yorumladý...</div><br />
</td></tr>
<? }?>
</table>