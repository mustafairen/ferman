<?php
# Sunucu ve Vertaban� Bilgilerinizi Yaz�n�z #
$host = "localhost";    // host adresi
$host_name = "root";    // kullan�c� ad�
$dbsifre = "";          // �ifre
$veritabani = "ferman"; // veritaban� ismi [extra bilgi : KUR.php bu veritaban�na kurulumu yapacakt�r.]
$sqlEngine = "InnoDB";  // Bu genellikle i�inize yaramaz, De�i�tirmeyin.
$site_adresi = "localhost/ferman/"; // mustafairen.com/ [extra bilgi : 'http://' eklemeyiniz.]
$site_ismi = "mustafa iren Official WebSite"; //mustafa iren Official WebSite

########################################
# Buradan A�a��s� Kendi G�revini Yapar #
########################################
//Hata Mesajlar�
$mysql_hata = "
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-9\" />
<title>Veritaban� Ba�lant� Problemi | $site_ismi</title>
</head>

<body topmargin=\"0\" marginheight=\"0\" marginwidth=\"0\" bgcolor=\"#000000\" text=\"#00FF00\" link=\"#00CC00\" vlink=\"#00CC33\" alink=\"#66FF00\">
<center>
<br /><br />
Veritaban� Ba�lant�s�nda ufak bir problem var.<br />
L�tfen bir s�re sonra tekrar u�ray�n�z.<br />
GWLabs
<br />
<img src=\"resim/lodos/dikkat.jpg\" border=\"0\" width=\"100\" height=\"100\" />
</center>
<meta http-equiv=\"refresh\" content=\"7\"> 
</body>
</html>
";

$veritabani_hata = "
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-9\" />
<title>Veritaban� Ba�lant� Problemi | $site_ismi</title>
</head>

<body topmargin=\"0\" marginheight=\"0\" marginwidth=\"0\" bgcolor=\"#000000\" text=\"#00FF00\" link=\"#00CC00\" vlink=\"#00CC33\" alink=\"#66FF00\">
<center>
<br /><br />
Veritaban� Ba�lant�s�nda ufak bir problem var.<br />
L�tfen bir s�re sonra tekrar u�ray�n�z.<br />
GWLabs
<br />
<img src=\"resim/lodos/dikkat.jpg\" border=\"0\" width=\"100\" height=\"100\" />
</center>
<meta http-equiv=\"refresh\" content=\"7\"> 
</body>
</html>
";
// MySQL Ba�lant�s�
$baglanti = @mysql_connect ($host,$host_name,$dbsifre);
if (!$baglanti)
{
print $mysql_hata;
exit();
}
// VeriTaban� Ba�lant�s�
if (! @mysql_select_db($veritabani, $baglanti))
{
print $veritabani_hata;
# Veritaban� olu�tur. // Yetki yok ise veritaban� olu�turalamaz.
mysql_query("
CREATE DATABASE $veritabani DEFAULT CHARACTER SET utf8 COLLATE utf8_turkish_ci;
");
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%" height="100%" align="center" valign="middle"><br />
    L�tfen Bekleyiniz <img src="resim/lodos/bekleyin_ms.gif" alt="" width="24" height="24" /><br />
    Veritaban� Kontrol Ediliyor.
    <br />
    <br />
    </td>
  </tr>
</table>
<meta http-equiv="refresh" content="7"> 
<?
exit();
}
?>