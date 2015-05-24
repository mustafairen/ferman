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
<?
require ("yonetim/db.php");
$sorgu = mysql_query("SELECT * FROM iletisim ");
while ( $oku = mysql_fetch_array($sorgu) ){
if ($id == $oku["iletisim_id"]) {
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="middle" class="text"><span class="darkgolden">İletişim Bilgi Güncelle</span></td>
  </tr>
  <tr>
    <td align="left" valign="top">
	<form id="form1" name="form1" method="post" action="?shf=iletisim&islem=duzeltiliyor">
  
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top"><div class="gizle">
        <input name="id" type="text"  class="kutu" id="id" value="<?=$oku[iletisim_id]?>" size="30" readonly=""/></div></td>
  </tr>
  <tr>
    <td align="center" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center" valign="top"><div>
            <table width="500" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="26%" align="left" valign="top"><span class="darkgolden">Mail Adresi :</span></td>
                <td width="74%" align="left" valign="top"><input name="mail" type="text"  class="kutu" id="mail" value="<?=$oku[iletisim_mail]?>" size="30"/></td>
              </tr>
              <tr>
                <td colspan="2" align="left" valign="top">&nbsp;</td>
              </tr>
              <tr>
                <td width="26%" align="left" valign="top"><span class="darkgolden">Msn Adresi :</span></td>
                <td width="74%" align="left" valign="top"><input name="msn" type="text"  class="kutu" id="msn" value="<?=$oku[iletisim_msn]?>" size="30"/></td>
              </tr>
              <tr>
                <td colspan="2" align="left" valign="top">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2" align="left" valign="top"><span class="darkgolden">Açıklama :</span></td>
              </tr>
              <tr>
                <td colspan="2" align="left" valign="top"><textarea name="metin" id="metin" cols="45" rows="5" style="background: #FFFFFF;"><?=$oku[iletisim_icerik]?>
    </textarea>
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
}
}
//mysql bağlantısının kapatılması
mysql_close ($baglanti);
?>
<?
}else{
// giriş yapılmamış ise ;
@include ("../../hata.php");
}
?>