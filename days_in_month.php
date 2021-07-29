<?php
$current_month_year

echo $current_month=date('m');
echo $current_year=date('Y');


echo cal_days_in_month(CAL_GREGORIAN, $current_month, $current_year);
?>