<?php 
include_once("dbconnection.php");

//get data count per group of each type in the set
$data = $conn->query("SELECT name, popularity FROM `datacatalog` ORDER BY popularity DESC LIMIT 9")->fetchAll();     
        foreach ($data as $row) {

            $colname = $row["name"];
               if ($colname == "World Development Indicators") { 
                   $WorldDevelopmentIndicators = $row['popularity'];
                }

              elseif ($colname == "GDP ranking") { 
                   $GDPranking = $row['popularity'];
                }

              elseif ($colname == "Country Profiles") { 
                  $CountryProfiles = $row['popularity'];
                }

              elseif ($colname == "Education Statistics") { 
                   $EducationStatistics = $row['popularity'];
                }

              elseif ($colname == "Global Economic Monitor") { 
                   $GlobalEconomicMonitor = $row['popularity'];
                }

              elseif ($colname == "Africa Development Indicators") { 
                  $AfricaDevelopmentIndicators = $row['popularity'];
                }

              elseif ($colname == "Gender Statistics") { 
                   $GenderStatistics = $row['popularity'];
                }

              elseif ($colname == "International Debt Statistics") { 
                   $InternationalDebtStatistics = $row['popularity'];
                }

    elseif ($colname == "Research Datasets and Analytical Tools") { 
              $ResearchDatasets= $row['popularity'];
                }    
        }

 ?>
  <style>
    #chartdivP {
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
    var WDI =<?php echo $WorldDevelopmentIndicators;?>;
    var GDPranking =<?php echo $GDPranking;?>;
    var CountryProfiles =<?php echo $CountryProfiles;?>;
    var EducationStatistics =<?php echo $EducationStatistics;?>;
    var GlobalEconomicMonitor =<?php echo $GlobalEconomicMonitor;?>;
    var AfricaDevelopmentIndicators =<?php echo $AfricaDevelopmentIndicators;?>;
    var GenderStatistics =<?php echo $GenderStatistics;?>;
    var InternationalDebtStatistics =<?php echo $InternationalDebtStatistics;?>;
    var ResearchDatasets =<?php echo $ResearchDatasets;?>;
    var chart = AmCharts.makeChart("chartdivP", {
      "type": "serial",
      "theme": "light",
      "marginRight": 70,
      "dataProvider": [{
        "country": "World Development Indicators",
        "visits": WDI,
        "color": "#FF0F00"
      }, {
        "country": "GDP Ranking",
        "visits": GDPranking,
        "color": "#FF6600"
      }, {
        "country": "Country Profiles",
        "visits": CountryProfiles,
        "color": "#FF9E01"
      }, {
        "country": "Education Statistics",
        "visits": EducationStatistics,
        "color": "#FCD202"
      }, {
        "country": "Global Economic Monitor",
        "visits": GlobalEconomicMonitor,
        "color": "#F8FF01"
      }, {
        "country": "Africa Development Indicators",
        "visits": AfricaDevelopmentIndicators,
        "color": "#B0DE09"
      }, {
        "country": "Gender Statistics",
        "visits": GenderStatistics,
        "color": "#04D215"
      }, {
        "country": "International Debt Statistics",
        "visits": InternationalDebtStatistics,
        "color": "#0D8ECF"
      }, {
        "country": "Research Datasets and Analytical Tools",
        "visits": ResearchDatasets,
        "color": "#0D52D1"
      }],
      "valueAxes": [{
        "axisAlpha": 0,
        "position": "left",
        "title": "Popularity"
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
    