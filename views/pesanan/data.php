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
                            <input type="hidden" name="id_produk" value="<?= $see->id_produk ?>">
                            <input type="number" name="qty" class="form-control mt-4" placeholder="mau pesan berapa?" min="1">
                            <button class="btn btn-info btn-sm mt-3 w-100" name="tambah-keranjang">Masukkan Keranjang</button>
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

<?php include "../templates/footer.php" ?>