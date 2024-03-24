<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Landing</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>


<body class="bg-success">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body rounded">
                        <div>
                            <h4>Halaman Register</h4>
                        </div>
                        <p>Buat Akun mu..!</p>
                        <form action="proses_register.php" method="post">
                            <div class="mb-2">
                                <input type="text" name="username" placeholder="Username..." class="form-control" required>
                            </div>
                            <div class="mb-2">
                                <div class="input-group"> 
                                    <input id="passwordInput" type="password" name="password" placeholder="Password..." class="form-control" required>
                                    <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility()">
                                        <i id="togglePasswordIcon" class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="mb-2">
                                <input type="email" name="email" placeholder="Email..." class="form-control" required>
                            </div>
                            <div class="mb-2">
                                <input type="text" name="namalengkap" placeholder="Nama Lengkap..." class="form-control" required>
                            </div>
                            <div class="mb-2">
                                <input type="text" name="alamat" placeholder="Alamat..." class="form-control" required>
                            </div>
                            <div class="d-grid mt-3">
                                <button class="btn btn-success" type="submit">Register</button>
                            </div>
                        </form>
                        <hr>
                        <p>Sudah punya akun? <a href="login.php" class="text-success">Kembali ke halaman Login..</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/bootstrap.min.js"></script>
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("passwordInput");
            var togglePasswordIcon = document.getElementById("togglePasswordIcon");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                togglePasswordIcon.classList.remove("fa-eye");
                togglePasswordIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                togglePasswordIcon.classList.remove("fa-eye-slash");
                togglePasswordIcon.classList.add("fa-eye");
            }
        }
    </script>
</body>

</html>
