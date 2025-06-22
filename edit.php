<?php
include 'koneksi.php';
$nim = $_GET['nim'];
$data = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim='$nim'");
$row = mysqli_fetch_assoc($data);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama     = $_POST['nama'];
    $jurusan  = $_POST['jurusan'];
    $angkatan = $_POST['angkatan'];
    mysqli_query($conn, "UPDATE mahasiswa SET nama='$nama', jurusan='$jurusan', angkatan=$angkatan WHERE nim='$nim'");
    header("Location: mahasiswa.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Edit Data Mahasiswa</h1>
</header>
<div class="container">
    <form method="post">
        <label>Nama</label>
        <input type="text" name="nama" value="<?= $row['nama'] ?>" required>
        <label>Jurusan</label>
        <select name="jurusan" required>
            <option value="Teknik Informatika" <?= $row['jurusan']=="Teknik Informatika"?"selected":"" ?>>Teknik Informatika</option>
            <option value="Teknik Komputer" <?= $row['jurusan']=="Teknik Komputer"?"selected":"" ?>>Teknik Komputer</option>
            <option value="Teknologi Rekayasa Komputer" <?= $row['jurusan']=="Teknologi Rekayasa Komputer"?"selected":"" ?>>Teknologi Rekayasa Komputer</option>
            <option value="Teknik Informatika Multimedia" <?= $row['jurusan']=="Teknik Informatika Multimedia"?"selected":"" ?>>Teknik Informatika Multimedia</option>
        </select>
        <label>Angkatan</label>
        <input type="number" name="angkatan" value="<?= $row['angkatan'] ?>" required>
        <button type="submit">Update</button>
    </form>
</div>
</body>
</html>
