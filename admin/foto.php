<?php
session_start();
include '../config/koneksi.php';


$userid = $_SESSION['userid'];

if (!isset($_SESSION['status']) || $_SESSION['status'] != 'login') {
    echo "<script> 
    alert('Anda belum login!');
    location.href = '../index.php';
    </script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Foto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<style>

    body {
    background-color: #000000;  
    color: #fff;

    } 
  .navbar {
      position: sticky;
      top: 0;
      z-index: 1000;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  }

  .navbar-dark {
      background: linear-gradient(45deg, #ff7a18, #af002d, #320b86);
  }

  .navbar-brand {
      font-size: 24px;
      color: #fff;
      font-weight: bold;
      text-decoration: none;
  }

  .navbar-nav .nav-link {
      color: #fff;
      text-decoration: none;
      font-size: 16px;
      transition: color 0.3s ease;
  }

  .navbar-nav .nav-link:hover {
      color: #ffd700;
  }

  .btn-outline-light {
      background-color: transparent;
      border: 2px solid #fff;
      color: #fff;
      padding: 5px 15px;
      border-radius: 20px;
      font-size: 14px;
      transition: background-color 0.3s ease, color 0.3s ease;
  }

  .btn-outline-light:hover {
      background-color: #fff;
      color: #6f42c1;
  }


  .card {
      background: linear-gradient(45deg, #ff7a18, #af002d, #320b86);
      color: white;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
  }

  .card-header {
      background-color: #320b86;
      color: white;
      font-weight: bold;
  }

  .form-control {
      border-radius: 8px;
      border: 1px solid #ddd;
  }

  .btn-primary {
      background-color: #6f42c1;
      border-color: #6f42c1;
      border-radius: 20px;
  }

  .btn-primary:hover {
      background-color: #5a3e96;
      border-color: #5a3e96;
  }



  .modal-content {
      background: linear-gradient(45deg, #ff7a18, #af002d, #320b86);
      color: white;
  }

  .modal-header {
      background-color: #320b86;
  }

  .modal-footer .btn-primary {
      background-color: #6f42c1;
      border-color: #6f42c1;
  }

  .modal-footer .btn-primary:hover {
      background-color: #5a3e96;
      border-color: #5a3e96;
  }


  footer {
      background-color: #320b86;
      color: white;
      padding: 10px 0;
      text-align: center;
      font-size: 14px;
  }
</style>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="">Web Gallery</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="home.php">Collection</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="album.php">Add Album</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="foto.php">Add Photo</a>
            </li>
        </ul>
        <a href="../config/aksi_logout.php" class="btn btn-outline-light m-1">Keluar</a>
      </div>
    </div>
  </nav>


  <div class="container mt-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card mt-2">
                <div class="card-header">Tambah Foto</div>
                <div class="card-body">
                    <form action="../config/aksi_foto.php" method="POST" enctype="multipart/form-data">
                        <label class="form-label">Judul Foto</label>
                        <input type="text" name="judulfoto" class="form-control" required>
                        <label class="form-label">Deskripsi Foto</label>
                        <textarea class="form-control" name="deskripsifoto" required></textarea>
                        <label class="form-label">Album</label>
                        <select class="form-control" name="albumid" required>
                            <?php 
   
                            $sql_album = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid'");
                            while ($data_album = mysqli_fetch_array($sql_album)) { ?>
                                <option value="<?php echo $data_album['albumid']?>"><?php echo $data_album['namaalbum']?></option>
                            <?php } ?>
                        </select>
                        <label class="form-label">File</label>
                        <input type="file" class="form-control" name="lokasifile" required>
                        <button type="submit" class="btn btn-primary mt-2" name="tambah">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="card mt-2">
                <div class="card-header">Data Foto</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Foto</th>
                                    <th>Nama Foto</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $sql = mysqli_query($koneksi, "SELECT * FROM foto WHERE userid='$userid'");
                                while ($data = mysqli_fetch_array($sql)) {
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><img src="../assets/img/<?php echo $data['lokasifile'] ?>" width="100"></td>
                                    <td><?php echo $data['judulfoto'] ?></td>
                                    <td><?php echo $data['deskripsifoto'] ?></td>
                                    <td><?php echo $data['tanggalunggah'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?php echo $data['fotoid'] ?>">Edit</button>
                                        <div class="modal fade" id="edit<?php echo $data['fotoid'] ?>" tabindex="-1" aria-labelledby="edit<?php echo $data['fotoid'] ?>" aria-hidden="true">
                                            <div class="modal-dialog">
                                                 <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5">Edit Data</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="../config/aksi_foto.php" method="POST" enctype="multipart/form-data">
                                                            <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                                                            <label class="form-label">Judul Foto</label>
                                                            <input type="text" name="judulfoto" value="<?php echo $data['judulfoto'] ?>" class="form-control" required>
                                                            <label class="form-label">Deskripsi</label>
                                                            <textarea class="form-control" name="deskripsifoto" required><?php echo $data['deskripsifoto']; ?></textarea>
                                                            <label class="form-label">Album</label>
                                                            <select class="form-control" name="albumid">
                                                                <?php 
                                                                $sql_album = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid'");
                                                                while ($data_album = mysqli_fetch_array($sql_album)) { ?>
                                                                    <option <?php if ($data_album['albumid'] == $data['albumid']) { ?> selected="selected" <?php } ?> value="<?php echo $data_album['albumid']?>"><?php echo $data_album['namaalbum']?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <label class="form-label">Foto</label>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <img src="../assets/img/<?php echo $data['lokasifile'] ?>" width="100">
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <label class="form-label">Ganti File</label>
                                                                    <input type="file" class="form-control" name="lokasifile">
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="edit" class="btn btn-primary">Edit Data</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['fotoid'] ?>">Hapus</button>
                                        <div class="modal fade" id="hapus<?php echo $data['fotoid'] ?>" tabindex="-1" aria-labelledby="hapus<?php echo $data['fotoid'] ?>" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5">Hapus Data</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="../config/aksi_foto.php" method="POST">
                                                            <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                                                            Apakah anda yakin untuk menghapus data ini <strong><?php echo $data['judulfoto']?></strong>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="hapus" class="btn btn-primary">Hapus Data</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>    
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

  

 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>
</html>
