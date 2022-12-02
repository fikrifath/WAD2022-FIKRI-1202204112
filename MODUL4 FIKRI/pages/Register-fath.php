<?php session_start();
require "../config/connector.php";

if (isset($_POST["daftar"])) {
    $nama = $_POST["nama"];
    $email = strtolower($_POST["email"]);
    $password = mysqli_real_escape_string($connector, $_POST["password"]);
    $pwdConfirm = mysqli_real_escape_string($connector, $_POST["password2"]);
    $no_hp = $_POST["no"];
    $result = mysqli_query($connector, "SELECT email FROM user_fikri WHERE email = '$email'");

    if (mysqli_num_rows(($result)) !== 1 && $password == $pwdConfirm) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($connector, "INSERT INTO user_fikri VALUES ('', '$nama', '$email', '$password', '$no_hp')");
        echo "<div class='alert alert-success alert-dismissible fade show fixed-top' role='alert'>
                    <span>Register berhasil, silahkan login!</span>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
        echo "<meta http-equiv='refresh' content='2 url=Login-fath.php'>";
    } elseif (mysqli_num_rows(($result)) === 1) {
        echo "<div class='alert alert-danger alert-dismissible fade show fixed-top' role='alert'>
                <span>Email sudah terdaftar!</span>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
    } elseif ($password !== $pwdConfirm) {
        echo "<div class='alert alert-danger alert-dismissible fade show fixed-top' role='alert'>
                <span>Password tidak sesuai!</span>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Fikri Fathoni </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        <?php include '../asset/style/index.css'; ?>
    </style>
</head>

<body>
    <section id="login">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-6 min-vh-100 left">
                    <img src="../asset/images/masjid.jpg" style="object-fit:fill; width:100%; height:100%;" alt="foto">
                </div>
                <div class="col-md-6">
                    <div class="form-login m-auto ps-5">
                        <h2 class="fw-bold mb-4">Register</h2>
                        <form action="" method="post">
                            <!-- Email input -->
                            <div class="mb-3 position-relative">
                                <label class="form-label " for="email">Email address</label>
                                <span class="required" style="top: 0px; left: 41px;">*</span>
                                <input type="email" id="email" class="form-control form-control-lg" name="email" placeholder="masukan email" required />

                            </div>
                            <!-- nama input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="nama">Nama</label>
                                <span class="required" style="top: 0px; left: 41px;">*</span>
                                <input type="nama" id="nama" class="form-control form-control-lg" name="nama" placeholder="masukan nama" required />
                            </div>
                            <!-- no hp input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="no">No Hp</label>
                                <span class="required" style="top: 0px; left: 41px;">*</span>
                                <input type="no" id="no" class="form-control form-control-lg" name="no" placeholder="masukan No Hp" required />
                            </div>
                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="password">Password</label>
                                <span class="required" style="top: 0px; left: 41px;">*</span>
                                <input type="password" id="password" class="form-control form-control-lg" name="password" placeholder="masukan password" required />
                            </div>
                            <div class="form-outline mb-4">
                                <!-- Password input -->
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="password2">konfirmasi Password</label>
                                    <span class="required" style="top: 0px; left: 41px;">*</span>
                                    <input type="password" id="password2" class="form-control form-control-lg" name="password2" placeholder="masukan ulang password" required />
                                </div>
                                <div class="text-center text-lg-start mt-4 pt-2">
                                    <button type="submit" name="daftar" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Daftar</button>
                                    <p class="small fw-bold mt-2 pt-1 mb-0">Apakah anda sudah mempunyai akun? <a href="Login-fath.php" class="link-primary">Login</a></p>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>