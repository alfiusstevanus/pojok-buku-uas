<?php
include "../server/connection.php";
$id = $_GET['id'];
$q = "SELECT password from akun WHERE id = $id";
$result = mysqli_query($conn, $q);
$row = mysqli_fetch_assoc($result);

$passwordDB = $row['password'];
$nominal = $_POST['nominal'];
$password = $_POST['password'];

$query = "UPDATE akun SET saldo = saldo + $nominal WHERE id = '$id'";
if ($nominal > 0) {
    if ($passwordDB != $password) {
        $message = 'Password Anda salah!';
        header("location:../saldo.php?message=$message");
    } else {
        mysqli_query($conn, $query);
        $message = 'Saldo berhasil ditambah';
        header("location:../saldo.php?message=$message");
    }
} else {
    $message = 'Masukan nominal saldo';
    header("location:../saldo.php?message=$message");
}
die();
