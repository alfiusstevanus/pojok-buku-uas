<?php
include ('../../server/connection.php');


if (isset($_POST['up'])) {
    $path = "../../images/" . basename($_FILES['image']['name']);

    $image = $_FILES['image']['name'];
    $judul_buku = $_POST['judul_buku'];
    $penulis_buku = $_POST['penulis_buku'];
    $penerbit_buku = $_POST['penerbit_buku'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];
    $sinopsis = $_POST['sinopsis'];
    
    $q = "UPDATE buku set judul_buku = '$judul_buku', penulis_buku = '$penulis_buku', penerbit_buku =  '$penerbit_buku',
    cover_buku = '$image', tahun_terbit = '$tahun_terbit', stok = $stok, harga = $harga, sinopsis = '$sinopsis')";
    mysqli_query($conn, $q);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
        echo "<script> alert('Buku berhasil di upload.');
        window.location.href='../addBook.php';

        </script>";
    }
}
?>