<?php
require "../config/connector.php";
session_start();
if (isset($_COOKIE["email"]) && isset($_COOKIE["password"])) {
    $email = $_COOKIE["email"];
    $password = $_COOKIE["password"];
    $result = mysqli_query($connector, "SELECT * FROM user_fikri WHERE email = '$email'");
    $data = mysqli_fetch_assoc($result);

    if ($email === $data["email"] && $password === $data["password"]) {
        $_SESSION["login"] = true;
        $_SESSION["email"] = $data["email"];
    }
}

if (isset($_POST["login"])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = mysqli_query($connector, "SELECT * FROM user_fikri WHERE email='$email'");
    //cek email  
    if (mysqli_num_rows($query) === 1) {
        //cek password
        $data = mysqli_fetch_assoc($query);
        if (password_verify($password, $data["password"])) {
            // set seesion
            $_SESSION["login"] = true;
            $_SESSION["email"] = $data["email"];
            header("Location: ../index.php");
            if (isset($_POST["check"])) {
                setcookie("email", $data["email"], "/");
                setcookie("password", $data["password"], "/");
            }
            header("Location:../index.php");
        }
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fikri Fathoni_1202204112</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        <?php include 'asset/style/index.css'; ?>
    </style>
</head>

<body>
    <section id="login">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-6 min-vh-100 left">
                    <img src="../asset/images/nasi.png" style="object-fit:fill; width:100%; height:100%;" alt="foto">
                </div>
                <div class="col-md-6">
                    <div class="form-login m-auto ps-5">
                        <h2 class="fw-bold mb-4">Login</h2>
                        <form action="" method="post">
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="email">Email address</label>
                                <input type="email" id="email" class="form-control form-control-lg" name="email" placeholder="masukan email" value="<?= isset($_COOKIE["email"]) ? $_COOKIE["email"] : ""; ?>" />
                            </div>
                            <!-- Password input -->
                            <div class="form-outline mb-3">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" id="password" class="form-control form-control-lg" name="password" placeholder="masukan password" value="<?= isset($_COOKIE["password"]) ? $_COOKIE["password"] : ""; ?>" />
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Checkbox -->
                                <div class="form-check mb-0">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="check" name="check" />
                                    <label class="form-check-label" for="check">
                                        Remember me
                                    </label>
                                </div>
                                <a href="#!" class="text-body">Forgot password?</a>
                            </div>

                            <div class="text-center text-lg-start mt-4 pt-2">
                                <button type="submit" class="btn btn-primary btn-lg" name="login" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                                <p class="small fw-bold mt-2 pt-1 mb-0">tidak punya akun ini <a href="Register-fath.php" class="link-primary">Daftar</a></p>
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
