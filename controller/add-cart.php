<?php
session_start();
include('../server/connection.php');

$id = $_GET['id_buku'];
$add = "SELECT * FROM buku WHERE id_buku = '$id'";
$q = mysqli_query($conn, $add);
$row = mysqli_fetch_object($q);
$_SESSION['cart'][$id] = [
    "id_buku" => $row->id_buku,
    "judul" => $row->judul_buku,
    "harga" => $row->harga,
    "penulis" => $row->penulis_buku,
    "penerbit" => $row->penerbit_buku
];
header("location: ../cart.php");
