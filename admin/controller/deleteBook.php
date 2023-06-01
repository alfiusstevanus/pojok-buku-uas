<?php
include "../../server/connection.php";
$id = $_GET['id'];

$query = "DELETE FROM buku WHERE id_buku = $id";
mysqli_query($conn, $query);
header("location: ../book.php");
