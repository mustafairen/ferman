<?
//giriş kontrol
@include ("giris_kontrol.php");
// oturumu baslatalım
@session_start();
// giriş bilgilerini alalım.
$giris=$_SESSION["giris"];
$ad=$_SESSION["user_kadi"];
// giriş kontrolü yapalım
// giriş yapılmış ise $giris true olmalı
if($giris){
// giriş yapılmış hoşgeldin..
?>
<div align="center">
<a href="?shf=yorum&islem=oku_tum" target="_self" class="darkgolden"><span class="darkgolden">Onaysız Yorumlar</span></a>&nbsp;|&nbsp;
<a href="?shf=yorum&islem=oku_onay" target="_self" class="darkgolden"><span class="darkgolden">Onaylı Yorumlar</span></a>
<br />
</div>
<div align="center">
<table width="200" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Günlük Okuma Bölümü </td>
    <td>&nbsp;</td>
  </tr>
</table>

</div>
<?php
//mysql bağlantısı
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
//sql sorgu komutları

//AŞAĞIDAKİ AYARLARI KENDİNİZE GÖRE DEĞİŞTİRİNİZ  
$limit = "5"; // Bir Sayfada Gösterilecek Kayıt Sayısı  
$kosul = "where blog_id='$blog_id' ORDER BY `blog_id` DESC"; //Kayıtları Alma Koşulunuz.. Koşul Yoksa Boş Bırakınız...  
$tabloadi = "blog";  

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

//Veriyi Aldığınız Kodlar.. Kendinize Göre Düzenleyiniz...  
$sorgu = mysql_query("SELECT * FROM $tabloadi $kosul LIMIT $baslangic,$limit");       
while($oku = mysql_fetch_array($sorgu))
{
?>
<div align="left" id="content2"><span class="gizle">
  <?=$oku[blog_id]?>
  </span>
    <div class="post">
      <h2 class="title"><a href="?shf=blog&amp;islem=oku_detay&amp;blog_id=<?=$oku[blog_id]?>">
        <?=$oku[blog_baslik]?>
      </a></h2>
      <br />
      <div class="entry">
        <?=$oku[blog_icerik]?>
      </div>
      <p class="meta">
        <?=$oku[blog_tarih]?>
        &nbsp;
        <?=$oku[blog_gun]?>
        &nbsp;günü yazılmıştır. @
        <?=$oku[blog_saat]?>
        &nbsp;<a href="?shf=blog&amp;islem=duzelt&amp;id=<?=$oku[blog_id]?>" class="text">Düzenle</a>&nbsp;-&nbsp;<a href="?shf=blog&amp;islem=sil&amp;id=<?=$oku[blog_id]?>" class="red">Sil</a></p>
    </div>
</div>
<div>
<? include"gwlabs/blog/yorum/yorum_oku.php";?>
</div>
<div align="center">
<?php         
}           

//SAYFA NUMARALARINI YAZDIRAN FONKSİYONUMUZU ÇAĞIRIYORUZ  
echo sayfalama($limit,$sayfa,$satir_sayisi,'?shf=blog&amp;islem=oku');
?>
</div>
<?php
//bağlantının kapatılması
mysql_close ($baglanti);
?>
<?
}else{
// giriş yapılmamış ise ;
@include ("../../hata.php");
}
?>