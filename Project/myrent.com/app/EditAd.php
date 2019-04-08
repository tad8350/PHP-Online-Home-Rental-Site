<?php
	require_once "../service/DBQueries.php";
	// require_once "HomeBarLog.php";

	$ad=showadinfo($_SESSION['advrnumb']);
	
	$_SESSION['ad_id']=$ad['Ad_Id'];
	$_SESSION['area']= $ad['Area'];
	$_SESSION['location']= $ad['Location'];
	$_SESSION['squarefeet']= $ad['Square_Feet'];
	$_SESSION['bedno']= $ad['Bed_No'];
	$_SESSION['washroomno']= $ad['Washroom_No'];
	$_SESSION['rent']= $ad['Rent'];
	$_SESSION['servicecharge']= $ad['Service_Charge'];
	$_SESSION['carparking']= $ad['Car_Parking'];
	$_SESSION['lift']= $ad['Lift'];
	$_SESSION['generator']= $ad['Generator'];
	$_SESSION['furnished']= $ad['Furnished'];
	$_SESSION['specialrequirement']= $ad['Special_Requirement'];
	// die();
			
	$ad_id=$_SESSION['ad_id'];	
			
			
	$area= $_SESSION['area'];
	$location=$_SESSION['location'];
	$squarefeet=$_SESSION['squarefeet'];
	$bedno= $_SESSION['bedno'];
	$washroomno= $_SESSION['washroomno'];
	$rent= $_SESSION['rent'];
	$servicecharge= $_SESSION['servicecharge'];
	$carparking=$_SESSION['carparking'];
	$lift=$_SESSION['lift'];
	$generator=$_SESSION['generator'];
	$furnished=$_SESSION['furnished'];
	$specialrequirement= $_SESSION['specialrequirement'];
	
	echo "<form action='FormAction.php' method='post'>";
	
	// echo "<table style='background-color:lightblue'>";
	// echo "<tbody>";
			// echo "<tr>";
				// echo "<td width='100'> </td>";
				// echo "<td style='color:black'> <b> myrent.com </b> </td>";
				// echo "<td width='715'> </td>";
				// echo "<td> <input type='submit' name='home' value='Home' style='width:80;height:27px'> <input type='submit' name='profile' value='Profile' style='width:80;height:27px'> <input type='submit' name='myadvertise' value='My Advertise' style='width:90;height:27px'> <input type='submit' name='logout' value='Log Out' style='width:80;height:27px'> </td><td width='60'> </td>";
			// echo "</tr>";
		// echo "</tbody>";
	// echo "</table>";
	
	echo "<form action='FormAction.php' method='post'>";
	echo "<br/> <br/>";
	echo	"<table width='100%' cellpadding='3'>";
	echo		"<tbody>";
	
	// echo				"<td width='100'> </td>";
	// echo				"<td> AD ID </td>";
	// echo				"<td> <input type='text' name='ad_id' value='$ad_id' style='width:100;height:27px'> </td>";
	// echo				"<td width='500'> </td>";
	// echo			"</tr>";
	
	echo				"<td width='100'> </td>";
	echo				"<td> Area </td>";
	echo				"<td> <input type='text' name='area' value='$area' style='width:100;height:27px'> </td>";
	echo				"<td width='500'> </td>";
	echo			"</tr>";
				
				
	echo			"<tr>";
	echo				"<td width='30'> </td>";
	echo				"<td > Location </td>";
	echo				"<td> <input type='text' name='location' value='$location' onkeyup='unchecklocation()' id='location' placeholder='Location' style='width:350;height:27px'> <span id='loc'></span> </td>";
	echo				"<td width='500'> </td>";
	echo			"</tr>";			
	
	echo			"<tr>";
	echo				"<td width='30'> </td>";
	echo				"<td> Sqaure Feet </td>";
	echo				"<td> <input type='text' name='squarefeet' value='$squarefeet' onkeyup='unchecksquarefeet()' id='squarefeet' placeholder='Square Feet' style='width:100;height:27px'> <span id='sfeet'></span> </td>";
	echo				"<td width='500'> </td>";
	echo			"</tr>";

	echo			"<tr>";
	echo				"<td width='30'> </td>";
	echo				"<td> Bed No. </td>";
	echo				"<td> <input type='text' name='bedno' value='$bedno' onkeyup='uncheckbedno()' id='bedno' placeholder='Bed No.' style='width:100;height:27px'> <span id='bed'></span> </td>";
	echo				"<td width='500'> </td>";
	echo			"</tr>";
	
	echo			"<tr>";
	echo				"<td width='30'> </td>";
	echo				"<td> Washroom No. </td>";
	echo				"<td> <input type='text' name='washroomno' value='$washroomno' onkeyup='uncheckwashroomno()' id='washroomno' placeholder='Wash Room No.' style='width:100;height:27px'> <span id='wash'></span> </td>";
	echo				"<td width='500'> </td>";
	echo			"</tr>";

	echo			"<tr>";
	echo				"<td width='30'> </td>";
	echo				"<td> Rent </td>";
	echo				"<td> <input type='text' name='rent' value='$rent' onkeyup='uncheckrent()' id='rent' placeholder='Rent' style='width:100;height:27px'> <span id='ren'></span> </td>";
	echo				"<td width='500'> </td>";
	echo			"</tr>";

	echo			"<tr>";
	echo				"<td width='30'> </td>";
	echo				"<td> Service Charge </td>";
	echo				"<td> <input type='text' name='servicecharge' value='$servicecharge' onkeyup='uncheckservicecharge()' id='servicecharge' placeholder='Service Charge' style='width:100;height:27px'> <span id='service'></span> </td>";
	echo				"<td width='500'> </td>";
	echo			"</tr>";
	
	echo			"<tr>";
	echo				"<td width='30'> </td>";
	echo				"<td> Car Parking </td>";
	echo				"<td> <input type='text' name='carparking' onkeyup='uncheckcarparking()' id='carparking' placeholder='Car Parking?' value='$carparking' style='width:100;height:27px'> <span id='car'></span> </td>";
	echo				"<td width='500'> </td>";
	echo			"</tr>";
	
	echo			"<tr>";
	echo				"<td width='30'> </td>";
	echo				"<td> Lift </td>";
	echo				"<td> <input type='text' name='lift' onkeyup='unchecklift()' id='lift' placeholder='Lift?' value='$lift' style='width:100;height:27px'> <span id='lif'></span> </td>";
	echo				"<td width='500'> </td>";
	echo			"</tr>";
	
	echo			"<tr>";
	echo				"<td width='30'> </td>";
	echo				"<td> Generator </td>";
	echo				"<td> <input type='text' name='generator' value='$generator' onkeyup='uncheckgenerator()' placeholder='Generator?' id='generator' style='width:100;height:27px'> <span id='gen'></span> </td>";
	echo				"<td width='500'> </td>";
	echo			"</tr>";
	
	echo			"<tr>";
	echo				"<td width='30'> </td>";
	echo				"<td> Furnished </td>";
	echo				"<td> <input type='text' name='furnished' value='$furnished' onkeyup='uncheckfurnished()' placeholder='Furnished?' id='furnished' style='width:100;height:27px'> <span id='fur'></span> </td>";
	echo				"<td width='500'> </td>";
	echo			"</tr>";

	echo			"<tr>";
	echo				"<td width='100'> </td>";
	echo				"<td > Special Requirement(s) </td>";
	echo			"<td> <input type='text' name='specialrequirement' value='$specialrequirement' style='width:550;height:27px'> </textarea> </td>";
	echo				"<td width='500'> </td>";
	echo			"</tr>";
	
	echo			"<tr>";
	echo				"<td width='100'> </td>";		
	echo			"</tr>";
	
	echo			"<tr>";
	echo				"<td width='100'> </td>";		
	echo			"</tr>";
	
	echo			"<tr>";
	echo				"<td width='100'> </td>";		
	echo			"</tr>";
			
	echo			"<tr>";
	echo				"<td width='30'> </td>";
	echo				"<td> </td>";
	echo				"<td align='right'> <input type='submit' onclick='return validation()' name='edit' value='Edit' style='width:75;height:27px'> </td>";
	echo				"<td width='500'> </td>";
	echo			"</tr>";
	echo 				"<td width='100'> </td>";
	echo 				"<td width='100'> </td>";
	echo 				"<td align='right'> <span id='adupdate'></span> </td>";
	echo		"</tbody>";
	echo	"</table>";
	echo "</form>";
	
		if(isset($_SESSION['adflag']) && $_SESSION['adflag']==1)
		{
			echo "<script>document.getElementById('adupdate').innerHTML=' * Advertise Updated';</script>";
			echo "<script>document.getElementById('adupdate').style.color='red';</script>";
			$_SESSION['adflag']=0;
		}
?>

<html>
<script>
function validation()
	{
		flag=true;
		if(document.getElementById("location").value.length==0)
		{
			document.getElementById("loc").innerHTML=" * Field Required";
			document.getElementById("loc").style.color="red";
			flag=false;
		}
		else
		{
			if(document.getElementById("location").value.length<4)
			{
				document.getElementById("loc").innerHTML=" * Not a valid Location";
				document.getElementById("loc").style.color="red";
				flag=false;
			}
		}
		
		if(document.getElementById("squarefeet").value.length==0)
		{
			document.getElementById("sfeet").innerHTML=" * Field Required";
			document.getElementById("sfeet").style.color="red";
			flag=false;
		}
		else
		{
			if(document.getElementById("squarefeet").value.length>5)
			{
				document.getElementById("sfeet").innerHTML=" * Not valid squarefeet";
				document.getElementById("sfeet").style.color="red";
				flag=false;
			}
			if(document.getElementById("squarefeet").value.length<3)
			{
				document.getElementById("sfeet").innerHTML=" * Not valid squarefeet";
				document.getElementById("sfeet").style.color="red";
				flag=false;
			}
		}
		
		if(document.getElementById("bedno").value.length==0)
		{
			document.getElementById("bed").innerHTML=" * Field Required";
			document.getElementById("bed").style.color="red";
			flag=false;
		}
		else
		{
			if(document.getElementById("bedno").value<1)
			{
				document.getElementById("bed").innerHTML=" * Not valid bedroom no.";
				document.getElementById("bed").style.color="red";
				flag=false;
			}
			if(document.getElementById("bedno").value>15)
			{
				document.getElementById("bed").innerHTML=" * Not valid bedroom no.";
				document.getElementById("bed").style.color="red";
				flag=false;
			}
		}
		
		if(document.getElementById("washroomno").value.length==0)
		{
			document.getElementById("wash").innerHTML=" * Field Required";
			document.getElementById("wash").style.color="red";
			flag=false;
		}
		else
		{
			if(document.getElementById("washroomno").value<1)
			{
				document.getElementById("wash").innerHTML=" * Not valid washroom no.";
				document.getElementById("wash").style.color="red";
				flag=false;
			}
			if(document.getElementById("bedno").value>10)
			{
				document.getElementById("bed").innerHTML=" * Not valid washroom no.";
				document.getElementById("bed").style.color="red";
				flag=false;
			}
		}
		
		if(document.getElementById("rent").value.length==0)
		{
			document.getElementById("ren").innerHTML=" * Field Required";
			document.getElementById("ren").style.color="red";
			flag=false;
		}
		else
		{
			if(document.getElementById("rent").value<3000)
			{
				document.getElementById("ren").innerHTML=" * Not valid rent";
				document.getElementById("ren").style.color="red";
				flag=false;
			}
			if(document.getElementById("rent").value>100000)
			{
				document.getElementById("ren").innerHTML=" * Not valid washroom rent";
				document.getElementById("ren").style.color="red";
				flag=false;
			}
		}
		
		if(document.getElementById("servicecharge").value.length==0)
		{
			document.getElementById("service").innerHTML=" * Field Required";
			document.getElementById("service").style.color="red";
			flag=false;
		}
		else
		{
			if(document.getElementById("servicecharge").value<300)
			{
				document.getElementById("service").innerHTML=" * Not valid service charge";
				document.getElementById("service").style.color="red";
				flag=false;
			}
			if(document.getElementById("servicecharge").value>10000)
			{
				document.getElementById("service").innerHTML=" * Not valid service charge";
				document.getElementById("service").style.color="red";
				flag=false;
			}
		}
		
		if(document.getElementById("carparking").value.length==0)
		{
			document.getElementById("car").innerHTML=" * Field Required";
			document.getElementById("car").style.color="red";
			flag=false;
		}
		else
		{
			if(document.getElementById("carparking").value=="Yes" || document.getElementById("carparking").value=="No" || document.getElementById("carparking").value=="yes" || document.getElementById("carparking").value=="no")
			{
				flag=true;
			}
			else
			{
				document.getElementById("car").innerHTML=" * Field can contain only Yes/No";
				document.getElementById("car").style.color="red";
				flag=false;
			}
		}
		
		if(document.getElementById("lift").value.length==0)
		{
			document.getElementById("lif").innerHTML=" * Field Required";
			document.getElementById("lif").style.color="red";
			flag=false;
		}
		else
		{
			if(document.getElementById("lift").value=="Yes" || document.getElementById("lift").value=="No" || document.getElementById("lift").value=="yes" || document.getElementById("lift").value=="no")
			{
				flag=true;
			}
			else
			{
				document.getElementById("lif").innerHTML=" * Field can contain only Yes/No";
				document.getElementById("lif").style.color="red";
				flag=false;
			}
		}
		
		if(document.getElementById("generator").value.length==0)
		{
			document.getElementById("gen").innerHTML=" * Field Required";
			document.getElementById("gen").style.color="red";
			flag=false;
		}
		else
		{
			if(document.getElementById("generator").value=="Yes" || document.getElementById("generator").value=="No" || document.getElementById("generator").value=="yes" || document.getElementById("generator").value=="no")
			{
				flag=true;
			}
			else
			{
				document.getElementById("gen").innerHTML=" * Field can contain only Yes/No";
				document.getElementById("gen").style.color="red";
				flag=false;
			}
		}
		
		if(document.getElementById("furnished").value.length==0)
		{
			document.getElementById("fur").innerHTML=" * Field Required";
			document.getElementById("fur").style.color="red";
			flag=false;
		}
		else
		{
			if(document.getElementById("furnished").value=="Yes" || document.getElementById("furnished").value=="No" || document.getElementById("furnished").value=="yes" || document.getElementById("furnished").value=="no")
			{
				flag=true;
			}
			else
			{
				document.getElementById("fur").innerHTML=" * Field can contain only Yes/No";
				document.getElementById("fur").style.color="red";
				flag=false;
			}
		}
		
		return flag;
	}
	function unchecklocation()
	{
		document.getElementById("loc").innerHTML="";
	}
	function unchecksquarefeet()
	{
		document.getElementById("sfeet").innerHTML="";
	}
	function uncheckbedno()
	{
		document.getElementById("bed").innerHTML="";
	}
	function uncheckwashroomno()
	{
		document.getElementById("wash").innerHTML="";
	}
	function uncheckrent()
	{
		document.getElementById("ren").innerHTML="";
	}
	function uncheckservicecharge()
	{
		document.getElementById("service").innerHTML="";
	}
</script>
</html>

<style>
body
{
	background-color:#f2f2f2;
}
</style>