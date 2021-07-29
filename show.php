<html>
   <head>
   <script>
        function toggle(thisname) {

           tr=document.getElementsByTagName('tr')

           for (i=0;i<tr.length;i++){
              if (tr[i].getAttribute(thisname)){
                 if ( tr[i].style.display=='none' ){
                    tr[i].style.display = '';
                 }
              else {
                 tr[i].style.display = 'none';
                 }
              }
           }
        }
   </script>
   </head>

<body>

<span onClick="toggle('hide');">TOGGLE</span><br /><br />

<table>
   <tr ><td >display this row 1</td></tr>
   <tr hide=yes ><td>hide this row 1</td></tr>
   <tr><td>display this row 2</td></tr>
   <tr hide=yes ><td>hide this row 2</td></tr>
   <tr hide=yes ><td>hide this row 3</td></tr>
   <tr><td>display this row 3</td></tr>
   <tr><td>display this row 4</td></tr>
   <tr><td>display this row 5</td></tr>
   <tr><td>display this row 6</td></tr>
   <tr hide=yes ><td>hide this row 4</td></tr>
   <tr hide=yes ><td>hide this row 5</td></tr>
   <tr><td>display this row 7</td></tr>
   <tr hide=yes ><td>hide this row 6</td></tr>
   <tr hide=yes ><td>hide this row 7</td></tr>
</table>


</body>
</html>
