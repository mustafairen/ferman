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
include("yonetim/db.php");
 $sorgu = mysql_query("select *from yorum where yorum_id='$id'");       
while($y_oku = mysql_fetch_array($sorgu)){
?>
<form name="form1" method="post" action="?shf=yorum&islem=editisle&id=<?=$id?>">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="left" valign="middle"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="2" align="center" class="yorum_ekle">Yorumu Düzelt<br />
              <br /></td>
        </tr>
        <tr>
          <td align="left"><span class="isim">Adınız Soyadınız</span></td>
          <td align="left"><input name="yazar" type="text" id="yazar" value="<?=$y_oku[yorum_yazar]?>" size="15" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="left"><span class="isim">Mail Adresiniz</span></td>
          <td align="left"><input name="mail" type="text" id="mail" value="<?=$y_oku[yazar_mail]?>" size="15" /></td>
        </tr>
        <tr>
          <td colspan="2"><span class="gizle">
            <input name="blog_id" type="text" id="blog_id" value="<?=$blog_id?>" size="15" />
          </span>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" align="left"><textarea name="icerik" id="icerik" cols="37" rows="8" class="kutu"><?=$y_oku[yorum_icerik]?>
        </textarea>
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
          <td colspan="2" align="center"><input type="submit" name="button2" id="button2" value=" Gönder " /></td>
        </tr>
      </table></td>
    </tr>
  </table>
  <? }?>
</form>
<?
}else{
// giriş yapılmamış ise ;
@include ("../../../hata.php");
}
?>