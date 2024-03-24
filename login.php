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
                            <h4>Halaman Login</h4>
                        </div>
                        <p>Login Ke Akun mu..!</p>
                        <form action="proses_login.php" method="post">
                          
                            <input type="text" name="username" placeholder="Masukkan username kamu..." class="form-control" required>
                           
                            <div class="input-group mt-2"> <!-- Wrap input and icon in input-group -->
                                <input id="passwordInput" type="password" name="password" placeholder="Ketikkan password mu..." class="form-control" required>
                                <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility()">
                                    <i id="togglePasswordIcon" class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="d-grid mt-3">
                                <button class="btn btn-success" type="submit">Login</button>
                            </div>
                        </form>
                        <hr>
                        <p>Belum punya akun ? <a href="register.php" class="text-success">Ayo Register dulu..!!</a><br><a href="index.php" class="text-success">Kembali...</a></p>
                        
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
