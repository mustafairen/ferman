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
<?
include ("yonetim/db.php");
$postcode=md5($_POST[postcode]);

$postcode_kontrol = mysql_query("select code_id from code where postcode = '".$postcode."'");


if( mysql_num_rows($postcode_kontrol) != 1 )
{

    print '<script>alert("Yanl�� Post Kod girdiniz!");history.back();</script>';
    exit;
  
} 
?>
<?
}else{
// giri� yap�lmam�� ise ;
@include ("../../hata.php");
}
?>