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
<br />
<table width="350" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="50%" align="center"><a href="?shf=postcode&amp;islem=oku">Post Code<br />
      Güncelle</a></td>
    <td width="50%" align="center"><a href="?shf=securitycode&amp;islem=oku&amp;code=security">Güvenlik Kodu<br />
      Güncelle</a></td>
  </tr>
</table>
<?
}else{
// giriþ yapýlmamýþ ise ;
@include ("../../hata.php");
}
?>