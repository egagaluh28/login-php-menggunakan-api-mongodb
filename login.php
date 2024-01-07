<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="image/logo romusha.png" type="image/x-icon">
    <title>Profil</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style/profil.css">
</head>

<body>
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-5">
                    <div class="card rounded-3 text-black">
                        <div class="row">
                            <div class="col">
                                <div class="card-body p-md-5 mx-md-4">

                                    <div class="text-center">
                                        <img src="image/logoo.jpg" style="width: 185px;" alt="logo">
                                    </div>

                                    <form action="sigin.php" id="form_login>
                                        <p class=" mt-3">Please login to your account</p>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="username">Username :</label>
                                            <input type="text" id="form2Example11" name="username" class="form-control"
                                                placeholder="username" required />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="password">Password :</label>
                                            <input type="password" id="password" name="password" class="form-control"
                                                placeholder="password" required />
                                        </div>

                                        <div class="text-center pt-1 mb-2 pb-1">
                                            <form id="form_login" action="URL_TARGET" method="POST">
                                                <!-- Ganti URL_TARGET dengan URL yang sesuai -->
                                                <button class="btn btn-dark me-2" type="submit">Log in</button>
                                                <button type="button" class="btn btn-dark"><a href="register.php">Create
                                                        new</a></button>
                                            </form>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>