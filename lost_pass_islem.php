<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
<title>Ferman Şifre İstiyorum</title>
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
print '<script>alert("Yanlış Güvenlik Kodu girdiniz!");history.back();</script>';
exit;
} 
?>
<?
$mail=trim($_POST['lost_mail']);
if(empty($mail))
{
print '<script>alert(" Lütfen Mail Adresinizi Giriniz ! ");history.back(-1);</script>';
}
elseif (!preg_match("/[A-Za-z0-9_.-]+@([A-Za-z0-9_]+\.)+[A-Za-z]{2,4}/i", $mail))
{
print '<script>alert(" Mail Adresi Geçersiz ! ");history.back(-1);</script>';
}

include ("yonetim/db.php");
//Mail Kontrol
$mail_kontrol = mysql_query("select user_id from user where user_mail = '".$mail."'");
if( mysql_num_rows($mail_kontrol) != 1 )
{

    print '<script>alert("Bu Mail Adresine Kayıtlı Kullanıcı Bulunamadı!");history.back(-1);</script>';
    exit;
  
  } 
// Rastgele Kod Üretme
$karakter = 8;
$baslangic = rand(1,24);
$rastgelekod = md5(rand(0,500));
$kod = strtoupper(substr($rastgelekod,$baslangic,$karakter));  
$user_lost_sifre = md5($kod);
$SQL = "UPDATE user SET  user_lost_sifre = '$user_lost_sifre' WHERE user_mail = '".$mail."'";
$sorgu= @mysql_query($SQL,$baglanti);
if (!$sorgu)
{
print '<script>alert(" Hata Oluştu !");history.back(-1);</script>';
exit();
}
@mysql_close($baglanti);
//sorgu bitti
// Mail gönderme kodu.
        $MailAdresiniz = $mail;
		$isim = "Ferman Kişisel Günce";
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
Ferman Kisisel Günce 
';
    $Header='Sitenizden kayıp şifre isteğinde bulunulmuştur.' . "\n";
    $Header.='Eğer böyle bir istekte bulunmadıysanız acil olarak başta güvenlik kodunuz olmak üzere,' ."\n";
	$Header.='Post Code ve şifrenizi değiştiriniz.'."\n";
	$Header.='Lütfen Güvenlik kodunuzu kimse ile paylaşmayınız.'."\n";
    $Header.='Hesabınıza erişmek için Geçici Şifreniz: '.$kod."\n";
	$Header.='www.'.$site_adresi.'login.html tıklayınız';
                if(!$MailAdresiniz)
                        print '<div id="hata">Lütfen E-Mail Adresinizi girmeniz için dosyayı düzenleyerek gerekli ayarları yapınız!</div>';
                else if(!@mail($MailAdresiniz,$Gonderilecek,$Header))
                        print '<div id="hata">E-Mail gönderilirken hata oluştu! Lütfen tekrar deneyiniz.</div>';
                else
				{
?><br />
Geçici Şifreniz Mail Adresinize Gönderilmiştir...<br />
<br />
Lütfen Bekleyiniz<br />
<img src="resim/lodos/bekleyin_ms2.gif" width="24" height="24" border="0" /><br />
Yönlendiriliyorsunuz<br />
<br />
<meta http-equiv="refresh" content="2;URL=login.html">

Eğer hala yönlenmediyseniz <a href="2;URL=login.html" class="red">tıklayınız</a>
<?
}
?>
</center>
</body>
</html>