<?
//giriþ kontrol
@include ("giris_kontrol.php");
// oturumu baslatalým
@session_start();
// giriþ bilgilerini alalým.
$giris=$_SESSION["giris"];
$ad=$_SESSION["cwuser_kadi"];
// giriþ kontrolü yapalým
// giriþ yapýlmýþ ise $giris true olmalý
if($giris){
// giriþ yapýlmýþ hoþgeldin..
?>
<div align="center">
<table width="220" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Baðlantýlar </td>
    <td><a href="?shf=network&amp;islem=ekle" class="red">Baðlantý Ekle</a></td>
  </tr>
</table>

</div>
<?php
//mysql baðlantýsý
include("yonetim/db.php");
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
$kosul = "ORDER BY `network_id` DESC"; //Kayýtlarý Alma Koþulunuz.. Koþul Yoksa Boþ Býrakýnýz...  
$tabloadi = "network";  

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

//Veriyi Aldýðýnýz Kodlar.. Kendinize Göre Düzenleyiniz...  
$sorgu = mysql_query("SELECT * FROM $tabloadi $kosul LIMIT $baslangic,$limit");       
while($oku = mysql_fetch_array($sorgu))
{
?>
<div align="center">
&nbsp;
<blockquote>
<table width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="133" align="left" valign="top"><span class="red">Link&nbsp;&nbsp;&nbsp;:</span></td>
    <td width="220" align="left" valign="top"><a href="http://<?=$oku[network_link]?>">
      <?=$oku[network_link]?>
    </a></td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top"><span class="red">Ýsim/Nick&nbsp;&nbsp;&nbsp;:</span></td>
    <td align="left" valign="top"><?=$oku[network_isim]?></td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top"><span class="red">Açýklama&nbsp;&nbsp;:</span></td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="left" valign="top">&nbsp;&nbsp;&nbsp;
      <?=$oku[network_icerik]?></td>
    </tr>
  <tr>
    <td colspan="3" align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="left" valign="top">örnek : <a href="http://<?=$oku[network_link]?>" title="<?=$oku[network_icerik]?>" target="_blank">
    <?=$oku[network_isim]?>
    </a></td>
    </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="right" valign="top"><a href="?shf=network&amp;islem=duzelt&amp;id=<?=$oku[network_id]?>" class="text">Düzelt</a>&nbsp;-&nbsp;<a href="?shf=network&amp;islem=sil&amp;id=<?=$oku[network_id]?>">Sil</a>&nbsp;</td>
  </tr>
</table>
</blockquote>
<li>&nbsp;</li>
 </div>
<? } ?>
<div align="center">
<?php
//SAYFA NUMARALARINI YAZDIRAN FONKSÝYONUMUZU ÇAÐIRIYORUZ  
echo sayfalama($limit,$sayfa,$satir_sayisi,'?shf=network&amp;islem=oku');
//baðlantýnýn kapatýlmasý
mysql_close ($baglanti);
?>
</div>
<?
}else{
// giriþ yapýlmamýþ ise ;
@include ("../../hata.php");
}
?>