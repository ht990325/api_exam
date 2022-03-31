<?php
/*
//Refresh the token
$client_id = 'ext_api';
$client_secret = 'G&RWills2022';
$access_token = "Bz4U58ABrSHPhv83GhjvT2o9kK1YgDctKxUNZUBrCKdbLvEAywmZGXKMZ5kU4beZFk2dRtKk2pR5JJf30jqSlzvaf2evkr92czazjIt39UITL21nRKWTE0XD1zxEtWfkGHwVb_jxp0KqT0v3QSfkiqI5obfRqn58DS7-Q8V6nT3nM0LW6gJKPNP4BVKM-thRqAfY_7Bvpiftponwr7yJxApvkC_iYpX3loW4YjLXsw240TqCCgLN8_M3e5wIMOTlQiT21UrjjUqDqgkY5j6LVJdUYfMKP5v4eR25WiyXG8lhpPNxxd_qfPQ8iP1W6EX3RqwIoXklsKeN89Xt4_ZvwOxY0X2nTn0UWlMQTWssox_rsRFJLTXS11VkhZSG6XHpK37AKfuyO1C-U7LrLyKBolSIEoV18himaYiKcYX_Jw6ZrEYuyZrugC7RwhY2xLFpFdJOSVvNjkgeLLWu3dLnKJTKfbSe3x4pevXQIDubruQw37wlwLSOOl_0Z9vatahB0vGL_OH6UeV91y7dShjz5T0NgWKX2j8u1uMaXanbyGpL-0ptxPwOeCeDAA36q4CNzygj_EJ0qd2IVDYFI-Yraowd4py2kJHIViOPgxVMHkGAEDwT3KMxzIRz9U-26VEa4nAIaO3i5M8VI6-Hb6C_yTHOY3IBaZe5oPWcR8pQkgwMIudKueW_6EgexBNRVtBU1ZtbQ_kZnldg7gcUrHy8G95GQKt15Y9E5Wo8WBHz3x8Xl25mPsnATxrt7Cm_S-2xdFc90UFh1tXPRk1mFOTuNwpK3XLGpjKL4ZWfCSuvzWtUESaZTlbfYM5um1kZRS9C_vGNxA3dlhxYddnIFjO60vsv4JpM-MCiEb2OXWGB_J8XOqnrm6Q5njHt2_hWr817Up7KBnGS0KimMx4_mwxCUE0ECAMGkPpgpuOXZ8SEaAT-5PLv7bS-hmav6VLldsZhueK7Fq2NjOvD7vgc3rdfH-w1GG75jDM64rhPomL_eNLAHRn57cgcf6VIACkXD5SPofcSJ_r5PrR7vDbkJUm2bumfsDpA5zGf0cb_1LaxwkY";
// $url = "[https://connect.squareup.com/oauth2/clients/$client_id/access-token/renew](https://connect.squareup.com/oauth2/clients/$client_id/access-token/renew)";
$url = "https://connect.squareup.com/oauth2/clients/$client_id/access-token/renew";
// $url = "https://connect.squareup.com/oauth2/clients/$client_id/access-token/renew";
$data = array(
    'access_token' => $access_token
 );

$options = array(
    'http' => array(
        'header'  => "Content-type: application/json\r\n".  
        "Authorization: Client $client_secret\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
        'timeout' => 30,
    )
);
echo json_encode($data);
// var_dump($options);
// $context  = stream_context_create($options);
// $url = urlencode($url);
// $result = file_get_contents($url, false, $context);

$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $endpoint);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_VERBOSE, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");

$curl_handle=curl_init();
curl_setopt($curl_handle, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Bearer ' . $accessToken));
curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
curl_setopt($curl_handle, CURLOPT_HEADER, );
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
$query = curl_exec($curl_handle);
curl_close($curl_handle);
var_dump($query);

// echo "Result from /oauth2/clients/$client_id/access-token/renew:";
// var_dump($result);
*/

header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

include 'dbconnect.php';

    $str_data = file_get_contents('php://input');
    $data = json_decode($str_data,true);


    $echo = $data->echo;

    if (strcmp($echo, "") != 0) {
      $requestType = "POST";
      $format = "application - json";
    }


    $cur_date       = date('Y-m-d');
    $title       = $data["note"]["title"];
    $description = $data["note"]["description"];
    $deviceId    = $data["note"]["deviceid"];
    $companyId   = $data["note"]["companyId"];

$token_url = "https://remote.grwills.com.au:443/WebAPI/API/Bearer";
$curl = curl_init($token_url);
curl_setopt($curl, CURLOPT_HEADER, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
$json_response = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
if ( $status != 200 ) {
    echo 'token_url = ' . $token_url . "\n";
    echo 'params = ' . $params . "\n";
    echo 'response = ' . $json_response . "\n";
    die("Error: call to URL $token_url failed with status $status\n");
}
curl_close($curl);

define("CLIENT_ID", "ext_api");
define("CLIENT_SECRET", "G&RWills2022");
define("LOGIN_URI", "https://remote.grwills.com.au:443/");

// ...

function salesforce_refresh($refresh_token) {
    $params = 'grant_type=refresh_token' .
        '&client_id=' . CLIENT_ID .
        '&client_secret=' . CLIENT_SECRET .
        '&refresh_token=' . urlencode($refresh_token);
    
    $token_url = LOGIN_URI . "/WebAPI/API/Bearer";
    
    $curl = curl_init($token_url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
    $json_response = curl_exec($curl);
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if ( $status != 200 ) {
    	echo 'token_url = ' . $token_url . "\n";
    	echo 'params = ' . $params . "\n";
        echo 'response = ' . $json_response . "\n";
        die("Error: call to URL $token_url failed with status $status\n");
    }
    curl_close($curl);
    
    return json_decode($json_response, true);
}

// ...

$refresh_token = "73488ebd-d883-479c-ad9f-6b6106371fea";
$response = salesforce_refresh($refresh_token);

?>