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
<?
include ("yonetim/db.php");
$postcode=md5($_POST[postcode]);

$postcode_kontrol = mysql_query("select code_id from code where postcode = '".$postcode."'");


if( mysql_num_rows($postcode_kontrol) != 1 )
{

    print '<script>alert("Yanlış Post Kod girdiniz!");history.back();</script>';
    exit;
  
} 
?>
<?
}else{
// giriş yapılmamış ise ;
@include ("../../hata.php");
}
?>