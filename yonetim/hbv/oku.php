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
<br />
<table width="350" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="50%" align="center"><a href="?shf=postcode&amp;islem=oku">Post Code<br />
      G�ncelle</a></td>
    <td width="50%" align="center"><a href="?shf=securitycode&amp;islem=oku&amp;code=security">G�venlik Kodu<br />
      G�ncelle</a></td>
  </tr>
</table>
<?
}else{
// giri� yap�lmam�� ise ;
@include ("../../hata.php");
}
?>