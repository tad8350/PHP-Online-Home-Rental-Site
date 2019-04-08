<html>
<style>
body
{
	background-color:#f2f2f2;
}
input
{
	border-radius:0;
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
#passwordbox
{
	width:30px;
	height:30px;
	border:1px solid white;
	background:url(../image/passwordicon.png) no-repeat ;
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

#reg
{
	top:50%;
	left:50%;
	height:600px;
	width:700px;
	position:absolute;
	border-radius:10px;
	transform:translate(-50%,-50%);
	background-color:#006699;
	color:white;
}
</style>
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
					alert("Not a valid e-mail address");
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
		document.getElementById("confirmpass").innerHTML="";

	}
	function uncheckconfirmpass()
	{
		document.getElementById("confirmpass").innerHTML="";
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
	<body>
	<form action="FormAction.php" method="post">
	
	<p align="center"> <br/> <font size="6"> <b> Create An Account </b> </font> </p>  
<div id='reg'>	
		<table cellpadding="8" >
			<tbody>
				<tr>
					<td width="100"> </td>
					
					<td style='color:white;font-size:18'><b>User Name </b><br/><div id='usernamebox'>  <input type="text" onkeyup="uncheckun()" id="username" name="username" placeholder="User Name" style="width:200px;height:30px;margin-left:30px"></div> <span id="un"></span> </td>
				    
				</tr>

				<tr>
					<td width="100"> </td>
					<td style='color:white;font-size:18'><b> Password </b><br/><div id='passwordbox'> <input type="password" onkeyup="uncheckpass()" id="password" name="password" placeholder="Password" style="width:200px;height:30px;margin-left:30px;"></div> <span id="pass"></span> </td> 
				</tr>
				
				<tr>
					<td width="100"> </td>
					<td style='color:white;font-size:18'><b> Confirm Password </b><br/><div id='passwordbox'> <input type="password" onkeyup="uncheckconfirmpass()" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password" style="width:200px;height:30px;margin-left:30px"></div> <span id="confirmpass"></span> </td> 
				</tr>
				
				<tr>
					<td width="100"> </td>
					<td style='color:white;font-size:18'><b> Email </b><br/><div id='emailbox'>  <input type="text" onkeyup="uncheckemail()" id="email" name="email" placeholder="Email" style="width:200px;height:30px;margin-left:30px"></div> <span id="em"></span> </td>
				</tr>
				
				<tr>
					<td width="100"> </td>
					<td style='color:white;font-size:18'><b> Contact No.</b> <br/><div id='contactbox'>  <input type="text" onkeyup="uncheckcn()" id="contactno" name="contactno" placeholder="Contact No." style="width:200px;height:30px;margin-left:30px"></div> <span id="cn"></span> </td>
				</tr>
				
				<tr>
					<td width="100"> </td>
					<td style='color:white;font-size:18'><b> Address</b> <br/> <div id='addressbox'> <input type="text" onkeyup="uncheckaddress()" id="address" name="address" placeholder="Address" style="width:200px;height:30px;margin-left:30px"></div> <span id="add"></span> </td>
				</tr>
				
					<td width="100"> </td>
					<td align="left"> <input type="reset" name="reset" value="Reset" style="border-radius:10px;font-size:15;background-color:steelblue;color:white;width:115;height:40"> <input type="submit" onclick="return validation()" name="submit" value="Submit" style="border-radius:10px;color:white;font-size:15;background-color:steelblue;width:115;height:40px"> </td>
			</tbody>
		</table>
		</div>
	</form>
	</body>
<html>	