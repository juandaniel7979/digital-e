<?php
$api_url = 'http://57c5-181-57-189-148.ngrok.io/';

//
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
    //print_r($result);
    curl_close($curl);
    $result = json_decode($result, true);
    //print_r($result);
    return $result;
}



function correoSender($url,$method,$params){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($curl, CURLOPT_URL, $url. '?' .http_build_query($params));
    $result = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($result, true);
    return $result;
}

?>