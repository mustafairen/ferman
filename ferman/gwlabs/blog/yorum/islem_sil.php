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
<? 

@include"yonetim/hbv/postcode_kontrol.php";

require ("yonetim/db.php");
$sil_sql="delete from yorum where yorum_id='$id'";
$sorgu= mysql_query($sil_sql,$baglanti);
if (!$sorgu)
{
echo "sorgu yapılamadı";
exit();
}
mysql_close($baglanti);
?><br />
yorum veritabanından silinmiştir...<br /><br />
Lütfen Bekleyiniz<br />
<img src="resim/lodos/bekleyin_ms.gif" width="32" height="32" border="0" /><br />
Yönlendiriliyorsunuz<br />
<br />
<meta http-equiv="refresh" content="3; URL=?shf=blog&amp;islem=oku_detay&blog_id=<?=$blog_id?>">

Eğer hala yönlenmediyseniz <a href="?shf=blog&amp;islem=oku_detay&blog_id=<?=$blog_id?>" class="red">tıklayınız</a>
<?
}else{
// giriş yapılmamış ise ;
@include ("../../../hata.php");
}
?>