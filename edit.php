<?php

include("db.php");

// kalau tidak ada id di query string
if (!isset($_GET['id'])) {
  header('Location: list-siswa.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM siswa WHERE id=$id";
$query = mysqli_query($koneksi, $sql);
$siswa = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if (mysqli_num_rows($query) < 1) {
  die("data tidak ditemukan...");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Siswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
  <div class="container">
    <header>
      <h3>Pendaftaran Siswa Baru</h3>
      <h1>Sekolah Dasar Santo Frasiskus Asissi Sangatta</h1>
    </header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">WEB</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="list-siswa.php">List Daftar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="form-daftar.php">Daftar Baru</a>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
  </div>
  <div class="container">
    <div class="row mt-4">
      <div class="col">
        <a href="list-siswa.php" class="btn btn-sm btn-secondary">List Daftar</a>
        <a href="index.php" class="btn btn-sm btn-secondary">Kembali</a>
      </div>
    </div>
    <div class="row mt-2">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h3>Data Siswa</h3>
          </div>
          <div class="card-body">
            <h4>Form Ubah Siswa</h4>
            <form action="update-proses.php" method="POST">
              <input type="hidden" name="id" value="<?php echo $siswa['id'] ?>" />
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" value="<?php echo $siswa['nama'] ?>">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" value="<?php echo $siswa['alamat'] ?>">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Kelas</label>
                <input type="text" class="form-control" name="kelas" value="<?php echo $siswa['kelas'] ?>">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" name="no_telp" value="<?php echo $siswa['no_telp'] ?>">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Usia</label>
                <input type="number" class="form-control" name="usia" value="<?php echo $siswa['usia'] ?>">
              </div>
              <div class="mb-3">
                <input type="submit" class="btn btn-sm btn-primary" value="Ubah" name="simpan" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>