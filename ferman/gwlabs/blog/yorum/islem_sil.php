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

@include"yonetim/hbv/postcode_kontrol.php";

require ("yonetim/db.php");
$sil_sql="delete from yorum where yorum_id='$id'";
$sorgu= mysql_query($sil_sql,$baglanti);
if (!$sorgu)
{
echo "sorgu yap�lamad�";
exit();
}
mysql_close($baglanti);
?><br />
yorum veritaban�ndan silinmi�tir...<br /><br />
L�tfen Bekleyiniz<br />
<img src="resim/lodos/bekleyin_ms.gif" width="32" height="32" border="0" /><br />
Y�nlendiriliyorsunuz<br />
<br />
<meta http-equiv="refresh" content="3; URL=?shf=blog&amp;islem=oku_detay&blog_id=<?=$blog_id?>">

E�er hala y�nlenmediyseniz <a href="?shf=blog&amp;islem=oku_detay&blog_id=<?=$blog_id?>" class="red">t�klay�n�z</a>
<?
}else{
// giri� yap�lmam�� ise ;
@include ("../../../hata.php");
}
?>