<?php
// require_once "HomeBarLog.php";
session_start();
?>
<style>
body
{
	background-color:#f2f2f2;
}
#changepass
{
	top:50%;
	left:50%;
	height:400px;
	width:500px;
	position:absolute;
	border-radius:10px;
	transform:translate(-50%,-50%);
	background-color:#006699;
	color:white;
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
</style>

<script>
function validation()
{
	flag=true;
	if(document.getElementById("currentpass").value.length==0)
	{
		document.getElementById("un").innerHTML=" * Field Required";
		flag=false;
	}
	if(document.getElementById("password").value.length==0)
	{
		document.getElementById("pass").innerHTML=" * Field Required";
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
	if(document.getElementById("password").value!=document.getElementById("confirmpassword").value)
		{
			flag=false;
			document.getElementById("confirmpass").innerHTML=" * Password does not match";
			document.getElementById("confirmpass").style.color="red";
		}
	if(document.getElementById("confirmpassword").value.length==0)
	{
		document.getElementById("confirmpass").innerHTML=" * Field Required";
		flag=false;
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
function uncheckconfirmpass()
{
	document.getElementById("confirmpass").innerHTML="";
}
</script>

<html>
<form action="FormAction.php" method="post">
<div id='changepass'>
<table cellpadding="8" >
			<tbody>
				<tr>
					<td width="100"> </td>
					<td style='color:white;font-size:18'>Current Password: <br/><div id='passwordbox'>  <input type="password" onkeyup="uncheckun()" id="currentpass" name="Currentpass" placeholder="Current Password" style="width:200px;height:30px;margin-left:30px"></div> <span id="un"></span> </td>
				    
				</tr>

				<tr>
					<td width="100"> </td>
					<td style='color:white;font-size:18'>New Password <br/><div id='passwordbox'> <input type="password" onkeyup="uncheckpass()" id="password" name="password" placeholder="New Password" style="width:200px;height:30px;margin-left:30px;"></div> <span id="pass"></span> </td> 
				</tr>
				
				<tr>
					<td width="100"> </td>
					<td style='color:white;font-size:18'>Re-type Password <br/><div id='passwordbox'> <input type="password" onkeyup="uncheckconfirmpass()" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password" style="width:200px;height:30px;margin-left:30px"></div> <span id="confirmpass"></span> </td> 
				</tr>
				
				<tr>
		        <td width='100'> </td>
				<td align='right'> <input type='submit' name='confirm' onclick='return validation()' value='Confirm' style='background-color:steelblue;color:white;border-radius:10px;border:none;width:180;height:40px;margin-left:30'><br><span id='success'></span>
			    </tr>
				</tbody>
		</table>
</div>
</html>
<?php
require_once "HomeBarLog.php";

	if(isset($_SESSION['checkpassflag']) && $_SESSION['checkpassflag']==1)
	{

		echo "<script>document.getElementById('un').innerHTML='*wrong password';</script>";
		
	}
	if(isset($_SESSION['updatepassflag']) && $_SESSION['updatepassflag']==1)
	{

		echo "<script>document.getElementById('success').innerHTML='*Password Changed Successfully';</script>";
		
	}
	
?>