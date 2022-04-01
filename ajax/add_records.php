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
// print_r($records);

$is_success = true;
for ($i=0; $i < $rec_len; $i++) { 
    $t_rec = json_decode(json_encode($records[$i]), true);
    $sql = "select LineId from sale_orders where LineId = " . $t_rec['LineId'];
    // echo $sql . '<br/>';

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $sql = "update Sale_orders set " . "Code='" . addslashes($t_rec['Code']). "', Customer='" . addslashes($t_rec['Customer']). "', Description='" . addslashes($t_rec['Description']). "', OrdQty='" . addslashes($t_rec['OrdQty']). "', Picker='" . addslashes($t_rec['Picker']). "', ProcessedDate='" . addslashes($t_rec['ProcessedDate']). "', Reference='" . addslashes($t_rec['Reference']). "', SO='" . addslashes($t_rec['SO']). "', Shipday='" . addslashes($t_rec['Shipday']). "', SortCodeDescription='" . addslashes($t_rec['SortCodeDescription']). "', createdby='" . addslashes($t_rec['createdby']). "', value='" . addslashes($t_rec['value']) . "' where LineId = " . $t_rec['LineId'];
    
        if ($conn->query($sql) === TRUE) {
        //   echo "New record created successfully";
        } else {
          $is_success = false;
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $sql = "INSERT INTO Sale_orders (Code, Customer, Description, LineId, OrdQty, Picker, ProcessedDate, Reference, SO, Shipday, SortCodeDescription, createdby, value) VALUES ('" . addslashes($t_rec['Code']) . "', '" . addslashes($t_rec['Customer']) . "', '" . addslashes($t_rec['Description']) . "', '" . addslashes($t_rec['LineId']) . "', '" . addslashes($t_rec['OrdQty']) . "', '" . addslashes($t_rec['Picker']) . "', '" . addslashes($t_rec['ProcessedDate']) . "', '" . addslashes($t_rec['Reference']) . "', '" . addslashes($t_rec['SO']) . "', '" . addslashes($t_rec['Shipday']) . "', '" . addslashes($t_rec['SortCodeDescription']) . "', '" . addslashes($t_rec['createdby']) . "', '" . addslashes($t_rec['value']) . "')";
    
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