<?php include("db.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pendaftaran Siswa Baru | SD ASISSI SANGATTA</title>
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
  <div class="container mt-2">
    <header>
      <h3>Siswa Yang Telah Mendaftar</h3>
    </header>

    <nav>
      <a href="form-daftar.php" class="btn btn-sm btn-primary">+ Tambah Data</a>
      <a href="index.php" class="btn btn-sm btn-secondary">Kembali</a>
    </nav>

    <br>
    <div class="row">
      <div class="col">
        <?php if (isset($_GET['status'])) : ?>
          <p>
            <?php
            if ($_GET['status'] == 'sukses') {
              echo "Pendaftaran siswa baru berhasil!";
            } elseif ($_GET['status'] == 'sukses_edit') {
              echo "Berhasil mengubah data!!";
            } else {
              echo "Pendaftaran gagal!";
            }
            ?>
          </p>
        <?php endif; ?>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-body">

            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Kelas</th>
                  <th>No. Telepon</th>
                  <th>Usia</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>

                <?php
                $sql = "SELECT * FROM siswa";
                $query = mysqli_query($koneksi, $sql);

                while ($siswa = mysqli_fetch_array($query)) {
                  echo "<tr>";

                  echo "<td>" . $siswa['id'] . "</td>";
                  echo "<td>" . $siswa['nama'] . "</td>";
                  echo "<td>" . $siswa['alamat'] . "</td>";
                  echo "<td>" . $siswa['kelas'] . "</td>";
                  echo "<td>" . $siswa['no_telp'] . "</td>";
                  echo "<td>" . $siswa['usia'] . "</td>";

                  echo "<td>";
                  echo "<a href='edit.php?id=" . $siswa['id'] . "' class='btn btn-sm btn-warning'>Edit</a>";
                  echo "<a href='hapus.php?id=" . $siswa['id'] . "' class='btn btn-sm btn-danger' >Hapus</a>";
                  echo "</td>";

                  echo "</tr>";
                }
                ?>

              </tbody>
            </table>
            <p>Total: <?php echo mysqli_num_rows($query) ?></p>
          </div>
        </div>
      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>