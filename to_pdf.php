<script>
function run() {
      var doc = new jsPDF();
      doc.setFontSize(40);
      doc.text(<?php include('sasa.php'); ?>);
      doc.save('Testy.pdf');
}

</script>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.60/jspdf.min.js"></script>

  <title>JS Bin</title>
</head>

<body>
  <a href="#" onclick="run();">Download</a>
</body>
</html>