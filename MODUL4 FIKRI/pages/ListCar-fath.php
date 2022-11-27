<?php
require '../config/connector.php';

$sqlquery = "SELECT * FROM showroom_fikri_table";
$result = mysqli_query($connector, $sqlquery);

$checkrow = mysqli_num_rows($result);

if (isset($_GET['pesan'])) {
  if ($_GET['pesan'] == "berhasil") {
    echo "<div class='alert alert-success' role='alert'>
    Data Berhasil ditambahkan.
  </div>";
  } else if ($_GET['pesan'] == "gagal") {
    echo "<div class='alert alert-danger' role='alert'>
    Data Gagal ditambahkan.
  </div>";
  } else if ($_GET['pesan'] == "hapus") {
    echo "<div class='alert alert-success' role='alert'>
    Data Berhasil dihapus.
  </div>";
  } else if ($_GET['pesan'] == "update") {
    echo "<div class='alert alert-success' role='alert'>
    Data Berhasil diupdate.
  </div>";
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LISTCAR-FIKRI FATHONI-1202204112</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <style>
    <?php include '../asset/style/index.css'; ?>
  </style>
</head>

<body>
  <!-- Nav -->
  <nav class="navbar navbar-expand-lg bg-primary">
    <div class="container">
      <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNavAltMarkup">
        <div class="navbar-nav gap-3">
          <a class="nav-link" href="../index.php">Home</a>
          <a class="nav-link" style="color: white;" href="#">MyCar</a>
        </div>
        <a href="Add-fath.php" style="background-color: white; color:blue; border-radius: 5px; text-decoration: none; width: 110px; height: 35px; display:flex; justify-content:center; align-items:center; font-weight:500;">Add Car</a>
      </div>
    </div>
  </nav>
  <!-- Nav End -->

  <!-- Content -->
  <section id="list">
    <div class="container">
      <div>
        <h1>My Showroom</h1>
        <p>List Showroom fikri - 1202204112</p>
        <div class="d-flex gap-5">
          <?php
          if ($checkrow > 0) {
            while ($hasil = mysqli_fetch_assoc($result)) {
              echo "<div class='card cardcontent' style='width: 18rem;'>
            <img src='../asset/images/" . $hasil["foto_mobil"] . "' class='card-img-top' alt='fotomobil' style='padding: 16px;'>
            <div class='card-body'>
              <h5 class='card-title'>" . $hasil["nama_mobil"] . "</h5>
              <p class='card-text'>" . substr($hasil["deskripsi"], 0, 50) . '...' . "</p>
              <span class='d-flex'>
                <a href='Detail-fath.php?id=" . $hasil["id_mobil"] . "' class='btn btn-primary' style='border-radius: 100px; width:140px; height: 36px;'>Detail</a>
                <a href='../config/delete.php?id=" . $hasil["id_mobil"] . "' class='btn btn-danger' style='border-radius: 100px; width:140px; height: 36px; margin-left:20px;'>Delete</a>
              </span>
            </div>
          </div>";
            }
          } else {
            echo "0 results";
          }
          ?>
        </div>
      </div>
    </div>
  </section>
  <!-- Content End -->

  <!-- footer -->
  <footer class="" style="padding-bottom: 50px;">
    <div class="container">
      <p style="font-family: 'Raleway'; font-style: normal; font-weight: 700; font-size: 16px; line-height: 19px; color: #757575;">Jumlah Mobil : <?php echo $checkrow ?></p>
    </div>
  </footer>
  <!-- footer end -->
  <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>