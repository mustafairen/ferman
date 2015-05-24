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
<form id="form1" name="form1" method="post" action="?shf=postcode&amp;islem=duzeltiliyor">
<table border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="center">Post Code Güncelle<br />
          <br /></td>
    </tr>
    <tr>
      <td><table border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left">Post Code</td>
          <td><input type="password" name="postcode" id="postcode" />
          </td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="left">Yeni Post Code&nbsp;&nbsp;</td>
          <td><input type="password" name="postcode_y" id="postcode_y" /></td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="left">Post Code Tekrar&nbsp;&nbsp;</td>
          <td><input type="password" name="postcode_y_t" id="postcode_y_t" /></td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="left">Güvenlik Kodu</td>
          <td><input type="password" name="securitycode" id="securitycode" /></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
    </tr>
    <tr>
      <td align="right"><input type="submit" name="button" id="button" value="Güncelle" /></td>
    </tr>
</table>
</form>
<?
}else{
// giriþ yapýlmamýþ ise ;
@include ("../../hata.php");
}
?>
