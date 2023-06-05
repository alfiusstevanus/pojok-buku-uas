<?php
session_start();
$index = 'text-secondary';
$about = 'text-secondary';
$book = 'text-dark';
include 'server/connection.php';
$title = '| Books';
include('layouts/header.php');
$query = 'SELECT * FROM buku';
$result = mysqli_query($conn, $query);

if (isset($_POST['cari'])) {
    $keyword = $_POST['keyword'];
    $q = "Select * from buku where judul_buku LIKE '%$keyword%'";
} else {
    $q = 'Select * from buku';
}

$result = mysqli_query($conn, $q);
?>
<section>
    <div class="container">
        <div class="tittle-buku">
            <h1 class="fs-2 welcoming pt-3 pb-2">Book Corner List</h1>
        </div>

        <div class=" mb-4 bg-30 rounded-4">
            <div class=" d-flex justify-content-center p-5 align-items-center">
                <form class="search" method="post">
                    <input class="search-box border-0" name="keyword" id="myInput" placeholder="  Book Title" autocomplete="off" />
                    <button class="btn-cari ms-2 p-2" name="cari">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>
        </div>

        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <div class=" col-lg-3">
                    <div class=" mb-4 bg-30 p-3 rounded-4 scale">
                        <div class="row justify-content-center align-items-center">
                            <div class="text-center">
                                <img src="images/books/<?= $row['cover_buku'] ?>" class="rounded-4 object-fit-cover" width="149px" height="215px" alt="<?= $row['cover_buku'] ?>">
                            </div>
                            <div>
                                <h5 class="text-center border-0 fw-semibold pt-3"><?= $row['judul_buku'] ?></h5>
                            </div>
                            <div>
                                <h5 class="text-center border-0 pt-2 pb-2 fw-light"><?= number_format($row['harga']) ?> IDR</h5>
                            </div>
                            <div class="col-lg-4 text-center">
                                <a class="btn btn-secondary bg-10 border-0 py-2 px-4" style="" role="button" href="detil-buku.php?id=<?= $row['id_buku'] ?>">
                                    Buy
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<script>
    // Mendapatkan elemen input
    var input = document.getElementById("myInput");

    // Mengatur posisi kursor pada indeks ke-5
    input.setSelectionRange(7, 7);

    // Fokuskan elemen input
    input.focus();
</script>
<?php
include('layouts/footer.php');
?>