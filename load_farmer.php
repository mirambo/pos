    <script>
$("#farmer_id12").change(function() {
    //$(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('load_lpos.php?farmer_id=' + $(this).val(), function(data) {
    $("#invoice_area").html(data);
    $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
	</script>
	<?php
     include('Connections/fundmaster.php');
     
$sub_cat12 = $_GET['farmer_id'];
  
  if ($sub_cat12!=39)
  {
	  
	  
  }
  else
  {
  
     ?>
Select Farmer : <select name="farmer_id" id="farmer_id12" required  style="width:250px;">
	
<option value="">Select..............................</option>
								  <?php
								  
								  $query1="select * from farmers order by  farmer_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->farmer_id; ?>"><?php echo $rows1->farmer_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>
								  
								  <?php 
								  
								  
  }		  
								  ?>
		<script>						  
								  $("#farmer_id12").select2( {
	placeholder: "Select Farmer",
	allowClear: true
	} );
	
	</script>