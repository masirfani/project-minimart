<?php
    session_start();
    include "../koneksi.php";

    if (isset($_POST['tambah-keranjang'])) {
        $id_produk = $_POST['id_produk'];
        $qty       = $_POST['qty'];

        $query     = "SELECT * FROM produk WHERE id_produk = $id_produk";
        $execute   = $connect->query($query);
        $see       = mysqli_fetch_object($execute);

        // if (empty($_SESSION['cart'][$id_produk])) {
            $_SESSION['cart'][$id_produk] = [
                "nama"     => $see->nama,
                "harga"    => $see->harga,
                // "stok"     => $see->stok,
                "foto"     => $see->foto,
                "qty"      => $qty,
                "subtotal" => $qty * $see->harga,
            ];
        // }else{
        //     $_SESSION['cart'][$id_produk]['qty'] = $qty;
        //     $_SESSION['cart'][$id_produk]['subtotal'] = $_SESSION['cart'][$id_produk]['qty'] * $see->harga;
        // }

        header("location:../views/pesanan/data.php");
    }