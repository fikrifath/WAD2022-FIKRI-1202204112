<?php
$connector = new mysqli("localhost".":"."3315", "root", "", "modul3");

if (!$connector) {
  die("connector$connector Gagal: " . $connector->connect_error);
}
