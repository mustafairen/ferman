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
$postcode=md5($_POST[postcode]);

$postcode_kontrol = mysql_query("select code_id from code where postcode = '".$postcode."'");


if( mysql_num_rows($postcode_kontrol) != 1 )
{

    print '<script>alert("Yanlýþ Post Kod girdiniz!");history.back();</script>';
    exit;
  
} 
?>
<?
}else{
// giriþ yapýlmamýþ ise ;
@include ("../../hata.php");
}
?>