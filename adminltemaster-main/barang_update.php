<?php
require_once "koneksi.php";

$id         = $_POST['id_p'];
$nama_p     = $_POST['nama_p'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_jual'];
$stok       = $_POST['stok'];

mysqli_query($conn, "UPDATE products SET
nama_p='$nama_p',
harga_beli='$harga_beli',
harga_jual='$harga_jual',
stok='$stok'
WHERE id_p='$id'");

header("Location: barang.php");
exit();
?>
