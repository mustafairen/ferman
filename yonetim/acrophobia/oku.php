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
<center>
<div><a href="?shf=user&islem=ekle" class="darkgolden">Yeni Y�netici Ekle</a><br /><br /></div>
  <div>
  <?php
include("yonetim/db.php");
$sql = mysql_query ("select * from user");
while ($oku = mysql_fetch_array($sql)) {
?>
    <table width="350" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="240" align="left" valign="top" background="resim/lodos/user_bg.jpg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top"><br />
              <br />              </td>
          </tr>
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="8%">&nbsp;</td>
                  <td><span class="red">
                    <?=$oku["user_nick"]?>
                  </span></td>
                  <td width="25%">&nbsp;</td>
                </tr>
              </table></td>
            </tr>
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td width="8%">&nbsp;</td>
                <td><span class="maroon"><?=$oku["user_mail"]?></span></td>
                <td width="25%">&nbsp;</td>
              </tr>
            </table>
              <p>&nbsp;</p>
              <p>&nbsp;</p></td>
          </tr>
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="8%">&nbsp;</td>
                <td width="51%"><a href="?shf=user&amp;islem=duzelt&amp;id=<?=$oku[user_id]?>"><span class="darkgolden">G�ncelle</span></a></td>
                <td width="41%" align="left"><span class="gizle">
                  <input name="bolum" type="text" id="kadi" value="<?=$oku[user_nick]?>" size="1" />
                  <?=$oku["user_id"]?>
                </span> <a href="?shf=user&amp;islem=sil&amp;id=<?=$oku[user_id]?>"><span class="darkgolden">�yeyi Sil</span></a></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table>
<?
}
@mysql_close($baglanti);
?>
</div>
</center>
<?
}else{
// giri� yap�lmam�� ise ;
@include ("../../hata.php");
}
?>