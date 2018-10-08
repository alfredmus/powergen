<?php 
include_once("dbconnection.php");

//Total records
$rfound = $conn->query("SELECT COUNT(id) AS rfound FROM datacatalog")->fetchAll(); 
foreach ($rfound as $rf) {
   $tfound = $rf['rfound'];
  }

//get data count per group of each type in the set
$data = $conn->query("SELECT type, COUNT(type) AS uniqtype FROM datacatalog GROUP BY `type` ORDER BY uniqtype")->fetchAll();     
        foreach ($data as $row) {

            $colname = $row["type"];
               if ($colname == "Geospatial;Time series") { 
                   $GeospatialTimeseries = $row['uniqtype'];
                }

              elseif ($colname == "Geospatial") { 
                   $Geospatial = $row['uniqtype'];
                }

              elseif ($colname == "Others") { 
                  $Others = $row['uniqtype'];
                }

              elseif ($colname == "Survey(Microdata)") { 
                   $SurveyMicrodata = $row['uniqtype'];
                }

              elseif ($colname == "Cross sectional;Time series") { 
                   $CrosssectionalTimeseries = $row['uniqtype'];
                }

              elseif ($colname == "Transactions") { 
                  $Transactions = $row['uniqtype'];
                }

              elseif ($colname == "Time series;Transactions") { 
                   $TimeseriesTransactions = $row['uniqtype'];
                }

              elseif ($colname == "Cross sectional") { 
                   $Crosssectional = $row['uniqtype'];
                }

              elseif ($colname == "Time series") { 
                  $Timeseries = $row['uniqtype'];
                }    
        }

 ?>
<style>
#chartdiv {
  width: 100%;
  height: 500px;
}
</style>

<script>
    var Ts =<?php echo $Timeseries;?>;
    var Cs =<?php echo $Crosssectional;?>;
    var TsT =<?php echo $TimeseriesTransactions;?>;
    var Tsn =<?php echo $Transactions;?>;
    var CsT =<?php echo $CrosssectionalTimeseries;?>;
    var Sm =<?php echo $SurveyMicrodata;?>;
    var Ot =<?php echo $Others;?>;
    var G =<?php echo $Geospatial;?>;
    var Gt =<?php echo $GeospatialTimeseries;?>;  
var chart = AmCharts.makeChart( "chartdiv", {
  "type": "pie",
  "theme": "light",
  "dataProvider": [ {
    "country": "Time series",
    "litres": Ts
  }, {
    "country": "Cross sectional",
    "litres": Cs
  }, {
    "country": "Time series Transactions",
    "litres": TsT
  }, {
    "country": "Transactions",
    "litres": Tsn
  }, {
    "country": "Cross sectional Time series",
    "litres": CsT
  }, {
    "country": "Survey Microdata",
    "litres": Sm
  }, {
    "country": "Others",
    "litres": Ot
  }, {
    "country": "Geospatial",
    "litres": G
  }, {
    "country": "Geospatial Time series",
    "litres": Gt
  } ],
  "valueField": "litres",
  "titleField": "country",
   "balloon":{
   "fixedPosition":true
  },
  "export": {
    "enabled": true
  }
} );
</script>

