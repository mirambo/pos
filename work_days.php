<?php

error_reporting(E_ALL);

//Set defaults for form fields
$startStr = '2013-02-18 16:30:00';
$endStr = '2013-02-19 09:55:00';

if(isset($_POST['start']) && isset($_POST['end']))
{
    //Set vars to repopulate form fields
    $startStr = $_POST['start'];
    $endStr = $_POST['end'];

    $totalTime = workTime($_POST['start'], $_POST['end']);

    echo "Start: " . date('l, F j, Y H:i:s', strtotime($_POST['start'])) . "<br>\n";
    echo "End: " . date('l, F j, Y H:i:s', strtotime($_POST['end'])) . "<br>\n";
    $hours = floor($totalTime / 3600);
    $minutes = floor(($totalTime-($hours*3600)) / 60);
    echo "Total for real time: $hours:" . str_pad($minutes, 2, '0', STR_PAD_LEFT);
}

function workDays($startTS, $endTS, $holidays=array())
{
    $dayTS = strtotime('12:00:00', $startTS); //Set to noon to avoid daylight savings problems
    $endDateStr = date('Y-m-d', $endTS);

    $workDays = 1;
    while(date('Y-m-d', $dayTS) != $endDateStr)
    {
	    //If day not a weekend or holiday add 1
	    if(date('N', $dayTS)<6 && !in_array(date('Y-m-d', $dayTS), $holidays))
	    {
		    $workDays++;
	    }
	    $dayTS = strtotime('+1 day', $dayTS);
    }

    return $workDays;
}

function workTime($startStr, $endStr, $validStartFloat='9.0', $validEndFloat='17.0')
{
    $startTS = strtotime($startStr);
    $endTS   = strtotime($endStr);

    //Verify end time comes after start time
    if($startTS > $endTS) { return false; }
    //Verify start and end times are within valid work times
    $startFloat = floatval(date('G', $startTS) + (date('i', $startTS)/60));
    $endFloat = floatval(date('G', $endTS) + (date('i', $endTS) / 60));
    if($startFloat<$validStartFloat || $startFloat>$validEndFloat) { return false; }
    if($endFloat<$validStartFloat || $endFloat>$validEndFloat) { return false; }

    if(date('Y-m-d', $startTS) == date('Y-m-d', $endTS))
    {
	    //Start and end are on same day
	    $work_seconds = $endTS - $startTS;
    }
    else
    {
	    //Start and end are on different days
	    $endOfFirstDaySec = ($validEndFloat - $startFloat) * 3600;
	    $begOfLastDaySec = ($endFloat - $validStartFloat) * 3600;
	    $fullWorkDays = workDays($startTS, $endTS) - 2;
	    $fullWorkDaysSec = $fullWorkDays * ($validEndFloat-$validStartFloat) * 3600;
	    $work_seconds = $endOfFirstDaySec + $fullWorkDaysSec + $begOfLastDaySec;
    }

    return $work_seconds;
}

?>
<html>
<head>

</head>
<body>

<br><br>
<form action="" method="post">
Start: <input type="text" name="start" value="<?php echo $startStr; ?>"><br>
End: <input type="text" name="end" value="<?php echo $endStr; ?>"><br>
<button type="submit">Submit</button>
</form>
</body>

</html>