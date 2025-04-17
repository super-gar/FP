<?php
include 'config.php';
include 'header.php';

$filter = isset($_GET['kategori']) ? $_GET['kategori'] : '';
$query = "SELECT * FROM barang";
if ($filter) {
    $query .= " WHERE kategori='$filter'";
}
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Data Barang</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="main-content">
  <h1>Data Barang Daur Ulang</h1>
  <a href="tambah.php"><button>+ Tambah Data</button></a>

  <div>
    <label>Filter Kategori:</label>
    <select id="filterKategori" onchange="filterData()">
      <option value="">-- Semua --</option>
      <option value="Plastik">Plastik</option>
      <option value="Kertas">Kertas</option>
      <option value="Logam">Logam</option>
    </select>
  </div>

  <table>
    <tr>
      <th>No</th>
      <th>Nama Barang</th>
      <th>Kategori</th>
      <th>Aksi</th>
    </tr>
    <?php $no=1; while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $row['nama'] ?></td>
      <td><?= $row['kategori'] ?></td>
      <td>
        <a href="detail.php?id=<?= $row['id'] ?>">Detail</a> |
        <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
        <a href="#" onclick="confirmDelete(<?= $row['id'] ?>)">Hapus</a>
      </td>
    </tr>
    <?php } ?>
  </table>
</div>

<script src="js/script.js"></script>
</body>
</html>
