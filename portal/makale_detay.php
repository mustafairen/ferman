<?php
//mysql ba�lant�s�
@include("yonetim/db.php");
?>
<?php
//sql sorgu komutlar�
//A�A�IDAK� AYARLARI KEND�N�ZE G�RE DE���T�R�N�Z  
$limit = "5"; // Bir Sayfada G�sterilecek Kay�t Say�s�  
$kosul = "where makale_id='$doc_id' ORDER BY `makale_id` DESC";  
$tabloadi = "makale";  
//Toplam Kay�t Say�s� Al�n�yor 
$sorgu = mysql_query("SELECT COUNT(*) FROM  $tabloadi $kosul");       
//Veriyi Ald���n�z Kodlar...
$sorgu = mysql_query("SELECT * FROM $tabloadi $kosul ");       
while($oku = mysql_fetch_array($sorgu))
{
?>
<div class="gizle"><?=$oku[makale_id]?></div>
<div id="metin">
  <!-- metin top -->
  <div id="metin_top"><br /><h2>&nbsp;<?=$oku[makale_baslik]?></h2></div>
  <!-- metin body -->
  <div id="metin_body">
    <div id="metin_icerik" align="left">
	<?=$oku[makale_icerik]?>
	</div>
  </div>
  <!-- metin bottom -->
  <div id="metin_bottom"><?=$oku[makale_tarih]?>&nbsp;<?=$oku[makale_gun]?>&nbsp;<span class="maroon">@</span>&nbsp;<?=$oku[makale_saat]?>&nbsp;&nbsp;</div>
</div>
<? } ?>