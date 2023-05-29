<?php
include 'server/connection.php';
session_start();
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
include('layouts/header.php');

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
                                <h4><?php echo $row['judul_buku']; ?></h4>
                                <p>Stok: <?= $row['stok'] ?></p>
                                <form action="controller/checkout.php?id_buku=<?= $row['id_buku'] ?>" method="post">
                                    <div class="text-center">
                                        <select class="my-3 text-center bg-60 py-1" name="jumlah">
                                            <option value="0">Jumlah Buku</option>
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
                                        <input type="submit" class="btn btn-primary bg-success border-0 py-3 px-5 mb-2" value="BUY">
                                        <span>
                                            <a href="controller/add-cart.php?id_buku=<?= $row['id_buku'] ?>" class="bg-success border-0 py-3 px-3 c-60 rounded-2 ms-3">
                                                <i role="button" class="fa-sharp fa-solid fa-cart-plus fa-xl">
                                                </i>
                                            </a>
                                        </span>
                                    </div>
                                </form>

                                <h5 class="mt-5 text-start">Sinopsis:</h5>
                                <!-- <p><?php echo $row['product_description']; ?></p> -->
                                <p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea voluptatibus aut ipsa ab dolor nisi? Eveniet libero temporibus maxime explicabo quo id, sequi possimus dolorem illo. Ab quidem distinctio minus. Laudantium recusandae error, adipisci nesciunt ea quisquam nostrum quibusdam rerum harum cumque? Accusantium facere, voluptate nulla adipisci nostrum consequatur ipsam.</p>

                                <h4 class="mt-5 text-start mb-4">For <span class="c-10">You!</span></h4>
                                <div class="row">
                                    <?php while ($row = mysqli_fetch_assoc($r)) : ?>
                                        <div class="col-lg-3">
                                            <a class="text-dark" style="text-decoration: none;" href="detil-buku.php?id=<?= $row['id_buku'] ?>">
                                                <div class="bg-60 py-3 px-auto rounded-4 scale" data-bs-toggle="modal" data-bs-target="#infoSkill<?= $row['id'] ?>">
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
        <?php endwhile ?>
    </div>
</section>
<?php
include('layouts/footer.php');
?>