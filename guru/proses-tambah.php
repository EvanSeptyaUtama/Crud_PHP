<?php
include("../db.php");

if (isset($_POST['tambah_data'])) {

  // ambil data dari formulir
  $nama = $_POST['nama'];
  $no_telp = $_POST['no_telp'];
  $mapel_ampuh = $_POST['mapel_ampuh'];

  // buat query
  $sql = "INSERT INTO guru (nama, no_telp, mapel_ampuh) VALUE ('$nama', '$no_telp', '$mapel_ampuh')";
  $query = mysqli_query($koneksi, $sql);

  // apakah query simpan berhasil?
  if ($query) {
    // kalau berhasil alihkan ke halaman index.php dengan status=sukses
    header('Location: list-guru.php?status=sukses');
  } else {
    // kalau gagal alihkan ke halaman indek.php dengan status=gagal
    header('Location: index.php?status=gagal');
  }
} else {
  die("Akses dilarang...");
}
