<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

if ($_SESSION['role'] == 'admin') {
    header('Location: dashboard_admin.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Pengaduan</title>
</head>
<body>

<h2>Form Pengaduan Sarana Sekolah TPG4</h2>
<p>Selamat datang, <?php echo $_SESSION['username']; ?></p>

<form action="simpan_pengaduan.php" method="POST" enctype="multipart/form-data">
    Nama : <br>
    <input type="text" name="nama" required><br><br>

    Kelas : <br>
    <input type="text" name="kelas" required><br><br>

    Lokasi Kerusakan : <br>
    <input type="text" name="lokasi" required><br><br>

    Jenis Kerusakan : <br>
    <input type="text" name="jenis_kerusakan" required><br><br>

    Upload Foto : <br>
    <input type="file" name="foto"><br><br>

    Deskripsi Pengaduan : <br>
    <textarea name="deskripsi" required></textarea><br><br>

    <button type="submit">Kirim Pengaduan</button>
</form>

<br>
<a href="data_pengaduan.php">Lihat Data Pengaduan</a>
<br><br>
<a href="logout.php">Logout</a>

</body>
</html>