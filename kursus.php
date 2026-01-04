<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Tambah Kursus Baru</title>
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
            <h2>Tambah Kursus Baru</h2>
            <form method="post">
                <label>Nama Kursus:</label>
                <select name="kursus" id="kursus">
                    <option value="" disabled selected>Pilih Kursus</option>
                    <option value="Web Development">Web Development</option>
                    <option value="Data Science">Data Science</option>
                    <option value="Digital Marketing">Digital Marketing</option>
                    <option value="Graphic Design">Graphic Design</option>
                    <option value="Cybersecurity">Cybersecurity</option>
                </select>
                <label>Durasi Kursus:</label>
                <input type="number" name="durasi" placeholder="Durasi Kursus(Jam)" required>
                <button type="submit" name="add_kursus">Tambah</button>
            </form>
        </div>
        <?php
            if (isset($_POST['add_kursus'])) {
                $kursus = $_POST['kursus'];
                $durasi = $_POST['durasi'];

                mysqli_query($koneksi, "INSERT INTO diaz_tbkursus (kursus, durasi) VALUES ('$kursus', '$durasi')");
                echo "Kursus baru berhasil ditambahkan.";
                echo "<script>alert('Kursus Baru Berhasil Ditambahkan');
                window.location.href='pendaftaran.php';</script>";
            }
        ?>
    </body>
</html>