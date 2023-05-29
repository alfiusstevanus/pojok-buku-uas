<?php
session_start();
include('../server/connection.php');

$id = $_SESSION['id'];
$id_buku = $_GET['id_buku'];
$jumlah = $_POST['jumlah'];
// $pw = $_POST['password'];
$q1 = "Select * from buku WHERE id_buku = $id_buku";
$q2 = "SELECT saldo from akun where id = $id";
$r = mysqli_query($conn, $q1);
$r2 = mysqli_query($conn, $q2);
$row = mysqli_fetch_assoc($r);
$row2 = mysqli_fetch_assoc($r2);
$harga = $row['harga'];
$saldo = $row2['saldo'];
$total = $jumlah * $harga;
$date = date("Y-m-d");

echo $saldo;
if ($jumlah > 0) {
    $status = 'Pending';
    $ket = 'Buku berhasil di Checkout!';
    if ($saldo < $total) {
        $status = 'Canceled';
        $ket = 'Saldo Anda kurang!';
        $total = 0;
        $jumlah = 0;
    }
} else {
    $status = 'Canceled';
    $ket = 'Masukan jumlah Buku!';
}

$query1 = "INSERT INTO transaksi VALUES
(null, $id_buku, $id, '$date', $jumlah, $harga,$total,'$status')";
$query2 = "UPDATE buku set stok = stok - $jumlah WHERE id_buku = $id_buku";
$query3 = "UPDATE akun set saldo = saldo - $total WHERE id = $id";

$conn->query($query1);
$conn->query($query2);
$conn->query($query3);

header("location: ../detil-buku.php?id=$id_buku&message=$ket");
