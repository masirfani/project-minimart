<?php include "../templates/header.php" ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex align-items-baseline justify-content-between">
                <h3>Form Tambah Produk</h3>
                <a href="data.php" class="btn btn-dark btn-sm">Kembali</a>
            </div>
            <div class="card shadow-sm mt-3">
                <div class="card-body">
                    <form action="../../controllers/Produk.php" method="POST" enctype="multipart/form-data">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control mb-2" required placeholder="Masukkan Nama...">
                        <label>Harga</label>
                        <input type="number" name="harga" class="form-control mb-2" required placeholder="Masukkan Harga...">
                        <!-- <label>Stok</label>
                        <input type="number" name="stok" class="form-control mb-2" required placeholder="Masukkan Stok..."> -->
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