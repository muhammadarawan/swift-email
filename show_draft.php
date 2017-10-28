<?php
$reg_no = $_GET['reg_no'];
$server_name = "localhost";
$user_name = "root";
$pwd = "";
$response ;
$counter = 0;
$unique_id = "draft_";
$conn = mysql_connect($server_name,$user_name,$pwd);
if($conn)
{
	$db = "e_mail";
	$is_db_found = mysql_select_db($db);
	if($is_db_found)
	{
		$query = "select sm.mail_id from student_mail as sm where sm.student_reg='".$reg_no."' and sm.draft='1'";
		$result = mysql_query($query);
		if($result)
		{
		//	echo true;
			while($ids = mysql_fetch_assoc($result))
			{
			//	echo true;
				$id = $ids['mail_id'];
				$query = "select * from mails as m where m.id='".$id."' order by m.id desc";
				$mail_info = mysql_query($query);
				if($mail_info)
				{
				//	echo true;
					$mail_data = mysql_fetch_assoc($mail_info);
					$query = "select sm.student_reg from student_mail as sm where sm.mail_id='".$id."' and sm.sent='1'";
					$sender = mysql_query($query);
					if($sender)
					{
						$sender_info = mysql_fetch_assoc($sender);
						$sender_reg = $sender_info['student_reg'];
						$query = "select * from students as s where s.reg_no='".$sender_reg."'";
						$sender_info = mysql_query($query);
						if($sender_info)
						{
							$sender_data = mysql_fetch_assoc($sender_info);
							$sender_fname = $sender_data['fname'];
							$sender_lname = $sender_data['lname'];
							$sender_reg_no = $sender_data['reg_no'];
							$sender_email = $sender_data['email'];
							$sender_pic = $sender_data['image'];
							$unique_id += $id;
					/*		echo "fname ",$sender_fname;
							echo "lname ",$sender_lname;
							echo "reg no ",$sender_reg_no;
							echo "email ",$sender_email;
							echo "sub ",$mail_data['subject'];
							echo "msg " ,$mail_data['message'];
							echo true;*/
							$response = "<div class='email' id=draft_".$id." onClick='fun(this.id)'> <div> <img class='email_pic' src='profile_pics/".$sender_pic."'> </div>
									<div> <h5 class='sender_name'>".$sender_fname." ".$sender_lname. " ".$sender_reg_no."</h5>
									<h4 class='email_subject'>".$mail_data['subject']."</h4><p class='email_msg'>".$mail_data['message']."</p></div></div>";
									echo $response;
							
						}
					}
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
//echo $response;

?>