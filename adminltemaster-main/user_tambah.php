<?php
session_start();
require_once "koneksi.php";

if(isset($_POST['simpan'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_lengkap = $_POST['nama_lengkap'];

    $query = mysqli_query($conn,"
        INSERT INTO users
        (username,password,nama_lengkap,status)
        VALUES
        ('$username','$password','$nama_lengkap','aktif')
    ");

    if($query){
        header("Location: user.php");
        exit;
    }else{
        echo "Gagal menyimpan data";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah User</title>

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
            <h2>Tambah User</h2>
        </div>

        <form method="POST">

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="text" name="password" required>
            </div>

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" required>
            </div>

            <button type="submit" name="simpan" class="btn btn-success">
                Simpan
            </button>

            <a href="user.php" class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>
</div>

</body>
</html>