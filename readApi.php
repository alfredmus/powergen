<?php
ini_set('max_execution_time', 300);
//call the database connection file 
include_once('dbconnection.php');

// allow special chars.
function specialCheck($string) {
   return preg_replace("/[^!<>()@&:;.,\/\sA-Za-z0-9_]/"," ", $string); 
}

//use while loop to read and store all the api pages data
$x =1;
while($x <= 25) {
$json_url = "http://api.worldbank.org/v2/datacatalog?format=json&page=".$x;
$json = file_get_contents($json_url);
        
          $data = json_decode($json, TRUE);                                        
          $array = $data['datacatalog'];
          // Traverse the Api
          if(!empty($array)){
              foreach ($array as $row){
               
                    $id=$row['id'];                  
                    $metatype = $row['metatype'];

  //Set all variables to "" before onStart of every While loop process
            $acronym = ""; $description = ""; $url = ""; $type = "";
            $languagesupported = ""; $periodicity = ""; $economycoverage = ""; 
            $granularity = "";$numberofeconomies = ""; $topics = ""; 
            $updatefrequency = ""; $updateschedule = "";$lastrevisiondate = ""; 
            $contactdetails = ""; $datanotes = "";$accessoption = ""; 
            $bulkdownload = "";$cite = ""; $detailpageurl = ""; 
            $popularity = ""; $coverage = "";$api = ""; $apiaccessurl = ""; 
            $apisourceid = "";
                  

                if(!empty($metatype)){
                  foreach ($metatype as $value) {
                      $colname = specialCheck($value["id"]); 

                     if ($colname == "name") {    
                          $name = specialCheck($value["value"]);
                      } 
                      elseif ($colname == "acronym") {
                        $acronym = specialCheck($value["value"]);
                      } 
                      elseif ($colname == "description") {
                        $description = specialCheck($value["value"]);
                      }
                      elseif ($colname == "url") {  
                        $url = specialCheck($value["value"]);
                      } 
                      elseif ($colname == "type") {    
                         $type = specialCheck($value["value"]);
                      }
                      elseif ($colname == "languagesupported") {
                        $languagesupported = specialCheck($value["value"]);
                      } 
                      elseif ($colname == "periodicity") {
                        $periodicity = specialCheck($value["value"]);
                      } 
                      elseif ($colname == "economycoverage") {
                        $economycoverage = specialCheck($value["value"]);
                      }
                      elseif ($colname == "granularity") {
                         $granularity = specialCheck($value["value"]);
                      }
                      elseif ($colname == "numberofeconomies") {
                        $numberofeconomies = specialCheck($value["value"]);
                      } 
                      elseif ($colname == "topics") { 
                        $topics = specialCheck($value["value"]);
                      }
                      elseif ($colname == "updatefrequency") {
                          $updatefrequency = specialCheck($value["value"]);
                      } 
                      elseif ($colname == "updateschedule") {
                        $updateschedule = specialCheck($value["value"]);
                      } 
                      elseif ($colname == "lastrevisiondate") {
                        $lastrevisiondate = specialCheck($value["value"]);
                      }
                      elseif ($colname == "datanotes") {
                        $datanotes = specialCheck($value["value"]);
                      } 
                      elseif ($colname == "contactdetails") {
                        $contactdetails = specialCheck($value["value"]);
                      }
                      elseif ($colname == "accessoption") {
                        $accessoption = specialCheck($value["value"]);
                      } 
                      elseif ($colname == "bulkdownload") {
                        $bulkdownload = specialCheck($value["value"]);
                      } 
                      elseif ($colname == "cite") {  
                        $cite = specialCheck($value["value"]);
                      } 
                      elseif ($colname == "detailpageurl") {
                        $detailpageurl = specialCheck($value["value"]);
                      }
                      elseif ($colname == "popularity") {
                        $popularity = specialCheck($value["value"]);
                      }  
                      elseif ($colname == "coverage") {
                        $coverage = specialCheck($value["value"]);
                      } 
                      elseif ($colname == "api") {  
                        $api = specialCheck($value["value"]);
                      } 
                      elseif ($colname == "apiaccessurl") {
                         $apiaccessurl = specialCheck($value["value"]);
                      }
                      elseif ($colname == "apisourceid") {
                         $apisourceid = specialCheck($value["value"]);
                      }                                     
                  }
                 } 

    //Use PDO to save Api data to database 
    try {
       $query ="INSERT INTO datacatalog (id,name,acronym,description,url,type,languagesupported,periodicity,economycoverage,granularity,numberofeconomies,topics,updatefrequency, updateschedule,lastrevisiondate,contactdetails,datanotes,accessoption,bulkdownload,cite,  detailpageurl,popularity,coverage,api,apiaccessurl,apisourceid) VALUES ('$id','$name','$acronym','$description','$url','$type','$languagesupported','$periodicity','$economycoverage','$granularity','$numberofeconomies','$topics','$updatefrequency','$updateschedule','$lastrevisiondate','$contactdetails',
       '$datanotes','$accessoption','$bulkdownload','$cite','$detailpageurl','$popularity','$coverage','$api','$apiaccessurl','$apisourceid')";
      $conn->exec($query);
      }
      catch(PDOException $e)
      {
       echo "Error: " . $e->getMessage();
      }
                                             
          }//end of outer foreach() loop
        } //end of outer if() loop

     $x++;     
    } //end of while loop
?>
