<?php
include 'koneksi.php';
$id = $_GET['id'];
$result = mysqli_query($koneksi, "SELECT * FROM diaz_tbpendaftaran WHERE id = $id");
$data = mysqli_fetch_assoc($result);
$mahasiswa = mysqli_query($koneksi, "SELECT * FROM diaz_tbmhs");
$kursus = mysqli_query($koneksi, "SELECT * FROM diaz_tbkursus
");
if (isset($_POST['update'])) {
    $m_id = $_POST['idNama'];
    $k_id = $_POST['idKursus'];
    mysqli_query($koneksi, "UPDATE diaz_tbpendaftaran SET idNama = '$m_id', idKursus = '$k_id' WHERE id = $id");
    echo "<script>alert('Data Pendaftaran Berhasil Diperbarui');
    window.location.href='index.php';</script>";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Data Pendaftaran</title>
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
            <h2>Edit Data Pendaftaran</h2>
            <form method="post">
                <label>Pilih Mahasiswa:</label>
                <select name="idNama">
                    <?php while ($m = mysqli_fetch_assoc($mahasiswa)) : ?>
                        <option value="<?= $m['id'] ?>" <?= $m['id'] == $data['idNama'] ? 'selected' : '' ?>>
                            <?= $m['nama'] ?></option>
                    <?php endwhile; ?>
                </select>
                <br><br>
                <label>Pilih Kursus:</label>
                <select name="idKursus">
                    <?php while ($k = mysqli_fetch_assoc($kursus)) : ?>
                        <option value="<?= $k['id'] ?>" <?= $k['id'] == $data['idKursus'] ? 'selected' : '' ?>>
                                <?= $k['kursus'] ?> | <?= $k['durasi'] ?> Jam</option>
                    <?php endwhile; ?>
                </select>
                <br><br>

                <button type="submit" name="update">Update</button>
            </form>
        </div>
    </body>
</html>
