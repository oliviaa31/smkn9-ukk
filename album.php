 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Landing</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <style>
    /* Atur lebar maksimum tabel agar dapat scroll pada layar kecil */
    .table-responsive {
        overflow-x: auto;
    }

    /* Atur ukuran font agar sesuai di perangkat seluler */
    @media (max-width: 576px) {
        .table-responsive {
            font-size: 0.860rem; /* Sesuaikan ukuran font untuk layar kecil */
        }
    }

    /* Atur tampilan tabel menjadi blok pada layar kecil */
    @media (max-width: 576px) {
        .table-responsive table {
            width: 100%; /* Lebar tabel menjadi 100% pada layar kecil */
        }
    }
</style>


</head>

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
                    session_start();
                    if (!isset($_SESSION['userid'])) {
                    ?>
                        <a href="register.php" class="btn btn-outline-primary m-1">Register</a>
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
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Tambah Data
        </button>
        <div class="card mt-2">
            <div class="card-header text-bg-success">Data Album</div>
            <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Tanggal dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "koneksi.php";
                        $userid = $_SESSION['userid'];
                        $no = 1;
                        $sql = mysqli_query($conn, "select * from album where userid='$userid'");
                        while ($data = mysqli_fetch_array($sql)) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['namaalbum'] ?></td>
                                <td><?= $data['deskripsi'] ?></td>
                                <td><?= $data['tanggaldibuat'] ?></td>
                                <td>
                                    <a href="hapus_album.php?albumid=<?= $data['albumid'] ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                    <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $no ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                </td>
                            </tr>

                            <!-- Modal edit-->
                            <div class="modal fade" id="edit<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit album</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="update_album.php" method="post">
                                            <input type="text" name="albumid" value="<?= $data['albumid'] ?>" hidden>
                                            <div class="modal-body">
                                                <label class="form-label">Nama Album</label>
                                                <input type="text" name="namaalbum" class="form-control" value="<?= $data['namaalbum'] ?>">
                                                <label class="form-label">Deskripsi</label>
                                                <input type="text" name="deskripsi" class="form-control" value="<?= $data['deskripsi'] ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">Ubah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
                        </div>

    <!-- Modal tambah-->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah album</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="tambah_album.php" method="post">
                    <div class="modal-body">
                        <label class="form-label">Nama Album</label>
                        <input type="text" name="namaalbum" class="form-control" required>
                        <label class="form-label">Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- <footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
        <p>UKK 2024</p>
    </footer> -->

    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script>
        new DataTable('#example');
    </script>
</body>

</html>