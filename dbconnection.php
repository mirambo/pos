<?php 
   //include("include/functions.php");
   //include("include/pharmacyfunctions.php");

//function openConnection()
//{
    $dbcnx=@mysql_connect('localhost','admin','admin');
   if (!$dbcnx) 
      {
         echo ('<p>Unable to connect to the database server at this time.</p>' );
         exit();
      }
	  
	if (!@mysql_select_db('nrc'))
	 {
        exit('<p>Unable to locate the card system Services database at this time.</p>');
     }
//}
?>

<? 
function closeConnection()
{
  mysql_close($dbcnx); 
}
?>