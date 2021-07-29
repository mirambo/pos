<?php

include('Connections/fundmaster.php');

$accounting_term=mysql_real_escape_string($_POST['accounting_term']);
$term_desc=mysql_real_escape_string($_POST['term_desc']);


$queryprof="select * from  expenses_categories where expense_category_name='$accounting_term' AND expense_category_desc='$term_desc'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  

$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{

header ("Location:add_expenses_cat.php? recordexist=1&terminology_name=$accounting_term&terminology_desc=$term_desc");

}

else 

{



$sql= "insert into expenses_categories values ('','$accounting_term','$term_desc')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());






//header ("Location:add_expenses_cat.php? addtermconfirm=1");
?>
<script type="text/javascript">
alert('Record Saved successfuly');
//window.location = "begin_order.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php

}




mysql_close($cnn);


?>


