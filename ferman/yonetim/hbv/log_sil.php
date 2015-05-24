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
<form name="form1" method="post" action="?shf=ayarlar&islem=log_siliniyor&id=<?=$id?>">
<table border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>Tutulan LOG'u Silmek Ýçin Güvenlik Kodu Girmelisiniz !</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>Güvenlik Kodu</td>
        <td>
          &nbsp;&nbsp;<input name="securitycode" type="password" id="securitycode" size="10"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="right"><input type="submit" name="button" id="button" value="LOG Sil"></td>
  </tr>
</table>
</form>
<?
}else{
// giriþ yapýlmamýþ ise ;
@include ("../../hata.php");
}
?>