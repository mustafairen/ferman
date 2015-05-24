<div align="center">
<div id="example1"></div>
<p id="example2">Ferman LOG System</p>
<script type="text/javascript">
//Define first typing example:
new TypingText(document.getElementById("example1"));
//Define second typing example (use "slashing" cursor at the end):
new TypingText(document.getElementById("example2"), 100, function(i){ var ar = new Array("\\", "|", "/", "-"); return " " + ar[i.length % ar.length]; });
//Type out examples:
TypingText.runAll();
</script>
</div><br />
<div align="right">
<script language="JavaScript">
//Refresh page script- By Brett Taylor (glutnix@yahoo.com.au)
//Modified by Dynamic Drive for NS4, NS6+
//Visit http://www.dynamicdrive.com for this script
//configure refresh interval (in seconds)
var countDownInterval=1000;
//configure width of displayed text, in px (applicable only in NS4)
var c_reloadwidth=200
</script>
<ilayer id="c_reload" width=&{c_reloadwidth}; ><layer id="c_reload2" width=&{c_reloadwidth}; left=0 top=0></layer></ilayer>
<script>
var countDownTime=countDownInterval+1;
function countDown(){
countDownTime--;
if (countDownTime <=0){
countDownTime=countDownInterval;
clearTimeout(counter)
window.location.reload()
return
}
if (document.all) //if IE 4+
document.all.countDownText.innerText = countDownTime+" ";
else if (document.getElementById) //else if NS6+
document.getElementById("countDownText").innerHTML=countDownTime+" "
else if (document.layers){ //CHANGE TEXT BELOW TO YOUR OWN
document.c_reload.document.c_reload2.document.write('Next <a href="javascript:window.location.reload()">refresh</a> in <b id="countDownText">'+countDownTime+' </b> seconds')
document.c_reload.document.c_reload2.document.close()
}
counter=setTimeout("countDown()", 1000);
}
function startit(){
if (document.all||document.getElementById) //CHANGE TEXT BELOW TO YOUR OWN
document.write('<b id="countDownText">'+countDownTime+' </b> saniye sonra veriler <a href="javascript:window.location.reload()">güncelle</a>necektir. ')
countDown()
}
if (document.all||document.getElementById)
startit()
else
window.onload=startit
</script>
</div><br />
<table width="750" border="1" align="center" cellpadding="3" cellspacing="0" bordercolor="#333333">
<?
include "yonetim/db.php";
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
$limit = "20"; // Bir Sayfada Gösterilecek Kayýt Sayýsý  
$kosul = "ORDER BY `log_id` DESC"; //Kayýtlarý Alma Koþulunuz.. Koþul Yoksa Boþ Býrakýnýz...  
$tabloadi = "log";  

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
$log_oku_sorgu = mysql_query("SELECT * FROM $tabloadi $kosul LIMIT $baslangic,$limit");       
while($x_oku = mysql_fetch_array($log_oku_sorgu))
{
?>
<tr>
    <td width="20" align="center" valign="middle"><span class="id_renk"><?=$x_oku[log_id]?>&nbsp;</span></td>
    <td width="100" height="25" align="center" valign="middle"><span class="yesil"><?=$x_oku[log_tarih]?></span>&nbsp;</td>
    <td width="100" align="center" valign="middle"><span class="yesil"><?=$x_oku[log_saat]?></span>&nbsp;</td>
    <td width="200" align="center" valign="middle"><span class="yesil"><?=$x_oku[log_ip]?></span>&nbsp;</td>
    <td align="center" valign="middle"><a href="<?=$x_oku[log_site_url]?>" target="_blank" title="<?=$x_oku[log_site_url]?>"><span class="log_renk">Nereyi Gezdi ?</span></a>&nbsp;</td>
</tr>
<tr>
    <td height="25" colspan="3" align="left" valign="middle">&nbsp;
      <a href="<?=$x_oku[log_referans]?>" target="_blank" title="<?=$x_oku[log_referans]?>"><span class="log_renk">Nereden Geldi ?</span></a>&nbsp;</td>
    <td align="center" valign="middle"><a href="#" target="_blank" title="<?=$x_oku[log_sistem]?>"><span class="log_renk">Ýþletim sistemi</span></a>&nbsp;</td>
    <td align="right" valign="middle">
    <a href="?shf=ayarlar&amp;islem=log_sil&amp;id=<?=$x_oku[log_id]?>" class="red">Log Sil</a>
    &nbsp;</td>
</tr>
<tr>
    <td height="25" colspan="5" align="left" valign="middle" bgcolor="#333333">&nbsp;</td>
    </tr>
<?
}
?>  
</table>
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="shf">
  <tr>
    <td align="center" valign="middle">
	<?
    //SAYFA NUMARALARINI YAZDIRAN FONKSÝYONUMUZU ÇAÐIRIYORUZ
	echo sayfalama($limit,$sayfa,$satir_sayisi,'?shf=ayarlar&amp;islem=log_oku');
	?>
    </td>
  </tr>
</table>
</div>
<!-- Tasarým Doðmamýþ Bebeðe Don Biçmektir. -->
<!-- Cyber Life AREA (c) 2004-2007 -->