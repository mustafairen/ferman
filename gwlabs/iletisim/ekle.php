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
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="middle" class="text"><span class="darkgolden">�leti�im Ekleme B�l�m�</span></td>
  </tr>
  <tr>
    <td align="left" valign="top">
	<form id="form1" name="form1" method="post" action="?shf=iletisim&islem=ekleniyor">
  
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center" valign="top"><div>
            <table width="500" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="26%" align="left" valign="top"><span class="darkgolden">Mail Adresi :</span></td>
                <td width="74%" align="left" valign="top"><input name="mail" type="text" id="mail" size="30"  class="kutu"/></td>
              </tr>
              <tr>
                <td colspan="2" align="left" valign="top">&nbsp;</td>
              </tr>
              <tr>
                <td width="26%" align="left" valign="top"><span class="darkgolden">Msn Adresi :</span></td>
                <td width="74%" align="left" valign="top"><input name="msn" type="text" id="msn" size="30"  class="kutu"/></td>
              </tr>
              <tr>
                <td colspan="2" align="left" valign="top">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2" align="left" valign="top"><span class="darkgolden">A��klama :</span></td>
              </tr>
              <tr>
                <td colspan="2" align="left" valign="top"><textarea name="metin" id="metin" cols="45" rows="5" style="background: #FFFFFF;"></textarea>
                    <script language="JavaScript1.2" type="text/javascript">
	generate_wysiwyg('metin');
      </script></td>
              </tr>
              <tr>
                <td colspan="2" align="left" valign="top">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" valign="top"><span class="darkgolden">Post Code :</span></td>
                <td align="left" valign="top"><input name="postcode" type="password" id="postcode2" size="8" maxlength="6" /></td>
              </tr>
              <tr>
                <td colspan="2" align="left" valign="top">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2" align="left" valign="top">&nbsp;</td>
              </tr>
            </table>
        </div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top"><? include("gwlabs/ok.html"); ?></td>
  </tr>
  <tr>
    <td align="center" valign="top">&nbsp;</td>
  </tr>
</table>
</form>	</td>
  </tr>
</table>
<?
}else{
// giri� yap�lmam�� ise ;
@include ("../../hata.php");
}
?>