<?php
include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);  
$email = $_POST['email'];
$namalengkap = $_POST['namalengkap'];
$alamat = $_POST['alamat'];


$sql = mysqli_query($koneksi, "INSERT INTO user (username, password, email, namalengkap, alamat) 
    VALUES ('$username', '$password', '$email', '$namalengkap', '$alamat')");

if ($sql) {
    echo "<script>
        alert('Pendaftaran akun berhasil');
        location.href='../login.php';
    </script>";
} else {
    echo "<script>
        alert('Pendaftaran akun gagal');
        location.href='../register.php';
    </script>";
}
?>
