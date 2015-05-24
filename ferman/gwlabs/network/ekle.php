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
?><form id="form1" name="form1" method="post" action="?shf=network&amp;islem=ekleniyor">
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="middle"><span class="darkgolden">Bağlantı Ekle</span></td>
  </tr>
  <tr>
    <td><table width="300" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
          <td align="left" valign="top">
          <table width="300" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="center" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td align="left" valign="top"><span class="darkgolden">İsim/Kuruluş :</span></td>
            </tr>
            <tr>
              <td align="left" valign="top"><input name="konu" type="text"  class="kutu" id="konu" size="30" maxlength="20"/></td>
            </tr>
            <tr>
              <td align="left" valign="top"><span class="darkgolden">Link :</span></td>
            </tr>
            <tr>
              <td align="left" valign="top"><input name="link" type="text" id="link" size="30"  class="kutu"/></td>
            </tr>
            <tr>
              <td align="left" valign="top"><span class="dipnot">örn: www.site.com [http:// kendiliğinden eklenecektir.]</span></td>
            </tr>
            <tr>
              <td align="left" valign="top"><span class="darkgolden"><br />
                Açıklama :</span></td>
            </tr>
            <tr>
              <td align="left" valign="top"><textarea name="metin" cols="40" rows="2" id="metin" class="kutu"></textarea></td>
            </tr>
            <tr>
              <td align="left" valign="top"><div id="postcode" align="left"> <br />
                      <table width="250" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="100" align="left" valign="middle"><span class="darkgolden">Post Code :</span></td>
                          <td width="150" align="left" valign="middle"><label>
                            <input name="postcode" type="password" id="postcode" size="10" maxlength="6" />
                          </label></td>
                        </tr>
                      </table>
              </div></td>
            </tr>
            <tr>
              <td align="center" valign="top">&nbsp;</td>
            </tr>
          </table>
          </td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="top"><? @include("gwlabs/ok.html"); ?></td>
      </tr>
    </table></td>
  </tr>
</table></form>
<?
}else{
// giriş yapılmamış ise ;
@include ("../../hata.php");
}
?>