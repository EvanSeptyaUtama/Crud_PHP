<?php
include("db.php");

if (isset($_POST['daftar'])) {

  // ambil data dari formulir
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $kelas = $_POST['kelas'];
  $no_telp = $_POST['no_telp'];
  $usia = $_POST['usia'];

  // buat query
  $sql = "INSERT INTO siswa (nama, alamat, kelas, no_telp, usia) VALUE ('$nama', '$alamat', '$kelas', '$no_telp', '$usia')";
  $query = mysqli_query($koneksi, $sql);

  // apakah query simpan berhasil?
  if ($query) {
    // kalau berhasil alihkan ke halaman index.php dengan status=sukses
    header('Location: list-siswa.php?status=sukses');
  } else {
    // kalau gagal alihkan ke halaman indek.php dengan status=gagal
    header('Location: index.php?status=gagal');
  }
} else {
  die("Akses dilarang...");
}
