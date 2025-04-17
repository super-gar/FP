<?php
include 'koneksi.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM data WHERE id=$id");
$data = $result->fetch_assoc();
?>

<h1>Detail Data</h1>
<p>Nama: <?= $data['nama'] ?></p>
<p>Kategori: <?= $data['kategori'] ?></p>
<a href="index.php">Kembali</a>
