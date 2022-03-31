<?php
if(!isset($_POST['token_info'])){
    alert("Request forbidden");
    header('./');
}
$token_info = $_POST['token_info'];
echo $token_info['access_token'];
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://remote.grwills.com.au/WebAPI/API/DB/CustomQuery?key=IWS_SalesOrders',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $token_info['access_token']
  ),
));

$response = curl_exec($curl);

curl_close($curl);

$records = json_decode($response);
if (isset($records['type'])) {
    alert("error caused!");
    // header("../");
} else {
    include "./ajax/add_records.php";
}
