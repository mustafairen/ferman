<?php
//mysql ba�lant�s�
@include("yonetim/db.php");
#                                      S�TE LOG START
  @session_start ();
  @setlocale(LC_ALL, 'turkish');
  $saat = strftime("%H:%M:%S", time());
  $tarih = strftime("%d_%m_%Y", time());
  $ip = htmlspecialchars($_SERVER['REMOTE_ADDR']);
  $sistem = htmlspecialchars($_SERVER['HTTP_USER_AGENT']);
  $referans = htmlspecialchars($_SERVER['HTTP_REFERER']);
  $site_url = htmlspecialchars($_SERVER['REQUEST_URI']);
//LOG
 $log_sql = @mysql_query("insert into log (log_id,log_tarih,log_saat,log_ip,log_sistem,log_referans,log_site_url) values ('','$tarih','$saat','$ip','$sistem','$referans','$site_url')");
  $log_sorgu= @mysql_query($log_sql,$baglanti);
#                                      S�TE LOG FINISH
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
<meta name="description" content=" Ferman, Design-Turk Grafik ve Web Tasar�m Grubu �r�n�d�r. A��k kaynak Yaz�l�m (c) 2008..." />
<meta name="rating" content="General" />
<meta name="expires" content="no" />
<meta name="language" content="turkish, TR" />
<meta name="distribution" content="Global" />
<meta name="robots" content="INDEX,FOLLOW" />
<meta name="revisit-after" content="1 Day" />
<meta name="publisher" content="<? echo $site_adresi; ?>" />
<meta name="copyright" content="<? echo $site_ismi; ?>" />
<meta name="Author" content="Design-Turk" />
<meta name="keywords" content="mustafa iren, zafer korucu, hakan �en, Design-Turk, Ki�isel G�nce, Ferman, Grafik ve Web Tasar�m Grubu, Grafik, Web, Tasar�m, Host, Domain, Hack, Hacking, Security, G�venlik, Ki�isel Blog, Personel Blog, Ki�isel Site, Official Web Site" />
<title>Ferman - Ki�isel G�nce</title>
<link href="standart.css" rel="stylesheet" type="text/css" />
<!-- eksantrik efektler -->
<script src="gwlabs/lib/prototype.js" type="text/javascript"></script>
<script src="gwlabs/src/scriptaculous.js" type="text/javascript"></script>
<script src="gwlabs/src/unittest.js" type="text/javascript"></script>
<!-- metin edit�r� -->
<script language="JavaScript" type="text/javascript" src="gwlabs/sehri_webmaster/wysiwyg.js"></script>
<!-- Flash �er�eve engeli -->
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script type="text/javascript" src="TypingText.js"></script>
</head>
<body id="iren">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td id="tekrar" align="left" valign="top">
    <div id="temel">
    <div id="cocuk">
    <!-- Logo Alan -->
    <div id="logo"><img src="images/banner.png" alt="" width="248" height="144" /></div>
    <!-- �ocuk son -->
    </div>
    <!-- Men� -->
    <div id="menu">
    <table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="630" height="46" align="center" valign="middle" background="images/navigation_bg.gif">&nbsp;
    <a href="?shf=blog&amp;islem=oku">G�nl���m</a>&nbsp;&nbsp;&diams;&nbsp;&nbsp;
    <a href="?shf=doc&amp;islem=oku">D�k�manlar�m</a>&nbsp;&nbsp;&hearts;&nbsp;&nbsp;
    <a href="?shf=work&amp;islem=oku">�al��malar�m</a>&nbsp;&nbsp;&clubs;&nbsp;&nbsp;
    <a href="?shf=hakkimda&amp;islem=oku">Hakk�mda</a>&nbsp;&nbsp;&spades;&nbsp;&nbsp;
    <a href="?shf=iletisim&amp;islem=oku">�leti�im</a>&nbsp;</td>
    <td><img src="images/nav_edge.png" alt="" width="41" height="57" /></td>
  </tr>
</table>
    <!-- men� son -->
    </div>
    <!-- sol kolon ve i�erik -->
    <table width="900" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="235" height="20" align="left" valign="top" background="images/links.jpg">&nbsp;</td>
    <td rowspan="3" align="left" valign="top">
    <!-- i�erik -->
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><? @include"portal/kkk.php" ?></td>
  </tr>
</table>
    <!-- i�erik son -->
    <br />
    <br />
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
    <td height="25" align="right" valign="middle"><a href="#"onclick="new Effect.ScrollTo('iren'); return false;">En �ste ��k</a>&nbsp;<br /></td>
    </tr>
    </table>
    <div id="copyright" align="right">
    Copyright &copy; 2008 Ferman Standart Tema. All Rights Reserved<br />
    Designed by <a href="http://www.design-turk.com/">Design-Turk</a></div><br /><br /></td>
  </tr>
  <tr>
    <td align="left" valign="top" background="images/links.jpg">
    <div id="kolon">
    <div align="left" id="kolon_bant">&nbsp;Ferman Sahibi&nbsp;&there4;</div>
    <div align="center">
     <? @include "yonetim/hbv/avatar.php"; ?>
     <h3><img src="<?=$avatar?>" border="1" style="border:#000000" alt="<?=$nick?> kullan�c�s�na ait Foto�raf / Avatar" /></h3>
     <strong><?=$nick?></strong>     </div>
     <br /><br /><div align="left" id="kolon_bant">&nbsp;Ba�lant�lar&nbsp;&there4;</div>
     <div id="baglantilar"><? @include"portal/network_oku.php"; ?><br />
     &nbsp;&fnof;&nbsp;<a href="login.php" target="_self">Y�netim Paneli</a></div>
     <br /><br /><div align="left" id="kolon_bant">&nbsp;Son Yorumlar&nbsp;&there4;</div>
	 <div id="yorumlar"><? @include"portal/son_yorumlar.php"; ?></div>
     <br /><br /><div align="left" id="kolon_bant">&nbsp;Bilgi&nbsp;&there4;</div>
     <br /><div id="copyright" align="center">
     <a href="http://ferman.mustafairen.com">Kullan�m Bilgileri</a> | <a href="?shf=info&amp;islem=oku">Hakk�nda</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer" title="This page validates as CSS"><abbr title="Cascading Style Sheets">CSS</abbr></a></div>
     </div>
    �</td>
  </tr>
  <tr>
    <td align="right" valign="bottom" background="images/links.jpg"><img src="images/red_edge.png" alt="" width="48" height="46" border="0" /></td>
  </tr>
</table>
    <!-- temel son -->
    </div>
    </td>
  </tr>
</table>
</body>
</html>
<?php @mysql_close ($baglanti); ?>