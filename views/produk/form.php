<?php include "../templates/header.php" ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex align-items-baseline justify-content-between">
                <h3>Form Tambah Produk</h3>
                <a href="data.php" class="btn btn-dark btn-sm">Kembali</a>
            </div>
            <div class="card shadow-sm mt-3 mb-5">
                <div class="card-body">
                    <form action="../../controllers/Produk.php" method="POST" enctype="multipart/form-data">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control mb-2" required placeholder="Masukkan Nama...">
                        <label>Harga</label>
                        <input type="number" name="harga" class="form-control mb-2" required placeholder="Masukkan Harga...">
                        <!-- <label>Input Maksimal</label>
                        <input type="number" name="maksimal_input" class="form-control mb-2" required placeholder="Masukkan Input Maksimal..."> -->
                        <label>Stok</label>
                        <div class="mb-2">
                            <div class="form-check form-check-inline">
                                <input name="stok" class="form-check-input" type="radio" value="Tersedia" checked>
                                <label class="form-check-label" for="inlineCheckbox1">Tersedia</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input name="stok" class="form-check-input" type="radio" value="Habis">
                                <label class="form-check-label" for="inlineCheckbox2">Habis</label>
                            </div>
                        </div>
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" id="" class="form-control" placeholder="Masukkan deskripsi..."></textarea>
                        <label>Foto</label>
                        <input type="file" name="foto" class="form-control mb-2" required placeholder="Masukkan Foto...">
                        <button class="btn btn-primary btn-sm" name="create">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "../templates/footer.php" ?>