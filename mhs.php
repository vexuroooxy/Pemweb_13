<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Tambah Mahasiswa Baru</title>
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
            <h2>Tambah Mahasiswa Baru</h2>
            <form method="post">
                <label>Nama:</label>
                <input type="text" name="nama" placeholder="Nama Lengkap" required>
                <label>NIM:</label>
                <input type="text" name="nim" placeholder="NIM" required>
                <button type="submit" name="add_mhs">Tambah</button>
            </form>
        </div>
        <?php
            if (isset($_POST['add_mhs'])) {
                $nama = $_POST['nama'];
                $nim = $_POST['nim'];
                mysqli_query($koneksi, "INSERT INTO diaz_tbmhs (nama, nim) VALUES ('$nama', '$nim')");
                echo "<script>alert('Mahasiswa Baru Berhasil Ditambahkan');
                window.location.href='kursus.php';</script>";
            }
        ?>
    </body>
</html>
