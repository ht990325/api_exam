<?php
if(!isset($_POST['token_info'])){
    alert("Request forbidden");
    header('./');
}
$token_info = $_POST['token_info'];
// echo $token_info['access_token'];
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
    // 'Authorization: Bearer Bz4U58ABrSHPhv83GhjvT2o9kK1YgDctKxUNZUBrCKdbLvEAywmZGXKMZ5kU4beZFk2dRtKk2pR5JJf30jqSlzvaf2evkr92czazjIt39UITL21nRKWTE0XD1zxEtWfkGHwVb_jxp0KqT0v3QSfkiqI5obfRqn58DS7-Q8V6nT3nM0LW6gJKPNP4BVKM-thRqAfY_7Bvpiftponwr7yJxApvkC_iYpX3loW4YjLXsw240TqCCgLN8_M3e5wIMOTlQiT21UrjjUqDqgkY5j6LVJdUYfMKP5v4eR25WiyXG8lhpPNxxd_qfPQ8iP1W6EX3RqwIoXklsKeN89Xt4_ZvwOxY0X2nTn0UWlMQTWssox_rsRFJLTXS11VkhZSG6XHpK37AKfuyO1C-U7LrLyKBolSIEoV18himaYiKcYX_Jw6ZrEYuyZrugC7RwhY2xLFpFdJOSVvNjkgeLLWu3dLnKJTKfbSe3x4pevXQIDubruQw37wlwLSOOl_0Z9vatahB0vGL_OH6UeV91y7dShjz5T0NgWKX2j8u1uMaXanbyGpL-0ptxPwOeCeDAA36q4CNzygj_EJ0qd2IVDYFI-Yraowd4py2kJHIViOPgxVMHkGAEDwT3KMxzIRz9U-26VEa4nAIaO3i5M8VI6-Hb6C_yTHOY3IBaZe5oPWcR8pQkgwMIudKueW_6EgexBNRVtBU1ZtbQ_kZnldg7gcUrHy8G95GQKt15Y9E5Wo8WBHz3x8Xl25mPsnATxrt7Cm_S-2xdFc90UFh1tXPRk1mFOTuNwpK3XLGpjKL4ZWfCSuvzWtUESaZTlbfYM5um1kZRS9C_vGNxA3dlhxYddnIFjO60vsv4JpM-MCiEb2OXWGB_J8XOqnrm6Q5njHt2_hWr817Up7KBnGS0KimMx4_mwxCUE0ECAMGkPpgpuOXZ8SEaAT-5PLv7bS-hmav6VLldsZhueK7Fq2NjOvD7vgc3rdfH-w1GG75jDM64rhPomL_eNLAHRn57cgcf6VIACkXD5SPofcSJ_r5PrR7vDbkJUm2bumfsDpA5zGf0cb_1LaxwkY'
  ),
));

$response = curl_exec($curl);

curl_close($curl);

$records = json_decode($response);
// print_r($records);
if (isset($records['type'])) {
    alert("error caused!");
    // header("../");
} else {
    include "./ajax/add_records.php";
}
