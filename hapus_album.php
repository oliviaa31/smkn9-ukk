<?php
include "koneksi.php";
session_start();

$albumid = $_GET['albumid'];

$sql = mysqli_query($conn, "delete from album where albumid='$albumid'");

if ($sql) {
    echo "<script> 
                    alert('Hapus Album Berhasil');
                    location.href='album.php';
                    </script>";
} else {
    echo "<script> 
                    alert('Hapus Album Gagal');
                    location.href='album.php';
                    </script>";
}
