<?php
 $project_id=$_GET['project_id'];
 $latest_alloc_id=$_GET['latest_alloc_id'];
if (isset($_POST['assign_project_settlement']))
{

assign_project_settlement($project_id);


}



 ?><?php //echo $project_id=$_GET['project_id'];?>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<!--<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>-->

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
table1
{
border-collapse:collapse;
}
.table1 td, tr
{
border:1px solid black;
padding:3px;
}

.table
{
border-collapse:collapse;
}

.table td, tr
{
border:1px solid black;
font-size:12px;
</Style>


<form name="emp" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">	

<?php 



?>		

<table align="center" width="80%" border="0" class="table1" >

<tr  align="center" bgcolor="#fff">	

<td colspan="3" height="50">

<?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:30px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Record Saved Successfully!!</font></strong></p></div>';
?>
</br>
<a href="home.php?assignproject=assignproject">Continue Assigning</a>


</td>  
  </tr>

	
	
	</table>
	

</form>

  
  
  
  </script>

<!--<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("emp");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("project_id","dontselect=0",">>Please select project");
 //frmvalidator.addValidation("project_name","req",">>Please enter sponsor name");
 
 
 
 
  </SCRIPT>-->
  
