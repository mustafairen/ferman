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
<?
require ("yonetim/db.php");
$sorgu = mysql_query("SELECT * FROM user ");
while ( $oku = mysql_fetch_array($sorgu) ){
if ($id == $oku["user_id"]) {
?>
<form name="form1" method="post" action="?shf=user&islem=duzeltiliyor">
  <table width="350" border="0" cellspacing="0" cellpadding="0">
   <tr>
      <td width="35%" align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top"><label><div class="gizle">
        <input name="id" type="text" id="id" value="<?=$oku[user_id]?>" size="1">
        <input name="nick_e" type="text" id="nick_e" value="<?=$oku[user_nick]?>" size="1" />
        <input name="mail_e" type="text" id="mail_e" value="<?=$oku[user_mail]?>" size="1" />
      </div>
      </label></td>
    </tr>
    <tr>
      <td width="35%" align="left" valign="top">Nick</td>
      <td align="left" valign="top"><label>
        <input name="nick" type="text" id="nick" value="<?=$oku[user_nick]?>">
      </label></td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top">Eski �ifre</td>
      <td align="left" valign="top"><input name="sifre_e" type="password" id="sifre_e"></td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top">Yeni �ifre</td>
      <td align="left" valign="top"><label>
        <input name="sifre" type="password" id="sifre">
      </label></td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">
      <span class="dipnot">De�i�tirmek istemiyorsan�z bo� b�rak�n</span>
      &nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top">�ifre Do�rula</td>
      <td align="left" valign="top"><input type="password" name="sifre_t" id="sifre_t" /></td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top"><span class="dipnot">De�i�tirmek istemiyorsan�z bo� b�rak�n</span></td>
    </tr>
    <tr>
      <td align="left" valign="top"> Mail</td>
      <td align="left" valign="top"><label>
        <input name="mail" type="text" id="mail" value="<?=$oku[user_mail]?>">
      </label></td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top"> G�venlik Kodu</td>
      <td align="left" valign="top"><label>
        <input name="securitycode" type="password" id="securitycode">
      </label></td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="right" valign="top"><input type="submit" name="button" id="button" value="G�ncelle"></td>
    </tr>
  </table>
</form>
<?
}
}
//mysql ba�lant�s�n�n kapat�lmas�
mysql_close ($baglanti);
?>
<?
}else{
// giri� yap�lmam�� ise ;
@include ("../../hata.php");
}
?>