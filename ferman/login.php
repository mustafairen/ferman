<?
                                        ####################################
                                        # Ferman                           #
                                        # Yönetim Sayfası                  #
                                        # Web Master: m. iren | z. korucu  #
                                        ####################################
@session_start();
include "yonetim/db.php";
if ( empty($HTTP_POST_VARS)){
?>
<!-- Design-Turk.Com -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1254" />
<title>Ferman Kişisel Günce Yönetim Login</title>
<meta name="generator" content="Design-Turk Grafik ve Web Tasarım Grubu" /> <!-- leave this for stats -->
<link rel="stylesheet" href="Login.css" type="text/css" media="screen" />
<meta name='robots' content='noindex,nofollow' />
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>
<body>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="middle"><center>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>
        <img src="resim/lodos/bannerkur.jpg" alt="" width="211" height="50" /></p>
      <p>&nbsp;</p>
      <table width="339" height="199" border="0" cellpadding="0" cellspacing="0" class="bg">
        <tr>
          <td><center>
            <br />
            <br />
            <table width="90%" border="0" cellspacing="4" cellpadding="0">
                  <form action="<? echo $PHP_SELF; ?>" method="post">
              <tr>
                <td>Kullanıcı Adı</td>
                <td><div id="input"><input name="nick" type="text" id="nick" /></div></td>
              </tr>
              <tr>
                <td>Şifre</td>
                <td><div id="input"><input name="sifre" type="password" /></div></td>
              </tr>
              <tr>
                <td align="left" valign="middle">&nbsp;<a href="lost_pass.php">
                <div align="left" id="button_unuttum"></div></a>
                </td>
                <td><br />
                <input name="" type="submit" class="button" value="" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><?php
       } else {
	   $sifre2 = md5($sifre);
	   $tablo = "SELECT * FROM user WHERE user_nick='$nick' AND user_sifre='$sifre2'";
	   $sorgu = @mysql_query($tablo);
	   if ( @mysql_num_rows($sorgu) < 1 ) {
	   ?>
                  <script>alert(" Kullanıcı Adı ve/veya Şifre Hatalı !");history.back(-1);</script>
                  <?
				  exit();
	   } else {	   
		 $_SESSION["user_kadi"]  = $nick;
		 $_SESSION["giris"] = base64_encode( md5( trim($sifre2) ) );
	   {
	   ?>
       <script>
	   window.top.location = 'ferman.php';
       </script>
       <?
	   }
	   }
	   }
	   ?></td>
              </tr>
            </form>
            </table>
            </center>
          </td>
        </tr>
      </table>
          <br>
<span class="copyright">Design-Turk &copy; 2008</span>
    </center>
    </td>
  </tr>
</table>

</body>
</html>