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
    
    $q = "INSERT INTO buku VALUES ('', '$judul_buku', '$penulis_buku', '$penerbit_buku', '$image', '$tahun_terbit', '$stok', '$harga', '$sinopsis')";
    mysqli_query($conn, $q);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
        echo "<script> alert('Buku berhasil di upload.');
        window.location.href='../addBook.php';

        </script>";
    }
}
?>