<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no">
  <title>00A00</title>
  <style>
    button,
    input {
      font: inherit;
    }
    .pages {
      width: 6ch;
    }
  </style>
</head>

<body>
    <form method="post" action="http://httpbin.org/post" name="books">
      <button type="button" onClick="addRow()">Add Book</button>
      <table id='dataTable'>
        <tbody id='dataMain'>
          <tr id='original' class='row'>
            <td>
              <input class='book' placeholder='Enter Title'>
            </td>
            <td>
              <input type="number" class="form-control pages" name="pages" min='1' max='9999' value='1' oninput='totalPgs();'>
            </td>
          </tr>
        </tbody>
        <tbody>
          <tr id='dataTotal'>
            <td>
              <input type='submit'>
            </td>
            <td>
              <output id='total' class="form-control" name="total">rr</output>
            </td>
          </tr>
        </tbody>
      </table>
	  
	  
	  
	  
	  
	  <button type="button" onClick="addRow2()">Add Book2</button>
      <table id='dataTable2'>
        <tbody id='dataMain2'>
          <tr id='original2' class='row2'>
            <td>
              <input class='book2' placeholder='Enter Title'>
            </td>
            <td>
              <input type="number" class="form-control pages5" name="pages2" min='1' max='9999' value='1' oninput='totalPgs2();'>
            </td>
          </tr>
        </tbody>
        <tbody>
          <tr id='dataTotal2'>
            <td>
              <input type='submit'>
            </td>
            <td>
              <output id='total2' class="form-control" name="total2">55</output>
            </td>
          </tr>
        </tbody>
      </table>
	  
	  
	  
	  
	  
	  
    </form>
  <script>
    function addRow() {
      // Reference the first <tr> as row
      var row = document.getElementById('original');
      // Reference the first <tbody> as main
      var main = document.getElementById('dataMain');
      // Clone row
      var clone = row.cloneNode(true);
      // Remove clone's id
      clone.removeAttribute('id');
      // Clean clone of any data
      clone.querySelectorAll('input').forEach(function(inp) {
        inp.value = ''
      });
      // Append clone as the last child of main
      main.appendChild(clone);
    }
	
	
	function addRow2() {
      // Reference the first <tr> as row
      var row2 = document.getElementById('original2');
      // Reference the first <tbody> as main
      var main = document.getElementById('dataMain2');
      // Clone row
      var clone = row2.cloneNode(true);
      // Remove clone's id
      clone.removeAttribute('id');
      // Clean clone of any data
      clone.querySelectorAll('input').forEach(function(inp) {
        inp.value = ''
      });
      // Append clone as the last child of main
      main.appendChild(clone);
    }

    function totalPgs() {
      // Reference the <output> as out 
      var out = document.getElementById('total');
      // Collect all nodes with class .pages into a NodeList called pgs
      var pgs = document.querySelectorAll('.pages');

        /* Array called arr is made by...
	|| ...map.call pgs NodeList on each node called pg...
	|| ...convert each pg value to a true number...
	|| ...return all number values as an array called arr
	*/
      var arr = Array.prototype.map.call(pgs, function(pg) {
        var cnt = parseInt(pg.value, 10);
        return cnt;
      });
      // .apply the function sum() to array called arr
      var total = sum.apply(sum, arr);
      // The value of out is whatever total is
      out.value = total;
      // return the value of total
      return total;
    }
	
	
	
	function totalPgs2() {
      // Reference the <output> as out 
      var out = document.getElementById('total2');
      // Collect all nodes with class .pages into a NodeList called pgs
      var pgs = document.querySelectorAll('.pages2');

        /* Array called arr is made by...
	|| ...map.call pgs NodeList on each node called pg...
	|| ...convert each pg value to a true number...
	|| ...return all number values as an array called arr
	*/
      var arr = Array.prototype.map.call(pgs, function(pg) {
        var cnt = parseInt(pg.value, 10);
        return cnt;
      });
      // .apply the function sum() to array called arr
      var total = sum.apply(sum, arr);
      // The value of out is whatever total is
      out.value = total;
      // return the value of total
      return total;
    }

    /* sum() will take any amount of numbers and add...
    || ...them up. Works best with .apply() or .call()
    || Usage: 
    || var totalNumber = sum.apply(sum, array);
    || or
    || var totalNumber = sum.call(sum, object);
    */
    function sum() {
      var res = 0;
      var i = 0;
      var qty = arguments.length;
      while (i < qty) {
        res += arguments[i];
        i++;
      }
      return res;
    }
  </script>
</body>

</html>