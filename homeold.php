<?php include ('includes/session.php'); ?>
<?php include ('Connections/fundmaster.php'); ?>
<?php include ('title.php'); ?>
<?php include ('header.php'); ?>

<body>

<?php
if ($sess_allow_delete==1) {
$rdelete="delete";
$me="";
}
else
{$rdelete="";
$me="Operation NOT Allowed";

}

$journalentry=$_GET['journalentry'];
$submit_biweekly=$_GET['submit_biweekly'];
$viewjournalentry=$_GET['viewjournalentry'];
$editjournalentry=$_GET['editjournalentry'];

$dropdowntitle=$_GET['dropdowntitle'];
$viewdropdowntitle=$_GET['viewdropdowntitle'];
$editdropdowntitle=$_GET['editdropdowntitle'];
$viewhrforms=$_GET['viewhrforms'];
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
$newusergroup=$_GET['newusergroup']; 
$usergroups=$_GET['usergroups']; 

$newsponsor=$_GET['newsponsor'];
$viewsponsor=$_GET['viewsponsor'];
$newunivesity=$_GET['newunivesity'];
$viewuniversity=$_GET['viewuniversity'];
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
$edituniversity=$_GET['edituniversity'];
$editinstoffer=$_GET['editinstoffer'];

?>


<div id="mainmenux">
<?php //require_once('mainmenunewoldx.php') ?>
<?php require_once('mainmenunew.php') ?>

</div>

<div id="wrapper2">

<?php 
if ($normal)
{

}
else
{
?>


<?php 
}

?>
<div id="contentleft" class="br-5">

<?php 
if ($outreach==outreach)
{
?>
<h1 class="br-5">Add Records : Staff Personal Details Panel</h1>
<?php
include ('outreach.php');
}
if ($sharecapital==sharecapital)
{
?>
<h1 class="br-5">Shares Capital: Add Share Holder</h1>
<?php
include ('add_shares.php');
}

if ($audittrails==audittrails)
{
?>
<h1 class="br-5">System Reports: Audit Trails</h1>
<?php
include ('audit.php');
}

if ($profile==profile)
{

?>
<h1 class="br-5">Profile Management : Update My Details</h1>
<?php
include ('profile.php');

}



if ($editsharecapital==editsharecapital)
{
?>
<h1 class="br-5">Shares Capital: Update Shares Holder's</h1>
<?php
include ('edit_shares.php');
}

if ($exitsharecapital==exitsharecapital)
{
?>
<h1 class="br-5">Shares Capital: Exit Shares Holder's</h1>
<?php
include ('exit_shares.php');
}

if ($newstaff==newstaff)
{
?>
<h1 class="br-5">Staff Details Management: Add New Staff</h1>
<?php
include ('add_staff.php');
}

if ($viewstaff==viewstaff)
{
?>
<h1 class="br-5">Staff Details Management: List Of All Employees</h1>
<?php
include ('view_staff.php');
}

if ($viewstaffhistory==viewstaffhistory)
{
?>
<h1 class="br-5">Staff Details Management: Staff Information with Historical Details</h1>
<?php
include ('view_staff_history.php');
}

if ($editstaff==editstaff)
{
?>
<h1 class="br-5">Staff Details Management: Update Employees Details</h1>
<?php
include ('edit_staff.php');
}

if ($adddropdown==adddropdown)
{
?>
<h1 class="br-5">Staff Details Management: Create Select Dropdown choices</h1>
<?php
include ('add_dropdown.php');
}

if ($dropdowntitle==dropdowntitle)
{
?>
<h1 class="br-5">Staff Details Management: Create Dropdown Titles</h1>
<?php
include ('add_dropdown_title.php');
}

if ($viewdropdowntitle==viewdropdowntitle)
{
?>
<h1 class="br-5">Staff Details Management: View Dropdown Titles</h1>
<?php
include ('view_dropdown_title.php');
}

if ($assigndropdown==assigndropdown)
{
?>
<h1 class="br-5">Staff Details Management: Attach Select Choice To Select Form Fields</h1>
<?php
include ('attach_dropdown.php');
}

if ($viewdropdown==viewdropdown)
{
?>
<h1 class="br-5">Staff Details Management: View Select Dropdown choices</h1>
<?php
include ('view_dropdown.php');
}

if ($exitsharecapital2==exitsharecapital2)
{
?>
<h1 class="br-5">Shares Capital: Exit Shares Holder:: Give Reasons</h1>
<?php
include ('exit_shares2.php');
}

if ($viewexitsharecapital==viewexitsharecapital)
{
?>
<h1 class="br-5">Shares Capital: List Of Exited Shareholders</h1>
<?php
include ('view_exit_shares.php');
}

if ($viewdividend==viewdividend)
{
?>
<h1 class="br-5">Shares Capital: List Of Dividents</h1>
<?php
include ('view_dividends.php');
}

if ($viewsharecapital==viewsharecapital)
{
?>
<h1 class="br-5">Shares Capital: View Share Holder</h1>
<?php
include ('view_shares.php');
}

if ($fixedasset==fixedasset)
{
?>
<h1 class="br-5">Fixed Assets Management: Add Fixed Asset</h1>
<?php
include ('add_fixed_asset.php');
}

if ($journalentry==journalentry)
{
?>
<h1 class="br-5">Journal Entry: Create a Journal Entry</h1>
<?php
include ('add_journal_entry.php');
}

if ($viewfixedasset==viewfixedasset)
{
?>
<h1 class="br-5">Fixed Assets Management: View Fixed Asset</h1>
<?php

include ('view_fixed_assets.php');
}

if ($dispose==dispose)
{
?>
<h1 class="br-5">Fixed Assets Management: Dispose Fixed Asset</h1>
<?php

include ('dispose_fixed_assets.php');
}

if ($editfixedasset==editfixedasset)
{
?>
<h1 class="br-5">Fixed Assets Management: Update Fixed Asset Details</h1>
<?php
include ('edit_fixed_asset.php');
}


if ($modules==modules)
{
?>
<h1 class="br-5">Access Control: Create Module</h1>
<?php
include ('add_module.php');
}

if ($viewmodules==viewmodules)
{
?>
<h1 class="br-5">Access Control: View Module</h1>
<?php
include ('viewmodules.php');
}

if ($editmodules==editmodules)
{
?>
<h1 class="br-5">Access Control: Update Module Details</h1>
<?php
include ('edit_modules.php');
}

if ($addformsections==addformsections)
{
?>
<h1 class="br-5">Staff Details Form Settings: Create Form Section</h1>
<?php
include ('add_form_section.php');
}

if ($viewformsections==viewformsections)
{
?>
<h1 class="br-5">Staff Details Form Settings: View Form Section</h1>
<?php
include ('view_form_sections.php');
}
if ($editformsections==editformsections)
{
?>
<h1 class="br-5">Staff Details Form Settings: Update Form Section</h1>
<?php
include ('edit_form_section.php');
}

if ($addformfields==addformfields)
{
?>
<h1 class="br-5">Staff Details Form Settings: Create Form Fields</h1>
<?php
include ('add_form_field.php');
}

if ($viewformfields==viewformfields)
{
?>
<h1 class="br-5">Staff Details Form Settings: View Form Fields</h1>
<?php
include ('view_form_fields.php');
}

if ($editformfields==editformfields)
{
?>
<h1 class="br-5">Staff Details Form Settings: View Form Fields</h1>
<?php
include ('edit_form_field.php');
}




if ($submodules==submodules)
{
?>
<h1 class="br-5">Access Control: Create Sub Module</h1>
<?php
include ('add_submodule.php');
}

if ($petertest2==petertest2)
{
?>
<h1 class="br-5">Peter Testss</h1>
<?php
include ('add_peter.php');
}

if ($viewsubmodules==viewsubmodules)
{
?>
<h1 class="br-5">Access Control: View Sub Modules</h1>
<?php
include ('viewsubmodules.php');
}

if ($editsubmodules==editsubmodules)
{
?>
<h1 class="br-5">Access Control: Update Sub Modules</h1>
<?php
include ('edit_sub_module.php');
}

if ($modulesusergroup==modulesusergroup)
{
?>
<h1 class="br-5">Access Control: Associate Module to Usergroups</h1>
<?php
include ('assign_modules_usergroups.php');
}

if ($viewmodulesusergroup==viewmodulesusergroup)
{
?>
<h1 class="br-5">Access Control: View / Deassociate Module to Usergroups</h1>
<?php
include ('view_assign_modules_usergroups.php');
}

if ($assignsubmodule==assignsubmodule)
{
?>
<h1 class="br-5">Access Control: Associate Sub Modules to Modules</h1>
<?php
include ('assign_modules_submodules.php');
}

if ($viewassignsubmodule==viewassignsubmodule)
{
?>
<h1 class="br-5">Access Control: View / Deassociate SubModules From Modules</h1>
<?php
include ('view_assign_modules_submodules.php');
}

if ($users==users)
{
?>
<h1 class="br-5">Access Control: Create A User</h1>
<?php
include ('add_user.php');
}

if ($viewusers==viewusers)
{
?>
<h1 class="br-5">Access Control: View Users</h1>
<?php
include ('viewusers.php');
}

if ($resetpassword==resetpassword)
{
?>
<h1 class="br-5">Access Control: Reset Users Password</h1>
<?php
include ('viewuserspassword.php');
}

if ($resetpass2==resetpass2)
{
?>
<h1 class="br-5">Access Control: Reset Users Password</h1>
<?php
include ('edituserpass.php');
}


if ($initiateproject==initiateproject)
{

?>
<h1 class="br-5">SIPET Projects : Add New Project</h1>
<?php
include ('add_project.php');

}

if ($editproject==editproject)
{

?>
<h1 class="br-5">SIPET Projects : Update Project Details </h1>
<?php
include ('edit_project.php');

}

if ($processinterflight==processinterflight)
{

?>
<h1 class="br-5">International Staff Air Ticket Processing : Add New Air Ticket Details</h1>
<?php
include ('interflight.php');

}

if ($processnatflight==processnatflight)
{

?>
<h1 class="br-5">National Staff Air Ticket Processing : Add New Air Ticket Details</h1>
<?php
include ('natflight.php');

}

if ($processgenflight==processgenflight)
{

?>
<h1 class="br-5">Genaral Air Ticket Processing : Add New General Air Ticket Details</h1>
<?php
include ('genflight.php');

}

if ($viewprocessinterflight==viewprocessinterflight)
{

?>
<h1 class="br-5">International Staff Air Ticket Processing : View Air Ticket Details</h1>
<?php
include ('view_airtickets.php');

}

if ($viewprocessinterflight==viewprocessinterflight)
{

?>
<h1 class="br-5">International Staff Air Ticket Processing : View Air Ticket Details</h1>
<?php
include ('view_airtickets.php');

}

if ($viewprocessnatflight==viewprocessnatflight)
{

?>
<h1 class="br-5">National Staff Air Ticket Processing : View Air Ticket Details</h1>
<?php
include ('view_natairtickets.php');

}

if ($viewprocessgenflight==viewprocessgenflight)
{

?>
<h1 class="br-5">General Air Ticket Processing : View All General Air Ticket Details</h1>
<?php
include ('view_genairtickets.php');

}

if ($tpla==tpla)
{

?>
<h1 class="br-5">Financial Operations: View Trading Profit And Loss Account / Income Statement </h1>
<?php
include ('view_tpla.php');

}

if ($balancesheet==balancesheet)
{

?>
<h1 class="br-5">Financial Operations: View Balance Sheet </h1>
<?php
include ('view_balancesheet.php');

}

if ($generalledger==generalledger)
{

?>
<h1 class="br-5">Legder Accounts: View General Legder</h1>
<?php
include ('view_general_ledger.php');

}

if ($serviceledger==serviceledger)
{

?>
<h1 class="br-5">Legder Accounts: View Service Revenue Ledger </h1>
<?php
include ('view_service_ledger.php');

}

if ($cashledger==cashledger)
{

?>
<h1 class="br-5">Legder Accounts: View Cash Legder</h1>
<?php
include ('view_cash_ledger.php');

}

if ($expensesledger==expensesledger)
{

?>
<h1 class="br-5">Legder Accounts: View Expenses Legder</h1>
<?php
include ('view_expenses_ledger.php');

}

if ($arledger==arledger)
{

?>
<h1 class="br-5">Legder Accounts: View Accounts Receivables Legder</h1>
<?php
include ('view_ar_ledger.php');

}

if ($apledger==apledger)
{

?>
<h1 class="br-5">Legder Accounts: View Accounts Payables  Legder</h1> 
<?php
include ('view_ap_ledger.php');

}

if ($faledger==faledger)
{

?>
<h1 class="br-5">Legder Accounts: View Accounts Payables  Legder</h1> 
<?php
include ('view_fa_ledger.php');

}

if ($workpermitrenewals==workpermitrenewals)
{

?>
<h1 class="br-5">Staff Work Documents Renewals: Renew Staff Work Permits</h1> 
<?php
include ('view_staff_workpermits.php');

}

if ($reneworkpermit2==reneworkpermit2)
{

?>
<h1 class="br-5">Staff Work Documents Renewals: Renew Staff Work Permits</h1> 
<?php
include ('renewworkpermit.php');

}

if ($viewworkpermitrenewals==viewworkpermitrenewals)
{

?>
<h1 class="br-5">Staff Work Documents Renewals: View Renewed Staff Work Permits (Charges In SSP)</h1> 
<?php
include ('viewrenewworkpermit.php');

}

if ($visarenewals==visarenewals)
{

?>
<h1 class="br-5">Staff Work Documents Renewals: Renew Staff Visas</h1> 
<?php
include ('view_staff_visas.php');

}

if ($renewvisa2==renewvisa2)
{

?>
<h1 class="br-5">Staff Work Documents Renewals: Renew Staff Visas</h1> 
<?php
include ('renewvisa.php');

}

if ($viewvisarenewals==viewvisarenewals)
{

?>
<h1 class="br-5">Staff Work Documents Renewals: View Renewed Staff Visas (Charges In SSP)</h1> 
<?php
include ('viewrenewvisas.php');

}

if ($subconinvoices==subconinvoices)
{

?>
<h1 class="br-5">Finance Records : Record Subcontractors Invoices</h1>
<?php
include ('add_subcon_invoice.php');

}

if ($viewsubconinvoices==viewsubconinvoices)
{

?>
<h1 class="br-5">Finance Records : View Subcontractors Invoices</h1>
<?php
include ('view_subcon_invoices.php');

}

if ($subconinvoicestoclient==subconinvoicestoclient)
{

?>
<h1 class="br-5">Finance Records : Generate Subcontrator's Invoice to Client</h1>
<?php
include ('add_subcon_invoice_to_client.php');

}

if ($viewsubconinvoicestoclient==viewsubconinvoicestoclient)
{

?>
<h1 class="br-5">Finance Records : View Generated Subcontrator's Invoice to Client</h1>
<?php
include ('view_subcon_invoice_to_client.php');

}

if ($receivesubconpay==receivesubconpay)
{

?>
<h1 class="br-5">Finance Records : Receive Subcontractor's Invoiced Amount from Clients</h1>
<?php
include ('receive_subcon_to_client_invoice_payment.php');

}

if ($recordsubcontoclientpayment==recordsubcontoclientpayment)
{

?>
<h1 class="br-5">Finance Records : Record Receive Subcontractor's Invoiced Amount from Clients</h1>
<?php
include ('record_subcon_to_client_invoice_payment.php');

}




if ($paysubcon==paysubcon)
{

?>
<h1 class="br-5">Finance Records : Pay Subcontractor Invoiced Amount</h1>
<?php
include ('pay_subcon.php');

}

if ($recordpaysubcon==recordpaysubcon)
{

?>
<h1 class="br-5">Finance Records : Record Subcontractor Payment</h1>
<?php
include ('record_subcon_payment.php');

}

if ($receivepay==receivepay)
{

?>
<h1 class="br-5">Finance Records : Receive Invoiced Amount from Clients</h1>
<?php
include ('receive_invoice_payment.php');

}

if ($recordpayment==recordpayment)
{

?>
<h1 class="br-5">Finance Records : Record Invoiced Amount from Clients</h1>
<?php
include ('record_invoice_payment.php');

}

if ($viewprojects==viewprojects)
{

?>
<h1 class="br-5">SIPET Projects : View All Project</h1>
<?php
include ('view_projects.php');

}

if ($stafftoprojects==stafftoprojects)
{
?>
<h1 class="br-5">SIPET Projects :Assign Staff To Project</h1>
<?php
include ('assign_staff_to_projects.php');

}
if ($deletestafftoprojects==deletestafftoprojects)
{
?>
<h1 class="br-5">SIPET Projects :Unassign Staff From Project</h1>
<?php
include ('unassign_staff_from_projects.php');

}

if ($rotatestaff==rotatestaff)
{
?>
<h1 class="br-5">SIPET Projects :Rotate Staff</h1>
<?php
include ('rotate_staff.php');

}


if ($stafftimesheet==stafftimesheet)
{

?>
<h1 class="br-5">SIPET Projects : Record Time Sheet</h1>
<?php
include ('record_stafftimesheet.php');

}

if ($viewstafftimesheet1==viewstafftimesheet1)
{

?>
<h1 class="br-5">SIPET Projects : View Staff Time Sheet</h1>
<?php
include ('view_staff_timesheetnew1.php');

}

if ($adminviewstafftimesheet1==adminviewstafftimesheet1)
{

?>
<h1 class="br-5">SIPET Projects : View Staff Time Sheet</h1>
<?php
include ('view_staff_timesheetnew1.php');

}

if ($viewstafftimesheet==viewstafftimesheet)
{

?>
<h1 class="br-5">SIPET Projects : View Staff Time Sheet</h1>
<?php
include ('view_staff_timesheetnew.php');

}
if ($adminviewstafftimesheet==adminviewstafftimesheet)
{

?>
<h1 class="br-5">SIPET Projects : View Staff Time Sheet</h1>
<?php
include ('view_staff_timesheetnew.php');

}

if ($editstafftoprojects==editstafftoprojects)
{

?>
<h1 class="br-5">SIPET Projects :Edit Assigned Staff To Project</h1>
<?php
include ('edit_assign_staff_to_projects.php');

}

if ($viewstafftoprojects==viewstafftoprojects)
{

?>
<h1 class="br-5">SIPET Projects :View Assigned Staff To Project</h1>
<?php
include ('view_assigned_staff_to_projects.php');

}

if ($perdm==perdm)
{

?>
<h1 class="br-5">Settings: Create Sub Area</h1>
<?php
include ('add_perdm.php');

}
if ($omrates==omrates)
{

?>
<h1 class="br-5">SIPET Services: Create Staff Daily Rates </h1>
<?php
include ('add_omrates.php');

}
						if ($assignexperts==assignexperts)
						{
						
						if ($job_cat_id==2)
							{
						?>
						<h1 class="br-5">Assignment Of Staff to Clients: Assign Expertriate Staff to Clients Step 1</h1>
						<?php
						}
						else
						{
						
						?>
						<h1 class="br-5">Assignment Of Staff to Clients: Assign Local Staff to Clients Step 1</h1>
						<?php
						
						}
						
						
						include ('assign_expertriate_staff.php');

						}

if ($assignexperts2==assignexperts2)
{

						if ($job_cat_id==2)
							{
						?>


						<h1 class="br-5">Assignment Of Staff to Clients: Assign Expertriate Staff to Clients Step 2 </h1>
						<?php
						}
						else
						{
						?>


						<h1 class="br-5">Assignment Of Staff to Clients: Assign Local Staff to Clients Step 2 </h1>
						<?php

						}

						include ('assign_expertriate_staff2.php');

}
if ($pettycash==pettycash)
{

?>
<h1 class="br-5">General Transactions: Add New Petty Cash Expense</h1>
<?php
include ('add_petty_cash_expense.php');

}

if ($editpettycashexpenses==editpettycashexpenses)
{

?>
<h1 class="br-5">General Transactions: Update Petty Cash Expense</h1>
<?php
include ('edit_petty_cash_expense.php');

}

if ($editomrates==editomrates)
{

?>
<h1 class="br-5">Staff Rates Per Day: Update Daily Staff Rates</h1>
<?php
include ('edit_omrates.php');

}

if ($viewpettycashexpenses==viewpettycashexpenses)
{

?>
<h1 class="br-5">General Transactions: View Petty Cash Expenses</h1>
<?php
include ('view_petty_cash_expenses.php');

}

if ($pettycashfund==pettycashfund)
{
?>
<h1 class="br-5">General Transactions: Add Petty Cash Fund</h1>
<?php
include ('add_petty_cash_income.php');

}

if ($uploadhrforms==uploadhrforms)
{
?>
<h1 class="br-5">Human Resource Forms: Upload HR Forms</h1>
<?php
include ('upload_forms.php');

}

if ($viewhrforms==viewhrforms)
{
?>
<h1 class="br-5">Human Resource Forms: View And Download HR Forms</h1>
<?php
include ('view_hr_forms.php');

}

if ($viewpettycashfund==viewpettycashfund)
{

?>
<h1 class="br-5">General Transactions: View Petty Cash Fund</h1>
<?php
include ('view_petty_cash_income.php');

}
if ($viewpettycashledger==viewpettycashledger)
{

?>
<h1 class="br-5">General Transactions: View Petty Cash Ledger</h1>
<?php
include ('view_petty_cash_ledger.php');

}

if ($expenses==expenses)
{

?>
<h1 class="br-5">General Transactions: Add New Expense</h1>
<?php
include ('add_expense.php');

}

if ($editexpenses==editexpenses)
{

?>
<h1 class="br-5">General Transactions: Update Expenses Record</h1>
<?php
include ('edit_expense.php');

}
if ($viewexpenses==viewexpenses)
{

?>
<h1 class="br-5">General Transactions: View All Expense</h1>
<?php
include ('view_expenses.php');

}

if ($income==income)
{

?>
<h1 class="br-5">General Transactions: Add New Income</h1>
<?php
include ('add_income.php');

}

if ($viewincome==viewincome)
{

?>
<h1 class="br-5">General Transactions: View All Income</h1>
<?php
include ('view_income.php');

}

if ($editincome==editincome)
{

?>
<h1 class="br-5">General Transactions: Update All Income</h1>
<?php
include ('edit_income.php');

}

if ($viewomrates==viewomrates)
{

?>
<h1 class="br-5">Staff Rates Per Day: View Staff Rates Per Day </h1>
<?php
include ('view_omrates.php');

}
if ($omstaff==omstaff)
{

?>
<h1 class="br-5">Subcontractor's Panel: Create New Subcontrator's Staff</h1>
<?php
include ('addomstaff.php');

}
if ($assingomstaff==assingomstaff)
{

?>
<h1 class="br-5">Subcontractor's Panel:Assign Subcontractor's Staff To Project</h1>
<?php
include ('assign_subcon_staff_to_projects.php');

}

if ($subconrate==subconrate)
{

?>
<h1 class="br-5">Subcontractor's Panel:Create Subcontractor's Rate</h1>
<?php
include ('add_subconrate.php');

}

if ($viewsubconrate==viewsubconrate)
{

?>
<h1 class="br-5">Subcontractor's Panel:View Subcontractor's Rate</h1>
<?php
include ('view_subconrate.php');

}

if ($editsubconrate==editsubconrate)
{

?>
<h1 class="br-5">Subcontractor's Panel:Update Subcontractor's Rate</h1>
<?php
include ('edit_subconrate.php');

}

if ($viewassingomstaff==viewassingomstaff)
{

?>
<h1 class="br-5">Subcontractor's Panel :View Assigned Subcontractor's Staff To Project</h1>
<?php
include ('viewassign_subcon_staff_to_projects.php');

}
if ($omclients==omclients)
{
?>
<h1 class="br-5">O&M Clients: Create New O & M Clients</h1>
<?php
include ('omclients.php');

}
if ($omlocations==omlocations)
{
?>
<h1 class="br-5">O&M Location And Segments : Create New Location / Segment</h1>
<?php
include ('omlocation.php');

}

if ($titlelocation==titlelocation)
{
?>
<h1 class="br-5">Assign Job Title to Location : Assign New Job Title to Location / Segment </h1>
<?php
include ('assign_jobtitle_location.php');

}

if ($viewtitlelocation==viewtitlelocation)
{
?>
<h1 class="br-5">View Assigned Job Title to Location : View All Assigned Job Titles to Location / Segment </h1>
<?php
include ('view_assigned_jobtitles_locations.php');

}
if ($omjobtitles==omjobtitles)
{
?>
<h1 class="br-5">O&M Job Titles : Create New O & M Job Title</h1>
<?php
include ('add_omjobtitle.php');

}

if ($viewomjobtitles==viewomjobtitles)
{
?>
<h1 class="br-5">O&M Job Titles : View O&M Job Titles</h1>
<?php
include ('view_omjobtitles.php');

}
if ($viewomlocations==viewomlocations)
{
?>
<h1 class="br-5">O & M Location And Segments : View Locations / Segments</h1>
<?php
include ('viewomlocations.php');

}
if ($omconsultants==omconsultants)
{

?>
<h1 class="br-5">System Settings: Create New Core Competency</h1>
<?php
include ('omconsultants.php');

}

if ($editsubcon==editsubcon)
{

?>
<h1 class="br-5">System Settings: Update Subcontractor Details</h1>
<?php
include ('edit_subcon.php');

}
if ($viewomconsultants==viewomconsultants)
{

?>
<h1 class="br-5">System Settings: View All Core Competencies</h1>
<?php
include ('viewomconsultants.php');

}

if ($viewomstaff==viewomstaff)
{

?>
<h1 class="br-5">Subcontractor's Panel: View Subcontrator's Staffs</h1>
<?php
include ('viewomstaff.php');

}
if ($editomstaff==editomstaff)
{

?>
<h1 class="br-5">Subcontractor's Panel: Update Sub contractors Staffs Details</h1>
<?php
include ('editomstaff.php');

}

if ($processpayroll==processpayroll)
{

?>
<h1 class="br-5">Staff Payroll: Process Payroll 1st Step</h1>
<?php
include ('process_payroll.php');

}

if ($chart==chart)
{

?>
<h1 class="br-5">Chart Of Accounts: Create Account Category</h1>
<?php
include ('add_account_cat.php');

}

if ($viewchart==viewchart)
{
?>
<h1 class="br-5">Chart Of Accounts: View Accounts Categories</h1>
<?php
include ('view_acc_cat.php');
}

if ($editchart==editchart)
{

?>
<h1 class="br-5">Chart Of Accounts: Update Accounts Categories Details</h1>
<?php
include ('edit_acc_cat.php');

}

if ($addaccounts==addaccounts)
{
?>
<h1 class="br-5">Chart Of Accounts: Add Accounts Title</h1>
<?php
include ('add_account_title.php');
}

if ($viewaccounts==viewaccounts)
{
?>
<h1 class="br-5">Chart Of Accounts:View Accounts Title</h1>
<?php
include ('view_acc_name.php');
}

if ($bnprocesspayroll==bnprocesspayroll)
{

?>
<h1 class="br-5">Staff Payroll: Generate Employees Payslips</h1>
<?php
include ('begin_national_payrol.php');

}

if ($batchpayroll==batchpayroll)
{

?>
<h1 class="br-5">Staff Payroll: Batch Processing Nationals Staffs Payroll</h1>
<?php
include ('begin_batch_payrol.php');

}

if ($editpayroll==editpayroll)
{

?>
<h1 class="br-5">Staff Payroll: Update Nationals Staffs Payroll</h1>
<?php
include ('edit_nat_payroll.php');

}



if ($payrollsettings==payrollsettings)
{

?>
<h1 class="br-5">System Settings: Create Key Indicator</h1>
<?php
include ('add_tax_block.php');

}

if ($edittaxblock==edittaxblock)
{

?>
<h1 class="br-5">System Settings: Create Key Indicator</h1>
<?php
include ('edit_tax_block.php');

}

if ($viewpayrollsettings==viewpayrollsettings)
{

?>
<h1 class="br-5">Staff Payroll: View Key Indicators</h1>
<?php
include ('view_tax_block.php');

}

if ($bnprocessexppayroll==bnprocessexppayroll)
{

?>
<h1 class="br-5">Staff Payroll: Process Expertriate Staffs Payroll 1st Step</h1>
<?php
include ('begin_expertriate_payrol.php');

}
if ($payrollexpreport==payrollexpreport)
{

?>
<h1 class="br-5">Staff Payroll: Expertriate Payroll Report in USD</h1>
<?php
include ('payrollexpreport.php');

}
if ($payrollexpreportssp==payrollexpreportssp)
{

?>
<h1 class="br-5">Staff Payroll: Expertriate Payroll Report in South Sudanesse Pounds</h1>
<?php
include ('payrollexpreportss.php');

}

if ($adminpayrollexpreport==adminpayrollexpreport)
{

?>
<h1 class="br-5">Staff Payroll: Expertriate Payroll Report in USD</h1>
<?php
include ('payrollexpreport.php');

}


if ($payrollreport==payrollreport)
{

?>
<h1 class="br-5">Staff Payroll: National Payroll Report in USD</h1>
<?php
include ('payrollreport.php');

}

if ($cancelexppayroll==cancelexppayroll)
{

?>
<h1 class="br-5">Staff Payroll: Cancel Expertriate Payroll</h1>
<?php
include ('cancel_expertriate_payroll.php');

}

if ($adminpayrollreport==adminpayrollreport)
{

?>
<h1 class="br-5">Staff Payroll: National Payroll Report in USD</h1>
<?php
include ('payrollreport.php');

}







if ($payrollreportssp==payrollreportssp)
{

?>
<h1 class="br-5">Staff Payroll: National Payroll Report in SSP</h1>
<?php
include ('payrollreportssp.php');

}


if ($adminpayrollreportssp==adminpayrollreportssp)
{

?>
<h1 class="br-5">Staff Payroll: National Payroll Report in SSP</h1>
<?php
include ('payrollreportssp.php');

}

if ($viewpayslip==viewpayslip)
{

?>
<h1 class="br-5">Staff Payroll: View All Payslips Generated</h1>
<?php
include ('view_payslips.php');

}

if ($adminviewpayslip==adminviewpayslip)
{

?>
<h1 class="br-5">Staff Payroll: View All Payslips Generated</h1>
<?php
include ('view_payslips.php');

}





if ($viewexppayslip==viewexppayslip)
{

?>
<h1 class="br-5">Staff Payroll: View All Expertriate Payslips Generated</h1>
<?php
include ('view_exppayslips.php');

}

if ($adminviewexppayslip==adminviewexppayslip)
{

?>
<h1 class="br-5">Staff Payroll: View All Expertriate Payslips Generated</h1>
<?php
include ('view_exppayslips.php');

}

if ($cancelpayroll==cancelpayroll)
{

?>
<h1 class="br-5">Staff Payroll: Cancel Generated Payroll</h1>
<?php
include ('cancel_payroll.php');

}





if ($processpayroll2==processpayroll2)
{

?>
<h1 class="br-5">Staff Payroll: Process Payroll 2nd Step

 for Employee : 
		
<?php $sqlemp_det="select * from employees where emp_id='$emp_id'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);

echo $rowsemp_det->emp_fname.' '.$rowsemp_det->emp_mname.' '.$rowsemp_det->emp_lname;
?>

  : Employee No. <?php echo $rowsemp_det->employee_no; ?>
  
  : Employment Status : <?php echo $rowsemp_det->emp_status; ?>
	
</h1>
<?php
include ('process_payroll2.php');

} 

if ($processexppayroll2==processexppayroll2)
{

?>
<h1 class="br-5">Staff Payroll: Process Expertriate Payroll 2nd Step

 for Employee : 
		
<?php $sqlemp_det="select * from employees where emp_id='$emp_id'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);

echo $rowsemp_det->emp_fname.' '.$rowsemp_det->emp_mname.' '.$rowsemp_det->emp_lname;
?>

  : Employee No. <?php echo $rowsemp_det->employee_no; ?>
  
  : Employment Status : <?php echo $rowsemp_det->emp_status; ?>
	
</h1>
<?php
include ('process_exppayroll2.php');

} 

if ($nhifrates==nhifrates)
{

?>
<h1 class="br-5">Staff Payroll: Create New NHIF Rates</h1>
<?php
include ('add_nhif_rates.php');

}

if ($editsic==editsic)
{

?>
<h1 class="br-5">Staff Payroll: Update Employee SIC Rate</h1>
<?php
include ('edit_nhif_rates.php');

}


if ($paye==paye)
{

?>
<h1 class="br-5">Staff Payroll: Create New P.I.T Block</h1>
<?php
include ('add_paye.php');

}
if ($viewpaye==viewpaye)
{

?>
<h1 class="br-5">Staff Payroll: View P.I.T Block</h1>
<?php
include ('view_paye.php');

}
if ($viewnhifrates==viewnhifrates)
{

?>
<h1 class="br-5">Staff Payroll: View S.I.C Rates Block</h1>
<?php
include ('view_nhif_rates.php');

}

if ($benefitded==benefitded)
{

?>
<h1 class="br-5">Staff Payroll: Add Allowances</h1>
<?php
include ('add_benefit.php');

}
if ($viewbenefitded==viewbenefitded)
{

?>
<h1 class="br-5">Staff Payroll: View Allowances</h1>
<?php
include ('view_benefits.php');

}

if ($deduction==deduction)
{

?>
<h1 class="br-5">Staff Payroll: Add Deduction Type</h1>
<?php
include ('add_deduction.php');

}

if ($viewdeduction==viewdeduction)
{

?>
<h1 class="br-5">Staff Payroll: View Deduction Types</h1>
<?php
include ('view_deductions.php');

}

if ($loansav==loansav)
{

?>
<h1 class="br-5">Staff Payroll: Add Loan Type</h1>
<?php
include ('add_loan_type.php');

}

if ($viewloansav==viewloansav)
{

?>
<h1 class="br-5">Staff Payroll: View Loan Types</h1>
<?php
include ('view_loan_types.php');

}

if ($savings==savings)
{

?>
<h1 class="br-5">Staff Payroll: Add Savings Type</h1>
<?php
include ('add_savings_type.php');

}

if ($viewsavings==viewsavings)
{

?>
<h1 class="br-5">Staff Payroll: View All Savings Type</h1>
<?php
include ('view_savings.php');

}

if ($generateinvoice==generateinvoice)
{

?>
<h1 class="br-5">Invoicing Panel: Create New Invoice</h1>
<?php
include ('invoicing1.php'); 

}

if ($preinvoice2==preinvoice2)
{

?>
<h1 class="br-5">Invoicing Panel: Create New Invoice</h1>
<?php
include ('back_invoicing.php'); 

}
if ($invoice2==invoice2)
{

?>
<h1 class="br-5">Invoicing Panel: Print The Invoice</h1>
<?php
include ('invoicing2.php');

}
if ($viewinvoices==viewinvoices)
{

?>
<h1 class="br-5">Invoicing Panel: View All Invoices Generated </h1>
<?php
include ('viewinvoices.php');

}
if ($viewperdm==viewperdm)
{

?>
<h1 class="br-5">Settings: View Per Diem Charges</h1>
<?php
include ('view_perdm.php');

}
if ($editperdm==editperdm)
{

?>
<h1 class="br-5">Settings: Update Per Diem Charges</h1>
<?php
include ('edit_perdm.php');

}
if ($recorddata==recorddata)  
{

?>
<h1 class="br-5">Project Management And Consultancy : Step 1 - Assign Staff to Blocks</h1>
<?php
include ('admin_addoutreach.php'); 

}

if ($addcpdreport==addcpdreport)  
{

?>
<h1 class="br-5">Billing Panel : View Billing Progress</h1>
<?php
include ('admin_addcpd.php'); 

}

if ($addsubspecialityreport==addsubspecialityreport)  
{

?>
<h1 class="br-5">Rotate Staff : List Of Current Staff In The Field</h1>
<?php
include ('admin_addsubspeciality.php'); 

}

if ($viewpendingstaff==viewpendingstaff)  
{

?>
<h1 class="br-5">Rotate Staff : View pending lot of staff to replace current ones</h1>
<?php
include ('view_pending_staff.php'); 

}

if ($addpostgraduatereport==addpostgraduatereport)  
{

?>
<h1 class="br-5">Project Management And Consultancy : View Assigned Staff to Blocks</h1>
<?php
include ('admin_addpostgraduate.php'); 

}


if ($adminoutreach2==adminoutreach2)  
{

?>
<h1 class="br-5">Project Management And Consultancy : Step 2 - Assign Staff to Blocks</h1>
<?php
include ('admin_addoutreach2.php'); 

}

if ($outreach2==outreach2)
{
?>
<h1 class="br-5">Outreaches Records : Diagnostics Panel</h1>
<?php
include ('outreach2.php');
}

if ($editoutreach==editoutreach)
{
?>
<h1 class="br-5">Update Outreaches Records</h1>
<?php
include ('edit_outreach.php');
}

elseif ($prepostgraduate==prepostgraduate)
{
?>
<h1 class="br-5">Human Resource Management: Add Staff to the system</h1>
<?php
include ('pre_post_grad.php');

}

elseif ($postgraduate==postgraduate)
{
?>
<h1 class="br-5">Human Resource Management: Add Staff to the system</h1>
<?php
include ('post_grad.php');

}
elseif ($passport==passport)
{
?>
<h1 class="br-5">Human Resource Management: Add Staff to the system</h1>
<?php
include ('staff_passport.php');

}
elseif ($viewpassport==viewpassport)
{
?>
<h1 class="br-5">Human Resource Management: View / Update Staff Details</h1>
<?php
include ('viewstaff_passport.php');

}
elseif ($viewvisa==viewvisa)
{
?>
<h1 class="br-5">Human Resource Management: View / Update Staff Details</h1>
<?php
include ('viewstaff_visa.php');

}
elseif ($visa==visa)
{
?>
<h1 class="br-5">Human Resource Management: Add Staff to the system</h1>
<?php
include ('staff_visa.php');

}

elseif ($workpermit==workpermit)
{
?>
<h1 class="br-5">Human Resource Management: Add Staff to the system</h1>
<?php
include ('staff_work_permit.php');

}

elseif ($viewworkpermit==viewworkpermit)
{
?>
<h1 class="br-5">Human Resource Management: Add Staff to the system</h1>
<?php
include ('view_staff_work_permit.php');

}

elseif ($idcard==idcard)
{
?>
<h1 class="br-5">Human Resource Management: Add Staff to the system</h1>
<?php
include ('staff_idcards.php');

}

elseif ($viewidcard==viewidcard)
{
?>
<h1 class="br-5">Human Resource Management: Add Staff to the system</h1>
<?php
include ('view_staff_idcards.php');

}

elseif ($specid==specid)
{
?>
<h1 class="br-5">Human Resource Management: Add Staff to the system</h1>
<?php
include ('staff_specid.php');

}

elseif ($viewspecid==viewspecid)
{
?>
<h1 class="br-5">Human Resource Management: Add Staff to the system</h1>
<?php
include ('view_staff_specid.php');

}

elseif ($edubg==edubg)
{
?>
<h1 class="br-5">Human Resource Management: Add Staff to the system</h1>
<?php
include ('edubg.php');

}

elseif ($viewedubg==viewedubg)
{
?>
<h1 class="br-5">Human Resource Management: Add Staff to the system</h1>
<?php
include ('view_edubg.php');

}
elseif ($othertraining==othertraining)
{
?>
<h1 class="br-5">Human Resource Management: Add Staff to the system</h1>
<?php
include ('other_training.php');

}

elseif ($viewothertraining==viewothertraining)
{
?>
<h1 class="br-5">Human Resource Management: Add Staff to the system</h1>
<?php
include ('view_other_training.php');

}

elseif ($workexperience==workexperience)
{
?>
<h1 class="br-5">Human Resource Management: Add Staff to the system</h1>
<?php
include ('work_experience.php');

}

elseif ($viewworkexperience==viewworkexperience)
{
?>
<h1 class="br-5">Human Resource Management: Add Staff to the system</h1>
<?php
include ('view_work_experience.php');

}

elseif ($empcontract==empcontract)
{
?>
<h1 class="br-5">Human Resource Management: Employment Contract</h1>
<?php
include ('emp_contract.php');

}

elseif ($viewempcontract==viewempcontract)
{
?>
<h1 class="br-5">Human Resource Management: Employment Contract</h1>
<?php
include ('view_emp_contract.php');

}
elseif ($salarydet==salarydet)
{
?>
<h1 class="br-5">Human Resource Management: Employment Contract</h1>
<?php
include ('salary_det.php');

}

elseif ($viewsalarydet==viewsalarydet)
{
?>
<h1 class="br-5">Human Resource Management: Employment Contract</h1>
<?php
include ('view_salary_det.php');

}

elseif ($contdet==contdet)
{
?>
<h1 class="br-5">Human Resource Management: Contact Details</h1>
<?php
include ('contdet.php');

}

elseif ($viewcontdet==viewcontdet)
{
?>
<h1 class="br-5">Human Resource Management: Contact Details</h1>
<?php
include ('view_contdet.php');

}
elseif ($usergroupsm==usergroupsm)
{
?>
<h1 class="br-5">Access Control: Associate Sub-Modules to Usergroup</h1>
<?php
include ('usergroupsm.php');

}
elseif ($viewusergroupsm==viewusergroupsm)
{
?>
<h1 class="br-5">Access Control: Associate Sub-Modules to Usergroup</h1>
<?php
include ('viewusergroupsm.php');

}

elseif ($familystatus==familystatus)
{
?>
<h1 class="br-5">Human Resource Management: Famility Status</h1>
<?php
include ('family_status.php');

}

elseif ($viewfamilystatus==viewfamilystatus)
{
?>
<h1 class="br-5">Human Resource Management: Famility Status</h1>
<?php
include ('view_family_status.php');

}
elseif ($skillprofile==skillprofile)
{
?>
<h1 class="br-5">Human Resource Management: Skill Profile</h1>
<?php
include ('skill_profile.php');

}

elseif ($viewskillprofile==viewskillprofile)
{
?>
<h1 class="br-5">Human Resource Management: Skill Profile</h1>
<?php
include ('view_skill_profile.php');

}
elseif ($prize==prize)
{
?>
<h1 class="br-5">Human Resource Management: Prizes and Honour</h1>
<?php
include ('prize.php');

}
elseif ($viewprize==viewprize)
{
?>
<h1 class="br-5">Human Resource Management: Prizes and Honour</h1>
<?php
include ('view_prize.php');

}

elseif ($staffdet==staffdet)
{
?>
<h1 class="br-5">Human Resource Management: Prizes and Honour</h1>
<?php
include ('view_pim.php');

}

elseif ($editphoto==editphoto)
{
?>
<h1 class="br-5">Human Resource Management: Prizes and Honour</h1>
<?php
include ('edit_photo.php');

}

elseif ($terminatestaff==terminatestaff)
{
?>
<h1 class="br-5">Human Resource Management: Terminate Staff</h1>
<?php
include ('terminate_staff.php');

}


elseif ($editpostgraduate==editpostgraduate)
{
?>
<h1 class="br-5">Update MMED Post-Graduate Scholarship Record</h1>
<?php
include ('edit_post_grad.php');

}

elseif ($cdp==cdp)
{

?>
<h1 class="br-5">System Settings : Create Payment Rate Per Hour</h1>
<?php
include ('cdp.php');

}
elseif ($editcpd==editcpd)
{

?>
<h1 class="br-5">System Settings : Update Payment Rate Per Hour</h1>
<?php
include ('edit_cpd.php');

}

elseif ($subspeciality==subspeciality)
{

?>
<h1 class="br-5">Settings : Creating New Sub Project</h1>
<?php
include ('sub_speciliality.php');

}
elseif ($submit_biweekly==submit_biweekly)
{

?>
<h1 class="br-5">Settings : Currently Active Projects</h1>
<?php
include ('submit_biweekly.php');

}
elseif ($editsubspeciality==editsubspeciality)
{

?>
<h1 class="br-5">Update SIPET Clients Record</h1>
<?php
include ('edit_sub_speciliality.php');

}

elseif ($logout==logout)
{

include ('logout.php');

}

elseif ($viewoutreach==viewoutreach)
{

?>
<h1 class="br-5">Outreaches Records</h1>
<?php
include ('viewoutreach.php');
}
elseif ($viewpostgraduate==viewpostgraduate)
{

?>
<h1 class="br-5">Human Resource Management : List of SIPET Staff / Employees</h1>
<?php
include ('viewpostgraduate.php');

}

elseif ($viewcdp==viewcdp)
{

?>
<h1 class="br-5">System Settings : View Payment Rate Per Hour</h1>
<?php

include ('viewcdp.php');

}

elseif ($viewsubspeciality==viewsubspeciality)
{

?>
<h1 class="br-5">Settings : List of All Sub Projects</h1>
<?php

include ('viewsubspeciality.php');
}



//Administrator modules

elseif ($access==access)
{

?>
<h1 class="br-5">Access Control :: List of All System Users</h1>
<?php

include ('viewusers.php');
}

elseif ($usergroups==usergroups)
{
?>
<h1 class="br-5">Access Control :: List of All User Groups</h1>
<?php
include ('viewusergroups.php');
}

elseif ($newusergroup==newusergroup)
{
?>
<h1 class="br-5">Access  Control:: Creating New User Group</h1>
<?php
include ('add_user_group.php');
}

elseif ($newuser==newuser)
{
?>
<h1 class="br-5">Access Control :: Creating New User</h1>
<?php
include ('add_user.php');
}

elseif ($newsponsor==newsponsor)
{
?>
<h1 class="br-5">System Settings:: Creating New Area</h1>
<?php
include ('add_sponsor.php');
}

elseif ($viewsponsor==viewsponsor || $settings==settings)
{
?>
<h1 class="br-5">System Settings:: View of All Areas</h1>
<?php
include ('viewsponsors.php');
}



elseif ($viewuniversity==viewuniversity)
{
?>
<h1 class="br-5">System Settings:: List of All Blocks</h1>
<?php
include ('viewsuniversity.php');
}
elseif ($newinstitute==newinstitute)
{
?>
<h1 class="br-5">System Settings:: Project Management</h1>
<?php
include ('add_insitution_offering.php');
}

elseif ($viewinstitute==viewinstitute)
{
?>
<h1 class="br-5">System Settings:: List of All Projects</h1>
<?php
include ('viewinstoffering.php');
}

elseif ($reports==reports || $outreachreport==outreachreport )
{
?>
<h1 class="br-5">SIPET Projects :View Assigned Staff To Project</h1>
<?php
include ('view_assigned_staff_to_projects.php');

}


elseif ($cpdreport==cpdreport)
{
?>
<h1 class="br-5">System Reports:: Continous Professional Development  Reports</h1>
<?php
include ('admin_viewcdp.php');
}

elseif ($admineditoutreach==admineditoutreach)
{
?>
<h1 class="br-5">System Reports:: Update Outreach Reports</h1>
<?php
include ('admin_editoutreach.php');
}
elseif ($admineditcpd==admineditcpd)
{
?>
<h1 class="br-5">System Reports:: Update Continous Professional Development  Reports</h1>
<?php
include ('admin_editcdp.php');
}

elseif ($postgraduatereport==postgraduatereport)
{
?>
<h1 class="br-5">System Reports:: MMED Post-Graduate Scholarships  Reports</h1>
<?php
include ('admin_viewpostgraduate.php');

}

elseif ($admineditpostgraduate==admineditpostgraduate)
{
?>
<h1 class="br-5">System Reports:: Update MMED Post-Graduate Scholarships  Reports</h1>
<?php
include ('admin_editpostgraduate.php');

}
elseif ($subspecialityreport==subspecialityreport)
{
?>
<h1 class="br-5">System Reports:: Sub-Speciality Training Reports</h1>
<?php
include ('admin_viewsubspeciality.php');
}

elseif ($admineditsubspeciality==admineditsubspeciality)
{
?>
<h1 class="br-5">System Reports:: Update Sub-Speciality Training Reports</h1>
<?php
include ('admin_editsubspeciality.php');
}

elseif ($newpass==newpass)
{
?>
<h1 class="br-5">Change Password Panel:: Update Password</h1>
<?php
include ('newpass.php');
}

elseif ($detailoutreach==detailoutreach) 
{
?>
<h1 class="br-5">System Report:: Detailed Outreach Report</h1>
<?php
include ('outreach_details.php');
}

elseif ($edituser==edituser) 
{
?>
<h1 class="br-5">Access Control:: Update User Details</h1>
<?php
include ('edit_user.php');
}

elseif ($editgroup==editgroup) 
{
?>
<h1 class="br-5">Access Control:: Update User Group</h1>
<?php
include ('edit_user_group.php');
}

elseif ($editsponsor==editsponsor) 
{
?>
<h1 class="br-5">System Settings:: Update Currency</h1>
<?php
include ('edit_sponsor.php');
}

elseif ($edituniversity==edituniversity) 
{
?>
<h1 class="br-5">System Settings:: Update Block Details</h1>
<?php
include ('edit_university.php');
}
elseif ($editinstoffer==editinstoffer) 
{
?>
<h1 class="br-5">System Settings:: Update Job Categories</h1>
<?php
include ('edit_instoffering.php');
}





elseif($normal)
{
?>
<!--<div style="width:880px; height:400px; background:#ffffff;" class="br-5">
<table width="860" height="380" border="0" style="margin-left:15px;">
<tr height="20"><td colspan="4"><h1 class="br-5">Home</h1></td></tr>
<tr height="50"><td valign="bottom"><a href="home.php?outreach=outreach"><img src="images/outreach.png"></td><td valign="bottom" align="center"><a href="home.php?postgraduate=postgraduate"><img src="images/postgrad.jpg"></td><td valign="bottom" align="center"><a href="home.php?cdp=cdp"><img src="images/cpd.jpg"></a></td><td valign="bottom"><a href="home.php?subspeciality=subspeciality"><img src="images/dip.jpg"></a></td></tr>
<tr><td align="center"><a href="home.php?outreach=outreach" style="color:#666666; font-size:14px; font-weight:bold; text-decoration:none;">Outreach Records</a></td><td align="center"><a href="home.php?postgraduate=postgraduate" style="color:#666666; font-size:14px; font-weight:bold; text-decoration:none;">Post-Graduate Scholarships</a></td><td align="center"><a href="home.php?cdp=cdp" style="color:#666666; font-size:14px; font-weight:bold; text-decoration:none;">Continous Professional Development</a></td><td align="center"><a href="home.php?subspeciality=subspeciality" style="color:#666666; font-size:14px; font-weight:bold; text-decoration:none;">Sub-Speciality Training</a></td></tr>
<tr height="60"><td colspan="4"><h1 class="br-5"></td></tr>

</table>










</div>-->

<div style="width:480px; height:400px;" class="br-5"></div>





<?php }

elseif($monitor==monitor)
{
if ($_GET['loginfirst']==1)

{

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Logged into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


$sqlpd= "UPDATE users SET islogged_in='1' where user_id='$user_id'";
$resultspd= mysql_query($sqlpd) or die ("Error $sqlpd.".mysql_error());

}




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
<td style="font-weight:bold; color:#FF6600;">NRC Projects Management</a></td>
<td></td>
<td style="font-weight:bold; color:#FF6600;">Bi-Weekly Reports Analysis Dashboard</a></td>
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
<td style="font-weight:bold; color:#FF6600;">Project Donors Management</a></td>
<td></td>
<td style="font-weight:bold; color:#FF6600;">Data Intergrity And Relevance</a></td>
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

<?php }




?>












</div>


<!--<div id="contentright" class="br-5">


<h1 class="br-5">Submenu</h1>

<?php

if ($postgraduate==postgraduate || $viewpostgraduate==viewpostgraduate || $editpostgraduate==editpostgraduate)
{
?>
<ul>
<li><a href="home.php?postgraduate=postgraduate">>>Add New Record</a></li>
<li><a href="home.php?viewpostgraduate=viewpostgraduate">>>View MMED Records</a></li>
<li></li>
<li></li>
</ul>
<?php 
}

elseif ($cdp==cdp || $viewcdp==viewcdp || $editcpd==editcpd)
{
?>
<ul>
<li><a href="home.php?cdp=cdp">>>Add New CPD Record</a></li>
<li><a href="home.php?viewcdp=viewcdp">>>View CPD Records</a></li>
<li></li>
<li></li>
</ul>
<?php 
}

elseif ($subspeciality==subspeciality || $viewsubspeciality==viewsubspeciality || $editsubspeciality==editsubspeciality)
{
?>
<ul>
<li><a href="home.php?subspeciality=subspeciality">>>New Subspeciality Record</a></li>
<li><a href="home.php?viewsubspeciality=viewsubspeciality">>>View Subspeciality Records</a></li>
<li></li>
<li></li>
</ul>
<?php 
}
elseif ($outreach==outreach || $editoutreach==editoutreach || $outreach2==outreach2 || $viewoutreach==viewoutreach || $detailoutreach==detailoutreach)
{
?>
<ul>
<li><a href="home.php?outreach=outreach">>>New Outreach Record</a></li>
<li><a href="home.php?viewoutreach=viewoutreach">>>View Outreach Records</a></li>
<li></li>
<li></li>
</ul>
<?php 
}
elseif ($newuser==newuser || $access==access || $newusergroup==newusergroup || $usergroups==usergroups || $edituser==edituser || $editgroup==editgroup )
{
?>
<ul>
<li><a href="home.php?newusergroup=newusergroup">>>Add New User Group</a></li>
<li><a href="home.php?usergroups=usergroups">>>View All User Groups</a></li>
<li><a href="home.php?newuser=newuser">>>Add New User </a></li>
<li><a href="home.php?access=access">>>View All Users</a></li>
<li></li>
<li></li>
</ul>
<?php 
}

elseif ($settings==settings || $newsponsor==newsponsor || $viewsponsor==viewsponsor || $newunivesity==newunivesity || $viewuniversity==viewuniversity || 
$newinstitute==newinstitute || $viewinstitute==viewinstitute || $editsponsor==editsponsor || $edituniversity==edituniversity || $editinstoffer==editinstoffer )
{
?>
<ul>
<li><a href="home.php?newsponsor=newsponsor">>>Add New Sponsor</a></li>
<li><a href="home.php?viewsponsor=viewsponsor">>>View All Sponsors</a></li>
<li><a href="home.php?newunivesity=newunivesity">>>Add New Univesity </a></li>
<li><a href="home.php?viewuniversity=viewuniversity">>>View All Universities</a></li>
<li><a href="home.php?newinstitute=newinstitute">>>Add New Institution Offering</a></li>
<li><a href="home.php?viewinstitute=viewinstitute">>>View Institutions Offering</a></li>
<li></li>
<li></li>
</ul>
<?php 
}
elseif ($reports==reports || $outreachreport==outreachreport || $postgraduatereport==postgraduatereport || $subspecialityreport==subspecialityreport || $monitor==monitor )
{
?>
<ul>
<li><a href="home.php?outreachreport=outreachreport">>>Outreach Reports</a></li>
<li><a href="home.php?postgraduatereport=postgraduatereport">>>Postgraduate Scholarships</a></li>
<li><a href="home.php?subspecialityreport=subspecialityreport">>>CPD Report</a></li>
<li><a href="home.php?subspecialityreport=subspecialityreport">>>Sub-Speciality Training</a></li>


<li></li>
<li></li>
</ul>
<?php 
}

?>






</div>-->



</div>


<table width="100%" border="0">
<tr><td>
<div id="footer">
			<?php include ('footer.php'); ?>
		</div>
</td>
</tr>

	
</body>
</html>
