<?php 
function display_landing_page()
{
include ('includes/session.php');
 ?>
<div style="height:400px; margin:auto; width:1340px;">
<div style="width:1000px; height:400px; background: url(images/welcomeleft.jpg);margin:5px; float:left;" class="br-5">





</div>
<div style="width:320px;background:#ff0000; height:400px; float:right; margin:5px; background: url(images/welcomeright.jpg); " class="br-5">

<table width="100%" border="0">
<?php 
$sqllog="SELECT * FROM audit_trails where user_id='$user_id' AND action LIKE '%Signed%' order by date_of_event desc limit 1";
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

function salary_round_off()
{
	
	//echo 'yes';
	
$sql33="select 	round_off_value from salary_round_off";
$results33= mysql_query($sql33) or die ("Error $sql33.".mysql_error());
$rows33=mysql_fetch_object($results33);

return($rows33->round_off_value);
	
}






function display_submenu()
{
include ('includes/session.php');
if ($sess_allow_delete==1) {
$rdelete="<img src='images/delete.png'>";
$me="";
}
else
{$rdelete="";
$me="<font color='#ff0000'>Restricted..</font>";

}



if ($sess_allow_edit==1) {
$redit="<img src='images/edit.png'>";
$med="";
}
else
{$redit="";
$med="<font color='#ff0000'>Restricted..</font>";

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
$clock=$_GET['clock'];
$viewclock=$_GET['viewclock'];
$stopclock=$_GET['stopclock'];
$clockout=$_GET['clockout'];
$editdropdown=$_GET['editdropdown'];
$assigndropdown=$_GET['assigndropdown'];
$unassigndropdown=$_GET['unassigndropdown'];
$newstaff=$_GET['newstaff'];
$viewstaff=$_GET['viewstaff'];
$viewstaffhistory=$_GET['viewstaffhistory'];
$edit_task=$_GET['edit_task'];


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
$viewreneworkpermit2=$_GET['viewreneworkpermit2'];
//$viewworkpermitrenewals=$_GET['viewworkpermitrenewals'];


$visarenewals=$_GET['visarenewals'];
$viewvisarenewals=$_GET['viewvisarenewals'];
$editvisarenewals=$_GET['editvisarenewals'];
$renewvisa2=$_GET['renewvisa2'];


$processinterflight=$_GET['processinterflight'];
$viewprocessinterflight=$_GET['viewprocessinterflight'];
$editprocessinterflight=$_GET['editprocessinterflight'];

$processnatflight=$_GET['processnatflight'];
$processnatflightc=$_GET['processnatflightc'];
$viewprocessnatflight=$_GET['viewprocessnatflight'];
$editprocessnatflight=$_GET['editinterprocessnatflight'];

$processgenflight=$_GET['processgenflight'];
$viewprocessgenflight=$_GET['viewprocessgenflight'];
$editprocessgenflight=$_GET['editprocessgenflight'];


$pending_booking=$_GET['pending_booking'];
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
$cash_sale_summary=$_GET['cash_sale_summary'];
$sale_item_all=$_GET['sale_item_all'];


//Usergroups
$newusergroup=$_GET['newusergroup']; 

////////////////////////////code block for biweekly report
//call for add bi weekly report
if ($countryreport==countryreport)
{
?>
<div id="submenu">
<a href="home.php?countryreport=countryreport">Generate Direct Quotation</a>|
<a href="home.php?viewsettlements=viewsettlements">View Generated Direct Quotations</a>|
<!--<a href="home.php?locationreport=locationreport">View Location Level Report</a>|
<a href="home.php?settlementreport=settlementreport">View Settlement Level Report</a>|-->
</div>

<h1 class="br-5">Estimates Managements::Begin Generate Estimates<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('country_report.php');

}


if ($adminviewexppayroll==adminviewexppayroll)
{
?>
<div id="submenu">
<a href="home.php?adminpayrollexpreport=adminpayrollexpreport">Release Items From The Store</a>|
<a href="view_all_released_items.php">View Released Items</a>|
<!--<a href="home.php?locationreport=locationreport">View Location Level Report</a>|
<a href="home.php?settlementreport=settlementreport">View Settlement Level Report</a>|-->
</div>

<h1 class="br-5">Inventory Managements::View All Realeased Items From The Store<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_all_released_items.php');

}

if ($adminpayrollexpreport==adminpayrollexpreport)
{
?>
<div id="submenu">
<a href="home.php?adminpayrollexpreport=adminpayrollexpreport">Release Items From The Store</a>|
<a href="view_all_released_items.php">View Released Items</a>|
<!--<a href="home.php?locationreport=locationreport">View Location Level Report</a>|
<a href="home.php?settlementreport=settlementreport">View Settlement Level Report</a>|-->
</div>

<h1 class="br-5">Inventory Managements::Release Items From The Store<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('release_item.php');

}

if ($familystatus==familystatus)
{
?>
<div id="submenu">
<a href="home.php?familystatus=familystatus">Create Requisition</a>|
<a href="home.php?viewfamilystatus=viewfamilystatus">View Requisition Created</a>|
<!--<a href="home.php?locationreport=locationreport">View Location Level Report</a>|
<a href="home.php?settlementreport=settlementreport">View Settlement Level Report</a>|-->
</div>

<h1 class="br-5">Requisition Managements::Create Requisition<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('create_requisition.php');

}

if ($viewfamilystatus==viewfamilystatus)
{
?>
<div id="submenu">
<a href="create_requisition.php">Create Requisition</a>|
<a href="home.php?viewfamilystatus=viewfamilystatus">View All Requisition</a>|
<!--<a href="home.php?locationreport=locationreport">View Location Level Report</a>|
<a href="home.php?settlementreport=settlementreport">View Settlement Level Report</a>|-->
</div>

<h1 class="br-5">Requisition Managements::View Created Requisitions<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_requisition.php');

}

if ($areareport==areareport)
{
?>
<div id="submenu">
<a href="home.php?countryreport=countryreport">Generate Estimates</a>|
<a href="home.php?viewsettlements=viewsettlements">View Estimates Generated</a>|
<!--<a href="home.php?locationreport=locationreport">View Location Level Report</a>|
<a href="home.php?settlementreport=settlementreport">View Settlement Level Report</a>|-->
</div>

<h1 class="br-5">Estimates Managements::Continue Generate Estimates<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('area_report.php');

}


if ($assingomstaff==assingomstaff)
{
?>
<div id="submenu">
<a href="home.php?assingomstaff=assingomstaff">Clock In / Clock Out</a>|
<a href="home.php?viewassingomstaff=viewassingomstaff">View Job Cards Progress Report</a>|
<a href="home.php?omrates=omrates">View Completed Job Card Task</a>|
<!--<a href="home.php?settlementreport=settlementreport">View Settlement Level Report</a>|-->
</div>

<h1 class="br-5">Job Card Clocks In/ Job Cards Clock Out<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('area_report.php');

}

if ($omrates==omrates)
{
?>
<div id="submenu">
<a href="home.php?assingomstaff=assingomstaff">Clock In / Clock Out</a>|
<a href="home.php?viewassingomstaff=viewassingomstaff">View Job Cards Progress Report</a>|
<a href="home.php?omrates=omrates">View Completed Job Card Task</a>|
<!--<a href="home.php?settlementreport=settlementreport">View Settlement Level Report</a>|-->
</div>

<h1 class="br-5">View Completed Job Card Tasks<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('completed_job_card_task.php');

}





if ($viewassingomstaff==viewassingomstaff)
{
?>
<div id="submenu">
<a href="home.php?assingomstaff=assingomstaff">Clock In / Clock Out</a>|
<a href="home.php?viewassingomstaff=viewassingomstaff">View Job Cards Progress Report</a>|
<a href="home.php?omrates=omrates">View Completed Job Card Task</a>|
</div>

<h1 class="br-5">View Job Card Clocks In/ Job Cards Clock Out<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_clocks.php');

}


if ($clock==clock)
{
?>
<div id="submenu">
<a href="home.php?viewhrforms=viewhrforms">Record Items Used For Production</a>|
<!--<a href="home.php?pending_booking=pending_booking">View Pending Bookings</a>|-->
<a href="home.php?pending_booking=pending_booking">View All Items Used For Production</a>|
<a href="home.php?clock=clock">Record Returns Inwards</a>|
<a href="home.php?stopclock=stopclock">View Return Inwards</a>|
</div>

<h1 class="br-5">Record Return Inwards<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('add_clock.php');

}

if ($stopclock==stopclock)
{
?>
<div id="submenu">
<a href="home.php?viewhrforms=viewhrforms">Record Items Used For Production</a>|
<!--<a href="home.php?pending_booking=pending_booking">View Pending Bookings</a>|-->
<a href="home.php?pending_booking=pending_booking">View All Items Used For Production</a>|
<a href="home.php?clock=clock">Record Returns Inwards</a>|
<a href="home.php?stopclock=stopclock">View Return Inwards</a>|
</div>

<h1 class="br-5">View All Returns Inwards<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('stop_clock.php');

}

if ($clockout==clockout)
{
?>
<div id="submenu">
<a href="home.php?assingomstaff=assingomstaff">Clock In / Clock Out</a>|
<a href="home.php?viewclock=viewclock">View Job Cards Progress Report</a>|
<!--<a href="home.php?locationreport=locationreport">View Location Level Report</a>|
<a href="home.php?settlementreport=settlementreport">View Settlement Level Report</a>|-->
</div>

<h1 class="br-5">Job Card Clock Out<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('clockout.php');

}

//call for add
if ($locationreport==locationreport)
{
?>
<div id="submenu">
<a href="home.php?locationreport=locationreport">Add Department</a>|
<a href="home.php?settlementreport=settlementreport">View All Departments</a>|


</div>

<h1 class="br-5">Department Management:: Add Department<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('location_report.php');

}


if ($workpermitrenewals==workpermitrenewals)
{
?>
<div id="submenu">
<a href="home.php?workpermitrenewals=workpermitrenewals">Create Engine Range</a>|
<a href="home.php?viewworkpermitrenewals=viewworkpermitrenewals">View Engine Ranges</a>|
<a href="home.php?subconinvoicestoclient=subconinvoicestoclient">Update Flat Rate Cost</a>|
<a href="home.php?reneworkpermit2=reneworkpermit2">Create Labour Cost Matrix</a>|
<a href="home.php?viewreneworkpermit2=viewreneworkpermit2">View Labour Cost Matrix</a>|
<!--<a href="home.php?areareport=areareport">View Area Level Report</a>|

<a href="home.php?settlementreport=settlementreport">View Settlement Level Report</a>|-->
</div>

<h1 class="br-5">Labour Cost Matrix:: Create Engine Range<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('engine_range.php');

}

if ($editworkpermitrenewals==editworkpermitrenewals)
{
?>
<div id="submenu">
<a href="home.php?workpermitrenewals=workpermitrenewals">Create Engine Range</a>|
<a href="home.php?viewworkpermitrenewals=viewworkpermitrenewals">View Engine Ranges</a>|
<a href="home.php?subconinvoicestoclient=subconinvoicestoclient">Update Flat Rate Cost</a>|
<a href="home.php?reneworkpermit2=reneworkpermit2">Create Labour Cost Matrix</a>|
<a href="home.php?viewreneworkpermit2=viewreneworkpermit2">View Labour Cost Matrix</a>|
<!--<a href="home.php?areareport=areareport">View Area Level Report</a>|

<a href="home.php?settlementreport=settlementreport">View Settlement Level Report</a>|-->
</div>

<h1 class="br-5">Labour Cost Matrix:: Update Engine Range<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('edit_engine_range.php');

}

if ($viewworkpermitrenewals==viewworkpermitrenewals)
{
?>
<div id="submenu">
<a href="home.php?workpermitrenewals=workpermitrenewals">Create Engine Range</a>|
<a href="home.php?viewworkpermitrenewals=viewworkpermitrenewals">View Engine Ranges</a>|
<a href="home.php?subconinvoicestoclient=subconinvoicestoclient">Update Flat Rate Cost</a>|
<a href="home.php?reneworkpermit2=reneworkpermit2">Create Labour Cost Matrix</a>|
<a href="home.php?viewreneworkpermit2=viewreneworkpermit2">View Labour Cost Matrix</a>|
<!--<a href="home.php?areareport=areareport">View Area Level Report</a>|

<a href="home.php?settlementreport=settlementreport">View Settlement Level Report</a>|-->
</div>

<h1 class="br-5">Labour Cost Matrix:: View Engine Ranges<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_engine_range.php');

}

if ($reneworkpermit2==reneworkpermit2)
{
?>
<div id="submenu">
<a href="home.php?reneworkpermit2=reneworkpermit2">Set Up Service Cost</a>|
<a href="home.php?viewreneworkpermit2=viewreneworkpermit2">View Set Up Service Cost</a>|

</div>

<h1 class="br-5">Settings:: Set Up Service Cost<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('create_labour_matrix.php');

}

if ($viewreneworkpermit2==viewreneworkpermit2)
{
?>
<div id="submenu">
<a href="home.php?reneworkpermit2=reneworkpermit2">Set Up Service Cost</a>|
<a href="home.php?viewreneworkpermit2=viewreneworkpermit2">View Set Up Service Cost</a>|
<!--<a href="home.php?subconinvoicestoclient=subconinvoicestoclient">Update Flat Rate Cost</a>|

<a href="home.php?viewreneworkpermit2=viewreneworkpermit2">View Labour Cost Matrix</a>|
<a href="home.php?areareport=areareport">View Area Level Report</a>|

<a href="home.php?settlementreport=settlementreport">View Settlement Level Report</a>|-->
</div>

<h1 class="br-5">Labour Cost Matrix:: View Labour Cost Matrix<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_labour_cost_matrix.php');

}

if ($subconinvoicestoclient==subconinvoicestoclient)
{
?>
<div id="submenu">
<a href="home.php?workpermitrenewals=workpermitrenewals">Create Engine Range</a>|
<a href="home.php?viewworkpermitrenewals=viewworkpermitrenewals">View Engine Ranges</a>|
<a href="home.php?subconinvoicestoclient=subconinvoicestoclient">Update Flat Rate Cost</a>|
<a href="home.php?reneworkpermit2=reneworkpermit2">Create Labour Cost Matrix</a>|
<a href="home.php?viewreneworkpermit2=viewreneworkpermit2">View Labour Cost Matrix</a>|
<!--<a href="home.php?areareport=areareport">View Area Level Report</a>|

<a href="home.php?settlementreport=settlementreport">View Settlement Level Report</a>|-->
</div>

<h1 class="br-5">Labour Cost Matrix:: Update Flat Rate Cost<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('update_flat_rate.php');

}








//call for edit
if($settlementreport=='settlementreport')
{
?>
<div id="submenu">
<a href="home.php?locationreport=locationreport">Add Department</a>|
<a href="home.php?settlementreport=settlementreport">View All Departments</a>|
<!--<a href="home.php?projectdonor=projectdonor">Create Costing Item</a>|
<a href="home.php?viewprojectdonor=viewprojectdonor">View All Costing Item</a>|-->
</div>

<h1 class="br-5">Departments Management:: View All Departments<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('settlement_report.php');

}

if($edit_task=='edit_task')
{
?>
<div id="submenu">
<a href="home.php?locationreport=locationreport">Add Department</a>|
<a href="home.php?settlementreport=settlementreport">View All Departments</a>|
</div>

<h1 class="br-5">Department Management:: Update Department<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('edit_labour_task.php');

}

if($viewstaffhistory=='viewstaffhistory')
{
?>
<div id="submenu">
<!-- <a href="home.php?locationreport=locationreport">Create Labour Task</a>|
<a href="home.php?settlementreport=settlementreport">View Labour Task</a>| -->
</div>

<h1 class="br-5">Payroll Register<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('edit_labour_task.php');

}
//call for add Complete Projects
if ($countryreportc==countryreportc)
{
?>
<div id="submenu">
&nbsp; | <a href="generate_proforma_invoice.php">Generate Profoma Invoice</a>
&nbsp; | <a href="home.php?countryreportc=countryreportc">View Proforma Invoices</a>
</div>

<h1 class="br-5">Proforma Invoice:: List Of Proforma Invoice<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('country_reportc.php');

}

if ($areareportc==areareportc)
{
?>
<div id="submenu">
<a href="home.php?viewcountries=viewcountries">Assign Commission To Sales Rep</a>|
<a href="home.php?areareportc=areareportc">View Assigned Commission To Sales Rep</a>|
<!--<a href="home.php?locationreportc=locationreportc">View Location Level Report</a>|
<a href="home.php?settlementreport=settlementreport">View Settlement Level Report</a>|-->
</div>

<h1 class="br-5">View Assigned Commission To Sales Rep<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('area_reportc.php');

}


//call for add
if ($locationreportc==locationreportc)
{
?>
<div id="submenu">
&nbsp; | <a href="begin_quote.php">Generate New Quotation</a>
&nbsp; | <a href="home.php?locationreportc=locationreportc">View All quotations Generated</a>&nbsp;|
</div>

<h1 class="br-5">Quotations:: View Quotations<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('location_reportc.php');

}
//call for edit
if($settlementreportc=='settlementreportc')
{
?>
<div id="submenu">

<a href="home.php?settlementreportc=settlementreportc">View Customer Statement</a>|
</div>

<h1 class="br-5">Customer Statement<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('settlement_reportc.php');

}
//////////////////////////////////////////end of weekly report


////////////////////////////code block for submit weekly data
//call for add bi weekly report
if ($submit_biweekly==submit_biweekly)
{
?>
<div id="submenu">

<a href="home.php?submit_biweekly=submit_biweekly">View Sales Commission Report</a>|
<!--<a href="home.php?viewsettlements=viewsettlements">View Generated Quotations</a>|-->

</div>

<h1 class="br-5">Sales Commission Report<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('submit_biweekly.php');

}

if ($submit_biweekly2==submit_biweekly2)
{
?>
<div id="submenu">
<a href="home.php?submit_biweekly2=submit_biweekly2">Approve Invoice</a>|
<a href="home.php?view_biweekly=view_biweekly">View All Approved Invoice</a>|
</div>

<h1 class="br-5">Invoices Management:: Approve Invoices<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('submit_biweekly2.php');

}

if ($view_biweekly==view_biweekly)
{
?>
<div id="submenu">
<a href="generate_invoice.php">Generate Invoice</a>|
<a href="home.php?view_biweekly=view_biweekly">View Generated Invoices</a>|
</div>

<h1 class="br-5">Invoices Management:: List Invoices<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_biweekly.php');

}

if ($addformfields==addformfields)
{
?>
<div id="submenu">
<a href="home.php?addformfields=addformfields">Cancel Approved Invoice</a>|
<a href="home.php?viewformfields=viewformfields">View Canceled Approved Invoice</a>|
</div>

<h1 class="br-5">Invoices Management:: Cancel Approved Invoices<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('begin_cancel_approved_invoice.php');

}


if ($editformfields==editformfields)
{
?>
<div id="submenu">
<a href="home.php?addformfields=addformfields">Cancel Approved Invoice</a>|
<a href="home.php?viewformfields=viewformfields">View Canceled Approved Invoice</a>|
</div>

<h1 class="br-5">Invoices Management:: Reason To Cancel Approved Invoices<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('reason_to_cancel_approved_invoice.php');

}

if ($viewformfields==viewformfields)
{
?>
<div id="submenu">
<a href="home.php?addformfields=addformfields">Cancel Approved Invoice</a>|
<a href="home.php?viewformfields=viewformfields">View Canceled Approved Invoice</a>|
</div>

<h1 class="br-5">Invoices Management:: View Canceled Approved Invoices<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_canceled_approved_invoice.php');

}



/*//call for add
if ($newunivesity==newunivesity)
{
?>
<div id="submenu">
<a href="home.php?newunivesity=newunivesity">Add New Donor </a>|
<a href="home.php?viewuniversity=viewuniversity">View All Donors</a>|
</div>

<h1 class="br-5">System Settings:: Creating New Donor<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('add_university.php');

}
//call for edit
if($edituniversity=='edituniversity')
{
?>
<div id="submenu">
<a href="home.php?newunivesity=newunivesity">Add New Donor </a>|
<a href="home.php?viewuniversity=viewuniversity">View All Donors</a>|
</div>

<h1 class="br-5">System Settings:: Creating New Donor<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('edit_university.php');

}*/
//////////////////////////////////////////end of submit weekly data

////////////////////////////code block for donors
//call for view
if ($viewuniversity==viewuniversity)
{
?>
<div id="submenu">
<a href="home.php?newunivesity=newunivesity">Add New Shop </a>|
<a href="home.php?viewuniversity=viewuniversity">View All Shops</a>|
<!--<a href="home.php?projectdonor=projectdonor">Add Model </a>|
<a href="home.php?viewprojectdonor=viewprojectdonor">View All Models</a>|
<a href="home.php?viewsubprojectdonor=viewsubprojectdonor">View Assigned Sub-Projects To Donor</a>|-->

</div>

<h1 class="br-5">System Settings:: View All Shops<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('viewsuniversity.php');

}
//call for add
if ($newunivesity==newunivesity)
{
?>
<div id="submenu">
<a href="home.php?newunivesity=newunivesity">Add New Shop </a>|
<a href="home.php?viewuniversity=viewuniversity">View All Shops</a>|
<!--<a href="home.php?projectdonor=projectdonor">Add Model </a>|
<a href="home.php?viewprojectdonor=viewprojectdonor">View All Models</a>|
<a href="home.php?viewsubprojectdonor=viewsubprojectdonor">View Assigned Sub-Projects To Donor</a>|-->
</div>

<h1 class="br-5">System Settings:: Creating New Shop<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('add_university.php');

}
//call for edit
if($edituniversity=='edituniversity')
{
?>
<div id="submenu">
<a href="home.php?newunivesity=newunivesity">Add New Unit </a>|
<a href="home.php?viewuniversity=viewuniversity">View All Units</a>|
<!--<a href="home.php?projectdonor=projectdonor">Add Model </a>|
<a href="home.php?viewprojectdonor=viewprojectdonor">View All Models</a>|
<a href="home.php?viewsubprojectdonor=viewsubprojectdonor">View Assigned Sub-Projects To Donor</a>|-->
</div>

<h1 class="br-5">System Settings:: Creating New Donor<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('edit_university.php');

}


if($projectdonor=='projectdonor')
{
?>
<div id="submenu">
<a href="home.php?locationreport=locationreport">Create Service Item</a>|
<a href="home.php?settlementreport=settlementreport">View Servicce Items</a>|
<a href="home.php?projectdonor=projectdonor">Create Costing Item</a>|
<a href="home.php?viewprojectdonor=viewprojectdonor">View All Costing Item</a>|
<!--<a href="home.php?viewsubprojectdonor=viewsubprojectdonor">View Assigned Sub-Projects To Donor</a>|-->
</div>

<h1 class="br-5">System Settings:: Add Vehicle Model<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('projectdonor.php');

}


if($viewprojectdonor=='viewprojectdonor')
{
?>
<div id="submenu">
<a href="home.php?locationreport=locationreport">Create Service Item</a>|
<a href="home.php?settlementreport=settlementreport">View Servicce Items</a>|
<a href="home.php?projectdonor=projectdonor">Create Costing Item</a>|
<a href="home.php?viewprojectdonor=viewprojectdonor">View All Costing Item</a>|
<!--<a href="home.php?viewsubprojectdonor=viewsubprojectdonor">View Assigned Sub-Projects To Donor</a>|-->
</div>

<h1 class="br-5">System Settings::View Costing Items<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('viewprojectdonor.php');

}

if($viewsubprojectdonor=='viewsubprojectdonor')
{
?>
<div id="submenu">
<a href="home.php?newunivesity=newunivesity">Add New Make </a>|
<a href="home.php?viewuniversity=viewuniversity">View All Makes</a>|
<a href="home.php?projectdonor=projectdonor">Add Model </a>|
<a href="home.php?viewprojectdonor=viewprojectdonor">View All Models</a>|
<!--<a href="home.php?viewsubprojectdonor=viewsubprojectdonor">View Assigned Sub-Projects To Donor</a>|-->
</div>

<h1 class="br-5">System Settings::View Assigned Sub Projects To Donor<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('viewsubprojectdonor.php');

}
//////////////////////////////////////////end of donorblock

////////////////////////////code block for set up report period
//call for view
if ($view_submission_period==view_submission_period)
{
?>
<div id="submenu">
<a href="home.php?submit_biweekly2=submit_biweekly2">Generate Invoice</a>|
<a href="home.php?view_biweekly=view_biweekly">View All Generated Invoice</a>|
</div>

<h1 class="br-5">Invoices Management:: Continue Generating Invoice<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_submission_period.php');

}
//call for add
if ($submission_period==submission_period)
{
?>
<div id="submenu">
<a href="home.php?viewproject=viewproject">Back To Customers Database</a>|
<!--<a href="home.php?view_submission_period=view_submission_period">View Submission Period</a>|-->
</div>

<h1 class="br-5">Customer Statement:: View Customer Statement Of Account<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('add_submission_period.php');

}


$submission_period1=$_GET['submission_period1'];
if ($submission_period1==submission_period1)
{
?>
<div id="submenu">
<a href="region_sales_report.php">Region Sales Report</a>|
<!--<a href="home.php?view_submission_period=view_submission_period">View Submission Period</a>|-->
</div>

<h1 class="br-5">Region Sales Details:: View Region Sales<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('sales_per_region.php');

}
//call for edit
if($edit_submission_period=='edit_submission_period')
{
?>
<div id="submenu">
<a href="home.php?viewsubprojectcountry=viewsubprojectcountry">Record Received Items</a>|
<a href="home.php?viewsubprojectarea=viewsubprojectarea">View Received Items</a>|
<a href="home.php?assignsubproject=assignsubproject">View Stock Inventory</a>|
<!--<a href="home.php?viewsubprojectcountry=viewsubprojectcountry">Sub-Projects Assigned To Countries</a>|
<a href="home.php?viewsubprojectarea=viewsubprojectarea">Sub-Projects Assigned To Areas</a>|
<a href="home.php?viewsubprojectlocation=viewsubprojectlocation">Sub-Projects Assigned To Locations</a>|
<a href="home.php?viewsubprojectsettlement=viewsubprojectsettlement">Sub-Projects Assigned To Settlements</a>|-->
</div>

<h1 class="br-5">System Settings:: Update Received Items Details<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('edit_submission_period.php');

}
//////////////////////////////////////////end of report period


////////////////////////////code block for countries
//call for view
if ($viewcountries==viewcountries)
{
?>
<div id="submenu">
<!--<a href="home.php?viewcountries=viewcountries">Book a vehicle </a>|
<a href="home.php?viewhrforms=viewhrforms">View All Bookings</a>|
<a href="home.php?viewcountries=viewcountries">Generate Quotation</a>|
<a href="home.php?viewsettlements=viewsettlements">View Generated Quotations</a>|-->
<a href="home.php?viewcountries=viewcountries">Assign Commission To Sales Rep</a>|
<a href="home.php?areareportc=areareportc">View Commission Assigned To Sales Rep</a>|


</div>

<h1 class="br-5">Job Cards Management:: Create JOb Cards<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('viewcountries.php');

}


if ($dropdowntitle==dropdowntitle)
{
?>
<div id="submenu">
<!--<a href="home.php?viewcountries=viewcountries">Book a vehicle </a>|
<a href="home.php?viewhrforms=viewhrforms">View All Bookings</a>|
<a href="home.php?viewcountries=viewcountries">Generate Quotation</a>|
<a href="home.php?viewsettlements=viewsettlements">View Generated Quotations</a>|-->
<a href="home.php?dropdowntitle=dropdowntitle">Create Credit Note</a>|
<a href="home.php?viewdropdowntitle=viewdropdowntitle">View All Credit Notes</a>|


</div>

<h1 class="br-5">Sales:: Generate Credit Note <span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('begin_credit_note.php');

}

if ($viewdropdowntitle==viewdropdowntitle)
{
?>
<div id="submenu">
<!--<a href="home.php?viewcountries=viewcountries">Book a vehicle </a>|
<a href="home.php?viewhrforms=viewhrforms">View All Bookings</a>|
<a href="home.php?viewcountries=viewcountries">Generate Quotation</a>|
<a href="home.php?viewsettlements=viewsettlements">View Generated Quotations</a>|-->
<a href="home.php?dropdowntitle=dropdowntitle">Create Credit Note</a>|
<a href="home.php?viewdropdowntitle=viewdropdowntitle">View All Credit Notes</a>|


</div>

<h1 class="br-5">Sales:: View Generated Credit Note <span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_submited_credit_note.php');

}
//call for add

//call for edit
if($editcountry=='editcountry')
{
?>
<div id="submenu">
<a href="home.php?countryreport=countryreport">Generate Estimates</a>|
<a href="home.php?areareport=areareport">View Estimates Generated</a>|
<!--<a href="home.php?locationreport=locationreport">View Location Level Report</a>|
<a href="home.php?settlementreport=settlementreport">View Settlement Level Report</a>|-->
</div>

<h1 class="br-5">System Settings:: Updating Country Details<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('edit_country.php');



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

<h1 class="br-5">Access Control :: List of All User Groups<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('viewusergroups.php');

}
//call for add
if ($newusergroup==newusergroup)
{
?>
<div id="submenu">
<a href="home.php?newusergroup=newusergroup">Add User Group </a>|
<a href="home.php?usergroups=usergroups">View All User Groups</a>|
</div>

<h1 class="br-5">Access  Control:: Creating New User Group<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('add_user_group.php');

}
//call for edit
if($editgroup=='editgroup')
{
?>
<div id="submenu">
<a href="home.php?newusergroup=newusergroup">Add User Group </a>|
<a href="home.php?usergroups=usergroups">View All User Groups</a>|
</div>

<h1 class="br-5">System Settings:: Updating User group Details<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('edit_user_group.php');



}

if ($viewmodules==viewmodules)
{
?>
<div id="submenu">
<a href="home.php?modules=modules">Add Module</a>|
<a href="home.php?viewmodules=viewmodules">View All Modules</a>|
<a href="home.php?submodules=submodules">Add SubModule</a>|
<a href="home.php?viewsubmodules=viewsubmodules">View SubModule</a>|
</div>

<h1 class="br-5">Access Control: View Module<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('viewmodules.php');

}
$view_budget=$_GET['view_budget'];
if ($view_budget==view_budget)
{
?>
<div id="submenu">
<a href="home.php?create_budget=create_budget">Create Budget</a>|
<a href="home.php?view_budget=view_budget">View Budget</a>|

</div>

<h1 class="br-5">Budgeting: View Budget<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_budget.php');

}

$edit_budget=$_GET['edit_budget'];
if ($edit_budget==edit_budget)
{
?>
<div id="submenu">
<a href="home.php?create_budget=create_budget">Create Budget</a>|
<a href="home.php?view_budget=view_budget">View Budget</a>|
</div>

<h1 class="br-5">Budgeting: Update Budget<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('update_budget.php');

}

$create_budget=$_GET['create_budget'];
if ($create_budget==create_budget)
{
?>
<div id="submenu">
<a href="home.php?create_budget=create_budget">Create Budget</a>|
<a href="home.php?view_budget=view_budget">View Budget</a>|

</div>

<h1 class="br-5">Budgeting: Create Budget<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('create_budget.php');

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

<h1 class="br-5">Access  Control:: Creating New Module<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('add_module.php');

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

<h1 class="br-5">System Settings:: Updating Modules Details<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('edit_modules.php');



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

<h1 class="br-5">Access Control: View Lists Of SubModule<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('viewsubmodules.php');

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

<h1 class="br-5">Access  Control:: Creating New Submodule<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('add_submodule.php');

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

<h1 class="br-5">System Settings:: Updating SubModules Details<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('edit_sub_module.php');



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

<h1 class="br-5">Access Control: View / Deassociate Module to Usergroups<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_assign_modules_usergroups.php');

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

<h1 class="br-5">Access Control: Associate Module to Usergroups<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('assign_modules_usergroups.php');

}


$general_journal=$_GET['general_journal'];

if($general_journal=='general_journal')
{
?><div id="submenu">
<a href="home.php?general_journal=general_journal&sub_module_id=<?php echo $sub_module_id;?>">Create Journal Entry</a>|
<a href="home.php?view_general_journal=view_general_journal&sub_module_id=<?php echo $sub_module_id;?>">View Journal Entry</a>|
</div>

<h1 class="br-5">Account:: Add Journal Entry<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('add_journal.php');

}

$view_general_journal=$_GET['view_general_journal'];

if($view_general_journal=='view_general_journal')
{
?><div id="submenu">
<a href="home.php?general_journal=general_journal&sub_module_id=<?php echo $sub_module_id;?>">Create Journal Entry</a>|
<a href="home.php?view_general_journal=view_general_journal&sub_module_id=<?php echo $sub_module_id;?>">View Journal Entry</a>|
</div>

<h1 class="br-5">Account:: Add Journal Entry<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_journal.php');

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

<h1 class="br-5">Access Control: View / Deassociate SubModules From Modules<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_assign_modules_submodules.php');

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

<h1 class="br-5">Access Control: Associate Sub Modules to Modules<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('assign_modules_submodules.php');

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

<h1 class="br-5">Access Control: View Users<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('viewusers.php');

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

<h1 class="br-5">Access Control: Create A User<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('add_user.php');

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

<h1 class="br-5">System Settings:: Updating Users Details<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('edit_user.php');



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

<h1 class="br-5">Access Control: Reset Users Password<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('viewuserspassword.php');

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

<h1 class="br-5">Access Control: Reset Users Password<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('edituserpass.php');

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

<h1 class="br-5">Access Control: Update My Profile<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('profile.php');

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

<h1 class="br-5">Access Control: Change My Password<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('newpass.php');

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

<h1 class="br-5">Access Control: Deassociate Sub-Modules From Usergroup<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('viewusergroupsm.php');

}
//call for add
if ($usergroupsm==usergroupsm)
{
?>
<div id="submenu">
<a href="home.php?usergroupsm=usergroupsm">Associate Sub Modules To User Group</a>|
<a href="home.php?viewusergroupsm=viewusergroupsm">View User Group and Submodule Association</a>|
</div>

<h1 class="br-5">Access Control: Associate Sub-Modules to Usergroup<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('usergroupsm.php');

}

//call for view
if ($viewproject==viewproject)
{
?>
<div id="submenu">
<a href="home.php?addproject=addproject">Add New Customer</a>|
<a href="home.php?viewproject=viewproject">View All Customers</a>|
<a href="view_customer_balances.php">View Customers Balance Summary</a>|
<!--<a href="home.php?assignproject=assignproject">Assign Projects</a>|
<a href="home.php?viewprojectcountry=viewprojectcountry">View Projects Assigned To Countries</a>|
<a href="home.php?viewprojectarea=viewprojectarea">View Projects Assigned To Areas</a>|
<a href="home.php?viewprojectlocation=viewprojectlocation">View Projects Assigned To Locations</a>|
<a href="home.php?viewprojectsettlement=viewprojectsettlement">View Projects Assigned To Settlements</a>|-->
</div>

<h1 class="br-5">System Settings:: List Of Our Customers<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('viewproject.php');

}
//call for add
if ($addproject==addproject)
{
?><div id="submenu">
<a href="home.php?addproject=addproject">Add New Customer</a>|
<a href="home.php?viewproject=viewproject">View All Customers</a>|
<!--<a href="home.php?assignproject=assignproject">Assign Projects</a>|
<a href="home.php?viewprojectcountry=viewprojectcountry">View Projects Assigned To Countries</a>|
<a href="home.php?viewprojectarea=viewprojectarea">View Projects Assigned To Areas</a>|
<a href="home.php?viewprojectlocation=viewprojectlocation">View Projects Assigned To Locations</a>|
<a href="home.php?viewprojectsettlement=viewprojectsettlement">View Projects Assigned To Settlements</a>|-->
</div>

<h1 class="br-5">System Settings:: Creating New Customer <span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('add_project.php');

}
//call for edit
if($editproject=='editproject')
{
?><div id="submenu">
<a href="home.php?addproject=addproject">Add New Customer</a>|
<a href="home.php?viewproject=viewproject">View All Customers</a>|
<!--<a href="home.php?assignproject=assignproject">Assign Projects</a>|
<a href="home.php?viewprojectcountry=viewprojectcountry">View Projects Assigned To Countries</a>|
<a href="home.php?viewprojectarea=viewprojectarea">View Projects Assigned To Areas</a>|
<a href="home.php?viewprojectlocation=viewprojectlocation">View Projects Assigned To Locations</a>|
<a href="home.php?viewprojectsettlement=viewprojectsettlement">View Projects Assigned To Settlements</a>|-->
</div>

<h1 class="br-5">System Settings:: Update Customer Details<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('edit_project.php');



}
//call for assign projects to areas of implementation
if($assignproject=='assignproject')
{
?><div id="submenu">
<a href="home.php?addproject=addproject">Add New Customer</a>|
<a href="home.php?viewproject=viewproject">View All Customers</a>|
<!--<a href="home.php?assignproject=assignproject">Assign Projects</a>|
<a href="home.php?viewprojectcountry=viewprojectcountry">View Projects Assigned To Countries</a>|
<a href="home.php?viewprojectarea=viewprojectarea">View Projects Assigned To Areas</a>|
<a href="home.php?viewprojectlocation=viewprojectlocation">View Projects Assigned To Locations</a>|
<a href="home.php?viewprojectsettlement=viewprojectsettlement">View Projects Assigned To Settlements</a>|-->
</div>

<h1 class="br-5">System Settings:: Assigning Projects To Countries Of Implementation<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('assign_project_to_country.php');



}
//assign project to area
if($assignprojectarea=='assignprojectarea')
{
?><div id="submenu">
<a href="home.php?addproject=addproject">Add New Customer</a>|
<a href="home.php?viewproject=viewproject">View All Customers</a>|
<!--<a href="home.php?assignproject=assignproject">Assign Projects</a>|
<a href="home.php?viewprojectcountry=viewprojectcountry">View Projects Assigned To Countries</a>|
<a href="home.php?viewprojectarea=viewprojectarea">View Projects Assigned To Areas</a>|
<a href="home.php?viewprojectlocation=viewprojectlocation">View Projects Assigned To Locations</a>|
<a href="home.php?viewprojectsettlement=viewprojectsettlement">View Projects Assigned To Settlements</a>|-->
</div>

<h1 class="br-5">System Settings:: Assigning Projects To Area Of Implementation<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('assign_project_to_area.php');



}

if($assignprojectlocation=='assignprojectlocation')
{
?><div id="submenu">
<a href="home.php?addproject=addproject">Add New Customer</a>|
<a href="home.php?viewproject=viewproject">View All Customers</a>|
<!--<a href="home.php?assignproject=assignproject">Assign Projects</a>|
<a href="home.php?viewprojectcountry=viewprojectcountry">View Projects Assigned To Countries</a>|
<a href="home.php?viewprojectarea=viewprojectarea">View Projects Assigned To Areas</a>|
<a href="home.php?viewprojectlocation=viewprojectlocation">View Projects Assigned To Locations</a>|
<a href="home.php?viewprojectsettlement=viewprojectsettlement">View Projects Assigned To Settlements</a>|-->
</div>

<h1 class="br-5">System Settings:: Assigning Projects To Location Of Implementation<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('assign_project_to_location.php');



}

if($assignprojectend=='assignprojectend')
{
?><div id="submenu">
<a href="home.php?addproject=addproject">Add New Customer</a>|
<a href="home.php?viewproject=viewproject">View All Customers</a>|
<!--<a href="home.php?assignproject=assignproject">Assign Projects</a>|
<a href="home.php?viewprojectcountry=viewprojectcountry">View Projects Assigned To Countries</a>|
<a href="home.php?viewprojectarea=viewprojectarea">View Projects Assigned To Areas</a>|
<a href="home.php?viewprojectlocation=viewprojectlocation">View Projects Assigned To Locations</a>|
<a href="home.php?viewprojectsettlement=viewprojectsettlement">View Projects Assigned To Settlements</a>|-->
</div>

<h1 class="br-5">System Settings:: Record Saved Successfully!!<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('assign_project_end.php');



}

if($assignprojectsettlement=='assignprojectsettlement')
{
?><div id="submenu">
<a href="home.php?addproject=addproject">Add New Customer</a>|
<a href="home.php?viewproject=viewproject">View All Customers</a>|
<!--<a href="home.php?assignproject=assignproject">Assign Projects</a>|
<a href="home.php?viewprojectcountry=viewprojectcountry">View Projects Assigned To Countries</a>|
<a href="home.php?viewprojectarea=viewprojectarea">View Projects Assigned To Areas</a>|
<a href="home.php?viewprojectlocation=viewprojectlocation">View Projects Assigned To Locations</a>|
<a href="home.php?viewprojectsettlement=viewprojectsettlement">View Projects Assigned To Settlements</a>|-->
</div>

<h1 class="br-5">System Settings:: Assigning Projects To Settlements Of Implementation<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('assign_project_to_settlement.php');



}

if($viewprojectcountry=='viewprojectcountry')
{
?><div id="submenu">
<a href="home.php?addproject=addproject">Add New Customer</a>|
<a href="home.php?viewproject=viewproject">View All Customers</a>|
<!--<a href="home.php?assignproject=assignproject">Assign Projects</a>|
<a href="home.php?viewprojectcountry=viewprojectcountry">View Projects Assigned To Countries</a>|
<a href="home.php?viewprojectarea=viewprojectarea">View Projects Assigned To Areas</a>|
<a href="home.php?viewprojectlocation=viewprojectlocation">View Projects Assigned To Locations</a>|
<a href="home.php?viewprojectsettlement=viewprojectsettlement">View Projects Assigned To Settlements</a>|-->
</div>

<h1 class="br-5">System Settings:: View Or Deassigning Projects From Countries Of Implementation<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_assign_project_to_country.php');



}

if($viewprojectarea=='viewprojectarea')
{
?><div id="submenu">
<a href="home.php?addproject=addproject">Add New Customer</a>|
<a href="home.php?viewproject=viewproject">View All Customers</a>|
<!--<a href="home.php?assignproject=assignproject">Assign Projects</a>|
<a href="home.php?viewprojectcountry=viewprojectcountry">View Projects Assigned To Countries</a>|
<a href="home.php?viewprojectarea=viewprojectarea">View Projects Assigned To Areas</a>|
<a href="home.php?viewprojectlocation=viewprojectlocation">View Projects Assigned To Locations</a>|
<a href="home.php?viewprojectsettlement=viewprojectsettlement">View Projects Assigned To Settlements</a>|-->
</div>

<h1 class="br-5">System Settings:: View Or Deassigning Projects From Areas Of Implementation<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_assign_project_to_area.php');



}

if($viewprojectlocation=='viewprojectlocation')
{
?><div id="submenu">
<a href="home.php?addproject=addproject">Add New Customer</a>|
<a href="home.php?viewproject=viewproject">View All Customers</a>|
<!--<a href="home.php?assignproject=assignproject">Assign Projects</a>|
<a href="home.php?viewprojectcountry=viewprojectcountry">View Projects Assigned To Countries</a>|
<a href="home.php?viewprojectarea=viewprojectarea">View Projects Assigned To Areas</a>|
<a href="home.php?viewprojectlocation=viewprojectlocation">View Projects Assigned To Locations</a>|
<a href="home.php?viewprojectsettlement=viewprojectsettlement">View Projects Assigned To Settlements</a>|-->
</div>

<h1 class="br-5">System Settings:: View Or Deassigning Projects From Locations Of Implementation<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_assign_project_to_location.php');



}

if($viewprojectsettlement=='viewprojectsettlement')
{
?><div id="submenu">
<a href="home.php?addproject=addproject">Add New Customer</a>|
<a href="home.php?viewproject=viewproject">View All Customers</a>|
<!--<a href="home.php?assignproject=assignproject">Assign Projects</a>|
<a href="home.php?viewprojectcountry=viewprojectcountry">View Projects Assigned To Countries</a>|
<a href="home.php?viewprojectarea=viewprojectarea">View Projects Assigned To Areas</a>|
<a href="home.php?viewprojectlocation=viewprojectlocation">View Projects Assigned To Locations</a>|
<a href="home.php?viewprojectsettlement=viewprojectsettlement">View Projects Assigned To Settlements</a>|-->
</div>

<h1 class="br-5">System Settings:: View Or Deassigning Projects From Settlements Of Implementation<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_assign_project_to_settlement.php');

}


//code for competencies
if ($viewcompetency==viewcompetency)
{
?>
<div id="submenu">
<a href="home.php?viewcompetency=viewcompetency">Update Company Details</a>|
</div>

<h1 class="br-5">System Settings:: View Company Details / Settings<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('viewcompetency.php');

}
//call for add
if ($addcompetency==addcompetency)
{
?><div id="submenu">
<a href="home.php?addsubproject=addsubproject">Add Items Category</a>|
<a href="home.php?viewsubproject=viewsubproject">View Item Category</a>|
<a href="home.php?assignsubprojectarea=assignsubprojectarea">Add Sub Category</a>|
<a href="home.php?addcompetency=addcompetency">View Sub Category</a>|
</div>

<h1 class="br-5">Items Sub Category Management:: View Sub Category<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('add_competency.php');

}



if ($viewhrforms==viewhrforms)
{
?> 

<div id="submenu">
<a href="home.php?addsubproject=addsubproject">Add Items Category</a>|
<a href="home.php?viewsubproject=viewsubproject">View Item Category</a>|
<a href="home.php?assignsubprojectarea=assignsubprojectarea">Add Sub Category</a>|
<a href="home.php?addcompetency=addcompetency">View Sub Category</a>|

</div>

<h1 class="br-5">Items Sub Category Management:: Update Sub Category<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('upload_forms.php');

}

if($editcompetency=='editcompetency')
{
?><div id="submenu">
<a href="home.php?viewcompetency=viewcompetency">Update Company Details</a>|
</div>

<h1 class="br-5">System Settings:: Update Company Details / Settings<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('edit_competency.php');



}
//code for sub-projects
if ($viewsubproject==viewsubproject)
{
?>
<div id="submenu">
<a href="home.php?addsubproject=addsubproject">Add Items Category</a>|
<a href="home.php?viewsubproject=viewsubproject">View Item Category</a>|
<a href="home.php?assignsubprojectarea=assignsubprojectarea">Add Sub Category</a>|
<a href="home.php?addcompetency=addcompetency">View Sub Category</a>|
<!--<a href="home.php?assignsubproject=assignsubproject">Assign Sub-Projects</a>|
<a href="home.php?viewsubprojectcountry=viewsubprojectcountry">Sub-Projects Assigned To Countries</a>|
<a href="home.php?viewsubprojectarea=viewsubprojectarea">Sub-Projects Assigned To Areas</a>|
<a href="home.php?viewsubprojectlocation=viewsubprojectlocation">Sub-Projects Assigned To Locations</a>|
<a href="home.php?viewsubprojectsettlement=viewsubprojectsettlement">Sub-Projects Assigned To Settlements</a>|-->
</div>

<h1 class="br-5">System Settings:: View Items Categories<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('viewsubproject.php');

}
//call for add
if ($addsubproject==addsubproject)
{
?><div id="submenu">
<a href="home.php?addsubproject=addsubproject">Add Items Category</a>|
<a href="home.php?viewsubproject=viewsubproject">View Item Category</a>|
<a href="home.php?assignsubprojectarea=assignsubprojectarea">Add Sub Category</a>|
<a href="home.php?addcompetency=addcompetency">View Sub Category</a>|
<!--<a href="home.php?assignsubproject=assignsubproject">Assign Sub-Projects</a>|
<a href="home.php?viewsubprojectcountry=viewsubprojectcountry">Sub-Projects Assigned To Countries</a>|
<a href="home.php?viewsubprojectarea=viewsubprojectarea">Sub-Projects Assigned To Areas</a>|
<a href="home.php?viewsubprojectlocation=viewsubprojectlocation">Sub-Projects Assigned To Locations</a>|
<a href="home.php?viewsubprojectsettlement=viewsubprojectsettlement">Sub-Projects Assigned To Settlements</a>|-->
</div>

<h1 class="br-5">System Settings:: Creating New Item Category<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('add_subproject.php');

}
//call for edit
if($editsubproject=='editsubproject')
{
?><div id="submenu">
<a href="home.php?addsubproject=addsubproject">Add Items Category</a>|
<a href="home.php?viewsubproject=viewsubproject">View Item Category</a>|
<!--<a href="home.php?assignsubproject=assignsubproject">Assign Sub-Projects</a>|
<a href="home.php?viewsubprojectcountry=viewsubprojectcountry">Sub-Projects Assigned To Countries</a>|
<a href="home.php?viewsubprojectarea=viewsubprojectarea">Sub-Projects Assigned To Areas</a>|
<a href="home.php?viewsubprojectlocation=viewsubprojectlocation">Sub-Projects Assigned To Locations</a>|
<a href="home.php?viewsubprojectsettlement=viewsubprojectsettlement">Sub-Projects Assigned To Settlements</a>|-->
</div>

<h1 class="br-5">System Settings:: Updating Item Category Details<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('edit_subproject.php');



}

if($assignsubproject=='assignsubproject')
{
?><div id="submenu">
<a href="home.php?viewsubprojectcountry=viewsubprojectcountry">Record Received Items</a>|
<a href="home.php?viewsubprojectarea=viewsubprojectarea">View Received Items</a>|
<a href="home.php?assignsubproject=assignsubproject">View Stock Inventory</a>|
<!--<a href="home.php?viewsubprojectcountry=viewsubprojectcountry">Sub-Projects Assigned To Countries</a>|
<a href="home.php?viewsubprojectarea=viewsubprojectarea">Sub-Projects Assigned To Areas</a>|
<a href="home.php?viewsubprojectlocation=viewsubprojectlocation">Sub-Projects Assigned To Locations</a>|
<a href="home.php?viewsubprojectsettlement=viewsubprojectsettlement">Sub-Projects Assigned To Settlements</a>|-->
</div>

<h1 class="br-5">Stock Inventory:: View Items Availlable in the Warehouse (Store)<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('assign_sub_project_to_country.php');



}

if($assignsubprojectarea=='assignsubprojectarea')
{
?>
<div id="submenu">
<a href="home.php?addsubproject=addsubproject">Add Items Category</a>|
<a href="home.php?viewsubproject=viewsubproject">View Item Category</a>|
<a href="home.php?assignsubprojectarea=assignsubprojectarea">Add Sub Category</a>|
<a href="home.php?addcompetency=addcompetency">View Sub Category</a>|
</div>

<h1 class="br-5">Items Management:: Add Items Sub Category<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('add_item_sub_category.php');



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

<h1 class="br-5">System Settings:: Assign Sub Projects To Locations Of Implementation<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('assign_sub_project_to_location.php');



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

<h1 class="br-5">System Settings:: Assign Sub Projects To Settlement Of Implementation<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('assign_sub_project_to_settlement.php');



}


if($assignsubprojectend=='assignsubprojectend')
{
?><div id="submenu">
<a href="home.php?assignsubprojectend=assignsubprojectend">View Actualized Estimates </a>|
<!--<a href="home.php?viewsubproject=viewsubproject">View Sub-projects</a>|
<a href="home.php?assignsubproject=assignsubproject">Assign Sub-Projects</a>|
<a href="home.php?viewsubprojectcountry=viewsubprojectcountry">Sub-Projects Assigned To Countries</a>|
<a href="home.php?viewsubprojectarea=viewsubprojectarea">Sub-Projects Assigned To Areas</a>|
<a href="home.php?viewsubprojectlocation=viewsubprojectlocation">Sub-Projects Assigned To Locations</a>|
<a href="home.php?viewsubprojectsettlement=viewsubprojectsettlement">Sub-Projects Assigned To Settlements</a>|-->
</div>

<h1 class="br-5">System Reports:: List Of Actualized Estimates ie Estimates converted to Job Card<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('assign_sub_project_end.php');



}


if($viewsubprojectcountry=='viewsubprojectcountry')
{
?><div id="submenu">
<a href="home.php?viewsubprojectcountry=viewsubprojectcountry">Record Received Items</a>|
<a href="home.php?viewsubprojectarea=viewsubprojectarea">View Received Items</a>|
<a href="home.php?assignsubproject=assignsubproject">View Stock Inventory</a>|
<!--<a href="home.php?viewsubprojectcountry=viewsubprojectcountry">Sub-Projects Assigned To Countries</a>|
<a href="home.php?viewsubprojectarea=viewsubprojectarea">Sub-Projects Assigned To Areas</a>|
<a href="home.php?viewsubprojectlocation=viewsubprojectlocation">Sub-Projects Assigned To Locations</a>|
<a href="home.php?viewsubprojectsettlement=viewsubprojectsettlement">Sub-Projects Assigned To Settlements</a>|-->
</div>

<h1 class="br-5">System Settings:: Record Received Items Into The warehouse<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_assign_sub_project_to_country.php');



}


if($viewsubprojectarea=='viewsubprojectarea')
{
?><div id="submenu">
<a href="home.php?viewsubprojectcountry=viewsubprojectcountry">Record Received Items</a>|
<a href="home.php?viewsubprojectarea=viewsubprojectarea">View Received Items</a>|
<a href="home.php?assignsubproject=assignsubproject">View Stock Inventory</a>|
<!--<a href="home.php?viewsubprojectcountry=viewsubprojectcountry">Sub-Projects Assigned To Countries</a>|
<a href="home.php?viewsubprojectarea=viewsubprojectarea">Sub-Projects Assigned To Areas</a>|
<a href="home.php?viewsubprojectlocation=viewsubprojectlocation">Sub-Projects Assigned To Locations</a>|
<a href="home.php?viewsubprojectsettlement=viewsubprojectsettlement">Sub-Projects Assigned To Settlements</a>|-->
</div>

<h1 class="br-5">Stock Inventory:: List Of Received Items<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_assign_sub_project_to_area.php');



}

if($viewsubprojectlocation=='viewsubprojectlocation')
{
?><div id="submenu">
<a href="home.php?settlementreportc=settlementreportc">Close Job Card </a>|
<a href="home.php?processnatflight=processnatflight">View Closed Job Cards</a>|
<a href="home.php?processnatflight=processnatflight">View Job Cards Submited For Invoicing</a>|
<a href="home.php?viewsubprojectcountry=viewsubprojectcountry">Job Card Submited / With Pending Quotation</a>|
<a href="home.php?viewvisarenewals=viewvisarenewals">View Canceled Invoices</a>|
<!--<a href="home.php?viewsubprojectlocation=viewsubprojectlocation">Sub-Projects Assigned To Locations</a>|
<a href="home.php?viewsubprojectsettlement=viewsubprojectsettlement">Sub-Projects Assigned To Settlements</a>|-->
</div>

<h1 class="br-5">Job Card:: Closing Job Card And Submit for Invoicing<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_assign_sub_project_to_location.php');



}

if($chart=='chart')
{
?><div id="submenu">
<a href="home.php?add_chart=add_chart&sub_module_id=<?php echo $sub_module_id; ?>">Add Chart Of Account </a>|
<a href="home.php?chart=chart&sub_module_id=<?php echo $sub_module_id; ?>">View Chart Of Accounts</a>|


</div>

<h1 class="br-5">Master:: View Chart Of Accounts<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_charts.php');



}

$add_chart=$_GET['add_chart'];
if($add_chart=='add_chart')
{
?><div id="submenu">
<a href="home.php?add_chart=add_chart&sub_module_id=<?php echo $sub_module_id; ?>">Add Chart Of Account </a>|
<a href="home.php?chart=chart&sub_module_id=<?php echo $sub_module_id; ?>">View Chart Of Accounts</a>|


</div>

<h1 class="br-5">Master:: Add Chart Of Accounts<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('add_chart.php');



}

if($processnatflight=='processnatflight')
{
?><div id="submenu">

<a href="generate_cash_sales.php">Generate Cash Sale</a>|
<a href="home.php?processnatflight=processnatflight">View Cash Sales Generated</a>|

<!--<a href="home.php?viewsubprojectlocation=viewsubprojectlocation">Sub-Projects Assigned To Locations</a>|
<a href="home.php?viewsubprojectsettlement=viewsubprojectsettlement">Sub-Projects Assigned To Settlements</a>|-->
<!--<a href="home.php?viewsubprojectarea=viewsubprojectarea">Sub-Projects Assigned To Areas</a>|
<a href="home.php?viewsubprojectlocation=viewsubprojectlocation">Sub-Projects Assigned To Locations</a>|
<a href="home.php?viewsubprojectsettlement=viewsubprojectsettlement">Sub-Projects Assigned To Settlements</a>|-->
</div>

<h1 class="br-5">Cash Sales:: View Cash Sales<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_submited_invoice.php');



}

if($processnatflightc=='processnatflightc')
{
?><div id="submenu">
<a href="home.php?settlementreportc=settlementreportc">View Approved Cash Sales Made</a>|

<!--<a href="home.php?viewsubprojectlocation=viewsubprojectlocation">Sub-Projects Assigned To Locations</a>|
<a href="home.php?viewsubprojectsettlement=viewsubprojectsettlement">Sub-Projects Assigned To Settlements</a>|-->
<!--<a href="home.php?viewsubprojectarea=viewsubprojectarea">Sub-Projects Assigned To Areas</a>|
<a href="home.php?viewsubprojectlocation=viewsubprojectlocation">Sub-Projects Assigned To Locations</a>|
<a href="home.php?viewsubprojectsettlement=viewsubprojectsettlement">Sub-Projects Assigned To Settlements</a>|-->
</div>

<h1 class="br-5">Cash Sales:: View Cash Sales Generated (Approved)<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_closed_job_cards.php');



}
//$=$_GET['viewvisarenewals'];
if($viewvisarenewals=='viewvisarenewals')
{
?><div id="submenu">
<a href="home.php?viewvisarenewals=viewvisarenewals">Service Revenue Summary (Per Invoice)</a>|
<a href="home.php?viewsubprojectsettlement=viewsubprojectsettlement">Service Revenue Summary (Per Service)</a>|
<!--<a href="home.php?cash_sale_summary=cash_sale_summary">Sales Summary (Per Cash Sales)</a>|
<a href="home.php?sale_item_all=sale_item_all">Sales Summary (Both Invoice and Cash Sales)</a>|
<a href="home.php?viewsubprojectlocation=viewsubprojectlocation">Sub-Projects Assigned To Locations</a>|
<a href="home.php?viewsubprojectsettlement=viewsubprojectsettlement">Sub-Projects Assigned To Settlements</a>|-->
</div>

<h1 class="br-5">Service Revenue:: View Summary Service Revenue Report<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_biweekly.php');



}

if($cash_sale_summary=='cash_sale_summary')
{
?><div id="submenu">
<a href="home.php?viewvisarenewals=viewvisarenewals">Service Revenue Summary (Per Invoice)</a>|
<a href="home.php?viewsubprojectsettlement=viewsubprojectsettlement">Service Revenue Summary (Per Service)</a>|
<a href="home.php?cash_sale_summary=cash_sale_summary">Service Revenue Summary (Per Cash Revenue)</a>|
<a href="home.php?sale_item_all=sale_item_all">Service Revenue Summary (Both Invoice and Cash Revenue)</a>|
<!--<a href="home.php?processnatflight=processnatflight">View Closed Job Cards</a>|
<a href="home.php?processnatflight=processnatflight">View Job Cards Submited For Invoicing</a>|
<a href="home.php?viewsubprojectcountry=viewsubprojectcountry">Job Card Submited / With Pending Quotation</a>|
<a href="home.php?viewvisarenewals=viewvisarenewals">View Canceled Invoices</a>|
<a href="home.php?viewsubprojectlocation=viewsubprojectlocation">Sub-Projects Assigned To Locations</a>|
<a href="home.php?viewsubprojectsettlement=viewsubprojectsettlement">Sub-Projects Assigned To Settlements</a>|-->
</div>

<h1 class="br-5">Service Revenue:: View Summary Cash Rvenue Report<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('cash_sale_summary.php');



}

if($viewsubprojectsettlement=='viewsubprojectsettlement')
{
?><div id="submenu">
<a href="home.php?viewvisarenewals=viewvisarenewals">Service Revenue Summary (Per Invoice)</a>|
<a href="home.php?viewsubprojectsettlement=viewsubprojectsettlement">Service Revenue Summary (Per Service)</a>|
<!--<a href="home.php?cash_sale_summary=cash_sale_summary">Sales Summary (Per Cash Sales)</a>|
<a href="home.php?sale_item_all=sale_item_all">Sales Summary (Both Invoice and Cash Sales)</a>|
<a href="home.php?viewsubprojectlocation=viewsubprojectlocation">Sub-Projects Assigned To Locations</a>|
<a href="home.php?viewsubprojectsettlement=viewsubprojectsettlement">Sub-Projects Assigned To Settlements</a>|-->
</div>

<h1 class="br-5">Service Revenue:: View Revenue Report Per Service<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_assign_project_to_settlement.php');



}



if($sale_item_all=='sale_item_all')
{
?><div id="submenu">
<a href="home.php?viewvisarenewals=viewvisarenewals">Service Revenue Summary (Per Invoice)</a>|
<a href="home.php?viewsubprojectsettlement=viewsubprojectsettlement">Service Revenue Summary (Per Service)</a>|
<a href="home.php?cash_sale_summary=cash_sale_summary">Service Revenue Summary (Per Cash Revenue)</a>|
<a href="home.php?sale_item_all=sale_item_all">Service Revenue Summary (Both Invoice and Cash Revenue)</a>|
<!--<a href="home.php?processnatflight=processnatflight">View Closed Job Cards</a>|
<a href="home.php?processnatflight=processnatflight">View Job Cards Submited For Invoicing</a>|
<a href="home.php?viewsubprojectcountry=viewsubprojectcountry">Job Card Submited / With Pending Quotation</a>|
<a href="home.php?viewvisarenewals=viewvisarenewals">View Canceled Invoices</a>|
<a href="home.php?viewsubprojectlocation=viewsubprojectlocation">Sub-Projects Assigned To Locations</a>|
<a href="home.php?viewsubprojectsettlement=viewsubprojectsettlement">Sub-Projects Assigned To Settlements</a>|-->
</div>

<h1 class="br-5">Sales:: View Summary Total Sales Summary (Both Invoice and cash sales)<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('sales_per_item_all.php');



}



//call for view


if ($pending_booking==pending_booking)
{
?> <div id="submenu">
<a href="begin_stock_transfer.php">Record Stock Transfer</a>|
<!--<a href="home.php?pending_booking=pending_booking">View Pending Bookings</a>|-->
<a href="home.php?pending_booking=pending_booking">View Stock Transfer</a>|
<!--<a href="home.php?clock=clock">Record Returns Inwards</a>|
<a href="home.php?stopclock=stopclock">View Return Inwards</a>|-->
</div>

<h1 class="br-5">Stock Transfer:: View Stock Transfers<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('pending_booking.php');

}

/////////////////////////////////block for setting template
//call for view
$view_invoice_items=$_GET['view_invoice_items'];
if ($view_invoice_items==view_invoice_items)
{
?>
<div id="submenu">
<!--<a href="home.php?viewsubproject=viewsubproject">Set Up Template</a>|-->
<a href="home.php?setuptemplate1=setuptemplate1">Add New Item</a>|
<a href="home.php?viewsetuptemplate=viewsetuptemplate">View Store Items</a>|
<a href="home.php?view_invoice_items=view_invoice_items">View Invoice Items</a>|
<a href="home.php?replicatesetuptemplate=replicatesetuptemplate">View Deactivated Items</a>|
</div>

<h1 class="br-5">System Settings:: List Of Invoice Items<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_invoice_items.php');

}



if ($viewsetuptemplate==viewsetuptemplate)
{
?>
<div id="submenu">
<!--<a href="home.php?viewsubproject=viewsubproject">Set Up Template</a>|-->
<a href="home.php?setuptemplate1=setuptemplate1">Add New Item</a>|
<a href="home.php?viewsetuptemplate=viewsetuptemplate">View Store Items</a>|
<a href="home.php?view_invoice_items=view_invoice_items">View Invoice Items</a>|
<a href="home.php?replicatesetuptemplate=replicatesetuptemplate">View Deactivated Items</a>|
</div>

<h1 class="br-5">System Settings:: View Items<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_set_template.php');

}

if (isset($_GET['post_item_ob']))
{
?>
<div id="submenu">
<!--<a href="home.php?viewsubproject=viewsubproject">Set Up Template</a>|-->
<a href="home.php?post_item_ob">Post Items Opening Balance To Accounts</a>|
<a href="home.php?view_post_item_ob">View Posted Items Opening Balance To Accounts</a>|

</div>

<h1 class="br-5">Accounts:: Post Items Opening Balance To Accounts<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('post_item_ob.php');

}

if (isset($_GET['view_post_item_ob']))
{
?>
<div id="submenu">
<!--<a href="home.php?viewsubproject=viewsubproject">Set Up Template</a>|-->
<a href="home.php?post_item_ob">Posted Items Opening Balance To Accounts</a>|
<a href="home.php?view_post_item_ob">View Posted Items Opening Balance To Accounts</a>|

</div>

<h1 class="br-5">Accounts:: View Post Items Opening Balance To Accounts<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_posted_item_ob.php');

}

// call for copy pasting the template
if ($replicatesetuptemplate==replicatesetuptemplate)
{
?>
<div id="submenu">
<!--<a href="home.php?viewsubproject=viewsubproject">Set Up Template</a>|-->
<a href="home.php?setuptemplate1=setuptemplate1">Add New Item</a>|
<a href="home.php?viewsetuptemplate=viewsetuptemplate">View Store Items</a>|
<a href="home.php?view_invoice_items=view_invoice_items">View Invoice Items</a>|
<a href="home.php?replicatesetuptemplate=replicatesetuptemplate">View Deactivated Items</a>|
<!--<a href="home.php?replicatesetuptemplate=replicatesetuptemplate">Copy template to a Location</a>|-->

</div>

<h1 class="br-5">System Settings:: View Bi-Weekly Data Entry Template<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('deactivated_items.php');

}

//call for assign template
if ($setuptemplate==setuptemplate)
{
?>
<div id="submenu">
<!--<a href="home.php?viewsubproject=viewsubproject">Set Up Template</a>|-->
<a href="home.php?setuptemplate1=setuptemplate1">Add New Item</a>|
<a href="home.php?viewsetuptemplate=viewsetuptemplate">View Store Items</a>|
<a href="home.php?view_invoice_items=view_invoice_items">View Invoice Items</a>|
<a href="home.php?replicatesetuptemplate=replicatesetuptemplate">View Deactivated Items</a>|
<!--<a href="home.php?replicatesetuptemplate=replicatesetuptemplate">Copy template to a Location</a>|-->
</div>

<h1 class="br-5">System Settings:: Updating Items Details<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('setuptemplate.php');

}

if ($setuptemplate1==setuptemplate1)
{
?>
<div id="submenu">
<!--<a href="home.php?viewsubproject=viewsubproject">Set Up Template</a>|-->
<a href="home.php?setuptemplate1=setuptemplate1">Add New Item</a>|
<a href="home.php?viewsetuptemplate=viewsetuptemplate">View Store Items</a>|
<a href="home.php?view_invoice_items=view_invoice_items">View Invoice Items</a>|
<a href="home.php?replicatesetuptemplate=replicatesetuptemplate">View Deactivated Items</a>|
<!--<a href="home.php?replicatesetuptemplate=replicatesetuptemplate">Copy template to a Location</a>|-->
</div>

<h1 class="br-5">System Settings:: Add New Items<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('add_item.php');

}


$trial_balance=$_GET['trial_balance'];

if ($trial_balance==trial_balance)
{
?>
<div id="submenu">
<!--<a href="home.php?viewsubproject=viewsubproject">Set Up Template</a>|-->
<a href="home.php?trial_balance=trial_balance">Trial Balance</a>|
<!--<a href="home.php?replicatesetuptemplate=replicatesetuptemplate">Copy template to a Location</a>|-->
</div>

<h1 class="br-5">Financial Report:: Trial Balance<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('trial_balance.php');

}

$conso_bal=$_GET['conso_bal'];

if ($conso_bal==conso_bal)
{
?>
<div id="submenu">
<!--<a href="home.php?viewsubproject=viewsubproject">Set Up Template</a>|-->
<a href="javascript:history.back(1)">Go Back</a>|
<!--<a href="home.php?replicatesetuptemplate=replicatesetuptemplate">Copy template to a Location</a>|-->
</div>

<h1 class="br-5">Accounts:: Consolidated Balance Sheet<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('consolidated_balance_sheet.php');

}

$det_bal=$_GET['det_bal'];

if ($det_bal==det_bal)
{
?>
<div id="submenu">
<!--<a href="home.php?viewsubproject=viewsubproject">Set Up Template</a>|-->
<a href="javascript:history.back(1)">Go Back</a>|
<!--<a href="home.php?replicatesetuptemplate=replicatesetuptemplate">Copy template to a Location</a>|-->
</div>

<h1 class="br-5">Accounts:: Detailed Balance Sheet<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('detailed_balance_sheet.php');

}

$pla_consolidated=$_GET['pla_consolidated'];

if ($pla_consolidated==pla_consolidated)
{
?>
<div id="submenu">
<!--<a href="home.php?viewsubproject=viewsubproject">Set Up Template</a>|-->
<a href="javascript:history.back(1)">Go Back</a>|
<!--<a href="home.php?replicatesetuptemplate=replicatesetuptemplate">Copy template to a Location</a>|-->
</div>

<h1 class="br-5">Accounts:: Consolidated Profit and Loss Account<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('consolidated_pla.php');

}


$detailed_pla=$_GET['detailed_pla'];

if ($detailed_pla==detailed_pla)
{
?>
<div id="submenu">
<!--<a href="home.php?viewsubproject=viewsubproject">Set Up Template</a>|-->
<a href="javascript:history.back(1)">Go Back</a>|
<!--<a href="home.php?replicatesetuptemplate=replicatesetuptemplate">Copy template to a Location</a>|-->
</div>

<h1 class="br-5">Accounts:: Detailed Profit and Loss Account<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('detailed_pla.php');

}


$chart_details=$_GET['chart_details'];

if($chart_details=='chart_details')
{
?><div id="submenu">
<a href="javascript:history.back(1)">Go Back</a>|
</div>

<h1 class="br-5">Account:: Account Transactions<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('chart_details.php');

}

$chart_details_cons=$_GET['chart_details_cons'];

if($chart_details_cons=='chart_details_cons')
{
?><div id="submenu">
<a href="javascript:history.back(1)">Go Back</a>|
</div>

<h1 class="br-5">Account:: Account Transactions<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('chart_details_cons.php');

}

//call for edit
if($editsetuptemplate=='editsetuptemplate')
{
?>
<div id="submenu">
<!--<a href="home.php?viewsubproject=viewsubproject">Set Up Template</a>|-->
<a href="home.php?setuptemplate1=setuptemplate1">Add New Item</a>|
<a href="home.php?viewsetuptemplate=viewsetuptemplate">View Store Items</a>|
<a href="home.php?view_invoice_items=view_invoice_items">View Invoice Items</a>|
<a href="home.php?replicatesetuptemplate=replicatesetuptemplate">View Deactivated Items</a>|
<!--<a href="home.php?replicatesetuptemplate=replicatesetuptemplate">Copy template to a Location</a>|-->
</div>

<h1 class="br-5">System Settings:: Updating Implementation Areas Details<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('edit_area.php');



}
//////////////////////////////////////////end of setting template


/////////////////////////////////block for areas
//call for view
if ($viewsponsor==viewsponsor)
{
?>
<div id="submenu">
<a href="home.php?newsponsor=newsponsor">Convert Quotation To Job Card</a>|
<a href="home.php?viewsponsor=viewsponsor">View Converted Quotation To Job Card</a>|
</div>

<h1 class="br-5">Quotations:: View Converted Quotation To Job Card<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('viewareas.php');

}

//call for add
if ($newsponsor==newsponsor)
{
?>
<div id="submenu">
<a href="home.php?newsponsor=newsponsor">View Canceled Job Cards</a>|
<!--<a href="home.php?viewsponsor=viewsponsor">View Converted Quotation To Job Card</a>|-->
</div>

<h1 class="br-5">Job Cards:: View Canceled Job Cards<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('add_area.php');

}

//call for edit
if($editarea=='editarea')
{
?>
<div id="submenu">
<a href="home.php?locationreport=locationreport">Create Service Item</a>|
<a href="home.php?settlementreport=settlementreport">View Servicce Items</a>|
<a href="home.php?projectdonor=projectdonor">Create Costing Item</a>|
<a href="home.php?viewprojectdonor=viewprojectdonor">View All Costing Item</a>|

</div>

<h1 class="br-5">System Settings:: Updating Costing Items<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('edit_area.php');



}
//////////////////////////////////////////end of areas

/////////////////////////////////block for location

//call for view
if ($viewlocation==viewlocation)
{
?>
<div id="submenu">
<a href="home.php?newsponsor=newsponsor">Convert Quotation To Job Card</a>|
<a href="home.php?viewsponsor=viewsponsor">View Converted Quotation To Job Card</a>|
</div>

<h1 class="br-5">Quotation Management:: Convert Quotation To Job Card <span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('viewlocations.php');

}

if ($addformsections=='addformsections')
{
?>
<div id="submenu">

<a href="home.php?addformsections=addformsections">Create Sales Return (Credit Note)</a>|
<a href="view_sales_returns.php">View All Sales Returns (Credit Note)</a>|
<!--<a href="home.php?benefitded=benefitded">View Approved Cash Sales</a>|
<a href="home.php?viewbenefitded=viewbenefitded">Workshop Efficiency Report</a>|
<a href="home.php?viewcountries=viewcountries">Generate Quotation</a>|
<a href="home.php?viewsettlements=viewsettlements">View Generated Quotations</a>|
<a href="home.php?viewcountries=viewcountries">Create Job Card</a>|
<a href="home.php?areareportc=areareportc">View Generated Job Cards</a>|-->
</div>

<h1 class="br-5">Sales:: Generate Sales Returns (Credit Note)<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('technician_efficiency.php');

}
if ($viewdeduction=='viewdeduction')
{
?>
<div id="submenu">
<a href="home.php?viewdeduction=viewdeduction">Labour Utilization Report</a>|
<!--<a href="home.php?viewbenefitded=viewbenefitded">Workshop Efficiency Report</a>|
<a href="home.php?viewcountries=viewcountries">Generate Quotation</a>|
<a href="home.php?viewsettlements=viewsettlements">View Generated Quotations</a>|
<a href="home.php?viewcountries=viewcountries">Create Job Card</a>|
<a href="home.php?areareportc=areareportc">View Generated Job Cards</a>|-->
</div>

<h1 class="br-5">System Reports:: Labour Utilization Report<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('labour_utilization_report.php');

}

if ($benefitded=='benefitded')
{
?>
<div id="submenu">

<a href="home.php?addformsections=addformsections">View Cash Sales Made</a>|
<!--<a href="home.php?viewbenefitded=viewbenefitded">Workshop Efficiency Report</a>|
<a href="home.php?viewcountries=viewcountries">Generate Quotation</a>|
<a href="home.php?viewsettlements=viewsettlements">View Generated Quotations</a>|
<a href="home.php?viewcountries=viewcountries">Create Job Card</a>|
<a href="home.php?areareportc=areareportc">View Generated Job Cards</a>|-->
</div>

<h1 class="br-5">Sales :: View Approved Cash Sales Generated<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('productivity_report.php');

}

if ($viewbenefitded=='viewbenefitded')
{
?>
<div id="submenu">
<a href="home.php?benefitded=benefitded">Record Cash Sales</a>|
<a href="home.php?viewbenefitded=viewbenefitded">View Cash Sales Made</a>|
<!--<a href="home.php?viewcountries=viewcountries">Generate Quotation</a>|
<a href="home.php?viewsettlements=viewsettlements">View Generated Quotations</a>|
<a href="home.php?viewcountries=viewcountries">Create Job Card</a>|
<a href="home.php?areareportc=areareportc">View Generated Job Cards</a>|-->
</div>

<h1 class="br-5">System Reports:: Workshop Efficiency Report<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('add_location.php');

}


//call for add
if ($perdm=='perdm')
{
?>
<div id="submenu">
<a href="home.php?viewcountries=viewcountries">Book a vehicle </a>|
<a href="home.php?viewhrforms=viewhrforms">View All Bookings</a>|
<a href="home.php?viewcountries=viewcountries">Generate Quotation</a>|
<a href="home.php?viewsettlements=viewsettlements">View Generated Quotations</a>|
<a href="home.php?viewcountries=viewcountries">Create Job Card</a>|
<a href="home.php?areareportc=areareportc">View Generated Job Cards</a>|
</div>

<h1 class="br-5">System Settings:: Continue Booking a Vehicle (Step 2)<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('add_location.php');

}

//call for edit
if($editlocation=='editlocation')
{
?>
<div id="submenu">
<a href="home.php?viewcountries=viewcountries">Book a vehicle </a>|
<a href="home.php?viewhrforms=viewhrforms">View All Bookings</a>|
</div>

<h1 class="br-5">Vehicle Bookings:: Updating Booking Details Details<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('edit_location.php');



}
//////////////////////////////////////////end of location


/////////////////////////////////block for settlements

//call for view
if ($viewsettlements==viewsettlements)
{
?>
<div id="submenu">
<a href="home.php?submit_biweekly=submit_biweekly">Generate Quotation</a>|
<a href="home.php?viewsettlements=viewsettlements">View Generated Quotations</a>|
</div>

<h1 class="br-5">Quotation Management:: Lists Of Generated Quotations<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('viewsettlements.php');

}

//call for add
if ($initiateproject==initiateproject)
{
?>
<div id="submenu">
<a href="home.php?viewcountries=viewcountries">Book a vehicle </a>|
<a href="home.php?viewhrforms=viewhrforms">View All Bookings</a>|
<a href="home.php?viewcountries=viewcountries">Generate Quotation</a>|
<a href="home.php?viewsettlements=viewsettlements">View Generated Quotations</a>|
<a href="home.php?viewcountries=viewcountries">Create Job Card</a>|
<a href="home.php?areareportc=areareportc">View Generated Job Cards</a>|

</div>

<h1 class="br-5">Job Cards Management:: Create JOb Cards<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('add_settlement.php');

}

//call for edit
if($editsettlements=='editsettlements')
{
?>
<div id="submenu">
<a href="home.php?editsettlements=editsettlements">View Pending Estimates</a>|
<!--<a href="home.php?viewsettlements=viewsettlements">View All Settlements</a>|-->
</div>

<h1 class="br-5">System Reports:: Pending Estimates Report<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('edit_settlement.php');



}
//////////////////////////////////////////end of settlements

//View Audit Trails
if ($audittrails==audittrails)
{
?>
<div id="submenu">
&nbsp; <a href="home.php?audittrails=audittrails">Accounts Audit Trails 1</a>|

&nbsp;<a href="audit_trails.php">Accounts Audit Trails 2</a>&nbsp;|
</div>

<h1 class="br-5">Audit Trails:: Lists Of All Activities happening in the system <span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('audit.php');
//include ('accounts/home.php');

}

$issue_stock=$_GET['issue_stock'];
if ($issue_stock==issue_stock)
{
?>
<div id="submenu">
&nbsp; <a href="home.php?issue_stock=issue_stock">Issue Items To Staff</a>|

&nbsp; <a href="view_issued_items.php">View Issue Items To Staff</a>|
</div>

<h1 class="br-5">Issue Stock<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('issue_stock.php');
//include ('accounts/home.php');

}

$view_issue_stock=$_GET['view_issue_stock'];
if ($view_issue_stock==view_issue_stock)
{
?>
<div id="submenu">
&nbsp; <a href="home.php?issue_stock=issue_stock">Issue Items To Staff</a>|

&nbsp; <a href="view_issued_items.php">View Issue Items To Staff</a>|
</div>

<h1 class="br-5">View Issued Stock<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_issued_stock.php');
//include ('accounts/home.php');

}

$view_vat=$_GET['view_vat'];
if ($view_vat==view_vat)
{
?>
<div id="submenu">
&nbsp; <a href="home.php?view_vat=view_vat">Update VAT Settings</a>|

</div>

<h1 class="br-5">VAT Settings<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('vat_settings.php');
//include ('accounts/home.php');

}

$allowance=$_GET['allowance'];
if ($allowance==allowance)
{
?>
<div id="submenu">
&nbsp; <a href="home.php?add_allowance=add_allowance">Add Allowances</a>|

&nbsp; <a href="home.php?allowance=allowance">View Allowances</a>|
</div>

<h1 class="br-5">Allowances<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_benefit_type.php');
//include ('accounts/home.php');

}

$add_allowance=$_GET['add_allowance'];
if ($add_allowance==add_allowance)
{
?>
<div id="submenu">
&nbsp; <a href="home.php?add_allowance=add_allowance">Add Allowances</a>|

&nbsp; <a href="home.php?allowance=allowance">View Allowances</a>|
</div>

<h1 class="br-5">Allowances<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('add_benefit_type.php');
//include ('accounts/home.php');

}

$deductions=$_GET['deductions'];
if ($deductions==deductions)
{
?>
<div id="submenu">
&nbsp; <a href="home.php?add_deductions=add_deductions">Add Deductions</a>|

&nbsp; <a href="home.php?deductions=deductions">View Deductions</a>|
</div>

<h1 class="br-5">Deductions<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_deduction_type.php');
//include ('accounts/home.php');

}


$add_deductions=$_GET['add_deductions'];
if ($add_deductions==add_deductions)
{
?>
<div id="submenu">
&nbsp; <a href="home.php?add_deductions=add_deductions">Add Deductions</a>|

&nbsp; <a href="home.php?deductions=deductions">View Deductions</a>|
</div>

<h1 class="br-5">Deductions<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('add_deduction_type.php');
//include ('accounts/home.php');

}

$view_employees=$_GET['view_employees'];
if ($view_employees==view_employees)
{
?>
<div id="submenu">
&nbsp; <a href="javascript:history.back(1)">Go Back</a>|

</div>

<h1 class="br-5">Employee List<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_employees.php');
//include ('accounts/home.php');

}

//$add_employee=$_GET['add_employee'];
if (isset($_GET['add_employee']))
{
?>
<div id="submenu">
&nbsp; <a href="javascript:history.back(1)">Go Back</a>|

</div>

<h1 class="br-5">Employee List<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('add_employee.php');
//include ('accounts/home.php');

}


//$add_employee=$_GET['add_employee'];
if (isset($_GET['post_payroll']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?post_payroll&sub_module_id=<?php echo $sub_module_id; ?>">Prepare Monthly Payroll</a>|
&nbsp; <a href="home.php?view_post_payroll&sub_module_id=<?php echo $sub_module_id; ?>">View Monthly Payroll</a>|

</div>

<h1 class="br-5">Payroll : Prepare Monthly Payroll<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('post_permanent_payroll.php');
//include ('accounts/home.php');

}


if (isset($_GET['post_payroll_spec']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?post_payroll_spec&sub_module_id=<?php echo $sub_module_id; ?>">Post Payroll (Specific Staff)</a>|
&nbsp; <a href="home.php?view_post_payroll_spec&sub_module_id=<?php echo $sub_module_id; ?>">View Posted Payroll (Specifi Staff)</a>|

</div>

<h1 class="br-5">Payroll : Post Payroll (Specific Staff)<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('post_specific_payroll.php');
//include ('accounts/home.php');

}


if (isset($_GET['view_post_payroll_spec']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?post_payroll_spec&sub_module_id=<?php echo $sub_module_id; ?>">Post Payroll (Specific Staff)</a>|
&nbsp; <a href="home.php?view_post_payroll_spec&sub_module_id=<?php echo $sub_module_id; ?>">View Posted Payroll (Specifi Staff)</a>|

</div>

<h1 class="br-5">Payroll : View Posted Payroll (Specific Staff)<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_posted_specific_payroll.php');
//include ('accounts/home.php');

}

if (isset($_GET['view_payroll_spec_details']))
{
?>
<div id="submenu">
&nbsp; <a href="javascript:history.back(1)">Go Back</a>|


</div>

<h1 class="br-5">Payroll : View Payroll Details (Specific Staff)<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_specific_payroll_details.php');
//include ('accounts/home.php');

}

if (isset($_GET['view_payroll_perm_details']))
{
?>
<div id="submenu">
&nbsp; <a href="javascript:history.back(1)">Go Back</a>|


</div>

<h1 class="br-5">Payroll : View Payroll Details (Parmanent Staff)<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_parmanent_payroll_details.php');
//include ('accounts/home.php');

}

if (isset($_GET['view_post_payroll']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?post_payroll&sub_module_id=<?php echo $sub_module_id; ?>">Post Payroll (Parmanent Staff)</a>|
&nbsp; <a href="home.php?view_post_payroll&sub_module_id=<?php echo $sub_module_id; ?>">View Posted Payroll (Parmanent Staff)</a>|

</div>

<h1 class="br-5">Payroll : Post Payroll (Permanent Staff)<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_posted_parmanent_payroll.php');
//include ('accounts/home.php');

}

if (isset($_GET['post_permanent_payroll2']))
{
?>
<div id="submenu">
&nbsp; <a href="javascript:history.back(1)">Go Back</a>|

</div>

<h1 class="br-5">Payroll : Post Payroll (Permanent Staff)<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('post_permanent_payroll2.php');
//include ('accounts/home.php');

}

if (isset($_GET['print_payslips']))
{
?>
<div id="submenu">
&nbsp; <a href="javascript:history.back(1)">Go Back</a>|

</div>

<h1 class="br-5">Payroll : Print Payslips<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('begin_print_payslip.php');
//include ('accounts/home.php');

}

if (isset($_GET['define_leave']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?define_leave=define_leave&sub_module_id=<?php echo $sub_module_id; ?>">Add Leave Type</a>|
&nbsp; <a href="home.php?view_leave_type=view_leave_type&sub_module_id=<?php echo $sub_module_id; ?>">View Leave Types</a>|
&nbsp; <a href="javascript:history.back(1)">Go Back</a>|

</div>

<h1 class="br-5">Leave Management : Leave Types<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('define_leave.php');
//include ('accounts/home.php');

}

if (isset($_GET['view_leave_type']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?define_leave=define_leave&sub_module_id=<?php echo $sub_module_id; ?>">Add Leave Type</a>|
&nbsp; <a href="home.php?view_leave_type=view_leave_type&sub_module_id=<?php echo $sub_module_id; ?>">View Leave Types</a>|
&nbsp; <a href="javascript:history.back(1)">Go Back</a>|

</div>

<h1 class="br-5">Leave Management : Leave Types<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_leave_type.php');
//include ('accounts/home.php');

}


if (isset($_GET['view_holiday']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?new_holiday=new_holiday&sub_module_id=<?php echo $sub_module_id; ?>">Define Holiday</a>|
&nbsp; <a href="home.php?view_holiday=view_holiday&sub_module_id=<?php echo $sub_module_id; ?>">View Holiday Types</a>|
&nbsp; <a href="javascript:history.back(1)">Go Back</a>|

</div>

<h1 class="br-5">Leave Management : Holidays Types<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_holiday.php');
//include ('accounts/home.php');

}


if (isset($_GET['opening_balances']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?opening_balances&sub_module_id=<?php echo $sub_module_id; ?>">Record Account Opening Balance</a>|
&nbsp; <a href="home.php?view_opening_balances&sub_module_id=<?php echo $sub_module_id; ?>">View Accounts Opening Balances</a>|
&nbsp; <a href="javascript:history.back(1)">Go Back</a>|

</div>

<h1 class="br-5">Accounting: Opening Balances<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('add_account_opening_balance.php');
//include ('accounts/home.php');

}

if (isset($_GET['view_opening_balances']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?opening_balances&sub_module_id=<?php echo $sub_module_id; ?>">Record Account Opening Balance</a>|
&nbsp; <a href="home.php?view_opening_balances&sub_module_id=<?php echo $sub_module_id; ?>">View Accounts Opening Balances</a>|
&nbsp; <a href="javascript:history.back(1)">Go Back</a>|

</div>

<h1 class="br-5">Accounting: View Account Opening Balances<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_account_opening_balance.php');
//include ('accounts/home.php');

}



if (isset($_GET['post_issued_items']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?post_issued_items">Post Issued Items To Accounts</a>|
&nbsp; <a href="home.php?view_post_issued_items">View Post Issued Items To Accounts</a>|

</div>

<h1 class="br-5">Post Issued ITems To Accounts<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('post_issued_stock.php');
//include ('accounts/home.php');

}

if (isset($_GET['post_invoices']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?post_invoices">Post Invoices To Accounts</a>|
&nbsp; <a href="home.php?view_post_invoices">View Post Invoices To Accounts</a>|

</div>

<h1 class="br-5">Post Invoices To Accounts<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('post_invoices.php');
//include ('accounts/home.php');

}

if (isset($_GET['view_post_invoices']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?post_invoices">Post Invoices To Accounts</a>|
&nbsp; <a href="home.php?view_post_invoices">View Post Invoices To Accounts</a>|

</div>

<h1 class="br-5">View Post Invoices To Accounts<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_posted_invoices.php');
//include ('accounts/home.php');

}


if (isset($_GET['post_invoices2']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?post_invoices">Post Invoices To Accounts</a>|
&nbsp; <a href="home.php?view_post_invoices">View Post Invoices To Accounts</a>|

</div>

<h1 class="br-5">Post Invoices To Accounts<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('post_invoices2.php');
//include ('accounts/home.php');

}

if (isset($_GET['post_farmers_order']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?post_farmers_order">Post Farmers Order To Accounts</a>|
&nbsp; <a href="home.php?view_posted_farmers_order">View Post Farmers Order To Accounts</a>|

</div>

<h1 class="br-5">Post Issued ITems To Accounts <span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('post_farmers_order.php');
//include ('accounts/home.php');

}

if (isset($_GET['view_posted_farmers_order']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?post_farmers_order">Post Farmers Order To Accounts</a>|
&nbsp; <a href="home.php?view_posted_farmers_order">View Post Farmers Order To Accounts</a>|

</div>

<h1 class="br-5">View Post Farmesr Orders To Account <span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_posted_farmers_orders.php');
//include ('accounts/home.php');

}

if (isset($_GET['post_issue_items_to_accounts']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?post_issued_items">Post Issued Items To Accounts</a>|
&nbsp; <a href="home.php?view_post_issued_items">View Post Issued Items To Accounts</a>|

</div>

<h1 class="br-5">Post Issued ITems To Accounts <span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('post_issued_items_to_accounts.php');
//include ('accounts/home.php');

}


if (isset($_GET['view_post_issued_items']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?post_issued_items">Post Issued Items To Accounts</a>|
&nbsp; <a href="home.php?view_post_issued_items">View Post Issued Items To Accounts</a>|

</div>

<h1 class="br-5">View Post Issued Items To Accounts<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_posted_issued_items.php');
//include ('accounts/home.php');

}

if (isset($_GET['receive_supplier_invoice']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?receive_supplier_invoice">Receive Supplier Invoice</a>|
&nbsp; <a href="home.php?view_received_supplier_invoice">View Received Supplier Invoice</a>|
</div>

<h1 class="br-5">Receive Supplier Invoice<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('receive_supplier_invoice.php');
//include ('accounts/home.php');

}

if (isset($_GET['receive_supplier_invoice2']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?receive_supplier_invoice">Receive Supplier Invoice</a>|
&nbsp; <a href="home.php?view_received_supplier_invoice">View Received Supplier Invoice</a>|
</div>

<h1 class="br-5">Receive Supplier Invoice<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('receive_supplier_invoice2.php');
//include ('accounts/home.php');

}

if (isset($_GET['view_received_supplier_invoice']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?receive_supplier_invoice">Receive Supplier Invoice</a>|
&nbsp; <a href="home.php?view_received_supplier_invoice">View Received Supplier Invoice</a>|
</div>

<h1 class="br-5">View Received Supplier Invoice<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_received_supplier_invoice.php');
//include ('accounts/home.php');

}

if (isset($_GET['invoice_payment_report']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?invoice_payment_report">Invoice Payment Report</a>|

</div>

<h1 class="br-5">Invoice Payment Report<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('invoice_payment_report.php');
//include ('accounts/home.php');

}


if (isset($_GET['debtors_aging_report']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?debtors_aging_report">Debtors Aging Report</a>|

</div>

<h1 class="br-5">Debtors Aging Report<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('debtors_aging_report.php');
//include ('accounts/home.php');

}


if (isset($_GET['creditors_aging_report']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?creditors_aging_report">Creditors Aging Report</a>|

</div>

<h1 class="br-5">Creditors Aging Report<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('creditors_aging_report.php');
//include ('accounts/home.php');

}

if (isset($_GET['creditors_balances']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?creditors_balances">Creditors Balances</a>|

</div>

<h1 class="br-5">Creditors Balances<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('creditors_balances.php');
//include ('accounts/home.php');

}

if (isset($_GET['debtors_balances']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?creditors_balances">Debtors Balances Report</a>|

</div>

<h1 class="br-5">Debtors Balances Reports<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('debtors_balances.php');
//include ('accounts/home.php');

}


if (isset($_GET['pay_supplier']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?pay_supplier">Record Supplier Payments</a>|
&nbsp; <a href="home.php?view_pay_supplier">View Suppliers Payments</a>|
&nbsp; <a href="home.php?view_pay_supplier&farmer=1">View Farmers Payments</a>|

</div>

<h1 class="br-5">Record Supplier Payments<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('pay_supplier.php');
//include ('accounts/home.php');

}


if (isset($_GET['view_pay_supplier']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?pay_supplier">Record Supplier Payments</a>|
&nbsp; <a href="home.php?view_pay_supplier">View Suppliers Payments</a>|
&nbsp; <a href="home.php?view_pay_supplier&farmer=1">View Farmers Payments</a>|

</div>

<h1 class="br-5">View Supplier Payments<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_stock_payments.php');
//include ('accounts/home.php');

}


if (isset($_GET['receive_client_payment']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?receive_client_payment">Record Customer Payments</a>|
&nbsp; <a href="home.php?view_receive_client_payment">View Customer Payments</a>|

</div>

<h1 class="br-5">Record Customer Payments<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('receive_client_payment.php');
//include ('accounts/home.php');

}

if (isset($_GET['view_receive_client_payment']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?receive_client_payment">Record Customer Payments</a>|
&nbsp; <a href="home.php?view_receive_client_payment">View Customer Payments</a>|

</div>

<h1 class="br-5">View Received Customer Payments<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_received_client_payment.php');
//include ('accounts/home.php');

}


if (isset($_GET['receive_cheque_payment']))
{
?>
<div id="submenu">
&nbsp; <a href="receive_cheque_payment.php">Record Cash/Cheque Payment Received</a>|
&nbsp; <a href="home.php?view_received_cheque_payment">View Cash/Cheque Payment Received</a>|

</div>

<h1 class="br-5">Record Cash/Cheque Payment Received<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('receive_cheque_payment.php');
//include ('accounts/home.php');

}


if (isset($_GET['view_received_cheque_payment']))
{
?>
<div id="submenu">
&nbsp; <a href="receive_cheque_payment.php">Record Cash/Cheque Payment Received</a>|
&nbsp; <a href="home.php?view_received_cheque_payment">View Cash/Cheque Payment Received</a>|

</div>

<h1 class="br-5">View Cash/Cheque Payment Received<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_received_cheque_payments.php');
//include ('accounts/home.php');

}


if (isset($_GET['pay_cheque_payment']))
{
?>
<div id="submenu">
&nbsp; <a href="pay_cheque_payment.php">Record Cash/Cheque Paid</a>|
&nbsp; <a href="home.php?view_pay_cheque_payment">View Cash/Cheque Paid</a>|

</div>

<h1 class="br-5">Record Cash/Cheque Paid<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('pay_cheque_payment.php');
//include ('accounts/home.php');

}

if (isset($_GET['view_pay_cheque_payment']))
{
?>
<div id="submenu">
&nbsp; <a href="pay_cheque_payment.php">Record Cash/Cheque Paid</a>|
&nbsp; <a href="home.php?view_pay_cheque_payment">View Cash/Cheque Paid</a>|

</div>

<h1 class="br-5">Record Cash/Cheque Paid<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_pay_cheque_payment.php');
//include ('accounts/home.php');

}

if (isset($_GET['sales_debit_journal']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?sales_debit_journal">Record Sales Debit Journal</a>|
&nbsp; <a href="home.php?view_sales_debit_journal">View Sales Debit Journal</a>|

</div>

<h1 class="br-5">Record Sales Debit Journal<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('sales_debit_journal.php');
//include ('accounts/home.php');

}


if (isset($_GET['view_sales_debit_journal']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?sales_debit_journal">Record Sales Debit Journal</a>|
&nbsp; <a href="home.php?view_sales_debit_journal">View Sales Debit Journal</a>|

</div>

<h1 class="br-5">View Sales Debit Journal<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_sales_debit_journal.php');
//include ('accounts/home.php');

}


if (isset($_GET['purchases_debit_journal']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?purchases_debit_journal">Record Purchases Debit Journal</a>|
&nbsp; <a href="home.php?view_purchases_debit_journal">View Purchases Debit Journal</a>|

</div>

<h1 class="br-5">Record Purchases Debit Journal<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('purchases_debit_journal.php');
//include ('accounts/home.php');

}


if (isset($_GET['view_purchases_debit_journal']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?purchases_debit_journal">Record Purchases Debit Journal</a>|
&nbsp; <a href="home.php?view_purchases_debit_journal">View Purchases Debit Journal</a>|

</div>

<h1 class="br-5">View Purchases Debit Journal<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_purchases_debit_journal.php');
//include ('accounts/home.php');

}


if (isset($_GET['purchases_credit_journal']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?purchases_credit_journal">Record Purchases Credit Journal</a>|
&nbsp; <a href="home.php?view_purchases_credit_journal">View Purchases Credit Journal</a>|

</div>

<h1 class="br-5">Record Purchases Credit Journal<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('purchases_credit_journal.php');
//include ('accounts/home.php');

}


if (isset($_GET['view_purchases_credit_journal']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?purchases_credit_journal">Record Purchases Credit Journal</a>|
&nbsp; <a href="home.php?view_purchases_credit_journal">View Purchases Credit Journal</a>|

</div>

<h1 class="br-5">View Purchases Credit Journal<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_purchases_credit_journal.php');
//include ('accounts/home.php');

}


if (isset($_GET['sales_credit_journal']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?sales_credit_journal">Record Sales Credit Journal</a>|
&nbsp; <a href="home.php?view_sales_credit_journal">View Sales Credit Journal</a>|

</div>

<h1 class="br-5">Record Sales Credit Journal<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('sales_credit_journal.php');
//include ('accounts/home.php');

}


if (isset($_GET['view_sales_credit_journal']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?sales_credit_journal">Record Sales Credit Journal</a>|
&nbsp; <a href="home.php?view_sales_credit_journal">View Sales Credit Journal</a>|

</div>

<h1 class="br-5">View Sales Credit Journal<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_sales_credit_journal.php');
//include ('accounts/home.php');

}









$edit_vat=$_GET['edit_vat'];
if ($edit_vat==edit_vat)
{
?>
<div id="submenu">
&nbsp; <a href="home.php?view_vat=view_vat">Update VAT Settings</a>|

</div>

<h1 class="br-5">VAT Settings<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('edit_vat.php');
//include ('accounts/home.php');

}


if (isset($_GET['farmers']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?add_farmers">Add Farmer</a>|
&nbsp; <a href="home.php?farmers">View Farmers</a>|

</div>

<h1 class="br-5">View Farmers<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_farmers.php');
//include ('accounts/home.php');

}

if (isset($_GET['add_farmers']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?add_farmers">Add Farmer</a>|
&nbsp; <a href="home.php?farmers">View Farmers</a>|

</div>

<h1 class="br-5">Add Farmer<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('add_farmer.php');
//include ('accounts/home.php');

}

if (isset($_GET['farmers_advances']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?farmers_advances">Record Farmers Advance</a>|
&nbsp; <a href="home.php?view_farmers_advances">View Farmers Advances</a>|

</div>

<h1 class="br-5">Add Farmer<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('pay_farmer_advance.php');
//include ('accounts/home.php');

}


if (isset($_GET['view_farmers_advances']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?farmers_advances">Record Farmers Advance</a>|
&nbsp; <a href="home.php?view_farmers_advances">View Farmers Advances</a>|

</div>

<h1 class="br-5">Add Farmer<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('view_farmers_advance_payments.php');
//include ('accounts/home.php');

}


if (isset($_GET['payment_list1']))
{
?>
<div id="submenu">
&nbsp; <a href="home.php?payment_list1">1st Payment List</a>|
&nbsp; <a href="home.php?payment_list2">2nd Payment List</a>|

</div>

<h1 class="br-5">Farmers Payment List<span style="float:right;"><?php include('back_button.php');?></span></h1>
<?php
include ('farmers_payment_list1.php');
//include ('accounts/home.php');

}









?>

<?php
}









/////////////////////////////////end of display menus

?>

