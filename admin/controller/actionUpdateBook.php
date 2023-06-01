<?php
include('../../server/connection.php');
$id = $_GET['id'];
$q = "SELECT cover_buku FROM buku WHERE id_buku = $id";
$result = mysqli_query($conn, $q);
$row = mysqli_fetch_assoc($result);

$judul_buku = $_POST['judul_buku'];
$penulis_buku = $_POST['penulis_buku'];
$penerbit_buku = $_POST['penerbit_buku'];
$tahun_terbit = $_POST['tahun_terbit'];
$stok = $_POST['stok'];
$harga = $_POST['harga'];
$sinopsis = $_POST['sinopsis'];

$cover_buku = rand(0, 999) . "_" . str_replace(' ', '', $judul_buku) . ".jpg";
$path = '../../images/books/' . $row['cover_buku'];

if (!empty($_FILES['image']['tmp_name'])) {
    if (file_exists($path)) {
        unlink($path);
    }
    $cover = $_FILES['image']['tmp_name'];
    move_uploaded_file($cover, "../../images/books/" . $cover_buku);
} else {
    $cover_buku =  $row['cover_buku'];
}

$q = "UPDATE buku set judul_buku = '$judul_buku', penulis_buku = '$penulis_buku', penerbit_buku =  '$penerbit_buku', cover_buku = '$cover_buku', tahun_terbit = '$tahun_terbit', stok = $stok, harga = $harga, sinopsis = '$sinopsis' WHERE id_buku = $id";
mysqli_query($conn, $q);

header("location:../book.php");
die();
