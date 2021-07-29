<?php 
function display_landing_page()
{
 ?>

<div style="height:400px; margin:auto; width:1340px;">
<div style="width:1000px; height:400px; background: url(images/welcomeleft.jpg);margin:5px; float:left;" class="br-5">

<table width="100%" border="0" align="center" style="margin-left:10px;">
<tr>
<td colspan="5" height="40" align="center"><strong><font size="+1"></font></strong></td>

</tr>
<tr align="center">
<td><img src="images/users_process.png"></td>
<td></td>
<td><img src="images/settings.png"></a></td>
<td></td>
<td><img src="images/report.png"></a></td>
</tr>
<tr align="center">
<td style="font-weight:bold; color:#FF6600;">Access Level Control Management</a></td>
<td></td>
<td style="font-weight:bold; color:#FF6600;">System Settings</a></td>
<td></td>
<td style="font-weight:bold; color:#FF6600;">Spare Parts Inventory Management</a></td>
</tr>
<tr height="20">
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr align="center">
<td></td>
<td><img src="images/money.png"></a></td>
<td></td>
<td><img src="images/invoice.png"></a></td>
<td></td>
</tr>
<tr align="center">
<td></td>
<td style="font-weight:bold; color:#FF6600;">Job Cards Generation</a></td>
<td></td>
<td style="font-weight:bold; color:#FF6600;">Work Estimates Management</a></td>
<td></td>
</tr>
</table>



</div>
<div style="width:320px;background:#ff0000; height:400px; float:right; margin:5px; background: url(images/welcomeright.jpg); " class="br-5">

<table width="100%" border="0">
<?php 
$sqllog="SELECT * FROM audit_trails where user_id='$user_id' AND action LIKE '%Signed%' order by date_of_event desc limit 1,1";
$resultslog= mysql_query($sqllog) or die ("Error $sqllog.".mysql_error());
$rowslog=mysql_fetch_object($resultslog);


$sqllogin="SELECT * FROM users where islogged_in='1'";
$resultslogin= mysql_query($sqllogin) or die ("Error $sqllogin.".mysql_error());
$rowslogin=mysql_num_rows($resultslogin);

?>


				<tr ><td><p style="font:15px; color:#ff0000; font-weight:bold; margin:2px;">::Last Logged In : <?php echo $rowslog->date_of_event;  ?></p></td></tr>
								<tr><td><p style="font:15px; color:#ff0000; font-weight:bold; margin:2px;">::Online Users :<?php echo $rowslogin;?></p></td></tr>
			
				<tr><td><p style="font:15px; color:#ff0000; font-weight:bold; margin:2px;">::Today : <?php echo date('d-F-Y');?></p></td></tr>
				
				
				
				</table>




</div>
</div>
<?php 
}

?>


<?php
//////////////////////////////////////////start of display function
function display_submenu()
{
include ('includes/session.php');
if ($sess_allow_delete==1) {
$rdelete="<img src='images/delete.png'>";
$me="";
}
else
{$rdelete="";
$me="Operation NOT Allowed";

}
?>

<?php
$viewsubprojectdonor=$_GET['viewsubprojectdonor'];


$journalentry=$_GET['journalentry'];

$viewjournalentry=$_GET['viewjournalentry'];
$editjournalentry=$_GET['editjournalentry'];

$dropdowntitle=$_GET['dropdowntitle'];
$viewdropdowntitle=$_GET['viewdropdowntitle'];
$editdropdowntitle=$_GET['editdropdowntitle'];

$uploadhrforms=$_GET['uploadhrforms'];
$addformsections=$_GET['addformsections'];
$viewformsections=$_GET['viewformsections'];
$editformsections=$_GET['editformsections'];
$addformfields=$_GET['addformfields'];
$viewformfields=$_GET['viewformfields'];
$editformfields=$_GET['editformfields'];
$categorizeformfields=$_GET['categorizeformfields'];
$uncategorizeformfields=$_GET['uncategorizeformfields'];
$adddropdown=$_GET['adddropdown'];
$viewdropdown=$_GET['viewdropdown'];
$editdropdown=$_GET['editdropdown'];
$assigndropdown=$_GET['assigndropdown'];
$unassigndropdown=$_GET['unassigndropdown'];
$newstaff=$_GET['newstaff'];
$viewstaff=$_GET['viewstaff'];
$viewstaffhistory=$_GET['viewstaffhistory'];
$editstaff=$_GET['editstaff'];


$chart=$_GET['chart'];
$viewchart=$_GET['viewchart'];
$editchart=$_GET['editchart'];
$addaccounts=$_GET['addaccounts'];
$viewaccounts=$_GET['viewaccounts'];



$editsic=$_GET['editsic'];
$profile=$_GET['profile'];
$audittrails=$_GET['audittrails'];


$fixedasset=$_GET['fixedasset'];
$viewfixedasset=$_GET['viewfixedasset'];
$editfixedasset=$_GET['editfixedasset'];
$dispose=$_GET['dispose'];


$sharecapital=$_GET['sharecapital'];
$viewsharecapital=$_GET['viewsharecapital'];
$editsharecapital=$_GET['editsharecapital'];
$exitsharecapital=$_GET['exitsharecapital'];
$viewexitsharecapital=$_GET['viewexitsharecapital'];
$exitsharecapital2=$_GET['exitsharecapital2'];

$viewdividend=$_GET['viewdividend'];
$viewretained=$_GET['viewretained'];
$viewwithdrawn=$_GET['viewwithdrawn'];

$modules=$_GET['modules'];
$viewmodules=$_GET['viewmodules'];
$editmodules=$_GET['editmodules'];
$submodules=$_GET['submodules'];
$viewsubmodules=$_GET['viewsubmodules'];
$editsubmodules=$_GET['editsubmodules'];

$modulesusergroup=$_GET['modulesusergroup'];
$viewmodulesusergroup=$_GET['viewmodulesusergroup'];
$editmodulesusergroup=$_GET['editmodulesusergroup'];
$assignsubmodule=$_GET['assignsubmodule'];
$viewassignsubmodule=$_GET['viewassignsubmodule'];
$editassignsubmodule=$_GET['editassignsubmodule'];
$usergroupsm=$_GET['usergroupsm'];
$viewusergroupsm=$_GET['viewusergroupsm'];



$users=$_GET['users'];
$viewusers=$_GET['viewusers'];
$editusers=$_GET['editusers'];
$resetpassword=$_GET['resetpassword'];
$resetpass2=$_GET['resetpass2'];


$generalledger=$_GET['generalledger'];
$editgeneralledger=$_GET['editgeneralledger'];

$cashledger=$_GET['cashledger'];
$editcashledger=$_GET['editcashledger'];

$expensesledger=$_GET['expensesledger'];
$editexpensesledger=$_GET['editexpensesledger'];

$arledger=$_GET['arledger'];
$editarledger=$_GET['editarledger'];

$apledger=$_GET['apledger'];
$editapledger=$_GET['editapledger'];

$faledger=$_GET['faledger'];
$editfaledger=$_GET['editfaledger'];

$serviceledger=$_GET['serviceledger'];
$editserviceledger=$_GET['editserviceledger'];

$tpla=$_GET['tpla'];
$editserviceledger=$_GET['editserviceledger'];

$balancesheet=$_GET['balancesheet'];
$editbalancesheet=$_GET['editbalancesheet'];

$workpermitrenewals=$_GET['workpermitrenewals'];
$viewworkpermitrenewals=$_GET['viewworkpermitrenewals'];
$editworkpermitrenewals=$_GET['editworkpermitrenewals'];
$reneworkpermit2=$_GET['reneworkpermit2'];
$viewworkpermitrenewals=$_GET['viewworkpermitrenewals'];


$visarenewals=$_GET['visarenewals'];
$viewvisarenewals=$_GET['viewvisarenewals'];
$editvisarenewals=$_GET['editvisarenewals'];
$renewvisa2=$_GET['renewvisa2'];


$processinterflight=$_GET['processinterflight'];
$viewprocessinterflight=$_GET['viewprocessinterflight'];
$editprocessinterflight=$_GET['editprocessinterflight'];

$processnatflight=$_GET['processnatflight'];
$viewprocessnatflight=$_GET['viewprocessnatflight'];
$editprocessnatflight=$_GET['editinterprocessnatflight'];

$processgenflight=$_GET['processgenflight'];
$viewprocessgenflight=$_GET['viewprocessgenflight'];
$editprocessgenflight=$_GET['editprocessgenflight'];


$subconinvoices=$_GET['subconinvoices'];
$viewsubconinvoices=$_GET['viewsubconinvoices'];
$editsubconinvoices=$_GET['editsubconinvoices'];

$subconinvoicestoclient=$_GET['subconinvoicestoclient'];
$viewsubconinvoicestoclient=$_GET['viewsubconinvoicestoclient'];
$editsubconinvoicestoclient=$_GET['editsubconinvoicestoclient'];
$receivesubconpay=$_GET['receivesubconpay'];
$paysubcon=$_GET['paysubcon'];
$recordpaysubcon=$_GET['recordpaysubcon'];
$recordsubcontoclientpayment=$_GET['recordsubcontoclientpayment'];


$initiateproject=$_GET['initiateproject'];
$viewprojects=$_GET['viewprojects'];
$editproject=$_GET['editproject'];

$stafftoprojects=$_GET['stafftoprojects'];
$viewstafftoprojects=$_GET['viewstafftoprojects'];
$editstafftoprojects=$_GET['editstafftoprojects'];

$rotatestaff=$_GET['rotatestaff'];
$viewrotatestaff=$_GET['viewrotatestaff'];
$editrotatestaff=$_GET['editrotatestaff'];


$stafftimesheet=$_GET['stafftimesheet'];
$viewstafftimesheet=$_GET['viewstafftimesheet'];
$viewstafftimesheet1=$_GET['viewstafftimesheet1'];
$editstafftimesheet=$_GET['editstafftimesheet'];

$adminviewstafftimesheet1=$_GET['adminviewstafftimesheet1'];
$adminviewstafftimesheet=$_GET['adminviewstafftimesheet'];


$prepostgraduate=$_GET['prepostgraduate'];
$staffdet=$_GET['staffdet'];
$basicinfo=$_GET['basicinfo'];
$passport=$_GET['passport'];
$viewpassport=$_GET['viewpassport'];
$viewvisa=$_GET['viewvisa'];
$visa=$_GET['visa'];
$workpermit=$_GET['workpermit'];
$viewworkpermit=$_GET['viewworkpermit'];
$idcard=$_GET['idcard'];
$viewidcard=$_GET['viewidcard'];
$specid=$_GET['specid'];
$viewspecid=$_GET['viewspecid'];
$edubg=$_GET['edubg'];
$viewedubg=$_GET['viewedubg'];
$othertraining=$_GET['othertraining'];
$viewothertraining=$_GET['viewothertraining'];
$workexperience=$_GET['workexperience'];
$viewworkexperience=$_GET['viewworkexperience'];
$empcontract=$_GET['empcontract'];
$viewempcontract=$_GET['viewempcontract'];
$salarydet=$_GET['salarydet'];
$viewsalarydet=$_GET['viewsalarydet'];
$contdet=$_GET['contdet'];
$viewcontdet=$_GET['viewcontdet'];
$familystatus=$_GET['familystatus'];
$viewfamilystatus=$_GET['viewfamilystatus'];
$skillprofile=$_GET['skillprofile'];
$viewskillprofile=$_GET['viewskillprofile'];
$prize=$_GET['prize'];
$viewprize=$_GET['viewprize'];
$editphoto=$_GET['editphoto'];
$terminatestaff=$_GET['terminatestaff'];
$viewterminatedstaff=$_GET['viewterminatedstaff'];






$emp_id=$_GET['emp_id'];
$processpayroll=$_GET['processpayroll'];
$processpayroll2=$_GET['processpayroll2'];
$viewpayroll=$_GET['viewpayroll'];

$editpayroll=$_GET['editpayroll'];
$viewpayslip=$_GET['viewpayslip'];
$payrollreport=$_GET['payrollreport'];
$cancelpayroll=$_GET['cancelpayroll'];
$payrollreportssp=$_GET['payrollreportssp'];
$bnprocesspayroll=$_GET['bnprocesspayroll'];
$payrollsettings=$_GET['payrollsettings'];
$viewpayrollsettings=$_GET['viewpayrollsettings'];
$edittaxblock=$_GET['edittaxblock'];
$batchpayroll=$_GET['batchpayroll'];

$adminpayrollreport=$_GET['adminpayrollreport'];
$adminviewpayroll=$_GET['adminviewpayroll'];
$adminviewpayslip=$_GET['adminviewpayslip'];
$adminpayrollreport=$_GET['adminpayrollreport'];
$adminpayrollreportssp=$_GET['adminpayrollreportssp'];



$processexppayroll=$_GET['processexppayroll'];
$processexppayroll2=$_GET['processexppayroll2'];
$viewexppayroll=$_GET['viewexppayroll'];
$editexppayroll=$_GET['editexppayroll'];
$viewexppayslip=$_GET['viewexppayslip'];

$cancelexppayroll=$_GET['cancelexppayroll'];
$payrollexpreport=$_GET['payrollexpreport'];
$payrollexpreportssp=$_GET['payrollexpreportssp'];
$bnprocessexppayroll=$_GET['bnprocessexppayroll'];
$adminpayrollexpreport=$_GET['adminpayrollexpreport'];


$adminpayrollexpreport=$_GET['adminpayrollexpreport'];
$adminviewexppayroll=$_GET['adminviewexppayroll'];
$adminviewexppayslip=$_GET['adminviewexppayslip'];
$adminpayrollexpreport=$_GET['adminpayrollexpreport'];
$adminpayrollexpreportssp=$_GET['adminpayrollexpreportssp'];



$pettycash=$_GET['pettycash'];
$viewpettycashexpenses=$_GET['viewpettycashexpenses'];
$editpettycashexpenses=$_GET['editpettycashexpenses'];
$pettycashfund=$_GET['pettycashfund'];
$viewpettycashfund=$_GET['viewpettycashfund'];
$editpettycashfund=$_GET['editpettycashfund'];
$viewpettycashledger=$_GET['viewpettycashledger'];


$income=$_GET['income'];
$viewincome=$_GET['viewincome'];
$editincome=$_GET['editincome'];

$expenses=$_GET['expenses'];
$viewexpenses=$_GET['viewexpenses'];
$editexpenses=$_GET['editexpenses'];


$nhifrates=$_GET['nhifrates'];
$viewnhifrates=$_GET['viewnhifrates'];
$editnhifrates=$_GET['editnhifrates'];
$editsic=$_GET['editsic'];

$paye=$_GET['paye'];
$viewpaye=$_GET['viewpaye'];
$editpaye=$_GET['editpaye'];

$benefitded=$_GET['benefitded'];
$viewbenefitded=$_GET['viewbenefitded'];
$editbenefitded=$_GET['editbenefitded'];
$deduction=$_GET['deduction'];
$viewdeduction=$_GET['viewdeduction'];

$loansav=$_GET['loansav'];
$viewloansav=$_GET['viewloansav'];
$editloansav=$_GET['editloansav'];
$savings=$_GET['savings'];
$viewsavings=$_GET['viewsavings'];


$titlelocation=$_GET['titlelocation'];
$viewtitlelocation=$_GET['viewtitlelocation'];
$edittitlelocation=$_GET['edittitlelocation'];
$assignexperts=$_GET['assignexperts'];
$assignexperts2=$_GET['assignexperts2'];
$assignlocals=$_GET['assignlocals'];
$assignlocals2=$_GET['assignlocals2'];
$viewassignexperts=$_GET['viewassignexperts'];
$editassignexperts=$_GET['editassignexperts'];
$assignlocals=$_GET['assignlocals'];
$viewassignlocals=$_GET['viewassignlocals'];
$editassignlocals=$_GET['editassignlocals'];


$omjobtitles=$_GET['omjobtitles'];
$viewomjobtitles=$_GET['viewomjobtitles'];
$editomjobtitles=$_GET['editomjobtitles'];
$omrates=$_GET['omrates'];
$viewomrates=$_GET['viewomrates'];
$editomrates=$_GET['editomrates'];
$omlocations=$_GET['omlocations'];
$viewomlocations=$_GET['viewomlocations'];
$editomlocations=$_GET['editomlocations'];
$omconsultants=$_GET['omconsultants'];
$editsubcon=$_GET['editsubcon'];
$viewomconsultants=$_GET['viewomconsultants'];
$editomconsultants=$_GET['editomconsultants'];
$omclients=$_GET['omclients'];
$viewomclients=$_GET['viewomclients'];
$editomclients=$_GET['editomclients'];
$omstaff=$_GET['omstaff'];
$viewomstaff=$_GET['viewomstaff'];
$editomstaff=$_GET['editomstaff'];
$assingomstaff=$_GET['assingomstaff'];
$viewassingomstaff=$_GET['viewassingomstaff'];
$deletestafftoprojects=$_GET['deletestafftoprojects'];


$subconrate=$_GET['subconrate'];
$viewsubconrate=$_GET['viewsubconrate'];
$editsubconrate=$_GET['editsubconrate'];



$preinvoice2=$_GET['preinvoice2'];
$invoice2=$_GET['invoice2'];
$viewinvoices=$_GET['viewinvoices'];
$generateinvoice=$_GET['generateinvoice'];
$receivepay=$_GET['receivepay'];
$recordpayment=$_GET['recordpayment'];
$viewpendingstaff=$_GET['viewpendingstaff'];
$perdm=$_GET['perdm'];
$viewperdm=$_GET['viewperdm'];
$editperdm=$_GET['editperdm'];
$recorddata=$_GET['recorddata']; 
$adminoutreach2=$_GET['adminoutreach2'];
$editgroup=$_GET['editgroup'];
$outreach=$_GET['outreach'];
$outreach2=$_GET['outreach2'];
$editoutreach=$_GET['editoutreach'];
$postgraduate=$_GET['postgraduate'];
$editpostgraduate=$_GET['editpostgraduate'];
$cdp=$_GET['cdp'];
$editcpd=$_GET['editcpd'];
$subspeciality=$_GET['subspeciality'];
$editsubspeciality=$_GET['editsubspeciality'];
$logout=$_GET['logout'];
$monitor=$_GET['monitor'];

$normal=$_GET['normal'];
$viewpostgraduate=$_GET['viewpostgraduate'];
$viewoutreach=$_GET['viewoutreach'];
$viewcdp=$_GET['viewcdp'];
$cpdreport=$_GET['cpdreport'];
$addcpdreport=$_GET['addcpdreport'];
$admineditcpd=$_GET['admineditcpd'];
$viewsubspeciality=$_GET['viewsubspeciality'];
$access=$_GET['access'];
$settings=$_GET['settings'];
$reports=$_GET['reports'];
$newuser=$_GET['newuser'];

$usergroups=$_GET['usergroups']; 
$newsponsor=$_GET['newsponsor'];
$viewsponsor=$_GET['viewsponsor'];

//$viewuniversity=$_GET['viewuniversity'];
$newinstitute=$_GET['newinstitute'];
$viewinstitute=$_GET['viewinstitute'];
$reports=$_GET['reports'];
$outreachreport=$_GET['outreachreport'];
$addoutreachreport=$_GET['addoutreachreport'];
$admineditoutreach=$_GET['admineditoutreach'];
$postgraduatereport=$_GET['postgraduatereport'];
$addpostgraduatereport=$_GET['addpostgraduatereport']; 
$admineditpostgraduate=$_GET['admineditpostgraduate'];
$subspecialityreport=$_GET['subspecialityreport'];
$addsubspecialityreport=$_GET['addsubspecialityreport'];
$admineditsubspeciality=$_GET['admineditsubspeciality'];
$newpass=$_GET['newpass'];
$detailoutreach=$_GET['detailoutreach'];
$edituser=$_GET['edituser'];
$editsponsor=$_GET['editsponsor'];
$editinstoffer=$_GET['editinstoffer'];

//////////current get statement for griffins
//Donors
$edituniversity=$_GET['edituniversity'];
$newunivesity=$_GET['newunivesity'];
$viewuniversity=$_GET['viewuniversity'];
$projectdonor=$_GET['projectdonor'];
$viewprojectdonor=$_GET['viewprojectdonor'];

//countries
$viewhrforms=$_GET['viewhrforms'];
$viewcountries=$_GET['viewcountries'];
$editcountry=$_GET['editcountry'];



//Implememtation Areas
$newsponsor=$_GET['newsponsor'];
$viewsponsor=$_GET['viewsponsor'];
$editarea=$_GET['editarea'];

//Location
$perdm=$_GET['perdm'];
$viewlocation=$_GET['viewlocation'];
$editlocation=$_GET['editlocation'];

//Settlement
$perdm=$_GET['perdm'];
$viewsettlements=$_GET['viewsettlements'];
$editsettlements=$_GET['editsettlements'];

//setting up submission period 
$submission_period=$_GET['submission_period'];
$view_submission_period=$_GET['view_submission_period'];
$edit_submission_period=$_GET['edit_submission_period'];

//setting up template
$setuptemplate1=$_GET['setuptemplate1'];
$setuptemplate=$_GET['setuptemplate'];
$viewsetuptemplate=$_GET['viewsetuptemplate'];
$replicatesetuptemplate=$_GET['replicatesetuptemplate'];
$editsetuptemplate=$_GET['editsetuptemplate'];

//submit bioweekly data
$submit_biweekly=$_GET['submit_biweekly'];
$submit_biweekly2=$_GET['submit_biweekly2'];
$view_biweekly=$_GET['view_biweekly'];


//bioweely report
$countryreport=$_GET['countryreport'];
$areareport=$_GET['areareport'];
$locationreport=$_GET['locationreport'];
$settlementreport=$_GET['settlementreport'];

//periodic complete
$countryreportc=$_GET['countryreportc'];
$areareportc=$_GET['areareportc'];
$locationreportc=$_GET['locationreportc'];
$settlementreportc=$_GET['settlementreportc'];

//audit trails
$audittrails=$_GET['audittrails'];


/// PETER KYALO DIFINED VARIABLES
///PETER KYALO CODES
//projects
$editproject=$_GET['editproject'];
$addproject=$_GET['addproject'];
$viewproject=$_GET['viewproject'];
$assignproject=$_GET['assignproject'];
$assignprojectarea=$_GET['assignprojectarea'];
$assignprojectlocation=$_GET['assignprojectlocation'];
$assignprojectsettlement=$_GET['assignprojectsettlement'];
$assignprojectend=$_GET['assignprojectend'];

$viewprojectcountry=$_GET['viewprojectcountry'];
$viewprojectarea=$_GET['viewprojectarea'];
$viewprojectlocation=$_GET['viewprojectlocation'];
$viewprojectsettlement=$_GET['viewprojectsettlement'];

//competency
$editcompetency=$_GET['editcompetency'];
$addcompetency=$_GET['addcompetency'];
$viewcompetency=$_GET['viewcompetency'];
//subproject
$editsubproject=$_GET['editsubproject'];
$addsubproject=$_GET['addsubproject'];
$viewsubproject=$_GET['viewsubproject'];

$assignsubproject=$_GET['assignsubproject'];
$assignsubprojectarea=$_GET['assignsubprojectarea'];
$assignsubprojectlocation=$_GET['assignsubprojectlocation'];
$assignsubprojectsettlement=$_GET['assignsubprojectsettlement'];
$assignsubprojectend=$_GET['assignsubprojectend'];

$viewsubprojectcountry=$_GET['viewsubprojectcountry'];
$viewsubprojectarea=$_GET['viewsubprojectarea'];
$viewsubprojectlocation=$_GET['viewsubprojectlocation'];
$viewsubprojectsettlement=$_GET['viewsubprojectsettlement'];
// END OF PETER KYALO DEFINED VARIABLES

//Usergroups
$newusergroup=$_GET['newusergroup']; 

////////////////////////////code block for biweekly report
//call for add bi weekly report
if ($countryreport==countryreport)
{
?>
<div id="submenu">
<a href="home.php?countryreport=countryreport">View Country Level Report</a>|
<a href="home.php?areareport=areareport">View Area Level Report</a>|
<a href="home.php?locationreport=locationreport">View Location Level Report</a>|
<!--<a href="home.php?settlementreport=settlementreport">View Settlement Level Report</a>|-->
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">Bi Weekly Report:: View Country Level Report</h1>
<?php
include ('country_report.php');
} else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}

if ($areareport==areareport)
{
?>
<div id="submenu">
<a href="home.php?countryreport=countryreport">View Country Level Report</a>|
<a href="home.php?areareport=areareport">View Area Level Report</a>|
<a href="home.php?locationreport=locationreport">View Location Level Report</a>|
<!--<a href="home.php?settlementreport=settlementreport">View Settlement Level Report</a>|-->
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">Bi Weekly Report:: View Area Level Report</h1>
<?php
include ('area_report.php');
} else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}


//call for add
if ($locationreport==locationreport)
{
?>
<div id="submenu">
<a href="home.php?countryreport=countryreport">View Country Level Report</a>|
<a href="home.php?areareport=areareport">View Area Level Report</a>|
<a href="home.php?locationreport=locationreport">View Location Level Report</a>|
<!--<a href="home.php?settlementreport=settlementreport">View Settlement Level Report</a>|-->
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">Bi Weekly Report:: View Settlement Level Report</h1>
<?php
include ('location_report.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}
//call for edit
if($settlementreport=='settlementreport')
{
?>
<div id="submenu">
<a href="home.php?countryreport=countryreport">View Country Level Report</a>|
<a href="home.php?areareport=areareport">View Area Level Report</a>|
<a href="home.php?locationreport=locationreport">View Location Level Report</a>|
<!--<a href="home.php?settlementreport=settlementreport">View Settlement Level Report</a>|-->
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">Bi Weekly Report:: View Settlement Level Report</h1>
<?php
include ('settlement_report.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}
//call for add Complete Projects
if ($countryreportc==countryreportc)
{
?>
<div id="submenu">
<a href="home.php?countryreportc=countryreportc">View Country Level Report</a>|
<a href="home.php?areareportc=areareportc">View Area Level Report</a>|
<a href="home.php?locationreportc=locationreportc">View Location Level Report</a>|
<!--<a href="home.php?settlementreport=settlementreport">View Settlement Level Report</a>|-->
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">Complete Projects:: View Country Level Report</h1>
<?php
include ('country_reportc.php');
} else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}

if ($areareportc==areareportc)
{
?>
<div id="submenu">
<a href="home.php?countryreportc=countryreportc">View Country Level Report</a>|
<a href="home.php?areareportc=areareportc">View Area Level Report</a>|
<a href="home.php?locationreportc=locationreportc">View Location Level Report</a>|
<!--<a href="home.php?settlementreport=settlementreport">View Settlement Level Report</a>|-->
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">Complete Projects:: View Area Level Report</h1>
<?php
include ('area_reportc.php');
} else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}


//call for add
if ($locationreportc==locationreportc)
{
?>
<div id="submenu">
<a href="home.php?countryreportc=countryreportc">View Country Level Report</a>|
<a href="home.php?areareportc=areareportc">View Area Level Report</a>|
<a href="home.php?locationreportc=locationreportc">View Location Level Report</a>|
<!--<a href="home.php?settlementreport=settlementreport">View Settlement Level Report</a>|-->
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">Complete Projects:: View Settlement Level Report</h1>
<?php
include ('location_reportc.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}
//call for edit
if($settlementreportc=='settlementreportc')
{
?>
<div id="submenu">
<a href="home.php?countryreportc=countryreportc">View Country Level Report</a>|
<a href="home.php?areareportc=areareportc">View Area Level Report</a>|
<a href="home.php?locationreportc=locationreportc">View Location Level Report</a>|
<!--<a href="home.php?settlementreport=settlementreport">View Settlement Level Report</a>|-->
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">Complete Projects:: View Settlement Level Report</h1>
<?php
include ('settlement_reportc.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}
//////////////////////////////////////////end of weekly report


////////////////////////////code block for submit weekly data
//call for add bi weekly report
if ($submit_biweekly==submit_biweekly)
{
?>
<div id="submenu">
<a href="home.php?submit_biweekly=submit_biweekly">Submit Bi-Weekly Reports</a>|
<a href="home.php?view_biweekly=view_biweekly">View All Submited Bi-Weekly Reports</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Submit Bi-Weekly Reports</h1>
<?php
include ('submit_biweekly.php');
} else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}

if ($submit_biweekly2==submit_biweekly2)
{
?>
<div id="submenu">
<a href="home.php?submit_biweekly=submit_biweekly">Submit Bi-Weekly Reports</a>|
<a href="home.php?view_biweekly=view_biweekly">View All Submited Bi-Weekly Reports</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Submit Bi-Weekly Reports</h1>
<?php
include ('submit_biweekly2.php');
} else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}

if ($view_biweekly==view_biweekly)
{
?>
<div id="submenu">
<a href="home.php?submit_biweekly=submit_biweekly">Submit Bi-Weekly Reports</a>|
<a href="home.php?view_biweekly=view_biweekly">View All Submited Bi-Weekly Reports</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Submit Bi-Weekly Reports</h1>
<?php
include ('view_biweekly.php');
} else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}


/*//call for add
if ($newunivesity==newunivesity)
{
?>
<div id="submenu">
<a href="home.php?newunivesity=newunivesity">Add New Donor </a>|
<a href="home.php?viewuniversity=viewuniversity">View All Donors</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Creating New Donor</h1>
<?php
include ('add_university.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}
//call for edit
if($edituniversity=='edituniversity')
{
?>
<div id="submenu">
<a href="home.php?newunivesity=newunivesity">Add New Donor </a>|
<a href="home.php?viewuniversity=viewuniversity">View All Donors</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Creating New Donor</h1>
<?php
include ('edit_university.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}*/
//////////////////////////////////////////end of submit weekly data

////////////////////////////code block for donors
//call for view
if ($viewuniversity==viewuniversity)
{
?>
<div id="submenu">
<a href="home.php?newunivesity=newunivesity">Add New Make </a>|
<a href="home.php?viewuniversity=viewuniversity">View All Makes</a>|
<!--<a href="home.php?projectdonor=projectdonor">Assign Projects To Donor </a>|
<a href="home.php?viewprojectdonor=viewprojectdonor">View Assigned Projects To Donor</a>|
<a href="home.php?viewsubprojectdonor=viewsubprojectdonor">View Assigned Sub-Projects To Donor</a>|-->
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">Creating New Vehicle Make</h1>
<?php
include ('viewsuniversity.php');
} else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}
//call for add
if ($newunivesity==newunivesity)
{
?>
<div id="submenu">
<a href="home.php?newunivesity=newunivesity">Add New Make </a>|
<a href="home.php?viewuniversity=viewuniversity">View All Makes</a>|
<!--<a href="home.php?projectdonor=projectdonor">Assign Projects To Donor </a>|
<a href="home.php?viewprojectdonor=viewprojectdonor">View Assigned Projects To Donor</a>|
<a href="home.php?viewsubprojectdonor=viewsubprojectdonor">View Assigned Sub-Projects To Donor</a>|-->
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Creating New Vehicle Make</h1>
<?php
include ('add_university.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}
//call for edit
if($edituniversity=='edituniversity')
{
?>
<div id="submenu">
<a href="home.php?newunivesity=newunivesity">Add New Make </a>|
<a href="home.php?viewuniversity=viewuniversity">View All Makes</a>|
<!--<a href="home.php?projectdonor=projectdonor">Assign Projects To Donor </a>|
<a href="home.php?viewprojectdonor=viewprojectdonor">View Assigned Projects To Donor</a>|
<a href="home.php?viewsubprojectdonor=viewsubprojectdonor">View Assigned Sub-Projects To Donor</a>|-->
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Updating Vehicle Make</h1>
<?php
include ('edit_university.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}


if($projectdonor=='projectdonor')
{
?>
<div id="submenu">
<a href="home.php?newunivesity=newunivesity">Add New Make </a>|
<a href="home.php?viewuniversity=viewuniversity">View All Makes</a>|
<!--<a href="home.php?projectdonor=projectdonor">Assign Projects To Donor </a>|
<a href="home.php?viewprojectdonor=viewprojectdonor">View Assigned Projects To Donor</a>|
<a href="home.php?viewsubprojectdonor=viewsubprojectdonor">View Assigned Sub-Projects To Donor</a>|-->
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Assigning Projects To Donor</h1>
<?php
include ('projectdonor.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}


if($viewprojectdonor=='viewprojectdonor')
{
?>
<div id="submenu">
<a href="home.php?newunivesity=newunivesity">Add New Make </a>|
<a href="home.php?viewuniversity=viewuniversity">View All Makes</a>|
<!--<a href="home.php?projectdonor=projectdonor">Assign Projects To Donor </a>|
<a href="home.php?viewprojectdonor=viewprojectdonor">View Assigned Projects To Donor</a>|
<a href="home.php?viewsubprojectdonor=viewsubprojectdonor">View Assigned Sub-Projects To Donor</a>|-->
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings::View Assigned Projects To Donor</h1>
<?php
include ('viewprojectdonor.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}

if($viewsubprojectdonor=='viewsubprojectdonor')
{
?>
<div id="submenu">
<a href="home.php?newunivesity=newunivesity">Add New Make </a>|
<a href="home.php?viewuniversity=viewuniversity">View All Makes</a>|
<!--<a href="home.php?projectdonor=projectdonor">Assign Projects To Donor </a>|
<a href="home.php?viewprojectdonor=viewprojectdonor">View Assigned Projects To Donor</a>|
<a href="home.php?viewsubprojectdonor=viewsubprojectdonor">View Assigned Sub-Projects To Donor</a>|-->
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings::View Assigned Sub Projects To Donor</h1>
<?php
include ('viewsubprojectdonor.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}
//////////////////////////////////////////end of donorblock

////////////////////////////code block for set up report period
//call for view
if ($view_submission_period==view_submission_period)
{
?>
<div id="submenu">
<a href="home.php?submission_period=submission_period">Add Submission Period</a>|
<a href="home.php?view_submission_period=view_submission_period">View Submission Period</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: View Donor</h1>
<?php
include ('view_submission_period.php');
} else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}
//call for add
if ($submission_period==submission_period)
{
?>
<div id="submenu">
<a href="home.php?submission_period=submission_period">Add Submission Period</a>|
<a href="home.php?view_submission_period=view_submission_period">View Submission Period</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Creating New Submission Period</h1>
<?php
include ('add_submission_period.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}
//call for edit
if($edit_submission_period=='edit_submission_period')
{
?>
<div id="submenu">
<a href="home.php?submission_period=submission_period">Add Submission Period</a>|
<a href="home.php?view_submission_period=view_submission_period">View Submission Period</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Update Submission Period</h1>
<?php
include ('edit_submission_period.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}
//////////////////////////////////////////end of report period


////////////////////////////code block for countries
//call for view
if ($viewcountries==viewcountries)
{
?>
<div id="submenu">
<a href="home.php?viewhrforms=viewhrforms">Add New Country </a>|
<a href="home.php?viewcountries=viewcountries">View All Countries</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">Access  Control:: List Of All Countries</h1>
<?php
include ('viewcountries.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}
//call for add

//call for edit
if($editcountry=='editcountry')
{
?>
<div id="submenu">
<a href="home.php?viewhrforms=viewhrforms">Add New Country </a>|
<a href="home.php?viewcountries=viewcountries">View All Countries</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Updating Country Details</h1>
<?php
include ('edit_country.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}


}
//////////////////////////////////////////end of countries


////////////////////////////code block for usergroup
//call for view
if ($usergroups==usergroups)
{
?>
<div id="submenu">
<a href="home.php?newusergroup=newusergroup">Add User Group </a>|
<a href="home.php?usergroups=usergroups">View All User Groups</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">Access Control :: List of All User Groups</h1>
<?php
include ('viewusergroups.php');
} else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}
//call for add
if ($newusergroup==newusergroup)
{
?>
<div id="submenu">
<a href="home.php?newusergroup=newusergroup">Add User Group </a>|
<a href="home.php?usergroups=usergroups">View All User Groups</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">Access  Control:: Creating New User Group</h1>
<?php
include ('add_user_group.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}
//call for edit
if($editgroup=='editgroup')
{
?>
<div id="submenu">
<a href="home.php?newusergroup=newusergroup">Add User Group </a>|
<a href="home.php?usergroups=usergroups">View All User Groups</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Updating User group Details</h1>
<?php
include ('edit_user_group.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}


}
//////////////////////////////////////////end of usergroups


////////////////////////////code block for modules
//call for view
if ($viewmodules==viewmodules)
{
?>
<div id="submenu">
<a href="home.php?modules=modules">Add Module</a>|
<a href="home.php?viewmodules=viewmodules">View All Modules</a>|
<a href="home.php?submodules=submodules">Add SubModule</a>|
<a href="home.php?viewsubmodules=viewsubmodules">View SubModule</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">Access Control: View Module</h1>
<?php
include ('viewmodules.php');
} else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}
//call for add
if ($modules==modules)
{
?>
<div id="submenu">
<a href="home.php?modules=modules">Add Module</a>|
<a href="home.php?viewmodules=viewmodules">View All Modules</a>|
<a href="home.php?submodules=submodules">Add SubModule</a>|
<a href="home.php?viewsubmodules=viewsubmodules">View SubModule</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">Access  Control:: Creating New Module</h1>
<?php
include ('add_module.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}
//call for edit
if($editmodules=='editmodules')
{
?>
<div id="submenu">
<a href="home.php?modules=modules">Add Module</a>|
<a href="home.php?viewmodules=viewmodules">View All Modules</a>|
<a href="home.php?submodules=submodules">Add SubModule</a>|
<a href="home.php?viewsubmodules=viewsubmodules">View SubModule</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Updating Modules Details</h1>
<?php
include ('edit_modules.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}


}
//////////////////////////////////////////end of modules

////////////////////////////code block for sub modules
//call for view
if ($viewsubmodules==viewsubmodules)
{
?>
<div id="submenu">
<a href="home.php?modules=modules">Add Module</a>|
<a href="home.php?viewmodules=viewmodules">View All Modules</a>|
<a href="home.php?submodules=submodules">Add SubModule</a>|
<a href="home.php?viewsubmodules=viewsubmodules">View SubModule</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">Access Control: View Lists Of SubModule</h1>
<?php
include ('viewsubmodules.php');
} else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}
//call for add
if ($submodules==submodules)
{
?>
<div id="submenu">
<a href="home.php?modules=modules">Add Module</a>|
<a href="home.php?viewmodules=viewmodules">View All Modules</a>|
<a href="home.php?submodules=submodules">Add SubModule</a>|
<a href="home.php?viewsubmodules=viewsubmodules">View SubModule</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">Access  Control:: Creating New Submodule</h1>
<?php
include ('add_submodule.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}
//call for edit
if($editsubmodules=='editsubmodules')
{
?>
<div id="submenu">
<a href="home.php?modules=modules">Add Module</a>|
<a href="home.php?viewmodules=viewmodules">View All Modules</a>|
<a href="home.php?submodules=submodules">Add SubModule</a>|
<a href="home.php?viewsubmodules=viewsubmodules">View SubModule</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Updating SubModules Details</h1>
<?php
include ('edit_sub_module.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}


}
//////////////////////////////////////////end of modules

////////////////////////////code block for usergroups and modules relationship
//call for view
if ($viewmodulesusergroup==viewmodulesusergroup)
{
?>
<div id="submenu">
<a href="home.php?modulesusergroup=modulesusergroup">Associate Module To Usergroup</a>|
<a href="home.php?viewmodulesusergroup=viewmodulesusergroup">View Module and Usergroup Association</a>|
<a href="home.php?assignsubmodule=assignsubmodule">Associate Sub Modules To Modules</a>|
<a href="home.php?viewassignsubmodule=viewassignsubmodule">View Module and Submodule Association</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">Access Control: View / Deassociate Module to Usergroups</h1>
<?php
include ('view_assign_modules_usergroups.php');
} else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}
//call for add
if ($modulesusergroup==modulesusergroup)
{
?>
<div id="submenu">
<a href="home.php?modulesusergroup=modulesusergroup">Associate Module To Usergroup</a>|
<a href="home.php?viewmodulesusergroup=viewmodulesusergroup">View Module and Usergroup Association</a>|
<a href="home.php?assignsubmodule=assignsubmodule">Associate Sub Modules To Modules</a>|
<a href="home.php?viewassignsubmodule=viewassignsubmodule">View Module and Submodule Association</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">Access Control: Associate Module to Usergroups</h1>
<?php
include ('assign_modules_usergroups.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}

//////////////////////////////////////////end of usergroups and modules relationship
////////////////////////////code block for modules and modules relationship
//call for view
if ($viewassignsubmodule==viewassignsubmodule)
{
?>
<div id="submenu">
<a href="home.php?modulesusergroup=modulesusergroup">Associate Module To Usergroup</a>|
<a href="home.php?viewmodulesusergroup=viewmodulesusergroup">View Module and Usergroup Association</a>|
<a href="home.php?assignsubmodule=assignsubmodule">Associate Sub Modules To Modules</a>|
<a href="home.php?viewassignsubmodule=viewassignsubmodule">View Module and Submodule Association</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">Access Control: View / Deassociate SubModules From Modules</h1>
<?php
include ('view_assign_modules_submodules.php');
} else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}
//call for add
if ($assignsubmodule==assignsubmodule)
{
?>
<div id="submenu">
<a href="home.php?modulesusergroup=modulesusergroup">Associate Module To Usergroup</a>|
<a href="home.php?viewmodulesusergroup=viewmodulesusergroup">View Module and Usergroup Association</a>|
<a href="home.php?assignsubmodule=assignsubmodule">Associate Sub Modules To Modules</a>|
<a href="home.php?viewassignsubmodule=viewassignsubmodule">View Module and Submodule Association</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">Access Control: Associate Sub Modules to Modules</h1>
<?php
include ('assign_modules_submodules.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}

//////////////////////////////////////////end of submodules and modules relationship

////////////////////////////code block for users
//call for view
if ($viewusers==viewusers)
{
?>
<div id="submenu">
<a href="home.php?users=users">Create User</a>|
<a href="home.php?viewusers=viewusers">View All Users</a>|
<a href="home.php?resetpassword=resetpassword">Reset User Passwords</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">Access Control: View Users</h1>
<?php
include ('viewusers.php');
} else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}
//call for add
if ($users==users)
{
?>
<div id="submenu">
<a href="home.php?users=users">Create User</a>|
<a href="home.php?viewusers=viewusers">View All Users</a>|
<a href="home.php?resetpassword=resetpassword">Reset User Passwords</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">Access Control: Create A User</h1>
<?php
include ('add_user.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}
//call for edit
if($edituser=='edituser')
{
?>
<div id="submenu">
<a href="home.php?users=users">Create User</a>|
<a href="home.php?viewusers=viewusers">View All Users</a>|
<a href="home.php?resetpassword=resetpassword">Reset User Passwords</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Updating Users Details</h1>
<?php
include ('edit_user.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}


}
//////////////////////////////////////////end of users

////////////////////////////code block for resseting users passwords
//call for view
if ($resetpassword==resetpassword)
{
?>
<div id="submenu">
<a href="home.php?users=users">Create User</a>|
<a href="home.php?viewusers=viewusers">View All Users</a>|
<a href="home.php?resetpassword=resetpassword">Reset User Passwords</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">Access Control: Reset Users Password</h1>
<?php
include ('viewuserspassword.php');
} else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}
//call for add
if ($resetpass2==resetpass2)
{
?>
<div id="submenu">
<a href="home.php?users=users">Create User</a>|
<a href="home.php?viewusers=viewusers">View All Users</a>|
<a href="home.php?resetpassword=resetpassword">Reset User Passwords</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">Access Control: Reset Users Password</h1>
<?php
include ('edituserpass.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}



//////////////////////////////////////////end of ressting user passwords

////////////////////////////code block for user profile
//call for view
if ($profile==profile)
{
?>
<div id="submenu">
<a href="home.php?profile=profile">My Profile</a>|
<a href="home.php?newpass=newpass">Change Password</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">Access Control: Update My Profile</h1>
<?php
include ('profile.php');
} else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}




//////////////////////////////////////////end of user profile

////////////////////////////code block for user profile
//call for view
if ($newpass==newpass)
{
?>
<div id="submenu">
<a href="home.php?profile=profile">My Profile</a>|
<a href="home.php?newpass=newpass">Change Password</a>|
<!--<a href="home.php?viewusers=viewusers">View All Users</a>|
<a href="home.php?resetpassword=resetpassword">Reset User Passwords</a>|-->
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">Access Control: Change My Password</h1>
<?php
include ('newpass.php');
} else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}




//////////////////////////////////////////end of user own change password

////////////////////////////code block for submodule user group relationship
//call for view
if ($viewusergroupsm==viewusergroupsm)
{
?>
<div id="submenu">
<a href="home.php?usergroupsm=usergroupsm">Associate Sub Modules To User Group</a>|
<a href="home.php?viewusergroupsm=viewusergroupsm">View User Group and Submodule Association</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">Access Control: Deassociate Sub-Modules From Usergroup</h1>
<?php
include ('viewusergroupsm.php');
} else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}
//call for add
if ($usergroupsm==usergroupsm)
{
?>
<div id="submenu">
<a href="home.php?usergroupsm=usergroupsm">Associate Sub Modules To User Group</a>|
<a href="home.php?viewusergroupsm=viewusergroupsm">View User Group and Submodule Association</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">Access Control: Associate Sub-Modules to Usergroup</h1>
<?php
include ('usergroupsm.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}

//////////////////////////////////////////submodules user group relationship

/////////////////////////////////////////////////////////////////////////////////PETER KYALO CODE SEGMENT
//code project block
//call for view
if ($viewproject==viewproject)
{
?>
<div id="submenu">
<a href="home.php?addproject=addproject">Add New Project </a>|
<a href="home.php?viewproject=viewproject">View All Project</a>|
<a href="home.php?assignproject=assignproject">Assign Projects</a>|
<a href="home.php?viewprojectcountry=viewprojectcountry">View Projects Assigned To Countries</a>|
<!--<a href="home.php?viewprojectarea=viewprojectarea">View Projects Assigned To Areas</a>|
<a href="home.php?viewprojectlocation=viewprojectlocation">View Projects Assigned To Locations</a>|
<a href="home.php?viewprojectsettlement=viewprojectsettlement">View Projects Assigned To Settlements</a>|-->
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: View Project</h1>
<?php
include ('viewproject.php');
} else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewproject=viewproject"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}
//call for add
if ($addproject==addproject)
{
?><div id="submenu">
<a href="home.php?addproject=addproject">Add New Project </a>|
<a href="home.php?viewproject=viewproject">View All Project</a>|
<a href="home.php?assignproject=assignproject">Assign Projects</a>|
<a href="home.php?viewprojectcountry=viewprojectcountry">View Projects Assigned To Countries</a>|
<!--<a href="home.php?viewprojectarea=viewprojectarea">View Projects Assigned To Areas</a>|
<a href="home.php?viewprojectlocation=viewprojectlocation">View Projects Assigned To Locations</a>|
<a href="home.php?viewprojectsettlement=viewprojectsettlement">View Projects Assigned To Settlements</a>|-->
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Creating New Project</h1>
<?php
include ('add_project2.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewproject=viewproject"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}
//call for edit
if($editproject=='editproject')
{
?><div id="submenu">
<a href="home.php?addproject=addproject">Add New Project </a>|
<a href="home.php?viewproject=viewproject">View All Project</a>|
<a href="home.php?assignproject=assignproject">Assign Projects</a>|
<a href="home.php?viewprojectcountry=viewprojectcountry">View Projects Assigned To Countries</a>|
<!--<a href="home.php?viewprojectarea=viewprojectarea">View Projects Assigned To Areas</a>|
<a href="home.php?viewprojectlocation=viewprojectlocation">View Projects Assigned To Locations</a>|
<a href="home.php?viewprojectsettlement=viewprojectsettlement">View Projects Assigned To Settlements</a>|-->
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Creating New Project</h1>
<?php
include ('edit_project.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewproject=viewproject"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}


}
//call for assign projects to areas of implementation
if($assignproject=='assignproject')
{
?><div id="submenu">
<a href="home.php?addproject=addproject">Add New Project </a>|
<a href="home.php?viewproject=viewproject">View All Project</a>|
<a href="home.php?assignproject=assignproject">Assign Projects</a>|
<a href="home.php?viewprojectcountry=viewprojectcountry">View Projects Assigned To Countries</a>|
<!--<a href="home.php?viewprojectarea=viewprojectarea">View Projects Assigned To Areas</a>|
<a href="home.php?viewprojectlocation=viewprojectlocation">View Projects Assigned To Locations</a>|
<a href="home.php?viewprojectsettlement=viewprojectsettlement">View Projects Assigned To Settlements</a>|-->
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Assigning Projects To Countries Of Implementation</h1>
<?php
include ('assign_project_to_country.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewproject=viewproject"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}


}
//assign project to area
if($assignprojectarea=='assignprojectarea')
{
?><div id="submenu">
<a href="home.php?addproject=addproject">Add New Project </a>|
<a href="home.php?viewproject=viewproject">View All Project</a>|
<a href="home.php?assignproject=assignproject">Assign Projects</a>|
<a href="home.php?viewprojectcountry=viewprojectcountry">View Projects Assigned To Countries</a>|
<!--<a href="home.php?viewprojectarea=viewprojectarea">View Projects Assigned To Areas</a>|
<a href="home.php?viewprojectlocation=viewprojectlocation">View Projects Assigned To Locations</a>|
<a href="home.php?viewprojectsettlement=viewprojectsettlement">View Projects Assigned To Settlements</a>|-->
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Assigning Projects To Area Of Implementation</h1>
<?php
include ('assign_project_to_area.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewproject=viewproject"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}


}

if($assignprojectlocation=='assignprojectlocation')
{
?><div id="submenu">
<a href="home.php?addproject=addproject">Add New Project </a>|
<a href="home.php?viewproject=viewproject">View All Project</a>|
<a href="home.php?assignproject=assignproject">Assign Projects</a>|
<a href="home.php?viewprojectcountry=viewprojectcountry">View Projects Assigned To Countries</a>|
<!--<a href="home.php?viewprojectarea=viewprojectarea">View Projects Assigned To Areas</a>|
<a href="home.php?viewprojectlocation=viewprojectlocation">View Projects Assigned To Locations</a>|
<a href="home.php?viewprojectsettlement=viewprojectsettlement">View Projects Assigned To Settlements</a>|-->
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Assigning Projects To Location Of Implementation</h1>
<?php
include ('assign_project_to_location.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewproject=viewproject"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}


}

if($assignprojectend=='assignprojectend')
{
?><div id="submenu">
<a href="home.php?addproject=addproject">Add New Project </a>|
<a href="home.php?viewproject=viewproject">View All Project</a>|
<a href="home.php?assignproject=assignproject">Assign Projects</a>|
<a href="home.php?viewprojectcountry=viewprojectcountry">View Projects Assigned To Countries</a>|
<!--<a href="home.php?viewprojectarea=viewprojectarea">View Projects Assigned To Areas</a>|
<a href="home.php?viewprojectlocation=viewprojectlocation">View Projects Assigned To Locations</a>|
<a href="home.php?viewprojectsettlement=viewprojectsettlement">View Projects Assigned To Settlements</a>|-->
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Record Saved Successfully!!</h1>
<?php
include ('assign_project_end.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewproject=viewproject"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}


}

if($assignprojectsettlement=='assignprojectsettlement')
{
?><div id="submenu">
<a href="home.php?addproject=addproject">Add New Project </a>|
<a href="home.php?viewproject=viewproject">View All Project</a>|
<a href="home.php?assignproject=assignproject">Assign Projects</a>|
<a href="home.php?viewprojectcountry=viewprojectcountry">View Projects Assigned To Countries</a>|
<!--<a href="home.php?viewprojectarea=viewprojectarea">View Projects Assigned To Areas</a>|
<a href="home.php?viewprojectlocation=viewprojectlocation">View Projects Assigned To Locations</a>|
<a href="home.php?viewprojectsettlement=viewprojectsettlement">View Projects Assigned To Settlements</a>|-->
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Assigning Projects To Settlements Of Implementation</h1>
<?php
include ('assign_project_to_settlement.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewproject=viewproject"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}


}

if($viewprojectcountry=='viewprojectcountry')
{
?><div id="submenu">
<a href="home.php?addproject=addproject">Add New Project </a>|
<a href="home.php?viewproject=viewproject">View All Project</a>|
<a href="home.php?assignproject=assignproject">Assign Projects</a>|
<a href="home.php?viewprojectcountry=viewprojectcountry">View Projects Assigned To Countries</a>|
<!--<a href="home.php?viewprojectarea=viewprojectarea">View Projects Assigned To Areas</a>|
<a href="home.php?viewprojectlocation=viewprojectlocation">View Projects Assigned To Locations</a>|
<a href="home.php?viewprojectsettlement=viewprojectsettlement">View Projects Assigned To Settlements</a>|-->
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: View Or Deassigning Projects From Countries Of Implementation</h1>
<?php
include ('view_assign_project_to_country.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewproject=viewproject"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}


}

if($viewprojectarea=='viewprojectarea')
{
?><div id="submenu">
<a href="home.php?addproject=addproject">Add New Project </a>|
<a href="home.php?viewproject=viewproject">View All Project</a>|
<a href="home.php?assignproject=assignproject">Assign Projects</a>|
<a href="home.php?viewprojectcountry=viewprojectcountry">View Projects Assigned To Countries</a>|
<!--<a href="home.php?viewprojectarea=viewprojectarea">View Projects Assigned To Areas</a>|
<a href="home.php?viewprojectlocation=viewprojectlocation">View Projects Assigned To Locations</a>|
<a href="home.php?viewprojectsettlement=viewprojectsettlement">View Projects Assigned To Settlements</a>|-->
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: View Or Deassigning Projects From Areas Of Implementation</h1>
<?php
include ('view_assign_project_to_area.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewproject=viewproject"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}


}

if($viewprojectlocation=='viewprojectlocation')
{
?><div id="submenu">
<a href="home.php?addproject=addproject">Add New Project </a>|
<a href="home.php?viewproject=viewproject">View All Project</a>|
<a href="home.php?assignproject=assignproject">Assign Projects</a>|
<a href="home.php?viewprojectcountry=viewprojectcountry">View Projects Assigned To Countries</a>|
<!--<a href="home.php?viewprojectarea=viewprojectarea">View Projects Assigned To Areas</a>|
<a href="home.php?viewprojectlocation=viewprojectlocation">View Projects Assigned To Locations</a>|
<a href="home.php?viewprojectsettlement=viewprojectsettlement">View Projects Assigned To Settlements</a>|-->
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: View Or Deassigning Projects From Locations Of Implementation</h1>
<?php
include ('view_assign_project_to_location.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewproject=viewproject"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}


}

if($viewprojectsettlement=='viewprojectsettlement')
{
?><div id="submenu">
<a href="home.php?addproject=addproject">Add New Project </a>|
<a href="home.php?viewproject=viewproject">View All Project</a>|
<a href="home.php?assignproject=assignproject">Assign Projects</a>|
<a href="home.php?viewprojectcountry=viewprojectcountry">View Projects Assigned To Countries</a>|
<!--<a href="home.php?viewprojectarea=viewprojectarea">View Projects Assigned To Areas</a>|
<a href="home.php?viewprojectlocation=viewprojectlocation">View Projects Assigned To Locations</a>|
<a href="home.php?viewprojectsettlement=viewprojectsettlement">View Projects Assigned To Settlements</a>|-->
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: View Or Deassigning Projects From Settlements Of Implementation</h1>
<?php
include ('view_assign_project_to_settlement.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewproject=viewproject"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}


}


//code for competencies
if ($viewcompetency==viewcompetency)
{
?>
<div id="submenu">
<a href="home.php?addcompetency=addcompetency">Add New competency </a>|
<a href="home.php?viewcompetency=viewcompetency">View All competencies</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: View competency</h1>
<?php
include ('viewcompetency.php');
} else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewcompetency=viewcompetency"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}
//call for add
if ($addcompetency==addcompetency)
{
?><div id="submenu">
<a href="home.php?addcompetency=addcompetency">Add New competency </a>|
<a href="home.php?viewcompetency=viewcompetency">View All competencies</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Creating New competency</h1>
<?php
include ('add_competency.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewcompetency=viewcompetency"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}
//call for edit
if($editcompetency=='editcompetency')
{
?><div id="submenu">
<a href="home.php?addcompetency=addcompetency">Add New competency </a>|
<a href="home.php?viewcompetency=viewcompetency">View All competencies</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Creating New competency</h1>
<?php
include ('edit_competency.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewcompetency=viewcompetency"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}


}
//code for sub-projects
if ($viewsubproject==viewsubproject)
{
?>
<div id="submenu">
<a href="home.php?addsubproject=addsubproject">Add Subproject </a>|
<a href="home.php?viewsubproject=viewsubproject">View Sub-projects</a>|
<a href="home.php?assignsubproject=assignsubproject">Assign Sub-Projects</a>|
<a href="home.php?viewsubprojectcountry=viewsubprojectcountry">Sub-Projects Assigned To Countries</a>|
<a href="home.php?viewsubprojectarea=viewsubprojectarea">Sub-Projects Assigned To Areas</a>|
<a href="home.php?viewsubprojectlocation=viewsubprojectlocation">Sub-Projects Assigned To Locations</a>|
<a href="home.php?viewsubprojectsettlement=viewsubprojectsettlement">Sub-Projects Assigned To Settlements</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: View subproject</h1>
<?php
include ('viewsubproject.php');
} else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewsubproject=viewsubproject"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}
//call for add
if ($addsubproject==addsubproject)
{
?><div id="submenu">
<a href="home.php?addsubproject=addsubproject">Add Subproject </a>|
<a href="home.php?viewsubproject=viewsubproject">View Sub-projects</a>|
<a href="home.php?assignsubproject=assignsubproject">Assign Sub-Projects</a>|
<a href="home.php?viewsubprojectcountry=viewsubprojectcountry">Sub-Projects Assigned To Countries</a>|
<a href="home.php?viewsubprojectarea=viewsubprojectarea">Sub-Projects Assigned To Areas</a>|
<a href="home.php?viewsubprojectlocation=viewsubprojectlocation">Sub-Projects Assigned To Locations</a>|
<a href="home.php?viewsubprojectsettlement=viewsubprojectsettlement">Sub-Projects Assigned To Settlements</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Creating New sub-project</h1>
<?php
include ('add_subproject.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewsubproject=viewsubproject"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}
//call for edit
if($editsubproject=='editsubproject')
{
?><div id="submenu">
<a href="home.php?addsubproject=addsubproject">Add Subproject </a>|
<a href="home.php?viewsubproject=viewsubproject">View Sub-projects</a>|
<a href="home.php?assignsubproject=assignsubproject">Assign Sub-Projects</a>|
<a href="home.php?viewsubprojectcountry=viewsubprojectcountry">Sub-Projects Assigned To Countries</a>|
<a href="home.php?viewsubprojectarea=viewsubprojectarea">Sub-Projects Assigned To Areas</a>|
<a href="home.php?viewsubprojectlocation=viewsubprojectlocation">Sub-Projects Assigned To Locations</a>|
<a href="home.php?viewsubprojectsettlement=viewsubprojectsettlement">Sub-Projects Assigned To Settlements</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Creating New subproject</h1>
<?php
include ('edit_subproject.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewsubproject=viewsubproject"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}


}

if($assignsubproject=='assignsubproject')
{
?><div id="submenu">
<a href="home.php?addsubproject=addsubproject">Add Subproject </a>|
<a href="home.php?viewsubproject=viewsubproject">View Sub-projects</a>|
<a href="home.php?assignsubproject=assignsubproject">Assign Sub-Projects</a>|
<a href="home.php?viewsubprojectcountry=viewsubprojectcountry">Sub-Projects Assigned To Countries</a>|
<a href="home.php?viewsubprojectarea=viewsubprojectarea">Sub-Projects Assigned To Areas</a>|
<a href="home.php?viewsubprojectlocation=viewsubprojectlocation">Sub-Projects Assigned To Locations</a>|
<a href="home.php?viewsubprojectsettlement=viewsubprojectsettlement">Sub-Projects Assigned To Settlements</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Assign Sub Projects To Country Of Implementation</h1>
<?php
include ('assign_sub_project_to_country.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewsubproject=viewsubproject"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}


}

if($assignsubprojectarea=='assignsubprojectarea')
{
?><div id="submenu">
<a href="home.php?addsubproject=addsubproject">Add Subproject </a>|
<a href="home.php?viewsubproject=viewsubproject">View Sub-projects</a>|
<a href="home.php?assignsubproject=assignsubproject">Assign Sub-Projects</a>|
<a href="home.php?viewsubprojectcountry=viewsubprojectcountry">Sub-Projects Assigned To Countries</a>|
<a href="home.php?viewsubprojectarea=viewsubprojectarea">Sub-Projects Assigned To Areas</a>|
<a href="home.php?viewsubprojectlocation=viewsubprojectlocation">Sub-Projects Assigned To Locations</a>|
<a href="home.php?viewsubprojectsettlement=viewsubprojectsettlement">Sub-Projects Assigned To Settlements</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Assign Sub Projects To Areas Of Implementation</h1>
<?php
include ('assign_sub_project_to_area.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewsubproject=viewsubproject"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}


}

if($assignsubprojectlocation=='assignsubprojectlocation')
{
?><div id="submenu">
<a href="home.php?addsubproject=addsubproject">Add Subproject </a>|
<a href="home.php?viewsubproject=viewsubproject">View Sub-projects</a>|
<a href="home.php?assignsubproject=assignsubproject">Assign Sub-Projects</a>|
<a href="home.php?viewsubprojectcountry=viewsubprojectcountry">Sub-Projects Assigned To Countries</a>|
<a href="home.php?viewsubprojectarea=viewsubprojectarea">Sub-Projects Assigned To Areas</a>|
<a href="home.php?viewsubprojectlocation=viewsubprojectlocation">Sub-Projects Assigned To Locations</a>|
<a href="home.php?viewsubprojectsettlement=viewsubprojectsettlement">Sub-Projects Assigned To Settlements</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Assign Sub Projects To Locations Of Implementation</h1>
<?php
include ('assign_sub_project_to_location.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewsubproject=viewsubproject"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}


}


if($assignsubprojectsettlement=='assignsubprojectsettlement')
{
?><div id="submenu">
<a href="home.php?addsubproject=addsubproject">Add Subproject </a>|
<a href="home.php?viewsubproject=viewsubproject">View Sub-projects</a>|
<a href="home.php?assignsubproject=assignsubproject">Assign Sub-Projects</a>|
<a href="home.php?viewsubprojectcountry=viewsubprojectcountry">Sub-Projects Assigned To Countries</a>|
<a href="home.php?viewsubprojectarea=viewsubprojectarea">Sub-Projects Assigned To Areas</a>|
<a href="home.php?viewsubprojectlocation=viewsubprojectlocation">Sub-Projects Assigned To Locations</a>|
<a href="home.php?viewsubprojectsettlement=viewsubprojectsettlement">Sub-Projects Assigned To Settlements</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Assign Sub Projects To Settlement Of Implementation</h1>
<?php
include ('assign_sub_project_to_settlement.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewsubproject=viewsubproject"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}


}


if($assignsubprojectend=='assignsubprojectend')
{
?><div id="submenu">
<a href="home.php?addsubproject=addsubproject">Add Subproject </a>|
<a href="home.php?viewsubproject=viewsubproject">View Sub-projects</a>|
<a href="home.php?assignsubproject=assignsubproject">Assign Sub-Projects</a>|
<a href="home.php?viewsubprojectcountry=viewsubprojectcountry">Sub-Projects Assigned To Countries</a>|
<a href="home.php?viewsubprojectarea=viewsubprojectarea">Sub-Projects Assigned To Areas</a>|
<a href="home.php?viewsubprojectlocation=viewsubprojectlocation">Sub-Projects Assigned To Locations</a>|
<a href="home.php?viewsubprojectsettlement=viewsubprojectsettlement">Sub-Projects Assigned To Settlements</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Record Saved Successfully!!</h1>
<?php
include ('assign_sub_project_end.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewproject=viewproject"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}


}


if($viewsubprojectcountry=='viewsubprojectcountry')
{
?><div id="submenu">
<a href="home.php?addsubproject=addsubproject">Add Subproject </a>|
<a href="home.php?viewsubproject=viewsubproject">View Sub-projects</a>|
<a href="home.php?assignsubproject=assignsubproject">Assign Sub-Projects</a>|
<a href="home.php?viewsubprojectcountry=viewsubprojectcountry">Sub-Projects Assigned To Countries</a>|
<a href="home.php?viewsubprojectarea=viewsubprojectarea">Sub-Projects Assigned To Areas</a>|
<a href="home.php?viewsubprojectlocation=viewsubprojectlocation">Sub-Projects Assigned To Locations</a>|
<a href="home.php?viewsubprojectsettlement=viewsubprojectsettlement">Sub-Projects Assigned To Settlements</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: View,Add More Or Deassigning Sub-Projects From Countries Of Implementation</h1>
<?php
include ('view_assign_sub_project_to_country.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewproject=viewproject"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}


}


if($viewsubprojectarea=='viewsubprojectarea')
{
?><div id="submenu">
<a href="home.php?addsubproject=addsubproject">Add Subproject </a>|
<a href="home.php?viewsubproject=viewsubproject">View Sub-projects</a>|
<a href="home.php?assignsubproject=assignsubproject">Assign Sub-Projects</a>|
<a href="home.php?viewsubprojectcountry=viewsubprojectcountry">Sub-Projects Assigned To Countries</a>|
<a href="home.php?viewsubprojectarea=viewsubprojectarea">Sub-Projects Assigned To Areas</a>|
<a href="home.php?viewsubprojectlocation=viewsubprojectlocation">Sub-Projects Assigned To Locations</a>|
<a href="home.php?viewsubprojectsettlement=viewsubprojectsettlement">Sub-Projects Assigned To Settlements</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: View,Add More Or Deassigning Sub-Projects From Areas Of Implementation</h1>
<?php
include ('view_assign_sub_project_to_area.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewproject=viewproject"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}


}

if($viewsubprojectlocation=='viewsubprojectlocation')
{
?><div id="submenu">
<a href="home.php?addsubproject=addsubproject">Add Subproject </a>|
<a href="home.php?viewsubproject=viewsubproject">View Sub-projects</a>|
<a href="home.php?assignsubproject=assignsubproject">Assign Sub-Projects</a>|
<a href="home.php?viewsubprojectcountry=viewsubprojectcountry">Sub-Projects Assigned To Countries</a>|
<a href="home.php?viewsubprojectarea=viewsubprojectarea">Sub-Projects Assigned To Areas</a>|
<a href="home.php?viewsubprojectlocation=viewsubprojectlocation">Sub-Projects Assigned To Locations</a>|
<a href="home.php?viewsubprojectsettlement=viewsubprojectsettlement">Sub-Projects Assigned To Settlements</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: View,Add More Or Deassigning Sub-Projects From Location Of Implementation</h1>
<?php
include ('view_assign_sub_project_to_location.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewproject=viewproject"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}


}

if($viewsubprojectsettlement=='viewsubprojectsettlement')
{
?><div id="submenu">
<a href="home.php?addsubproject=addsubproject">Add Subproject </a>|
<a href="home.php?viewsubproject=viewsubproject">View Sub-projects</a>|
<a href="home.php?assignsubproject=assignsubproject">Assign Sub-Projects</a>|
<a href="home.php?viewsubprojectcountry=viewsubprojectcountry">Sub-Projects Assigned To Countries</a>|
<a href="home.php?viewsubprojectarea=viewsubprojectarea">Sub-Projects Assigned To Areas</a>|
<a href="home.php?viewsubprojectlocation=viewsubprojectlocation">Sub-Projects Assigned To Locations</a>|
<a href="home.php?viewsubprojectsettlement=viewsubprojectsettlement">Sub-Projects Assigned To Settlements</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: View,Add More Or Deassigning Sub-Projects From Settlements Of Implementation</h1>
<?php
include ('view_assign_sub_project_to_settlement.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewproject=viewproject"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}


}



/////////////////////////////////////////////////////////////////////////////////END OF PETER KYALO CODES

/////////////////////////////////////////////////////////////////////////////////Begining Of Griffins

//Blocks for countries

//call for view
if ($viewhrforms==viewhrforms)
{
?> <div id="submenu">
<a href="home.php?viewhrforms=viewhrforms">Add New Coutry </a>|
<a href="home.php?viewcountries=viewcountries">View All Countries</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Add New Country</h1>
<?php
include ('upload_forms.php');
} else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}

/////////////////////////////////block for setting template
//call for view
if ($viewsetuptemplate==viewsetuptemplate)
{
?>
<div id="submenu">
<a href="home.php?setuptemplate1=setuptemplate1">Set Up Template</a>|
<a href="home.php?viewsetuptemplate=viewsetuptemplate">View Set Up Template</a>|
<a href="home.php?replicatesetuptemplate=replicatesetuptemplate">Copy template to a Location</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: View Bi-Weekly Data Entry Template</h1>
<?php
include ('view_set_template.php');
} else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}

// call for copy pasting the template
if ($replicatesetuptemplate==replicatesetuptemplate)
{
?>
<div id="submenu">
<a href="home.php?setuptemplate1=setuptemplate1">Set Up Template</a>|
<a href="home.php?viewsetuptemplate=viewsetuptemplate">View Set Up Template</a>|
<a href="home.php?replicatesetuptemplate=replicatesetuptemplate">Copy template to a Location</a>|

</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: View Bi-Weekly Data Entry Template</h1>
<?php
include ('replicatesetuptemplate.php');
} else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}

//call for assign template
if ($setuptemplate==setuptemplate)
{
?>
<div id="submenu">
<a href="home.php?setuptemplate1=setuptemplate1">Set Up Template</a>|
<a href="home.php?viewsetuptemplate=viewsetuptemplate">View Set Up Template</a>|
<a href="home.php?replicatesetuptemplate=replicatesetuptemplate">Copy template to a Location</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Add New Implementation Area</h1>
<?php
include ('setuptemplate.php');
} else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}

if ($setuptemplate1==setuptemplate1)
{
?>
<div id="submenu">
<!--<a href="home.php?viewsubproject=viewsubproject">Set Up Template</a>|-->
<a href="home.php?setuptemplate1=setuptemplate1">Set Up Template</a>|
<a href="home.php?viewsetuptemplate=viewsetuptemplate">View Set Up Template</a>|
<a href="home.php?replicatesetuptemplate=replicatesetuptemplate">Copy template to a Location</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Add New Implementation Area</h1>
<?php
include ('setuptemplate1.php');
} else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}

//call for edit
if($editsetuptemplate=='editsetuptemplate')
{
?>
<div id="submenu">
<a href="home.php?setuptemplate1=setuptemplate1">Set Up Template</a>|
<a href="home.php?viewsetuptemplate=viewsetuptemplate">View Set Up Template</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Updating Implementation Areas Details</h1>
<?php
include ('edit_area.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}


}
//////////////////////////////////////////end of setting template


/////////////////////////////////block for areas
//call for view
if ($viewsponsor==viewsponsor)
{
?>
<div id="submenu">
<a href="home.php?newsponsor=newsponsor">Add New Implementation Area</a>|
<a href="home.php?viewsponsor=viewsponsor">View Implementation Areas</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: View Implementation Areas</h1>
<?php
include ('viewareas.php');
} else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}

//call for add
if ($newsponsor==newsponsor)
{
?>
<div id="submenu">
<a href="home.php?newsponsor=newsponsor">Add New Implementation Area</a>|
<a href="home.php?viewsponsor=viewsponsor">View Implementation Areas</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Add New Implementation Area</h1>
<?php
include ('add_area.php');
} else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}

//call for edit
if($editarea=='editarea')
{
?>
<div id="submenu">
<a href="home.php?newsponsor=newsponsor">Add New Implementation Area</a>|
<a href="home.php?viewsponsor=viewsponsor">View Implementation Areas</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Updating Implementation Areas Details</h1>
<?php
include ('edit_area.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}


}
//////////////////////////////////////////end of areas

/////////////////////////////////block for location

//call for view
if ($viewlocation==viewlocation)
{
?>
<div id="submenu">
<a href="home.php?perdm=perdm">Add New Location</a>|
<a href="home.php?viewlocation=viewlocation">View All Locations</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Lists Of All Locations </h1>
<?php
include ('viewlocations.php');
} else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}

//call for add
if ($perdm=='perdm')
{
?>
<div id="submenu">
<a href="home.php?perdm=perdm">Add New Location</a>|
<a href="home.php?viewlocation=viewlocation">View All Locations</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Add New Location</h1>
<?php
include ('add_location.php');
} else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}

//call for edit
if($editlocation=='editlocation')
{
?>
<div id="submenu">
<a href="home.php?perdm=perdm">Add New Location</a>|
<a href="home.php?viewlocation=viewlocation">View All Locations</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Updating Location Details</h1>
<?php
include ('edit_location.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}


}
//////////////////////////////////////////end of location


/////////////////////////////////block for settlements

//call for view
if ($viewsettlements==viewsettlements)
{
?>
<div id="submenu">
<a href="home.php?initiateproject=initiateproject">Add New Settlements</a>|
<a href="home.php?viewsettlements=viewsettlements">View All Settlements</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Lists Of All Settlements </h1>
<?php
include ('viewsettlements.php');
} else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}

//call for add
if ($initiateproject==initiateproject)
{
?>
<div id="submenu">
<a href="home.php?initiateproject=initiateproject">Add New Settlements</a>|
<a href="home.php?viewsettlements=viewsettlements">View All Settlements</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Add New Settlelement</h1>
<?php
include ('add_settlement.php');
} else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}

//call for edit
if($editsettlements=='editsettlements')
{
?>
<div id="submenu">
<a href="home.php?initiateproject=initiateproject">Add New Settlements</a>|
<a href="home.php?viewsettlements=viewsettlements">View All Settlements</a>|
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">System Settings:: Updating Settlements Details</h1>
<?php
include ('edit_settlement.php');
} 
else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}


}
//////////////////////////////////////////end of settlements

//View Audit Trails
if ($audittrails==audittrails)
{
?>
<div id="submenu">
<!--<a href="home.php?initiateproject=initiateproject">Add New Settlements</a>|
<a href="home.php?viewsettlements=viewsettlements">View All Settlements</a>|-->
</div>
<?php
{
if ($sess_allow_add==1)
{
?>
<h1 class="br-5">Audit Trails:: Lists Of All Settlements </h1>
<?php
include ('audit.php');
} else
{
?>  <script type = "text/javascript">
                                        <!-- code for
										 // alert('Rights Denied');
										  //var myurl="home.php?viewuniversity=viewuniversity"
							               // window.location.assign(myurl)
                                       // --
                                       </script>  <?

}
}
}




?>

<?php
}







/////////////////////////////////end of display menus

?>

