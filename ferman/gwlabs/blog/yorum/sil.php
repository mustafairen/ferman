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
<form name="form1" method="post" action="?shf=yorum&amp;islem=siliniyor&amp;id=<?=$id?>">
<table border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>Veriyi Silmek ��in Postcode Gitmelisiniz !</td>
  </tr>
  <tr>
    <td><span class="gizle"><input name="blog_id" type="text" id="blog_id" value="<?=$blog_id?>" size="5" />
    </span></td>
  </tr>
  <tr>
    <td><table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>Post Code </td>
        <td>
          &nbsp;&nbsp;<input name="postcode" type="password" id="postcode" size="10"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="right"><input type="submit" name="button" id="button" value="Veriyi Sil"></td>
  </tr>
</table>
</form>
<?
}else{
// giri� yap�lmam�� ise ;
@include ("../../../hata.php");
}
?>