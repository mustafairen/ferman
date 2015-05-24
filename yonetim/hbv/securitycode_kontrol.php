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
<?
include ("yonetim/db.php");
$securitycode=md5($_POST[securitycode]);

$securitycode_kontrol = mysql_query("select code_id from code where securitycode = '".$securitycode."'");


if( mysql_num_rows($securitycode_kontrol) != 1 )
{
    print '<script>alert("Yanlýþ Güvenlik Kodu girdiniz!");history.back();</script>';
    exit;
} 
?>
<?
}else{
// giriþ yapýlmamýþ ise ;
@include ("../../hata.php");
}
?>