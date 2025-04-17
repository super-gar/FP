function filterTable() {
  const input = document.getElementById("filterInput").value.toLowerCase();
  const rows = document.querySelectorAll("#dataTable tr:not(:first-child)");

  rows.forEach(row => {
      const kategori = row.cells[1].textContent.toLowerCase();
      row.style.display = kategori.includes(input) ? "" : "none";
  });
}

function konfirmasiHapus(id) {
  if (confirm("Yakin ingin menghapus data ini?")) {
      window.location.href = "hapus.php?id=" + id;
  }
}
