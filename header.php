<link rel="stylesheet" type="text/css" href="style.css" />
<div id="header">
<?php
$sess_incharge;

if($user_id=$_SESSION['user_id'])
    {
       ?>

<div style="width:900px; height:30px; float:right; margin-top:30px; color:#ffffff; font-size:11px;"> <p align="right">Hello, 

<?php  
$sqltc="select users.username,users.f_name,users.incharge,user_group.user_group_name
from users,user_group where users.user_group_id=user_group.user_group_id and users.user_id='$user_id'";
$resultstc= mysql_query($sqltc) or die ("Error $sqltv.".mysql_error());
$rowstc=mysql_fetch_object($resultstc); 
echo $rowstc->f_name;
$incharge=$rowstc->incharge;




?> &nbsp;(<?php 
echo $rowstc->user_group_name;

?>) <a href="home.php?profile=profile" style="color:green; font-weight:bold;">My Profile</a>| <a href="home.php?newpass=newpass" style="color:#fff; font-weight:bold;">Change Password </a>|<a href="logout.php" style="color:#ff0000; font-weight:bold;">Log Out</a></p>




</div>	   
	   
	   <?php 
	
	}
	
	else
	{
	
	}

?>





 </div>