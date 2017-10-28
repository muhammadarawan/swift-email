<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="user_style.css">
</head>
<?php
//	setcookie('swift_reg', 0, time()-60, "/" ) ;
//	setcookie('swift_password', 0, time()-60, "/" ) ;
	if(!(isset($_COOKIE['swift_reg']) and isset($_COOKIE['swift_password']) and isset($_COOKIE['swift_option'])))
	{
		header('Location:signin.php');
	}
?>
<title><?PHP echo $_COOKIE['swift_reg']; ?></title>
<link type="text/css" rel="stylesheet" href="user_style.css" >
<script src="user_script.js"></script>

</head>

<?php
//Convert to Upper Case
$reg=$_COOKIE['swift_reg'];
$option=$_COOKIE['swift_option'];
$password=$_COOKIE['swift_password'];
$reg=strtoupper($reg);
//Connect to SQL            
$conn=mysql_connect("localhost","root","");
$db_found=mysql_select_db("e_mail");
if($db_found)
{
	$Query="SELECT * FROM ".$option." where (reg_no='".$reg."' AND password='".$password."')";
	$result=mysql_query($Query);
	$data=mysql_fetch_assoc($result);
}
?>
<body onload="show_inbox()">


<div id="composediv" style="display:none">
<!-- Popup Div Starts Here -->
<div id="subcomposediv">
<!-- Contact Us Form -->
<form action="send_mail.php" id="myform" method="post" name="form" style="width:100%" >
<img id="minimize" src="other_pics/minimize.png" onclick ="mini()">
<img id="close" src="other_pics/cross.png" onclick ="hide()">
<h2 align="center" id="newMag">New Message</h2>
<hr>
<label> To :</label><br/>
<input id="name" name="to" placeholder="Add Reciepient" type="text">
<label>Subject :</label>
<input id="subject" name="subject" placeholder="Enter Subject here" type="text">
<label >Message :</label>
<textarea id="msg" name="message" placeholder="Enter your Message here"></textarea>
<input type="hidden" id="sender_id" value="<?php echo $data['reg_no'] ?>" name="sender_id">
<input type="hidden" id="sender_fname" value="<?php echo $data['fname'] ?>" name="sender_fname">
<input type="hidden" id="sender_lname"value="<?php echo $data['lname'] ?>" name="sender_lname">
<input type="hidden" id="sender_sec" value="<?php echo $data['sec'] ?>" name="sender_sec">
<a class="send" href="javascript:%20check_empty()" >Send</a>
</form>
</div>
</div>





<div id="left_div" >
<div id="swift_mail" style="color:#0CC; position:fixed;top:-15px;left:1px;font-size:large;z-index:1"><h1><i> Swift Mail</i> </h1></div>
<div style="display:inline;float:right;position:fixed;top:50px;left:0px;z-index:1">
<div style="float:left"><img id="dp" src="profile_pics/<?PHP echo $data['image'];?>" onclick="image_view()" style="border-radius:30px;width:40px;height:40px"/>&nbsp;&nbsp;&nbsp;&nbsp;</div>
<div style="float:left;color:#CCC;font-family:'Times New Roman', Times, serif;font-style:italic" >
<h2 style=""><?PHP echo $data['fname']." ".$data['lname'];?></h2>
<h3> <?PHP echo $data['reg_no'];?><br>
&nbsp;&nbsp;&nbsp;Sec : <?PHP echo $data['sec'];?></h3>
<a href="signout.php"><img id="logout_pic" src="other_pics/logout.jpg" style="border-radius:20px;width:40px" /></a></div></div>
    <div id="navi" >

        <div  id="navi_sub">
            <button  id="compose_btn" onClick="compose('0')" >Compose</button>

            <div id="menu">
                <ul style="list-style:none">
                    <li onclick="show_inbox()">Inbox </li>
                    <li onclick="show_sent()">Sent</li>
                    <li onclick="show_draft()">Drafts</li>
                </ul>
            </div>
        </div>
    </div>

    <div id="list" style="visibility:visible">
      
    </div>

    <div id="comp_email" style="visibility:hidden"><img id="img" >
            <div class="comp_email_header" >
                <div >
                    <h1 id="comp_email_title"></h1>
                    <p class="comp_email_subtitles">
                       <b> From</b> <a id="comp_email_from"></a> &nbsp;&nbsp;&nbsp; <b>Reg #</b> <a id="comp_email_from_reg_no" ></a>&nbsp;&nbsp;&nbsp;<b>at</b> <span></span>
                        <p class="comp_email_subtitles">
				<b>To</b> <a id="comp_email_to"></a> &nbsp;&nbsp;&nbsp; <b>Reg # </b><a id="comp_email_to_reg_no" ></a>&nbsp;&nbsp;&nbsp;<b>at</b> <span></span>
                    </p>
                </div>

                <div class="comp_email_btns" >
                    <button class="secondary-button" onClick="compose('1')">Reply</button>
                    <button class="secondary-button" onClick="compose('2')">Forward</button>
                    <button class="secondary-button">Move to</button>
                    <button class="secondary-button" onClick="delete_(this.id)">Delete</button>
                </div>
            </div>

            <div class="comp_email_body" id="comp_email_body" >
              
            </div>
    </div>
</div>










</body>
</html>