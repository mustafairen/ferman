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
<form id="form2" name="form1" method="post" action="?shf=securitycode&amp;islem=duzeltiliyor">
<table border="0" cellspacing="0" cellpadding="0"> 
    <tr>
      <td align="center">G�venlik Kodu  G�ncelle<br />
          <br /></td>
    </tr>
    <tr>
      <td><table border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left">G�venlik Kodu</td>
          <td><input type="password" name="securitycode" id="securitycode" />
          </td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="left">Yeni G�venlik Kodu&nbsp;&nbsp;</td>
          <td><input type="password" name="securitycode_y" id="securitycode_y" /></td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="left">G�venlik Kodu Tekrar&nbsp;&nbsp;</td>
          <td><input type="password" name="securitycode_y_t" id="securitycode_y_t" /></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
    </tr>
    <tr>
      <td align="right"><input type="submit" name="button2" id="button2" value="G�ncelle" /></td>
    </tr>
</table>
</form>
<p>&nbsp;</p>
<?
}else{
// giri� yap�lmam�� ise ;
@include ("../../hata.php");
}
?>