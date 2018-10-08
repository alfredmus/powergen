<?php 
include_once("dbconnection.php");

//get data count per group of each type in the set
$data = $conn->query("SELECT updatefrequency, COUNT(updatefrequency) AS freq FROM datacatalog GROUP BY `updatefrequency` ORDER BY freq")->fetchAll();     
        foreach ($data as $row) {

            $colname = $row["updatefrequency"];
               if ($colname == "Weekly") { 
                   $Weekly = $row['freq'];
                }

              elseif ($colname == "Others") { 
                  $Others = $row['freq'];
                }

              elseif ($colname == "Monthly") { 
                   $Monthly = $row['freq'];
                }

              elseif ($colname == "Daily") { 
                   $Daily = $row['freq'];
                }

              elseif ($colname == "Biannually") { 
                  $Biannually = $row['freq'];
                }

              elseif ($colname == "Quarterly") { 
                   $Quarterly = $row['freq'];
                }

              elseif ($colname == "No fixed schedule") { 
                   $Nofixedschedule = $row['freq'];
                }

              elseif ($colname == "Annually") { 
                  $Annually = $row['freq'];
                }

             elseif ($colname == "No further updates planned") { 
                  $Nofurtherupdatesplanned = $row['freq'];
                }       
        }

 ?>
  <style>
    #chartdivF {
      width: 100%;
      height: 500px;
    }

    .amcharts-export-menu-top-right {
      top: 10px;
      right: 0;
    }
    </style>
    <!-- Chart code -->
    <script>
    var Weekly =<?php echo $Weekly;?>;
    var Others =<?php echo $Others;?>;
    var Monthly =<?php echo $Monthly;?>;
    var Daily =<?php echo $Daily;?>;
    var Biannually =<?php echo $Biannually;?>;
    var Quarterly =<?php echo $Quarterly;?>;
    var Nofixedschedule =<?php echo $Nofixedschedule;?>;
    var Annually =<?php echo $Annually;?>;
    var Nofurtherupdatesplanned =<?php echo $Nofurtherupdatesplanned;?>;
    var chart = AmCharts.makeChart("chartdivF", {
      "type": "serial",
      "theme": "light",
      "marginRight": 70,
      "dataProvider": [{
        "country": "Nofurtherupdatesplanned",
        "visits": Nofurtherupdatesplanned,
        "color": "#FF0F00"
      }, {
        "country": "Annually",
        "visits": Annually,
        "color": "#FF6600"
      }, {
        "country": "Nofixedschedule",
        "visits": Nofixedschedule,
        "color": "#FF9E01"
      }, {
        "country": "Quarterly",
        "visits": Quarterly,
        "color": "#FCD202"
      }, {
        "country": "Biannually",
        "visits": Biannually,
        "color": "#F8FF01"
      }, {
        "country": "Daily",
        "visits": Daily,
        "color": "#B0DE09"
      }, {
        "country": "Monthly",
        "visits": Monthly,
        "color": "#04D215"
      }, {
        "country": "Others",
        "visits": Others,
        "color": "#0D8ECF"
      }, {
        "country": "Weekly",
        "visits": Weekly,
        "color": "#0D52D1"
      }],
      "valueAxes": [{
        "axisAlpha": 0,
        "position": "left",
        "title": "Update Frequency"
      }],
      "startDuration": 1,
      "graphs": [{
        "balloonText": "<b>[[category]]: [[value]]</b>",
        "fillColorsField": "color",
        "fillAlphas": 0.9,
        "lineAlpha": 0.2,
        "type": "column",
        "valueField": "visits"
      }],
      "chartCursor": {
        "categoryBalloonEnabled": false,
        "cursorAlpha": 0,
        "zoomable": false
      },
      "categoryField": "country",
      "categoryAxis": {
        "gridPosition": "start",
        "labelRotation": 45
      },
      "export": {
        "enabled": true
      }

    });
    </script>
    