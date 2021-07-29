 <style type="text/css">
.for-screen {display: block;}
.for-print {display: none;}

@media print {
    .for-screen {display: none;}
    .for-print {display: block;}
}

 </style>

<div class="for-screen">
    <input type="submit" value="Shown when not printing">
</div>
<div class="for-print">
    <p>Shown instead when printing</p>
</div>

<?php

function randomColor() {
    $possibilities = array(1, 2, 3, 4, 5, 6, 7, 8, 9, "A", "B", "C", "D", "E", "F" );
    shuffle($possibilities);
    $color = "#";
    for($i=1;$i<=6;$i++){
        $color .= $possibilities[rand(0,14)];
    }
    return $color;
}


$color = randomColor();
echo "<span style='color:".$color."'>Random color: ".$color."</span>";
?>


 <div style="background:<?php echo $colorzss;?>; width:200px; height:200px;">sasasasa</div>
 <script type="text/javascript" src="libraries/RGraph.common.core.js" ></script>
    <script type="text/javascript" src="libraries/RGraph.common.dynamic.js" ></script>
    <script type="text/javascript" src="libraries/RGraph.common.effects.js" ></script>
    <script type="text/javascript" src="libraries/RGraph.common.tooltips.js" ></script>
    <script type="text/javascript" src="libraries/RGraph.bar.js" ></script>
    <script type="text/javascript" src="libraries/RGraph.pie.js" ></script>


<table width="70%" align="center" class="table"> 
  <tr bgcolor="#FFFFCC" height="30"><td colspan="8" align="center"><strong><font color="#ff0000">Graphical Report (Pie-Chart) : Visited Against Unvisited Outlets </font></strong></td></tr>
  <tr bgcolor="#FFFFCC" height="30"><td width="30%">Total Outlets To Be visited Today</td><td width="10%" align="center"><?php 

 $numrowsvisited=40;
  
  
  
  

echo $numrowsvisit=98;

$unvisited=$numrowsvisit-$numrowsvisited;


$visited_perc= ($numrowsvisited/$numrowsvisit)*100;
$unvisited_perc=($unvisited/$numrowsvisit)*100;

  
  ?></td><td colspan="6" align="center" rowspan="3">
<canvas id="cvs" width="580" height="250" !style="border:1px solid #ccc">[No canvas support]</canvas>
  <script>
        window.onload = function ()
        {
            var data = [<?php echo number_format($unvisited_perc,2);?>,<?php echo number_format($visited_perc,2); ?>];

            var pie = new RGraph.Pie('cvs', data);
            pie.Set('chart.labels', ['Unvisited Outlets','Visited Outlets']);
            pie.Set('chart.tooltips', ['Unvisited Outlets','Visited Outlets']);
            pie.Set('chart.tooltips.event', 'onmousemove');
            pie.Set('chart.colors', ['#ED1C24','#6EB43F']);
            pie.Set('chart.strokestyle', 'white');
            pie.Set('chart.linewidth', 3);
            pie.Set('chart.shadow', true);
            pie.Set('chart.shadow.offsetx', 2);
            pie.Set('chart.shadow.offsety', 2);
            pie.Set('chart.shadow.blur', 3);
            pie.Set('chart.exploded', 7);
            
            for (var i=0; i<data.length; ++i) {
                pie.Get('chart.labels')[i] = pie.Get('chart.labels')[i] + ', ' + data[i] + '%';
            }
            
            pie.Draw();
        }
    </script></td></tr>

  
  <tr bgcolor="#FFFFCC" height="30"><td>Total Visited Outlets</td><td align="center"><?php 

echo $numrowsvisited;
  
  ?></td></tr>
  <tr bgcolor="#FFFFCC" height="30"><td>Total Unvisited Outlets</td>
  <td align="center"><?php echo $unvisited; ?></td>
 </tr>
  
  
  
</table>