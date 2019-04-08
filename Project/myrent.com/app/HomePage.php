<?php 
session_start();

if(isset($_SESSION['flag']) && $_SESSION['flag']==1 && isset($_SESSION['currentuserid']))
{
	
	require_once("HomeBarLog.php");
	$_SESSION['flag']=0;
}
else
{
	unset($_SESSION['currentuserid']);
		session_unset();
		session_destroy();
	require_once("HomeBar.php");
}
if(isset($_SESSION['invalid']) && $_SESSION['invalid']==1)
{
	echo "<script>alert('Invalid email or password');</script>";
}
if(isset($_SESSION['reg']) && $_SESSION['reg']==1)
{
	echo "<script>alert('Registered successfully');</script>";
	$_SESSION['reg']=0;
}
if(isset($_SESSION['emptysearch']) && $_SESSION['emptysearch']==1)
{
	echo "<script>alert('Please select a area.');</script>";
	$_SESSION['emptysearch']=0;
}
if(isset($_SESSION['noadsearch']) && $_SESSION['noadsearch']==1)
{
	echo "<script>alert('Currently No To-Let In This Area.');</script>";
	$_SESSION['noadsearch']=0;
}
?>
<html>
<head>  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
 
          
      </head>  
<body>
<form action="FormAction.php">
	<div id='search'>
	<table width='100%' align='center' >
		<tbody>
			<p style='color:white;font-size:20;margin-left:20'>Search rental Properties</p>
			<tr>
				<td><p style='color:white;margin-left:20'> <font size='5'> Area   </td> </p>
				
				 <!--<td> <select name='area' style='background:url(../image/searchicon.png) no-repeat ;background-size: 10% 100% ;background-color:white;width:300;height:30;padding-left:30px'>
									// <option value=""></option>
									// <option value="Basundhara"> Basundhara </option>
									// <option value="Banani"> Banani </option>
									// <option value="Gulshan"> Gulshan </option>
									// <option value="Dhanmondi"> Dhanmondi </option>
									// <option value="Farmgate"> Farmgate </option>
									// <option value="Mirpur"> Mirpur </option>
									// <option value="Nikunjo"> Nikunjo </option>
									// <option value="Niketon"> Niketon </option>
				 </td> -->
				<td>
				<input type="text" name='area' id='area' class="form-control" style='background:url(../image/searchicon.png) no-repeat ;background-size: 10% 100% ;background-color:white;width:300;height:30;padding-left:50px'>
				 <div id="arealist"></div>
				</td>
			   

				<td> <input type="submit" name="search" value="Search" style="background-color:darkred;height:40px;width:150px;color:white;font-size:15px;"> </td>

			</tr>
		</tbody>
	</table>
				
	</div>
	<!--<br/>
	
	<table width='810' align='left'>
		<tbody>
			<tr>
				<td align='left'> <input type="submit" name="search" value="Search" style="width:80;height:27px"> </td>
			</tr>
		</tbody>
	</table>
	-->

	</body>
</form>
</html>

<script>
$(document).ready(function(){

	$('#area').keyup(function(){
	
		var query=$(this).val();
		if(query != '')
		{
			$.ajax({
				url:"Search.php",
				method:"POST",
				data:{query:query},
				success:function(data)
				{
					$('#arealist').fadeIn();
					$('#arealist').html(data);
				}
			});
		}
	});
});
$(document).on('click', 'li', function(){  
           $('#area').val($(this).text());  
           $('#arealist').fadeOut();  
});  

	

</script>

<style>
body
{
	background:url(../image/homeback.jpg) no-repeat ;
	background-size: 100% 100% ;
}
#search
{
	height:200px;
	width:700px;
	position:absolute;
	top:40%;
	left:50%;
	transform:translate(-50%,-50%);
	background-color:rgba(0,0,0,0.7);
	color:white;
	
}
#arealist{
	position:absolute;
}           
ul{  
	background-color:#eee;  
	cursor:pointer;  
	width:300;
	list-style-type:none;
}  
li{  
	padding:5px;  
} 
</style>