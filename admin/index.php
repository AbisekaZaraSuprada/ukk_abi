  <?php
  session_start();
  include '../config/koneksi.php';
  $userid = $_SESSION['userid'];
  if ($_SESSION['status'] != 'login') {
    echo "<script>
      alert('Anda Belum Login!');
      location.href='../index.php';
      </script>";
  }

  ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Galeri Foto</title>
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


      @media (max-width: 768px) {
        .navbar .container {
          flex-direction: column;
          align-items: flex-start;
        }


        .navbar-toggler-icon {
          background-color: #fff; 
        }


        .navbar-nav {
          flex-direction: column;
        }

        .navbar-nav .nav-item {
          margin-bottom: 10px;
        }

      
        .btn-outline-light {
          width: 100%;
          text-align: center;
        }
      }

  
.card {
    background: linear-gradient(45deg, #ff7a18, #af002d, #320b86);
    border: none;  
    color: #fff;  
}


.modal-content {
    background: linear-gradient(45deg, #ff7a18, #af002d, #320b86);
    color: #fff;  /
}


.modal-header {
    border-bottom: 1px solid #fff;  
}


.modal-footer {
    background-color: transparent;
    border-top: 1px solid #fff;  
}


    </style>
  </head>

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
  </style>

  <body>
    <div class="container mt-3">
      <div class="row">
        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM foto INNER JOIN user ON foto.userid=user.userid INNER JOIN album ON foto.albumid=album.albumid");
        while ($data = mysqli_fetch_array($query)) {
          ?>
          <div class="col-md-3 d-flex justify-content-center align-items-stretch">
            <div class="card mb-4" style="width: 18rem;">
              <a class="" type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid'] ?>">
          <img src="../assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="" style="height<?php echo $data['judulfoto'] ?>: 12rem;">
              </a>    
              <div class="card-footer text-center">
                <?php
                $fotoid = $data['fotoid'];
                $ceksuka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
                if (mysqli_num_rows($ceksuka) == 1) { ?>
                  <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit" name="suka"><i
                      class="fa fa-heart"></i></a>
                <?php } else { ?>
                  <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit" name="suka"><i
                      class="fa-regular fa-heart"></i></a>
                <?php }
                $like = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                echo mysqli_num_rows($like) . ' Suka';
                ?>
                <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid'] ?>"><i
                    class="fa-regular fa-comment"></i></a>
                <?php
                $jmlkomen = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE fotoid='$fotoid'");
                echo mysqli_num_rows($jmlkomen) . ' Komentar';
                ?>
            
              </div>
            </div>
               

            <div class="modal fade" id="komentar<?php echo $data['fotoid'] ?>" tabindex="-1"
              aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-8">
                        <img src="../assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top"
                          title="<?php echo $data['judulfoto'] ?>">
                      </div>
                      <div class="col-md-4">
                        <div class="m-2">
                          <div class="overflow-auto">
                            <div class="sticky-top">
                              <strong><?php echo $data['judulfoto'] ?></strong><br>
                              <span class="badge bg-secondary"><?php echo $data['userid'] ?></span>
                              <span class="badge bg-secondary"><?php echo $data['namalengkap'] ?></span>
                              <span class="badge bg-primary"><?php echo $data['namaalbum'] ?></span>
                            </div>
                            <hr>
                            <p align="left">
                              <?php echo $data['deskripsifoto'] ?>
                            </p>
                            <hr>
                            <?php
                            $komentar = mysqli_query($koneksi, "SELECT * FROM komentarfoto INNER JOIN user ON komentarfoto.userid=user.userid WHERE fotoid='$fotoid'");
                            while ($row = mysqli_fetch_array($komentar)) {
                              ?>
                              <p align="left">
                              <div class="d-flex justify-content-between">
                                <strong><?php echo $row['namalengkap'] ?></strong>
                                <?php echo $row['isikomentar'] ?>
                                <a href="../config/proses_hapus_komentar.php?komentarid=<?php echo $row['komentarid'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                            </div>
                              </p>
                            <?php } ?>
                            <hr>
                            <div class="sticky-bottom">
                              <form action="../config/proses_komentar.php" method="POST">
                                <div class="input-group">
                                  <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                                  <input type="text" name="isikomentar" class="form-control" placeholder="Tambah Komentar" required>
                                  <div class="input-group-prepend">
                                    <button type="submit" name="kirimkomentar"
                                      class="btn btn-outline-primary">Kirim</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        <?php } ?>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
  </body>

  </html>