<?php include "../templates/header-non-login.php" ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <?php
            include "../../koneksi.php";

            $query   = "SELECT * FROM produk";
            $execute = $connect->query($query);
            $no      = 1;

            while ($see = mysqli_fetch_object($execute)) {
        ?>
            <div class="col-md-3">
                <div class="card">
                    <img src="../../assets/uploads/produk/<?= $see->foto ?>" alt="" class="card-img-top">
                    <div class="card-body">
                        <form action="../../controllers/Pesanan.php" method="POST">
                            <div class="d-flex justify-content-between">
                                <b><?= $see->nama ?></b>
                                <small><?= formatRupiah($see->harga) ?></small>
                            </div>
                            <?php if($see->stok == "Tersedia"): ?>
                                <input type="hidden" name="id_produk" value="<?= $see->id_produk ?>">
                                <input type="number" name="qty" class="form-control mt-4" placeholder="mau pesan berapa?" min="1" value="<?= $_SESSION['cart'][$see->id_produk]['qty'] ?? 1  ?>" max="<?= $see->maksimal_input ?>">
                                <button class="btn btn-info btn-sm mt-3 w-100" name="tambah-keranjang">Masukkan Keranjang</button>
                            <?php else: ?>    
                                <button class="btn btn-info btn-sm mt-3 w-100" disabled>Stok Habis</button>
                            <?php endif ?>
                            <button type="button" class="btn btn-sm w-100 btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Lihat Barang
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>


    <?php
    $keranjang = count($_SESSION['cart'] ?? []);
    ?>
    <a href="keranjang.php" class="btn btn-success" style="position: absolute;bottom: 20px; right: 20px;">
        Lihat Keranjang
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            <?= $keranjang ?>
            <span class="visually-hidden">Total Produk</span>
        </span>
    </a>
</div>

<?php

    $query   = "SELECT * FROM produk";
    $execute = $connect->query($query);
    $no      = 1;

    while ($see = mysqli_fetch_object($execute)) {
?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><?= $see->nama ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="../../assets/uploads/produk/<?= $see->foto ?>" alt="" class="img-fluid rounded">
                    <div class="row mt-4 mb-4">
                        <div class="col-md-6">
                            <p class="mb-0">Harga</p>
                            <b><?= formatRupiah($see->harga) ?></b>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-0">Stok</p>
                            <b class="mt-2 badge <?= ($see->stok == "Tersedia") ? 'text-bg-success' : 'text-bg-secondary'  ?>"><?= $see->stok ?></b>
                        </div>
                        <div class="col-md-12 mt-2">
                            <p class="mb-0">Deskripsi</p>
                            <b><?= $see->deskripsi ?></b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php include "../templates/footer.php" ?>