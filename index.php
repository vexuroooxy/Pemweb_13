<?php 
include 'koneksi.php'; 

$sql = "SELECT diaz_tbpendaftaran.id, diaz_tbmhs.nama, diaz_tbkursus.kursus, 
        diaz_tbmhs.nim, diaz_tbkursus.durasi, diaz_tbpendaftaran.tglDaftar AS tanggal_daftar
        FROM diaz_tbpendaftaran
        JOIN diaz_tbmhs ON diaz_tbpendaftaran.idNama = diaz_tbmhs.id
        JOIN diaz_tbkursus ON diaz_tbpendaftaran.idKursus = diaz_tbkursus.id";
$result = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Data Pendaftaran Kursus</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
          href="https://fonts.googleapis.com/css2?family=Google+Sans+Flex:opsz,wght@6..144,1..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
          rel="stylesheet"
        />
    </head>
    <body>
        <div class="container">
            <h2>Data Pendaftaran Kursus</h2>
            <div class="button">
                <a href="mhs.php">Tambah Mahasiswa</a>
                <a href="kursus.php">Tambah Kursus</a>
                <a href="pendaftaran.php">Tambah Pendaftaran</a>
            </div>
            <table border="1" cellpadding="10">
                <tr>
                    <th>No</th>
                    <th>Nama Mahasiswa</th>
                    <th>NIM</th>
                    <th>Kursus</th>
                    <th>Durasi Kursus</th>
                    <th>Tanggal Daftar</th>
                    <th>Aksi</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['nim'] ?></td>
                        <td><?= $row['kursus'] ?></td>
                        <td><?= $row['durasi'] ?></td>
                        <td><?= $row['tanggal_daftar'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id'] ?>" class="button-edit">Edit</a> |
                            <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="button-delete">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </body>
</html>