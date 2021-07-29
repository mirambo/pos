<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$share_holder=mysql_real_escape_string($_POST['share_holder']);
$exp_cat_name=$share_holder;
$contact_person=mysql_real_escape_string($_POST['contact_person']);
$next_of_kin=mysql_real_escape_string($_POST['next_of_kin']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$share_amount=mysql_real_escape_string($_POST['share_amount']);

$mop=mysql_real_escape_string($_POST['mop']);
$cheque_no=mysql_real_escape_string($_POST['cheque_no']);
$cheq_drawer=mysql_real_escape_string($_POST['cheq_drawer']);
$date_drawn=mysql_real_escape_string($_POST['date_drawn']);
$ref_no=mysql_real_escape_string($_POST['ref_no']);

$date_paid=mysql_real_escape_string($_POST['date_paid']);
$m_date_paid=mysql_real_escape_string($_POST['m_date_paid']);
$m_ref_no=mysql_real_escape_string($_POST['m_ref_no']);
$transaction_code=mysql_real_escape_string($_POST['transaction_code']);
$client_bank=mysql_real_escape_string($_POST['client_bank']);
$our_bank=mysql_real_escape_string($_POST['our_bank']);
$date_trans=mysql_real_escape_string($_POST['date_trans']);

$cheq_drawer=mysql_real_escape_string($_POST['cheq_drawer']);
$date_drawn=mysql_real_escape_string($_POST['date_drawn']);
$trans_src_bank=mysql_real_escape_string($_POST['trans_src_bank']);
$dep_bank=mysql_real_escape_string($_POST['dep_bank']);
$date_trans=mysql_real_escape_string($_POST['date_trans']);

/* $sqlcurr="select * from currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
$curr_rate=$rowcurr->curr_rate; */

//$curr_rate
//$remarks=mysql_real_escape_string($_POST['remarks']);




$queryprof="select * from  shares where share_holder_name='$share_holder' AND contact_person='$contact_person' AND shares_amount='$shares_amount'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());			  
$numrowscomp=mysql_num_rows($resultsprof);
 
 
if ($numrowscomp>0)

{

header ("Location:shares.php? recordexist=1");

}

else 

{










if ($mop==1)//cash
{
/* $sql= "insert fixed_assets_payments values ('','','$fixed_asset_id','$amnt_paid','','$currency','$curr_rate',
'$mop','','$ref_no','$date_paid','','',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error()); */

$sql= "insert into shares values ('','$share_holder','$contact_person','$next_of_kin','','$share_amount',
'$currency','$curr_rate','$mop','','$ref_no','$date_paid','','',NOW(),'0','')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

if ($mop==4)//mpesa
{
/* $sql= "insert fixed_assets_payments values ('','','$fixed_asset_id','$amnt_paid','','$currency','$curr_rate',
'$mop','','$ref_no','$m_date_paid','','',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error()); */

$sql= "insert into shares values ('','$share_holder','$contact_person','$next_of_kin','','$share_amount',
'$currency','$curr_rate','$mop','','$ref_no','$date_paid','','',NOW(),'0','')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

if ($mop==2)//cheque
{

/* $sql= "insert fixed_assets_payments values ('','','$fixed_asset_id','$amnt_paid','','$currency','$curr_rate',
'$mop','$cheque_no','$ref_no','$date_drawn','$cheq_drawer','',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error()); */

$sql= "insert into shares values ('','$share_holder','$contact_person','$next_of_kin','','$share_amount',
'$currency','$curr_rate','$mop','$cheque_no',' ','$date_paid','$cheq_drawer','',NOW(),'0','')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

if ($mop==3)//bank transfer
{
/* $sql= "insert fixed_assets_payments values ('','','$fixed_asset_id','$amnt_paid','','$currency','$curr_rate',
'$mop','','$transaction_code','$date_trans','$client_bank','$our_bank',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error()); */

$sql= "insert into shares values ('','$share_holder','$contact_person','$next_of_kin','','$share_amount',
'$currency','$curr_rate','$mop','','$transaction_code','$date_paid','$client_bank','$our_bank',NOW(),'0','')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}


$querylatelpo="select * from shares order by shares_id desc limit 1";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);

$shares_id=$rowslatelpo->shares_id;

/* $transaction_desc="Initial Shares By ".$share_holder;
$transaction_descb='Shares payments for '.$share_holder."Received through bank transfer. Ref No : ".$transaction_code ; */

$transaction_descinv='Shares Payment for : '.$exp_cat_name;
$transaction_desclg='Shares Payment for  '.($exp_cat_name).' through Bank Transfer. Ref No : '.$transaction_code;
$transaction_descch='Shares Payment for  '.($exp_cat_name).' through Cheque. Cheque No : '.$cheque_no;
$transaction_desccas='Shares Payment for '.($exp_cat_name).' through Cash. Ref No : '.$ref_no;



/* $sqlgenled= "insert into general_ledger values('','Shares for $share_holder','-$share_amount','','$share_amount','$currency','$curr_rate',NOW(),'capt$shares_id')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());
'$date_paid'
$sqlgenled= "insert into general_ledger values('','Cash Shares for $share_holder','$share_amount','$share_amount','','$currency','$curr_rate',NOW(),'capt$shares_id')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error()); */


if ($mop==2) //cheque
{
$sqltranslg= "insert into bank_ledger values('','$transaction_descch','$share_amount','$share_amount ',' ','$currency','$curr_rate','$date_paid','capt$shares_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into shares_ledger values('','$transaction_descch','$share_amount','','$share_amount','$currency','$curr_rate','$date_paid','capt$shares_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into bank_statement values('','$transaction_descch','$share_amount','$amnt_paid ','','$mop','$our_bank','$currency','$curr_rate','$date_paid','capt$shares_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sql4="INSERT INTO shareholder_transactions VALUES('','$shares_id','capt$shares_id','$transaction_descch','$currency',
'$curr_rate','$share_amount','$date_paid')" or die(mysql_error());
$results4= mysql_query($sql4) or die ("Error $sql4.".mysql_error());


}

if ($mop==3) //transfer
{
$sqltranslg= "insert into bank_ledger values('','$transaction_desclg','$share_amount','$share_amount ',' ','$currency','$curr_rate','$date_paid','capt$shares_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into shares_ledger values('','$transaction_desclg','$share_amount','','$share_amount','$currency','$curr_rate','$date_paid','capt$shares_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into bank_statement values('','$transaction_desclg','$share_amount','$amnt_paid ','','$mop','$our_bank','$currency','$curr_rate','$date_paid','capt$shares_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sql4="INSERT INTO shareholder_transactions VALUES('','$shares_id','capt$shares_id','$transaction_desclg','$currency',
'$curr_rate','$share_amount','$date_paid')" or die(mysql_error());
$results4= mysql_query($sql4) or die ("Error $sql4.".mysql_error());
}

if ($mop==1 || $mop==4) //cash
{
$sqltranslg= "insert into cash_ledger values('','$transaction_desccas','$share_amount','$share_amount ',' ','$currency','$curr_rate','$date_paid','capt$shares_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into shares_ledger values('','$transaction_desccas','$share_amount','','$share_amount','$currency','$curr_rate','$date_paid','capt$shares_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());


$sql4="INSERT INTO shareholder_transactions VALUES('','$shares_id','capt$shares_id','$transaction_desccas','$currency',
'$curr_rate','$share_amount','$date_paid')" or die(mysql_error());
$results4= mysql_query($sql4) or die ("Error $sql4.".mysql_error());
}


$querysh="select * from  shares where status='0' OR status='2'";
$resultssh=mysql_query($querysh) or die ("Error: $querysh.".mysql_error());
//$rowssh=mysql_fetch_object($resultssh);

if (mysql_num_rows($resultssh)>0)
{
while ($rowssh=mysql_fetch_object($resultssh))
{
$curr_rate=$rowssh->curr_rate;
$shares_amountdb=$rowssh->shares_amount*$curr_rate;
$grnd_sharesdb=$grnd_sharesdb+$shares_amountdb;
}

}
$grnd_sharesdb;

//Percentage shares




$querylat="select * from  shares where status='0' OR status='2'";
$resultslat=mysql_query($querylat) or die ("Error: $querylat.".mysql_error());

if (mysql_num_rows($resultslat)>0)
{
while ($rowslat=mysql_fetch_object($resultslat))
{

$lat_shares_id=$rowslat->shares_id;
$curr_rate=$rowslat->curr_rate;
$indiv_shares_amount=$rowslat->shares_amount*$curr_rate;
echo $perc=($indiv_shares_amount/$grnd_sharesdb*100).' ';

$sql= "update shares set perc_shares='$perc' where shares_id='$lat_shares_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

}


header ("Location:shares.php?addconfirm=1");

}




mysql_close($cnn);


?>


