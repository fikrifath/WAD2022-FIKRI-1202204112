<?php
require "../config/connector.php";
session_start();

$pilihan_warna = [
    "danger" => "Red",
    "warning" => "Yellow",
    "success" => "Green",
    "primary" => "Blue",

];

if (isset($_SESSION["login"])) {
    $login_as = $_SESSION["email"];
    $result_login = mysqli_query($connector, "SELECT * FROM user_fikri WHERE email = '$login_as'");
    $data_login = mysqli_fetch_assoc($result_login);
} else {
    header("Location: Login-fath.php");
    exit;
}

if (isset($_POST["update"])) {
    $email = $_POST["email"];
    $nama = $_POST["nama"];
    $no_hp = $_POST["no_hp"];
    $password = mysqli_real_escape_string($connector, $_POST["password"]);
    $konfirmasi_password = mysqli_real_escape_string($connector, $_POST["password2"]);
    setcookie("warna_navbar", $_POST["warna_navbar"], time() + 86400, "/");

    if ($password == $konfirmasi_password) {
        $query = "UPDATE user_fath SET
                nama = '$nama',
                no_hp = '$no_hp',
                password = '$password'
              WHERE email = '$email'";
        mysqli_query($connector, $query);
    }

    echo "<meta http-equiv='refresh' content='0'>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fikri Fathoni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        <?php include 'asset/style/style.css'; ?>
    </style>
</head>

<body>
    <!-- Awal Navbar -->
    <nav class="navbar navbar-expand navbar-dark bg-<?= isset($_COOKIE["warna_navbar"])  ? $_COOKIE["warna_navbar"] : "success"; ?>">
        <div class="container py-2">
            <div class="navbar-nav">
                <a class="nav-link" href="../index.php">Home</a>
                <a class="nav-link" href="List-fath.php">MyCar</a>
            </div>
            <div class="d-flex">
                <a href="./Add-fath.php" class="btn btn-light text-<?= isset($_COOKIE["warna_navbar"])  ? $_COOKIE["warna_navbar"] : "success"; ?>" role="button">Add Car</a>
                <div class="dropdown ms-4">
                    <button class="btn btn-light text-<?= isset($_COOKIE["warna_navbar"])  ? $_COOKIE["warna_navbar"] : "success"; ?> dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $data_login["nama"]; ?>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item text-<?= isset($_COOKIE["warna_navbar"])  ? $_COOKIE["warna_navbar"] : "success"; ?>" href="#">Profile</a></li>
                        <li><a class="dropdown-item text-<?= isset($_COOKIE["warna_navbar"])  ? $_COOKIE["warna_navbar"] : "success"; ?>" href="../config/logout.php">Log Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <div class="container mt-4">
        <h2 class="fw-bold text-center">Profile</h2>
        <div class="row">
            <div class="col-12">
                <form action="" method="post">
                    <div class="mb-3 row position-relative">
                        <label for="email" class="col-sm-2 col-form-label text-muted">Email</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext text-muted" id="email" name="email" value="<?= $data_login["email"]; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row position-relative">
                        <label for="nama" class="col-sm-2 col-form-label text-muted">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-muted" id="nama" name="nama" value="<?= $data_login["nama"]; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row position-relative">
                        <label for="no_hp" class="col-sm-2 col-form-label text-muted">Nomor Handphone</label>
                        <div class="col-sm-10">
                            <input type="tel" class="form-control text-muted" id="no_hp" name="no_hp" value="<?= $data_login["no_hp"]; ?>">
                        </div>
                    </div>
                    <hr>
                    <div class="mb-3 row position-relative">
                        <label for="password" class="col-sm-2 col-form-label text-muted">Kata Sandi</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control text-muted" id="password" name="password" placeholder="Kata Sandi">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="konfimasi_password" class="col-sm-2 col-form-label text-muted">Konfirmasi Kata Sandi</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control text-muted" id="password2" name="password2" placeholder="Konfirmasi Kata Sandi">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="warna_navbar" class="col-sm-2 col-form-label text-muted">Warna Navbar</label>
                        <div class="col-sm-10">
                            <select class="form-select text-muted" aria-label="Warna Navbar" id="warna_navbar" name="warna_navbar">
                                <?php foreach ($pilihan_warna as $warna => $value) : ?>
                                    <?php $selected = $warna == $_COOKIE["warna_navbar"] ? "selected" : "" ?>
                                    <option value="<?= $warna; ?>" <?= $selected; ?>><?= $value; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-<?= isset($_COOKIE["warna_navbar"])  ? $_COOKIE["warna_navbar"] : "success"; ?> px-4 button" name="update">Update</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="d-flex align-items-center logo-ead">
            <img src="../asset//images//logo-ead.png" alt="Logo EAD" width="100">
            <span class="ms-5 text-muted">Fikri Fathoni_1202204112</span>
        </div>
    </div>

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>