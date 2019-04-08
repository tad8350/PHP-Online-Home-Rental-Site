<?php require_once "../service/DBQueries.php"; ?>
<?php

//session_start();
$_SESSION['flag']=0;
$_SESSION['invalid']=0;
$_SESSION['emptysearch']=0;
$_SESSION['nofilter']=0;
$_SESSION['flag']=0;
$_SESSION['checkpassflag']=0;
$_SESSION['updatepassflag']=0;
$_SESSION['updatemailflag']=0;

// $_SESSION['noadsearch']=0;
// $_SESSION['adflag']=0;

	if(isset($_REQUEST['signup']))
	{
		header('location:Registration.php');
	}
	
	if(isset($_REQUEST['submit']))
	{
		$person['username']=$_POST['username'];
		$person['password']=$_POST['password'];
        $person['email']=$_POST['email'];	
		$person['contactno']=$_POST['contactno'];
		$person['address']=$_POST['address'];
        
        if(adduserinfo($person)==true)
		{
			$_SESSION['reg']=1;
			header('location:HomePage.php');
        }
		
	}
	
	if(isset($_REQUEST['login']))
	{
		if($_REQUEST['Email']=='admin@myrent.com' && $_REQUEST['Password']=='12345678')
		{
            $_SESSION['adminid']=getadminid('admin@myrent.com');
			$_SESSION['currentadminid']= $_SESSION['adminid']['Admin_Id'];
			header('location:AdminHome.php');
		}
		else
		{
			$person['email']=$_REQUEST['Email'];
			$person['password']=$_REQUEST['Password'];
			// $person['remember'] = $_REQUEST['remember'];
			$emailpass=logininfo($person['email']);
			if($_REQUEST['Email']!="" && $_REQUEST['Password']!="" && $person['password']== $emailpass["Password"])
			{
					
					$_SESSION['flag']=1;
					$_SESSION['currentuserid']=$emailpass["User_Id"];
					header('location:HomePage.php');
				
			}
			else 
			{
				$_SESSION['invalid']=1;
				header('location:HomePage.php');
				
			}
		}
	}
	
	if(isset($_REQUEST['logout']))
	{
		unset($_SESSION['currentuserid']);
		session_unset();
		session_destroy();
	
		header('location:HomePage.php');
	}
	
	if(isset($_REQUEST['adminlogout']))
	{
		unset($_SESSION['adminid']);
		session_unset();
		session_destroy();
	
		header('location:HomePage.php');
	}
	
	// if(isset($_REQUEST['profile']))
	// {
		// if(isset($_SESSION['currentuserid']) && showuserinfo($_SESSION['currentuserid'])==true)
		// {
			// $profile=showuserinfo($_SESSION['currentuserid']);
			
			// $_SESSION['username']= $profile['User_Name'];
			// $_SESSION['password']= $profile['Password'];
			// $_SESSION['email']= $profile['Email'];
			// $_SESSION['contactno']= $profile['Contact_No'];
			// $_SESSION['address']= $profile['Address'];
			
			// header('location:Profile.php');
			// die();
        // }
	// }
	
	if(isset($_REQUEST['updateprofile']))
	{
		$person['username']=$_POST['username'];
		// $person['password']=$_POST['password'];
        // $person['email']=$_POST['email'];	
		 $person['contactno']=$_POST['contactno'];
		$person['address']=$_POST['address'];
			
			
        if(updateuserinfo($person)==true)
		{
			$profile=showuserinfo($_SESSION['currentuserid']);
			$_SESSION['username']= $profile['User_Name'];
			// $_SESSION['password']= $profile['Password'];
			// $_SESSION['email']= $profile['Email'];
			 $_SESSION['contactno']= $profile['Contact_No'];
			$_SESSION['address']= $profile['Address'];

			$_SESSION['profileflag']=1;
			
			header('location:Profile.php');
            die();
        }
	}
	
	if(isset($_REQUEST['home']))
	{
		if(isset($_SESSION['currentuserid']))
		{
			$_SESSION['flag']=1;
			header('location:HomePage.php');
		}
	}
	
	if(isset($_REQUEST['myadvertise']))
	{
		if(isset($_SESSION['currentuserid']) && showadvertiseinfo($_SESSION['currentuserid'])==true)
		{
			
			$_SESSION['advertise']=showadvertiseinfo($_SESSION['currentuserid']);
		
			header('location:MyAdvertise.php');
		}
		else
		{
			header('location:MyAdvertise.php');

		}
	}
	if(isset($_REQUEST['newad']))
	{
		header('location:NewAd.php');
	}
	
	if(isset($_REQUEST['add']))
	{
		$advertise['area']=$_POST['area'];
		$advertise['location']=$_POST['location'];
		$advertise['squarefeet']=$_POST['squarefeet'];
        $advertise['bedno']=$_POST['bedno'];	
		$advertise['washroomno']=$_POST['washroomno'];
		$advertise['rent']=$_POST['rent'];
		$advertise['servicecharge']=$_POST['servicecharge'];
		$advertise['file']=addslashes(file_get_contents($_FILES['image']['tmp_name']));
		
		if(isset($_POST['carparking']))
		{
			$advertise['carparking']=$_POST['carparking'];
			$advertise['carparking']='Yes';
		}
		else
		{
			$advertise['carparking']='No';
		}
		if(isset($_POST['lift']))
		{
			$advertise['lift']=$_POST['lift'];
			$advertise['lift']='Yes';
		}
		else
		{
			$advertise['lift']='No';
		}
		if(isset($_POST['generator']))
		{
			$advertise['generator']=$_POST['generator'];
			$advertise['generator']='Yes';
		}
		else
		{
			$advertise['generator']='No';
		}
		if(isset($_POST['furnished']))
		{
			$advertise['furnished']=$_POST['furnished'];
			$advertise['furnished']='Yes';
		}
		else
		{
			$advertise['furnished']='No';
		}
		
		$advertise['specialrequirement']=$_POST['specialrequirement'];
		
        if(addadvertiseinfo($advertise)==true)
		{
			$_SESSION['advertise']=showadvertiseinfo($_SESSION['currentuserid']);
			
			$_SESSION['newaduserflag']=1;
            header('location:MyAdvertise.php');
            die();
        }
	}
	
	if(isset($_REQUEST['editad']))
	{
		if($_REQUEST['adno']=="")
		{
			$_SESSION['adflag']=1;
			
			 header('location:MyAdvertise.php');
			
		}
		else
		{
			$_SESSION['advrnum']='';

			if(fetchadid($_SESSION['currentuserid'])==true)
			{
				$_SESSION['advrnum']=$_REQUEST['adno'];
				$_SESSION['advrid']=fetchadid($_SESSION['currentuserid']);
			
				 header('location:MyAdvertise.php');
				die();
			}
			else{
				$_SESSION['advrnum']=$_REQUEST['adno'];
				$_SESSION['advrid']=fetchadid($_SESSION['currentuserid']);
				
				header('location:MyAdvertise.php');
				die();
			}
			
		}
	}
	
	if(isset($_REQUEST['deletead']))
	{
		if($_REQUEST['adno']=="")
		{
			$_SESSION['adflag']=1;
			
			 header('location:MyAdvertise.php');
		}
		else
		{
			$_SESSION['advno']='';

			if(fetchadid($_SESSION['currentuserid'])==true)
			{
				$_SESSION['advno']=$_REQUEST['adno'];
				$_SESSION['advid']=fetchadid($_SESSION['currentuserid']);
				
				header('location:MyAdvertise.php');
				die();
			}
			else
			{
				
				$_SESSION['advno']=$_REQUEST['adno'];
				$_SESSION['advid'] =fetchadid($_SESSION['currentuserid']);
				
				
				header('location:MyAdvertise.php');
				die();
			}
		}
	}
	
		
		
	if(isset($_REQUEST['edit']))
	{		
		$ad['area']=$_POST['area'];
		$ad['location']=$_POST['location'];
		$ad['squarefeet']=$_POST['squarefeet'];
        $ad['bedno']=$_POST['bedno'];	
		$ad['washroomno']=$_POST['washroomno'];
		$ad['rent']=$_POST['rent'];
		$ad['servicecharge']=$_POST['servicecharge'];
		$ad['carparking']=$_POST['carparking'];
		$ad['lift']=$_POST['lift'];
		$ad['generator']=$_POST['generator'];
		$ad['furnished']=$_POST['furnished'];
		$ad['specialrequirement']=$_POST['specialrequirement'];
		
        if(updateadinfo($ad)==true)
		{
			$_SESSION['adflag']=1;
			header('location: EditAd.php');
            die();
        }
		
	}
	
	if(isset($_REQUEST['adminhome']))
	{
		header('location: AdminHome.php');
	}
	
	if(isset($_REQUEST['adminshowuser']))
	{
		if(isset($_SESSION['currentadminid']) && showalluser($_SESSION['currentadminid'])==true)
		{
			$_SESSION['alluser']=showalluser($_SESSION['currentadminid']);
			header('location: ShowAllUser.php');
		}
	}
	
	if(isset($_REQUEST['deleteuser']))
	{
		if($_REQUEST['userno']=="")
		{
			$_SESSION['userflag']=1;
			
			header('location:ShowAllUser.php');
		}
		else
		{
			$_SESSION['usernumber']=$_REQUEST['userno'];
			
			if(deleteuser($_SESSION['usernumber'])==true)
			{
				$_SESSION['alluser']=showalluser();
				$_SESSION['userdeletedflag']=1;
				header('location:ShowAllUser.php');
			}
		}
	}
	
	if(isset($_REQUEST['adminshowad']))
	{
		if(isset($_SESSION['currentadminid']) && showadminadvertiseinfo()==true)
		{
			 $_SESSION['allad']=showadminadvertiseinfo();
			 header('location:ShowAdvertisement.php');
		}
		else
		{
			header('location:ShowAdvertisement.php');
		}
	}
	
	if(isset($_REQUEST['admindeletead']))
	{
		if($_REQUEST['adminadno']=="")
		{
			$_SESSION['admindeleteadflag']=1;
			header('location:ShowAdvertisement.php');
		}
		else
		{
			$_SESSION['adminaddeleteno']=$_REQUEST['adminadno'];
			
			if(admindeletead($_SESSION['adminaddeleteno'])==true)
			{
				$_SESSION['allad']=showadminadvertiseinfo();
				$_SESSION['admindeleteaddone']=1;
				header('location:ShowAdvertisement.php');
			}
		
		}
	}
	
	if(isset($_REQUEST['adminverifyad']))
	{
		if($_REQUEST['adminadno']=="")
		{
			$_SESSION['admindeleteadflag']=1;
			header('location:ShowAdvertisement.php');
		}
		else
		{
			$_SESSION['adminadverifyno']=$_REQUEST['adminadno'];
			
			if(verifyadinfo($_SESSION['adminadverifyno'])==true)
			{
				$_SESSION['allad']=showadminadvertiseinfo();
				$_SESSION['adminverifiedddone']=1;
				header('location:ShowAdvertisement.php');
			}
		
		}
	}
	
	if(isset($_REQUEST['search']))
	{
		if(isset($_SESSION['currentuserid']))
		{
			$_SESSION['flag']=1;
			header("location:HomePage.php");
		}
		if($_REQUEST['area']=="") 
		{
			$_SESSION['emptysearch']=1;
			header("location:HomePage.php");
		}
		else
		{
			$_SESSION['selectedarea']=$_REQUEST['area'];
			$_SESSION['searchresult']=showsearchresult($_SESSION['selectedarea']);

			if(empty($_SESSION['searchresult'])==true)
			{
				//var_dump($_SESSION['searchresult']);
				$_SESSION['noadsearch']=1;
				header("location:HomePage.php");
			}
			else
			{
				header('location:SearchResult.php');
			}
		}
	}

	if(isset($_REQUEST['refresh']))
	{
		
		if($_REQUEST['refresh']=="Refresh" && ( empty($_GET['filterbedroomno']) && empty($_GET['filterwashroomno']) && empty($_GET['filtermaximumprice']) && empty($_GET['filterverified'])))
		{
			$_SESSION['nofilter']=1;
			header("location:SearchResult.php");
		}
		
		else 
		{
			if(empty($_GET['filterbedroomno'])==false)
			{
				$fbedno=$_GET['filterbedroomno'];
				$selectedarea=$_SESSION['selectedarea'];
				$_SESSION['searchresult']=searchwithbedfilter($fbedno,$selectedarea);
				if(empty($_SESSION['searchresult'])==true)
				{
					$_SESSION['filterbedroomnoempty']=1;
					header("location:SearchResult.php");
				}
				else
				{
					header("location:SearchResult.php");
				}
			}
			if(empty($_GET['filterwashroomno'])==false)
			{
				$fwashno=$_GET['filterwashroomno'];
				$selectedarea=$_SESSION['selectedarea'];
				$_SESSION['searchresult']=searchwithwashfilter($fwashno,$selectedarea);
				if(empty($_SESSION['searchresult'])==true)
				{
					$_SESSION['filterbedroomnoempty']=1;
					header("location:SearchResult.php");
				}
				else
				{
					header("location:SearchResult.php");
				}
			}
			if(empty($_GET['filtermaximumprice'])==false)
			{
				$fmaxprice=$_GET['filtermaximumprice'];
				$selectedarea=$_SESSION['selectedarea'];
				$_SESSION['searchresult']=searchwithmaximumpricefilter($fmaxprice,$selectedarea);
		
				if(empty($_SESSION['searchresult'])==true)
				{
					$_SESSION['filterbedroomnoempty']=1;
					header("location:SearchResult.php");
				}
				else
				{
					header("location:SearchResult.php");
				}
			}
			if(empty($_GET['filterverified'])==false)
			{

				$fverify=$_GET['filterverified'];
				$fverify='Verified';
				$selectedarea=$_SESSION['selectedarea'];
				$_SESSION['searchresult']=searchwithverifyfilter($fverify,$selectedarea);
		
				if(empty($_SESSION['searchresult'])==true)
				{
					$_SESSION['filterbedroomnoempty']=1;
					header("location:SearchResult.php");
				}
				else
				{
					header("location:SearchResult.php");
				}
			}
			if(empty($_GET['filterbedroomno'])==false && empty($_GET['filterwashroomno'])==false)
			{
				$fbedno=$_GET['filterbedroomno'];
				$fwashno=$_GET['filterwashroomno'];
				$selectedarea=$_SESSION['selectedarea'];
				$_SESSION['searchresult']=searchwithbedwashfilter($fbedno,$fwashno,$selectedarea);
				if(empty($_SESSION['searchresult'])==true)
				{
					$_SESSION['filterbedroomnoempty']=1;
					header("location:SearchResult.php");
				}
				else
				{
					header("location:SearchResult.php");
				}
			}
			if(empty($_GET['filterbedroomno'])==false && empty($_GET['filtermaximumprice'])==false)
			{
				$fbedno=$_GET['filterbedroomno'];
				$fmaxprice=$_GET['filtermaximumprice'];
				$selectedarea=$_SESSION['selectedarea'];
				$_SESSION['searchresult']=searchwithbedpricefilter($fbedno,$fmaxprice,$selectedarea);
				if(empty($_SESSION['searchresult'])==true)
				{
					$_SESSION['filterbedroomnoempty']=1;
					header("location:SearchResult.php");
				}
				else
				{
					header("location:SearchResult.php");
				}
			}
			if(empty($_GET['filterbedroomno'])==false && empty($_GET['filterverified'])==false)
			{
				$fbedno=$_GET['filterbedroomno'];
				$fverify=$_GET['filterverified'];
				$fverify='Verified';
				$selectedarea=$_SESSION['selectedarea'];
				$_SESSION['searchresult']=searchwithbedverifyfilter($fbedno,$fverify,$selectedarea);
				if(empty($_SESSION['searchresult'])==true)
				{
					$_SESSION['filterbedroomnoempty']=1;
					header("location:SearchResult.php");
				}
				else
				{
					header("location:SearchResult.php");
				}
			}
			if(empty($_GET['filterwashroomno'])==false && empty($_GET['filtermaximumprice'])==false)
			{
				$fwashno=$_GET['filterwashroomno'];
				$fmaxprice=$_GET['filtermaximumprice'];
				$selectedarea=$_SESSION['selectedarea'];
				$_SESSION['searchresult']=searchwithbathpricefilter($fwashno,$fmaxprice,$selectedarea);
				if(empty($_SESSION['searchresult'])==true)
				{
					$_SESSION['filterbedroomnoempty']=1;
					header("location:SearchResult.php");
				}
				else
				{
					header("location:SearchResult.php");
				}
			}
			if(empty($_GET['filterbedroomno'])==false && empty($_GET['filterverified'])==false)
			{
				$fwashno=$_GET['filterwashroomno'];
				$fverify=$_GET['filterverified'];
				$fverify='Verified';
				$selectedarea=$_SESSION['selectedarea'];
				$_SESSION['searchresult']=searchwithbathverifyfilter($fwashno,$fverify,$selectedarea);
				if(empty($_SESSION['searchresult'])==true)
				{
					$_SESSION['filterbedroomnoempty']=1;
					header("location:SearchResult.php");
				}
				else
				{
					header("location:SearchResult.php");
				}
			}
			if(empty($_GET['filtermaximumprice'])==false && empty($_GET['filterverified'])==false)
			{
				$fmaxprice=$_GET['filtermaximumprice'];
				$fverify=$_GET['filterverified'];
				$fverify='Verified';
				$selectedarea=$_SESSION['selectedarea'];
				$_SESSION['searchresult']=searchwithpriceverifyfilter($fmaxprice,$fverify,$selectedarea);
				if(empty($_SESSION['searchresult'])==true)
				{
					$_SESSION['filterbedroomnoempty']=1;
					header("location:SearchResult.php");
				}
				else
				{
					header("location:SearchResult.php");
				}
			}
			if(empty($_GET['filterbedroomno'])==false && empty($_GET['filterwashroomno'])==false && empty($_GET['filtermaximumprice'])==false)
			{
				$fbedno=$_GET['filterbedroomno'];
				$fwashno=$_GET['filterwashroomno'];
				$fmaxprice=$_GET['filtermaximumprice'];
				$selectedarea=$_SESSION['selectedarea'];
				$_SESSION['searchresult']=searchwithbedwashpricefilter($fbedno,$fwashno,$fmaxprice,$selectedarea);
				if(empty($_SESSION['searchresult'])==true)
				{
					$_SESSION['filterbedroomnoempty']=1;
					header("location:SearchResult.php");
				}
				else
				{
					header("location:SearchResult.php");
				}
			}
			if(empty($_GET['filterbedroomno'])==false && empty($_GET['filterwashroomno'])==false && empty($_GET['filterverified'])==false)
			{
				$fbedno=$_GET['filterbedroomno'];
				$fwashno=$_GET['filterwashroomno'];
				$fverify=$_GET['filterverified'];
				$fverify='Verified';
				$selectedarea=$_SESSION['selectedarea'];
				$_SESSION['searchresult']=searchwithbedwashverifyfilter($fbedno,$fwashno,$fverify,$selectedarea);
				if(empty($_SESSION['searchresult'])==true)
				{
					$_SESSION['filterbedroomnoempty']=1;
					header("location:SearchResult.php");
				}
				else
				{
					header("location:SearchResult.php");
				}
			}
			if(empty($_GET['filterbedroomno'])==false && empty($_GET['filtermaximumprice'])==false && empty($_GET['filterverified'])==false)
			{
				$fbedno=$_GET['filterbedroomno'];
				$fmaxprice=$_GET['filtermaximumprice'];
				$fverify=$_GET['filterverified'];
				$fverify='Verified';
				$selectedarea=$_SESSION['selectedarea'];
				$_SESSION['searchresult']=searchwithbedpriceverifyfilter($fbedno,$fmaxprice,$fverify,$selectedarea);
				
				if(empty($_SESSION['searchresult'])==true)
				{
					$_SESSION['filterbedroomnoempty']=1;
					header("location:SearchResult.php");
				}
				else
				{
					header("location:SearchResult.php");
				}
			}
			if(empty($_GET['filterwashroomno'])==false && empty($_GET['filtermaximumprice'])==false && empty($_GET['filterverified'])==false)
			{
				$fwashno=$_GET['filterwashroomno'];
				$fmaxprice=$_GET['filtermaximumprice'];
				$fverify=$_GET['filterverified'];
				$fverify='Verified';
				$selectedarea=$_SESSION['selectedarea'];
				$_SESSION['searchresult']=searchwithbathpriceverifyfilter($fwashno,$fmaxprice,$fverify,$selectedarea);
				
				if(empty($_SESSION['searchresult'])==true)
				{
					$_SESSION['filterbedroomnoempty']=1;
					header("location:SearchResult.php");
				}
				else
				{
					header("location:SearchResult.php");
				}
			}
			if(empty($_GET['filterbedroomno'])==false && empty( $_GET['filterwashroomno'])==false && empty($_GET['filtermaximumprice'])==false && empty($_GET['filterverified'])==false)
			{
				$fbedno=$_GET['filterbedroomno'];
				$fwashno=$_GET['filterwashroomno'];
				$fmaxprice=$_GET['filtermaximumprice'];
				$fverify=$_GET['filterverified'];
				$fverify='Verified';
				$selectedarea=$_SESSION['selectedarea'];
				$_SESSION['searchresult']=searchwithallfilter($fbedno,$fwashno,$fmaxprice,$fverify,$selectedarea);
				
				if(empty($_SESSION['searchresult'])==true)
				{
					$_SESSION['filterbedroomnoempty']=1;
					header("location:SearchResult.php");
				}
				else
				{
					header("location:SearchResult.php");
				}
			}
		}
	}
	if(isset($_REQUEST['homefromsearch']))
	{
		// header('location:HomePage.php');
		// if($_REQUEST['homefromsearch']=="Home")
		// {
			
			$_SESSION['flag']=1;
			header('location:HomePage.php');
		// }
	}
	if(isset($_REQUEST["confirm"]))
	{
		$_SESSION['currentpass']=$_REQUEST['Currentpass'];
		$_SESSION['pass']=checkpass();
		if($_SESSION['pass']['Password']==$_REQUEST['Currentpass'])
		{
			$_SESSION['checkpassflag']=0;
			if(updatepass($_REQUEST['password'])==true)
			{
				$_SESSION['updatepassflag']=1;
			}
		}
		else
		{
			
		    $_SESSION['checkpassflag']=1;

		}
		 header('location:Changepass.php');
	}
	if(isset($_REQUEST["confirmmail"]))
	{
		$_SESSION['pass']=checkpass();
		$_SESSION['mail']=checkmail();
		if($_SESSION['pass']['Password']==$_REQUEST['currentpassword'])
		{
			if($_SESSION['mail']['Email']==$_REQUEST['Currentmail'])
			{
				$_SESSION['checkpassflag']=0;
				$_SESSION['checkmailflag']=0;
				if(updatemail($_REQUEST['newmail'])==true)
				{
					$_SESSION['updatemailflag']=1;
				}
			}
			else
			{
				$_SESSION['checkmailflag']=1;
			}
			
		}
		else
		{
			
		    $_SESSION['checkpassflag']=1;

		}
		header('location:Changemail.php');
	}
?>
