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
<form name="form1" method="post" action="?shf=user&islem=siliniyor&id=<?=$id?>">
<table border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>Kullan�c� Silmek ��in G�venlik Kodu Gitmelisiniz !</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>G�venlik Kodu</td>
        <td>
          &nbsp;&nbsp;<input name="securitycode" type="password" id="securitycode" size="10"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="right"><input type="submit" name="button" id="button" value="Kullan�c� Sil"></td>
  </tr>
</table>
</form>
<?
}else{
// giri� yap�lmam�� ise ;
@include ("../../hata.php");
}
?>