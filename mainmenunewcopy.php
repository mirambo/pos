<?php $user_group_id; ?>
<link rel="stylesheet" type="text/css" href="pro_drop_1/pro_drop_1.css" />

<script src="pro_drop_1/stuHover.js" type="text/javascript"></script>





<ul id="nav">
<?php 
$sql="select modules.module_name,modules.link,modules.module_id from modules,user_group_module where modules.module_id=user_group_module.module_id and user_group_id='$user_group_id' order by modules.module_id asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error()); 

if (mysql_num_rows($results) > 0)
				{
							 
							  while ($rows=mysql_fetch_object($results))
							  { 
							  
							  ?>							  
							  <li class="top"><?php echo $link=$rows->link; echo $link_id=$rows->module_id;							  
							    echo '<ul class="sub">' ?>
							  <?php 
							 $sqlsub="select sub_module.sub_module_name,sub_module.sublink,sub_module.sub_module_id from modules,sub_module where sub_module.module_id=modules.module_id and sub_module.module_id='$link_id'";
							 $resultssub= mysql_query($sqlsub) or die ("Error $sqlsub.".mysql_error()); 
							 if (mysql_num_rows($resultssub) > 0) 
									{
									 while ($rowssub=mysql_fetch_object($resultssub))
									 {
									 echo $rowssub->sublink;
									 
									 }
									echo '</ul>';
									}
							 ?>
			
			<?php 
			}
			
			?>				  
							  
							  
							  
							</li>
							  
							  
	<?php }?>						  
							  
							  
							  
							 
							  
</ul>
<!--<li class="top_link"><a href="home.php?monitor=monitor" class="top_link">Logout</a></li>-->

<!--<a href="home.php?monitor=monitor" class="top_link"><span>Logout<span></a>-->
