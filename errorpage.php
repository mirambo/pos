<?php include ('includes/session.php'); ?>
<?php include ('Connections/fundmaster.php'); ?>
<?php include ('title.php'); ?>
<?php include ('header.php'); ?>

<body>

<?php
$audittrails=$_GET['audittrails'];


$fixedasset=$_GET['fixedasset'];
$viewfixedasset=$_GET['viewfixedasset'];
$editfixedasset=$_GET['editfixedasset'];

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
$editprocessinterflight=$_GET['editinterprocessflight'];

$processnatflight=$_GET['processnatflight'];
$viewprocessnatflight=$_GET['viewprocessnatflight'];
$editprocessnatflight=$_GET['editinterprocessnatflight'];


$subconinvoices=$_GET['subconinvoices'];
$viewsubconinvoices=$_GET['viewsubconinvoices'];
$editsubconinvoices=$_GET['editsubconinvoices'];

$subconinvoicestoclient=$_GET['subconinvoicestoclient'];
$viewsubconinvoicestoclient=$_GET['viewsubconinvoicestoclient'];
$editsubconinvoicestoclient=$_GET['editsubconinvoicestoclient'];


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
$assingomstaff=$_GET['assingomstaff'];
$viewassingomstaff=$_GET['viewassingomstaff'];

$subconrate=$_GET['subconrate'];
$viewsubconrate=$_GET['viewsubconrate'];



$preinvoice2=$_GET['preinvoice2'];
$invoice2=$_GET['invoice2'];
$viewinvoices=$_GET['viewinvoices'];
$generateinvoice=$_GET['generateinvoice'];
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
<div id="submenu">
<?php

if ($postgraduate==postgraduate || $viewpostgraduate==viewpostgraduate || $editpostgraduate==editpostgraduate || 
$basicinfo==basicinfo ||
$visa==visa || $viewvisa==viewvisa || 
$passport==passport || $viewpassport==viewpassport ||
$workpermit==workpermit || $viewworkpermit==viewworkpermit ||
$idcard==idcard || $viewidcard==viewidcard ||
$specid==specid || $viewspecid==viewspecid ||
$edubg==edubg || $viewedubg==viewedubg ||
$othertraining==othertraining || $viewothertraining==viewothertraining ||
$workexperience==workexperience || $viewworkexperience==viewworkexperience ||
$empcontract==empcontract || $viewempcontract==viewempcontract ||
$salarydet==salarydet || $viewsalarydet==viewsalarydet ||
$contdet==contdet || $viewcontdet==viewcontdet ||
$familystatus==familystatus ||$viewfamilystatus==viewfamilystatus ||
$skillprofile==skillprofile || $viewskillprofile==viewskillprofile ||
$prize==prize || $staffdet==staffdet || $prepostgraduate==prepostgraduate
|| $editphoto==editphoto || $terminatestaff==terminatestaff || $viewterminatedstaff==viewterminatedstaff
|| $viewprize==viewprize

)
{
?>
<?php 
				if ($user_group_id==2)
				{
				?>
				<a href="home.php?viewpostgraduate=viewpostgraduate">View / Update My Details </a>|
				<?php
				}
				else
				{?>
				<a href="home.php?prepostgraduate=prepostgraduate">Add New Staff</a>|
				<a href="home.php?viewpostgraduate=viewpostgraduate">View All Staffs</a>|
				<a href="home.php?viewterminatedstaff=viewterminatedstaff">View Terminated Staffs</a>|
				<?php
				
				}



				 ?>
<?php 
}


elseif ($cdp==cdp || $viewcdp==viewcdp || $editcpd==editcpd)
{
?>
<a href="home.php?cdp=cdp">Add Payment Rate Per Hour</a>|
<a href="home.php?viewcdp=viewcdp">View All Payment Rates Per Hour</a>|
<?php 
}

elseif ($monitor==monitor)
{
?>
<marquee><strong>::: WELCOME TO SPRINGBOK COOPERATE MANAGEMENT SYSTEM :::</strong></marquee>
<?php 
}

elseif ($audittrails==audittrails)
{
?>
<a href="home.php?audittrails=audittrails">View Audit Trails</a>|

<?php 
}

elseif ($fixedasset==fixedasset || $viewfixedasset==viewfixedasset || $editfixedasset==editfixedasset)
{
?>
<a href="home.php?fixedasset=fixedasset">Add Fixed Asset</a>|
<a href="home.php?viewfixedasset=viewfixedasset">View Fixed Asset</a>|
<?php 
}


elseif ($sharecapital==sharecapital || $viewsharecapital==viewsharecapital || $editsharecapital==editsharecapital
|| $exitsharecapital==exitsharecapital || $viewexitsharecapital==viewexitsharecapital || $viewdividend==viewdividend
|| $viewretained==viewretained || $viewwithdrawn==viewwithdrawn || $exitsharecapital2==exitsharecapital2


)
{
?>
<a href="home.php?sharecapital=sharecapital">Add Shareholder</a>|
<a href="home.php?viewsharecapital=viewsharecapital">View All Shareholders</a>|
<a href="home.php?exitsharecapital=exitsharecapital">Exit Shareholder</a>|
<a href="home.php?viewexitsharecapital=viewexitsharecapital">View All Exited Shareholders</a>|
<a href="home.php?viewdividend=viewdividend">View Dividends</a>|
<a href="home.php?viewretained=viewretained">View Retained Earnings</a>|
<a href="home.php?viewwithdrawn=viewwithdrawn">View Withdrawn Shares</a>|
<?php 
}

elseif ($users==users || $viewusers==viewusers || $edituser==edituser || $resetpassword==resetpassword || $resetpass2==resetpass2)
{
?>
<a href="home.php?users=users">Create User</a>|
<a href="home.php?viewusers=viewusers">View All Users</a>|
<a href="home.php?resetpassword=resetpassword">Reset User Passwords</a>|

<?php 
}


elseif ($modules==modules || $viewmodules==viewmodules || $editmodules==editmodules || $submodules==submodules || 
$viewsubmodules==viewsubmodules || $editsubmodules==editsubmodules )
{
?>
<a href="home.php?modules=modules">Add Module</a>|
<a href="home.php?viewmodules=viewmodules">View All Modules</a>|
<a href="home.php?submodules=submodules">Add SubModule</a>|
<a href="home.php?viewsubmodules=viewsubmodules">View SubModule</a>|
<?php 
}

elseif ($modulesusergroup==modulesusergroup || $viewmodulesusergroup==viewmodulesusergroup || $editmodulesusergroup==editmodulesusergroup
 || $assignsubmodule==assignsubmodule || $viewassignsubmodule==viewassignsubmodule || $editassignsubmodule==editassignsubmodule )
{
?>
<a href="home.php?modulesusergroup=modulesusergroup">Associate Module To Usergroup</a>|
<a href="home.php?viewmodulesusergroup=viewmodulesusergroup">View Module and Usergroup Association</a>|
<a href="home.php?assignsubmodule=assignsubmodule">Associate Sub Modules To Modules</a>|
<a href="home.php?viewassignsubmodule=viewassignsubmodule">View Module and Submodule Association</a>|
<?php 
}


elseif ($workpermitrenewals==workpermitrenewals || $viewworkpermitrenewals==viewworkpermitrenewals || 
$editworkpermitrenewals==editworkpermitrenewals || $reneworkpermit2==reneworkpermit2 || 
$visarenewals==visarenewals || $viewvisarenewals==viewvisarenewals || $editvisarenewals==editvisarenewals ||
$renewvisa2==renewvisa2


)
{
?>
<a href="home.php?workpermitrenewals=workpermitrenewals">Renew Work Permits</a>|
<a href="home.php?viewworkpermitrenewals=viewworkpermitrenewals">View All Renewed Work Permits</a>|
<a href="home.php?visarenewals=visarenewals">Renew Visas</a>|
<a href="home.php?viewvisarenewals=viewvisarenewals">View All Renewed Visas</a>|


<?php //$tpla
}
elseif ($generalledger==generalledger || $editgeneralledger==editgeneralledger)
{
?>
<a href="home.php?generalledger=generalledger">View General Ledger</a>|
<a href="#">Adjust General Legder</a>|


<?php 
}

elseif ($balancesheet==balancesheet || $editbalancesheet==editbalancesheet)
{
?>
<a href="home.php?balancesheet=balancesheet">View Balance Sheet</a>|
<a href="#">Adjust Balance Sheet</a>|


<?php 
}

elseif ($tpla==tpla || $edittpla==edittpla)
{
?>
<a href="home.php?tpla=tpla">View Trading Profit And Loss Account</a>|
<a href="#">Adjust Trading Profit And Loss Account</a>|


<?php 
}

elseif ($serviceledger==serviceledger || $editserviceledger==editserviceledger)
{
?>
<a href="home.php?serviceledger=serviceledger">View Service Revenue Ledger</a>|
<a href="#">Adjust Service Revenue Legder</a>|


<?php 
}

elseif (
$processinterflight==processinterflight || 
$viewprocessinterflight==viewprocessinterflight || 
$editprocessinterflight==editprocessinterflight ||
$processnatflight==processnatflight || 
$viewprocessnatflight==viewprocessnatflight || 
$editprocessnatflight==editprocessnatflight
)
{
?>
<a href="home.php?processinterflight=processinterflight">International Air Ticket</a>|
<a href="home.php?viewprocessinterflight=viewprocessinterflight">View Processed International Air Ticket</a>|
<a href="home.php?processnatflight=processnatflight">National Air Ticket</a>|
<a href="home.php?viewprocessnatflight=viewprocessnatflight">View Processed National Air Ticket</a>|


<?php 
}
elseif ($cashledger==cashledger || $editcashledger==editcashledger)
{
?>
<a href="home.php?cashledger=cashledger">View Cash Ledger</a>|
<a href="#">Adjust Cash Legder</a>|


<?php 
}
elseif ($expensesledger==expensesledger || $editexpensesledger==editexpensesledger)
{
?>
<a href="home.php?expensesledger=expensesledger">View Expenses Ledger</a>|
<a href="#">Adjust Expenses Legder</a>|


<?php 
}

elseif ($arledger==arledger || $editarledger==editarledger)
{
?>
<a href="home.php?arledger=arledger">View Accounts Receivables Ledger</a>|
<a href="#">Adjust Accounts Receivables Legder</a>|


<?php 
}

elseif ($apledger==apledger || $editapledger==editapledger)
{
?>
<a href="home.php?apledger=apledger">View Accounts Payables Ledger</a>|
<a href="#">Adjust Accounts Payables Legder</a>|


<?php 
}
elseif ($faledger==faledger || $editfaledger==editfaledger)
{
?>
<a href="home.php?faledger=faledger">View Fixed Asset Ledger</a>|
<a href="#">Adjust Fixed Asset Legder</a>|


<?php 
}


elseif ($subconinvoices==subconinvoices || $viewsubconinvoices==viewsubconinvoices || $editsubconinvoices==editsubconinvoices)
{
?>
<a href="home.php?subconinvoices=subconinvoices">Record Sub Contractor's Invoice</a>|
<a href="home.php?viewsubconinvoices=viewsubconinvoices">View All Subcontractor's Invoices</a>|


<?php 
}

elseif ($subconinvoicestoclient==subconinvoicestoclient || $viewsubconinvoicestoclient==viewsubconinvoicestoclient || $editsubconinvoicestoclient==editsubconinvoicestoclient)
{
?>
<a href="home.php?subconinvoicestoclient=subconinvoicestoclient">Record Sub Contractor's Invoice To Client</a>|
<a href="home.php?viewsubconinvoicestoclient=viewsubconinvoices">View All Subcontractor's Invoices To Client</a>|


<?php 
}


elseif ($assingomstaff==assingomstaff || $viewassingomstaff==viewassingomstaff || $editomstaff==editomstaff)
{
?>
<a href="home.php?assingomstaff=assingomstaff">Assign Subcontrator Staff To Projects</a>|
<a href="home.php?viewassingomstaff=viewassingomstaff">View Assigned Subcontrator's Staffs To Project</a>|


<?php 
}

elseif ($subconrate==subconrate || $viewsubconrate==viewsubconrate || $editsubconrate==editsubconrate)
{
?>
<a href="home.php?subconrate=subconrate">Add Subcontractor Rate</a>|
<a href="home.php?viewsubconrate=viewsubconrate">View Subcontractor Rate</a>|


<?php 
}

elseif ($pettycash==pettycash || $viewpettycashexpenses==viewpettycashexpenses || $pettycashfund==pettycashfund || 
$viewpettycashfund==viewpettycashfund || $viewpettycashledger==viewpettycashledger)
{
?>
<a href="home.php?pettycash=pettycash">Add Petty Cash Expenses</a>|
<a href="home.php?viewpettycashexpenses=viewpettycashexpenses">View All Petty Cash Expenses</a>|
<a href="home.php?pettycashfund=pettycashfund">Replenish Petty Cash</a>|
<a href="home.php?viewpettycashfund=viewpettycashfund">View Petty Cash Fund</a>|
<a href="home.php?viewpettycashledger=viewpettycashledger">View Petty Cash Ledger</a>|
<?php 
}
elseif ($income==income || $viewincome==viewincome || $editincome==editincome)
{
?>
<a href="home.php?income=income">Add Income</a>|
<a href="home.php?viewincome=viewincome">View All Income</a>|


<?php 
}
elseif ($initiateproject==initiateproject || $viewprojects==viewprojects || $editproject==editproject)
{
?>
<a href="home.php?initiateproject=initiateproject">Add Project</a>|
<a href="home.php?viewprojects=viewprojects">View All Projects</a>|


<?php 
}

elseif ($stafftoprojects==stafftoprojects || $viewstafftoprojects==viewstafftoprojects || $editstafftoprojects==editstafftoprojects)
{
?>
<a href="home.php?stafftoprojects=stafftoprojects">Assign Staff to Project</a>|
<a href="home.php?viewstafftoprojects=viewstafftoprojects">View Assigned Staff to Projects</a>|


<?php 
}
elseif ($stafftimesheet==stafftimesheet || $viewstafftimesheet==viewstafftimesheet || $editstafftimesheet==editstafftimesheet || $viewstafftimesheet1==viewstafftimesheet1)
{
?>
<a href="home.php?stafftimesheet=stafftimesheet">Record Staff Time Sheet</a>|
<a href="home.php?viewstafftimesheet1=viewstafftimesheet1">View Staff Timesheet</a>|
<?php 
}

elseif ($adminviewstafftimesheet1==adminviewstafftimesheet1 || $adminviewstafftimesheet==adminviewstafftimesheet)
{
?>
<a href="home.php?adminviewstafftimesheet1=adminviewstafftimesheet1">View Staff Timesheet</a>|
<?php 
}






elseif ($expenses==expenses || $viewexpenses==viewexpenses || $editexpenses==editexpenses)
{
?>
<a href="home.php?expenses=expenses">Add Expense</a>|
<a href="home.php?viewexpenses=viewexpenses">View All Expenses</a>|


<?php 
}
elseif ($processpayroll==processpayroll || $viewpayroll==viewpayroll || $editpayroll==editpayroll || $processpayroll2==processpayroll2 || 
$viewpayslip==viewpayslip || $payrollreport==payrollreport || $payrollreportssp==payrollreportssp || $bnprocesspayroll==bnprocesspayroll

|| $cancelpayroll==cancelpayroll)

{
?>
<?php 
					if ($user_group_id==2)
									{
									
								$user_id;
 
									$sqlx="select employees.staff_type FROM users,employees WHERE users.emp_id=employees.emp_id AND users.user_id='$user_id'";
									$resultsx= mysql_query($sqlx) or die ("Error $sqlx.".mysql_error());
									$rowsx=mysql_fetch_object($resultsx);

									$staff_type=$rowsx->staff_type;	
									
									
?>

					<a href="
					<?php if ($staff_type==1)
					{  ?>
					home.php?viewpayslip=viewpayslip
					<?php 
					}
					elseif ($staff_type==2)
					{
					?>
					home.php?viewexppayslip=viewexppayslip
					<?php
					}
					?>
					">View / Print My Payslip</a>|  
					<?php 
					}
					else
					{?>
					
					<a href="home.php?bnprocesspayroll=bnprocesspayroll">Process National Payroll</a>|
					<a href="home.php?payrollreport=payrollreport">National Payroll Report in USD</a>|
					<a href="home.php?payrollreportssp=payrollreportssp">National Payroll Report in SSP</a>|
					<a href="home.php?cancelpayroll=cancelpayroll">Cancel Payroll</a>|
					<a href="home.php?viewpayslip=viewpayslip">View Pay Slips Generated</a>| 

					<?php
					}


?>



<?php 
}

elseif ($adminpayrollreport==adminpayrollreport || $adminviewpayroll==adminviewpayroll || $adminviewpayslip==adminviewpayslip 
|| $adminpayrollreport==adminpayrollreport || $adminpayrollreportssp==adminpayrollreportssp)
{
?>
<a href="home.php?adminpayrollreport=adminpayrollreport">National Payroll Report in USD</a>|
<a href="home.php?adminpayrollreportssp=adminpayrollreportssp">National Payroll Report in SSP</a>|
<a href="home.php?adminviewpayslip=adminviewpayslip">View Pay Slips Generated</a>| 
<?php 
}





elseif ($processexppayroll==processexppayroll || $viewexppayroll==viewexppayroll || $editexppayroll==editexppayroll || $processexppayroll2==processexppayroll2 || 
$viewexppayslip==viewexppayslip || $payrollexpreport==payrollexpreport || $payrollexpreportssp==payrollexpreportssp 
|| $bnprocessexppayroll==bnprocessexppayroll || $cancelexppayroll==cancelexppayroll)
{
?>

<?php 
if ($user_group_id==2)
					{

						?>

					<a href="home.php?viewexppayslip=viewexppayslip">View / Print My Payslip</a>|
					
					<?php 
					
					}
					
					else
					{?>
					<a href="home.php?bnprocessexppayroll=bnprocessexppayroll">Process Expertriate Payroll</a>|
					<a href="home.php?payrollexpreport=payrollexpreport">Expertriate Payroll Report in USD</a>|
					<a href="home.php?payrollexpreportssp=payrollexpreportssp">Expertriate Payroll Report in SSP</a>|
					<a href="home.php?cancelexppayroll=cancelexppayroll">Cancel Processed Payroll</a>|
					<a href="home.php?viewexppayslip=viewexppayslip">View Expertriate Pay Slips Generated</a>|
					
					<?php 
					}
					
					?>
					
					
					
					
					
					
					
<?php 
}

elseif ( $adminviewexppayroll==adminviewexppayroll || $adminviewexppayslip==adminviewexppayslip || $adminpayrollexpreport==adminpayrollexpreport 
|| $adminpayrollexpreportssp==adminpayrollexpreportssp)
{
?>

<a href="home.php?adminpayrollexpreport=adminpayrollexpreport">Expertriate Payroll Report in USD</a>|
<!--<a href="home.php?adminpayrollexpreportssp=adminpayrollexpreportssp">Expertriate Payroll Report in SSP</a>|-->

<a href="home.php?adminviewexppayslip=adminviewexppayslip">View Expertriate Pay Slips Generated</a>|


<?php 
}







elseif ($nhifrates==nhifrates || $viewnhifrates==viewnhifrates || $editnhifrates==editnhifrates)
{
?>
<a href="home.php?nhifrates=nhifrates">Add NHIF Rates</a>|
<a href="home.php?viewnhifrates=viewnhifrates">View NHIF Rates</a>|


<?php 
}

elseif ($paye==paye || $viewpaye==viewpaye || $editpaye==editpaye)
{
?>
<a href="home.php?paye=paye">Add P.I.T Block</a>|
<a href="home.php?viewpaye=viewpaye">View P.I.T Block</a>|


<?php 
}


elseif ($benefitded==benefitded || $viewbenefitded==viewbenefitded || $editbenefitded==editbenefitded || $deduction==deduction || $viewdeduction==viewdeduction)
{
?>
<a href="home.php?benefitded=benefitded">Add Benefit Types</a>|
<a href="home.php?viewbenefitded=viewbenefitded">View All Benefit Types</a>|
<a href="home.php?deduction=deduction">Add Deduction Types</a>|
<a href="home.php?viewdeduction=viewdeduction">View All Deductions Types</a>|


<?php 
}

elseif ($loansav==loansav || $viewloansav==viewloansav || $editloansav==editloansav || $savings==savings || $viewsavings==viewsavings)
{
?>
<a href="home.php?loansav=loansav">Add Loan Types</a>|
<a href="home.php?viewloansav=viewloansav">View All Loan Types</a>|
<a href="home.php?savings=savings">Add Savings Types</a>|
<a href="home.php?viewsavings=viewsavings">View All Savings Types</a>|


<?php 
}







elseif ($assignexperts==assignexperts || $assignexperts2==assignexperts2 || $viewassignexperts==viewassignexperts || $editassignexperts==editassignexperts)
{


$job_cat_id=$_GET['job_cat_id'];

if ($job_cat_id==2)
{
					?>
					<a href="home.php?assignexperts=assignexperts&job_cat_id=2">Assign Expert Staff to Clients</a>|
					<a href="home.php?viewassignexperts=viewassignexperts">View Assign Expert Staff to Clients</a>|
					<?php
					}
					else
					{
					?>
					<a href="home.php?assignexperts=assignexperts&job_cat_id=1">Assign Local Staff to Clients</a>|
					<a href="home.php?viewassignexperts=viewassignexperts">View Assign Local Staff to Clients</a>|
					<?php

					}
					 ?>

<?php 
}elseif ($assignlocals==assignlocals || $assignlocals2==assignlocals2 || $viewassignlocals==viewassignlocals || $editassignlocals==editassignlocals)
{
?>
<a href="home.php?assignexperts=assignexperts&job_cat_id=1">Assign Local Staff to Clients</a>|
<a href="home.php?viewassignlocals=viewassignlocals">View Assigned Local Staff to Clients</a>|


<?php 
}
elseif ($omrates==omrates || $viewomrates==viewomrates || $editomrates==editomrates)
{
?>
<a href="home.php?omrates=omrates">Add Rate Per Day</a>|
<a href="home.php?viewomrates=viewomrates">View Rates Per Day</a>|


<?php 
}
elseif ($omjobtitles==omjobtitles || $viewomjobtitles==viewomjobtitles || $editomjobtitles==editomjobtitles)
{
?>
<a href="home.php?omjobtitles=omjobtitles">Add O&M Job Titles</a>|
<a href="home.php?viewomjobtitles=viewomjobtitles">View O&M Job Titles</a>|


<?php 
}
elseif ($titlelocation==titlelocation || $viewtitlelocation==viewtitlelocation || $edittitlelocation==edittitlelocation)
{
?>
<a href="home.php?titlelocation=titlelocation">Assign Titles To Location</a>|
<a href="home.php?viewtitlelocation=viewtitlelocation">View Assigned Titles To Location</a>|


<?php 
}
elseif ($omlocations==omlocations || $viewomlocations==viewomlocations)
{
?>
<a href="home.php?omlocations=omlocations">Add O & M  Locations</a>|
<a href="home.php?viewomlocations=viewomlocations">Vew All O & M Locations</a>|


<?php 
}

elseif ($omconsultants==omconsultants || $viewomconsultants==viewomconsultants || $editsubcon==editsubcon)
{
?>
<a href="home.php?omconsultants=omconsultants">Add Subcontractor </a>|
<a href="home.php?viewomconsultants=viewomconsultants">Vew All Subcontractor</a>|


<?php 
}
elseif ($omstaff==omstaff || $viewomstaff==viewomstaff)
{
?>
<a href="home.php?omstaff=omstaff">Add Subcontrator Staff</a>|
<a href="home.php?viewomstaff=viewomstaff">Vew Subcontrator Staffs</a>|


<?php 
}
elseif ($omclients==omclients || $viewomclients==viewomclients)
{
?>
<a href="home.php?omclients=omclients">Add O & M Clients</a>|
<a href="home.php?viewomclients=viewomclients">Vew All O & M Clients</a>|


<?php 
}
elseif ($generateinvoice==generateinvoice ||$viewinvoices==viewinvoices || $invoice2==invoice2 || $preinvoice2==preinvoice2 )
{
?>
<a href="home.php?generateinvoice=generateinvoice">Create New Invoice</a>|
<a href="home.php?viewinvoices=viewinvoices">View All Invoices Generated</a>|


<?php 
}
elseif ($perdm==perdm || $viewperdm==viewperdm || $editperdm==editperdm)
{
?>
<a href="home.php?perdm=perdm">Add Per DM Charges</a>|
<a href="home.php?viewperdm=viewperdm">View All Per DM Charges</a>|


<?php 
}

elseif ($subspeciality==subspeciality || $viewsubspeciality==viewsubspeciality || $editsubspeciality==editsubspeciality)
{
?>
<a href="home.php?subspeciality=subspeciality">New Client</a>|
<a href="home.php?viewsubspeciality=viewsubspeciality">View All Clients</a>|

<?php 
}
elseif ($outreach==outreach || $editoutreach==editoutreach || $outreach2==outreach2 || $viewoutreach==viewoutreach || $detailoutreach==detailoutreach)
{
?>
<a href="home.php?outreach=outreach">New Outreach Record</a>|
<a href="home.php?viewoutreach=viewoutreach">View Outreach Records</a>|

<?php 
}
elseif ($newuser==newuser || $access==access || $edituser==edituser)
{
?>
<a href="home.php?newusergroup=newusergroup">Add New User Group</a>|
<a href="home.php?usergroups=usergroups">View All User Groups</a>|
<a href="home.php?newuser=newuser">Add New User </a>|
<a href="home.php?access=access">View All Users</a>|

<?php 

}
elseif ($newusergroup==newusergroup || $usergroups==usergroups || $editgroup==editgroup )
{

?>
<a href="home.php?newusergroup=newusergroup">Add User Group </a>|
<a href="home.php?usergroups=usergroups">View All User Groups</a>|
<!--<a href="home.php?newuser=newuser">Add New User </a>|
<a href="home.php?access=access">View All Users</a>|-->

<?php 
}

elseif ($settings==settings || $newsponsor==newsponsor || $viewsponsor==viewsponsor || $editsponsor==editsponsor)
{
?>
<a href="home.php?newsponsor=newsponsor">Add New Currency</a>|
<a href="home.php?viewsponsor=viewsponsor">Update Currency</a>|
<!--<a href="home.php?newunivesity=newunivesity">Add New Host Institution </a>|
<a href="home.php?viewuniversity=viewuniversity">View Host Institutions</a>|
<a href="home.php?newinstitute=newinstitute">Add New Institution of Origin</a>|
<a href="home.php?viewinstitute=viewinstitute">View Institutions of Origin</a>|-->
<?php 
}

elseif ($newinstitute==newinstitute || $viewinstitute==viewinstitute || $editsponsor==editsponsor || $editinstoffer==editinstoffer )
{
?>
<a href="home.php?newinstitute=newinstitute">Add New Job Category</a>|
<a href="home.php?viewinstitute=viewinstitute">View Job Categories</a>|
<?php 
}
elseif ($newunivesity==newunivesity || $viewuniversity==viewuniversity || $editsponsor==editsponsor || $edituniversity==edituniversity)
{
?>
<a href="home.php?newunivesity=newunivesity">Add New Block </a>|
<a href="home.php?viewuniversity=viewuniversity">View All Blocks</a>|

<?php 
}
elseif ($admineditoutreach==admineditoutreach || $admineditsubspeciality==admineditsubspeciality || $admineditcpd==admineditcpd || $admineditpostgraduate==admineditpostgraduate || $cpdreport==cpdreport || $reports==reports || $outreachreport==outreachreport || $postgraduatereport==postgraduatereport || $subspecialityreport==subspecialityreport || $monitor==monitor )
{
?>

<?php 
} 
  
if ($recorddata==recorddata || $addcpdreport==addcpdreport || $adminoutreach2==adminoutreach2 || 
$addpostgraduatereport==addpostgraduatereport )
{
?>
<a href="home.php?recorddata=recorddata">Assign Staff to Blocks</a>|
<a href="home.php?addpostgraduatereport=addpostgraduatereport">View Assignned Staff to Blocks</a>|
<a href="home.php?addcpdreport=addcpdreport">Unassign Staff to Block</a>|
<a href="home.php?addsubspecialityreport=addsubspecialityreport">View Unaasigned Staffs from Blocks</a>|

<?php 
} 

if ($addsubspecialityreport==addsubspecialityreport || $viewpendingstaff==viewpendingstaff || $rotatestaff==rotatestaff  )
{ 
?>
<a href="home.php?addsubspecialityreport=addsubspecialityreport">Rotate Staff</a>|
<a href="home.php?viewpendingstaff=viewpendingstaff">View Next Lot of Staff </a>|
<a href="#">Unassign Replaced Staff</a>|
<a href="#">View Unaasigned Replaced Staff</a>|

<?php 
} 

?>



</div>

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

if ($viewfixedasset==viewfixedasset)
{
?>
<h1 class="br-5">Fixed Assets Management: View Fixed Asset</h1>
<?php

include ('view_fixed_assets.php');
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

if ($submodules==submodules)
{
?>
<h1 class="br-5">Access Control: Create Sub Module</h1>
<?php
include ('add_submodule.php');
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
<h1 class="br-5">Settings: Create Per DM Charges</h1>
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
<h1 class="br-5">System Settings: Create New Subcontractor</h1>
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
<h1 class="br-5">System Settings: View All Subcontractor</h1>
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

if ($processpayroll==processpayroll)
{

?>
<h1 class="br-5">Staff Payroll: Process Payroll 1st Step</h1>
<?php
include ('process_payroll.php');

}

if ($bnprocesspayroll==bnprocesspayroll)
{

?>
<h1 class="br-5">Staff Payroll: Process Nationals Staffs Payroll 1st Step</h1>
<?php
include ('begin_national_payrol.php');

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
<h1 class="br-5">Staff Payroll: View NHIF Rates Block</h1>
<?php
include ('view_nhif_rates.php');

}

if ($benefitded==benefitded)
{

?>
<h1 class="br-5">Staff Payroll: Add Benefit Type</h1>
<?php
include ('add_benefit.php');

}
if ($viewbenefitded==viewbenefitded)
{

?>
<h1 class="br-5">Staff Payroll: View Benefit Types</h1>
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
<h1 class="br-5">Settings: View Per DM Charges</h1>
<?php
include ('view_perdm.php');

}
if ($editperdm==editperdm)
{

?>
<h1 class="br-5">Settings: Update Per DM Charges</h1>
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
<h1 class="br-5">Settings : Creating Clients</h1>
<?php
include ('sub_speciliality.php');

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
<h1 class="br-5">Settings : List of Our Clients</h1>
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
<h1 class="br-5">System Settings:: Creating New Currency</h1>
<?php
include ('add_sponsor.php');
}

elseif ($viewsponsor==viewsponsor || $settings==settings)
{
?>
<h1 class="br-5">System Settings:: List of All Currencies</h1>
<?php
include ('viewsponsors.php');
}

elseif ($newunivesity==newunivesity)
{
?>
<h1 class="br-5">System Settings:: Creating New Block</h1>
<?php
include ('add_university.php');
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
<h1 class="br-5">System Settings:: Creating New Job Category</h1>
<?php
include ('add_insitution_offering.php');
}

elseif ($viewinstitute==viewinstitute)
{
?>
<h1 class="br-5">System Settings:: List of All Job Categories</h1>
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
<td style="font-weight:bold; color:#FF6600;">Human Resource Management</a></td>
<td></td>
<td style="font-weight:bold; color:#FF6600;">SIPET Project Management</a></td>
<td></td>
<td style="font-weight:bold; color:#FF6600;">Accounts & Financial Reports</a></td>
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
<td style="font-weight:bold; color:#FF6600;">Petty Cash Management</a></td>
<td></td>
<td style="font-weight:bold; color:#FF6600;">Service Revenue Management</a></td>
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
