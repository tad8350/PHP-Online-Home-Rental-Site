<?php
session_start();
?>
<style>
body
{
	background-color:#f2f2f2;
}
#changemail
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
#emailbox
{
	width:30px;
	height:30px;
	border:1px solid white;
	background:url(../image/emailicon.png) no-repeat ;
	background-position:center;
	background-color:lightskyblue;
}
</style>
<script>
function validation()
{
	flag=true;
	if(document.getElementById("currentmail").value.length==0)
	{
		document.getElementById("curmail").innerHTML=" * Field Required";
		flag=false;
	}
	if(document.getElementById("newmail").value.length==0)
	{
		document.getElementById("nmail").innerHTML=" * Field Required";
		flag=false;
	}
	else
	{
		if(document.getElementById("newmail").value.length!=0)
			{
				var x = document.getElementById("newmail").value;
				var atpos = x.indexOf("@");
				var dotpos = x.lastIndexOf(".");
				if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
				{
					document.getElementById("nmail").innerHTML="not a valid email address";
					flag=false;
				}
			}
	}
	
	if(document.getElementById("currentpassword").value.length==0)
	{
		document.getElementById("currentpass").innerHTML=" * Field Required";
		flag=false;
	}
	return flag;
}
function uncheckcurmail()
{
	document.getElementById("curmail").innerHTML="";
}
function unchecknewmail()
{
		document.getElementById("nmail").innerHTML="";
}
function uncheckcurpass()
{
	document.getElementById("currentpass").innerHTML="";
}
</script>
<html>
<form action="FormAction.php" method="post">
<div id='changemail'>
<table cellpadding="8" >
			<tbody>
				<tr>
					<td width="100"> </td>
					<td style='color:white;font-size:18'>Current Email: <br/><div id='emailbox'>  <input type="text" onkeyup="uncheckcurmail()" id="currentmail" name="Currentmail" placeholder="Current Email" style="width:200px;height:30px;margin-left:30px"></div> <span id="curmail"></span> </td>
				    
				</tr>

				<tr>
					<td width="100"> </td>
					<td style='color:white;font-size:18'>New Email <br/><div id='emailbox'> <input type="text" onkeyup="unchecknewmail()" id="newmail" name="newmail" placeholder="New Email" style="width:200px;height:30px;margin-left:30px;"></div> <span id="nmail"></span> </td> 
				</tr>
				
				<tr>
					<td width="100"> </td>
					<td style='color:white;font-size:18'>Current Password <br/><div id='passwordbox'> <input type="password" onkeyup="uncheckcurpass()" id="currentpassword" name="currentpassword" placeholder="Current Password" style="width:200px;height:30px;margin-left:30px"></div> <span id="currentpass"></span> </td> 
				</tr>
				
				<tr>
		        <td width='100'> </td>
				<td align='right'> <input type='submit' name='confirmmail' onclick='return validation()' value='Confirm' style='background-color:steelblue;color:white;border-radius:10px;border:none;width:180;height:40px;margin-left:30'><br><span id='success'></span>
			    </tr>
				</tbody>
		</table>
</div>
</html>
<?php
require_once "HomeBarLog.php";

	if(isset($_SESSION['checkpassflag']) && $_SESSION['checkpassflag']==1)
	{

		echo "<script>document.getElementById('currentpass').innerHTML='*wrong password';</script>";
		$_SESSION['checkpassflag']=0;
		
	}
	if(isset($_SESSION['updatemailflag']) && $_SESSION['updatemailflag']==1)
	{

		echo "<script>document.getElementById('success').innerHTML='*Email Changed Successfully';</script>";
		$_SESSION['updatemailflag']=0;
		
	}
	if(isset($_SESSION['checkmailflag']) && $_SESSION['checkmailflag']==1)
	{

		echo "<script>document.getElementById('curmail').innerHTML='*Wrong Email';</script>";
		$_SESSION['checkmailflag']=0;
		
	}
	
?>