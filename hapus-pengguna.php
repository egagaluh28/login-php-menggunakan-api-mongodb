<?php 

session_start();

if(empty($_SESSION['username'])){
    header('Location: login.php');
}

$id = $_GET['id'];

$cUrl = curl_init();
$options = array(
    CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/apk-2023-hzlvs/endpoint/deletepenggunabyid?id='.$id,
    CURLOPT_CUSTOMREQUEST => 'DELETE',
);

curl_setopt_array($cUrl, $options);

$response = curl_exec($cUrl);

curl_close($cUrl);

header('Location: index.php');


?>