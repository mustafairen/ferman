<?
                                        ####################################
                                        # Ferman                           #
                                        # Y�netim Sayfas�                  #
                                        # Web Master: m. iren | z. korucu  #
                                        ####################################
//giri� kontrol
@include ("giris_kontrol.php");
// oturumu baslatal�m
@session_start();
// giri� bilgilerini alal�m.
$giris=$_SESSION["giris"];
$ad=$_SESSION["user_kadi"];
// giri� kontrol� yapal�m
if($giris){
// giri� yap�lm�� ho�geldin..
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
<title><?=$_SESSION["user_kadi"]?> &delta; Ferman Y�netim Paneli'ne Ho� Geldiniz</title>
<link href="panel.css" rel="stylesheet" type="text/css" />
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
<div id="header">
	<div id="logo">
		<h1>Ferman</h1>
	  <h2><a href="ferman.php">Y�netim Anasayfa</a></h2>
  </div>
	<div id="menu">
		<ul>
        <!-- <li class="active"> -->
			<li <? if ($shf== "?shf=blog&amp;islem=oku") print"class=\"active\""; else print ""; ?>><a href="?shf=blog&amp;islem=oku">G�nl���m</a></li>
			<li><a href="?shf=doc&amp;islem=oku">D�k�manlar</a></li>
			<li><a href="?shf=work&amp;islem=oku">�al��malar�m</a></li>
			<li><a href="?shf=network&amp;islem=oku">Ba�lant�lar</a></li>
			<li><a href="?shf=hakkimda&amp;islem=oku">Hakk�mda</a></li>
			<li><a href="?shf=iletisim&amp;islem=oku">�leti�im</a></li>
            <li><a href="?shf=ayarlar&amp;islem=oku">Ayarlar</a></li>
		</ul>
	</div>
</div>
<div id="page">
<div align="right"><?=$_SESSION["user_kadi"]?>&nbsp;&nbsp;<a href="cikis.php">��k�� Yap</a></div>
	<div id="content">
		<div style="margin-bottom: 20px;">
        <div align="center">
        <?php
		@setlocale(LC_ALL, 'turkish');
		//giri� b�l�m�
		if ($shf == "")
		{
		?><br />
        <img src="resim/panel/ferman.png" width="105" height="129" border="0" />
        <br /><br />
            Ferman Y�netim Merkezine Ho� Geldiniz.
		    <br>Men�ler yard�m� ile gerekli de�i�iklikleri ger�ekle�tirebilirsiniz<br><br>
		    <br>
		<?
		}
		//giri� b�l�m� sonu
		/*
		sayfa karar kontrol mekanizmas� ba�lang�c�
		*/
		{
		@include "yonetim/kkk.php";
		}
		/*
		sayfa karar kontrol mekanizmas� sonu
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
	<p id="legal">&copy;2008 <a href="http://ferman.mustafairen.com/" target="_blank">Ferman Ki�isel G�nce</a>. Designed by <a href="http://www.design-turk.com/" target="_blank">Design-Turk</a></p>
	<p id="links"><a href="?shf=info&islem=oku">Hakk�nda</a> | <a href="?shf=help&islem=oku">Yard�m</a> | <a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional"><abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a> | <a href="http://jigsaw.w3.org/css-validator/check/referer" title="This page validates as CSS"><abbr title="Cascading Style Sheets">CSS</abbr></a></p>
</div>
</body>
</html>
<?
}else{
// giri� yap�lmam�� ise ;
include ("login.php");
}
?>