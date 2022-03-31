<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://remote.grwills.com.au:443/WebAPI/API/Bearer',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'keys=live&database=GRWillsLive&Password=G%26RWills2022&Username=ext_api&Content-Type=application%2Fx-www-form-urlencoded&grant_type=password',
  CURLOPT_HTTPHEADER => array(
    'Access-Control-Allow-Origin: *',
    'Content-Type: application/x-www-form-urlencoded'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
