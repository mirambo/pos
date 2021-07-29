<html><head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script type="text/javascript">

$(function(){
	function tally (selector) {
		$(selector).each(function () {
			var total = 0,
				column = $(this).siblings(selector).andSelf().index(this);
			$(this).parents().prevUntil(':has(' + selector + ')').each(function () {
				total+= parseFloat($('td.sum:eq(' + column + ')', this).html()) || 0;
			})
			$(this).html(total);
		});
	}
	tally('td.subtotal');
	tally('td.total');
});
 
</script>
</head>
<body>
<table id="data">
<tr><th>Name</th><th>Age</th><th>Weight</th></tr>
<tr><td>Joe</td><td>30</td><td class="sum">175</td><td class="sum">1</td></tr>
<tr><td>Jack</td><td>29</td><td class="sum">165</td><td class="sum">1</td></tr>

<tr><th colspan="2" align="right">Sum</th><td class="subtotal"></td><td class="subtotal"></td></tr>

</table>
</body>
</html>