<script src="ht.js"></script>
<style>
  .result {
    background-color: green;
    color: #fff;
    padding: 20px;
  }
  .row {
    display: flex;
  }
</style>

<div class="row">
  <div class="col">
    <div style="width: 500px;" id="reader"></div>
  </div>
  <audio id="myAudio1">
    <source src="success.mp3" type="audio/ogg">
  </audio>
  <audio id="myAudio2">
    <source src="failes.mp3" type="audio/ogg">
  </audio>

  <script>
    var x = document.getElementById("myAudio1");
    var x2 = document.getElementById("myAudio2");      
    function showHint(str) {
      if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txtHint").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET", "gethint.php?q=" + str, true);
        xmlhttp.send();
      }
    }

    function playAudio() { 
      x.play(); 
    } 
  </script>

  <div class="col" style="padding: 30px;">
    <h4>SCAN RESULT</h4>
    <div>Student PRN</div>
    <form action="">
      <input type="text" name="start" class="input" id="result" onkeyup="showHint(this.value)" placeholder="result here" readonly="" />
    </form>
    <p>Status: <span id="txtHint"></span></p>
  </div>
</div>

<script type="text/javascript">
  function onScanSuccess(qrCodeMessage) {
    document.getElementById("result").value = qrCodeMessage;
    showHint(qrCodeMessage);
    playAudio();
  }






  function onScanError(errorMessage) {
    //handle scan error
  }

  var html5QrcodeScanner = new Html5QrcodeScanner("reader", { fps: 10, qrbox: 250 });
  html5QrcodeScanner.render(onScanSuccess, onScanError);
</script>

<?php include 'includes/footer.php'; ?>
</div><!--/.main-->

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/chart.min.js"></script>
<script src="js/chart-data.js"></script>
<script src="js/easypiechart.js"></script>
<script src="js/easypiechart-data.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/custom.js"></script>

<script>
  window.onload = function () {
    var chart1 = document.getElementById("line-chart").getContext("2d");
    window.myLine = new Chart(chart1).Line(lineChartData, {
      responsive: true,
      scaleLineColor: "rgba(0,0,0,.2)",
      scaleGridLineColor: "rgba(0,0,0,.05)",
      scaleFontColor: "#c5c7cc"
    });
  };
</script>

</body>
</html>

<?php  ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

  
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>VPS</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">








	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>

</body>
</html>
