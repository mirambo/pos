<form name="myform" method="POST" action="" onsubmit="return checkTheBox();">
<input type="checkbox" name="check[]" value="1" /> 1 &nbsp;&nbsp;
<input type="checkbox" name="check[]" value="2" /> 2 &nbsp;&nbsp;
<input type="checkbox" name="check[]" value="3" /> 3 &nbsp;&nbsp;
<input type="checkbox" name="check[]" value="4" /> 4 &nbsp;&nbsp;
<input type="checkbox" name="check[]" value="5" /> 5 &nbsp;&nbsp;
<input type="submit" value="Submit Form" />
</form>

<script type = "text/javascript">
function checkTheBox() {
var flag = 0;
for (var i = 0; i< 5; i++) {
if(document.myform["check[]"][i].checked){
flag ++;
}
}
if (flag != 1) {
alert ("You must check one and only one checkbox!");
return false;
}
return true;
}
</script>