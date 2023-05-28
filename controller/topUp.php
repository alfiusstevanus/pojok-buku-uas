<?php
include "../server/connection.php";
$id = $_GET['id'];
$nominal = $_POST['nominal'];

$query = "UPDATE akun SET saldo = saldo + $nominal WHERE id = '$id'";
mysqli_query($conn, $query);
header("location:../saldo.php");
die();
