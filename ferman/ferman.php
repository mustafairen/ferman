<?
                                        ####################################
                                        # Ferman                           #
                                        # Yönetim Sayfası                  #
                                        # Web Master: m. iren | z. korucu  #
                                        ####################################
//giriş kontrol
@include ("giris_kontrol.php");
// oturumu baslatalım
@session_start();
// giriş bilgilerini alalım.
$giris=$_SESSION["giris"];
$ad=$_SESSION["user_kadi"];
// giriş kontrolü yapalım
if($giris){
// giriş yapılmış hoşgeldin..
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
<title><?=$_SESSION["user_kadi"]?> &delta; Ferman Yönetim Paneli'ne Hoş Geldiniz</title>
<link href="panel.css" rel="stylesheet" type="text/css" />
<!-- eksantrik efektler -->
<script src="gwlabs/lib/prototype.js" type="text/javascript"></script>
<script src="gwlabs/src/scriptaculous.js" type="text/javascript"></script>
<script src="gwlabs/src/unittest.js" type="text/javascript"></script>
<!-- metin editörü -->
<script language="JavaScript" type="text/javascript" src="gwlabs/sehri_webmaster/wysiwyg.js"></script>
<!-- Flash çerçeve engeli -->
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script type="text/javascript" src="TypingText.js"></script>
</head>
<body id="iren">
<div id="header">
	<div id="logo">
		<h1>Ferman</h1>
	  <h2><a href="ferman.php">Yönetim Anasayfa</a></h2>
  </div>
	<div id="menu">
		<ul>
        <!-- <li class="active"> -->
			<li <? if ($shf== "?shf=blog&amp;islem=oku") print"class=\"active\""; else print ""; ?>><a href="?shf=blog&amp;islem=oku">Günlüğüm</a></li>
			<li><a href="?shf=doc&amp;islem=oku">Dökümanlar</a></li>
			<li><a href="?shf=work&amp;islem=oku">Çalışmalarım</a></li>
			<li><a href="?shf=network&amp;islem=oku">Bağlantılar</a></li>
			<li><a href="?shf=hakkimda&amp;islem=oku">Hakkımda</a></li>
			<li><a href="?shf=iletisim&amp;islem=oku">İletişim</a></li>
            <li><a href="?shf=ayarlar&amp;islem=oku">Ayarlar</a></li>
		</ul>
	</div>
</div>
<div id="page">
<div align="right"><?=$_SESSION["user_kadi"]?>&nbsp;&nbsp;<a href="cikis.php">Çıkış Yap</a></div>
	<div id="content">
		<div style="margin-bottom: 20px;">
        <div align="center">
        <?php
		@setlocale(LC_ALL, 'turkish');
		//giriş bölümü
		if ($shf == "")
		{
		?><br />
        <img src="resim/panel/ferman.png" width="105" height="129" border="0" />
        <br /><br />
            Ferman Yönetim Merkezine Hoş Geldiniz.
		    <br>Menüler yardımı ile gerekli değişiklikleri gerçekleştirebilirsiniz<br><br>
		    <br>
		<?
		}
		//giriş bölümü sonu
		/*
		sayfa karar kontrol mekanizması başlangıcı
		*/
		{
		@include "yonetim/kkk.php";
		}
		/*
		sayfa karar kontrol mekanizması sonu
		*/
		?>
        </div>
		</div>
	  <div>&nbsp;</div>
		<div align="right">
        <?
        if ($shf == "")
		print "";
		else 
		{
		?>
        <a href="#"onclick="new Effect.ScrollTo('iren'); return false;"><img src="resim/panel/yukari.png" alt="" width="140" height="50" border="0" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?
        }
		?>
        </div>
  </div>
	<!-- end content -->
  <!-- end sidebar -->
  <div style="clear: both;">&nbsp;</div>
  <!-- frosen -->
  <div>&nbsp;</div>
  <!-- frozen bitti -->
</div>
<!-- end page -->
<div id="footer">
	<p id="legal">&copy;2008 <a href="http://ferman.mustafairen.com/" target="_blank">Ferman Kişisel Günce</a>. Designed by <a href="http://www.design-turk.com/" target="_blank">Design-Turk</a></p>
	<p id="links"><a href="?shf=info&islem=oku">Hakkında</a> | <a href="?shf=help&islem=oku">Yardım</a> | <a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional"><abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a> | <a href="http://jigsaw.w3.org/css-validator/check/referer" title="This page validates as CSS"><abbr title="Cascading Style Sheets">CSS</abbr></a></p>
</div>
</body>
</html>
<?
}else{
// giriş yapılmamış ise ;
include ("login.php");
}
?>