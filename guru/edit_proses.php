<?php
include("../db.php");

// cek apakah tombol simpan sudah diklik atau blum?
if (isset($_POST['edit_data'])) {

  // ambil data dari formulir
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $no_telp = $_POST['no_telp'];
  $mapel_ampuh = $_POST['mapel_ampuh'];

  // buat query update
  $sql = "UPDATE guru SET nama='$nama', no_telp='$no_telp', mapel_ampuh='$mapel_ampuh' WHERE id=$id";
  $query = mysqli_query($koneksi, $sql);

  // apakah query update berhasil?
  if ($query) {
    // kalau berhasil alihkan ke halaman list-siswa.php
    header('Location: list-guru.php?status=sukses_edit');
  } else {
    // kalau gagal tampilkan pesan
    die("Gagal menyimpan perubahan...");
  }
} else {
  die("Akses dilarang...");
}
