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
<form name="form1" method="post" action="?shf=user&islem=ekleniyor">
  <table width="350" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="35%" align="left" valign="top">Nick</td>
      <td align="left" valign="top"><label>
        <input name="nick" type="text" id="nick" size="20">
      </label></td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top">Şifre</td>
      <td align="left" valign="top"><label>
        <input name="sifre" type="password" id="sifre" size="20">
      </label></td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top">Şifre Doğrula</td>
      <td align="left" valign="top"><input name="sifre2" type="password" id="sifre2" size="20" /></td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top">Mail</td>
      <td align="left" valign="top"><label>
        <input name="mail" type="text" id="mail" size="20">
      </label></td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top">Güvenlik Kodu</td>
      <td align="left" valign="top"><label>
        <input name="securitycode" type="password" id="securitycode" size="20">
      </label></td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="right" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="right" valign="top"><input type="submit" name="button" id="button" value="Yönetici Ekle"></td>
    </tr>
  </table>
</form>
<?
}else{
// giriş yapılmamış ise ;
@include ("../../hata.php");
}
?>