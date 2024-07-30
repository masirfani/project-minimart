<?php
    session_start();
    // antisipasi user masuk tanpa login
    if(empty($_SESSION['auth'])){
        header("location:../auth/login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minimart By Beasteri</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
</head>

<body class="bg-light-subtle">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Beasteri</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../produk/data.php">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../auth/setting.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../controllers/Auth.php?logout=true">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    