<?php 


	require_once "../service/DBQueries.php";
// include_once 	"HomeBarLog.php";
	// session_start();

	$bool=false;
	$advbool=false;
		$advrbool=false;

	if(isset($_SESSION['adnum']))
	{
		$bool=false;
		if(isset($_SESSION['adid'])){
        for($i=0;$i<sizeof($_SESSION['adid']);$i++)
		{
			
				if($_SESSION['adid'][$i]['Ad_Id']==$_SESSION['adnum'])
				{
					$bool=true;
					$_SESSION['adnumber']=$_SESSION['adnum'];
					$_SESSION['adnum']='';
					header('location:EditAd.php');
				}
		}
		}
	}
	if(isset($_SESSION['advno']))
	{
		
		$advbool=false;
		if(isset($_SESSION['advid'])){
			
			
        for($i=0;$i<sizeof($_SESSION['advid']);$i++)
		{
			
				if($_SESSION['advid'][$i]['Ad_Id']==$_SESSION['advno'])
				{
					
					$advbool=true;
					$_SESSION['advnumber']=$_SESSION['advno'];
					$_SESSION['advno']='';
					deleteuserad();
				}
		}
		}
	}
	if(isset($_SESSION['advrnum']))
	{
		$advrbool=false;
		if(isset($_SESSION['advrid'])){
        for($i=0;$i<sizeof($_SESSION['advrid']);$i++)
		{
			
				if($_SESSION['advrid'][$i]['Ad_Id']==$_SESSION['advrnum'])
				{
					$advrbool=true;
					$_SESSION['advrnumb']=$_SESSION['advrnum'];
					$_SESSION['advrnum']='';
					header('location:EditAd.php');
				}
		}
		}
	}
	
	echo "<script>function removeerr(){document.getElementById('an').innerHTML='';}</script>";
	
	echo "<form action='FormAction.php' method='post'>";
	
//////////////////////////////////////////////////////////////////////////////
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
	////////////////////////////////////////////////////////////////////////////
	echo "<div id='log'>";
		echo "<table>";
			echo "<tbody>";
				echo "<tr>";
					echo "<td width='100'> </td>";
					echo "<td style='color:white;font-size:30'> <b> myrent.com </b> </td>";
					echo "<td width='500'> </td>";
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
		///////////////////////////////////////////////////////////
	echo "<br/> <br/>";
	
	echo "<table width='100%' cellpadding='5'>";
		echo	"<tbody>";
			echo	"<tr>";
					echo"<td align='right'> <input type='submit' name='newad' value='New Ad' style='width:100;height:27px'> </td>";
			echo	"</tr>";
	echo "</table>";
	
	echo "<table width='100%' cellpadding='5'>";	
			echo "<tr>";
				echo "<td align='right'> <input type='text' onkeyup='removeerr()' name='adno' placeholder='     Ad No.' style='width:100;height:27px'> <input type='submit' name='editad' value='Edit Ad' style='width:100;height:27px'> <input type='submit' name='deletead' value='Delete Ad' style='width:100;height:27px'> </td>";
			echo "</tr>";
				echo "<td align='right'> <span id='an'></span> </td>";
			echo "<tr>";
				echo "<td align='right'> <span id='addeleteuser'></span> </td>";
			echo "</tr>";
			echo "<tr>";
				 echo "<td align='right'> <span id='newaduser'></span> </td>";
				echo "</tr>";
			echo "<tr>";
			echo "</tr>";
		echo	"</tbody>";
	echo "</table>";
	echo "</form>";
	
	echo "<br/> <br/>";
	
	echo "<table width='100%' cellpadding='5' border='1' style='background-color:lightblue'>";
		echo 	"<tbody>";
		echo 		"<tr>
						<th>Add ID</th>
						<th>Area</th> 
						<th>Location</th> 
						<th>Square Feet</th>
						
						<th>Room No.</th> 
						<th>Washroom No.</th>
						
						<th>Rent</th>
						<th>Service Charge</th> 
						<th>Car Parking</th>
						<th>Lift</th>
						<th>Generator</th>
						<th>Furnished</th>
						
						<th>Special Requirement(s)</th>
						<th>Verification</th>
						
					</tr>";
	if(isset($_SESSION['advertise']))
	{
		for($i=0;$i<sizeof($_SESSION['advertise']);$i++)
		{	
			echo		"<tr>";
				echo			"<td width='20' align='center'>".$_SESSION['advertise'][$i]['Ad_Id']."</td>";
				echo			"<td width='20' align='center'>".$_SESSION['advertise'][$i]['Area']."</td>";
				echo			"<td width='20' align='center'>".$_SESSION['advertise'][$i]['Location']."</td>";
				echo			"<td width='20' align='center'>".$_SESSION['advertise'][$i]['Square_Feet']."</td>";
				echo			"<td width='20' align='center'>".$_SESSION['advertise'][$i]['Bed_No']."</td>";
				echo			"<td width='20' align='center'>".$_SESSION['advertise'][$i]['Washroom_No']."</td>";
				echo			"<td width='20' align='center'>".$_SESSION['advertise'][$i]['Rent']."</td>";
				echo			"<td width='20' align='center'>".$_SESSION['advertise'][$i]['Service_Charge']."</td>";
				echo			"<td width='20' align='center'>".$_SESSION['advertise'][$i]['Car_Parking']."</td>";
				echo			"<td width='20' align='center'>".$_SESSION['advertise'][$i]['Lift']."</td>";
				echo			"<td width='20' align='center'>".$_SESSION['advertise'][$i]['Generator']."</td>";
				echo			"<td width='20' align='center'>".$_SESSION['advertise'][$i]['Furnished']."</td>";
				echo			"<td width='20' align='center'>".$_SESSION['advertise'][$i]['Special_Requirement']."</td>";
				echo			"<td width='20' align='center'>".$_SESSION['advertise'][$i]['Verification']."</td>";
			echo		"</tr>";
		}
	}
			echo 	"</tbody>";
			echo "</table>";
	if(isset($_SESSION['adflag']) && $_SESSION['adflag']==1)
	{
		echo "<script>document.getElementById('an').innerHTML=' * Enter a valid advertisement id';</script>";
		echo "<script>document.getElementById('an').style.color='red';</script>";
		$_SESSION['adflag']=0;
	}
	
	if(isset($_SESSION['addeleteuserflag']) && $_SESSION['addeleteuserflag']==1)
	{
		echo "<script>document.getElementById('addeleteuser').innerHTML=' * Advertise successfully deleted';</script>";
		echo "<script>document.getElementById('addeleteuser').style.color='red';</script>";
		$_SESSION['addeleteuserflag']=0;
	}
	
	if(isset($_SESSION['newaduserflag']) && $_SESSION['newaduserflag']==1)
	{
		echo "<script>document.getElementById('newaduser').innerHTML=' * Advertise successfully added';</script>";
		echo "<script>document.getElementById('newaduser').style.color='red';</script>";
		$_SESSION['newaduserflag']=0;
	}
	
	if($bool==false)
	{
		echo "<script>document.getElementById('an').innerHTML=' * To edit/delete please enter your advertisement id';</script>";
		echo "<script>document.getElementById('an').style.color='red';</script>";
		$_SESSION['adflag']=0;
	}
	if($advbool==false)
	{
		echo "<script>document.getElementById('an').innerHTML=' * To edit/delete please enter your advertisement id';</script>";
		echo "<script>document.getElementById('an').style.color='red';</script>";
		$_SESSION['addeleteuserflag']=0;
	}
	if($advrbool==false)
	{
		echo "<script>document.getElementById('an').innerHTML=' * To edit/delete please enter your advertisement id';</script>";
		echo "<script>document.getElementById('an').style.color='red';</script>";
		$_SESSION['addeleteuserflag']=0;
	}

	
?>

<style>
body
{
	background-color:#f2f2f2;
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