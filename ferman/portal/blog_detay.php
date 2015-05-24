<?php
//mysql bağlantısı
@include("yonetim/db.php");
?>
<?php
//sql sorgu komutları
//AŞAĞIDAKİ AYARLARI KENDİNİZE GÖRE DEĞİŞTİRİNİZ  
$limit = "5"; // Bir Sayfada Gösterilecek Kayıt Sayısı  
$kosul = "where blog_id='$blog_id' ORDER BY `blog_id` DESC";  
$tabloadi = "blog";  
//Toplam Kayıt Sayısı Alınıyor 
$sorgu = mysql_query("SELECT COUNT(*) FROM  $tabloadi $kosul");       
//Veriyi Aldığınız Kodlar...  
$sorgu = mysql_query("SELECT * FROM $tabloadi $kosul");       
while($oku = mysql_fetch_array($sorgu))
{
?>
<div class="gizle"><?=$oku[blog_id]?></div>
<div id="metin">
  <!-- metin top -->
  <div id="metin_top"><br /><h3>&nbsp;<?=$oku[blog_baslik]?></h3></div>
  <!-- metin body -->
  <div id="metin_body">
    <div id="metin_icerik" align="left">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td align="left" class="siyah"><?=$oku[blog_icerik]?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table><br />
    </div>
  </div>
  <!-- metin bottom -->
  <div id="metin_bottom"><?=$oku[blog_tarih]?>&nbsp;<?=$oku[blog_gun]?>&nbsp;<span class="maroon">@</span>&nbsp;<?=$oku[blog_saat]?>&nbsp;&nbsp;</div>
</div>
<div><? @include"portal/yorum/yorum_oku.php";?></div>
<div align="center">
<?        
}           
?>
</div>