<?php
session_start();
include('../server/connection.php');

$id = $_SESSION['id'];
$id_buku = $_GET['id_buku'];
$jumlah = $_POST['jumlah'];
$alamat = $_POST['alamat'];
// $pw = $_POST['password'];
$q1 = "Select * from buku WHERE id_buku = $id_buku";
$q2 = "SELECT saldo, password from akun where id = $id";
$r = mysqli_query($conn, $q1);
$r2 = mysqli_query($conn, $q2);
$row = mysqli_fetch_assoc($r);
$row2 = mysqli_fetch_assoc($r2);
$harga = $row['harga'];
$stok = $row['stok'];
$saldo = $row2['saldo'];
$password = $_POST['password'];
$passwordDB = $row2['password'];
$total = $jumlah * $harga;
$date = date("Y-m-d");

if (($password == $passwordDB) && ($stok >= $jumlah)) {
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
(null, $id_buku, $id, '$date', $jumlah, $harga,$total,'$status','$alamat')";
    $query2 = "UPDATE buku set stok = stok - $jumlah WHERE id_buku = $id_buku";
    $query3 = "UPDATE akun set saldo = saldo - $total WHERE id = $id";

    $conn->query($query1);
    $conn->query($query2);
    $conn->query($query3);
} else if ($stok < $jumlah) {
    $ket = "Stok tersisa $stok!";
} else {
    $ket = 'Password Anda salah!';
}
header("location: ../detil-buku.php?id=$id_buku&message=$ket");
