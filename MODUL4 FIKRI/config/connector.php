<?php
$host = "localhost:3315";
$username = "root";
$password = "";
$namadb = "wad_modul4_fikri";

$connector = new mysqli($host, $username, $password, $namadb);

if (!$connector) {
  die("connector Gagal: " . $connector->connect_error);
}