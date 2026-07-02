<?php
require_once "koneksi.php";

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM products WHERE id_p='$id'");

header("Location: barang.php");
exit;
?>