<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<SCRIPT LANGUAGE="JavaScript">

//Progress Bar script- by Todd King (tking@igpp.ucla.edu)
//Modified by JavaScript Kit for NS6, ability to specify duration
//Visit JavaScript Kit (http://javascriptkit.com) for script

var duration=3 // Specify duration of progress bar in seconds
var _progressWidth = 50;    // Display width of progress bar.

var _progressBar = "|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||"
var _progressEnd = 5;
var _progressAt = 0;


// Create and display the progress dialog.
// end: The number of steps to completion
function ProgressCreate(end) {
    // Initialize state variables
    _progressEnd = end;
    _progressAt = 0;

    // Move layer to center of window to show
    if (document.all) { // Internet Explorer
        progress.className = 'show';
        progress.style.left = (document.body.clientWidth/2) - (progress.offsetWidth/2);
        progress.style.top = document.body.scrollTop+(document.body.clientHeight/2) - (progress.offsetHeight/2);
    } else if (document.layers) {   // Netscape
        document.progress.visibility = true;
        document.progress.left = (window.innerWidth/2) - 100+"px";
        document.progress.top = pageYOffset+(window.innerHeight/2) - 40+"px";
    } else if (document.getElementById) {   // Netscape 6+
        document.getElementById("progress").className = 'show';
        document.getElementById("progress").style.left = (window.innerWidth/2)- 100+"px";
        document.getElementById("progress").style.top = pageYOffset+(window.innerHeight/2) - 40+"px";
    }

    ProgressUpdate();   // Initialize bar
}

// Hide the progress layer
function ProgressDestroy() {
    // Move off screen to hide
    if (document.all) { // Internet Explorer
        progress.className = 'hide';
    } else if (document.layers) {   // Netscape
        document.progress.visibility = false;
    } else if (document.getElementById) {   // Netscape 6+
        document.getElementById("progress").className = 'hide';
    }
}

// Increment the progress dialog one step
function ProgressStepIt() {
    _progressAt++;
    if(_progressAt > _progressEnd) _progressAt = _progressAt % _progressEnd;
    ProgressUpdate();
}

// Update the progress dialog with the current state
function ProgressUpdate() {
    var n = (_progressWidth / _progressEnd) * _progressAt;
    if (document.all) { // Internet Explorer
        var bar = dialog.bar;
    } else if (document.layers) {   // Netscape
        var bar = document.layers["progress"].document.forms["dialog"].bar;
        n = n * 0.55;   // characters are larger
    } else if (document.getElementById){
                var bar=document.getElementById("bar")
        }
    var temp = _progressBar.substring(0, n);
    bar.value = temp;
}

// Demonstrate a use of the progress dialog.
function Demo() {
    ProgressCreate(10);
    window.setTimeout("Click()", 100);
}

function Click() {
    if(_progressAt >= _progressEnd) {
        ProgressDestroy();
        return;
    }
    ProgressStepIt();
    window.setTimeout("Click()", (duration-1)*1000/10);
}

function CallJS(jsStr) { //v2.0
  return eval(jsStr)
}

</script>

<SCRIPT LANGUAGE="JavaScript">

// Create layer for progress dialog
document.write("<span id=\"progress\" class=\"hide\">");
    document.write("<FORM name=dialog id=dialog>");
    document.write("<TABLE border=2  bgcolor=\"#FFFFCC\">");
    document.write("<TR><TD ALIGN=\"center\">");
    document.write("Progress<BR>");
    document.write("<input type=text name=\"bar\" id=\"bar\" size=\"" + _progressWidth/2 + "\"");
    if(document.all||document.getElementById)   // Microsoft, NS6
        document.write(" bar.style=\"color:navy;\">");
    else    // Netscape
        document.write(">");
    document.write("</TD></TR>");
    document.write("</TABLE>");
    document.write("</FORM>");
document.write("</span>");
ProgressDestroy();  // Hides

</script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>
<link href="css/superTables.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />

<form name="new_supplier" action="processaddsponsor.php" method="post">			
			<table width="100%" border="0" class=demoTable id=demoTable>
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['addsponsorconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Area Added Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the user is existing</font></strong></p></div>';
?></td>
    </tr>
<tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Select County<font color="#FF0000">*</font></td>
    <td width="23%"><select name="country"><option>Select..........................................................</option>
								  <?php
								  
								  $query1="select * from nrc_country order by country_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->country_id;?>"><?php echo $rows1->country_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
									  
									  
								  
								  
								  
								  
								  
								  ?></select></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Area Name<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="curr_name"></td>
    <td width="40%"  valign="top"></td>
  </tr>
   <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Area Code<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="curr_initials"></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
  
  <tr height="20">
    <td>&nbsp;</td>
    <td>Description</td>
    <td><textarea name="prod_desc" cols="30" rows="5"></textarea></td>
    </tr>
  
  <!--<tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%" valign="top">Exchange Rate<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="curr_rate"</td>
    <td width="40%" valign="top"></td>
  </tr>-->
  
	
	
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Save" onClick="CallJS('submit()')">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</form>

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("new_supplier");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("curr_name","req",">>Please enter currency name");
 frmvalidator.addValidation("curr_initials","req",">>Please enter currency initials");
 frmvalidator.addValidation("curr_rate","req",">>Please enter currency rate");
 
 
 
  </SCRIPT>