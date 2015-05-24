<?
//giriþ kontrol
@include ("giris_kontrol.php");
// oturumu baslatalým
@session_start();
// giriþ bilgilerini alalým.
$giris=$_SESSION["giris"];
$ad=$_SESSION["user_kadi"];
// giriþ kontrolü yapalým
// giriþ yapýlmýþ ise $giris true olmalý
if($giris){
// giriþ yapýlmýþ hoþgeldin..
?>
<table width="350" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%" align="center" valign="top"><a href="?shf=codecenter&amp;islem=oku">Code Center</a></td>
    <td width="50%" align="center" valign="top"><a href="?shf=user&amp;islem=oku">User Ayarlarý</a></td>
  </tr>
  <tr>
    <td align="center" valign="top">&nbsp;</td>
    <td align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top"><a href="?shf=ayarlar&amp;islem=log_oku">Log Sistem</a></td>
    <td align="center" valign="top"><a href="?shf=portal&amp;islem=oku">Portal Ayarlarý</a></td>
  </tr>
  <tr>
    <td align="center" valign="top">&nbsp;</td>
    <td align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top"><a href="?shf=help&amp;islem=oku">Yardým</a></td>
    <td align="center" valign="top"><a href="?shf=info&amp;islem=oku">Hakkýnda</a></td>
  </tr>
  <tr>
    <td align="center" valign="top">&nbsp;</td>
    <td align="center" valign="top">&nbsp;</td>
  </tr>
</table>
<?
}else{
// giriþ yapýlmamýþ ise ;
@include ("../../hata.php");
}
?>
