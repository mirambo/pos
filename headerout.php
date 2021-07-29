
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<title>Brisk Diagnostics Limited - Inventory and Accounting System</title>
	
	<link rel="stylesheet" type="text/css" href="style.css" />
	
	<script type="text/javascript" src="js/jquery.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function(){
		   $("#zone-bar li em").click(function() {
		   		var hidden = $(this).parents("li").children("ul").is(":hidden");
		   		
				$("#zone-bar>ul>li>ul").hide()        
			   	$("#zone-bar>ul>li>a").removeClass();
			   		
			   	if (hidden) {
			   		$(this)
				   		.parents("li").children("ul").toggle()
				   		.parents("li").children("a").addClass("zoneCur");
				   	} 
			   });
		});
	</script>
	
</head>

<div id="top-bar">
			<img src="images/logoppp.png" class="floatleft" />
			<div id="right-side">
				<span>
				<!--<form id="main-search">
							<label for="search-field" id="search-field-label">Search</label>
							<input type="text" tabindex="1" maxlength="255" id="search-field"/>
							<input type="image" alt="Search" value="Search" src="images/search.png" id="search-button"/>  
				</form-->
			</div>
		</div>