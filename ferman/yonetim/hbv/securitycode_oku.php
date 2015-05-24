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
<form id="form2" name="form1" method="post" action="?shf=securitycode&amp;islem=duzeltiliyor">
<table border="0" cellspacing="0" cellpadding="0"> 
    <tr>
      <td align="center">Güvenlik Kodu  Güncelle<br />
          <br /></td>
    </tr>
    <tr>
      <td><table border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left">Güvenlik Kodu</td>
          <td><input type="password" name="securitycode" id="securitycode" />
          </td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="left">Yeni Güvenlik Kodu&nbsp;&nbsp;</td>
          <td><input type="password" name="securitycode_y" id="securitycode_y" /></td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="left">Güvenlik Kodu Tekrar&nbsp;&nbsp;</td>
          <td><input type="password" name="securitycode_y_t" id="securitycode_y_t" /></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
    </tr>
    <tr>
      <td align="right"><input type="submit" name="button2" id="button2" value="Güncelle" /></td>
    </tr>
</table>
</form>
<p>&nbsp;</p>
<?
}else{
// giriş yapılmamış ise ;
@include ("../../hata.php");
}
?>