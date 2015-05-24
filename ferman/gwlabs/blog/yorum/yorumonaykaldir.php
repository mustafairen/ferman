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
<? 
require ("yonetim/db.php");
$sql="update yorum set yorum_onay='0' where yorum_id='$id'";
$sonuc=mysql_query($sql);
  
if (!$sonuc)
{
echo "sorgu yapýlamadý";
exit();
}
mysql_close($baglanti);
?>
<center>
<br />
yorum onayý kaldýrýldý...<br /><br />
Lütfen Bekleyiniz<br />
<img src="resim/lodos/bekleyin_ms.gif" width="32" height="32" border="0" /><br />
Yönlendiriliyorsunuz<br />
<br />
<meta http-equiv="refresh" content="3; URL=?shf=blog&amp;islem=oku_detay&blog_id=<?=$blog_id?>">

Eðer hala yönlenmediyseniz <a href="?shf=blog&amp;islem=oku_detay&blog_id=<?=$blog_id?>" class="red">týklayýnýz</a>
</center>
<?
}else{
// giriþ yapýlmamýþ ise ;
@include ("../../../hata.php");
}
?>