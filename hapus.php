<?php
include 'koneksi.php';

if (isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "DELETE FROM diaz_tbpendaftaran WHERE id = '$id'";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data berhasil dihapus'); window.location.href='data.php';</script>";
    } else {
        echo "Error deleting record: " . mysqli_error($koneksi);
    }
}
?>