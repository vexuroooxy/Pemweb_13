<?php 
include 'koneksi.php'; 

$mahasiswa = mysqli_query($koneksi, "SELECT * FROM diaz_tbmhs");
$kursus = mysqli_query($koneksi, "SELECT * FROM diaz_tbkursus");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Daftar Mahasiswa ke Kursus</title>
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
            <h2>Daftar Mahasiswa ke Kursus</h2>
            <form method="post">
                <label>Pilih Mahasiswa:</label>
                <select name="idNama">  
                <option value="" disabled selected>Pilih Kursus</option>
                    <?php while ($m = mysqli_fetch_assoc($mahasiswa)) : ?>
                        <option value="<?= $m['id'] ?>"><?= $m['nama'] ?></option>
                    <?php endwhile; ?>
                </select>
                <br><br>
                <label>Pilih Kursus:</label>
                <select name="idKursus">
                    <option value="" disabled selected>Pilih Kursus</option>
                    <?php while ($k = mysqli_fetch_assoc($kursus)) : ?>
                        <option value="<?= $k['id'] ?>"><?= $k['kursus'] ?> | <?= $k['durasi'] ?> Jam</option>
                    <?php endwhile; ?>
                </select>
                <br><br>
                <button type="submit" name="daftar">Daftar</button>
            </form>
        </div>
        <?php
            if (isset($_POST['daftar'])) {
                $m_id = $_POST['idNama'];
                $k_id = $_POST['idKursus']; 
                mysqli_query($koneksi, "INSERT INTO diaz_tbpendaftaran (idNama, idKursus) VALUES ('$m_id', '$k_id')");
                echo "<script>alert('Mahasiswa berhasil didaftarkan ke kursus'); 
                    window.location.href='index.php';</script>";
            }
        ?>
    </body>
</html>