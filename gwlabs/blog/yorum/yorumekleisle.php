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
print '<script>alert(" Mail Adresi Ge�ersiz ! ");history.back(-1);</script>';
exit();
}
//konrol Biti�

@include"yonetim/hbv/postcode_kontrol.php";

require ("yonetim/db.php");
$SQL="insert into yorum (yorum_icerik,yorum_yazar,yazar_mail,yorum_tarih,yorum_saat,yorum_gun,bolum_id) values ('$yorum','$yazar','$mail','$yorum_tarih','$yorum_saat','$yorum_gun','$blog_id')";
$sorgu=@mysql_query($SQL,$baglanti);
if (!$sorgu)
{
echo "sorgu yap�lamad�";
exit();
}
mysql_close($baglanti);
?><br />
veritaban�na yeni yorum eklenmi�tir...<br />
<br />
L�tfen Bekleyiniz<br />
<img src="resim/lodos/bekleyin_ms.gif" width="32" height="32" border="0" /><br />
Y�nlendiriliyorsunuz<br />
<br />
E�er hala y�nlenmediyseniz <a href="?shf=blog&islem=oku_detay&blog_id=<?=$blog_id?>" class="red">t�klay�n�z</a><br />

<meta http-equiv="refresh" content="3;URL=?shf=blog&islem=oku_detay&blog_id=<?=$blog_id?>">
<?
}else{
// giri� yap�lmam�� ise ;
@include ("../../../hata.php");
}
?>