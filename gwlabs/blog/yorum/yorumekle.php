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
<form id="form1" name="form1" method="post" action="?shf=yorum&islem=ekle">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="2" align="center"><b>Yorum Ekle</b><br />
              <br /></td>
        </tr>
        <tr>
          <td align="left"><span class="isim">Adýnýz Soyadýnýz</span></td>
          <td align="left"><input name="yazar" type="text" id="yazar" size="15" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="left"><span class="isim">Mail Adresiniz</span></td>
          <td align="left"><input name="mail" type="text" id="mail" value="@" size="15" /></td>
        </tr>
        <tr>
          <td colspan="2"><span class="gizle">
            <input name="blog_id" type="text" id="blog_id" value="<?=$oku[blog_id]?>" size="15" />
          </span>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" align="left"><textarea name="icerik" id="icerik" cols="37" rows="8" class="kutu"></textarea>
              <script language="JavaScript1.2" type="text/javascript">
			  generate_wysiwyg('icerik');
              </script>
          </td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td width="17%" align="left"><span class="darkgolden">Post Code</span><br /></td>
          <td width="83%" align="left"><input name="postcode" type="password" id="postcode" size="10" /></td>
        </tr>
        <tr>
          <td colspan="2" align="left"><input type="submit" name="button" id="button" value=" Gönder " /></td>
        </tr>
      </table></td>
    </tr>
  </table>
</form>
<?
}else{
// giriþ yapýlmamýþ ise ;
@include ("../../../hata.php");
}
?>