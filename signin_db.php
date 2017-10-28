<?php
	$reg=$_POST['reg'];
	$password=$_POST['password'];
	$option=$_POST['option'];
	//Convert to Upper Case
	$reg=strtoupper($reg);
	//Connect to SQL            
	$conn=mysql_connect("localhost","root","");
	$db_found=mysql_select_db("e_mail");
	if($db_found)
	{
		$Query="SELECT * FROM ".$option." where (reg_no='".$reg."' AND password='".$password."')";
		$result=mysql_query($Query);
		$db_fields=mysql_fetch_assoc($result);
		if($db_fields)
		{	
							//time()+secs*min*hrs*days 
			$date_of_expiry = time() + 60 * 60 * 24 * 7 ;
			setcookie('swift_reg', $reg, $date_of_expiry, "/" ) ;
			setcookie('swift_password', $password, $date_of_expiry, "/" ) ;
			setcookie('swift_option', $option, $date_of_expiry, "/" ) ;
			echo true;
		}
		else
		{
			echo false;
		}
	}
	else
	{	echo false;	}
?>