<?php
                                        ####################################
                                        # Ferman                           #
                                        # Yönetim Sayfası                  #
                                        # Web Master: mustafa iren         #
                                        ####################################


include "yonetim/db.php";
#                                      SİTE LOG START
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
#                                      SİTE LOG FINISH
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script type="text/javascript" src="http://<?=$site_adresi?>/TypingText.js"></script>
<script src="http://<?=$site_adresi?>/Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
<title>Vay Canına Açık Bulduk !</title>

<style type="text/css">
/* CSS Document */
<!--
a:link {
	text-decoration: none;
	color: #00FF00;
	font-weight: bold;
}
a:visited {
	text-decoration: none;
	color: #00FF00;
}
a:hover {
	text-decoration: none;
	color: #00FF00;
}
a:active {
	text-decoration: none;
	color: #00FF00;
}
body,td,th {
	color: #F8F8FF;
}
body {
	background-color: #000000;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.red {color:#FF0000}
.yesil {color:#00FF00;
}
.sari{color:#FFFF00}
.boldbeyaz {
color:#CCCCCC;
font-weight:bold;
}
.gizle {
visibility:hidden;
}
.siyah {
color:#000000;
}
#siyah_bg {
background-color:#000000;
color:#CCCCCC;
}
.darkgolden {
color:#B8860B;
}
.wood {
color:#DEB887;
}
.violet {
color:#EE82EE;
}
.maroon {
color:#800000;
}
input {color: #99FF00; font-weight: bold; background-color: black; border-top:0px; border-bottom:1px dotted; border-left:1px dotted; border-right:0px; border-color: #cccccc; }
.kutu {color: #99FF00; font-weight: bold; background-color: black; border-top:0px; border-bottom:1px dotted; border-left:1px dotted; border-right:0px; border-color: #cccccc; }
a {
	font-weight: bold;
}
-->

</style></head>

<body>
<div align="center">
<div>
  <p><br />
      <h1>F E R M A N</h1>
      <br />
      </p>
  <img src="http://<?=$site_adresi?>/resim/lodos/cyber_security.jpg" width="250" height="250" border="0" /><br />
</div>
<div id="acro"></div>
<div id="mucit">
<span class="yesil">
    Tüm bilgileriniz sistem veritabanına kaydedilmiştir.<br />
    Bilgilerinizin kullanımı tamamen Ferman yöneticisi insiyatifindedir.<br />
    Lüzumu halinde gerekli kurum ve kuruluşlara bilgileriniz verilecektir.<br />
    Size yeni bilişim yasasına göz atmanızı öneririz.<br />
    Design-Turk.Com
    </span>
</div>
<script type="text/javascript">
//Define first typing example:
new TypingText(document.getElementById("acro"));
//Define second typing example (use "slashing" cursor at the end):
new TypingText(document.getElementById("mucit"), 100, function(i){ var ar = new Array("\\", "|", "/", "-", "|"); return " " + ar[i.length % ar.length]; });
//Type out examples:
TypingText.runAll();
</script>
</div><br />
<div align="center"></div>
<div align="center">
  <table width="600" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center" valign="top">
      <span class="darkgolden">
      <?=$site_adresi?>&nbsp;&copy;&nbsp;2008
        </span>
      </td>
    </tr>
  </table>
</div>
<!-- 
                                        ####################################
                                        # Ferman                           #
                                        # Hata Dosyası                     #
                                        # Web Master: mustafa iren         #
                                        ####################################
-->
</body>
</html>