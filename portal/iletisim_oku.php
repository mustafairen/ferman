<?php
//mysql baðlantýsý
@include("yonetim/db.php");
?>
<?php
//sayfalatma fonksiyonu
function sayfalama($limit,$sayfano,$satir_sayisi=0,$sayfaadi='',$adresdeger='')  
{  
  $sayfalama = '';  
  if($satir_sayisi > $limit)  
  {                  
    $sayfa_sayisi = $satir_sayisi / $limit;                  
    $sayfa_sayisi = ceil($sayfa_sayisi);                  
    if($sayfano == $sayfa_sayisi)  
    {                          
      $to = $sayfa_sayisi;                  
    } elseif($sayfano == $sayfa_sayisi - 1)  
    {                          
      $to = $sayfano + 1;                  
    } elseif($sayfano == $sayfa_sayisi - 2)  
    {                          
      $to = $sayfano + 2;                  
    } else {                          
      $to = $sayfano + 3;                  
    }                 
    if($sayfano < 4)  
    {                          
      $from = 1;                  
    } else {                          
      $from = $sayfano - 3;                  
    }  

    if (4 < $sayfano)  
    $sayfalama .= ' <a href="'.$sayfaadi.'&amp;sayfa=1'.$adresdeger.'" class="menu">1</a><b>...</b> ';  
                 
    for($i=$from; $i <= $to; $i++)  
    {                          
      if($i == $sayfano)  
      {          
        $sayfalama .= ' <span class="red"><b>'.$i.'</b></span> ';                          
      } else {          
        $sayfalama .= ' <a href="'.$sayfaadi.'&amp;sayfa='.$i.$adresdeger.'" class="menu">'.$i.'</a> ';                          
      }                  
    }         
    if ($to < $sayfa_sayisi)  
    {  
      $sayfalama .= ' <b>...</b><a href="'.$sayfaadi.'&amp;sayfa='.$sayfa_sayisi.$adresdeger.'" class="menu"> '.$sayfa_sayisi.'</a> ';  
    }  
  }          
  if($sayfalama == "")  
  {                  
    $sayfalama = '';          
  }          
  return $sayfalama;  
}  
?>
<?php
//sql sorgu komutlarý
//AÞAÐIDAKÝ AYARLARI KENDÝNÝZE GÖRE DEÐÝÞTÝRÝNÝZ  
$limit = "5"; // Bir Sayfada Gösterilecek Kayýt Sayýsý  
$kosul = "ORDER BY `iletisim_id` DESC";
$tabloadi = "iletisim";  
//Toplam Kayýt Sayýsý Alýnýyor 
$sorgu = mysql_query("SELECT COUNT(*) FROM  $tabloadi $kosul");       
$satir_sayisi = mysql_result($sorgu, 0);  
//Alttaki Ayarlara Dokunmayýnýz...  
@ $sayfa = abs(intval($_GET['sayfa']));  
if(empty($sayfa) || $sayfa > ceil($satir_sayisi/$limit))  
{                  
  $sayfa = 1;                  
  $baslangic = 0;          
} else {                 
  $baslangic = ($sayfa - 1) * $limit;          
}
//Veriyi Aldýðýnýz Kodlar...
$sorgu = mysql_query("SELECT * FROM $tabloadi $kosul LIMIT $baslangic,$limit");       
while($oku = mysql_fetch_array($sorgu))
{
?>
<div id="metin">
  <!-- metin top -->
  <div id="metin_top">&nbsp;</div>
  <!-- metin body -->
  <div id="metin_body">
    <div id="metin_icerik" align="left">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="22%" align="left" class="iletisim">Mail Adresi :</td>
      <td width="78%" align="left" class="boldbeyaz"><?=$oku[iletisim_mail]?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="left" class="iletisim">Msn Adresi :</td>
      <td align="left"  class="boldbeyaz"><?=$oku[iletisim_msn]?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" class="cp1"><?=$oku[iletisim_icerik]?></td>
    </tr>
  </table>
    </div>
  </div>
  <!-- metin bottom -->
  <div id="metin_bottom">&nbsp;</div>
</div>
<? } ?>