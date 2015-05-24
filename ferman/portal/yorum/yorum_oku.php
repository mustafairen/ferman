<br /><br />
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
    $sayfalama .= ' <a href="'.$sayfaadi.'&amp;sayfa=1'.$adresdeger.'" class="grey">1</a><b>...</b> ';  
                 
    for($i=$from; $i <= $to; $i++)  
    {                          
      if($i == $sayfano)  
      {          
        $sayfalama .= ' <span class="red"><b>'.$i.'</b></span> ';                          
      } else {          
        $sayfalama .= ' <a href="'.$sayfaadi.'&amp;sayfa='.$i.$adresdeger.'" class="grey">'.$i.'</a> ';                          
      }                  
    }         
    if ($to < $sayfa_sayisi)  
    {  
      $sayfalama .= ' <b>...</b><a href="'.$sayfaadi.'&amp;sayfa='.$sayfa_sayisi.$adresdeger.'" class="grey"> '.$sayfa_sayisi.'</a> ';  
    }  
  }          
  if($sayfalama == "")  
  {                  
    $sayfalama = ''; //Sayfa 1         
  }          
  return $sayfalama;  
}  
?>
<?php
//sql sorgu komutları
//AŞAĞIDAKİ AYARLARI KENDİNİZE GÖRE DEĞİŞTİRİNİZ  
$limit = "7"; // Bir Sayfada Gösterilecek Kayıt Sayısı  
$kosul = "where bolum_id='$oku[blog_id]' AND yorum_onay='1' ORDER BY yorum_id ASC";  
$tabloadi = "yorum";  
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
//Veriyi Aldığınız Kodlar...  
$y_sorgu = mysql_query("SELECT * FROM $tabloadi $kosul LIMIT $baslangic,$limit");       
while($y_oku = mysql_fetch_array($y_sorgu))
{
?>
<div id="metin">
  <!-- metin top -->
  <div id="metin_top"><br /><h3>&nbsp;<?=$y_oku[yorum_yazar]?></h3></div>
  <!-- metin body -->
  <div id="metin_body">
    <div id="metin_icerik" align="left">
    <?=$y_oku[yorum_icerik]?><br /><br />
    </div>
  </div>
  <!-- metin bottom -->
  <div id="metin_bottom"><?=$y_oku[yorum_tarih]?>&nbsp;<?=$y_oku[yorum_saat]?>&nbsp;&nbsp;</div>
</div>
<br />
<? }?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="shf">
  <tr>
    <td align="center" valign="middle">
	<?
    //SAYFA NUMARALARINI YAZDIRAN FONKSİYONUMUZU ÇAĞIRIYORUZ
	echo sayfalama($limit,$sayfa,$satir_sayisi,'?shf=blog&islem=oku_detay&blog_id='.$_GET[blog_id].'');
	?>
    </td>
  </tr>
</table>
<!-- Yorum Ekle -->
<div id="metin">
  <!-- metin top -->
  <div id="metin_top">&nbsp;</div>
  <!-- metin body -->
  <div id="metin_body">
    <div id="metin_icerik" align="left">
<form id="form1" name="form1" method="post" action="?shf=yorum&islem=ekle">
           <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
             <tr>
               <td colspan="2" align="center" class="yorum_ekle">Yorum Ekle<br />
                   <br /></td>
             </tr>
             <tr>
               <td width="23%" align="left"><span class="isim">Adınız Soyadınız</span></td>
               <td width="77%" align="left"><input name="yazar" type="text" id="yazar" size="15" /></td>
             </tr>
             <tr>
               <td>&nbsp;</td>
               <td><span class="gizle">
                 <input name="blog_id" type="text" id="blog_id" value="<?=$oku[blog_id]?>" size="1" />
               </span></td>
             </tr>
             <tr>
               <td align="left"><span class="isim">Mail Adresiniz</span></td>
               <td align="left"><input name="mail" type="text" id="mail" value="@" size="15" /></td>
             </tr>
             <tr>
               <td colspan="2">&nbsp;</td>
             </tr>
             <tr>
               <td colspan="2" align="center"><textarea name="icerik" id="icerik" cols="55" rows="8"></textarea>
               </td>
             </tr>
             <tr>
               <td align="left">&nbsp;</td>
               <td align="left">&nbsp;</td>
             </tr>
             <tr>
               <td colspan="2" align="center"><input type="submit" name="button" id="button" value=" Gönder " /></td>
             </tr>
           </table>
      </form>
    </div><br />
  </div>
  <!-- metin bottom -->
  <div id="metin_bottom">&nbsp;</div>
</div>