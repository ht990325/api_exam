<?php

//          $records format
//         { "data": "Code" },
//         { "data": "Customer" },
//         { "data": "Description" },
//         { "data": "LineId" },
//         { "data": "OrdQty" },
//         { "data": "Picker" },
//         { "data": "ProcessedDate" },
//         { "data": "Reference" },
//         { "data": "SO" },
//         { "data": "Shipday" },
//         { "data": "SortCodeDescription" },
//         { "data": "createdby" },
//         { "data": "value" },

if(!isset($records))
  $records = [];
$rec_len = count($records);
// echo $rec_len . "\n";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "api_exam";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$is_success = true;
for ($i=0; $i < $rec_len; $i++) { 
    $sql = "select LineId from sale_orders where LineId = " . $records[$i]['LineId'];

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $sql = "update Sale_orders set " . "Code=" . addslashes($records[$i]['Code']). ", Customer=" . addslashes($records[$i]['Customer']). ", Description=" . addslashes($records[$i]['Description']). ", OrdQty=" . addslashes($records[$i]['OrdQty']). ", Picker=" . addslashes($records[$i]['Picker']). ", ProcessedDate=" . addslashes($records[$i]['ProcessedDate']). ", Reference=" . addslashes($records[$i]['Reference']). ", SO=" . addslashes($records[$i]['SO']). ", Shipday=" . addslashes($records[$i]['Shipday']). ", SortCodeDescription=" . addslashes($records[$i]['SortCodeDescription']). ", createdby=" . addslashes($records[$i]['createdby']). ", value=" . addslashes($records[$i]['value']) . " where LineId = " . $records[$i]['LineId'];
    
        if ($conn->query($sql) === TRUE) {
        //   echo "New record created successfully";
        } else {
          $is_success = false;
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $sql = "INSERT INTO Sale_orders (Code, Customer, Description, LineId, OrdQty, Picker, ProcessedDate, Reference, SO, Shipday, SortCodeDescription, createdby, value) VALUES ('" . addslashes($records[$i]['Code']) . "', '" . addslashes($records[$i]['Customer']) . "', '" . addslashes($records[$i]['Description']) . "', '" . addslashes($records[$i]['LineId']) . "', '" . addslashes($records[$i]['OrdQty']) . "', '" . addslashes($records[$i]['Picker']) . "', '" . addslashes($records[$i]['ProcessedDate']) . "', '" . addslashes($records[$i]['Reference']) . "', '" . addslashes($records[$i]['SO']) . "', '" . addslashes($records[$i]['Shipday']) . "', '" . addslashes($records[$i]['SortCodeDescription']) . "', '" . addslashes($records[$i]['createdby']) . "', '" . addslashes($records[$i]['value']) . "')";
    
        if ($conn->query($sql) === TRUE) {
        //   echo "New record created successfully";
        } else {
          $is_success = false;
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

}
if($is_success) {
  echo "success";
}

$conn->close();
?>