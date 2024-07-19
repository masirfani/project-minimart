<?php
    // buat koneksi ke database
    $connect = mysqli_connect("localhost", "root", "", "project_minimart");

    // ubah parameter "project_minimart" menjadi database yang anda buat

    function formatRupiah($amount) {
        return 'Rp' . number_format($amount, 0, ',', '.');
    }

    // THIS WEBSITE CREATE WITH ❤ BY IRFAN FROM BEASTERI