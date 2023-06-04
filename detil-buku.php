<?php
session_start();
include 'server/connection.php';
$title = '| Book';
include('layouts/header.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM buku WHERE id_buku = $id";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die(mysqli_error($conn));
    }

    $q = "SELECT * FROM buku ORDER BY RAND() LIMIT 4";
    $r = mysqli_query($conn, $q);
    if (!$result) {
        die(mysqli_error($conn));
    }
} else {
    header('location: buku.php');
}

?>
<section class="transaksi pt-5 pb-2">
    <div class="container bg-30 p-5 rounded-3 shadow-lg">
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <div class="text-center p-5">
                <img class="rounded-4 shadow-lg" width="300px" src="images/books/<?= $row['cover_buku'] ?>">
            </div>

            <div class="product__details__content">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <div class="product__details__text">

                                <h4>RP. <?= number_format($row['harga']) ?></h4>
                                <h4><?= $row['judul_buku']; ?></h4>
                                <p>Stock: <?php if ($row['stok'] > 0) {
                                                echo $row['stok'];
                                            } else { ?>
                                        <span class="text-danger">Sold out!</span>
                                    <?php } ?>
                                </p>
                                <form action="controller/checkout.php?id_buku=<?= $row['id_buku'] ?>" method="post">
                                    <div class="text-center">
                                        <select class="my-3 text-center bg-60 py-1" name="jumlah">
                                            <option value="0">Book Amount</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                    <div class="rating mb-3">
                                        <i class="fa fa-star c-10"></i>
                                        <i class="fa fa-star c-10"></i>
                                        <i class="fa fa-star c-10"></i>
                                        <!-- random rating buku -->
                                        <?php
                                        if (mt_rand(0, 1) == 1) { ?>
                                            <i class="fa fa-star c-10"></i>
                                            <i class="fa-regular fa-star"></i>
                                        <?php } else { ?>
                                            <i class="fa-regular fa-star"></i>
                                            <i class="fa-regular fa-star"></i>
                                        <?php } ?>
                                        <!-- random jumlah reviewers -->
                                        <span> | <?= mt_rand(11, 120) ?> Reviews</span>
                                    </div>
                                    <div class="text-center">
                                        <a class="btn btn-primary bg-success border-0 py-3 px-5 mb-2" data-bs-toggle="modal" data-bs-target="#checkout<?= $id ?>" role="button">BUY</a>
                                        <span>
                                            <a href="controller/add-cart.php?id_buku=<?= $row['id_buku'] ?>" class="bg-success border-0 py-3 px-3 c-60 rounded-2 ms-3">
                                                <i role="button" class="fa-sharp fa-solid fa-cart-plus fa-xl">
                                                </i>
                                            </a>
                                        </span>
                                    </div>
                                    <br>
                                    <!-- alert message! -->
                                    <?php if (isset($_GET['message'])) { ?>
                                        <div id="alert" class="alert alert-secondary alert-dismissible fade show mb-5 " role="alert">
                                            <?= $_GET['message'] ?>
                                            <a href="detil-buku.php?id=<?= $id ?>" class="btn-close"></a>
                                        </div>
                                    <?php } ?>
                                    <!-- alert message! -->


                                    <h5 class="mt-5 text-start">Synopsis:</h5>
                                    <p style="text-align: justify;"><?= $row['sinopsis'] ?></p>

                                    <h4 class="mt-5 text-start mb-4">For <span class="c-10">You!</span></h4>
                                    <div class="row">
                                        <?php while ($row = mysqli_fetch_assoc($r)) : ?>
                                            <div class="col-lg-3">
                                                <a class="text-dark" style="text-decoration: none;" href="detil-buku.php?id=<?= $row['id_buku'] ?>">
                                                    <div class="bg-60 py-3 px-auto rounded-4 scale">
                                                        <div class="row justify-content-center align-items-center">
                                                            <div class="text-center">
                                                                <img src="images/books/<?= $row['cover_buku'] ?>" class="rounded-4" width="120px" height="180px" alt="<?= $row['cover_buku'] ?>">
                                                            </div>
                                                            <div>
                                                                <h6 class="text-center border-0 fw-semibold pt-2"><?= $row['judul_buku'] ?></h6>
                                                            </div>
                                                            <div>
                                                                <h6 class="text-center border-0 pt-1 pb-1 fw-light">Rp. <?= number_format($row['harga']) ?></h6>
                                                            </div>
                                                            <!-- <div>
                                                        <a class="btn btn-primary bg-success border-0 py-2 px-4 mb-1 text-center" role="button" href="detil-buku.php?id=<?= $row['id_buku'] ?>">
                                                            Beli
                                                        </a>
                                                    </div> -->
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php endwhile ?>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="checkout<?= $id ?>" tabindex="-1" aria-labelledby="checkoutLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content info-skill">
                        <div class="modal-header">
                            <h5 class="modal-title" id="checkoutLabel">Confirm Address!</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div>
                                <h5>Home(Priority)</h5>
                                <textarea name="alamat" id="" cols="5" rows="3" class="form-control my-3 no-resize"><?= $_SESSION['name'] ?> (<?= $_SESSION['telephone'] ?>)<?= "\n" . $_SESSION['alamat'] ?></textarea>
                                <a data-bs-toggle="modal" data-bs-target="#password" role="button" class="btn btn-primary btn-success mt-2">BUY</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="password" tabindex="-1" aria-labelledby="passwordLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content info-skill">
                        <div class="modal-header">
                            <h5 class="modal-title" id="passwordLabel">Input Password:</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div>
                                <p>Input your Password:</p>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                <input type="submit" class="btn btn-primary btn-success mt-3" value="Confirm">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile ?>
    </div>
</section>
<?php
include('layouts/footer.php');
?>