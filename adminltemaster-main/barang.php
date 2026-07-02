<?php
session_start();
require_once "koneksi.php";

// Cek login
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

// Ambil data barang
$query = mysqli_query($conn, "SELECT * FROM products ORDER BY id_p ASC");
?>

<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Data Barang</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->

  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

  <!-- DataTables -->

  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">

  <!-- AdminLTE -->

  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <!-- Google Font -->

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">

<div class="wrapper">

  <!-- Navbar -->

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#">
          <i class="fas fa-bars"></i>
        </a>
      </li>
    </ul>
  </nav>

  <!-- Sidebar -->

  <aside class="main-sidebar sidebar-dark-primary elevation-4">

```
<div class="sidebar">

  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="dist/img/user2-160x160.jpg"
           class="img-circle elevation-2"
           alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block">I Made Suardhita Kusuma</a>
    </div>
  </div>

  <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="user.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data User</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="barang.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Barang</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">TRANSAKSI</li>
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Penjualan
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Pembelian
              </p>
            </a>
          </li>

          <li class="nav-header">LAPORAN</li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Laporan Penjualan</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>



  <!-- Content -->

  <div class="content-wrapper">

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">

      <div class="col-sm-6">
        <h1>Data Barang</h1>
      </div>

    </div>
  </div>
</section>

<section class="content">

  <div class="row">
    <div class="col-12">

      <div class="card">

        <div class="card-header">

          <h3 class="card-title">Data Barang</h3>

          <div class="card-tools">
            <a href="barang_tambah.php"
               class="btn btn-primary btn-sm">
              <i class="fas fa-plus"></i> Tambah Data
            </a>
          </div>

        </div>

        <div class="card-body">

          <table id="example2"
                 class="table table-bordered table-striped">

            <thead>
              <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Stok</th>
                <th>Aksi</th>
              </tr>
            </thead>

            <tbody>

            <?php
            $no = 1;
            while($row = mysqli_fetch_assoc($query)){
            ?>

              <tr>

                <td><?= $no++; ?></td>

                <td><?= htmlspecialchars($row['nama_p']); ?></td>

                <td>
                  Rp <?= number_format($row['harga_beli'],0,',','.'); ?>
                </td>

                <td>
                  Rp <?= number_format($row['harga_jual'],0,',','.'); ?>
                </td>

                <td><?= $row['stok']; ?></td>

               <td>

<a href="#"
  class="btn btn-success btn-sm"
  data-toggle="modal"
  data-target="#editBarang<?= $row['id_p']; ?>"> <i class="fas fa-edit"></i> Edit </a>

<a href="barang_delete.php?id=<?= $row['id_p']; ?>"
  class="btn btn-danger btn-sm"
  onclick="return confirm('Yakin ingin menghapus data ini?')"> <i class="fas fa-trash"></i> Delete </a>

</td>

</tr>

<!-- Modal Edit Barang -->

<div class="modal fade" id="editBarang<?= $row['id_p']; ?>" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

  <div class="modal-header">
    <h4 class="modal-title">
      <i class="fas fa-edit text-success"></i>
      Update Data Barang
    </h4>
    <button type="button" class="close" data-dismiss="modal">
      <span>&times;</span>
    </button>
  </div>

  <div class="modal-body">
    <form action="barang_update.php" method="POST">

      <input type="hidden"
             name="id_p"
             value="<?= $row['id_p']; ?>">

      <div class="form-group">
        <label>Nama Barang</label>
        <input type="text"
               name="nama_p"
               class="form-control"
               value="<?= $row['nama_p']; ?>"
               required>
      </div>

      <div class="form-group">
        <label>Harga Beli</label>
        <input type="number"
               name="harga_beli"
               class="form-control"
               value="<?= $row['harga_beli']; ?>"
               required>
      </div>

      <div class="form-group">
        <label>Harga Jual</label>
        <input type="number"
               name="harga_jual"
               class="form-control"
               value="<?= $row['harga_jual']; ?>"
               required>
      </div>

      <div class="form-group">
        <label>Stok</label>
        <input type="number"
               name="stok"
               class="form-control"
               value="<?= $row['stok']; ?>"
               required>
      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-success">
          <i class="fas fa-save"></i>
          Simpan Perubahan Data
        </button>

        <button type="button"
                class="btn btn-secondary"
                data-dismiss="modal">
          Batal
        </button>
      </div>

    </form>
  </div>

</div>
```

  </div>
</div>


              </tr>

            <?php } ?>

            </tbody>

          </table>

        </div>

      </div>

    </div>
  </div>

</section>

  </div>

  <footer class="main-footer">
    <strong>Copyright &copy; 2026</strong>
  </footer>

</div>

<!-- jQuery -->

<script src="plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap -->

<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- DataTables -->

<script src="plugins/datatables/jquery.dataTables.js"></script>

<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<!-- AdminLTE -->

<script src="dist/js/adminlte.min.js"></script>

<script>
$(function () {
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false
    });
});
</script>

</body>
</html>
