<?php
    session_start();
    include "../koneksi.php";

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // login (berarti punya akun)
        $query = "SELECT * FROM user WHERE username = '$username'";
        $execute    = $connect->query($query);

        // pengecekan user dengan username
        if ($execute->num_rows == 1) {

            // pengecekan user dengan password
            $lihat = mysqli_fetch_assoc($execute);
            // melihat data dari table yang sudah terpilih

            if (password_verify($password, $lihat['password'])) {

                // Setting session user
                $_SESSION['auth'] = [
                    "id_user"  => $lihat['id_user'],
                    "username" => $username,
                    "password" => $password,
                ];

                header("location:../views/produk/data.php");
            }else{
                header("location:../views/auth/login.php");
            }
        }else{
            header("location:../views/auth/login.php");
        }
    }
    
    if(isset($_GET['logout'])){
        session_destroy();
        
        header("location:../views/auth/login.php");
    }
    

    if (isset($_POST['update'])) {
        $id_user  = $_SESSION['auth']['id_user'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password_baru'], PASSWORD_BCRYPT);

        $query = "UPDATE user SET 
                        username = '$username',
                        password = '$password'  
                        WHERE id_user = '$id_user'";

        $connect->query($query);
        header("location:../views/auth/setting.php");
    }

    // THIS WEBSITE CREATE WITH ❤ BY IRFAN FROM BEASTERI