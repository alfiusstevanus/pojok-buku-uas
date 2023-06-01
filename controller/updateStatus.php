<?php
include "../server/connection.php";
$id_transaksi = $_GET['id'];
$newStatus = $_POST['newStatus'];
$query = "UPDATE transaksi set status = '$newStatus' WHERE id_transaksi = $id_transaksi";
mysqli_query($conn, $query);
header("location: ../transaction.php");
