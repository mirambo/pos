<script language="JavaScript" type="text/javascript"
    xml:space="preserve">//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("search");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
	

 frmvalidator.addValidation("customer_id","dontselect=0",">>Please select customer");
 frmvalidator.addValidation("date_from","req",">>Please enter quotation date");
  frmvalidator.addValidation("currency","dontselect=0",">>Please select currency");
 frmvalidator.addValidation("phone","req",">>Please enter parent/guardian phone number");
 frmvalidator.addValidation("gender","selone_radio",">>Please choose gender");
 frmvalidator.addValidation("parent_name","req",">>Please enter parent/guardian name");
 frmvalidator.addValidation("parent_relation","req",">>Please parent/guardian relation");
 frmvalidator.addValidation("estate","req",">>Please enter estate");

 /////////////////////frmvalidator.addValidation("gender","selone_radio",">>Please enter gender");
 frmvalidator.addValidation("school","req",">>Please enter school");
 frmvalidator.addValidation("parent_cat","dontselect=0",">>Please select conference");
 frmvalidator.addValidation("reg_status","dontselect=0",">>Please select registration status");
 frmvalidator.addValidation("sub_cat","dontselect=0",">>Please Select station");
 frmvalidator.addValidation("parent_cat2","dontselect=0",">>Please Select Access Status");
 frmvalidator.addValidation("role","dontselect=0",">>Please Select Access Status Role");
 frmvalidator.addValidation("sub_cat2","dontselect=0",">>Please Select region");
 frmvalidator.addValidation("sub_cat3","dontselect=0",">>Please Select district");
 frmvalidator.addValidation("sub_cat4","dontselect=0",">>Please Select Church/Club");
 frmvalidator.addValidation("pathfinder_class_id","dontselect=0",">>Please Select pathfinder class");
 frmvalidator.addValidation("image1","req",">>Please enter personal email address");
  

  
//]]></script>