<?php 
include ('includes/session.php');
include('Connections/fundmaster.php'); 
$user_group_id; ?>
<link rel="stylesheet" type="text/css" href="pro_drop_1/pro_drop_1.css" />

<script src="pro_drop_1/stuHover.js" type="text/javascript"></script>
<ul id="nav">
<?php 
$sqlmod="select modules.module_name,modules.link,modules.module_id from modules,user_group_module where modules.module_id=user_group_module.module_id and user_group_id='$user_group_id' order by modules.sort_order asc";
$resultsmod= mysql_query($sqlmod) or die ("Error $sqlmod.".mysql_error()); 

if (mysql_num_rows($resultsmod) > 0)
				{
							 
							  while ($rowsmod=mysql_fetch_object($resultsmod))
							  { 
							  
							  ?>							  
							  <li class="top"><?php echo $link=$rowsmod->link;  $link_id=$rowsmod->module_id;?>
							  <ul class="sub">
							  <?php 
							  

							 
							 $sqlsub="select sub_module.sub_module_name,sub_module.sublink,sub_module.sub_module_id from user_group,modules_submodules,sub_module,modules,user_group_submodule 
							 where modules_submodules.sub_module_id=sub_module.sub_module_id AND modules_submodules.module_id=modules.module_id and user_group_submodule.sub_module_id=sub_module.sub_module_id 
							 AND user_group_submodule.user_group_id=user_group.user_group_id AND modules_submodules.module_id='$link_id' and user_group_submodule.user_group_id='$user_group_id' order by sub_module.sort_order asc";
							 $resultssub= mysql_query($sqlsub) or die ("Error $sqlsub.".mysql_error()); 
							 
							 
							 
							 if (mysql_num_rows($resultssub) > 0) 
									{
									 while ($rowssub=mysql_fetch_object($resultssub))
									 {
									 echo $rowssub->sublink;
									 
									 }
									 
									 
									 }
									 else
									 {
									 
									 
									 }
							  
							  ?>

							  </ul>
							  
							  
							  </li>							  
							 
							  
			
			<?php 
			}
			
			?>				  
<?php }?>						  
							  						  
</ul>

