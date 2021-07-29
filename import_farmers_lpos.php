<?php include('Connections/fundmaster.php'); 
$order_code=$_GET['order_code'];
?>
<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javaScript" src="gen_validatorv4.js"  type="text/javascript" xml:space="preserve"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>


<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>
<style type="text/css">
.table
{
border-collapse:collapse;
}
.table td, tr
{
border:1px solid black;
padding:3px;
}
</style>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure want to delete this item from the lpo?");
}

function confirmSend()
{
    return confirm("Are you sure want to send this LPO via email?");
}

function confirmDeleteItem()
{
    return confirm("Are you sure want to delete a part from the job card?");
}

function confirmDeleteBelong()
{
    return confirm("Are you sure want to delete a customer belonging from this job card?");
}

</script>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
     
    $("#parent_cat12").change(function() {
    //$(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('load_curr.php?parent_cat12=' + $(this).val(), function(data) {
    $("#sub_cat12").html(data);
       $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
	
    
    });
	
    </script>
<script type="text/javascript" src="jquery-2.1.1.min.js"></script>
<?php 
include('select_search.php');
?>


    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css" />    

	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
 



<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<script type="text/javascript">
    $(document).ready(function() {
     
    $("#account_from").change(function() {
    //$(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('load_farmer.php?farmer_id=' + $(this).val(), function(data) {
    $("#sub_cat").html(data);
    $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    }); 
    });
		
	////////////////////////////////// To select access status roles
	
	
	
	
	
//////calendar-en

 

    </script>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>

		<?php require_once('includes/lposubmenu.php');  ?>
		
		<h3>:: Start Importation</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">			
	
<form action="process_import_farmers_lpos.php?sub_module_id=<?php echo $sub_module_id; ?>" method="post"   name="frmExcelImport" id="emp2" enctype="multipart/form-data">


<h3 align="center">Import The Farmers GRNs

<!--<span style="color:#ff0000; float:right; margin-left:-340px; margin-right:340px;">Normal LPO
<input type="radio" checked name="lpo_type" value="lpo">&nbsp; &nbsp; Supplier Invoice<input type="radio" name="lpo_type" value="inv"></span>
-->


</h3>
	
	
	
<div style="width:99%; min-height:70px; margin:auto;background:#FFFFCC;">
<table width="60%" border="0" align="center">
        
<tr><td colspan="2" align="center"><!--Download <a href="images/employee_import_template.xls">Template From Here</a>--></td></tr>
<tr height="100"><td align="right"><strong>
               Choose Excel
                    File : (xls,xlsx) </strong></td><td><input type="file" required name="file" id="file" accept=".xls,.xlsx">
					
				</td>	
	</tr>				
					
	<tr height="50">				
		<td></td>			
					<td>
					
                <!--<button type="submit" id="submit" name="import" class="btn-submit">Import</button>-->
				
				<input type="submit" onClick="validate_form()" name="submit" style="width:30%; color:#ffffff; height:40px; background:#019934; border-radius:5px; font-size:20px;" value="Import">
				</td>
        
</tr>
        
        </form>
        </table>	
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		
			
			
			
					
			  </div>
				
				<!--<div id="cont-right" class="br-5">
					
				</div>-->
			
			
			</div>
			
			
				
				
				
				
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div id="footer">
			<?php include ('footer.php'); ?>
		</div>
		</div>
		
		
		
	</div>
	
</body>

</html>