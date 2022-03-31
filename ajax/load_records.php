
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

$records = [];

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

$sql = "SELECT * FROM Sale_orders";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  $records = $result -> fetch_all(MYSQLI_ASSOC);
  // Free result set
  $result -> free_result();
} else {
  
}

echo json_encode($records);

$conn->close();
?>