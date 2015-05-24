<?php
####################################
# Ferman                           #
# Kurulum Dosyası                  #
# Web Master: mustafa iren         #
####################################
@require ("yonetim/db.php");
$KUR = $_GET["KUR"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
<title>Ferman Kişisel Günce Veritabanı Kurulum</title>
<style type="text/css">
<!--
body,td,th {
	color: #F5F5F5;
	font-size: 18px;
	font-family: Times New Roman, Times, serif;
}
body {
	background-color: #000000;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
a:link {
	color: #F5F5F5;
}
a:visited {
	color: #F5F5F5;
}
a:hover {
	color: #33FF33;
}
a:active {
	color: #F5F5F5;
}
.red{ color:#FF0000;}

input {color: #99FF00; font-weight: bold; background-color: black; border-top:0px; border-bottom:1px dotted; border-left:1px dotted; border-right:0px; border-color: #cccccc; }
-->
</style>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body>
<div>

</div>
<center>
<?
if ($KUR == ""){
?>
<br />
<div>
<table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40" height="40" align="left" valign="top" background="resim/lodos/text_bg_sol_ust.jpg">&nbsp;</td>
    <td align="left" valign="top" background="resim/lodos/text_bg_ust_orta.jpg">&nbsp;</td>
    <td width="40" height="40" align="left" valign="top" background="resim/lodos/text_bg_sag_ust.jpg">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" background="resim/lodos/text_bg_sol_orta.jpg">&nbsp;</td>
    <td align="center" valign="top"><div>
      <table width="500" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center" valign="top"><img src="resim/lodos/banner.jpg" alt="" width="465" height="80" />            </td>
        </tr>
        <tr>
          <td align="right" valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" valign="top">Ferman Kişisel Günce'ye Hoşgeldiniz.<br />
              <br />
            Kişisel kullanım için <br />
            <br />
            mustafa iren  ve Zafer Korucu tarafından geliştirilmiştir.<br />
            <br />
            Kuruluma başlamak için <a href="?KUR=Start">tıklayınız</a>.</td>
        </tr>
        <tr>
          <td align="center" valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td align="center" valign="top">&copy; 2008 Tüm Hakları Saklıdır.<br /></td>
        </tr>
        <tr>
          <td align="right" valign="top">&nbsp;</td>
        </tr>
      </table>
      </div></td>
    <td align="left" valign="top" background="resim/lodos/text_bg_sag_orta.jpg">&nbsp;</td>
  </tr>
  <tr>
    <td width="40" height="40" align="left" valign="top" background="resim/lodos/text_bg_sol_alt.jpg">&nbsp;</td>
    <td align="left" valign="top" background="resim/lodos/text_bg_alt_orta.jpg">&nbsp;</td>
    <td width="40" height="40" align="left" valign="top" background="resim/lodos/text_bg_sag_alt.jpg">&nbsp;</td>
  </tr>
</table>
<br />
</div>
<?
}
?>

<?
if ($KUR == "Start"){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%" height="100%" align="center" valign="middle"><br />
      <table width="600" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="40" height="40" align="left" valign="top" background="resim/lodos/text_bg_sol_ust.jpg">&nbsp;</td>
          <td align="left" valign="top" background="resim/lodos/text_bg_ust_orta.jpg">&nbsp;</td>
          <td width="40" height="40" align="left" valign="top" background="resim/lodos/text_bg_sag_ust.jpg">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" valign="top" background="resim/lodos/text_bg_sol_orta.jpg">&nbsp;</td>
          <td align="center" valign="top"><div>
            <table width="500" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center" valign="top"><img src="resim/lodos/banner.jpg" alt="" width="465" height="80" />                  </td>
              </tr>
              <tr>
                <td align="center" valign="top">
                <form id="form1" name="form1" method="post" action="?KUR=Kur">
                <table border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="114">&nbsp;</td>
                    <td width="146">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="left">Kullanıcı Adı</td>
                    <td>
                      
                        <input type="text" name="kadi" id="kadi" />
                                            </td>
                  </tr>
                  <tr>
                    <td align="left">Şifre</td>
                    <td>
                      
                        <input type="password" name="sifre" id="sifre" />
                                            </td>
                  </tr>
                  <tr>
                    <td align="left">Şifre Tekrar</td>
                    <td>
                      
                        <input type="password" name="sifre2" id="sifre2" />
                                            </td>
                  </tr>
                  <tr>
                    <td align="left">E-Mail</td>
                    <td>
                      
                        <input name="posta" type="text" id="posta" />
                                            </td>
                  </tr>
                  <tr>
                    <td align="left">Post Code</td>
                    <td>
                      <input type="password" name="post" id="post" />
                      </td>
                  </tr>
                  <tr>
                    <td align="left">Post Code Tekrar</td>
                    <td>
                      <input type="password" name="post_t" id="post_t" />
                      </td>
                  </tr>
                  <tr>
                    <td align="left">Güvenlik Kodu</td>
                    <td>
                      <input type="password" name="security" id="security" />
                      </td>
                  </tr>
                  <tr>
                    <td align="left">Güvenlik Kodu Tekrar</td>
                    <td>
                      <input type="password" name="security_t" id="security_t" />
                      </td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td align="right"><input type="submit" name="button" id="button" value="Bilgileri Onayla" /></td>
                  </tr>
                </table>
                </form>                </td>
              </tr>
              <tr>
                <td align="left" valign="top">&nbsp;</td>
              </tr>
              <tr>
                <td align="center" valign="top">&copy; 2008 Tüm Hakları Saklıdır.</td>
              </tr>
            </table>
            </div></td>
          <td align="left" valign="top" background="resim/lodos/text_bg_sag_orta.jpg">&nbsp;</td>
        </tr>
        <tr>
          <td width="40" height="40" align="left" valign="top" background="resim/lodos/text_bg_sol_alt.jpg">&nbsp;</td>
          <td align="left" valign="top" background="resim/lodos/text_bg_alt_orta.jpg">&nbsp;</td>
          <td width="40" height="40" align="left" valign="top" background="resim/lodos/text_bg_sag_alt.jpg">&nbsp;</td>
        </tr>
      </table>
      <br />
      <br />
    <br />
    </td>
  </tr>
</table>
<?
}
if ($KUR == "Kur"){
//Veritabanı Oluştur
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%" height="100%" align="center" valign="middle"><br />
      <table width="600" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="40" height="40" align="left" valign="top" background="resim/lodos/text_bg_sol_ust.jpg">&nbsp;</td>
          <td align="left" valign="top" background="resim/lodos/text_bg_ust_orta.jpg">&nbsp;</td>
          <td width="40" height="40" align="left" valign="top" background="resim/lodos/text_bg_sag_ust.jpg">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" valign="top" background="resim/lodos/text_bg_sol_orta.jpg">&nbsp;</td>
          <td align="center" valign="top"><div>
            <table width="500" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center" valign="top"><img src="resim/lodos/banner.jpg" alt="" width="465" height="80" />                  </td>
              </tr>
              <tr>
                <td align="center" valign="top"><br />
                    <br />
                  Lütfen Bekleyiniz <img src="resim/lodos/bekleyin_ms2.gif" alt="" width="24" height="24" /> <br />
                  <br /></td>
              </tr>
              <tr>
                <td align="left" valign="top">&nbsp;</td>
              </tr>
              <tr>
                <td align="center" valign="top">&copy; 2008 Tüm Hakları Saklıdır.</td>
              </tr>
            </table>
            </div></td>
          <td align="left" valign="top" background="resim/lodos/text_bg_sag_orta.jpg">&nbsp;</td>
        </tr>
        <tr>
          <td width="40" height="40" align="left" valign="top" background="resim/lodos/text_bg_sol_alt.jpg">&nbsp;</td>
          <td align="left" valign="top" background="resim/lodos/text_bg_alt_orta.jpg">&nbsp;</td>
          <td width="40" height="40" align="left" valign="top" background="resim/lodos/text_bg_sag_alt.jpg">&nbsp;</td>
        </tr>
      </table>
      <br />
    <br />
    </td>
  </tr>
</table>
<?
$user_nick = trim($_POST[kadi]);
$user_sifre = trim($_POST[sifre]);
$user_sifre2 = trim($_POST[sifre2]);
$user_mail = trim($_POST[posta]);
$postcode = trim($_POST[post]);
$postcode_t = trim($_POST[post_t]);
$securitycode = trim($_POST[security]);
$securitycode_t = trim($_POST[security_t]);
$user_sifre_m = md5($user_sifre);
$user_post = md5($postcode);
$user_security = md5($securitycode);
if (
empty($user_nick) || empty($user_sifre) || empty($user_sifre2) || empty($user_mail) || empty($securitycode) || empty($postcode)  || empty($securitycode_t) || empty($postcode_t)
)
{
print '<script>alert(" Formu Eksik Doldurdunuz ! ");history.back(-1);</script>';
}
elseif (!preg_match("/[A-Za-z0-9_.-]+@([A-Za-z0-9_]+\.)+[A-Za-z]{2,4}/i", $user_mail))
{
print '<script>alert(" Mail Adresi Geçersiz ! ");history.back(-1);</script>';
}
elseif ( $user_sifre != $user_sifre2 ) {
print '<script>alert(" Şifreler Uyuşmuyor ! ");history.back(-1);</script>';
}
elseif ( $postcode != $postcode_t ) {
print '<script>alert(" Post Kodlar Uyuşmuyor ! ");history.back(-1);</script>';
}
elseif ( $securitycode != $securitycode_t ) {
print '<script>alert(" Güvenlik Kodları Uyuşmuyor ! ");history.back(-1);</script>';
}
else
{
/*          SQL          */
//Blog
mysql_query("
CREATE TABLE `blog` (
`blog_id` INT(7) UNSIGNED NOT NULL AUTO_INCREMENT ,
`blog_baslik` VARCHAR(150) collate utf8_turkish_ci NOT NULL,
`blog_icerik` LONGTEXT collate utf8_turkish_ci NOT NULL,
`blog_tarih` VARCHAR(16) collate utf8_turkish_ci NOT NULL,
`blog_saat` VARCHAR(10) collate utf8_turkish_ci NOT NULL,
`blog_gun` VARCHAR(15) collate utf8_turkish_ci NOT NULL,
UNIQUE (`blog_id`)
);
");
//Blog Yorum
mysql_query("
CREATE TABLE `yorum` (
`yorum_id` INT(7) UNSIGNED NOT NULL AUTO_INCREMENT ,
`yorum_yazar` VARCHAR(50) collate utf8_turkish_ci NOT NULL,
`yazar_mail` VARCHAR(50) collate utf8_turkish_ci NOT NULL,
`yorum_icerik` LONGTEXT collate utf8_turkish_ci NOT NULL,
`yorum_tarih` VARCHAR(16) collate utf8_turkish_ci NOT NULL,
`yorum_saat` VARCHAR(10) collate utf8_turkish_ci NOT NULL,
`yorum_gun` VARCHAR(15) collate utf8_turkish_ci NOT NULL,
`yorum_onay` INT(1) UNSIGNED NOT NULL,
`bolum_id` INT(7) UNSIGNED NOT NULL,
UNIQUE (`yorum_id`)
);
");
//Hakkımda
mysql_query("
CREATE TABLE `hakkimda` (
`hakkimda_id` INT(2) UNSIGNED NOT NULL AUTO_INCREMENT ,
`hakkimda_baslik` VARCHAR(150) collate utf8_turkish_ci NOT NULL,
`hakkimda_icerik` LONGTEXT collate utf8_turkish_ci NOT NULL,
UNIQUE (`hakkimda_id`)
);
");
//Bağlantılar
mysql_query("
CREATE TABLE `network` (
`network_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT ,
`network_isim` VARCHAR(150) collate utf8_turkish_ci NOT NULL,
`network_link` VARCHAR(250) collate utf8_turkish_ci NOT NULL,
`network_icerik` TEXT collate utf8_turkish_ci NOT NULL,
UNIQUE (`network_id`)
);
");
//İletişim
mysql_query("
CREATE TABLE `iletisim` (
`iletisim_id` INT(2) UNSIGNED NOT NULL AUTO_INCREMENT ,
`iletisim_mail` VARCHAR(250) collate utf8_turkish_ci NULL,
`iletisim_msn` VARCHAR(250) collate utf8_turkish_ci NULL,
`iletisim_icerik` TEXT collate utf8_turkish_ci NULL,
UNIQUE (`iletisim_id`)
);
");
//Dökümanlar
mysql_query("
CREATE TABLE `makale` (
`makale_id` INT(7) UNSIGNED collate utf8_turkish_ci NOT NULL AUTO_INCREMENT ,
`makale_baslik` VARCHAR(150) collate utf8_turkish_ci NOT NULL,
`makale_icerik` LONGTEXT collate utf8_turkish_ci NOT NULL,
`makale_tarih` VARCHAR(16) collate utf8_turkish_ci NOT NULL,
`makale_saat` VARCHAR(10) collate utf8_turkish_ci NOT NULL,
`makale_gun` VARCHAR(15) collate utf8_turkish_ci NOT NULL,
UNIQUE (`makale_id`)
);
");
//Çalışmalarım
mysql_query("
CREATE TABLE `calisma` (
`calisma_id` int(7) unsigned NOT NULL auto_increment,
`calisma_baslik` varchar(150) collate utf8_turkish_ci NOT NULL,
`calisma_icerik` longtext collate utf8_turkish_ci NOT NULL,
`calisma_tarih` varchar(16) collate utf8_turkish_ci NOT NULL,
`calisma_saat` varchar(10) collate utf8_turkish_ci NOT NULL,
`calisma_gun` varchar(15) collate utf8_turkish_ci NOT NULL,
UNIQUE (`calisma_id`)
);
");
//Log Sistem
mysql_query("
CREATE TABLE `log` (
`log_id` int(10) unsigned NOT NULL auto_increment,
`log_tarih` varchar(16) collate utf8_turkish_ci NULL,
`log_saat` varchar(10) collate utf8_turkish_ci NOT NULL,
`log_ip` varchar(60) collate utf8_turkish_ci NOT NULL,
`log_sistem` text collate utf8_turkish_ci NOT NULL,
`log_referans` text collate utf8_turkish_ci NULL,
`log_site_url` text collate utf8_turkish_ci NULL,
UNIQUE (`log_id`)
);
");
//User
mysql_query("
CREATE TABLE `user` (
`user_id` int(1) unsigned NOT NULL auto_increment,
`user_nick` varchar(150) collate utf8_turkish_ci NOT NULL,
`user_sifre` varchar(50) collate utf8_turkish_ci NOT NULL,
`user_lost_sifre` varchar(50) collate utf8_turkish_ci NOT NULL,
`user_mail` varchar(250) collate utf8_turkish_ci NOT NULL,
UNIQUE (`user_id`)
);
");
//Code
mysql_query("
CREATE TABLE `code` (
`code_id` int(1) unsigned NOT NULL auto_increment,
`securitycode` varchar(50) collate utf8_turkish_ci NOT NULL,
`postcode` varchar(50) collate utf8_turkish_ci NOT NULL,
UNIQUE (`code_id`)
);
");
//portal
mysql_query("
CREATE TABLE `portal` (
`portal_id` int(2) unsigned NOT NULL auto_increment,
`portal_avatar` varchar(150) collate utf8_turkish_ci NOT NULL,
`portal_nick` varchar(50) collate utf8_turkish_ci NOT NULL,
UNIQUE (`portal_id`)
);
");
/*          SQL          */
//Kullanıcı Adı Kontrolü
$s = @mysql_query("SELECT * FROM user WHERE user_nick='$user_nick'");
if ( @mysql_num_rows($s) >= 1) 
{
?>
<script>alert(" <?=$user_nick?> Kullanıcı adı kayıtlı ! ");history.back(-1);</script>
<?
exit();
}

//Mail Adresi Kontrolü
$sorgu_mail = @mysql_query("SELECT user_mail FROM user WHERE user_mail='$user_mail'");
if ( @mysql_num_rows($sorgu_mail) >= 1) 
{
?>

<script>alert(" <?=$user_mail?> Mail Adresi kayıtlı ! ");history.back();</script>
<?
exit();
}
// Rastgele karakter
$karakter = 6;
$baslangic = rand(1,24);
$rastgelekod = md5(rand(0,500));
$rastgele = strtoupper(substr($rastgelekod,$baslangic,$karakter));
$user_lost_sifre = "$rastgele";
#SQL insert
mysql_query("
INSERT INTO `$veritabani`.`user` (
`user_id` ,
`user_nick` ,
`user_sifre` ,
`user_lost_sifre` ,
`user_mail` 
)
VALUES (
NULL , '$user_nick', '$user_sifre_m', '$user_lost_sifre', '$user_mail'
);
");
//Portal
$portal_kontrol = @mysql_query("SELECT portal_id FROM portal");
if ( @mysql_num_rows($portal_kontrol) == 0) 
{
mysql_query("
INSERT INTO `$veritabani`.`portal` (`portal_avatar` ,`portal_nick` ) VALUES ('resim/ferman.jpg', 'Ferman');
");
}
//Kod Kontrolü
$code_kontrol = @mysql_query("SELECT code_id FROM code");
if ( @mysql_num_rows($code_kontrol) == 0) 
{
mysql_query("
INSERT INTO `$veritabani`.`code` (`securitycode` ,`postcode` ) VALUES ('$user_security', '$user_post');
");
}
?>
<meta http-equiv="refresh" content="3;URL=?KUR=Finish">
<?
}
}
?>
<?php
//Soz Söz
if ($KUR == "Finish"){
?>
<br />
<table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40" height="40" align="left" valign="top" background="resim/lodos/text_bg_sol_ust.jpg">&nbsp;</td>
    <td align="left" valign="top" background="resim/lodos/text_bg_ust_orta.jpg">&nbsp;</td>
    <td width="40" height="40" align="left" valign="top" background="resim/lodos/text_bg_sag_ust.jpg">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" background="resim/lodos/text_bg_sol_orta.jpg">&nbsp;</td>
    <td align="center" valign="top"><div>
      <table width="500" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center" valign="top"><img src="resim/lodos/banner.jpg" alt="" width="465" height="80" /></td>
        </tr>
        <tr>
          <td align="center" valign="top"><p>Kurulum İşlemleri tamamlanmıştır. <br />
            <br />
            <span class="red">Ana Dizinde bulunan Kur.php dosyasını lütfen siliniz.</span><br />
            <br />
            Ferman Kişisel Günce'yi Tercih Ettiğiniz için;<br />
            TEŞEKKÜR EDERİZ
            ...<br />
             
                <br />
              Ferman Yönetim Paneli için <a href="ferman.php">tıklayınız</a>.</p></td>
        </tr>
        <tr>
          <td align="left" valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td align="center" valign="top">&copy; 2008 Tüm Hakları Saklıdır.</td>
        </tr>
      </table>
      </div></td>
    <td align="left" valign="top" background="resim/lodos/text_bg_sag_orta.jpg">&nbsp;</td>
  </tr>
  <tr>
    <td width="40" height="40" align="left" valign="top" background="resim/lodos/text_bg_sol_alt.jpg">&nbsp;</td>
    <td align="left" valign="top" background="resim/lodos/text_bg_alt_orta.jpg">&nbsp;</td>
    <td width="40" height="40" align="left" valign="top" background="resim/lodos/text_bg_sag_alt.jpg">&nbsp;</td>
  </tr>
</table>
<?
}
?>
</center>
</body>
</html>