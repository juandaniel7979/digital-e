<?php

$api_url = 'http://140.82.31.88:3001/';
//$api_url = 'http://localhost:3001/';
//$api_email = 'https://digitalentrepreneurstr.com/correo.php';
// $app_url = 'http://localhost/fixOption/';
$app_dashboard = "";  // dashboard folder

function toServer($url,$method,$data,$auth = false){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'auth-token: '.$auth
    ));
    if($data!=""){
        $data_string = json_encode($data);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
    }
    $result = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($result, true);
    return $result;
}

?>