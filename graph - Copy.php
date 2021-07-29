<?php include ('Connections/fundmaster.php') ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <title>FusionCharts XT - Managed print for Mozilla-based browsers</title>
        
        <link href="FusionCharts/Code/assets/ui/css/style.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" language="Javascript" src="FusionCharts/Code/assets/ui/js/jquery.min.js"></script>
        <script type="text/javascript" src="FusionCharts/Charts/FusionCharts.js"></script>
		<script type="text/javascript" language="Javascript" src="FusionCharts/Code/assets/ui/js/lib.js"></script>
        <!--[if IE 6]>
        <script src="../../../assets/ui/js/DD_belatedPNG_0.0.8a-min.js"></script>
        <script>
          /* select the element name, css selector, background etc */
          DD_belatedPNG.fix('img');

          /* string argument can be any CSS selector */
        </script>
        <![endif]-->
        
        <style type="text/css">
            h2.headline {
                font: normal 110%/137.5% "Trebuchet MS", Arial, Helvetica, sans-serif;
                padding: 0;
                margin: 25px 0 25px 0;
                color: #7d7c8b;
                text-align: center;
            }
            p.small {
                font: normal 68.75%/150% Verdana, Geneva, sans-serif;
                color: #919191;
                padding: 0;
                margin: 0 auto;
                width: 664px;
                text-align: center;
            }
        </style>
        
    </head>
    <body>
        <!-- wrapper -->
        <div id="wrapper">
            <!-- header -->
            <div id="header"> 
                
				<h1 class="brand-name">Report</h1>
                
                
            </div>
            <!-- content area -->
            <div class="content-area">
                <div id="content-area-inner-main">
					<p>&nbsp;</p>
                    <div id="messageBox" style="margin-left:100px; margin-right:100px; display:none;"></div>
					<p>&nbsp;</p>

                    <div class="clear"></div>
                    <div class="gen-chart-render">


                        <div id="chartContainer">FusionCharts will load here!</div>

                        
                    </div>
                    <br/>
                    
                    <input id="printButton" style="margin-left: 397px;" type="button" onclick="FusionCharts.printManager.managedPrint()" value="Please wait..." disabled="disabled"  />

                    <div class="clear"></div>

                    <p>&nbsp;</p>
                    <p class="small">&nbsp;</p>
                    <p>&nbsp;</p>
                    <div class="underline-dull"></div>   <div>
					
               
            </div> </div>

                
            </div>

            <!-- footer -->
            <div id="footer">
                
            </div>
        </div>
		<script type="text/javascript"><!--
							
							
							FusionCharts.addEventListener("warning", function(e,a) { 
								if(a.id==="25081816") {
									if(FusionCharts.getCurrentRenderer ='javascript') {
										showMessage( "");	
									} else {
										 if(jQuery.browser.msie) {
											 showMessage( "<b>Note:</b> Internet Explorer does not require Print Manager. <br/><br/>");	
										 } else {
											 showMessage( "<b>Note:</b> <br/><br/>");	
										 }
									}
									 $("input#printButton").attr ( { "disabled": false, "value": "Print Now" } );
								}
							});
							
                           
						    FusionCharts.setCurrentRenderer('javascript');
							
							var myChart = new FusionCharts( "FusionCharts/Charts/Bar3D.swf",
                            "myChartId", "100%", "100%", "1" );
                            
							myChart.setXMLData('<chart caption="Monthly sales" xAxisName="Category" yAxisName="Value 1" numberPrefix="$"><?php
							
$sqlccn="SELECT * from my_chart_data"; $resultsccn=mysql_query($sqlccn) or die ("Error $sqlccn.".mysql_error()); if ($numrowscc=mysql_num_rows($resultsccn)>0){while ($rowscc=mysql_fetch_object($resultsccn)){?><set label="<?php echo $category=$rowscc->category; ?>" value="<?php echo $value1=$rowscc->value1; ?>" /><?php }} ?></chart>');	
		
                            myChart.render("chartContainer");
							
						   FusionCharts.printManager.enabled(true);
							

                            FusionCharts.addEventListener (
                            FusionChartsEvents.PrintReadyStateChange ,
                            function (identifier, parameter) {
                                if(parameter.ready) {
                                    alert("Chart is now ready for printing.");
                                    document.getElementById('printButton').disabled = false;
									document.getElementById('printButton').value = "Print Now";
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
    </body>
    
</html>
