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
<?
require ("yonetim/db.php");
$sorgu = mysql_query("SELECT * FROM network ");
while ( $oku = mysql_fetch_array($sorgu) ){
if ($id == $oku["network_id"]) {
?>
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="middle"><span class="darkgolden">Network Güncelleme Bölümü</span></td>
  </tr><form id="form1" name="form1" method="post" action="?shf=network&islem=duzeltiliyor">
  <tr>
    <td><table width="300" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top"><div class="gizle">
            <input name="id" type="text"  class="kutu" id="id" value="<?=$oku[network_id]?>" size="30" maxlength="20" readonly=""/>
        </div></td>
      </tr>
      <tr>
        <td align="left" valign="top"><span class="darkgolden">Ýsim/Nick :</span></td>
      </tr>
      <tr>
        <td align="left" valign="top"><input name="konu" type="text"  class="kutu" id="konu" value="<?=$oku[network_isim]?>" size="30"/></td>
      </tr>
      <tr>
        <td align="left" valign="top"><span class="darkgolden">Link :</span></td>
      </tr>
      <tr>
        <td align="left" valign="top"><input name="link" type="text"  class="kutu" id="link" value="<?=$oku[network_link]?>" size="30"/></td>
      </tr>
      <tr>
        <td align="left" valign="top"><span class="darkgolden"><br />
          Açýklama :</span></td>
      </tr>
      <tr>
        <td align="left" valign="top"><textarea name="metin" cols="40" rows="2" id="metin" class="kutu"><?=$oku[network_icerik]?>
    </textarea></td>
      </tr>
      <tr>
        <td align="left" valign="top"><div id="postcode" align="left"> <br />
                <table width="250" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="100" align="left" valign="middle"><span class="darkgolden">Post Code :</span></td>
                    <td width="150" align="left" valign="middle"><label>
                      <input name="postcode" type="password" id="postcode2" size="10" maxlength="6" />
                    </label></td>
                  </tr>
                </table>
        </div></td>
      </tr>
      <tr>
        <td align="center" valign="top">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="top"><? include("gwlabs/ok.html"); ?></td>
      </tr>
    </table></td>
  </tr></form>
</table>
<?
}
}
//mysql baðlantýsýnýn kapatýlmasý
mysql_close ($baglanti);
?>
<?
}else{
// giriþ yapýlmamýþ ise ;
@include ("../../hata.php");
}
?>