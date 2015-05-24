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
// giriş yapılmamış ise ;
@include ("../../hata.php");
}
?>