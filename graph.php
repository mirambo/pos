

<?php echo $achieved_perc;?>
                    <div class="gen-chart-render">


                        <div id="chartContainer">FusionCharts will load here!</div>

                        
                    </div>
                    <br/>
                    
                    <!--<input id="printButton" style="margin-left: 397px;" type="button" onclick="FusionCharts.printManager.managedPrint()" value="Please wait..." disabled="disabled"  />-->

                   
		<script type="text/javascript"><!--
							
							
							
							
                           
						    FusionCharts.setCurrentRenderer('javascript');
							
							var myChart = new FusionCharts( "FusionCharts/Charts/Bar3D.swf",
                            "myChartId", "100", "10", "1" );
                            
							myChart.setXMLData('<chart caption="Monthly sales" xAxisName="Category" yAxisName="Value 1" numberPrefix="$"><?php
							
?><set label="<?php $category=$rowscc->category; ?>" value="<?php echo $achieved_perc; ?>" /></chart>');	
		
                            myChart.render("chartContainer");
							
						   FusionCharts.printManager.enabled(true);
							

                            FusionCharts.addEventListener (
                            FusionChartsEvents.PrintReadyStateChange ,
                            function (identifier, parameter) {
                                if(parameter.ready) {
                                    alert("Chart is now ready for printing.");
                                    document.getElementById('printButton').disabled = false;
									//document.getElementById('printButton').value = "Print Now";
                                }
                            });
                            // -->
       </script>
       
	   <script type="text/javascript"><!--//
	   
	   
	   
			$(document).ready ( function() {
			   showConditionalMessage( "", isJSRenderer(myChart) );
			});	
		// -->
		</script>   
   