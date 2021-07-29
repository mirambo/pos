<!DOCTYPE html>
 <html>
 <head>
 <script src="jquery.min.js"></script>
 <script>
 $(document).ready(function(){
 var cnt = 2;
 $("#anc_add").click(function(){
 $('#tbl1 tr').last().after('<tr><td>Static Content ['+cnt+']</td><td><input type="text" name="txtbx'+cnt+'" value="'+cnt+'"></td></tr>');
 cnt++;
 });

$("#anc_rem").click(function(){
 $('#tbl1 tr:last-child').remove();
 });

});
 </script>
 </head>
 <body>

<a href="javascript:void(0);" id='anc_add'>Add Row</a>
 <a href="javascript:void(0);" id='anc_rem'>Remove Row</a>
 <table  id="tbl1" border="1">
 <tr><td>Static Content [1]</td><td><input type="text" name="txtbx1" value="1"></td></tr>

</table>

</body>
 </html>