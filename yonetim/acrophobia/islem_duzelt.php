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
?><center>
<?php
$user_nick = trim($_POST['nick']);
$user_sifre = trim($_POST['sifre']);
$user_sifre_e = trim($_POST['sifre_e']);
$user_sifre_t = trim($_POST['sifre_t']);
$user_mail = trim($_POST['mail']);
$user_security = trim($_POST['securitycode']);
include ("yonetim/db.php");
if (
empty($user_nick) || empty($user_sifre_e) || empty($user_mail) || empty($user_security)
)
{
print '<script>alert(" Formu Eksik Doldurdunuz ! ");history.back(-1);</script>';
}
elseif (!preg_match("/[A-Za-z0-9_.-]+@([A-Za-z0-9_]+\.)+[A-Za-z]{2,4}/i", $user_mail))
{
print '<script>alert(" Mail Adresi Ge�ersiz ! ");history.back(-1);</script>';
}
elseif ( $user_sifre != $user_sifre_t ) {
print '<script>alert(" �ifreler Uyu�muyor ! ");history.back(-1);</script>';
}
else
{
@include"yonetim/hbv/securitycode_kontrol.php";
$user_sifre_kont = md5($user_sifre_e);
$sifre_kontrol = mysql_query("select user_nick from user where user_sifre = '".$user_sifre_kont."'");
if( mysql_num_rows($sifre_kontrol) == 0 )
{
print '<script>alert("Yanl�� �ifre girdiniz!");history.back(-1);</script>';
exit;
}
if($user_nick!=$_POST[nick_e]) { 
//Kullan�c� Ad� Kontrol  
$s = @mysql_query("SELECT user_id FROM user WHERE user_nick='$user_nick'");
if ( @mysql_num_rows($s) >= 1) 
{
?>
<script>alert(" <?=$user_nick?> Kullan�c� ad� kay�tl� ! ");history.back(-1);</script>
<?
exit();
}
}
if($user_mail!=$_POST[mail_e]) {
//Mail Sorgulama
$sorgu_mail = @mysql_query("SELECT user_mail FROM user WHERE user_mail='$user_mail'");
if ( @mysql_num_rows($sorgu_mail) >= 1) 
{
?>
<script>alert(" <?=$user_mail?> Mail Adresi kay�tl� ! ");history.back();</script>
<?
exit();
} 
}
// Rastgele karakter
$karakter = 6;
$baslangic = rand(1,24);
$rastgelekod = md5(rand(0,500));
$kod = strtoupper(substr($rastgelekod,$baslangic,$karakter));  
$user_lost_sifre = "$kod";
if(empty($user_sifre)){
$user_sifre=$user_sifre_e;
}
$yeni_sifre = md5($user_sifre);
$SQL = "UPDATE user SET user_nick = '$user_nick', user_sifre = '$yeni_sifre', user_lost_sifre = '$kod', user_mail = '$user_mail' WHERE user_id = '{$_POST[id]}'";
$sorgu= @mysql_query($SQL,$baglanti);
if (!$sorgu)
{
?><br />
�ste�iniz Ger�ekle�tirilemedi...<br /><br />
L�tfen Bekleyiniz<br />
<img src="resim/lodos/bekleyin_ms.gif" width="32" height="32" border="0" /><br />
Y�nlendiriliyorsunuz<br />
<br />
<meta http-equiv="refresh" content="2;URL=?shf=user&amp;islem=oku">
E�er hala y�nlenmediyseniz <a href="?shf=user&amp;islem=oku" class="red">t�klay�n�z</a>
<?
exit();
}
}
mysql_close($baglanti);
//sorgu bitti
?><br />
kay�t veritaban�ndan d�zeltilmi�tir...<br /><br />
L�tfen Bekleyiniz<br />
<img src="resim/lodos/bekleyin_ms.gif" width="32" height="32" border="0" /><br />
Y�nlendiriliyorsunuz<br />
<br />
<meta http-equiv="refresh" content="2;URL=?shf=user&amp;islem=oku">
E�er hala y�nlenmediyseniz <a href="?shf=user&amp;islem=oku" class="red">t�klay�n�z</a></center>
<?
}else{
// giri� yap�lmam�� ise ;
@include ("../../hata.php");
}
?>