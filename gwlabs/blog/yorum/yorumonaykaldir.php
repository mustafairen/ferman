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
<? 
require ("yonetim/db.php");
$sql="update yorum set yorum_onay='0' where yorum_id='$id'";
$sonuc=mysql_query($sql);
  
if (!$sonuc)
{
echo "sorgu yap�lamad�";
exit();
}
mysql_close($baglanti);
?>
<center>
<br />
yorum onay� kald�r�ld�...<br /><br />
L�tfen Bekleyiniz<br />
<img src="resim/lodos/bekleyin_ms.gif" width="32" height="32" border="0" /><br />
Y�nlendiriliyorsunuz<br />
<br />
<meta http-equiv="refresh" content="3; URL=?shf=blog&amp;islem=oku_detay&blog_id=<?=$blog_id?>">

E�er hala y�nlenmediyseniz <a href="?shf=blog&amp;islem=oku_detay&blog_id=<?=$blog_id?>" class="red">t�klay�n�z</a>
</center>
<?
}else{
// giri� yap�lmam�� ise ;
@include ("../../../hata.php");
}
?>