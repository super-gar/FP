<?php
include 'koneksi.php';
$id = $_GET['id'] ?? '';
$data = ['nama' => '', 'kategori' => ''];

if ($id) {
    $query = $conn->query("SELECT * FROM data WHERE id = $id");
    $data = $query->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];

    if ($id) {
        $conn->query("UPDATE data SET nama='$nama', kategori='$kategori' WHERE id=$id");
    } else {
        $conn->query("INSERT INTO data (nama, kategori) VALUES ('$nama', '$kategori')");
    }
    header("Location: index.php");
}
?>

<form method="post" onsubmit="return validateForm()">
    Nama: <input type="text" name="nama" value="<?= $data['nama'] ?>"><br>
    Kategori: <input type="text" name="kategori" value="<?= $data['kategori'] ?>"><br>
    <button type="submit">Simpan</button>
</form>

<script>
function validateForm() {
    let nama = document.forms[0]["nama"].value;
    let kategori = document.forms[0]["kategori"].value;
    if (nama === "" || kategori === "") {
        alert("Nama dan kategori wajib diisi!");
        return false;
    }
    return true;
}
</script>
