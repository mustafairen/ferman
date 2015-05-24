<?php
 
# uye oturum degiskenleri
  $giris_yapilmis = false;
  $uye = false;
 
# kontrol ederek bilgileri dogrulayalim
  if( !empty($_SESSION["giris"]) && !empty($_SESSION["user_kadi"]) ){
  
    # kulanici bilgisini alalim
      $sorgu = mysql_query("select * from user where user_nick='".$_SESSION["user_kadi"]."'");
      if( mysql_num_rows($sorgu) == 1 ){
      
        $uye = mysql_fetch_assoc($sorgu);
        # anahtar kontrol
          if( $_SESSION["giris"]  ==  base64_encode( $uye["sifre"] ) )
		  {
            $giris_yapilmis = true;
          }else{
            # giris yanlis. $uye'yi silelim
            $uye = false;
          }
      }
  }
 
?>