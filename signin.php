<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Swift Mail</title>
</head>
<style>
a{
	color:#FFF;
	text-decoration:none;
	font-family:"Times New Roman", Times, serif;
	font-style:italic;
	font-weight:bolder;
}
a:hover{
	color:#6FF;
	padding:1px;
}
a:visited{
	color:#CFF;
}
input[type=text],[type=password],[type=email] {
	padding:2px;
	margin-top:5px;
	margin-bottom:5px;
	margin-left:10px;
	border:1px solid #ccc;
	padding-left:10px;
	padding-right:10px;
	font-size:14px;
}
</style>
<?php
	if(isset($_COOKIE['swift_reg']) and isset($_COOKIE['swift_password']))
	{
		header('Location:user.php');
	}
?>
<script>
	function check()
	{
		if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else
		{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				if(xmlhttp.responseText == 1)
					window.location.href = "user.php";
				else
					alert("Invalid UserName/Password");
			}
		}
		xmlhttp.open("POST","signin_db.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		r=document.getElementById('reg').value;
		p=document.getElementById('password').value;
		id1=document.getElementById('teacher').checked;
		id2=document.getElementById('student').checked;
		if(id1==false && id2==false)
			alert("Select Option");
		else
		{
			if(id1)
				xmlhttp.send("reg="+r+"&password="+p+"&option="+"teachers");
			else
				xmlhttp.send("reg="+r+"&password="+p+"&option="+"students");
		}
	}
</script>
<body>

<table style="margin-top:-10px;margin-left:-7px;margin-right:-7px" width="100%">
    <tr bgcolor="#0066CC" width:100%>
        <td  align="left" >        
          <div align="center"><a href="about.html"  >About-Us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
            <a href="www.google.com"  >Terms</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
            <a href="www.google.com"  >Admin</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
            <a href="signUP.html"  >Sign-Up</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
            <a href="complain.html"  >Complain</a>
        </div></td>
    </tr>
    <tr>
       <td align="center"><img src="other_pics/logo.png" width="392" height="279"  style="alignment-adjust:central" /><br>
        <fieldset style="width:30%; border:double;">
        		<legend style="color:#09C;">LOG-IN HERE</legend>
                <br />
                <i><b><font size="+2" face="Britannic Bold" color="#3366FF">
                Registration# <input type="text" id="reg" style="color:#06C" /><br />
                Password: <input type="password" id="password"/><br /><br />
                <input type="radio" name="option" id="teacher" value="Teacher"/>Teacher 
                <input type="radio" name="option" id="student"  value="Student"/>Student<br />
                </font>
                </b></i>
            	<input type="image" src="other_pics/login.jpg" width="30%" height="30%" onclick="return check()" /><br>
        </fieldset>
        <a href="signup.html"><img src="other_pics/signUP.PNG" /></a>
        </td>   
    </tr>
</table>
</body>
</html>
