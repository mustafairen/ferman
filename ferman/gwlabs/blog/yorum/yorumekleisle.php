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
<?php

@setlocale(LC_ALL, 'turkish');
$yorum_tarih = strftime("%d %B %Y", time());
$yorum_saat = strftime("%H:%M:%S", time());
$yorum_gun = strftime("%A", time());
$yorum=trim($_POST[icerik]);
$yazar=trim($_POST[yazar]);
$mail=trim($_POST[mail]);
$blog_id = $_POST['blog_id'];
//Kontrol
if (
empty($yorum) || empty($yazar)
)
{
print '<script>alert(" Formu Eksik Doldurdunuz ! ");history.back(-1);</script>';
exit();
}
elseif (!preg_match("/[A-Za-z0-9_.-]+@([A-Za-z0-9_]+\.)+[A-Za-z]{2,4}/i", $mail))
{
print '<script>alert(" Mail Adresi Geçersiz ! ");history.back(-1);</script>';
exit();
}
//konrol Bitiþ

@include"yonetim/hbv/postcode_kontrol.php";

require ("yonetim/db.php");
$SQL="insert into yorum (yorum_icerik,yorum_yazar,yazar_mail,yorum_tarih,yorum_saat,yorum_gun,bolum_id) values ('$yorum','$yazar','$mail','$yorum_tarih','$yorum_saat','$yorum_gun','$blog_id')";
$sorgu=@mysql_query($SQL,$baglanti);
if (!$sorgu)
{
echo "sorgu yapýlamadý";
exit();
}
mysql_close($baglanti);
?><br />
veritabanýna yeni yorum eklenmiþtir...<br />
<br />
Lütfen Bekleyiniz<br />
<img src="resim/lodos/bekleyin_ms.gif" width="32" height="32" border="0" /><br />
Yönlendiriliyorsunuz<br />
<br />
Eðer hala yönlenmediyseniz <a href="?shf=blog&islem=oku_detay&blog_id=<?=$blog_id?>" class="red">týklayýnýz</a><br />

<meta http-equiv="refresh" content="3;URL=?shf=blog&islem=oku_detay&blog_id=<?=$blog_id?>">
<?
}else{
// giriþ yapýlmamýþ ise ;
@include ("../../../hata.php");
}
?>