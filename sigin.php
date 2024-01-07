<?php
session_start();

if (isset($_GET['username']) && isset($_GET['password'])) {
    $username = $_GET['username'];
    $password = $_GET['password'];

    $cUrl = curl_init();

    $options = array(
        CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/apk-2023-hzlvs/endpoint/getpenggunabyusername?username=' . $username . '&password=' . md5($password),
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_RETURNTRANSFER => TRUE,
    );

    curl_setopt_array($cUrl, $options);

    $response = curl_exec($cUrl);

    if ($response === false) {
        // Handle cURL error
        die('cURL Error: ' . curl_error($cUrl));
    }

    $data = json_decode($response);

    curl_close($cUrl);

    if (count($data)) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
    }
}

header('Location: index.php');
?>