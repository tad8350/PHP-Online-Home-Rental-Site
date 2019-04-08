<?php

	session_start();
	require_once "AdminHome.php";
	
	$userbool=false;
	if(isset($_SESSION['usernumber']))
	{
		$userbool=false;

         for($i=0;$i<sizeof($_SESSION['alluser']);$i++)
		{
			
				if($_SESSION['alluser'][$i]['User_Id']==$_SESSION['usernumber'])
				{
					$userbool=true;
					$_SESSION['usernum']=$_SESSION['usernumber'];
					$_SESSION['usernumber']='';
					header('location:ShowAllUser.php');
				}
		}
	}
	
	echo "<br/> <br/>";
	echo "<form action='FormAction.php' method='post'>";
	echo "<table width='100%' cellpadding='5'>";	
			echo "<tr>";
				echo "<td align='right'> <input type='text' onkeyup='removeuserid()' name='userno' placeholder='     User No.' style='width:100;height:27px'> <input type='submit' name='deleteuser' value='Delete User' style='width:100;height:27px'> </td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td align='right'> <span id='usernodelete'></span> </td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td align='right'> <span id='userdeleted'></span> </td>";
			echo "</tr>";	
			echo "<tr>";
			echo "</tr>";
		echo	"</tbody>";
	echo "</table>";
	
	echo "<script>function removeuserid(){document.getElementById('usernodelete').innerHTML='';}</script>";
	
	echo "<br/> <br/>";
	
	echo "<table width='100%' cellpadding='5' border='1' style='background-color:lightblue'>";
		echo 	"<tbody>";
		echo 		"<tr>
						<th>User Id</th>
						<th>User Name</th> 						
						<th>Password</th>						
						<th>Email</th> 
						<th>Contact Number</th>
						<th>Adress</th>						
					</tr>";
					
		for($i=0;$i<sizeof($_SESSION['alluser']);$i++)
		{	
			echo		"<tr>";
				echo			"<td style='color:black' width='20' align='center'>".$_SESSION['alluser'][$i]['User_Id']."</td>";
				echo			"<td style='color:black' width='20' align='center'>".$_SESSION['alluser'][$i]['User_Name']."</td>";
				echo			"<td style='color:black' width='20' align='center'>".$_SESSION['alluser'][$i]['Password']."</td>";
				echo			"<td style='color:black' width='20' align='center'>".$_SESSION['alluser'][$i]['Email']."</td>";
				echo			"<td style='color:black' width='20' align='center'>".$_SESSION['alluser'][$i]['Contact_No']."</td>";
				echo			"<td style='color:black' width='20' align='center'>".$_SESSION['alluser'][$i]['Address']."</td>";
			echo		"</tr>";
		}
		
		echo 	"</tbody>";
	echo "</table>";
	echo "</form>";
	
	if(isset($_SESSION['userflag']) && $_SESSION['userflag']==1)
	{
		echo "<script>document.getElementById('usernodelete').innerHTML=' * Enter a valid user id';</script>";
		echo "<script>document.getElementById('usernodelete').style.color='white';</script>";
		$_SESSION['userflag']=0;
	}
	
	if(isset($_SESSION['userdeletedflag']) && $_SESSION['userdeletedflag']==1)
	{
		echo "<script>document.getElementById('userdeleted').innerHTML=' * User deleted successfully';</script>";
		echo "<script>document.getElementById('userdeleted').style.color='white';</script>";
		$_SESSION['userdeletedflag']=0;
	}
	
	if($userbool==false)
	{
		echo "<script>document.getElementById('usernodelete').innerHTML=' * To delete a user enter a valid user id';</script>";
		echo "<script>document.getElementById('usernodelete').style.color='white';</script>";
		$_SESSION['userflag']=0;
	}

?>