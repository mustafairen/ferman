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
$securitycode=md5($_POST[securitycode]);

$securitycode_kontrol = mysql_query("select code_id from code where securitycode = '".$securitycode."'");


if( mysql_num_rows($securitycode_kontrol) != 1 )
{
    print '<script>alert("Yanlış Güvenlik Kodu girdiniz!");history.back();</script>';
    exit;
} 
?>
<?
}else{
// giriş yapılmamış ise ;
@include ("../../hata.php");
}
?>