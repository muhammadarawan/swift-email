<?PHP
setcookie('swift_reg', 0, time()-60, "/" ) ;
setcookie('swift_password', 0, time()-60, "/" ) ;
setcookie('swift_option', 0, time()-60, "/" ) ;
header('Location:signin.php');
?>