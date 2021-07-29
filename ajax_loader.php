<script type="text/javascript" src="jquery.min.js"></script>
<script>
	function validate_form(){
		
				

			//We are going to submit the form, so lets show the overlay!
			document.getElementById("overlay").style.display="block";
			//Setting millisecond fo 10000 to simulate a file upload...
			setTimeout(function(){
				document.getElementById("emp").submit();
			}, 10000);
		
	}
</script>
<style>
	#overlay {
		position:absolute;
		top:0px;
		left:0px;
		width:100%;
		height:100%;
		padding-top:18%;
		text-align:center;
		background:#ccc;
		color:white;
		opacity:0.9;
		display:none;
		z-index:600;
	}
</style>
<div id="overlay"><img src="images/loading.gif" width="150" height="150" alt="" /></div>	


