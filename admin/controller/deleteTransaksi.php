<?php
include "../../server/connection.php";
$id = $_GET['id'];

$query = "DELETE FROM transaksi WHERE id_transaksi = $id";
mysqli_query($conn, $query);
header("location: ../orders.php");
