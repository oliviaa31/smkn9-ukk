<?php
include "koneksi.php";
session_start();
$userid = $_SESSION['userid'];
if (!isset($_SESSION['userid'])) {
    header("location:login.php");
}
?>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Landing</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>
<style>
    /* Tambahkan efek hover untuk card */
    .card:hover {
        transform: scale(1.05); /* Mengubah skala gambar saat hover */
        transition: transform 0.3s ease; /* Animasi transisi */
    }

    /* Tambahkan efek hover untuk gambar */
    .card-img-top:hover {
        transform: scale(1.0); /* Mengubah skala gambar saat hover */
        transition: transform 0.3s ease; /* Animasi transisi */
    }
    .card {
        border-radius: 10px; /* Atur radius sudut card */
        overflow: hidden; /* Pastikan konten tidak keluar dari card */
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg bg-success">
        <div class="container">
            <a class="navbar-brand" href="home.php"><i class="fa-solid fa-images fa-xl" style="color: #ffffff;"></i></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav me-auto">
                    <?php
                    if (!isset($_SESSION['userid'])) {
                    ?>
                        <a href="register.php" class="btn btn-outline-primary  m-1">Register</a>
                        <a href="login.php" class="btn btn-outline-primary m-1">Login</a>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="album.php">Album</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="foto.php">Foto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="logout.php">Logout</a>
                        </li>
                    <?php
                    }
                    ?>
                </div>

            </div>
        </div>
    </nav>
    <div class="container mt-3">
        <div class="row">
            <?php
            $sql = mysqli_query($conn, "SELECT * from foto INNER JOIN user ON foto.userid=user.userid INNER JOIN album ON foto.albumid=album.albumid");
            while ($data = mysqli_fetch_array($sql)) {
            ?>
                <div class="col-md-3">
                    <a type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid'] ?>">
                        <div class="card">
                            <img src="gambar/<?= $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>" style="height: 12rem;" alt="">
                           
                               
                                
                          
                        </div>
                    </a>

                    <!-- modal komentar -->
                    <div class="modal fade" id="komentar<?php echo $data['fotoid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <img src="gambar/<?= $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>">
                                            <a href="download.php?fotoid=<?php echo $data['fotoid'] ?>" class="btn btn-success mt-2">Simpan Foto</a>
                                        </div>
                                        
                                        
                                        <div class="col-md-4">
                                            <div class="m-2">
                                                <div class="overflow-auto">
                                                    <div class="sticky-top">
                                                        <strong><?php echo $data['judulfoto'] ?></strong><br>
                                                        <p>Pengunggah Gambar : <span class="badge bg-secondary"><?php echo $data['namalengkap'] ?></span></p>
                                                        <p>Tanggal Unggah : <span class="badge bg-secondary"><?php echo $data['tanggalunggah'] ?></span></p>
                                                        <p>Nama Album : <span class="badge bg-secondary"><?php echo $data['namaalbum'] ?></span>
                                                    </div>
                                                    
                                                    <hr>
                                                    <p align="left">
                                                        <strong>Deskripsi Gambar</strong><br>
                                                        <?php echo $data['deskripsifoto'] ?>
                                                    </p>
                                                    <hr>
                                                    
                                                   
                                                    <div class="card-footer text-center">
                                <?php
                                $fotoid = $data['fotoid'];
                                $ceksuka = mysqli_query($conn, "select * from likefoto where fotoid='$fotoid' and userid='$userid'");
                                if (mysqli_num_rows($ceksuka) == 1) { ?>
                                    <a href="like.php?fotoid=<?= $data['fotoid'] ?>" name="batalsuka"><i class="fa-solid fa-heart" style="color: #d91717;"></i></a>
                                <?php } else { ?>
                                    <a href="like.php?fotoid=<?= $data['fotoid'] ?>" name="suka"><i class="fa-regular fa-heart" style="color: #22723a;"></i></a>
                                <?php }
                                $like = mysqli_query($conn, "select * from likefoto where fotoid='$fotoid'");
                                echo mysqli_num_rows($like) . ' Suka';
                                ?>
                               
                               
                                       
                            </div>
                            <hr>
                                                   

                                                    <?php
                                                    $fotoid = $data['fotoid'];
                                                    $komentar = mysqli_query($conn, "SELECT * FROM komentarfoto INNER JOIN user ON komentarfoto.userid=user.userid WHERE komentarfoto.fotoid='$fotoid'");
                                                    while ($row = mysqli_fetch_array($komentar)) {
                                                    ?>
                                                        <p align="left">
                                                            <strong><?= $row['namalengkap'] ?></strong>
                                                            <?= $row['isikomentar'] ?>
                                                        </p>
                                                        
                                                    <?php } ?>
                                                    <hr>
                                                    <div class="sticky-bottom">
                                                        <form action="tambah_komentar.php" method="post">
                                                            <input type="text" name="fotoid" value="<?= $data['fotoid'] ?>" hidden>
                                                            <input type="text" name="isikomentar" class="form-control mt-2" placeholder="Tambah Komentar">
                                                            <div class="input-group">
                                                                <button type="submit" class="btn btn-success mt-2">Kirim</button>
                                                                
                    </div>
                    
             </form>
        </div>
    </div>
    </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
            <?php
            }
            ?>
        </div>
    </div>


    <!-- <footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
        <p>&copy; web galeri foto</p>
    </footer> -->

    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>