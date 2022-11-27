<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../aset/style/index.css" />
</head>

<body>
    <section>

        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-6 min-vh-100 left">
                    <br><br><br><br><br>
                    <img width="540" height="360" src = "https://media.ed.edmunds-media.com/ford/mustang/2022/oem/2022_ford_mustang_coupe_ecoboost-premium_fq_oem_1_1280.jpg">
                </div>
                <div class="col-md-6">
                    <div class="form-login m-auto ps-5">
                        <h2 class="fw-bold mb-4">Register</h2>
                        <form action="Login-Shauman.php" method="post">
                            <div class="mb-1">
                                <label for="emailuser" class="form-label">Email</label>
                                <input type="email" name="emailuser" id="emailuser" class="form-control w-75">
                            </div>
                            <div class="mb-1">
                                <label for="namauser" class="form-label">Nama</label>
                                <input type="text" name="namauser" id="namauser" class="form-control w-75">
                            </div>
                            <div class="mb-1">
                                <label for="nomorhp" class="form-label">Nomor Handphone</label>
                                <input type="text" name="nomorhp" id="nomorhp" class="form-control w-75">
                            </div>
                            <div class="mb-1">
                                <label for="Password" class="form-label">Password</label>
                                <input type="password" name="Password" id="Password" class="form-control w-75">
                            </div>
                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Konfirmasi Password</label>
                                <input type="password" name="confirmPassword" id="confirmPassword" class="form-control w-75">
                            </div>

                            <button type="submit" name="register" class="d-block btn btn-primary mb-3">Register</button>
                        </form>
                        <p>Sudah Terdaftar? <a href="Login-Shauman.php">Login Disini!</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>