<?php
	session_start();
	
	if(isset($_SESSION['nofilter']) && $_SESSION['nofilter']==1)
	{
		echo "<script>alert('No filter selected.');</script>";
		$_SESSION['nofilter']=0;
	}
	if(isset($_SESSION['filterbedroomnoempty']) && $_SESSION['filterbedroomnoempty']==1)
	{
		echo "<script>alert('No Advertise Found With This Filter.');</script>";
		$_SESSION['filterbedroomnoempty']=0;
	}
	if(isset($_SESSION['filterbedwashempty']) && $_SESSION['filterbedwashempty']==1)
	{
		//echo "<script>alert('No Advertise Found With This Filter.');</script>";
		$_SESSION['filterbedwashempty']=0;
	}
	

	$_SESSION['adresultid']=0;
	if(isset($_SESSION['searchresult']))
	{
		echo "<form action='FormAction.php'>";
		/////////////////////////////////////////////
		if(isset($_SESSION['currentuserid']))
		{
		echo "<div id='log'>";
		echo "<table>";
			echo "<tbody>";
				echo "<tr>";
					echo "<td width='100'> </td>";
					echo "<td style='color:white;font-size:30'> <b> myrent.com </b> </td>";
					echo "<td width='400'> </td>";
					echo "<td> <input type='submit' name='home' id='home' onmouseover='changecolor()' onmouseout='backtonormal()' value='Home' style='color:white;width:120;height:75px;border:none;background-color:rgba(0,0,0,0.2);'> 
					           <input type='submit' name='myadvertise' id='myadvertise' onmouseover='changecolormyadvertise()' onmouseout='backtonormal()' value='My Advertise' style='color:white;width:120;height:75;border:none;background-color:rgba(0,0,0,0.2);'>
					
			    <div class='dropdown'>
					<input type='submit' class='dropbtn' name='settings' id='settings' onclick='return restrict()' onmouseover='changesettings()' onmouseout='backtonormal()' value='Settings' style='color:white;width:120;height:75;border:none;background-color:rgba(0,0,0,0.2);'> 
					     <div class='dropdown-content'>
					<a href='Profile.php'>Profile</a>
					<a href='Changepass.php'>Change Password</a>
					<a href='Changemail.php'>Change Email</a>
					     </div>
				</div>	
					<input type='submit' name='logout' id='logout' onmouseover='changecolorlogout()' onmouseout='backtonormal()' value='Log Out' style='color:white;width:120;height:75;border:none;background-color:rgba(0,0,0,0.2);'> </td>";
					echo "<td width='60'> </td>";
				echo "</tr>";
			echo "</tbody>";
		echo "</table>";
		echo "</div>";
	
		}
		else
		{
			echo "<table style='background-color:rgba(0,0,0,0.7)'>";
		echo "<tbody>";
			echo "<tr>";
				echo "<td width='100'> </td>";
				echo "<td style='color:white;font-size:30'> <b> myrent.com </b> </td>";
				echo "<td width='290'> </td>";
				echo "<td style='color:white;font-size:20'> Email <input type='text' name='Email' id='mail' style='width:200px;height:27px'> Password <input type='password' name='Password' style='width:200px;height:27px'> <input type='submit' name='login' value='Log In' style='width:80;height:27px'> </td>";
				echo "<td width='110'> </td>";
			echo "</tr>";
		echo "</tbody>";
	echo "</table>";

	echo "<table style='background-color:rgba(0,0,0,0.7)'>";
		echo "<tbody>";
			echo "<tr>";
				echo "<td width='560'> </td>";
				echo "<td width='554'> </td>";
				echo "<td style='color:white'> <input type='submit' name='signup' value='Sign Up' style='width:80;height:27px'> </td>";
				echo "<td width='113'> </td>";
			echo "</tr>";
		echo "</tbody>";
	echo "</table>";
		}

		///////////////////////////////////////////
		// echo "<table width='100%' cellpadding='5' align='center' style='background-color:rgba(0,0,0,0.7)'>";
		// echo "<tr>";
			// echo "<td>";
			// echo "</td>";
		// echo "</tr>";
		// echo "<tr>";
			// echo "<td > <input type='submit' name='homefromsearch' value='Home' style='margin-left:50;color:white;background-color:rgba(0,0,0,0.2);width:80;height:50px'> ";
			// echo "</td>";
		echo "</tr>";
		// echo "<tr>";
			// echo "<td>";
			// echo "</td>";
		// echo "</tr>";
		echo "<tr>";
			echo "<td>";
			echo "</td>";
		echo "</tr>";
	echo "</table>";
	
	echo "<br/><br/>";

		echo "<table align='center'>";
			echo "<tbody>";
				echo "<tr >";
					echo "<td>Select Filter(s) For Quick Search</td>";
				echo "</tr>";
			echo "</tbody>";
		echo "</table>";
		
		echo "<table align='center'>";
			echo "<tbody>";
				echo "<tr >";					
					echo "<td> Bedroom no. <select name='filterbedroomno'>
								<option value=''></option>
								<option value='1'> 1 </option>
								<option value='2'> 2 </option>
								<option value='3'> 3 </option>
								<option value='4'> 4 </option>
								<option value='5'> 5 </option>
						</td>";
					echo "<td> Washroom no.  <select name='filterwashroomno'>
								<option value=''></option>
								<option value='1'> 1 </option>
								<option value='2'> 2 </option>
								<option value='3'> 3 </option>
								<option value='4'> 4 </option>
								<option value='5'> 5 </option>
						</td>";
					echo "</tr>";
			echo "</tbody>";
		echo "</table>";
		
		echo "<table align='center'>";
			echo "<tbody>";
				echo "<tr align='right'>"; 
					echo "<td align='right'> Maximum Price <input type='text' name='filtermaximumprice'> </td>";
				echo "</tr>";
			echo "</tbody>";
		echo "</table>";
		
		echo "<table align='center'>";
			echo "<tbody>";
				echo "<tr align='right'>"; 
					echo "<td > <input type ='checkbox' name='filterverified'> Verification </td>";
				echo "</tr>";
			echo "<tbody>";
		echo "</table>";
			
		echo "<table align='center'>";
			echo "<tbody>";
				echo "<tr>";
					echo "<td align='center'> <input type='submit' name='refresh' value='Refresh' style='width:75;height:27px'> </td>";
				echo "</tr>";
			echo "<tbody>";
		echo "</table>";
		
		
		echo "<br/> <br/> <br/>";
		for($i=0;$i<sizeof($_SESSION['searchresult']);$i++)
		{
			echo "<table width='40%' cellpadding='5' align='center' style='background-color:lightblue'>";
				echo "<tbody>";
				$adresultid=$_SESSION['searchresult'][$i]['Ad_Id'];
				$area=$_SESSION['searchresult'][$i]['Area'];
				echo "<tr>";
						echo "<td>";
						    echo "<div class='a' style='width:300px;height:200px;background-position:center;'>
							             <img src='data:image/jpeg;base64,".base64_encode($_SESSION['searchresult'][$i]['imagename'])."'>
							                 
								   </div>";
						echo "</td>";
					echo "</tr>";
					// echo "<tr>";
						// echo "<td width='20' align='center' > <input type='text' name='searchresultid' value='$adresultid'> </td>";
						// echo "<td width='20' align='center' >".$_SESSION['searchresult'][$i]['Ad_Id']."</td>";
					// echo "</tr>";
					echo "<tr>";
						echo "<td style='color:black' width='20' align='center' >".$_SESSION['searchresult'][$i]['Area']."</td>";
					echo "</tr>";
					echo	"<tr>";
						echo "<td style='color:black' width='20' align='center'>".'Rent '.$_SESSION['searchresult'][$i]['Rent'].' BDT'.', '.'Service Charge '.$_SESSION['searchresult'][$i]['Service_Charge'].' BDT'."</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td style='color:black' width='20' align='center'>".$_SESSION['searchresult'][$i]['Bed_No'].' Bedrooms, '.$_SESSION['searchresult'][$i]['Washroom_No'].' Baths'."</td>";
					echo "</tr>";
					echo	"<tr>";
						echo "<td style='color:black' width='20' align='center'>".$_SESSION['searchresult'][$i]['Square_Feet'].' SQFT'."</td>";
					echo "</tr>";
					echo	"<tr>";
						echo "<td style='color:black' width='20' align='center'>".'Car Parking: '.$_SESSION['searchresult'][$i]['Car_Parking'].', '.'Lift: '.$_SESSION['searchresult'][$i]['Lift']."</td>";
					echo "</tr>";
					echo	"<tr>";
						echo "<td style='color:black' width='20' align='center'>".'Generator: '.$_SESSION['searchresult'][$i]['Generator'].', '.'Furnished: '.$_SESSION['searchresult'][$i]['Furnished']."</td>";
					echo "</tr>";
					echo	"<tr>";
						echo "<td style='color:black' width='20' align='center'>".'Special Requirement: '.$_SESSION['searchresult'][$i]['Special_Requirement']."</td>";
					echo "</tr>";
					echo	"<tr>";
						echo "<td style='color:black' width='20' align='center'>".'Call at: '.$_SESSION['searchresult'][$i]['Contact_No']."</td>";
					echo "</tr>";
					if($_SESSION['searchresult'][$i]['Verification']=='Verified')
					{
					echo	"<tr>";
						echo "<td style='color:black' width='20' align='center'>".'<b>This Ad Is </b>'.'<b>'.$_SESSION['searchresult'][$i]['Verification'].'</b>'."</td>";
					echo "</tr>";
					}
					else
					{
						echo	"<tr>";
						echo "<td style='color:black' width='20' align='center'>".'<b>This Ad Is Not Verified</b>'."</td>";
					echo "</tr>";
					}
					
					
					
					// echo	"<tr>";
						// echo "<td width='20' align='left' ><input type='submit' name='moredetails' value='moredetails'> <input type='submit' name='call' value='Call'> <input type='submit' name='like' value='Like'> </td>";			
					// echo "</tr>";
					
					
	echo "</table>";
	echo "<br>";
		}
	}
?>
<style>
	body
	{
		background-color:#f2f2f2;
	}
	
	type="text/css">
	td,th {border:none}
	.a img
	{
		
		height:200;
		width:450;
		border:none;
	}
	#log
{
	background-color:rgba(0,0,0,0.7);
	height:80;
}
.dropdown:hover .dropdown-content {
    display: block;
}
.dropdown {
    position: relative;
    display: inline-block;
}
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}
.dropdown-content a:hover 
{
	background-color: steelblue;
}

</style>
<script>
function changecolor()
{
	document.getElementById("home").style.backgroundColor="steelblue";

}
function backtonormal()
{
		document.getElementById("home").style.backgroundColor="rgba(0,0,0,0.2)";
		document.getElementById("myadvertise").style.backgroundColor="rgba(0,0,0,0.2)";
		document.getElementById("logout").style.backgroundColor="rgba(0,0,0,0.2)";
		document.getElementById("settings").style.backgroundColor="rgba(0,0,0,0.2)";




}
function changesettings()
{
		document.getElementById("settings").style.backgroundColor="steelblue";

}
function changecolormyadvertise()
{
		document.getElementById("myadvertise").style.backgroundColor="steelblue";

}
function changecolorlogout()
{
		document.getElementById("logout").style.backgroundColor="steelblue";

}
function restrict()
{
	return false;
}

</script>

