<div align="left">
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
<div align="center">
<a href="?shf=yorum&islem=oku_tum" target="_self" class="darkgolden"><span class="darkgolden">Onaysýz Yorumlar</span></a>&nbsp;|&nbsp;
<a href="?shf=yorum&islem=oku_onay" target="_self" class="darkgolden"><span class="darkgolden">Onaylý Yorumlar</span></a>
<br /><br />
</div>
<div align="center">
<table width="250" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Günlük Okuma Bölümü </td>
    <td><a href="?shf=blog&amp;islem=ekle" class="red">Günlük Yaz</a></td>
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
$kosul = "ORDER BY `blog_id` DESC"; //Kayýtlarý Alma Koþulunuz.. Koþul Yoksa Boþ Býrakýnýz...  
$tabloadi = "blog";  

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
<div align="left" id="content2"><span class="gizle"><?=$oku[blog_id]?></span>
  <div class="post">
    <h2 class="title"><a href="?shf=blog&amp;islem=oku_detay&amp;blog_id=<?=$oku[blog_id]?>">
      <?=$oku[blog_baslik]?></a></h2>
    <br />
    <div class="entry"><?=$oku[blog_icerik]?></div>
    <p class="meta"><?=$oku[blog_tarih]?>&nbsp;<?=$oku[blog_gun]?>&nbsp;günü yazýlmýþtýr. @ <?=$oku[blog_saat]?>
    &nbsp;<a href="?shf=blog&amp;islem=duzelt&amp;id=<?=$oku[blog_id]?>" class="text">Düzenle</a>&nbsp;-&nbsp;<a href="?shf=blog&amp;islem=sil&amp;id=<?=$oku[blog_id]?>">Sil</a></p>
  </div>
  </div>
<?
}
?>
<div align="center">
<?php
//SAYFA NUMARALARINI YAZDIRAN FONKSÝYONUMUZU ÇAÐIRIYORUZ 

echo sayfalama($limit,$sayfa,$satir_sayisi,'?shf=blog&amp;islem=oku');
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
</div>