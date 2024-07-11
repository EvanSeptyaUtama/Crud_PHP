<?php

include("../db.php");

// kalau tidak ada id di query string
if (!isset($_GET['id'])) {
  header('Location: list-guru.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM guru WHERE id=$id";
$query = mysqli_query($koneksi, $sql);
$guru = mysqli_fetch_assoc($query);

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
  <title>Daftar Guru</title>
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
        <a href="list-guru.php" class="btn btn-sm btn-secondary">List Daftar</a>
      </div>
    </div>
    <div class="row mt-2">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h3>Daftar Ubah Guru</h3>
          </div>
          <div class="card-body">
            <h4>Form Data Guru</h4>
            <form action="edit_proses.php" method="POST">
              <input type="hidden" name="id" value="<?php echo $guru['id'] ?>" />
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" value="<?php echo $guru['nama'] ?>">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" name="no_telp" value="<?php echo $guru['no_telp'] ?>">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Mata Pelajaran Ampuh</label>
                <input type="text" class="form-control" name="mapel_ampuh" value="<?php echo $guru['mapel_ampuh'] ?>">
              </div>

              <div class="mb-3">
                <input type="submit" class="btn btn-sm btn-primary" value="Save" name="edit_data" />
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