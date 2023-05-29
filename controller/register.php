<?php
include('../server/connection.php');

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$telephone = $_POST['telephone'];
$umur = $_POST['umur'];
$alamat = $_POST['alamat'];
$kelamin = $_POST['kelamin'];

if (!empty($_FILES['photo']['tmp_name'])) {
    $photo = $_FILES['photo']['tmp_name'];
    $photo_name = rand(0, 9999) . "_" . str_replace(' ', '', $name) . ".jpg";
    move_uploaded_file($photo, "../images/profile/" . $photo_name);
} else {
    $photo_name =  'default.jpg';
}
$query = "INSERT INTO akun VALUES('','$email','$name','$password','$telephone','User','$photo_name','$kelamin','$umur',0,'$alamat')";

if (mysqli_query($conn, $query)) {
    $success = true;
    header("location:../login.php?registered=$success");
} else {
    $success = false;
    header("location:../login.php?registered=$success");
}

die();
