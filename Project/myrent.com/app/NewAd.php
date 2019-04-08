<?php

	require_once "FormAction.php";
	require_once "HomeBarLog.php";
	echo "<form action='FormAction.php' method='post' enctype='multipart/form-data'>";

	// echo "<table style='background-color:lightblue'>";
	// echo "<tbody>";
			// echo "<tr>";
				// echo "<td width='100'> </td>";
				// echo "<td style='color:black'> <b> myrent.com </b> </td>";
				// echo "<td width='735'> </td>";
				// echo "<td> <input type='submit' name='home' value='Home' style='width:80;height:27px'> <input type='submit' name='profile' value='Profile' style='width:80;height:27px'> <input type='submit' name='myadvertise' value='My Advertise' style='width:90;height:27px'> <input type='submit' name='logout' value='Log Out' style='width:80;height:27px'> </td><td width='60'> </td>";
			// echo "</tr>";
		// echo "</tbody>";
	// echo "</table>";
	
	echo "<form action='FormAction.php' method='post'>";
	echo "<br/> <br/>";
	echo	"<table width='100%' cellpadding='3'>";
	echo		"<tbody>";
	echo			"<tr>";
	echo				"<td width='60'> </td>";
	echo				"<td width=150> Area </td>";
	echo				"<td> <select name='area'>";
	echo							"<option> Basundhara </option>";
	echo                     		"<option> Banani </option>";
	echo							"<option> Gulshan </option>";
	echo							"<option> Dhanmondi </option>";
	echo							"<option> Farmgate </option>";
	echo							"<option> Mirpur </option>";
	echo							"<option> Nikunjo </option>";
	echo							"<option> Niketon </option>";
	echo				"/td>";
	echo				"<td width='500'> </td>";
	echo			"</tr>";
				
	echo			"<tr>";
	echo				"<td width='30'> </td>";
	echo				"<td > Location </td>";
	echo				"<td> <input type='text' name='location' onkeyup='unchecklocation()' id='location' placeholder='Location' style='width:415;height:27px'> <span id='loc'></span> </td>";
	echo				"<td width='500'> </td>";
	echo			"</tr>";
				
	echo			"<tr>";
	echo				"<td width='30'> </td>";
	echo				"<td> Sqaure Feet </td>";
	echo				"<td> <input type='text' name='squarefeet' onkeyup='unchecksquarefeet()' id='squarefeet' placeholder='Square Feet' style='width:100;height:27px'> <span id='sfeet'></span> </td>";
	echo				"<td width='500'> </td>";
	echo			"</tr>";
				
	// echo			"<tr>";
	// echo				"<td width='30'> </td>";
	// echo				"<td> Floor No. </td>";
	// echo				"<td> <input type='text' name='floorno' placeholder='Floor No.' style='width:100;height:27px'> </td>";
	// echo				"<td width='500'> </td>";
	// echo			"</tr>";
				
	echo			"<tr>";
	echo				"<td width='30'> </td>";
	echo				"<td> Bed No. </td>";
	echo				"<td> <input type='text' name='bedno' onkeyup='uncheckbedno()' id='bedno' placeholder='Bed No.' style='width:100;height:27px'> <span id='bed'></span> </td>";
	echo				"<td width='500'> </td>";
	echo			"</tr>";
				
	echo			"<tr>";
	echo				"<td width='30'> </td>";
	echo				"<td> Washroom No. </td>";
	echo				"<td> <input type='text' name='washroomno' onkeyup='uncheckwashroomno()' id='washroomno' placeholder='Wash Room No.' style='width:100;height:27px'> <span id='wash'></span> </td>";
	echo				"<td width='500'> </td>";
	echo			"</tr>";
				
	// echo			"<tr>";
	// echo				"<td width='30'> </td>";
	// echo				"<td> Veranda </td>";
	// echo				"<td> <input type='text' name='veranda' placeholder='Veranda No.' style='width:100;height:27px'> </td>";
	// echo				"<td width='500'> </td>";
	// echo			"</tr>";
				
	echo			"<tr>";
	echo				"<td width='30'> </td>";
	echo				"<td> Rent </td>";
	echo				"<td> <input type='text' name='rent' onkeyup='uncheckrent()' id='rent' placeholder='Rent' style='width:100;height:27px'> <span id='ren'></span> </td>";
	echo				"<td width='500'> </td>";
	echo			"</tr>";
				
	echo			"<tr>";
	echo				"<td width='30'> </td>";
	echo				"<td> Service Charge </td>";
	echo				"<td> <input type='text' name='servicecharge' onkeyup='uncheckservicecharge()' id='servicecharge' placeholder='Service Charge' style='width:100;height:27px'> <span id='service'></span> </td>";
	echo				"<td width='500'> </td>";
	echo			"</tr>";
				
	echo			"<tr>";
	echo				"<td width='30'> </td>";
	echo				"<td > <input type ='checkbox' name='carparking' value='carparking'> Car Parking </td>";
	echo				"<td> <input type ='checkbox' name='lift' value='lift'> Lift <input type ='checkbox' name='generator' value='generator'> Generator <input type ='checkbox' name='furnished' value='furnished'> Furnished </td>";
	echo				"<td width='500'> </td>";
	echo			"</tr>";				
			
	echo			"<tr>";
	echo				"<td width='30'> </td>";
	echo				"<td> Special Requirement(s) </td>";
	echo			"<td> <textarea name='specialrequirement' onkeyup='uncheckspecialrequirement()' id='specialrequirement' rows='4' cols='85'> </textarea> <span id='requirement'></span> </td>";
	echo				"<td width='500'> </td>";
	echo			"</tr>";
	
	echo			"<tr>";
	echo				"<td width='30'> </td>";		
	echo			"</tr>";
	
	echo			"<tr>";
	echo				"<td width='30'> </td>";		
	echo			"</tr>";
	
	echo			"<tr>";
	echo				"<td width='30'> </td>";		
	echo			"</tr>";
	
    echo			"<tr>";
	echo				"<td width='30'> </td>";
	echo				"<td> Image</td>";
	echo				"<td align='left'> <input type='file' name='image' id='image' </td>";
	echo				"<td width='500'> </td>";
	echo			"</tr>";	
			
			
	echo			"<tr>";
	echo				"<td width='30'> </td>";
	echo				"<td> </td>";
	echo				"<td align='right'> <input type='submit' name='add' id='add' onclick='return validation()' value='Add' style='width:75;height:27px'> </td>";
	echo				"<td width='500'> </td>";
	echo			"</tr>";
	
	
	
	echo		"</tbody>";
	echo	"</table>";
	echo "</form>";

?>
<html>
<head>  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
 
          
      </head>
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
$(document).ready(function(){
	$('#add').click(function()
	{
		var image_name=$('#image').val();
		if(image_name=='')
		{
			
		}
		else
		{
			var extension=$('#image').val().split('.').pop().toLowerCase();
			if(jQuery.inArray(extension,['gif','png','jpg','jpeg'])==-1)
			{
				alert('Invalid Image File');
				$('#image').val('');
				return false;
			}
		}
	});
});
</script>
</html>


<style>
body
{
	background-color:#f2f2f2;
}
</style>