<!DOCTYPE>
<html>
<head>
  <title>Powergen Test</title>
    <script src="amcharts/amcharts.js" type="text/javascript"></script>
    <script src="amcharts/serial.js" type="text/javascript"></script>
    <script src="amcharts/pie.js" type="text/javascript"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" type="text/css" media="all" />
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>

   <?php include_once("pertype.php");
   		 include_once("updatefrequency.php");
	     include_once("popularity.php");
	?>           
</head>
<body>
<div class="container">
	<div style="margin-top: 20px;"></div>
	<h3>Total Records Found:<?php echo $tfound; ?></h3>
  <div class="panel panel-success">
    <div class="panel-heading">Research Classification Type</div>
    <div class="panel-body">
    	<div id="chartdiv"></div>
    </div>
  </div>
  <div class="row">
  	<div class="col-md-6">
	  <div class="panel panel-success">
	    <div class="panel-heading">Data Update frequency</div>
	    <div class="panel-body">
	    	<div id="chartdivF"></div>
	    </div>
	  </div>
	</div>  

	<div class="col-md-6">
	  <div class="panel panel-success">
	    <div class="panel-heading">Top 9 Popular Fields</div>
	    <div class="panel-body">
	    	<div id="chartdivP"></div>
	    </div>
	  </div>
	</div>  
  </div>
</div>
</body>
</html>