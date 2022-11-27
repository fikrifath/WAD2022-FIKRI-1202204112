<?php
    if(!isset($_SESSION)){
        session_start();
    }

    require "../config/register.php";
    require "../config/connector.php";

    if(isset($_POST["register"])){
        if(registrasi($_POST)){
            echo "<script> 
            alert('Berhasil Registrasi!');  
        </script>";
        }else{
            echo mysqli_error($connect);
        }
    }


    if (isset($_SESSION["login"])){
        header("Location: Home-fath.php");
        exit;
    }

    if(isset($_POST["login"])) {
        $emailuser = $_POST["emailuser"];
        $password = $_POST["Password"];

        $result = mysqli_query($connect_user, "SELECT * FROM users WHERE email = '$emailuser'");

        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row["password"])) {
                $_SESSION["email"] = $row["email"];
                $_SESSION["nama"] = $row["nama"];
                $_SESSION["nohp"] = $row["no_hp"];
                $_SESSION["login"] = true; 

                if(isset($_POST["remember"])){
                    setcookie("id", $row["id"], time()+60);
                    setcookie("key", hash("sha256", $row["email"]));
                }
                $_SESSION["message"] = "Berhasil Login";
                header("Location: Home-fath.php ");
                exit;
            };
        }
        $error = true ;
    }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
                        <h2 class="fw-bold mb-4">Login</h2>
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="emailuser" class="form-label">Email</label>
                                <input type="email" name="emailuser" id="emailuser" class="form-control w-75">
                            </div>
                            <div class="mb-3">
                                <label for="Password" class="form-label">Password</label>
                                <input type="password" name="Password" id="Password" class="form-control w-75">
                            </div>
                            <button type="submit" name="login" class="d-block btn btn-primary mb-3">Login</button>
                        </form>
                        <p>Anda belum punya akun? <a href="Register-Shauman.php">daftar</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>