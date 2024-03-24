<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Landing</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
   
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.php"><i class="fa-solid fa-photo-film fa-xs"> gallery</i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <?php
                    if (!isset($_SESSION['userid'])) {
                    ?>
                        <a href="register.php" class="btn btn-outline-success m-1">Register</a>
                        <a href="login.php" class="btn btn-outline-success m-1">Login</a>
                    <?php
                    } else {
                    ?>
                        <a class="nav-link" aria-current="page" href="home.php">Home</a>
                        <a class="nav-link" href="album.php">Album</a>
                        <a class="nav-link" href="foto.php">Foto</a>
                        <a class="nav-link" href="logout.php">Logout</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- Content goes here -->

    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
