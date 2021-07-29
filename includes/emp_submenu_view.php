<?php $emp_id=$_GET['emp_id']; 

$emp_idx=$sess_empid;

?>

<table width="100%" border="0" class="table">
	<tr height="0%"><td><h4>
	<?php 
	if ($_GET['emp_id'] && !$sess_empid)
	{
	?>
	<a href="home.php?viewpostgraduate=viewpostgraduate&emp_id=<?php echo $emp_id; ?>">Basic Personal Information</a>
	<?php
   }
   elseif (!$_GET['emp_id'] && $sess_empid) 
   {
   ?>
	<a href="home.php?profile=profile">Basic Personal Information</a>
	<?php
   
   }
	?>
	
	</h4></td></tr>
	<tr><td><h4><a href="home.php?viewpassport=viewpassport&emp_id=<?php echo $emp_id; ?>">Personal Certification (Passport)</a></h4></td></tr>
	<tr><td><h4><a href="home.php?viewvisa=viewvisa&emp_id=<?php echo $emp_id; ?>">Personal Certification (Visa)</a></h4></td></tr>
	<tr><td><h4><a href="home.php?viewworkpermit=viewworkpermit&emp_id=<?php echo $emp_id; ?>">Personal Certification (Work Permit)</a></h4></td></tr>
	<tr><td><h4><a href="home.php?viewidcard=viewidcard&emp_id=<?php echo $emp_id; ?>">Personal Certification (Ident. Card)</a></h4></h4></td></tr>
	<tr><td><h4 ><a href="home.php?viewspecid=viewspecid&emp_id=<?php echo $emp_id; ?>">Personal Certification(SPECS ID)</a></h4></td></tr>
	<tr><td><h4><a href="home.php?viewedubg=viewedubg&emp_id=<?php echo $emp_id; ?>">Education Background</a></h4></td></tr>
	<tr><td><h4><a href="home.php?viewothertraining=viewothertraining&emp_id=<?php echo $emp_id; ?>">Other Training</a></h4></td></tr>
	<tr ><td><h4><a href="home.php?viewworkexperience=viewworkexperience&emp_id=<?php echo $emp_id; ?>">Work Experience</a></h4></td></tr>
	<tr><td><h4><a href="home.php?viewempcontract=viewempcontract&emp_id=<?php echo $emp_id; ?>">Employment Contract</a></h4></td></tr>
	<tr><td><h4><a href="home.php?viewsalarydet=viewsalarydet&emp_id=<?php echo $emp_id; ?>">Salary Details</a></h4></td></tr>
	<tr><td><h4><a href="home.php?viewcontdet=viewcontdet&emp_id=<?php echo $emp_id; ?>">Contact Details</a></h4></td></tr>
	<tr><td><h4><a href="home.php?viewfamilystatus=viewfamilystatus&emp_id=<?php echo $emp_id; ?>">Family Status</a></h4></td></tr>
	<tr><td><h4><a href="home.php?viewskillprofile=viewskillprofile&emp_id=<?php echo $emp_id; ?>">Skill Profile</a></h4></td></tr>
	<tr><td><h4><a href="home.php?viewprize=viewprize&emp_id=<?php echo $emp_id; ?>">Prize and Honour</a></h4></td></tr>
	
	
	</table>