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
<div align="left"><h3>Yorumlar</h3></div><br />

            <?
			 $y_sorgu = mysql_query("select * from yorum where bolum_id='$oku[blog_id]' AND yorum_onay = '1' ORDER BY yorum_id DESC");       
while($y_oku = mysql_fetch_array($y_sorgu)){
?>
       <table width="100%" border="0" cellspacing="0" cellpadding="0">
         <tr>
           <td align="left" valign="top">
           <div align="left" id="content2">
             <div class="post">
                   <h5 class="title"><?=$y_oku[yorum_yazar]?></h5>
                   <br />
                   <div >
                     <blockquote><?=$y_oku[yorum_icerik]?></blockquote>
                   </div>
                   <p class="meta"><span class="ext"> <span class="darkgolden">
                     <?=$y_oku[yorum_tarih]?>
                     @
                     <?=$y_oku[yorum_saat]?>
                     </span> |
                     <?=$y_oku[yazar_mail]?>
                   </span>&nbsp;<a href="?shf=yorum&amp;islem=edit&amp;id=<?=$y_oku[yorum_id]?>&amp;blog_id=<?=$y_oku[bolum_id]?>" class="text">D�zenle</a>&nbsp;-&nbsp;<a href="?shf=yorum&amp;islem=sil&amp;id=<?=$y_oku[yorum_id]?>&amp;blog_id=<?=$y_oku[bolum_id]?>">Sil</a>&nbsp;-&nbsp;
                   <? if($y_oku[yorum_onay]=="0"){?><a href="?shf=yorum&amp;islem=onay&amp;id=<?=$y_oku[yorum_id]?>&amp;blog_id=<?=$y_oku[bolum_id]?>">Onayla</a><? }?>
				   <? if($y_oku[yorum_onay]=="1"){?><a href="?shf=yorum&amp;islem=onayk&amp;id=<?=$y_oku[yorum_id]?>&amp;blog_id=<?=$y_oku[bolum_id]?>">Onay� Kald�r</a><? }?></p>
                 </div>
           </div></td>
         </tr>
       </table>
       <? }?>
       <div><?  include"gwlabs/blog/yorum/yorumekle.php"; ?></div>
       
<?
}else{
// giri� yap�lmam�� ise ;
@include ("../../../hata.php");
}
?>