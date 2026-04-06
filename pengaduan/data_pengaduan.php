<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$data = mysqli_query($conn, "SELECT * FROM pengaduan ORDER BY id DESC");
?>

<h2>Data Pengaduan</h2>

<?php if ($_SESSION['role'] == 'user') { ?>
    <a href="form_pengaduan.php">
        <button>Tambah Pengaduan</button>
    </a>
    <br><br>
<?php } ?>

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Lokasi</th>
        <th>Jenis Kerusakan</th>
        <th>Deskripsi</th>
        <th>Foto</th>
        <th>Status</th>

        <?php if ($_SESSION['role'] == 'admin') { ?>
            <th>Aksi</th>
        <?php } ?>
    </tr>

    <?php
    $no = 1;
    while ($row = mysqli_fetch_assoc($data)) {
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row['nama']; ?></td>
        <td><?php echo $row['kelas']; ?></td>
        <td><?php echo $row['lokasi']; ?></td>
        <td><?php echo $row['jenis_kerusakan']; ?></td>
        <td><?php echo $row['deskripsi']; ?></td>
        <td>
            <?php if (!empty($row['foto'])) { ?>
                <img src="uploads/<?php echo $row['foto']; ?>" width="100">
            <?php } else { ?>
                Tidak ada foto
            <?php } ?>
        </td>
        <td><?php echo $row['status']; ?></td>

        <?php if ($_SESSION['role'] == 'admin') { ?>
        <td>
            <a href="ubah_status.php?id=<?php echo $row['id']; ?>&status=Menunggu">Menunggu</a>
            <br><br>

            <a href="ubah_status.php?id=<?php echo $row['id']; ?>&status=Diproses">Diproses</a>
            <br><br>

            <a href="ubah_status.php?id=<?php echo $row['id']; ?>&status=Selesai">Selesai</a>
            <br><br>

            <a href="hapus_pengaduan.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">
                Hapus
            </a>
        </td>
        <?php } ?>
    </tr>
    <?php } ?>
</table>

<br>

<br><br>

<a href="logout.php">
    <button>Logout</button>
</a>