<?php include "../templates/header-non-login.php" ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center">
                <h3>Keranjang Belanja</h3>
                <a href="data.php" class="btn btn-dark btn-sm">Tambah Pesanan</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include "../../koneksi.php";
                                $no = 1;
                                $total = 0;
                                $pesan = "Halo Kak saya ingin memesan barang barang ini %0A";
                                foreach ($_SESSION['cart'] as $key => $see) {
                                    $total += $see['subtotal'];
                                    
                                    $pesan .= sprintf("%s. %s - %s berjumlah %s : %s", $no, $see['nama'], formatRupiah($see['harga']), $see['qty'], formatRupiah($see['subtotal']))."%0A";
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $see['nama'] ?></td>
                                <td><?= $see['harga'] ?></td>
                                <td><?= $see['qty'] ?></td>
                                <td><?= formatRupiah($see['subtotal']) ?></td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <th colspan="4">Total</th>
                                <th><?= formatRupiah($total) ?></th>
                            </tr>
                        </tbody>
                    </table>
                    <?php
                        $pesan .= "%0A";
                        $pesan .= "*Total semua : ".formatRupiah($see['subtotal'])."*";
                    ?>
                    <a class="btn btn-success btn-sm float-end" target="_blank" href="https://api.whatsapp.com/send/?phone=6285222255802&text=<?= $pesan ?>&type=phone_number&app_absent=0">Pesan</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "../templates/footer.php" ?>