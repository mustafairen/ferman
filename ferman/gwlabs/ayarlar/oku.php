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
?>
<table width="350" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%" align="center" valign="top"><a href="?shf=codecenter&amp;islem=oku">Code Center</a></td>
    <td width="50%" align="center" valign="top"><a href="?shf=user&amp;islem=oku">User Ayarlar�</a></td>
  </tr>
  <tr>
    <td align="center" valign="top">&nbsp;</td>
    <td align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top"><a href="?shf=ayarlar&amp;islem=log_oku">Log Sistem</a></td>
    <td align="center" valign="top"><a href="?shf=portal&amp;islem=oku">Portal Ayarlar�</a></td>
  </tr>
  <tr>
    <td align="center" valign="top">&nbsp;</td>
    <td align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top"><a href="?shf=help&amp;islem=oku">Yard�m</a></td>
    <td align="center" valign="top"><a href="?shf=info&amp;islem=oku">Hakk�nda</a></td>
  </tr>
  <tr>
    <td align="center" valign="top">&nbsp;</td>
    <td align="center" valign="top">&nbsp;</td>
  </tr>
</table>
<?
}else{
// giri� yap�lmam�� ise ;
@include ("../../hata.php");
}
?>
