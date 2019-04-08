 <?php

		echo "<form action='FormAction.php'>";
		echo "<br/> <br/>";	
		echo "<div id='log'>";
		echo "<table>";
			echo "<tbody>";
				echo "<tr>";
					echo "<td width='100'> </td>";
					echo "<td style='color:white;font-size:30'> <b> myrent.com </b> </td>";
					echo "<td width='400'> </td>";
					echo "<td> <input type='submit' name='adminhome' id='adminhome' onmouseover='changecolor()' onmouseout='backtonormal()' value='Home' style='color:white;width:120;height:75px;border:none;background-color:rgba(0,0,0,0.2);'> 
					           <input type='submit' name='adminshowuser' id='showuser' onmouseover='changeshowusercolor()' onmouseout='backtonormal()' value='Show User' style='color:white;width:120;height:75;border:none;background-color:rgba(0,0,0,0.2);'>
					
			   <input type='submit' name='adminshowad' id='myadvertise' onmouseover='changeshowadcolor()' onmouseout='backtonormal()' value='All Advertise' style='color:white;width:120;height:75;border:none;background-color:rgba(0,0,0,0.2);'>
					
					<input type='submit' name='logout' id='logout' onmouseover='changecolorlogout()' onmouseout='backtonormal()' value='Log Out' style='color:white;width:120;height:75;border:none;background-color:rgba(0,0,0,0.2);'> </td>";
									
		echo 				"<td width='60'> </td>";
		echo 			"</tr>";
		echo 		"</tbody>";
		echo 	"</table>";
		echo "</div>";
		// echo "<table style='background-color:rgba(0,0,0,0.7)'>";
		// echo 	"<tbody>";
		// echo 			"<tr>";
		// echo 				"<td width='100'> </td>";
		// echo 				"<td style='color:white'> <b> myrent.com </b> </td>";
		// echo 				"<td width='625'> </td>";
		// echo 				"<td> <input type='submit' name='adminhome' value='Home' style='width:80;height:27px'> <input type='submit' name='adminshowuser' value='Show User' style='width:90;height:27px'> <input type='submit' name='adminshowad' value='Show Advertise' style='width:105;height:27px'> <input type='submit' name='adminlogout' value='Log Out' style='width:80;height:27px'> </td>";
		// echo 				"<td width='140'> </td>";
		// echo 			"</tr>";
		// echo 		"</tbody>";
		// echo 	"</table>";
			
		echo "</form>";
		echo "</body>";
?>
	<style>
		body
		{
			background:url(../image/homeback.jpg) no-repeat ;
			background-size: 100% 100% ;

		}
		#log
{
	background-color:rgba(0,0,0,0.7);
	height:80;
}
	</style>
	<script>
	function changecolor()
{
	document.getElementById("adminhome").style.backgroundColor="steelblue";

}
function backtonormal()
{
		document.getElementById("adminhome").style.backgroundColor="rgba(0,0,0,0.2)";
		document.getElementById("showuser").style.backgroundColor="rgba(0,0,0,0.2)";
		document.getElementById("logout").style.backgroundColor="rgba(0,0,0,0.2)";
		document.getElementById("myadvertise").style.backgroundColor="rgba(0,0,0,0.2)";




}
function changeshowusercolor()
{
		document.getElementById("showuser").style.backgroundColor="steelblue";

}
function changeshowadcolor()
{
		document.getElementById("myadvertise").style.backgroundColor="steelblue";

}
function changecolorlogout()
{
		document.getElementById("logout").style.backgroundColor="steelblue";

}
	</script>
