<? @include "yonetim/hbv/avatar.php"; ?>
<form name="form1" method="post" action="?shf=portal&islem=ekle">
  <table border="0" cellspacing="0" cellpadding="0">
  <tr>
      <td colspan="2" align="center"><img src="<?=$avatar?>" border="1" style="border:#CCCCCC" /></td>
    </tr>
   <tr>
      <td colspan="2" align="center"><strong><?=$nick?></strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="left">Portal Nick </td>
      <td><input name="portal_nick" type="text" id="portal_nick" value="<?=$nick?>"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="left">Portal Avatar&nbsp; </td>
      <td><input name="portal_avatar" type="text" id="portal_avatar" value="<?=$avatar?>"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="left">Post Code</td>
      <td><input type="password" name="postcode" id="postcode"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="button" id="button" value=" Kaydet "></td>
    </tr>
  </table>
</form>
