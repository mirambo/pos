<?php 
session_start();
$net_pl=$_SESSION['net_profit'];
$net_loss=$_SESSION['net_loss'];

if ($net_pl>0)
{
 number_format($net_pl,2);

}
else
{
 number_format($net_loss,2);
}

//echo number_format($net_pl=$prof_inc-$grnd_expense,2);

//echo number_format($net_loss=$grnd_expense-$prof_inc,2);

?>