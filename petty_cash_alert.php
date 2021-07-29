<?php
include('Connections/fundmaster.php');
require_once "Mail.php";
//current date
$date1=date('Y-m-d');


//30 days after
$date2=date("Y-m-d", strtotime("+ 60 day"));

 ?>
 <html lang="en">
<head>
<meta charset="utf-8" />
<title>jQuery UI Progressbar - Default functionality</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />
<script>
$(function() {
$( "#progressbar" ).progressbar({
value: 37
});
});
</script>
</head>
<body >
	<div id="progressbar"></div>
 
<?php 
$gnd_amnt=0;
$sql34="SELECT petty_cash_income.description,petty_cash_income.petty_cash_income_id,petty_cash_income.currency,petty_cash_income.amount,petty_cash_income.date_recorded,petty_cash_income.curr_rate,currency.curr_initials
FROM petty_cash_income,currency where currency.curr_id=petty_cash_income.currency";
$results34= mysql_query($sql34) or die ("Error $sql34.".mysql_error());
if (mysql_num_rows($results34) > 0)
						  {
							
							  while ($rows34=mysql_fetch_object($results34))
							  { 
    

number_format($amount34=$rows34->amount,2);
 number_format($curr_rate=$rows34->curr_rate,2);
 number_format($currency_code=$rows34->currency,2);

if ($currency_code==2)
{
$amount_usd=$amount34;
}
else
{

$amount_usd=$amount34/$curr_rate;
}
//echo $amount_usd;
  
 $gnd_amnt=$gnd_amnt+$amount_usd;
  }
 
   //echo $gnd_amnt.' ';
  }
  
 $gnd_amnt_exp=0; 
 $sql35="SELECT petty_cash_expense.description,petty_cash_expense.petty_cash_expense_id,petty_cash_expense.currency,petty_cash_expense.amount,petty_cash_expense.date_recorded,petty_cash_expense.curr_rate,currency.curr_initials
FROM petty_cash_expense,currency where currency.curr_id=petty_cash_expense.currency";
$results35= mysql_query($sql35) or die ("Error $sql35.".mysql_error());
if (mysql_num_rows($results35) > 0)
						  {
							
							  while ($rows35=mysql_fetch_object($results35))
							  { 
    

number_format($amount35=$rows35->amount,2);
number_format($curr_rate=$rows35->curr_rate,2);
 number_format($currency_code=$rows35->currency,2);

if ($currency_code==2)
{
$amount_usd_exp=$amount35;
}
else
{

$amount_usd_exp=$amount35/$curr_rate;
}
//echo $amount_usd;
  
$gnd_amnt_exp=$gnd_amnt_exp+$amount_usd_exp;
  }
 
 $gnd_amnt_exp.' ';
  }
  
 $bal=$gnd_amnt-$gnd_amnt_exp;

if ($bal<1000)

{

//$sql2=@mysql_query("SELECT staff_contacts.office_email1 FROM staff_contacts,employees,user_group WHERE staff_contacts.emp_id=employees.emp_id AND users.user_group_id=user_group.user_group_id AND user_group_id='15'");
$sql2="SELECT staff_contacts.office_email1 FROM staff_contacts,employees,user_group,users WHERE 
staff_contacts.emp_id=employees.emp_id AND users.emp_id=employees.emp_id AND users.user_group_id=user_group.user_group_id 
AND user_group.user_group_id='15'";	 
$results2=mysql_query($sql2) or die ("Error : $sql2".mysql_error());

if (mysql_num_rows($results2)>0)
{
while($row2=mysql_fetch_array($results2))

{
?>
            <? 
//$employee=$row2['dName'];
//$supplier_phone=$row2['phone'];
echo $area = $row2['office_email1'].", ";
 // read the list of emails from the file.
	$email_list = $area;
	// count how many emails there are.
	$total_emails = count($email_list);
	
	// go through the list and trim off the newline character.
	for ($counter=0; $counter<$total_emails; $counter++) {
   $email_list[$counter] = trim($email_list[$counter]);
   }
 
	echo $total = $email_list;


$sql1=@mysql_query("SELECT * from email_config");
	 
while($row1=mysql_fetch_array($sql1))

{

?>
<? 
	
	$strhost=($row1['smtpHost']);
	$struser=($row1['smtpUser']);
	$strpass=($row1['smtpPass']);
	$strport=($row1['smtpPort']);
	$strsecurity=($row1['security']);
	$strfrom=($row1['mailfrom']);
	$strto=$total;
	//$strto=($row1['mailto']);
	
	 
	
 
 $from =$strfrom;
 $to =$strto;
 
 $subject = "Petty Cash Book Fund Exhausted";
 $body = "Hi Super Administrator,\n\n We are pleased to inform you that the petty cash book fund balance is USD $bal.\n\n Kindly login into the system for further details then replenish the account if possible.";

 $host = $strhost;
 $port = $strport;
 $username = $struser;
 $password = $strpass;
 
 $headers = array ('From' => $from,
   'To' => $to,
   'Subject' => $subject);
 $smtp = Mail::factory('smtp',
   array ('host' => $host,
     'port' => $port,
     'auth' => true,
     'username' => $username,
     'password' => $password));
 
 $mail = $smtp->send($to, $headers, $body);
 
 if (PEAR::isError($mail)) {
   //echo("<p>".$mail->getMessage() . "</p>");
   echo "not send";
  } else {
   echo("<p>Alert email has been send Successfully!!</p>");
  }


}



}

}
}

else
{

echo "Threshold never hit";


}

?>
</body>
</html>

