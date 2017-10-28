<?php
		$reg=strtoupper($_POST['reg']);
		
		$tmp_name = $_FILES['pic']["tmp_name"];
		$pic_name = $_FILES["pic"]["name"];
		$imageType = pathinfo($pic_name,PATHINFO_EXTENSION);
		if($pic_name=="")
			$pic_name="profile_pic.png";
		else
		{
			move_uploaded_file($tmp_name, "profile_pics/$reg.$imageType");
			$pic_name=$reg.".".$imageType;
		}
		//Connect to SQL
		$conn=mysql_connect("localhost","root","");
		$db_found=mysql_select_db("e_mail");
		if($db_found)
		{
			$check_if_exist="SELECT reg_no FROM ".$_POST['option']." where reg_no='".$reg."'";
			$res=mysql_query($check_if_exist);
		    $yes=mysql_fetch_assoc($res);
			if($yes)
			{
				// already exist
				header('Location: signUP.html');
			}
			else
			{
				$Query="INSERT into  ".$_POST['option']." VALUES ('".$reg."','".$_POST['pass1']."','".$_POST['fname']."','".$_POST['lname']."',
				'".$_POST['bday']."','".$_POST['sec']."','".$_POST['email']."','".$pic_name."')";
				$result=mysql_query($Query);
								//time()+ secs * min * hrs * days 
				$date_of_expiry = time() + 60  *  60 *  24 * 7 ;
				setcookie('swift_reg', $reg, $date_of_expiry, "/" ) ;
				setcookie('swift_password', $_POST['pass1'], $date_of_expiry, "/" ) ;
				setcookie('swift_option', $_POST['option'], $date_of_expiry, "/" ) ;
				header('Location: user.php');
			}
		}
		else
		{	echo "DataBase Not Found";
		}
?>
