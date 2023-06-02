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
$query2 = "SELECT * FROM buku ORDER BY tahun_terbit DESC";
$result2 = mysqli_query($conn, $query2);
?>
<!Doctype HTML>
<html>

<head>
    <title>Admin | Book List</title>
    <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="../style/admin.css">
    <link rel="stylesheet" href="../style/fontawesome/css/all.min.css">
    <link rel="icon" href="../images/logo books corner 2.png">
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
            <a href data-bs-toggle="modal" data-bs-target="#addBook">
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
                                <a class="btn btn-secondary my-3 text-center" data-bs-toggle="modal" data-bs-target="#manageBook<?= $row['id_buku'] ?>" role="button">Manage</a>
                            </td>
                        </tr>
                        <div class="modal fade" id="manageBook<?= $row['id_buku'] ?>" tabindex="-1" aria-labelledby="manageBookLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="manageBookLabel">Manage Book!</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Choose the operation!</h5>
                                        <a data-bs-toggle="modal" data-bs-target="#updateBook<?= $row['id_buku'] ?>" role="submit" class="btn btn-success mt-3">Update</a>
                                        <a role="submit" class="btn btn-danger mt-3" href="controller/deleteBook.php?id=<?= $row['id_buku'] ?>">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="updateBook<?= $row['id_buku'] ?>" tabindex="-1" aria-labelledby="updateBookLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateBookLabel">Update Book!</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="controller/actionUpdateBook.php?id=<?= $row['id_buku'] ?>" enctype="multipart/form-data">
                                            <div class="container row">
                                                <div class="col-lg-6">
                                                    <div>
                                                        <h5>Judul Buku:</h5>
                                                        <input type="text" name="judul_buku" class="form-control my-3" value="<?= $row['judul_buku'] ?>" required>
                                                    </div>
                                                    <div>
                                                        <h5>Penulis:</h5>
                                                        <input type="text" name="penulis_buku" class="form-control my-3" value="<?= $row['penulis_buku'] ?>" required>
                                                    </div>
                                                    <div>
                                                        <h5>Penerbit:</h5>
                                                        <input type="text" name="penerbit_buku" class="form-control my-3" value="<?= $row['penerbit_buku'] ?>" required>
                                                    </div>
                                                    <div>
                                                        <h5>Tahun Terbit:</h5>
                                                        <input type="text" name="tahun_terbit" class="form-control my-3" value="<?= $row['tahun_terbit'] ?>" required>
                                                    </div>
                                                    <div>
                                                        <h5>Edit Cover:</h5>
                                                        <input type="file" name="image" class="form-control my-3">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div>
                                                        <h5>Harga:</h5>
                                                        <input type="text" name="harga" class="form-control my-3" value="<?= $row['harga'] ?>" required>
                                                    </div>
                                                    <div>
                                                        <h5>Stok:</h5>
                                                        <input type="text" name="stok" class="form-control my-3" value="<?= $row['stok'] ?>" required>
                                                    </div>
                                                    <div>
                                                        <h5>Sinopsis:</h5>
                                                        <textarea name="sinopsis" class="form-control my-3 no-resize" required rows="9"><?= $row['sinopsis'] ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary mt-3" data-bs-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn btn-primary btn-success mt-3" value="Update">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile ?>
                </table>
            </div>
            <div class="modal fade" id="addBook" tabindex="-1" aria-labelledby="addBookLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addBookLabel">Add Book!</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="controller/actionAddBook.php" enctype="multipart/form-data">
                                <div class="container row">
                                    <div class="col-lg-6">
                                        <div>
                                            <h5>Judul Buku:</h5>
                                            <input type="text" name="judul_buku" class="form-control my-3" value="<?= $row['judul_buku'] ?>" required placeholder="Judul">
                                        </div>
                                        <div>
                                            <h5>Penulis:</h5>
                                            <input type="text" name="penulis_buku" class="form-control my-3" value="<?= $row['penulis_buku'] ?>" required placeholder="Penulis">
                                        </div>
                                        <div>
                                            <h5>Penerbit:</h5>
                                            <input type="text" name="penerbit_buku" class="form-control my-3" value="<?= $row['penerbit_buku'] ?>" required placeholder="Penerbit">
                                        </div>
                                        <div>
                                            <h5>Tahun Terbit:</h5>
                                            <input type="text" name="tahun_terbit" class="form-control my-3" value="<?= $row['tahun_terbit'] ?>" required placeholder="Tahun Terbit">
                                        </div>
                                        <div>
                                            <h5>Cover Buku:</h5>
                                            <input type="file" name="image" class="form-control my-3" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div>
                                            <h5>Harga:</h5>
                                            <input type="text" name="harga" class="form-control my-3" value="<?= $row['harga'] ?>" required placeholder="Harga">
                                        </div>
                                        <div>
                                            <h5>Stok:</h5>
                                            <input type="text" name="stok" class="form-control my-3" value="<?= $row['stok'] ?>" required placeholder="Stok">
                                        </div>
                                        <div>
                                            <h5>Sinopsis:</h5>
                                            <textarea name="sinopsis" class="form-control my-3 no-resize" required rows="9" placeholder="Sinopsis"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary mt-3" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-primary btn-success mt-3" value="Add">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main-content end-->
        </div>


        <div class="clearfix"></div>
    </div>




</body>
<script src="js/bootstrap.bundle.js"></script>
<script src="../js/bootstrap.js"></script>

</html>