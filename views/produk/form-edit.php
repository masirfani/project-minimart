<?php 
    include "../templates/header.php"; 
    include "../../koneksi.php";

    $id_produk = $_GET['id_produk'];
    $query     = "SELECT * FROM produk WHERE id_produk = $id_produk";
    $execute   = $connect->query($query);
    $see       = mysqli_fetch_object($execute);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex align-items-baseline justify-content-between">
                <h3>Form Edit Produk</h3>
                <a href="data.php" class="btn btn-dark btn-sm">Kembali</a>
            </div>
            <div class="card shadow-sm mt-3 mb-5">
                <div class="card-body">
                    <form action="../../controllers/Produk.php" method="POST" enctype="multipart/form-data">
                        <label>Nama</label>
                        <input type="hidden" name="id_produk" value="<?= $see->id_produk ?>">
                        <input type="hidden" name="foto_lama" value="<?= $see->foto ?>">
                        <input type="text" name="nama" class="form-control mb-2" required value="<?= $see->nama ?>" placeholder="Masukkan Nama...">
                        <label>Harga</label>
                        <input type="number" name="harga" class="form-control mb-2" required value="<?= $see->harga ?>" placeholder="Masukkan Harga...">
                        <!-- <label>Input Maksimal</label>
                        <input type="number" name="maksimal_input" class="form-control mb-2" required value="<?= $see->maksimal_input ?>" placeholder="Masukkan Input Maksimal..."> -->
                        <label>Stok</label>
                        <div class="mb-2">
                            <div class="form-check form-check-inline">
                                <input name="stok" class="form-check-input" type="radio" value="Tersedia" <?= ($see->stok == 'Tersedia') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="inlineCheckbox1">Tersedia</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input name="stok" class="form-check-input" type="radio" value="Habis" <?= ($see->stok == 'Habis') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="inlineCheckbox2">Habis</label>
                            </div>
                        </div>
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" id="" class="form-control" placeholder="Masukkan deskripsi..."><?= $see->deskripsi ?></textarea>
                        <label>Foto</label>
                        <input type="file" name="foto" class="form-control mb-2" placeholder="Masukkan Foto...">
                        <button class="btn btn-primary btn-sm" name="update">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "../templates/footer.php" ?>