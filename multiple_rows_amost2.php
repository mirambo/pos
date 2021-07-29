<script>
function show_autocomplete(id){
id_obj = '#item_id_'+id;
name_obj = '#line_item_name_'+id;
desc_obj = '#line_desc_'+id;
uom_obj = '#line_uom_'+id;

$(name_obj).autocomplete({
//minLength: 2,
source: function (request, response) {
//txt = $("#"+id).val();
txt = $(name_obj).val();
$.ajax({
type: "GET",
url: "<?php echo base_url();?>receive/item_list/"+txt,
dataType: "json",
contentType: "application/json; charset=utf-8",
success: function (data) {
response($.map(data, function (item) {
return {
value: item.item_id,
id: item.id,
desc: item.shortitem_desc,
uom: item.uom,
}
}));
}
});
},
select: function (event, ui) {
$(id_obj).val(ui.item.id);
$(name_obj).val(ui.item.value);
$(desc_obj).html(ui.item.desc);
$(uom_obj).html(ui.item.uom);
return false;
},
});
}

x=0;
function add_row(mes){
if(mes==1){
var str = "<tr id='row_"+x+"' >"
+ "<td><input class='line-input-text autocomplete' onclick='show_autocomplete("+x+")' style='border-radius: 0px;' type='text' id='line_item_name_"+x+"' name='line_data["+x+"][item_name]' size='15' autocomplete='off' /></td>"
+"<td id='line_desc_"+x+"'></td>"
+"<td id='line_uom_"+x+"'></td>"
+"<td id='line_rate_"+x+"'><input type='text' name='line_data["+x+"][rate]' id='rate_"+x+"' size='5' class='input-style line-input-text count_class' required></td>"
+"<td align='center'><input type='text' name='line_data["+x+"][quantity]' id='quantity_"+x+"' size='5' onfocus='this.select();' class='input-style line-input-text count_class' required/></td>"
+"<td><input type='text' name='line_data["+x+"][remarks]' id='remarks_"+x+"' size='20' class='input-style line-input-text' /></td>"
+"<td><a href='javascript:void(0)' onclick='remove_line("+x+")'><i title='Remove' class='icon-remove'></i></a>"
+"<input type='hidden' name='line_data["+x+"][item_id]' id='item_id_"+x+"' />"
+"</td>"
+"</tr>";
$("#line_body").append(str);
$('#huom').after("<th><span style='color: red;'>*</span>Rate</th>");
x++;
}else{
var str = "<tr id='row_"+x+"' >"
+ "<td><input class='line-input-text autocomplete' onclick='show_autocomplete("+x+")' style='border-radius: 0px;' type='text' id='line_item_name_"+x+"' name='line_data["+x+"][item_name]' size='15' autocomplete='off' /></td>"
+"<td id='line_desc_"+x+"'></td>"
+"<td id='line_uom_"+x+"'></td>"
+"<td><input type='text' name='line_data["+x+"][quantity]' id='quantity_"+x+"' size='5' onfocus='this.select();' class='input-style line-input-text count_class' required/></td>"
+"<td><input type='text' name='line_data["+x+"][remarks]' id='remarks_"+x+"' size='20' class='input-style line-input-text' /></td>"
+"<td><a href='javascript:void(0)' onclick='remove_line("+x+")'><i title='Remove' class='icon-remove'></i></a>"
+"<input type='hidden' name='line_data["+x+"][item_id]' id='item_id_"+x+"' />"
+"<input type='hidden' name='line_data["+x+"][rate]' id='item_id_"+x+"' />"
+"</td>"
+"</tr>";
$("#line_body").append(str);
x++;
}
}

function remove_line(line_no){
row_count = $(".count_class").length;
if(row_count>1){
$("#row_"+line_no).remove();
}else{
alert('All line items can not be removed.');
}
}

//add_row(); // call it on page load for adding first row


</script>

<body onload="add_row();">
<table style="margin: 20px;" width="95%">
<thead>
<tr>
<th width="130">Item Name</th>
<th width="425">Description</th>
<th id="huom">Unit of Measure</th>
<th><span style="color: red;">*</span>Quantity</th>
<th>Remarks</th>
<th></th>
</tr>
</thead>
<tbody id="line_body"></tbody>
</table>

<a href="javascript:void(0);" style="margin-left:21px;" onclick="add_row()" id="add_row_btn" class="btn btn-success icon-plus-sign-alt">&nbsp;&nbsp;Add Row</a>