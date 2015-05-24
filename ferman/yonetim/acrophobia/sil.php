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
<form name="form1" method="post" action="?shf=user&islem=siliniyor&id=<?=$id?>">
<table border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>Kullanıcı Silmek İçin Güvenlik Kodu Gitmelisiniz !</td>
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
    <td align="right"><input type="submit" name="button" id="button" value="Kullanıcı Sil"></td>
  </tr>
</table>
</form>
<?
}else{
// giriş yapılmamış ise ;
@include ("../../hata.php");
}
?>