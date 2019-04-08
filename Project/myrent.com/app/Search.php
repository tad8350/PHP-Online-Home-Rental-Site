<?php
require_once "../service/DBConnection.php";
if(isset($_POST["query"]))
{
	$output='';
	$query="SELECT * From area WHERE areaname LIKE '%".$_POST["query"]."%'";
     $result = executeSQL($query);
	$output='<ul class="list-unstyled">';
	if(mysqli_num_rows($result)>0)
	{
		
		while($row=mysqli_fetch_array($result))
		{
			$output.='<li>'.$row["Areaname"].'</li>';
		}
		
	}
	else
	{
		$output='<li>Area Not Found</li>';
	}
	$output.='</ul>';
	echo $output;
}



?>