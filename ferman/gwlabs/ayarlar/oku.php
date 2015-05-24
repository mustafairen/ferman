<?
//giriş kontrol
@include ("giris_kontrol.php");
// oturumu baslatalım
@session_start();
// giriş bilgilerini alalım.
$giris=$_SESSION["giris"];
$ad=$_SESSION["user_kadi"];
// giriş kontrolü yapalım
// giriş yapılmış ise $giris true olmalı
if($giris){
// giriş yapılmış hoşgeldin..
?>
<table width="350" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%" align="center" valign="top"><a href="?shf=codecenter&amp;islem=oku">Code Center</a></td>
    <td width="50%" align="center" valign="top"><a href="?shf=user&amp;islem=oku">User Ayarları</a></td>
  </tr>
  <tr>
    <td align="center" valign="top">&nbsp;</td>
    <td align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top"><a href="?shf=ayarlar&amp;islem=log_oku">Log Sistem</a></td>
    <td align="center" valign="top"><a href="?shf=portal&amp;islem=oku">Portal Ayarları</a></td>
  </tr>
  <tr>
    <td align="center" valign="top">&nbsp;</td>
    <td align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top"><a href="?shf=help&amp;islem=oku">Yardım</a></td>
    <td align="center" valign="top"><a href="?shf=info&amp;islem=oku">Hakkında</a></td>
  </tr>
  <tr>
    <td align="center" valign="top">&nbsp;</td>
    <td align="center" valign="top">&nbsp;</td>
  </tr>
</table>
<?
}else{
// giriş yapılmamış ise ;
@include ("../../hata.php");
}
?>
