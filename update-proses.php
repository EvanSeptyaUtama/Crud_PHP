<?php
include("db.php");

// cek apakah tombol simpan sudah diklik atau blum?
if (isset($_POST['simpan'])) {

  // ambil data dari formulir
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $kelas = $_POST['kelas'];
  $no_telp = $_POST['no_telp'];
  $usia = $_POST['usia'];

  // buat query update
  $sql = "UPDATE siswa SET nama='$nama', alamat='$alamat', kelas='$kelas', no_telp='$no_telp', usia='$usia' WHERE id=$id";
  $query = mysqli_query($koneksi, $sql);

  // apakah query update berhasil?
  if ($query) {
    // kalau berhasil alihkan ke halaman list-siswa.php
    header('Location: list-siswa.php?status=sukses_edit');
  } else {
    // kalau gagal tampilkan pesan
    die("Gagal menyimpan perubahan...");
  }
} else {
  die("Akses dilarang...");
}
