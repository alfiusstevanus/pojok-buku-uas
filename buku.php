<?php
include 'server/connection.php';
include('layouts/header.php');
$query = 'SELECT * FROM buku';
$result = mysqli_query($conn, $query);
?>
<section>
    <div class="container">
        <div class="d-flex row align-items-center">
            <div class="col-md-4 ">
                <h1 class="fs-2 welcoming py-5">Book Corner List</h1>
            </div>
        </div>
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <div class=" col-lg-3">
                    <div class=" mb-4 bg-30 p-3 rounded-4 scale" data-bs-toggle="modal" data-bs-target="#infoSkill<?= $row['id'] ?>">
                        <div class="row justify-content-center align-items-center">
                            <div class="text-center">
                                <img src="images/books/<?= $row['cover_buku'] ?>" class="rounded-4" width="149px" height="215px" alt="<?= $row['cover_buku'] ?>">
                            </div>
                            <div>
                                <h5 class="text-center border-0 fw-semibold pt-3"><?= $row['judul_buku'] ?></h5>
                            </div>
                            <div>
                                <h5 class="text-center border-0 pt-2 pb-2 fw-light">Rp. <?= number_format($row['harga']) ?></h5>
                            </div>
                            <div class="col-lg-4 text-center">
                                <a class="btn btn-secondary bg-10 border-0 py-2 px-4" style="" role="button" href="transaksi.php?id=<?= $row['id_buku'] ?>">
                                    Beli
                                </a>
                            </div>
                            <!-- <div class="col-lg-4 mt-3">
                                <a class="btn btn-primary bg-danger border-0 py-3" role="button" data-bs-toggle="modal" data-bs-target="#deleteSkill<?= $row['id'] ?>">
                                    Delete
                                </a>
                            </div> -->
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php
include('layouts/footer.php');
?>