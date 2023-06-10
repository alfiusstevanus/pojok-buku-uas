<?php
$namaFile = basename($_SERVER['PHP_SELF']);
include '../server/connection.php';
session_start();
if (isset($_SESSION['status']) && $_SESSION['status'] == 'User') {
    header('location: ../index.php');
    exit;
}

$query = "SELECT COUNT(*) AS total_user FROM akun WHERE status = 'User'";
$result = $conn->query($query);
$row_user = mysqli_fetch_assoc($result);
$total_user = $row_user['total_user'];
$query2 = "SELECT * FROM akun WHERE status = 'User' ORDER BY id DESC";
$result2 = mysqli_query($conn, $query2);

if (isset($_POST['cari'])) {
    $keyword = $_POST['keyword'];
    $q = "SELECT * FROM akun WHERE name LIKE '%$keyword%' AND status = 'User' ORDER BY id DESC";
} else {
    $q = "SELECT * FROM akun WHERE status = 'User' ORDER BY id DESC";
}

$result2 = mysqli_query($conn, $q);
?>
<!Doctype HTML>
<html>

<head>
    <title>Admin | List Customers</title>
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
                <span style="font-size:30px;cursor:pointer;" class="nav c-10">☰ Customers</span>

            </div>

            <div class="clearfix"></div>
        </div>

        <div class="clearfix"></div>
        <br />

        <div class="col-div-3">
            <a href="">
                <div class="box">
                    <p><?= $total_user ?><br /><span>Customers</span></p>
                    <i class="fa fa-users box-icon"></i>
                </div>
            </a>
        </div>
        <div class="clearfix"></div>
        <br /><br />

        <div class=" mb-4 bg-30 ">
            <div class=" d-flex justify-content-center p-4 align-items-center">
                <form class="search" method="post">
                    <input class="search-box border-0" type="text" name="keyword" placeholder=" Customer Name" autocomplete="off" />
                    <button class="btn-cari ms-2 p-1" name="cari">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>
        </div>

        <div class="bg-30">
            <!-- main-content start-->
            <div class="scrollable-content overflow-auto pb-5" style="height: 400px;">
                <div class="pb-5">
                    <table class="table py-0" border="0">
                        <tr class="sticky sticky-top">
                            <th class="col-1 text-center c-10 p-0">
                                <div class="bg-30 h-65 pt-4">ID</div>
                            </th>
                            <th class="col-2 text-center c-10 p-0">
                                <div class="bg-30 h-65 pt-4">Email</div>
                            </th>
                            <th class="col-2 text-center c-10 p-0">
                                <div class="bg-30 h-65 pt-4">Name</div>
                            </th>
                            <th class="col-2 text-center c-10 p-0">
                                <div class="bg-30 h-65 pt-4">Telephone</div>
                            </th>
                            <th class="col-1 text-center c-10 p-0">
                                <div class="bg-30 h-65 pt-4">Age</div>
                            </th>
                            <th class="col-2 text-center c-10 p-0">
                                <div class="bg-30 h-65 pt-4">Gender</div>
                            </th>
                            <th class="col-2 text-center c-10 p-0">
                                <div class="bg-30 h-65 pt-4">Address</div>
                            </th>
                            <th class="col-1 text-center c-10 p-0">
                                <div class="bg-30 h-65 pt-4">Action</div>
                            </th>
                        </tr>
                        <?php while ($row = mysqli_fetch_assoc($result2)) : ?>
                            <tr>
                                <td> <input type="text" class="form-control text-center my-3" value="<?= $row["id"] ?>" readonly>
                                </td>
                                <td> <input type="text" class="form-control text-center my-3" value="<?= $row["email"] ?>" readonly>
                                </td>
                                <td> <input type="text" class="form-control text-center my-3" value="<?= $row["name"] ?>" readonly>
                                </td>
                                <td> <input type="text" class="form-control text-center my-3" value="<?= $row["telephone"] ?>" readonly>
                                </td>
                                <td> <input type="text" class="form-control text-center my-3" value="<?= $row['umur'] ?>" readonly>
                                </td>
                                <td> <input type="text" class="form-control text-center my-3" value="<?= $row['kelamin'] ?>" readonly>
                                </td>
                                <td> <input type="text" class="form-control text-center my-3" value="<?= $row['alamat'] ?>" readonly>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-danger my-3 text-center" data-bs-toggle="modal" data-bs-target="#deleteUser<?= $row['id'] ?>" role="button">Delete</a>
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
                                            <h5>Are you sure want to delete Account "<?= $row['name'] ?>" for Permanent?</h5>
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
            </div>
            <!-- main-content end-->
        </div>


        <div class="clearfix"></div>
    </div>





</body>

<script src="js/bootstrap.bundle.js"></script>
<script src="../js/bootstrap.js"></script>

</html>