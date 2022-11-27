<?php 
require "connector.php";
function registrasi ($data){
    global $connect_user;

    $namauser = strtolower(stripslashes($data["namauser"]));
    $emailuser = strtolower(stripslashes($data["emailuser"]));
    $nomorhp = strtolower(stripslashes($data["nomorhp"]));
    $password = mysqli_real_escape_string($connect_user,$data["Password"]); //=> memungkinkan user memasukkan password ada kutipnya, 
    $confirmPassword = mysqli_real_escape_string($connect_user,$data["confirmPassword"]); //=> memungkinkan user memasukkan password ada kutipnya,


    $result = mysqli_query($connect_user, "SELECT email FROM users WHERE email = '$emailuser' ");
    if(mysqli_fetch_assoc($result)){
        echo "<script> alert('Email telah dipakai') </script>";
        return false;
    }
    if( $password !== $confirmPassword){
        echo "<script> alert('Password berbeda') </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($connect_user, "INSERT INTO users VALUES (
        '','$namauser', '$emailuser', '$password','$nomorhp'
    )");

    return mysqli_affected_rows($connect_user);

}


?>