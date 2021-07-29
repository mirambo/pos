
    <?php
     include('Connections/fundmaster.php');
     
    $sub_catt = $_GET['bank_name'];
     
    $query = mysql_query("SELECT * FROM bank_branches2 WHERE Bank_ID = {$sub_catt}");
	echo "<option value=''>Select Branch</option>";
    while($row = mysql_fetch_array($query)) 
	{
	
    echo "<option value='$row[Branch_ID]'>$row[Branch_Name]</option>";
    }
     
    ?>