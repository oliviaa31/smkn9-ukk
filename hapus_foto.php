<?php
    include "koneksi.php";
    session_start();

    $fotoid=$_GET['fotoid'];

    $sql=mysqli_query($conn,"delete from foto where fotoid='$fotoid'");


    
    if ($sql) {
        echo "<script> 
                        alert('Hapus Foto Berhasil');
                        location.href='foto.php';
                        </script>";
    } else {
        echo "<script> 
                        alert('Hapus Foto Gagal');
                        location.href='foto.php';
                        </script>";
    }