<?php 

session_start();

if(empty($_SESSION['username'])){
    header('Location: login.php');
}

$id = $_POST['id'];
$username = $_POST['username'];
$password = md5($_POST['password']);

if (empty($id)) {
    // insert
    $url = 'https://asia-south1.gcp.data.mongodb-api.com/app/apk-2023-hzlvs/endpoint/tambahpengguna?username=' . urlencode($username) . '&password=' . urlencode($password);
    $customrequest = 'POST';
} else {
    // update
    $url = 'https://asia-south1.gcp.data.mongodb-api.com/app/apk-2023-hzlvs/endpoint/updatepengguna?id=' . urlencode($id) . '&username=' . urlencode($username) . '&password=' . urlencode($password);
    $customrequest = 'PUT';
}





$cUrl = curl_init();

$options = array(
    CURLOPT_URL => $url,
    CURLOPT_CUSTOMREQUEST => $customrequest,
    // CURLOPT_POSTFIELDS => $data
);

curl_setopt_array($cUrl, $options);

$response = curl_exec($cUrl);
                
curl_close($cUrl);

if ($response) {
  header("Location: index.php");
} else {
  echo 'Failed';
}

?>