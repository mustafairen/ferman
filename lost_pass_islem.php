<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
<title>Ferman �ifre �stiyorum</title>
<link rel="stylesheet" href="gw.css" type="text/css" media="screen" />
</head>

<body>
<br /><br /><br /><br />
<center>
<?
include ("yonetim/db.php");
$securitycode=md5($_POST[securitycode]);
$securitycode_kontrol = mysql_query("select code_id from code where securitycode = '".$securitycode."'");
if( mysql_num_rows($securitycode_kontrol) != 1 )
{
print '<script>alert("Yanl�� G�venlik Kodu girdiniz!");history.back();</script>';
exit;
} 
?>
<?
$mail=trim($_POST['lost_mail']);
if(empty($mail))
{
print '<script>alert(" L�tfen Mail Adresinizi Giriniz ! ");history.back(-1);</script>';
}
elseif (!preg_match("/[A-Za-z0-9_.-]+@([A-Za-z0-9_]+\.)+[A-Za-z]{2,4}/i", $mail))
{
print '<script>alert(" Mail Adresi Ge�ersiz ! ");history.back(-1);</script>';
}

include ("yonetim/db.php");
//Mail Kontrol
$mail_kontrol = mysql_query("select user_id from user where user_mail = '".$mail."'");
if( mysql_num_rows($mail_kontrol) != 1 )
{

    print '<script>alert("Bu Mail Adresine Kay�tl� Kullan�c� Bulunamad�!");history.back(-1);</script>';
    exit;
  
  } 
// Rastgele Kod �retme
$karakter = 8;
$baslangic = rand(1,24);
$rastgelekod = md5(rand(0,500));
$kod = strtoupper(substr($rastgelekod,$baslangic,$karakter));  
$user_lost_sifre = md5($kod);
$SQL = "UPDATE user SET  user_lost_sifre = '$user_lost_sifre' WHERE user_mail = '".$mail."'";
$sorgu= @mysql_query($SQL,$baglanti);
if (!$sorgu)
{
print '<script>alert(" Hata Olu�tu !");history.back(-1);</script>';
exit();
}
@mysql_close($baglanti);
//sorgu bitti
// Mail g�nderme kodu.
        $MailAdresiniz = $mail;
		$isim = "Ferman Ki�isel G�nce";
        # Bu kisma yazi rengi olarak istediginiz renk kodunu yazabilirsiniz.#
        $YaziRenk = "0055A8"; //opsiyonel
        # Bu kisma dis cerceve rengi olarak istediginiz renk kodunu yazabilirsiniz.#
        $CerceveDisRenk = "CCE7FF"; //opsiyonel
        # Bu kisma ic cerceve rengi olarak istediginiz renk kodunu yazabilirsiniz.#
        $CerceveIcRenk = "637E99"; //opsiyonel
        ########################################################
        #                                                      #
        #  ! ASAGIDAKi ALANLARA BiLGiNiZ YOKSA DOKUNMAYINIZ !  #
        #                                                      #
        ########################################################

$Gonderilecek='
Ferman Kisisel G�nce 
';
    $Header='Sitenizden kay�p �ifre iste�inde bulunulmu�tur.' . "\n";
    $Header.='E�er b�yle bir istekte bulunmad�ysan�z acil olarak ba�ta g�venlik kodunuz olmak �zere,' ."\n";
	$Header.='Post Code ve �ifrenizi de�i�tiriniz.'."\n";
	$Header.='L�tfen G�venlik kodunuzu kimse ile payla�may�n�z.'."\n";
    $Header.='Hesab�n�za eri�mek i�in Ge�ici �ifreniz: '.$kod."\n";
	$Header.='www.'.$site_adresi.'login.html t�klay�n�z';
                if(!$MailAdresiniz)
                        print '<div id="hata">L�tfen E-Mail Adresinizi girmeniz i�in dosyay� d�zenleyerek gerekli ayarlar� yap�n�z!</div>';
                else if(!@mail($MailAdresiniz,$Gonderilecek,$Header))
                        print '<div id="hata">E-Mail g�nderilirken hata olu�tu! L�tfen tekrar deneyiniz.</div>';
                else
				{
?><br />
Ge�ici �ifreniz Mail Adresinize G�nderilmi�tir...<br />
<br />
L�tfen Bekleyiniz<br />
<img src="resim/lodos/bekleyin_ms2.gif" width="24" height="24" border="0" /><br />
Y�nlendiriliyorsunuz<br />
<br />
<meta http-equiv="refresh" content="2;URL=login.html">

E�er hala y�nlenmediyseniz <a href="2;URL=login.html" class="red">t�klay�n�z</a>
<?
}
?>
</center>
</body>
</html>