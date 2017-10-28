<?php

$reg_no = $_GET['reg_no'];
$mail_id = $_GET['mail_id'];
$option = $_GET['option'];
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
		if($option == 1)
		{
			$query = "update student_mail as sm set sm.trash='1' where sm.student_reg='".$reg_no."'and sm.mail_id='".$mail_id."' and sm.inbox='1'";
		}
		else if($option == 2)
		{
			$query = "update student_mail as sm set sm.trash='1' where sm.student_reg='".$reg_no."'and sm.mail_id='".$mail_id."' and sm.sent='1'";
		}
		else
		{
			$query = "update student_mail as sm set sm.trash='1' where sm.student_reg='".$reg_no."'and sm.mail_id='".$mail_id."' and sm.draft='1'";
		}
		if(mysql_query($query))
		{
			echo true;
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