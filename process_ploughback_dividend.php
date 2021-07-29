<?php
include('includes/session.php');
include('Connections/fundmaster.php');
$shares_id=$_GET['shares_id'];
$financial_year_id=$_GET['financial_year_id'];
$dividend_id=$_GET['dividend_id'];
$amount=mysql_real_escape_string($_POST['amount']);
$desc=mysql_real_escape_string($_POST['desc']);
$div_amount=mysql_real_escape_string($_POST['div_amount']);
$withdrawn=$div_amount-$amount;
$current_year=date('Y');

$sqlsh="SELECT * FROM shares where shares_id='$shares_id'";
$resultssh= mysql_query($sqlsh) or die ("Error $sqlsh.".mysql_error());
$rowsshare=mysql_fetch_object($resultssh);
$share_holder=$rowsshare->share_holder_name;
$shares_amount=$rowsshare->shares_amount;

$sqlred="SELECT * FROM ploughed_back_dividend where shares_id='$shares_id' and year_recorded='$current_year'";
$resultsred= mysql_query($sqlred) or die ("Error $sqlred.".mysql_error());
$numrows=mysql_num_rows($resultsred);

if ($numrows>0)
{
header ("Location: view_dividends.php?exist=1");
}

else
{

$amount2=$shares_amount+$amount;

$sqladd= "insert into ploughed_back_dividend values('','$shares_id','$dividend_id','$financial_year_id','$user_id','$amount','$desc',NOW(),'$current_year')";
$resultsadd= mysql_query($sqladd) or die ("Error $sqladd.".mysql_error());

$sqlpb= "update shares set shares_amount='$amount2' where shares_id='$shares_id'";
$resultspb= mysql_query($sqlpb) or die ("Error $sqlpb.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Retained Dividends for $share_holder','-$amount2','','$amount2','6','1',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Cash Retained Dividends Shares for $share_holder','$amount2','$amount2','','6','1',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());


$sqlgenled= "insert into cash_ledger values('','Retained Shares for $share_holder','$amount','$amount','','6','1',NOW())";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());


$querysh="select * from  shares where status='0'";
$resultssh=mysql_query($querysh) or die ("Error: $querysh.".mysql_error());
//$rowssh=mysql_fetch_object($resultssh);

if (mysql_num_rows($resultssh)>0)
{
while ($rowssh=mysql_fetch_object($resultssh))
{

$shares_amountdb=$rowssh->shares_amount;
$grnd_sharesdb=$grnd_sharesdb+$shares_amountdb;
}

}
$grnd_sharesdb;

$querylat="select * from  shares where status='0'";
$resultslat=mysql_query($querylat) or die ("Error: $querylat.".mysql_error());
if (mysql_num_rows($resultslat)>0)
{
while ($rowslat=mysql_fetch_object($resultslat))
{

$lat_shares_id=$rowslat->shares_id;
$indiv_shares_amount=$rowslat->shares_amount;
echo $perc=($indiv_shares_amount/$grnd_sharesdb*100).' ';

$sql= "update shares set perc_shares='$perc' where shares_id='$lat_shares_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



}

 }


if ($withdrawn!=0)
 {
$sqlwith= "insert into withdrawn_dividends values('','$shares_id','$dividend_id','$financial_year_id','$user_id','Partial withdrawal due to partial ploughback of $share_holder_name dividends','$withdrawn','cash',NOW())";
$resultswith= mysql_query($sqlwith) or die ("Error $sqlwith.".mysql_error());

$sql3="INSERT INTO dividends VALUES('', '$shares_id', '$financial_year', '$withdrawn')";
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Withdrawn Dividends for $share_holder','$withdrawn','$withdrawn','','6','1',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Cash Dividends Paid for $share_holder','-$withdrawn','','$withdrawn','6','1',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());


$sqlgenled= "insert into cash_ledger values('','Retained Shares for $share_holder','-$withdrawn','','$withdrawn','6','1',NOW())";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

}

 

header ("Location: view_dividends.php?success=1");
}
/*$querylat="select * from  shares where status='0'";
$resultslat=mysql_query($querylat) or die ("Error: $querylat.".mysql_error());

if (mysql_num_rows($resultslat)>0)
{
while ($rowslat=mysql_fetch_object($resultslat))
{

$lat_shares_id=$rowslat->shares_id;
$indiv_shares_amount=$rowslat->shares_amount;
echo $perc=($indiv_shares_amount/$grnd_sharesdb*100).' ';

$sql= "update shares set perc_shares='$perc' where shares_id='$lat_shares_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

}*/



//}



?>