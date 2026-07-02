<?php
session_start();
require_once "../koneksi.php"; // Pastikan path ke file koneksi benar

if (isset($_POST['submit'])) {
    $id = $_POST['id_user'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $status = $_POST['status']; // 1. Tangkap data status dari modal edit

    // 2. Tambahkan status='$status' di dalam query UPDATE kamu
    $query = "UPDATE users SET 
                username = '$username', 
                password = '$password', 
                nama_lengkap = '$nama_lengkap',
                status = '$status' 
              WHERE id = '$id'";

    if (mysqli_query($conn, $query)) {
        header("Location: ../user.php"); // Kembalikan ke halaman user.php
        exit();
    } else {
        echo "Gagal memperbarui data: " . mysqli_error($conn);
    }
}
?>