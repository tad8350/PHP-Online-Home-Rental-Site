<?php
	
	session_start();
	require_once "AdminHome.php";
	$admindeladbool=false;
	if(isset($_SESSION['adminaddeleteno']))
	{
		$admindeladbool=false;

         for($i=0;$i<sizeof($_SESSION['allad']);$i++)
		{
			
				if($_SESSION['allad'][$i]['Ad_Id']==$_SESSION['adminaddeleteno'])
				{
					$admindeladbool=true;
					$_SESSION['adminadnumber']=$_SESSION['adminaddeleteno'];
					$_SESSION['adminaddeleteno']='';
					 header('location:ShowAdvertisement.php');
				}
		}
	}
	
	
	
	echo "<br/> <br/>";
	
	echo "<form action='FormAction.php' method='post'>";
	echo "<table width='100%' cellpadding='5'>";	
			echo "<tr>";
				echo "<td align='right'> <input type='text' onkeyup='adminremoveaderr()' name='adminadno' placeholder='     Ad No.' style='width:100;height:27px'> <input type='submit' name='adminverifyad' value='Verify Ad' style='width:100;height:27px'> <input type='submit' name='admindeletead' value='Delete Ad' style='width:100;height:27px'> </td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td align='right'> <span id='admindeletead'></span> </td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td align='right'> <span id='admindeleteaddone'></span> </td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td align='right'> <span id='adminverifiedddone'></span> </td>";
			echo "</tr>";
			echo "<tr>";
			echo "</tr>";
		echo	"</tbody>";
	echo "</table>";
	
	echo "<br/> <br/>";
	
	echo "<script>function adminremoveaderr(){document.getElementById('admindeletead').innerHTML='';}</script>";
	
	echo "<table width='100%' cellpadding='5' border='1' style='background-color:lightblue'>";
		echo 	"<tbody>";
		echo 		"<tr >
						<th>Add ID</th>
						<th>User ID</th>
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

	if(isset($_SESSION['allad']))
	{	

		for($i=0;$i<sizeof($_SESSION['allad']);$i++)
		{	
			echo		"<tr>";
				echo			"<td style='color:black' width='20' align='center'>".$_SESSION['allad'][$i]['Ad_Id']."</td>";
				echo			"<td style='color:black' width='20' align='center'>".$_SESSION['allad'][$i]['User_Id']."</td>";
				echo			"<td style='color:black' width='20' align='center'>".$_SESSION['allad'][$i]['Area']."</td>";
				echo			"<td style='color:black' width='20' align='center'>".$_SESSION['allad'][$i]['Location']."</td>";
				echo			"<td style='color:black' width='20' align='center'>".$_SESSION['allad'][$i]['Square_Feet']."</td>";
				echo			"<td style='color:black' width='20' align='center'>".$_SESSION['allad'][$i]['Bed_No']."</td>";
				echo			"<td style='color:black' width='20' align='center'>".$_SESSION['allad'][$i]['Washroom_No']."</td>";
				echo			"<td style='color:black' width='20' align='center'>".$_SESSION['allad'][$i]['Rent']."</td>";
				echo			"<td style='color:black' width='20' align='center'>".$_SESSION['allad'][$i]['Service_Charge']."</td>";
				echo			"<td style='color:black' width='20' align='center'>".$_SESSION['allad'][$i]['Car_Parking']."</td>";
				echo			"<td style='color:black' width='20' align='center'>".$_SESSION['allad'][$i]['Lift']."</td>";
				echo			"<td style='color:black' width='20' align='center'>".$_SESSION['allad'][$i]['Generator']."</td>";
				echo			"<td style='color:black' width='20' align='center'>".$_SESSION['allad'][$i]['Furnished']."</td>";
				echo			"<td style='color:black' width='20' align='center'>".$_SESSION['allad'][$i]['Special_Requirement']."</td>";
				echo			"<td style='color:black' width='20' align='center'>".$_SESSION['allad'][$i]['Verification']."</td>";
			echo		"</tr>";
		}
	}
			echo 	"</tbody>";
		echo "</table>";
		echo "</form>";

		if(isset($_SESSION['admindeleteadflag'])  && $_SESSION['admindeleteadflag']==1)
		{
			echo "<script>document.getElementById('admindeletead').innerHTML=' * Enter a valid advertisement id';</script>";
			echo "<script>document.getElementById('admindeletead').style.color='white';</script>";
			$_SESSION['admindeleteadflag']=0;
		}
		
		if(isset($_SESSION['admindeleteaddone'])  && $_SESSION['admindeleteaddone']==1)
		{
			echo "<script>document.getElementById('admindeleteaddone').innerHTML=' * Advertise deleted successfully';</script>";
			echo "<script>document.getElementById('admindeleteaddone').style.color='white';</script>";
			$_SESSION['admindeleteaddone']=0;
		}
		
		if(isset($_SESSION['adminverifiedddone'])  && $_SESSION['adminverifiedddone']==1)
		{
			echo "<script>document.getElementById('adminverifiedddone').innerHTML=' * Advertise verified successfully';</script>";
			echo "<script>document.getElementById('adminverifiedddone').style.color='white';</script>";
			$_SESSION['adminverifiedddone']=0;
		}
		
		if($admindeladbool==false)
		{
			echo "<script>document.getElementById('admindeletead').innerHTML=' * Enter a valid advertisement id';</script>";
			echo "<script>document.getElementById('admindeletead').style.color='white';</script>";
			$_SESSION['admindeleteadflag']=0;
		}

?>