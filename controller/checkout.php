<?php
include('../server/connection.php');
session_start();
$id = $_SESSION['id'] = 252;
$id_buku = $_GET['id_buku'];
$jumlah = $_POST['jumlah'];
// $pw = $_POST['password'];
$q = "Select * from buku WHERE id_buku = $id_buku";
$r = mysqli_query($conn, $q);
$row = mysqli_fetch_assoc($r);
$harga = $row['harga'];
$total = $jumlah * $harga;
$date = date("Y-m-d");
if ($jumlah > 0) {
    $status = 'Success';
} else {
    $status = 'Canceled';
}
if (!$r) {
    die(mysqli_error($conn));
} else {
    $r = mysqli_fetch_assoc($r);
}

$query1 = "INSERT INTO transaksi VALUES
(null, $id_buku, $id, '$date', $jumlah, $harga,$total,'$status')";
$query2 = "UPDATE buku set stok = stok - $jumlah WHERE id_buku = $id_buku";
$query3 = "UPDATE akun set saldo = saldo - $total WHERE id = $id";

$conn->query($query1);
$conn->query($query2);
$conn->query($query3);

// header("location: ../buku.php");
