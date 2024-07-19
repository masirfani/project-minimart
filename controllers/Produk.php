<?php
    include "../koneksi.php";

    // INSERT / CREATE DATA
    if (isset($_POST['create'])) {
        $nama  = $_POST['nama'];
        $harga = $_POST['harga'];
        $stok  = $_POST['stok'];

        // upload foto
        $foto  = "";
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
            $foto = uploadAndConvertImage($_FILES['foto']);
        }

        $query = "INSERT INTO produk VALUES(NULL, '$nama','$harga','$stok','$foto')";

        $connect->query($query);

        header("location:../views/product/data.php");
    }

    // UPDATE DATA
    if (isset($_POST['update'])) {
        $id_produk = $_POST['id_produk'];
        $foto_lama = $_POST['foto_lama'];
        $nama      = $_POST['nama'];
        $harga     = $_POST['harga'];
        $stok      = $_POST['stok'];

        // upload foto
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
            unlink("../assets/uploads/produk/$foto_lama");
            $foto = uploadAndConvertImage($_FILES['foto']);
            $query = "UPDATE produk SET 
                        nama = '$nama',
                        harga = '$harga',
                        stok = '$stok',  
                        foto = '$foto'  
                        WHERE id_produk = $id_produk";
        }else{
            $query = "UPDATE produk SET 
                        nama = '$nama',
                        harga = '$harga',
                        stok = '$stok'
                        WHERE id_produk = $id_produk";
        }

        $connect->query($query);

        header("location:../views/product/data.php");
    }
    
    // DELETE DATA
    if(isset($_GET['delete'])){
        $id_produk = $_GET['delete'];
        $foto      = $_GET['foto'];

        unlink("../assets/uploads/produk/$foto");
        $query = "DELETE FROM produk WHERE id_produk = $id_produk";
    
        $connect->query($query);
    
        header("location:../views/product/data.php");
    }


    function uploadAndConvertImage($file)
    {
        $target_dir = "../assets/uploads/produk/";
        $tipe_foto = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
        $nama_baru = uniqid() . '.webp';
        $target_file = $target_dir . $nama_baru;

        // cek file adalah foto
        $check = getimagesize($file["tmp_name"]);
        if ($check === false) {
            return null;
        }

        // rubah foto jadi WebP
        switch ($tipe_foto) {
            case 'jpeg':
            case 'jpg':
                $image = imagecreatefromjpeg($file["tmp_name"]);
                break;
            case 'png':
                $image = imagecreatefrompng($file["tmp_name"]);
                break;
            case 'gif':
                $image = imagecreatefromgif($file["tmp_name"]);
                break;
            default:
                return null;
        }

        // Simpan ke webp, param 100 adalah tingkat kompresinya semakin sedikit semakin tinggi kompresinya
        imagewebp($image, $target_file, 100);
        imagedestroy($image);

        return $nama_baru;
    }


        // THIS WEBSITE CREATE WITH ❤ BY IRFAN FROM BEASTERI
