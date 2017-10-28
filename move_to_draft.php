<?php

$to = $_GET['to'];
$subject = $_GET['subject'];
$message = $_GET['message'];
$sender_lname = $_GET['sender_fname'];
$sender_lname = $_GET['sender_lname'];
$sender_sec = $_GET['sender_sec'];
$reg_no = $_GET['reg_no'];

$server_name = "localhost";
$user_name = "root";
$pwd = "";
$conn = mysql_connect($server_name,$user_name,$pwd);
if($conn)
{
	$db = "e_mail";
	$is_db_found = mysql_select_db($db);
	if($is_db_found)
	{
		$query = "insert into mails (subject, message) values('".$_GET['subject']."','".$_GET['message']."')";
		if(mysql_query($query))
		{
			$query = "select max(id) from mails";
			$result = mysql_query($query);
			if($result)
			{
				$new_id=mysql_fetch_assoc($result);
				
				$query = "insert into student_mail values ('".$new_id['max(id)']."','".$_GET['reg_no']."',0, 0,1, 0 ,0)";
				if(mysql_query($query))
				{
					echo 2;
				}
				else
				{
					echo false;
				}
			}
		}
		else
		{
			echo false;
		}
	}
	else
	{
		echo false;
	}
}
else
{
	echo false;
}
?>
