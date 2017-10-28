<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

<body  style=" width:auto; background-repeat:no-repeat; background-size:cover;background-attachment:fixed;background-color:#FFF;background-image:url(background_pics/background.jpg)" onload="">
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
<style>
#results
{
	display:none;
}
#name:focus+#results
{
	display:block;
    position: absolute;
//    top: 35px;
//    left: 0;
//    right: 0;
	left:71.5px;
	top:144px;
	width:332px;
    z-index: 10;
    padding: 0;
    margin: 0;
    border-width: 1px;
    border-style: solid;
    border-color: #cbcfe2 #c8cee7 #c4c7d7;
    border-radius: 3px;
    background-color: #fdfdfd;
/*    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #fdfdfd), color-stop(100%, #eceef4));
    background-image: -webkit-linear-gradient(top, #fdfdfd, #eceef4);
    background-image: -moz-linear-gradient(top, #fdfdfd, #eceef4);
    background-image: -ms-linear-gradient(top, #fdfdfd, #eceef4);
    background-image: -o-linear-gradient(top, #fdfdfd, #eceef4);
    background-image: linear-gradient(top, #fdfdfd, #eceef4);
    -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    -ms-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    -o-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);*
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);*/
	
	
}
#results:hover
{
	cursor:pointer;
}
li
{
	list-style:none;
	
}

</style>
<div id="composediv">
<!-- Popup Div Starts Here -->
<div id="subcomposediv">
<!-- Contact Us Form -->
<form action="#" id="myform" method="post" name="form" style="width:100%">
<img id="minimize" src="other_pics/minimize.png" onclick ="mini()">
<img id="close" src="other_pics/cross.png" onclick ="hide()">
<h2 align="center" id="newMag">New Message</h2>
<hr>
<label> To :</label><br/>
<input id="name" name="to" placeholder="Add Reciepient" type="text" onkeyup="showHint(this.value)" >
<ul id="results" onclick="fun(this)">
		 </ul>
<label>Subject :</label>
<input id="email" name="subject" placeholder="Enter Subject here" type="text">
<label >Message :</label>
<textarea id="msg" name="message" placeholder="Enter your Message here"></textarea>
<a id="send" href="javascript:%20check_empty()" >Send</a>

</form>
</div>
<!-- Popup Div Ends Here -->
</div>

<!-- Profile Pic Displa-->
<div id="top_div" style="position:fixed;height:25%;width:100%;top:0;left:0;background-repeat:no-repeat">
<div id="swift_mail" style="color:#0CC; position:fixed;top:-15px;left:20px;font-size:x-large"><h1><i> Swift Mail</i> </h1></div>
<div style="display:inline;float:right;position:relative;top:5px;left:-10px">
<div style="float:left"><img id="dp" src="profile_pics/<?PHP echo $data['image'];?>" onclick="image_view()" style="border-radius:30px;"/>&nbsp;&nbsp;&nbsp;&nbsp;</div>
<div style="float:left;color:#000;font-family:'Times New Roman', Times, serif;font-style:italic" >
<h2 style=""><?PHP echo $data['fname']." ".$data['lname'];?></h2>
<h3> <?PHP echo $data['reg_no'];?><br>
&nbsp;&nbsp;&nbsp;Sec : <?PHP echo $data['sec'];?></h3>
<a href="signout.php"><img id="logout_pic" src="other_pics/logout.jpg" style="border-radius:20px"/></a></div></div>
<div style="width:15%;height:100%;position:fixed;"><button name="compose" id="compose_btn" onclick="compose()" style="position:fixed;top:250px; left:35px">COMPOSE</button></div>


<div style="overflow:scroll;height:300%;width:100%" >

<table width="100%">
    <tr>
    	<td width="15%" align="center" valign="top" >
        </td>
        
		<td width="85%">
        <fieldset id="fields"><legend >INBOX</legend>
        	<table id="fields_tables_inbox"  border="4">
            	<tr>
                	<td width="2%" >
                    	<button name="InboxPrev" style="background:none; border:none;" onclick="" id="prev"><img width="15" height="140" src="other_pics/prev.png" id="prev"/></button>
                    </td>
                    <td id="i_msg1" width="16%" class="blur" onclick="select_msg(this.id)">
                    </td>
                    <td id="i_msg2" width="16%" class="blur" onclick="select_msg(this.id)">
                    </td>
                    <td id="i_msg3" width="16%" class="blur" onclick="select_msg(this.id)">
                    </td>
                    <td id="i_msg4" width="16%" class="blur" onclick="select_msg(this.id)">
                    </td>
                    <td id="i_msg5" width="16%" class="blur" onclick="select_msg(this.id)">
                    </td>
                    <td id="i_msg6" width="16%" class="blur" onclick="select_msg(this.id)">
                    </td>
                    <td width="2%">
                    	<button name="InboxPrev" style="background:none; border:none;" onclick="" id="next"><img width="15" height="140" src="other_pics/next.png" id="next"/></button>
                    </td>
                </tr>
            </table>
         </fieldset>
         <br />
         <fieldset id="fields"><legend >SENT ITEM</legend>
        	<table id="fields_tables_sent"   border="4">
            	<tr>
                	<td width="2%">
                    	<button name="InboxPrev" style="background:none; border:none;" onclick="" id="prev"><img width="15" height="140" src="other_pics/prev.png" id="prev"/></button>
                    </td>
                    <td id="s_msg1" width="16%" class="blur" onclick="select_msg(this.id)">
                    </td>
                    <td id="s_msg2" width="16%" class="blur" onclick="select_msg(this.id)">
                    </td>
                    <td id="s_msg3" width="16%" class="blur" onclick="select_msg(this.id)">
                    </td>
                    <td id="s_msg4" width="16%" class="blur" onclick="select_msg(this.id)">
                    </td>
                    <td id="s_msg5" width="16%" class="blur" onclick="select_msg(this.id)">
                    </td>
                    <td id="s_msg6" width="16%" onclick="select_msg(this.id)">
                    </td>
                    <td width="2%">
                    	<button name="InboxPrev" style="background:none; border:none;" onclick="" id="next"><img width="15" height="140" src="other_pics/next.png" id="next"/></button>
                    </td>
                </tr>
            </table>
         </fieldset>
         <br />
         <fieldset  id="fields"><legend >DRAFT</legend>
        	<table id="fields_tables_i_msg"   border="4">
            	<tr>
                	<td width="2%">
                    	<button name="InboxPrev" style="background:none; border:none;" onclick="" id="prev"><img width="15" height="140" src="other_pics/prev.png" id="prev"/></button>
                    </td>
                    <td id="d_msg1" width="16%" class="blur" onclick="select_msg(this.id)">
                    </td>
                    <td id="d_msg2" width="16%" class="blur" onclick="select_msg(this.id)">
                    </td>
                    <td id="d_msg3" width="16%" class="blur" onclick="select_msg(this.id)">
                    </td>
                    <td id="d_msg4" width="16%" class="blur" onclick="select_msg(this.id)">
                    </td>
                    <td id="d_msg5" width="16%" class="blur" onclick="select_msg(this.id)">
                    </td>
                    <td id="d_msg6" width="16%" class="blur" onclick="select_msg(this.id)">
                    </td>
                    <td width="2%">
                    	<button name="InboxPrev" style="background:none; border:none;" onclick="" id="next"><img width="15" height="140" src="other_pics/next.png" id="next"/></button>
                    </td>
                </tr>
            </table>
         </fieldset>
        </td>
    </tr>
</table>




</div>


</div>

</body>
</html>
