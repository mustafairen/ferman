<?php
//mysql bağlantısı
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
//sql sorgu komutları
//AŞAĞIDAKİ AYARLARI KENDİNİZE GÖRE DEĞİŞTİRİNİZ  
$limit = "5"; // Bir Sayfada Gösterilecek Kayıt Sayısı  
$kosul = "ORDER BY `makale_id` DESC";
$tabloadi = "makale";  
//Toplam Kayıt Sayısı Alınıyor 
$sorgu = mysql_query("SELECT COUNT(*) FROM  $tabloadi $kosul");       
$satir_sayisi = mysql_result($sorgu, 0);  
//Alttaki Ayarlara Dokunmayınız...  
@ $sayfa = abs(intval($_GET['sayfa']));  
if(empty($sayfa) || $sayfa > ceil($satir_sayisi/$limit))  
{                  
  $sayfa = 1;                  
  $baslangic = 0;          
} else {                 
  $baslangic = ($sayfa - 1) * $limit;          
}
//Veriyi Aldığınız Kodlar..
$sorgu = mysql_query("SELECT * FROM $tabloadi $kosul LIMIT $baslangic,$limit");       
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
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td align="left" class="siyah"><?
	  $sonuc = trim( strrev( strstr( strrev( substr($oku[makale_icerik],0,500) ), "." ))); print $sonuc;?>...</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="left" class="darkgolden">Bu konunun <a href="?shf=doc&amp;islem=oku_detay&amp;doc_id=<?=$oku[makale_id]?>"><span class="darkgolden">Tamamını Oku</span></a>&nbsp;</td>
      </tr>
  </table>
	</div>
  </div>
  <!-- metin bottom -->
  <div id="metin_bottom"><?=$oku[makale_tarih]?>&nbsp;<?=$oku[makale_gun]?>&nbsp;<span class="maroon">@</span>&nbsp;<?=$oku[makale_saat]?>&nbsp;&nbsp;</div>
</div>
<? } ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="shf">
  <tr>
    <td align="center" valign="middle">
	<?
    //SAYFA NUMARALARINI YAZDIRAN FONKSİYONUMUZU ÇAĞIRIYORUZ
	echo sayfalama($limit,$sayfa,$satir_sayisi,'?shf=doc&amp;islem=oku');
	?>
    </td>
  </tr>
</table>