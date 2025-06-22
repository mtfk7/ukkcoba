<?php include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim      = $_POST['nim'];
    $nama     = $_POST['nama'];
    $jurusan  = $_POST['jurusan'];
    $angkatan = $_POST['angkatan'];

    if ($nim && $nama && $jurusan && $angkatan) {
        mysqli_query($conn, "INSERT INTO mahasiswa VALUES ('$nim', '$nama', '$jurusan', $angkatan)");
        header("Location: mahasiswa.php");
    } else {
        echo "Semua field wajib diisi!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Tambah Data Mahasiswa</h1>
</header>
<div class="container">
    <form method="post">
        <label>NIM</label>
        <input type="text" name="nim" required>
        <label>Nama</label>
        <input type="text" name="nama" required>
        <label>Jurusan</label>
        <select name="jurusan" required>
            <option value="">-- Pilih Jurusan --</option>
            <option value="Teknik Informatika">Teknik Informatika</option>
            <option value="Teknik Komputer">Teknik Komputer</option>
            <option value="Teknologi Rekayasa Komputer">Teknologi Rekayasa Komputer</option>
            <option value="Teknik Informatika Multimedia">Teknik Informatika Multimedia</option>
        </select>
        <label>Angkatan</label>
        <input type="number" name="angkatan" required>
        <button type="submit">Simpan</button>
    </form>
</div>
</body>
</html>
