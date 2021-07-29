<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

 $date_from=mysql_real_escape_string($_POST['date_from']);
 $date_to=mysql_real_escape_string($_POST['date_to']);
 $outreach_loc=mysql_real_escape_string($_POST['outreach_loc']);
 $remarks=mysql_real_escape_string($_POST['remarks']);
 $fuc_male=mysql_real_escape_string($_POST['fuc_male']);
 $fuc_female=mysql_real_escape_string($_POST['fuc_female']);
 $res_male=mysql_real_escape_string($_POST['res_male']);
 $res_female=mysql_real_escape_string($_POST['res_female']);
 $pat_male=mysql_real_escape_string($_POST['pat_male']);
 $pat_female=mysql_real_escape_string($_POST['pat_female']);
 $pat_child=mysql_real_escape_string($_POST['pat_child']);
 $remarks=mysql_real_escape_string($_POST['remarks']);
 
$sql= "insert into outreach_record values ('','$institution_id','$user_id','$date_from','$date_to','$outreach_loc',
'$fuc_male','$fuc_female','$res_male','$res_female','$pat_male','$pat_female','$pat_child',NOW())";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlupdt= "UPDATE diseases SET status='0'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());



$sqlsel="select * from outreach_record order by outreach_record_id desc limit 1";
$resultssel= mysql_query($sqlsel) or die ("Error $sqlsel.".mysql_error());
$rowssel=mysql_fetch_object($resultssel);

$lat_out_id=$rowssel->outreach_record_id;
 
//echo $lat_out_id;
 
 /*$diag_cat_male=mysql_real_escape_string($_POST['diag_cat_male']);
 $diag_cat_female=mysql_real_escape_string($_POST['diag_cat_female']);
 $diag_cat_child=mysql_real_escape_string($_POST['diag_cat_child']);
 
 $diag_glac_male=mysql_real_escape_string($_POST['diag_glac_male']);
 $diag_glac_female=mysql_real_escape_string($_POST['diag_glac_female']);
 $diag_glac_child=mysql_real_escape_string($_POST['diag_glac_child']);
 
 $diag_traum_male=mysql_real_escape_string($_POST['diag_traum_male']);
 $diag_traum_female=mysql_real_escape_string($_POST['diag_traum_female']);
 $diag_traum_child=mysql_real_escape_string($_POST['diag_traum_child']);
  
 $diag_corn_male=mysql_real_escape_string($_POST['diag_corn_male']);
 $diag_corn_female=mysql_real_escape_string($_POST['diag_corn_female']);
 $diag_corn_child=mysql_real_escape_string($_POST['diag_corn_child']);
 
 $diag_uve_male=mysql_real_escape_string($_POST['diag_uve_male']);
 $diag_uve_female=mysql_real_escape_string($_POST['diag_uve_female']);
 $diag_uve_child=mysql_real_escape_string($_POST['diag_uve_child']);  
 
 $diag_conj_male=mysql_real_escape_string($_POST['diag_conj_male']);
 $diag_conj_female=mysql_real_escape_string($_POST['diag_conj_female']);
 $diag_conj_child=mysql_real_escape_string($_POST['diag_conj_child']);
 
 $diag_refl_male=mysql_real_escape_string($_POST['diag_refl_male']);
 $diag_refl_female=mysql_real_escape_string($_POST['diag_refl_female']);
 $diag_refl_child=mysql_real_escape_string($_POST['diag_refl_child']);
 
 $diag_sq_male=mysql_real_escape_string($_POST['diag_sq_male']);
 $diag_sq_female=mysql_real_escape_string($_POST['diag_sq_female']);
 $diag_sq_child=mysql_real_escape_string($_POST['diag_sq_child']);
 
 
 
 $diag_other_male=mysql_real_escape_string($_POST['diag_other_male']);
 $diag_other_female=mysql_real_escape_string($_POST['diag_other_female']);
 $diag_other_child=mysql_real_escape_string($_POST['diag_other_child']);
 
$sqldiag= "insert into diagnosis values ('','$lat_out_id','$institution_id','$user_id','$date_from','$date_to','$diag_cat_male','$diag_cat_female',
'$diag_cat_child','$diag_glac_male','$diag_glac_female','$diag_glac_child','$diag_traum_male','$diag_traum_female','$diag_traum_child',
'$diag_corn_male','$diag_corn_female','$diag_corn_child','$diag_uve_male','$diag_uve_female','$diag_uve_child','$diag_conj_male',
'$diag_conj_female','$diag_conj_child','$diag_refl_male','$diag_refl_female','$diag_refl_child','$diag_sq_male','$diag_sq_female',
'$diag_sq_child','$diag_other_male','$diag_other_female','$diag_other_child')";
$resultsdiag= mysql_query($sqldiag) or die ("Error $sqldiag.".mysql_error());

 
 $serg_cat_male=mysql_real_escape_string($_POST['serg_cat_male']);
 $serg_cat_female=mysql_real_escape_string($_POST['serg_cat_female']);
 $serg_cat_child=mysql_real_escape_string($_POST['serg_cat_child']);
 
 $serg_traum_male=mysql_real_escape_string($_POST['serg_traum_male']);
 $serg_traum_female=mysql_real_escape_string($_POST['serg_traum_female']);
 $serg_traum_child=mysql_real_escape_string($_POST['serg_traum_child']);
 
 $minor_serg_male=mysql_real_escape_string($_POST['minor_serg_male']);
 $minor_serg_female=mysql_real_escape_string($_POST['minor_serg_female']);
 $minor_serg_child=mysql_real_escape_string($_POST['minor_serg_child']);
 
 $sqlserg= "insert into surgery values ('','$lat_out_id','$institution_id','$user_id','$date_from','$date_to','$serg_cat_male','$serg_cat_female','$serg_cat_child',
'$serg_traum_male','$serg_traum_female','$serg_traum_child','$minor_serg_male','$minor_serg_female','$minor_serg_child')";
$resultsserg= mysql_query($sqlserg) or die ("Error $sqlserg.".mysql_error());
 
 
 
 $blind_unilat=mysql_real_escape_string($_POST['blind_unilat']);
 $blind_bilat=mysql_real_escape_string($_POST['blind_bilat']);
 
$sqlblind= "insert into blindness values ('','$lat_out_id','$institution_id','$user_id','$date_from','$date_to','$blind_unilat','$blind_bilat')";
$resultsblind= mysql_query($sqlblind) or die ("Error $sqlblind.".mysql_error());
 
 
 
 $ref_male=mysql_real_escape_string($_POST['ref_male']);
 $ref_female=mysql_real_escape_string($_POST['ref_female']);
 $ref_child=mysql_real_escape_string($_POST['ref_child']);
 
$sqlref= "insert into refferal values ('','$lat_out_id','$institution_id','$user_id','$date_from','$date_to','$ref_male','$ref_female','$ref_child')";
$resultsref= mysql_query($sqlref) or die ("Error $sqlref.".mysql_error());
 
 



//$queryprof="select * from  benefits where benefit_type='$benefit_type' and benefit_name='$benefit_name' and benefit_amount='$benefit_amount' and taxable='$taxable'";
//$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
//$rowsprof=mysql_fetch_object($resultsprof);

//$numrowscomp=mysql_num_rows($resultsprof);
  //$f_namecomp=$rowsprof->f_name;
 //$l_namecomp=$rowsprof->l_name;
 //$emailcomp=$rowsprof->email;
 //$usernamecomp=$rowsprof->username;


//echo $u_pwrd;

//echo $u_cpwrd;

//echo $cus_fname;

//$realdob= dateconvert($dob, 1);
//$realdob = date('Y-m-d', strtotime($dob));
//if ($numrowscomp>0)

//{

//header ("Location:add_benefits.php? recordexist=1");

//}

//else 

//{



//$sql= "insert into post_grad_scholarship values ('','$institution_id','$user_id','$stud_fname','$gender','$nationality','$adm_year','$comp_year','$sponsor','$phone','$email')";
//$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


*/



header ("Location:home.php?outreach2=outreach2&outreach_record_id=$lat_out_id");

//}

//$results=mysql_query($sql) or die ("Error: $sql.".mysql_error());
//echo $results;
//$count=mysql_num_rows($results);
//echo $count;
/*if (==1)
{
session_start();
$_SESSION['admin']= $adminusern;
/*
session_register("myusername");
session_register("mypassword");*/
/*header("Location:membersarea.php");
}
else
{*/
//header ("Location:adduser.php? createuserconfirm=1");
//echo "<p align='center'><font color='#FF0000' size='-1'>Wrong Username and Password.</font></p>";


mysql_close($cnn);


?>


