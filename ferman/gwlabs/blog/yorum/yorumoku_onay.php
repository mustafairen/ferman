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
  <h3><a href="?shf=yorum&islem=oku_tum" target="_self" class="darkgolden"><span class="darkgolden">Onaysız Yorumlar</span></a>&nbsp;|&nbsp;Onaylı Yorumlar</h3>
</div>
<?php
@include("yonetim/db.php");

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
$limit = "7"; // Bir Sayfada Gösterilecek Kayıt Sayısı  
$kosul = " WHERE yorum_onay='1' ORDER BY `yorum_id` DESC"; //Kayıtları Alma Koşulunuz.. Koşul Yoksa Boş Bırakınız...  
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

//Veriyi Aldığınız Kodlar.. Kendinize Göre Düzenleyiniz...  
$y_sorgu = @mysql_query("SELECT * FROM $tabloadi $kosul LIMIT $baslangic,$limit");       
while($y_oku = @mysql_fetch_array($y_sorgu))
{
?>

<p>&nbsp;</p>
<div align="left" id="content2">
    <div class="post">
      <h2 class="title"><?=$y_oku[yorum_yazar]?></h2>
      <br />
      <div class="entry">
        <?=$y_oku[yorum_icerik]?>
      </div>
      <p class="meta"><span class="ext">
        <span class="darkgolden">
        <?=$y_oku[yorum_tarih]?> @ 
        <?=$y_oku[yorum_saat]?>
        </span>
        | <?=$y_oku[yazar_mail]?>
      </span>&nbsp;<a href="?shf=yorum&amp;islem=edit&amp;id=<?=$y_oku[yorum_id]?>&amp;blog_id=<?=$y_oku[bolum_id]?>" class="text">Düzenle</a>&nbsp;-&nbsp;<a href="?shf=yorum&amp;islem=sil&amp;id=<?=$y_oku[yorum_id]?>&amp;blog_id=<?=$y_oku[bolum_id]?>">Sil</a>&nbsp;-&nbsp;
	  <? if($y_oku[yorum_onay]=="0"){?><a href="?shf=yorum&amp;islem=onay&amp;id=<?=$y_oku[yorum_id]?>&amp;blog_id=<?=$y_oku[bolum_id]?>">Onayla</a><? }?>
				   <? if($y_oku[yorum_onay]=="1"){?><a href="?shf=yorum&amp;islem=onayk&amp;id=<?=$y_oku[yorum_id]?>&amp;blog_id=<?=$y_oku[bolum_id]?>">Onayı Kaldır</a><? }?></p>
  </div>
</div>
<p>
  <? }?>
</p>
<div align="center">
<?
 //SAYFA NUMARALARINI YAZDIRAN FONKSİYONUMUZU ÇAĞIRIYORUZ 
echo sayfalama($limit,$sayfa,$satir_sayisi,'?shf=yorum&amp;islem=oku_onay');
?>
</div>
	   <?
}else{
// giriş yapılmamış ise ;
@include ("../../hata.php");
}
?>