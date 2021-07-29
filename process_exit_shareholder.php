<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');
$shareholderid=mysql_real_escape_string($_POST['shareholderid']);

$task_totals=0;
$shares_amnt=0;
$sqlts="select * from shareholder_transactions where shareholder_id='$shareholderid'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
if (mysql_num_rows($resultsts) > 0)
						  {
						  while ($rowsts=mysql_fetch_object($resultsts))
						  {
						  
						  $shares_amnt=$rowsts->amount;
						  $curr_rate=$rowsts->curr_rate;
						  $task_ttl_kshs=$shares_amnt*$curr_rate;
						  $net_shares=$net_shares+$task_ttl_kshs;
						  }
						  //echo $task_totals;
			
						  }

$querylatelpo="select * from shares WHERE shares_id='$shareholderid'";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);
$exp_cat_name=$rowslatelpo->share_holder_name;


$mop=mysql_real_escape_string($_POST['mop']);
$exit_date=mysql_real_escape_string($_POST['exit_date']);
//$ben_shareholderid=mysql_real_escape_string($_POST['ben_shareholderid']);

/* $querylatelpo2="select * from shares WHERE shares_id='$ben_shareholderid'";
$resultslatelpo2=mysql_query($querylatelpo2) or die ("Error: $querylatelpo2.".mysql_error());
$rowslatelpo2=mysql_fetch_object($resultslatelpo2);
$exiting_shareholder2=$rowslatelpo2->share_holder_name; */

//$net_shares=mysql_real_escape_string($_POST['net_shares']);
$desc=mysql_real_escape_string($_POST['comments']);
//$amount_transfered2=mysql_real_escape_string($_POST['amount_transfered']);
//$amount_withdrawn=$net_shares-$amount_transfered;

/* 
if ($exit_mode=='1')
{
$amount_transfered=$net_shares;
$amount_withdrawn=0;

}
if ($exit_mode=='2')
{
$amount_transfered=$amount_transfered2;
$amount_withdrawn=$net_shares-$amount_transfered2;
}

if ($exit_mode=='3')
{
$amount_transfered=0;
$amount_withdrawn=$net_shares;
} */


if ($mop==1 || $mop==4)//cash or mpesa
{
$sql= "insert into exited_shares_payments values ('','$sales_code_id','$shareholderid','$user_id','','$amount','$desc','$currency','$curr_rate','$mop','$ref_no',
'$exit_date','','',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

if ($mop==2)//cheque
{
$sql= "insert into exited_shares_payments values ('','$sales_code_id','$shareholderid','$user_id','','$amount','$desc','$currency','$curr_rate','$mop','$cheque_no',
'$exit_date','$cheq_drawer','',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

if ($mop==3)//bank transfer
{
$sql= "insert into exited_shares_payments values ('','$sales_code_id','$shareholderid','$user_id','','$amount','$desc','$currency','$curr_rate',
'$mop','$transaction_code',
'$exit_date','$client_bank','$our_bank',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}



//generate sales receipt number
$queryrec_p="select * from exited_shares_payments order by exited_shares_payments_id desc limit 1";
$resultsrec_p=mysql_query($queryrec_p) or die ("Error: $queryrec_p.".mysql_error());
$numrowsrec_p=mysql_fetch_object($resultsrec_p);
$latest_id=$numrowsrec_p->exited_shares_payments_id;

$year=date('Y');


	$tempnum=$latest_id;
	if($tempnum < 10)
            {
              $receipt_no = "MGSR000".$tempnum."/".$year;
			   

            } else if($tempnum < 100) 
			{
             $receipt_no = "MGSR00".$tempnum."/".$year;
			 			 
            } else 
			{ 
			 $receipt_no= "MGSR".$tempnum."/".$year; 
			 	  
			}
			

$sqluprec_no="UPDATE exited_shares_payments set receipt_no='$receipt_no' where exited_shares_payments_id='$latest_id'";
$resultsuprec_no= mysql_query($sqluprec_no) or die ("Error $sqluprec_no.".mysql_error());


$sqluprec_no="UPDATE shares set status='1' where shares_id='$shareholderid'";
$resultsuprec_no= mysql_query($sqluprec_no) or die ("Error $sqluprec_no.".mysql_error());


/* $transaction_desc="Exiting Of Shareholder ".$exiting_shareholder.' ('.$comments.')';

$transaction_desc2="Transfer Of Shares From ".$exiting_shareholder;

$transaction_desc3="Transfer Of Shares From ".$exiting_shareholder.' To '.$exiting_shareholder2;

$transaction_desc4="Exit and Full Withdrawal Of Shares From ".$exiting_shareholder; */


$transaction_descinv='Exiting Of Shareholder: ('.$exp_cat_name.')';
$transaction_desclg='Exiting Of Shareholder ('.$exp_cat_name.') and paid through Bank Transfer. Ref No : '.$transaction_code;
$transaction_descch='Exiting Of Shareholder ('.$exp_cat_name.') and paid through Cheque. Cheque No : '.$cheque_no;
$transaction_desccas='Exiting Of Shareholder ('.$exp_cat_name.') and paid through Cash. Ref No : '.$ref_no;

$currency=7;
/* $querycr="select curr_rate from currency where curr_id='$currency'";
$resultscr=mysql_query($querycr) or die ("Error: $querycr.".mysql_error());							  
$rowscr=mysql_fetch_object($resultscr); */
$curr_rate=1;


$sql4="INSERT INTO shareholder_transactions VALUES('','$shareholderid','exit$latest_id','$transaction_descinv','$currency',
'$curr_rate','-$net_shares','$exit_date')" or die(mysql_error());
$results4= mysql_query($sql4) or die ("Error $sql4.".mysql_error());



if ($mop==2)// cheque
{
$sqlgenled= "insert into bank_ledger values('','$transaction_descch','-$net_shares','','$net_shares','$currency','$curr_rate','$exit_date','exit$latest_id','','','')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqltranslg= "insert into bank_statement values('','$transaction_descch','-$net_shares','','$net_shares','$mop','$our_bank','$currency','$curr_rate','$exit_date','exit$latest_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());



}

if ($mop==3)// electronic
{

$sqlgenled= "insert into bank_ledger values('','$transaction_desclg','-$net_shares','','$net_shares','$currency','$curr_rate','$exit_date','exit$latest_id','','','')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqltranslg= "insert into bank_statement values('','$transaction_desclg','-$net_shares','','$net_shares','$mop','$our_bank','$currency','$curr_rate','$exit_date','exit$latest_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());


}

if ($mop==1 || $mop==4)// cash
{

$sqlgenled= "insert into cash_ledger values('','$transaction_desclg','-$net_shares','','$net_shares','$currency','$curr_rate','$exit_date','exit$latest_id','','','')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

}

$sqltranslg= "insert into shares_ledger values('','$transaction_descinv','-$net_shares','$net_shares','','$currency','$curr_rate','$exit_date','exit$latest_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Exited Shareholder $exp_cat_name')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:exit_shareholder.php?addconfirm=1");

mysql_close($cnn);


?>


