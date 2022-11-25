<?php
$connector = new mysqli("localhost".":"."3315", "root", "1202204112", "modul3");

if (!$connector) {
  die("connector$connector Gagal: " . $connector->connect_error);
}
