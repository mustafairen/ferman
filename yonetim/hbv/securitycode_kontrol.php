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
$securitycode=md5($_POST[securitycode]);

$securitycode_kontrol = mysql_query("select code_id from code where securitycode = '".$securitycode."'");


if( mysql_num_rows($securitycode_kontrol) != 1 )
{
    print '<script>alert("Yanl�� G�venlik Kodu girdiniz!");history.back();</script>';
    exit;
} 
?>
<?
}else{
// giri� yap�lmam�� ise ;
@include ("../../hata.php");
}
?>