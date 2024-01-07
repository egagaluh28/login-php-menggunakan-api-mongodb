<?php


session_start();

if(empty($_SESSION['username'])){
    header('Location : login.php');
}

if (isset($_POST['tambahdosen'])) {
    $data = [
        "nama" => $_POST['nama'],
        "usia" => $_POST['usia'],
        "jenis_kelamin" => $_POST['jeniskelamin'],
        "prodi" => [
            "kode" => $_POST['kodeprodi'],
            "nama" => $_POST['namaprodi'],
        ]
    ];
    $dataToString = json_encode($data);

    $endpoint = 'https://asia-south1.gcp.data.mongodb-api.com/app/apk-2023-hzlvs/endpoint/tambah';
    

    $ch = curl_init($endpoint);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
    ]);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataToString);
    
  
    $response = curl_exec($ch);
    
  
    if ($response === false) {
        $error_message = curl_error($ch);

        echo "cURL Error: " . $error_message;
    } else {
    
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
        if ($http_code == 200) {

            header('Location: index.php');
        } else {
    
            echo "HTTP Error: " . $http_code;
        }
    }
    
    curl_close($ch);
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Tambah Data</title>
</head>

<body>
    <div class="container my-3">
        <h1 class="my-3 text-center">TAMBAH DATA DOSEN</h1>
        <div class="col-12 col-sm-6 mx-auto mt-lg-5">
            <form data-bs-theme="light" action="" method="POST">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama :</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>
                <div class="mb-3">
                    <label for="usia" class="form-label">Usia</label>
                    <input type="number" class="form-control" id="usia" name="usia">
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Kelasmin</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jeniskelamin" id="pria" value="pria">
                        <label class="form-check-label" for="pria">
                            Pria
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jeniskelamin" id="wanita" value="wanita">
                        <label class="form-check-label" for="wanita">
                            Wanita
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="kodeprodi" class="form-label">Kode prodi :</label>
                        <input type="text" class="form-control" id="kodeprodi" name="kodeprodi">
                    </div>
                    <div class="col">
                        <label for="namaprodi" class="form-label">Nama prodi :</label>
                        <input type="text" class="form-control" id="namaprodi" name="namaprodi">
                    </div>
                </div>
                <button type="submit" name="tambahdosen" class="btn btn-primary mt-3"
                    style="background-color : #2E4374">Simpan</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>