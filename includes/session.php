<?php session_start();
if(!$_SESSION['user_id']){
		header("Location: index.php");
	}else{
		$user_id=$_SESSION['user_id'];
		$incharge=$_SESSION['incharge'];
		//$sess_location_id=$_SESSION['location_id'];
		$sess_country_id=$_SESSION['country_id'];
		$sess_area_id=$_SESSION['area_id'];
		$user_group_id= $_SESSION['user_group_id'];
		$sess_allow_add= $_SESSION['allow_add'];
		$sess_allow_view= $_SESSION['allow_view'];
		$sess_allow_edit= $_SESSION['allow_edit'];
		$sess_allow_delete= $_SESSION['allow_delete'];
	}

?>
<title>SEBA</title>