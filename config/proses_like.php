<?php
session_start();
include 'koneksi.php';


if(isset($_GET['fotoid'])) {
    $fotoid = $_GET['fotoid'];
} else {
    
    echo "<script>alert('Foto ID tidak ditemukan'); location.href='../admin/index.php';</script>";
    exit;
}

$userid = $_SESSION['userid'];


$ceksuka = mysqli_query($koneksi,  "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
if(mysqli_num_rows($ceksuka) == 1) {
    while($row = mysqli_fetch_array($ceksuka)) {
        $likeid = $row['likeid'];
        $query = mysqli_query($koneksi, "DELETE FROM likefoto WHERE likeid='$likeid'");
        echo "<script>location.href='../admin/index.php';</script>";
    }
} else {
    $tanggalike = date('Y-m-d');
    $query = mysqli_query($koneksi, "INSERT INTO likefoto VALUES('', '$fotoid', '$userid', '$tanggalike')");

    echo "<script>location.href='../admin/home.php';</script>";
}
?>
