<?php
require './connector.php';

$id = $_GET['id'];

$sql = "DELETE FROM showroom_fikri_table WHERE id_mobil = $id";

if (mysqli_query($connector, $sql)) {
  header("location: ../pages/ListCar-fath.php?pesan=hapus");
} else {
  header("location: ../pages/ListCar-fath.php?pesan=gagal");
}