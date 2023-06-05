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

if (isset($_POST['cari'])) {
    $keyword = $_POST['keyword'];
    $q = "SELECT * FROM buku WHERE judul_buku LIKE '%$keyword%' ORDER BY tahun_terbit DESC";
} else {
    $q = "SELECT * FROM buku ORDER BY tahun_terbit DESC";
}

$result2 = mysqli_query($conn, $q);
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
            <div class="mt-4 ms-3">
                <button class="btn-add-buku pe-2" data-bs-target="#addBook" data-bs-toggle="modal">ADD BOOK  <i class="fa-solid fa-book-medical" style="color: #ffffff;"></i></button>
            </div>
        </div>

        <div class="clearfix"></div>
        <br /><br />
        <div class=" mb-4 bg-30 ">
            <div class=" d-flex justify-content-center p-4 align-items-center">


                <form class="search" method="post">
                    <input class="search-box border-0" type="text" name="keyword" placeholder="Book Title" autocomplete="off" />
                    <button class="btn-cari ms-2 p-1" name="cari">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>

            </div>
        </div>

        <div class="bg-30">
            <!-- main-content start-->
            <div class="scrollable-content overflow-auto" style="height: 400px;">
                <table class="table py-0" border="0">
                    <tr class="sticky sticky-top">
                        <th class="col-1 text-center c-10 p-0">
                            <div class="bg-30 h-65 pt-4">Book ID</div>
                        </th>
                        <th class="col-2 text-center c-10 p-0">
                            <div class="bg-30 h-65 pt-4">Title</div>
                        </th>
                        <th class="col-2 text-center c-10 p-0">
                            <div class="bg-30 h-65 pt-4">Author</div>
                        </th>
                        <th class="col-2 text-center c-10 p-0">
                            <div class="bg-30 h-65 pt-4">Publisher</div>
                        </th>
                        <th class="col-1 text-center c-10 p-0">
                            <div class="bg-30 h-65 pt-4">Year</div>
                        </th>
                        <th class="col-2 text-center c-10 p-0">
                            <div class="bg-30 h-65 pt-4">Stock</div>
                        </th>
                        <th class="col-2 text-center c-10 p-0">
                            <div class="bg-30 h-65 pt-4">Price</div>
                        </th>
                        <th class="col-1 text-center c-10 p-0">
                            <div class="bg-30 h-65 pt-4">Action</div>
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
                            <td> <input type="text" class="form-control text-center my-3" value="<?= number_format($row['harga']) ?> IDR" readonly>
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
                                                        <h5>Book Title:</h5>
                                                        <input type="text" name="judul_buku" class="form-control my-3" value="<?= $row['judul_buku'] ?>" required placeholder="Input Title">
                                                    </div>
                                                    <div>
                                                        <h5>Author:</h5>
                                                        <input type="text" name="penulis_buku" class="form-control my-3" value="<?= $row['penulis_buku'] ?>" required placeholder="Input Author">
                                                    </div>
                                                    <div>
                                                        <h5>Publisher:</h5>
                                                        <input type="text" name="penerbit_buku" class="form-control my-3" value="<?= $row['penerbit_buku'] ?>" required placeholder="Input Publisher">
                                                    </div>
                                                    <div>
                                                        <h5>Year:</h5>
                                                        <input type="text" name="tahun_terbit" class="form-control my-3" value="<?= $row['tahun_terbit'] ?>" required placeholder="Input Year">
                                                    </div>
                                                    <div>
                                                        <h5>Update Cover:</h5>
                                                        <input type="file" name="image" class="form-control my-3">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div>
                                                        <h5>Price:</h5>
                                                        <input type="text" name="harga" class="form-control my-3" value="<?= $row['harga'] ?>" required placeholder="Input Price">
                                                    </div>
                                                    <div>
                                                        <h5>Stock:</h5>
                                                        <input type="text" name="stok" class="form-control my-3" value="<?= $row['stok'] ?>" required placeholder="Input Stock">
                                                    </div>
                                                    <div>
                                                        <h5>Synopsis:</h5>
                                                        <textarea name="sinopsis" class="form-control my-3 no-resize" required rows="9" placeholder="Input Synopsis"><?= $row['sinopsis'] ?></textarea>
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
                                            <h5>Book Title:</h5>
                                            <input type="text" name="judul_buku" class="form-control my-3" required placeholder="Input Title">
                                        </div>
                                        <div>
                                            <h5>Author:</h5>
                                            <input type="text" name="penulis_buku" class="form-control my-3" required placeholder="Input Author">
                                        </div>
                                        <div>
                                            <h5>Publisher:</h5>
                                            <input type="text" name="penerbit_buku" class="form-control my-3" required placeholder="Input Publisher">
                                        </div>
                                        <div>
                                            <h5>Year:</h5>
                                            <input type="text" name="tahun_terbit" class="form-control my-3" required placeholder="Input Year">
                                        </div>
                                        <div>
                                            <h5>Book Cover:</h5>
                                            <input type="file" name="image" class="form-control my-3" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div>
                                            <h5>Price:</h5>
                                            <input type="text" name="harga" class="form-control my-3" required placeholder="Input Price">
                                        </div>
                                        <div>
                                            <h5>Stock:</h5>
                                            <input type="text" name="stok" class="form-control my-3" required placeholder="Input Stock">
                                        </div>
                                        <div>
                                            <h5>Synopsis:</h5>
                                            <textarea name="sinopsis" class="form-control my-3 no-resize" required rows="9" placeholder="Input Synopsis"></textarea>
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