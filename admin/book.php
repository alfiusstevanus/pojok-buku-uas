<?php
$namaFile = basename($_SERVER['PHP_SELF']);
include '../server/connection.php';
session_start();
if ($_SESSION['status'] == 'User') {
    header('location: ../index.php');
    exit;
}

$query = "SELECT COUNT(*) AS total_buku FROM buku";
$result = $conn->query($query);
$row_buku = mysqli_fetch_assoc($result);
$total_buku = $row_buku['total_buku'];
$query2 = "SELECT * FROM buku";
$result2 = mysqli_query($conn, $query2);
?>
<!Doctype HTML>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="../style/admin.css">
    <link rel="stylesheet" href="../style/fontawesome/css/all.min.css">
</head>


<body>
    <!-- start of sidebar -->
    <?php include 'layout/sidebar.php' ?>
    <!-- end of sidebar -->
    <div id="main">

        <div class="head">
            <div class="col-div-6">
                <span style="font-size:30px;cursor:pointer; " class="nav c-10">☰ Books</span>

            </div>

            <div class="clearfix"></div>
        </div>

        <div class="clearfix"></div>
        <br />


        <div class="col-div-3">
            <a href="book.php">
                <div class="box">
                    <p><?= $total_buku ?><br /><span>Total Books</span></p>
                    <i class="fa fa-book box-icon"></i>
                </div>
            </a>
        </div>
        <div class="col-div-1">
            <a href="addBook.php">
                <div class="box rounded-4">
                    <p><span>Add</span></p>
                    <i class="fa-solid fa-plus box-income"></i>
                </div>
            </a>
        </div>

        <div class="clearfix"></div>
        <br /><br />
        <div class="bg-30">
            <!-- main-content start-->
            <div class="scrollable-content overflow-auto" style="height: 400px;">
                <table class="table py-0" border="0">
                    <tr class="sticky sticky-top">
                        <th class="col-1 text-center c-10 p-0">
                            <div class="bg-30 h-65 pt-3">ID</div>
                        </th>
                        <th class="col-2 text-center c-10 p-0">
                            <div class="bg-30 h-65 pt-3">Judul</div>
                        </th>
                        <th class="col-2 text-center c-10 p-0">
                            <div class="bg-30 h-65 pt-3">Penulis</div>
                        </th>
                        <th class="col-2 text-center c-10 p-0">
                            <div class="bg-30 h-65 pt-3">Penerbit</div>
                        </th>
                        <th class="col-1 text-center c-10 p-0">
                            <div class="bg-30 h-65 pt-2">Tahun Terbit</div>
                        </th>
                        <th class="col-2 text-center c-10 p-0">
                            <div class="bg-30 h-65 pt-3">Stok</div>
                        </th>
                        <th class="col-2 text-center c-10 p-0">
                            <div class="bg-30 h-65 pt-3">Harga</div>
                        </th>
                        <th class="col-1 text-center c-10 p-0">
                            <div class="bg-30 h-65 pt-3"></div>
                        </th>
                    </tr>
                    <?php while ($row = mysqli_fetch_assoc($result2)) : ?>
                        <tr>
                            <td> <input type="text" class="form-control text-center my-3" value="<?= $row["id_buku"] ?>" readonly>
                            </td>
                            <td> <input type="text" class="form-control text-center my-3" value="<?= $row["judul_buku"] ?>" readonly>
                            </td>
                            <td> <input type="text" class="form-control text-center my-3" value="<?= $row["penulis_buku"] ?>" readonly>
                            </td>
                            <td> <input type="text" class="form-control text-center my-3" value="<?= $row["penerbit_buku"] ?>" readonly>
                            </td>
                            <td> <input type="text" class="form-control text-center my-3" value="<?= $row["tahun_terbit"] ?>" readonly>
                            </td>
                            <td> <input type="text" class="form-control text-center my-3" value="<?= $row['stok'] ?>" readonly>
                            </td>
                            <td> <input type="text" class="form-control text-center my-3" value="Rp. <?= number_format($row['harga']) ?>" readonly>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-secondary my-3 text-center" data-bs-toggle="modal" data-bs-target="#deleteUser<?= $row['id'] ?>" role="button">Manage</a>
                            </td>
                        </tr>
                        <div class="modal fade" id="deleteUser<?= $row['id'] ?>" tabindex="-1" aria-labelledby="deleteUserLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteUserLabel">Delete User!</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Anda yakin ingin menghapus Akun "<?= $row['name'] ?>" secara Permanen?</h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary mt-3" data-bs-dismiss="modal">Close</button>
                                        <a role="submit" class="btn btn-danger btn-success mt-3" href="controller/deleteUser.php?id=<?= $row['id'] ?>">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile ?>
                </table>
            </div>
            <!-- main-content end-->
        </div>


        <div class="clearfix"></div>
    </div>




</body>
<script src="js/bootstrap.bundle.js"></script>
<script src="../js/bootstrap.js"></script>

</html>