<?php 
include ('includes/session.php'); 
include ('Connections/fundmaster.php'); 
$form_title=$_POST['form_title'];
$fileName = $_FILES['userfile']['name'];
$tmpName  = $_FILES['userfile']['tmp_name'];
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];
$fileType=(get_magic_quotes_gpc()==0 ? mysql_real_escape_string(
$_FILES['userfile']['type']) : mysql_real_escape_string(
stripslashes ($_FILES['userfile'])));
$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);
if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
}

$query = "INSERT INTO upload (form_title,name, size, type, content ) ".
"VALUES ('$form_title','$fileName', '$fileSize', '$fileType', '$content')";
mysql_query($query) or die('Error, query failed'); 

header ("Location:home.php?viewhrforms=viewhrforms&delconfirm=1");

/*echo "<br>File $fileName uploaded<br>";
}else { echo "file upload failed"; }*/

?>

