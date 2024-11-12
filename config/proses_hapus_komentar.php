<?php
session_start();
include 'koneksi.php';


if ($_SESSION['status'] != 'login') {
  echo "<script>
    alert('Anda Belum Login!');
    location.href='../index.php';
  </script>";
}


if (isset($_GET['komentarid'])) {
  $komentarid = $_GET['komentarid'];
  $userid = $_SESSION['userid'];


  $cek_komentar = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE komentarid = '$komentarid'");
  $data_komentar = mysqli_fetch_array($cek_komentar);

  if ($data_komentar['userid'] == $userid) {
  
    $hapus = mysqli_query($koneksi, "DELETE FROM komentarfoto WHERE komentarid = '$komentarid'");

    if ($hapus) {
      echo "<script>
        alert('Komentar berhasil dihapus!');
        location.href='../admin/index.php'; // Kembali ke halaman admin setelah menghapus
      </script>";
    } else {
      echo "<script>
        alert('Gagal menghapus komentar.');
        location.href='../admin/index.php'; // Kembali ke halaman admin jika gagal
      </script>";
    }
  } else {
    echo "<script>
      alert('Anda tidak dapat menghapus komentar ini.');
      location.href='../admin/index.php'; // Kembali ke halaman admin
    </script>";
  }
} else {
  echo "<script>
    alert('Komentar tidak ditemukan!');
    location.href='../admin/index.php'; // Kembali ke halaman admin jika komentar tidak ada
  </script>";
}
?>
