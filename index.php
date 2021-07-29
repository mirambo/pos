 <?php include ('title.php'); ?>
 <?php include ('headerout_garage.php'); ?>

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===========================================================================-->
 
<body>


<div id="wrapper">


<div id="content">

<form name="loginForm" method="post" action="process.php">
						
						<table width="100%">
						<tr>
						  <td width="47%">&nbsp;</td>
						  <td width="16%">&nbsp;</td>
						  <td width="37%">&nbsp;</td>
						</tr>
						<tr>
						  <td colspan="3" align="center" height="15"><h4>Provide Your Credentials</h4></td>
						  </tr>
						<tr height="20">
						  <td>&nbsp;</td>
						  <td colspan="2"><?php 

if ($_GET['wrongpass']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:290px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Enter correct username and password !!</font></strong></p></div>';

if ($_GET['nousernameandpass']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:290px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Enter username and password !!</font></strong></p></div>';

if ($_GET['nousername']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:290px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Enter username!!</font></strong></p></div>';

if ($_GET['nopassword']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:290px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Enter password !!</font></strong></p></div>';



?></td>
						  </tr>
						<tr height="20">
						  <td>&nbsp;</td>
						  <td><strong><i>Username:</strong></i></td>
						<td><input type="text" size="25" name="username" placeholder="Enter username"value="<?php echo $getuser;?>"></td>
						</tr>
						
						<tr>
                          <td>&nbsp;</td>
						  <td><strong><i>Password:</strong></i></td>
						  <td><input type="password" size="25" name="password" placeholder="Enter Password"></td>
						  </tr>
						<tr height="20">
						  <td>&nbsp;</td>
						  <td>&nbsp;</td>
						  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" class="btn btn-info btn-sm" value="Login" font-size="5" >                             <input type="reset" name="submit" class="btn btn-warning btn-sm" value="Cancel"></td>
						  </tr>
						<tr>
						  <td>&nbsp;</td>
						  <td>&nbsp;</td>
						  <td>&nbsp;</td>
						  </tr>
						</table>
						
						
				  </form>

            
</div>

</div>

</div>



<!--<div id="footer">-->
			



	
</body>
</html>
