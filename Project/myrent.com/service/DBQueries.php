<?php require_once "DBConnection.php"; ?>
<?php
	session_start();
	$_SESSION['invalid']=0;
	$_SESSION['addeleteuserflag']=0;

	function adduserinfo($person)
	{
        $sql = "INSERT INTO user(User_Name, Password, Email,Contact_No,Address) VALUES( '$person[username]','$person[password]', '$person[email]','$person[contactno]','$person[address]')";
        $result = executeSQL($sql);
        return $result;
    }
	function logininfo($person)
	{
        $sql = "SELECT User_Id,Email,Password from user where Email='$person'";
        $result = executeSQL($sql);
		$row = mysqli_fetch_assoc($result);
	
        return $row;	
    }
	function showuserinfo($userid)
	{
        $sql = "SELECT User_Name,Password,Email,Contact_No,Address from user where User_Id=$userid";
        $result = executeSQL($sql);
		$row = mysqli_fetch_assoc($result);
        return $row;	
    }
	function updateuserinfo($person)
	{
		$userid=$_SESSION['currentuserid'];
		
		$sql = "UPDATE user SET User_Name='$person[username]',Contact_No='$person[contactno]', Address='$person[address]' where User_Id=$userid";
        $result = executeSQL($sql);
		
        return $result;
	}
	function addadvertiseinfo($advertise)
	{
		$userid=$_SESSION['currentuserid'];
		
        $sql = "INSERT INTO advertise(User_Id, Area, Location, Square_Feet, Bed_No, Washroom_No, Rent, Service_Charge, Car_Parking, Lift, Generator, Furnished, Special_Requirement,imagename) VALUES('$_SESSION[currentuserid]', '$advertise[area]', '$advertise[location]', '$advertise[squarefeet]','$advertise[bedno]','$advertise[washroomno]', '$advertise[rent]','$advertise[servicecharge]', '$advertise[carparking]', '$advertise[lift]', '$advertise[generator]', '$advertise[furnished]', '$advertise[specialrequirement]','$advertise[file]')";
        $result = executeSQL($sql);
        return $result;
    }
	function showadvertiseinfo($userid)
	{
		//$userid=$_SESSION['currentuserid'];
		
        $sql = "SELECT Ad_Id, Area, Location, Square_Feet, Bed_No, Washroom_No, Rent, Service_Charge, Car_Parking, Lift, Generator, Furnished, Special_Requirement, Verification from advertise where User_Id=$userid";
        $result = executeSQL($sql);
		$advertise = array();
        for($i=0; $row=mysqli_fetch_assoc($result); $i++)
		{
            $advertise[$i] = $row;
        }
        return $advertise;
    }
	function fetchadid($userid)
	{
		//$userid=$_SESSION['currentuserid'];
		
        $sql = "SELECT Ad_Id from advertise where User_Id=$userid";
        $result = executeSQL($sql);
		$adid = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i)
		{
            $adid[$i] = $row;
        }
        return $adid;
    }
	function showadinfo($adid)
	{
        $sql = "SELECT Ad_Id,Area,Location, Square_Feet, Bed_No, Washroom_No, Rent, Service_Charge,Car_Parking, Lift, Generator, Furnished, Special_Requirement from advertise where Ad_Id=$adid";
        $result = executeSQL($sql);
		$row = mysqli_fetch_assoc($result);
        return $row;	
    }
	function updateadinfo($ad)
	{
		$adid=$_SESSION['ad_id'];
		
		$sql = "UPDATE advertise SET Area='$ad[area]', Location='$ad[location]', Square_Feet='$ad[squarefeet]', Bed_No='$ad[bedno]', Washroom_No='$ad[washroomno]', Rent='$ad[rent]', Service_Charge='$ad[servicecharge]', Car_Parking='$ad[carparking]', Lift='$ad[lift]', Generator='$ad[generator]', Furnished='$ad[furnished]',  Special_Requirement='$ad[specialrequirement]' where Ad_Id=$adid";
        $result = executeSQL($sql);
		
        return $result;
	}
	function deletead($adid)
	{
        $sql = "DELETE FROM advertise WHERE Ad_Id=$adid";        
        $result = executeSQL($sql);
        return $result;
    }
	function getadminid($adminemail)
	{
		$sql = "SELECT Admin_Id from admin where Email='$adminemail'";
        $result = executeSQL($sql);
        $row = mysqli_fetch_assoc($result);
        return $row;	
	}
	function showalluser()
	{
		$sql = "SELECT * from user";
        $result = executeSQL($sql);
		$alluser = array();
		//var_dump($result);
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i)
		{
            $alluser[$i] = $row;
        }
        return $alluser;
	}
	function deleteuser($userid)
	{
        $sql = "DELETE FROM user WHERE User_Id=$userid";        
        $result = executeSQL($sql);
        return $result;
    }
	function showadminadvertiseinfo()
	{
		$sql = "SELECT Ad_Id,User_Id,Area,Location, Square_Feet, Bed_No, Washroom_No, Rent, Service_Charge,Car_Parking,Lift, Generator,Furnished, Special_Requirement, Verification from advertise";
        $result = executeSQL($sql);
		$_SESSION['allad']=array();
		for($i=0; $row=mysqli_fetch_assoc($result); $i++)
		{
            $_SESSION['allad'][$i] = $row;
        }
        return  $_SESSION['allad'];
	}
	function admindeletead($adid)
	{
        $sql = "DELETE FROM advertise WHERE Ad_Id=$adid";        
        $result = executeSQL($sql);
        return $result;
    }
	function verifyadinfo($adid)
	{
		$adid=$_SESSION['adminadverifyno'];
		$verification='Verified';
		
		$sql = "UPDATE advertise SET Verification='$verification' where Ad_Id=$adid";
        $result = executeSQL($sql);
		
        return $result;
	}
	function deleteuserad()
	{	
			
			if(deletead($_SESSION['advnumber'])==true)
			{
				$_SESSION['addeleteuserflag']=1;
				$_SESSION['advertise']=showadvertiseinfo($_SESSION['currentuserid']);
			}
	}
	function showsearchresult($area)
	{
		$sql = "SELECT advertise.*,user.Contact_No FROM advertise,user WHERE Area='$area' and advertise.User_Id=user.User_Id";
        $result = executeSQL($sql);
        
        $search = array();
        for($i=0; $row = mysqli_fetch_assoc($result); $i++)
		{
            $search[$i] = $row;
        }
		
        return $search;
	}
	function searchwithbedfilter($fbedno,$selectedarea)
	{
		$sql = "SELECT advertise.*,user.Contact_No FROM advertise,user WHERE Bed_No='$fbedno' AND Area='$selectedarea' and advertise.User_Id=user.User_Id";
        $result = executeSQL($sql);
        
        $searchwithfilter = array();
        for($i=0; $row = mysqli_fetch_assoc($result); $i++)
		{
            $searchwithfilter[$i] = $row;
        }
		
        return $searchwithfilter;
	}
	function searchwithwashfilter($fwashno,$selectedarea)
	{
		$sql = "SELECT advertise.*,user.Contact_No FROM advertise,user WHERE Washroom_No='$fwashno' AND Area='$selectedarea' and advertise.User_Id=user.User_Id";
        $result = executeSQL($sql);
        
        $searchwithfilter = array();
        for($i=0; $row = mysqli_fetch_assoc($result); $i++)
		{
            $searchwithfilter[$i] = $row;
        }
		
        return $searchwithfilter;
	}
	function searchwithmaximumpricefilter($fmaxprice,$selectedarea)
	{
		$sql = "SELECT advertise.*,user.Contact_No FROM advertise,user WHERE Rent<='$fmaxprice' AND Area='$selectedarea' and advertise.User_Id=user.User_Id";
        $result = executeSQL($sql);
        
        $searchwithfilter = array();
        for($i=0; $row = mysqli_fetch_assoc($result); $i++)
		{
            $searchwithfilter[$i] = $row;
        }
		
        return $searchwithfilter;
	}
	function searchwithverifyfilter($fverify,$selectedarea)
	{
		$sql = "SELECT advertise.*,user.Contact_No FROM advertise,user WHERE Verification='$fverify' AND Area='$selectedarea' and advertise.User_Id=user.User_Id";
        $result = executeSQL($sql);
        
        $searchwithfilter = array();
        for($i=0; $row = mysqli_fetch_assoc($result); $i++)
		{
            $searchwithfilter[$i] = $row;
        }
		
        return $searchwithfilter;
	}
	function searchwithbedwashfilter($fbedno,$fwashno,$selectedarea)
	{
		$sql = "SELECT advertise.*,user.Contact_No FROM advertise,user WHERE Bed_No='$fbedno' AND Washroom_No='$fwashno' AND Area='$selectedarea' and advertise.User_Id=user.User_Id";
        $result = executeSQL($sql);
        
        $searchwithbedwash = array();
        for($i=0; $row = mysqli_fetch_assoc($result); $i++)
		{
            $searchwithbedwash[$i] = $row;
        }
		
        return $searchwithbedwash;
	}
	function searchwithbedpricefilter($fbedno,$fmaxprice,$selectedarea)
	{
		$sql = "SELECT advertise.*,user.Contact_No FROM advertise,user WHERE Bed_No='$fbedno' AND Rent='$fmaxprice' AND Area='$selectedarea' and advertise.User_Id=user.User_Id";
        $result = executeSQL($sql);
        
        $searchwithbedwash = array();
        for($i=0; $row = mysqli_fetch_assoc($result); $i++)
		{
            $searchwithbedwash[$i] = $row;
        }
		
        return $searchwithbedwash;
	}
	function searchwithbedverifyfilter($fbedno,$fverify,$selectedarea)
	{
		$sql = "SELECT advertise.*,user.Contact_No FROM advertise,user WHERE Bed_No='$fbedno' AND Verification='$fverify' AND Area='$selectedarea' and advertise.User_Id=user.User_Id";
        $result = executeSQL($sql);
        
        $searchwithbedwash = array();
        for($i=0; $row = mysqli_fetch_assoc($result); $i++)
		{
            $searchwithbedwash[$i] = $row;
        }
		
        return $searchwithbedwash;
	}
	function searchwithbathpricefilter($fwashno,$fmaxprice,$selectedarea)
	{
		$sql = "SELECT advertise.*,user.Contact_No FROM advertise,user WHERE Washroom_No='$fwashno' AND Rent<='$fmaxprice' AND Area='$selectedarea' and advertise.User_Id=user.User_Id";
        $result = executeSQL($sql);
        
        $searchwithbedwash = array();
        for($i=0; $row = mysqli_fetch_assoc($result); $i++)
		{
            $searchwithbedwash[$i] = $row;
        }
		
        return $searchwithbedwash;
	}
	function searchwithbathverifyfilter($fwashno,$fverify,$selectedarea)
	{
		$sql = "SELECT advertise.*,user.Contact_No FROM advertise,user WHERE Washroom_No='$fwashno' AND Verification='$fverify' AND Area='$selectedarea' and advertise.User_Id=user.User_Id";
        $result = executeSQL($sql);
        
        $searchwithbedwash = array();
        for($i=0; $row = mysqli_fetch_assoc($result); $i++)
		{
            $searchwithbedwash[$i] = $row;
        }
		
        return $searchwithbedwash;
	}
	function searchwithpriceverifyfilter($fmaxprice,$fverify,$selectedarea)
	{
		$sql = "SELECT advertise.*,user.Contact_No FROM advertise,user WHERE Rent<='$fmaxprice' AND Verification='$fverify' AND Area='$selectedarea' and advertise.User_Id=user.User_Id";
        $result = executeSQL($sql);
        
        $searchwithbedwash = array();
        for($i=0; $row = mysqli_fetch_assoc($result); $i++)
		{
            $searchwithbedwash[$i] = $row;
        }
		
        return $searchwithbedwash;
	}
	function searchwithbedwashpricefilter($fbedno,$fwashno,$fmaxprice,$selectedarea)
	{
		$sql = "SELECT advertise.*,user.Contact_No FROM advertise,user WHERE Bed_No='$fbedno' AND Washroom_No='$fwashno' AND Rent<='$fmaxprice' AND Area='$selectedarea' and advertise.User_Id=user.User_Id";
        $result = executeSQL($sql);
        
        $searchwithbedwash = array();
        for($i=0; $row = mysqli_fetch_assoc($result); $i++)
		{
            $searchwithbedwash[$i] = $row;
        }
		
        return $searchwithbedwash;
	}
	function searchwithbedwashverifyfilter($fbedno,$fwashno,$fverify,$selectedarea)
	{
		$sql = "SELECT advertise.*,user.Contact_No FROM advertise,user WHERE Bed_No='$fbedno' AND Washroom_No='$fwashno' AND Verification='$fverify' AND Area='$selectedarea' and advertise.User_Id=user.User_Id";
        $result = executeSQL($sql);
        
        $searchwithbedwash = array();
        for($i=0; $row = mysqli_fetch_assoc($result); $i++)
		{
            $searchwithbedwash[$i] = $row;
        }
		
        return $searchwithbedwash;
	}
	function searchwithbedpriceverifyfilter($fbedno,$fmaxprice,$fverify,$selectedarea)
	{
		$sql = "SELECT advertise.*,user.Contact_No FROM advertise,user WHERE Bed_No='$fbedno' AND Rent<='$fmaxprice' AND Verification='$fverify' AND Area='$selectedarea' and advertise.User_Id=user.User_Id";
        $result = executeSQL($sql);
        
        $searchwithbedwash = array();
        for($i=0; $row = mysqli_fetch_assoc($result); $i++)
		{
            $searchwithbedwash[$i] = $row;
        }
		
        return $searchwithbedwash;
	}
	function searchwithbathpriceverifyfilter($fwashno,$fmaxprice,$fverify,$selectedarea)
	{
		$sql = "SELECT advertise.*,user.Contact_No FROM advertise,user WHERE Washroom_No='$fwashno' AND Rent<='$fmaxprice' AND Verification='$fverify' AND Area='$selectedarea' and advertise.User_Id=user.User_Id";
        $result = executeSQL($sql);
        
        $searchwithbedwash = array();
        for($i=0; $row = mysqli_fetch_assoc($result); $i++)
		{
            $searchwithbedwash[$i] = $row;
        }
		
        return $searchwithbedwash;
	}
	function searchwithallfilter($fbedno,$fwashno,$fmaxprice,$fverify,$selectedarea)
	{
		$sql = "SELECT advertise.*,user.Contact_No FROM advertise,user WHERE Bed_No='$fbedno' AND Washroom_No='$fwashno' AND Rent<='$fmaxprice' AND Verification='$fverify' AND Area='$selectedarea' and advertise.User_Id=user.User_Id";
        $result = executeSQL($sql);
        
        $searchwithbedwash = array();
        for($i=0; $row = mysqli_fetch_assoc($result); $i++)
		{
            $searchwithbedwash[$i] = $row;
        }
		
        return $searchwithbedwash;
	}
	function checkpass()
	{
		$userid=$_SESSION['currentuserid'];
		$sql="SELECT Password from user where User_Id=$userid";
		$result=executeSQL($sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}
	function updatepass($pass)
	{
		$userid=$_SESSION['currentuserid'];
		
		$sql = "UPDATE user SET Password='$pass' where User_Id=$userid";
        $result = executeSQL($sql);
		
        return $result;
	}
	function checkmail()
	{
		$userid=$_SESSION['currentuserid'];
		$sql="SELECT Email from user where User_Id=$userid";
		$result=executeSQL($sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}
	function updatemail($mail)
	{
		$userid=$_SESSION['currentuserid'];
		
		$sql = "UPDATE user SET Email='$mail' where User_Id=$userid";
        $result = executeSQL($sql);
		
        return $result;
	}
?>