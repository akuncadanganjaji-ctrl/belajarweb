<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$lokasi = $_POST['lokasi'];
$jenis = $_POST['jenis_kerusakan'];
$deskripsi = $_POST['deskripsi'];

$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

move_uploaded_file($tmp, 'uploads/' . $foto);

$query = "INSERT INTO pengaduan (nama, kelas, lokasi, jenis_kerusakan, deskripsi, foto)
VALUES ('$nama', '$kelas', '$lokasi', '$jenis', '$deskripsi', '$foto')";

if (mysqli_query($conn, $query)) {
    echo "Pengaduan berhasil dikirim <br>";
    echo "<a href='data_pengaduan.php'>Lihat Data</a>";
} else {
    echo "Pengaduan gagal disimpan";
}
?>