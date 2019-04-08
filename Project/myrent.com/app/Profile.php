<?php 

	 require_once "../service/DBQueries.php";
	
if(isset($_SESSION['currentuserid']))
{
	require_once "HomeBarLog.php";
	$profile=showuserinfo($_SESSION['currentuserid']);

	$username= $profile['User_Name'];
	$email= $profile['Email'];
	$contactno= $profile['Contact_No'];
	$address= $profile['Address'];
	
	echo "<div id='pro'>";
	echo "<form action='FormAction.php' method='post'>";
		// echo "<p align='center'> <br/> <font size='6'> <b> Profile </b> </font> </p>";    
			echo "<table cellpadding='8' style='margin-top:30'>";
				echo "<tbody>";
				echo	"<tr>";
				echo		"<td width='100'> </td>";
				echo		"<td style='color:white;font-size:18'> User Name <br/><div id='usernamebox'> <input type='text' name='username' id='username' onkeyup='uncheckun()' value='$username' style='width:200px;height:27px;margin-left:30px'></div> <span id='un'></span> </td>";
				echo	"</tr>";
					
				// echo	"<tr>";
				// echo		"<td width='100'> </td>";
				// echo		"<td> Password <br/> <input type='password' name='password' id='password' onkeyup='uncheckpass()' value='$password' style='width:200px;height:27px'> <span id='pass'></span> </td>";
				// echo	"</tr>";
				
				// echo	"<tr>";
				// echo		"<td width='100'> </td>";
				// echo		"<td>Confirm Password <br/> <input type='password' name='confirmpassword' id='confirmpassword' onkeyup='uncheckconfirmpass()' value='$password' style='width:200px;height:27px'> <span id='confirmpass'></span> </td>";
				// echo	"</tr>";
					
				echo	"<tr>";
				echo		"<td width='100'> </td>";
				echo		"<td style='color:white;font-size:18'> Email <br/><div id='emailbox'> <input type='text' name='email' id='email' onkeyup='uncheckemail()' value='$email' style='width:200px;height:27px;margin-left:30px' readonly></div> <span id='em'></span> </td>";
				echo	"</tr>";
					
				echo	"<tr>";
				echo		"<td width='100'> </td>";
				echo		"<td style='color:white;font-size:18'> Contact No. <br/><div id='contactbox'> <input type='text' onkeyup='uncheckcn()' name='contactno' id='contactno' value='$contactno' style='width:200px;height:27px;margin-left:30px'></div> <span id='cn'></span> </td>";
				echo	"</tr>";
					
				echo	"<tr>";
				echo		"<td width='100'> </td>";
				echo		"<td style='color:white;font-size:18'> Address <br/><div id='addressbox'> <input type='text' onkeyup='uncheckaddress()' name='address' id='address' value='$address' style='width:200px;height:27px;margin-left:30px'></div> <span id='add'></span> </td>";
				echo	"</tr>";
				
				echo	"<tr>";
				echo		"<td width='100'> </td>";
				echo		"<td align='right'> <input type='submit' name='updateprofile' onclick='return validation()' value='Update Profile' style='background-color:steelblue;color:white;border-radius:10px;width:180;height:40px;margin-left:30'>";
				echo	"</tr>";
				echo 	"<td width='100'> </td>";
				echo 	"<td align='right'> <span id='profileupdate'></span> </td>";
					
				echo	"</tbody>";
			echo	"</table>";
			echo "/<div>";
	echo "</form>";
}
else
{
	header('location:HomePage.php');
}

		if(isset($_SESSION['profileflag']) && $_SESSION['profileflag']==1)
		{
			echo "<script>document.getElementById('profileupdate').innerHTML=' * Profile Updated';</script>";
			echo "<script>document.getElementById('profileupdate').style.color='red';</script>";
			$_SESSION['profileflag']=0;
		}

?>

<script>

function validation()
	 {
		flag=true;
		if(document.getElementById("username").value.length==0)
		{
			document.getElementById("un").innerHTML=" * Field Required";
			document.getElementById("un").style.color="red";
			flag=false;
		}
		else
		{
			var x = document.getElementById("email").value;
			if(isNaN(x))
			{ 
				flag=true;
			} 
			else
			{
				document.getElementById("un").innerHTML=" * Name can not contain number";
				document.getElementById("un").style.color="red";
				flag=false;
			}
			if(document.getElementById("username").value.length<3)
			{
				document.getElementById("un").innerHTML=" * Name should be minimum 3 characters";
				document.getElementById("un").style.color="red";
				flag=false;
			}
		}
		if(document.getElementById("password").value.length==0)
		{
			document.getElementById("pass").innerHTML=" * Field Required";
			document.getElementById("pass").style.color="red";
			flag=false;
		}
		else
		{
			if(document.getElementById("password").value.length<8)
			{
				document.getElementById("pass").innerHTML=" * password should be minimum 8 characters";
				document.getElementById("pass").style.color="red";
				flag=false;
			}
		}
		if(document.getElementById("confirmpassword").value.length==0)
		{
			document.getElementById("confirmpass").innerHTML=" * Field Required";
			document.getElementById("confirmpass").style.color="red";
			flag=false;
		}
		
		if(document.getElementById("password").value!=document.getElementById("confirmpassword").value)
		{
			flag=false;
			document.getElementById("confirmpass").innerHTML=" * Confirm Password does not match with Password";
			document.getElementById("confirmpass").style.color="red";
		}
		if(document.getElementById("email").value.length==0)
		{
			document.getElementById("em").innerHTML=" * Field Required";
			document.getElementById("em").style.color="red";
			flag=false;
		}
		else
		{
			if(document.getElementById("email").value.length!=0)
			{
				var x = document.getElementById("email").value;
				var atpos = x.indexOf("@");
				var dotpos = x.lastIndexOf(".");
				if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
				{
					document.getElementById("em").innerHTML=" * Not a valid e-mail address";
					document.getElementById("em").style.color="red";
					flag=false;
				}
			}
		}
		if(document.getElementById("contactno").value.length==0)
		{
			document.getElementById("cn").innerHTML=" * Field Required";
			document.getElementById("cn").style.color="red";
			flag=false;
		}
		else
		{
			if(document.getElementById("contactno").value.length<11)
			{
				document.getElementById("cn").innerHTML=" * Not a valid contact number";
				document.getElementById("cn").style.color="red";
				flag=false;
			}
		}
		if(document.getElementById("address").value.length==0)
		{
			document.getElementById("add").innerHTML=" * Field Required";
			document.getElementById("add").style.color="red";
			flag=false;
		}
		else
		{
			if(document.getElementById("address").value.length<4)
			{
				document.getElementById("add").innerHTML=" * Not a valid address";
				document.getElementById("add").style.color="red";
				flag=false;
			}
		}
		 return flag;
	}
	
	function uncheckun()
	{
		document.getElementById("un").innerHTML="";
	}
	function uncheckpass()
	{
		document.getElementById("pass").innerHTML="";
	}
	function uncheckemail()
	{
		document.getElementById("em").innerHTML="";
	}
	function uncheckcn()
	{
		document.getElementById("cn").innerHTML="";
	}
	function uncheckaddress()
	{
		document.getElementById("add").innerHTML="";
	}
</script>
<style>
body
{
	background-color:#f2f2f2;
}
input
{
	padding-left:20;
}
#usernamebox
{
	width:30px;
	height:30px;
	border:1px solid white;
	background:url(../image/usernameicon.png) no-repeat ;
	background-position:center;
	background-color:lightskyblue;
}
#emailbox
{
	width:30px;
	height:30px;
	border:1px solid white;
	background:url(../image/emailicon.png) no-repeat ;
	background-position:center;
	background-color:lightskyblue;
}
#contactbox
{
	width:30px;
	height:30px;
	border:1px solid white;
	background:url(../image/contactnoicon.png) no-repeat ;
	background-position:center;
	background-color:lightskyblue;
}
#addressbox
{
	width:30px;
	height:30px;
	border:1px solid white;
	background:url(../image/addressicon.png) no-repeat ;
	background-position:center;
	background-color:lightskyblue;
}
#pro
{
	top:50%;
	left:50%;
	height:400px;
	width:500px;
	position:absolute;
	border-radius:10px;
	transform:translate(-50%,-50%);
	background-color:rgba(0,102,153,1);
	color:white;
}


</style>

