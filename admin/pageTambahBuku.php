

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styleEdit.css">

<body>
    <div class="formbold-main-wrapper">
        <div class="formbold-form-wrapper">
            <h3 class="tittle">Tambah Buku</h3>
          <form class="mt-5" action="actionInput.php" method="POST">
              <div class="formbold-input-flex-judul">
                <div>
                    <label for="judul_buku" class="formbold-form-label"> Judul Buku </label>
                    <input type="text" name="judul_buku" placeholder="Harry Potter" class="formbold-form-input"/>
                </div>
              </div>

              <div class="formbold-input-flex-judul">
                <div>
                    <label for="penulis_buku" class="formbold-form-label"> Penulis </label>
                    <input type="text" name="penulis_buku" placeholder="J.K. Rowling" class="formbold-form-input"/>
                </div>
              </div>
      
              <div class="formbold-input-flex">
                <div>
                    <label for="penerbit" class="formbold-form-label"> Penerbit </label>
                    <input type="text" name="penerbit_buku" placeholder="Gramedia" class="formbold-form-input"/>
                </div>
                <div>
                    <label for="tahun_terbit" class="formbold-form-label"> Tahun Terbit </label>
                    <input type="text" name="tahun_terbit" placeholder="1997" class="formbold-form-input"/>
                </div>
              </div>

              <div class="formbold-input-flex">
                <div>
                    <label for="harga" class="formbold-form-label"> Harga </label>
                    <input type="text" name="harga" placeholder="Rp. 60.000" class="formbold-form-input"/>
                </div>
                <div>
                    <label for="phone" class="formbold-form-label-stok"> Stok </label>
                    <input type="number" step="1" min="0" max="99" name="stok" placeholder="0" class="formbold-form-input"/>
                </div>
              </div>

            <div>
                <label for="sinopsis" class="formbold-form-label"> Sinopsis </label>
                <textarea rows="4" name="sinopsis" placeholder="Tuliskan sinopsis.." class="formbold-form-input"></textarea>
            </div>

              <div class="formbold-input-flex">
                <div>
                    <label for="cover_buku" class="formbold-form-label"> Cover Buku </label>
                    <input type="file" name="cover_buku" class="formbold-form-input"/>
                </div>
              </div>
      
              <button class="formbold-btn">
                  Tambah
              </button>
          </form>
        </div>
      </div>
</body>
