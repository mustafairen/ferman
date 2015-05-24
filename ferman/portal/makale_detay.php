<?php
//mysql bağlantısı
@include("yonetim/db.php");
?>
<?php
//sql sorgu komutları
//AŞAĞIDAKİ AYARLARI KENDİNİZE GÖRE DEĞİŞTİRİNİZ  
$limit = "5"; // Bir Sayfada Gösterilecek Kayıt Sayısı  
$kosul = "where makale_id='$doc_id' ORDER BY `makale_id` DESC";  
$tabloadi = "makale";  
//Toplam Kayıt Sayısı Alınıyor 
$sorgu = mysql_query("SELECT COUNT(*) FROM  $tabloadi $kosul");       
//Veriyi Aldığınız Kodlar...
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