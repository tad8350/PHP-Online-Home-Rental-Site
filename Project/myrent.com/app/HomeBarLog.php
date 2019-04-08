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

<style>
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

<?php

	echo "<form action='FormAction.php'>";

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
	echo "</form>";
	echo "</body>";

?>

