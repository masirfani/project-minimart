<?php include "../templates/header.php" ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="d-flex align-items-baseline justify-content-between">
                <h3>Setting Profile</h3>
            </div>
            <div class="card shadow-sm mt-3 mb-5">
                <div class="card-body">
                    <form action="../../controllers/Auth.php" method="POST">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control mb-2" required value="<?= $_SESSION['auth']['username'] ?>" placeholder="Masukkan Username...">
                        
                        <label>Password Baru</label>
                        <input type="password" name="password_baru" class="form-control mb-2" required placeholder="Masukkan Password..." id="passwordBaru">
                        
                        <label>Konfirmasi Password Baru</label>
                        <input type="password" name="konfirmasi_password" class="form-control mb-2" required placeholder="Masukkan Konfirmasi Password..." id="konfirmasiPassword">
                        
                        <button class="btn btn-primary btn-sm" name="update" id="submitBtn" disabled>Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "../templates/footer.php" ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#passwordBaru, #konfirmasiPassword').on('keyup', function() {
            const passwordBaru = $('#passwordBaru').val();
            const konfirmasiPassword = $('#konfirmasiPassword').val();
            const passwordAlert = $('#passwordAlert');
            const submitBtn = $('#submitBtn');

            if (passwordBaru === konfirmasiPassword && passwordBaru !== '') {
                $('#passwordBaru').addClass('is-valid');
                $('#konfirmasiPassword').addClass('is-valid');
                $('#passwordBaru').removeClass('is-invalid');
                $('#konfirmasiPassword').removeClass('is-invalid');
                submitBtn.prop('disabled', false);
            } else {
                $('#passwordBaru').addClass('is-invalid');
                $('#konfirmasiPassword').addClass('is-invalid');
                $('#passwordBaru').removeClass('is-valid');
                $('#konfirmasiPassword').removeClass('is-valid');
                submitBtn.prop('disabled', true);
            }
        });
    });
</script>
