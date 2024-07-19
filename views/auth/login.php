<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minimart - Login</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
</head>
<body class="bg-light-subtle">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title text-center">Login Minimart</h5>
                        <form action="../../controllers/Auth.php" method="POST">
                            <label for="">Username</label>
                            <input type="text" name="username" class="form-control mb-2">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control mb-2">
                            
                            <button class="btn btn-primary" name="login">Login</button>
                        </form>
                    </div>   
                </div>
            </div>
        </div>
    </div>

    <script src="../../assets/js/bootstrap.min.js"></script>
</body>
</html>