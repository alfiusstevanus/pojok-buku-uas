<?php
session_start();
include "../server/connection.php";
$id = $_GET['id'];
$name = $_POST['nama'];
$umur = $_POST['umur'];
$telp = $_POST['telp'];
$kelamin = $_POST['kelamin'];

$photo_name = rand(0, 9999) . str_replace(' ', '', $name) . ".jpg";
$path = 'images/users/' . $_SESSION['user_photo'];


if (!empty($_FILES['photo']['tmp_name'])) {
    if (file_exists($path) && $_SESSION['user_photo'] != 'member.jpg') {
        unlink($path);
    }
    $photo = $_FILES['photo']['tmp_name'];
    move_uploaded_file($photo, "img/profil/" . $photo_name);
} else {
    $photo_name =  $_SESSION['user_photo'];
}

$query = "UPDATE akun SET name = '$name', umur = '$umur', telephone = '$telp', kelamin = '$kelamin', photo = '$photo_name' WHERE id = '$id'";
mysqli_query($conn, $query);
header("location:../profil.php");
die();
