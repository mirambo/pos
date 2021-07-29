<?php
#include connection
include('Connections/fundmaster.php');


$financial_year=mysql_real_escape_string($_POST['financial_year']);
$dividend=mysql_real_escape_string($_POST['dividend']);



foreach($_POST['shares'] as $row=>$Shares)
{

$shares=mysql_real_escape_string($Shares);
$financial_year=mysql_real_escape_string($_POST['financial_year'][$row]);
$dividend=mysql_real_escape_string($_POST['dividend'][$row]);



$sql3="INSERT INTO dividends VALUES('', '$shares', '$financial_year', '$dividend')";
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

$sqltrans= "insert into cash_ledger values('','Dividends for financial year $financial_year','-$dividend','','$dividend','6','1',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());


$sqlgenled= "insert into general_ledger values('','Dividends for financial year $financial_year','$dividend','$dividend','','6','1',NOW())";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Cash Dividends for financial year $financial_year','-$dividend','','$dividend','6','1',NOW())";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());



$sql5="SELECT * FROM dividends order by dividend_id desc limit 1,1";
$results5= mysql_query($sql5) or die ("Error $sql5.".mysql_error());
$rows5=mysql_fetch_object($results5);

$sql6="SELECT * FROM dividends order by dividend_id desc limit 1";
$results6= mysql_query($sql6) or die ("Error $sql6.".mysql_error());
$rows6=mysql_fetch_object($results6);



}
$up_fy=$rows5->financial_year_id;
$up_dm=$rows5->dividend_amount;
echo $div_id=$rows6->dividend_id;


$sql7="UPDATE dividends SET financial_year_id='$up_fy',dividend_amount='$up_dm' WHERE dividend_id='$div_id'";
$results7= mysql_query($sql7) or die ("Error $sql7.".mysql_error());








header ("Location:add_dividend.php?addconfirm=1");




mysql_close($cnn);


?>


