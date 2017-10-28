old_parent = 0;
ids = 8;
function check_empty() {
if (document.getElementById('name').value == "" ) {
alert("Add Reciepient !");
} else {
	if(document.getElementById('subject').value == "")
	{
//		alert("1");
		document.getElementById('subject').value = " ";
	}
	if(document.getElementById('msg').value == "")
	{
//		alert("1");
		document.getElementById('msg').value = " ";
	}
alert("Message Sent...");
//duplicate();
//hide();
document.getElementById('composediv').style.display = "none";
send_mail("1");
//document.getElementById('myform').submit();


}
}

function send_mail(option)
{
var to = document.getElementById("name").value;
var subject = document.getElementById("subject").value;
var message = document.getElementById("msg").value;
var sender_fname = document.getElementById("sender_fname").value;
var sender_lname = document.getElementById("sender_lname").value;
var sender_sec = document.getElementById("sender_sec").value;
var reg_no = document.getElementById("sender_id").value;
	var recievers = to.split(",");
//	alert(recievers.length);
/*	alert(to);
	alert(subject);
	alert(message);
	alert(reg_no);
	alert(sender_fname);
	alert(sender_lname);
	alert(sender_sec);
*/
	var str = "?to="+to+"&subject="+subject+"&message="+message+"&sender_fname="+sender_fname+"&sender_lname="+sender_lname+"&sender_sec="+sender_sec+"&reg_no="+reg_no;
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
			{
				alert("sent");
			}
			if(xmlhttp.responseText == 2)
			{
				alert("drafted");
			}
//			alert (xmlhttp.responseText);
		}
	}
	if(option == "1")
	{
		xmlhttp.open("GET","send_mail.php"+str,false);
	}
	else if(option == "2")
	{
		xmlhttp.open("GET","move_to_draft.php"+str,false);
	}
	xmlhttp.send();
}
function compose(to) 
{
	var compose_div =  document.getElementById('composediv');
	compose_div.style.display = "block";
	compose_div.style.zIndex = "50";
	if(to == '1')
	{
		document.getElementById("newMag").innerHTML = "Reply to " +document.getElementById("comp_email_from").innerHTML;
		document.getElementById("name").value = document.getElementById("comp_email_from_reg_no").innerHTML;
		
	}
	else if(to == '2')
	{
		document.getElementById("name").value = "";
		document.getElementById("newMag").innerHTML = "Forward";
		document.getElementById("name").setAttribute("placeholder", "Add Reciepient");
	}
	else
	{
		document.getElementById("name").value = "";
		document.getElementById("newMag").innerHTML = "New Message";
		document.getElementById("name").setAttribute("placeholder", "Add Reciepient");
	}
}
//Function to Hide Popup
function hide()
{
	document.getElementById('composediv').style.display = "none";
	send_mail("2");
//	document.getElementById("maximize_btn").style.visibility = "hidden";
}
function mini()
{
	document.getElementById("composediv").style.display = "none";
	document.getElementById("maximize_btn").style.visibility = "visible";
	
}
function maxi()
{
	document.getElementById("composediv").style.display = "block";
	document.getElementById("maximize_btn").style.visibility = "hidden";
}
function image_view() 
{
	document.getElementById('img_div').style.display = "block";
}
function image_hide() 
{
	document.getElementById('img_div').style.display = "none"
}
function fun(id)
{
	if(old_parent)
	{
		old_parent.style.backgroundColor = "white";
	}
	var parent = document.getElementById(id);
	parent.style.backgroundColor = "#eee";
	var msg = parent.getElementsByTagName("p")[0].childNodes[0].nodeValue;
	var subject = parent.getElementsByTagName("h4")[0].childNodes[0].nodeValue;
//	alert(subject);
	var from_name = parent.getElementsByTagName("h5")[0].childNodes[0].nodeValue;
	var from_reg_no = parent.getElementsByTagName("h5")[1].childNodes[0].nodeValue;
	document.getElementById("comp_email_title").innerHTML = subject;
	if(id[0] == 'i')
	{
		document.getElementsByClassName("comp_email_subtitles")[0].style.display = "block";
		document.getElementsByClassName("comp_email_subtitles")[1].style.display = "none";
		document.getElementById("comp_email_from").innerHTML = from_name;
		document.getElementById("comp_email_from_reg_no").innerHTML = from_reg_no;
		document.getElementsByClassName("secondary-button")[0].style.visibility = "visible";
	}
	else if(id[0] == 's')
	{
		document.getElementsByClassName("comp_email_subtitles")[1].style.display = "block";
		document.getElementsByClassName("comp_email_subtitles")[0].style.display = "none";
		document.getElementById("comp_email_to").innerHTML = from_name;
		document.getElementById("comp_email_to_reg_no").innerHTML = from_reg_no;
		document.getElementsByClassName("secondary-button")[0].style.visibility = "hidden";
	}
	var email = document.getElementById("comp_email_body").innerHTML = msg;
	old_parent = parent;
	document.getElementById("comp_email").getElementsByTagName("button")[3].setAttribute("id" , id);
	document.getElementById("img").src = parent.getElementsByClassName("email_pic")[0].src;
	document.getElementById("comp_email").style.visibility = "visible";
}
function duplicate()
{

	var list  = document.getElementById("list");
	var new_email_div = document.createElement("div");
	new_email_div.setAttribute("class" , "email");

	var img_div = document.createElement("div");
	var new_img = document.createElement("img");
	new_img.setAttribute("class" ," email_pic");
	new_img.setAttribute("src" ,"");

	var email_body_div = document.createElement("div");
	var new_h5 = document.createElement("h5");
	new_h5.setAttribute("class" , "sender_name");
	
	var new_h4 = document.createElement("h4");
	new_h4.setAttribute("class" , "email_subject");
	var new_p = document.createElement("p");
	new_p.setAttribute("class" , "email_msg");
	
	email_body_div.appendChild(new_h5);
	
	email_body_div.appendChild(new_h4);
	email_body_div.appendChild(new_p);
	
	img_div.appendChild(new_img);
	new_email_div.appendChild(img_div);
	new_email_div.appendChild(email_body_div);

	list.appendChild(new_email_div);
	new_h5.innerHTML = "Ali";
	new_h4.innerHTML = "hi ";
	new_p.innerHTML = "how are you doing hhow is it going";
	
	var local_id = "abc"+ids;
	new_email_div.setAttribute("id" , local_id);
	new_email_div.setAttribute("onClick" , "fun(this.id)");
	ids++;
}


function show_inbox()
{
	var sender_fname = document.getElementById("sender_fname").value;
	var sender_lname = document.getElementById("sender_lname").value;
	var reg_no = document.getElementById("sender_id").value;
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
//			alert(xmlhttp.responseText);
			document.getElementById("list").innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","show_inbox.php?reg_no="+reg_no,false);
	xmlhttp.send();
	
}
function show_sent()
{
	var sender_fname = document.getElementById("sender_fname").value;
	var sender_lname = document.getElementById("sender_lname").value;
	var reg_no = document.getElementById("sender_id").value;
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
			document.getElementById("list").innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","show_sent.php?reg_no="+reg_no,false);
	xmlhttp.send();
}
function show_draft()
{
	var sender_fname = document.getElementById("sender_fname").value;
	var sender_lname = document.getElementById("sender_lname").value;
	var reg_no = document.getElementById("sender_id").value;
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
				document.getElementById("list").innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","show_draft.php?reg_no="+reg_no,false);
	xmlhttp.send();
}

function delete_(id)
{
	 var parent = document.getElementById("list");
	 parent.removeChild(document.getElementById(id));
	 delete_from_db(id);
}
function delete_from_db(mail_id)
{
//	var sender_fname = document.getElementById("sender_fname").value;
//	var sender_lname = document.getElementById("sender_lname").value;
	var id = mail_id.split("_");
/*	alert(mail_id);
	alert(id[0]);
	alert(id[1]);
	alert(id);*/
	var reg_no = document.getElementById("sender_id").value;
//	alert(reg_no);
//	alert(id[1]);
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
				{
					alert("deleted");
					document.getElementById("comp_email").style.visibility = "hidden";
					document.getElementsByClassName("secondary-button")[0].style.visibility = "hidden";
				}
//				alert(xmlhttp.responseText);
		}
	}
	if(id[0] == "inbox")
	{
		option = 1;
	}
	else if(id[0] == "draft")
	{
		
		option = 3;
	}
	else
	{
		option = 2;
	}
	xmlhttp.open("GET","delete_from_db.php?reg_no="+reg_no+"&mail_id="+id[1]+"&option="+option,false);
	xmlhttp.send();
}
