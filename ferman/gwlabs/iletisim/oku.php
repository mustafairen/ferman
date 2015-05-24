<?
//giriþ kontrol
@include ("giris_kontrol.php");
// oturumu baslatalým
@session_start();
// giriþ bilgilerini alalým.
$giris=$_SESSION["giris"];
$ad=$_SESSION["user_kadi"];
// giriþ kontrolü yapalým
// giriþ yapýlmýþ ise $giris true olmalý
if($giris){
// giriþ yapýlmýþ hoþgeldin..
?>
<?php
//mysql baðlantýsý
include("yonetim/db.php");
?>
<div align="center">
<table width="200" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Ýletiþim  </td>
    <? $ekle_kont=@mysql_result(mysql_query("SELECT iletisim_id FROM iletisim"),0);
	if (empty($ekle_kont)){
	?><td><a href="?shf=iletisim&amp;islem=ekle" class="red">Bilgi Ekle</a></td><? }?>
  </tr>
</table>

</div>

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
$kosul = "ORDER BY `iletisim_id` DESC"; //Kayýtlarý Alma Koþulunuz.. Koþul Yoksa Boþ Býrakýnýz...  
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

//Veriyi Aldýðýnýz Kodlar.. Kendinize Göre Düzenleyiniz...  
$sorgu = mysql_query("SELECT * FROM $tabloadi $kosul LIMIT $baslangic,$limit");       
while($oku = mysql_fetch_array($sorgu))
{
?>
<div align="center">
  <div>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#FF0000">
      <tr>
        <td colspan="2" align="left" valign="top" class="red"><div class="gizle">
            <?=$oku[iletisim_id]?>
          </div>Mail Adresi : <span class="boldbeyaz">
            <?=$oku[iletisim_mail]?>
          </span> </td>
      </tr>
      <tr>
        <td colspan="2" align="left" valign="top"></td>
      </tr>
      <tr>
        <td colspan="2" align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="left" valign="top"><span class="red">Msn Adresi :</span>
            <?=$oku[iletisim_msn]?>
        </td>
      </tr>
      <tr>
        <td colspan="2" align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td  colspan="2" align="left" valign="top"><span class="red">Açýklama&nbsp;&nbsp;&nbsp;&nbsp;:</span>
            <?=$oku[iletisim_icerik]?></td>
      </tr>
      <tr>
        <td width="943" align="left" valign="top">&nbsp;</td>
        <td align="right" valign="top"><a href="?shf=iletisim&amp;islem=duzelt&amp;id=<?=$oku[iletisim_id]?>" class="text">Düzelt</a></td>
      </tr>
    </table>
  </div>
</div>
<div align="center">
<?php         
}           

//SAYFA NUMARALARINI YAZDIRAN FONKSÝYONUMUZU ÇAÐIRIYORUZ  
echo sayfalama($limit,$sayfa,$satir_sayisi,'?shf=iletisim&amp;islem=oku');
?>
</div>
<?php
//baðlantýnýn kapatýlmasý
mysql_close ($baglanti);
?>
<?
}else{
// giriþ yapýlmamýþ ise ;
@include ("../../hata.php");
}
?>