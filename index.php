<?php 

session_start();

if(empty($_SESSION['username'])){
    header('Location: login.php');
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMAK</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container mt-5">
        <?php 
            if (! empty($_SESSION['username'])){
                echo '<div class="text-end">
                    User Login : <span class="fw-bold">'.$_SESSION['username'].'</span> | 
                    <a href="signout.php" class="btn btn-danger btn-sm">Logout</a>
                </div>';
            };
        ?>
        <h1 class="text-center">Daftar Akun Pengguna</h1>

        <table class="table table-striped">
            <thead>
                <tr class="table-dark">
                    <th>Aksi</th>
                    <th>Username</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $cUrl = curl_init();

                $options = array(
                    CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/apk-2023-hzlvs/endpoint/getallpengguna',
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_RETURNTRANSFER =>TRUE
                );

                curl_setopt_array($cUrl, $options);

                $response = curl_exec($cUrl);

                $data = json_decode($response);

                curl_close($cUrl);

                foreach ($data as $row):
                    echo '<tr>
                    <td>
                        <a href="javascript:void(0);" class="btn btn-warning edit" data-id="'.$row->_id.'">Ubah</a>
                        <a href="hapus-pengguna.php?id='.$row->_id.'" class="btn btn-danger" onclick="return confirm(\'Apakah anda yakin akan menghapus data?\');">Hapus</a>
                    </td>
                     <td>'.(empty($row->username) ? '' : $row->username).'</td>
                     <td>'.(empty($row->password) ? '' : $row->password).'</td>
                     </tr>';
                endforeach;

                if(empty($data)) {
                    echo '<tr><td colspan="5" class="text-center"> Tidak ada data</td></tr>';
                }

                ?>
            </tbody>
        </table>
        Total <?php echo count($data); ?> data
    </div>

    <!--Modal-->
    <div class="modal fade" id="modalMahasiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Mahasiswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formMahasiswa" action="register-save.php" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="username"
                                required>
                            <input type="hidden" id="id" name="id">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control" id="password" name="password" placeholder="password"
                                required>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success" form="formMahasiswa">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    $('.edit').click(function() {
        var id = $(this).data('id');

        $.ajax({
            url: 'https://asia-south1.gcp.data.mongodb-api.com/app/application-0-sjtvw/endpoint/getPenggunaById?id=' +
                id,
            type: 'GET',
            success: function(res) {
                var data = res[0];
                $('#modalMahasiswa').modal('show');
                $('#id').val(data._id);
                $('#username').val(data.username);
                $('#password').val(data.password);
            },
            error: function(err) {
                console.log(err);
            }
        })
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>