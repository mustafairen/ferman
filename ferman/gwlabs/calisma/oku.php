<?
//giri� kontrol
@include ("giris_kontrol.php");
// oturumu baslatal�m
@session_start();
// giri� bilgilerini alal�m.
$giris=$_SESSION["giris"];
$ad=$_SESSION["user_kadi"];
// giri� kontrol� yapal�m
// giri� yap�lm�� ise $giris true olmal�
if($giris){
// giri� yap�lm�� ho�geldin..
?>
<div align="center">
<table width="250" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="138">�al��malar�m</td>
    <td width="112"><a href="?shf=work&amp;islem=ekle" class="red">�al��ma Ekle</a></td>
  </tr>
</table>

</div>
<?php
//mysql ba�lant�s�
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
//sql sorgu komutlar�

//A�A�IDAK� AYARLARI KEND�N�ZE G�RE DE���T�R�N�Z  
$limit = "5"; // Bir Sayfada G�sterilecek Kay�t Say�s�  
$kosul = "ORDER BY `calisma_id` DESC"; //Kay�tlar� Alma Ko�ulunuz.. Ko�ul Yoksa Bo� B�rak�n�z...  
$tabloadi = "calisma";  

//Toplam Kay�t Say�s� Al�n�yor 
$sorgu = mysql_query("SELECT COUNT(*) FROM  $tabloadi $kosul");       
$satir_sayisi = mysql_result($sorgu, 0);  

//Alttaki Ayarlara Dokunmay�n�z...  
@ $sayfa = abs(intval($_GET['sayfa']));  
if(empty($sayfa) || $sayfa > ceil($satir_sayisi/$limit))  
{                  
  $sayfa = 1;                  
  $baslangic = 0;          
} else {                 
  $baslangic = ($sayfa - 1) * $limit;          
}

//Veriyi Ald���n�z Kodlar.. Kendinize G�re D�zenleyiniz...  
$sorgu = mysql_query("SELECT * FROM $tabloadi $kosul LIMIT $baslangic,$limit");       
while($oku = mysql_fetch_array($sorgu))
{
?>
<div align="left" id="content2"><span class="gizle">
  <?=$oku[calisma_id]?>
  </span>
    <div class="post">
      <h2 class="title"><?=$oku[calisma_baslik]?></h2>
      <br />
      <div class="entry">
        <?=$oku[calisma_icerik]?>
      </div>
      <p class="meta"><span class="darkgolden">
        <?=$oku[calisma_tarih]?>
      </span>&nbsp;<span class="darkgolden">
        <?=$oku[calisma_gun]?>
        </span>&nbsp;g�n� yaz�lm��t�r. @
        <span class="darkgolden">
        <?=$oku[calisma_saat]?>
        </span>        &nbsp;<a href="?shf=work&amp;islem=duzelt&amp;id=<?=$oku[calisma_id]?>" class="text">D�zenle</a>&nbsp;-&nbsp;<a href="?shf=work&amp;islem=sil&amp;id=<?=$oku[calisma_id]?>">Sil</a></p>
    </div>
</div>
<div align="center">
<?php         
}           

//SAYFA NUMARALARINI YAZDIRAN FONKS�YONUMUZU �A�IRIYORUZ  
echo sayfalama($limit,$sayfa,$satir_sayisi,'?shf=work&amp;islem=oku');
//ba�lant�n�n kapat�lmas�
mysql_close ($baglanti);
?>
</div>
<?
}else{
// giri� yap�lmam�� ise ;
@include ("../../hata.php");
}
?>