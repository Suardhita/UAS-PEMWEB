<?php
require_once "koneksi.php";

if(isset($_POST['simpan'])){

    $nama_barang = $_POST['nama_barang'];
    $harga_beli = $_POST['beli'];
    $harga_jual = $_POST['jual'];
    $stok = $_POST['stok'];

    mysqli_query($conn,"
        INSERT INTO products
        (nama_p,harga_beli,harga_jual,stok)
        VALUES
        ('$nama_barang','$harga_beli','$harga_jual','$stok')
    ");

    header("Location: barang.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Barang</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: Arial, sans-serif;
        }

        body{
            background:#f4f6f9;
            padding:30px;
        }

        .container{
            max-width:700px;
            margin:auto;
        }

        .card{
            background:white;
            padding:25px;
            border-radius:10px;
            box-shadow:0 2px 10px rgba(0,0,0,0.1);
        }

        .card-header{
            margin-bottom:20px;
            border-bottom:1px solid #ddd;
            padding-bottom:10px;
        }

        .card-header h2{
            color:#333;
        }

        .form-group{
            margin-bottom:15px;
        }

        label{
            display:block;
            margin-bottom:5px;
            font-weight:bold;
            color:#555;
        }

        input{
            width:100%;
            padding:10px;
            border:1px solid #ccc;
            border-radius:5px;
        }

        .btn{
            padding:10px 20px;
            border:none;
            border-radius:5px;
            cursor:pointer;
            text-decoration:none;
            display:inline-block;
        }

        .btn-success{
            background:#28a745;
            color:white;
        }

        .btn-success:hover{
            background:#218838;
        }

        .btn-secondary{
            background:#6c757d;
            color:white;
        }

        .btn-secondary:hover{
            background:#5a6268;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">

        <div class="card-header">
            <h2>Tambah Data Barang</h2>
        </div>

        <form method="POST">

            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" required>
            </div>

            <div class="form-group">
                <label>Harga Beli</label>
                <input type="number" name="beli" required>
            </div>

            <div class="form-group">
                <label>Harga Jual</label>
                <input type="number" name="jual" required>
            </div>

            <div class="form-group">
                <label>Stok</label>
                <input type="number" name="stok" required>
            </div>

            <button type="submit" name="simpan" class="btn btn-success">
                Simpan
            </button>

            <a href="barang.php" class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>
</div>

</body>
</html>