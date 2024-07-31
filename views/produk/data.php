<?php include "../templates/header.php" ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="d-flex align-items-baseline justify-content-between">
                <h3>Data Produk</h3>
                <a href="form.php" class="btn btn-success btn-sm">Tambah Data</a>
            </div>
            <div class="card shadow-sm mt-3">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Input Maksimal</th>
                                <th>Deskripsi</th>
                                <th>Foto</th>
                                <th>Stok</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include "../../koneksi.php";

                                $query   = "SELECT * FROM produk";
                                $execute = $connect->query($query);
                                $no      = 1;
                                while ($see = mysqli_fetch_object($execute)){
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $see->nama ?></td>
                                <td><?= $see->harga ?></td>
                                <!-- <td><?= $see->maksimal_input ?></td> -->
                                <td><?= $see->deskripsi ?></td>
                                <td><img src="../../assets/uploads/produk/<?= $see->foto ?>" alt="" class="img-fluid rounded" width="150"></td>
                                <td class="mt-2 badge <?= ($see->stok == "Tersedia") ? 'text-bg-success' : 'text-bg-secondary'  ?>"><?= $see->stok ?></td>
                                <td>
                                    <a href="form-edit.php?id_produk=<?= $see->id_produk ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="../../controllers/Produk.php?delete=<?= $see->id_produk ?>&foto=<?= $see->foto ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin ingin menghapus produk ini?');">Delete</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "../templates/footer.php" ?>