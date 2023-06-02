<?php
include('../../server/connection.php');

$image = $_FILES['image']['name'];
$judul_buku = $_POST['judul_buku'];
$penulis_buku = $_POST['penulis_buku'];
$penerbit_buku = $_POST['penerbit_buku'];
$tahun_terbit = $_POST['tahun_terbit'];
$stok = $_POST['stok'];
$harga = $_POST['harga'];
$sinopsis = $_POST['sinopsis'];

$cover = $_FILES['image']['tmp_name'];
$cover_name = rand(0, 999) . "_" . str_replace(' ', '', $judul_buku) . ".jpg";
move_uploaded_file($cover, "../../images/books/" . $cover_name);

$q = "INSERT INTO buku VALUES ('', '$judul_buku', '$penulis_buku', '$penerbit_buku', '$cover_name', '$tahun_terbit', $stok, $harga, '$sinopsis')";

if (mysqli_query($conn, $q)) {
    $success = true;
    header("location:../book.php?status=$success");
} else {
    $success = false;
    header("location:../book.php?status=$success");
}
die();
