<?php
include ('../../server/connection.php');
session_start();

$id_buku = $_GET['id_buku'];

$add = "SELECT * FROM buku WHERE id_buku = '$id_buku'";
$query = mysqli_query($conn, $add);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Buku</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styleEdit.css">

<body>
    <div class="formbold-main-wrapper">
        <div class="formbold-form-wrapper">
            <h3 class="tittle">Update Buku</h3>
            <?php while ($row = mysqli_fetch_assoc($query)) : ?>
          <form class="mt-5" action="actionUpdateBook.php" method="POST">
              <div class="formbold-input-flex-judul">
                <div>
                    <label for="judul_buku" class="formbold-form-label"> Judul Buku </label>
                    <input type="text" name="judul_buku" class="formbold-form-input" value="<?php echo $row['judul_buku'] ?>"/>
                </div>
              </div>

              <div class="formbold-input-flex-judul">
                <div>
                    <label for="penulis_buku" class="formbold-form-label"> Penulis </label>
                    <input type="text" name="penulis_buku" class="formbold-form-input" value="<?php echo $row['penulis_buku'] ?>"/>
                </div>
              </div>
      
              <div class="formbold-input-flex">
                <div>
                    <label for="penerbit" class="formbold-form-label"> Penerbit </label>
                    <input type="text" name="penerbit_buku" class="formbold-form-input" value="<?php echo $row['penerbit_buku'] ?>"/>
                </div>
                <div>
                    <label for="tahun_terbit" class="formbold-form-label"> Tahun Terbit </label>
                    <input type="text" name="tahun_terbit" class="formbold-form-input" value="<?php echo $row['tahun_terbit'] ?>"/>
                </div>
              </div>

              <div class="formbold-input-flex">
                <div>
                    <label for="harga" class="formbold-form-label"> Harga </label>
                    <input type="text" name="harga" class="formbold-form-input" value="<?php echo $row['harga'] ?>"/>
                </div>
                <div>
                    <label for="phone" class="formbold-form-label-stok"> Stok </label>
                    <input type="number" step="1" min="0" max="99" name="stok" class="formbold-form-input" value="<?php echo $row['stok'] ?>"/>
                </div>
              </div>

            <div>
                <label for="sinopsis" class="formbold-form-label"> Sinopsis </label>
                <textarea rows="4" name="sinopsis" class="formbold-form-input" value="<?php echo $row['sinopsis'] ?>"></textarea>
            </div>

              <div class="formbold-input-flex">
                <div>
                    <label for="cover_buku" class="formbold-form-label"> Cover Buku </label>
                    <input type="file" name="cover_buku" class="formbold-form-input" value=<?php echo "<img src='../../images/" . $row['picture'] . "'>"; ?>/>
                </div>
              </div>
      
              <input type="submit" class="formbold-btn" name="up" value="Update"></input>
          </form>
          <?php endwhile; ?>
        </div>
      </div>
</body>
