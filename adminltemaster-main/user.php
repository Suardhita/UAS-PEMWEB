<?php
session_start();
require_once "koneksi.php";

// Cek login
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

// Ambil data user
$query = mysqli_query($conn, "SELECT * FROM users ORDER BY id ASC");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Project UAS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
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
              <p>Dashboard</p>
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
                <a href="user.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data User</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="barang.php" class="nav-link">
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
              <p>Pembelian</p>
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
              <div class="card-tools"> 
                <a href="user_tambah.php" class="btn btn-primary btn-sm"> 
                  <i class="fas fa-plus"></i> Tambah Data 
                </a> 
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead> 
                  <tr> 
                    <th width="5%">No</th> 
                    <th>Username</th> 
                    <th>Password</th> 
                    <th>Nama Lengkap</th> 
                    <th>Status</th> <!-- Tambah kolom Status di header -->
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
                    <td><?= htmlspecialchars($row['username']); ?></td> 
                    <td><?= htmlspecialchars($row['password']); ?></td> 
                    <td><?= htmlspecialchars($row['nama_lengkap']); ?></td>
                    <td><!-- Tambah isi Status -->
                      <?php if($row['status'] == 'aktif' || $row['status'] == 'Aktif'): ?>
                        <span class="badge badge-success"><?= htmlspecialchars($row['status']); ?></span>
                      <?php else: ?>
                        <span class="badge badge-secondary"><?= $row['status'] ? htmlspecialchars($row['status']) : 'Tidak aktif'; ?></span>
                      <?php endif; ?>
                    </td> 
                    <td>
                      <a href="#" type="button" class="btn btn-success btn-sm"
                         data-toggle="modal"
                         data-target="#myModal<?php echo $row['id']; ?>">
                         <i class="fas fa-edit"></i> Edit
                      </a>
                      <a href="user_delete.php?id=<?= $row['id']; ?>" 
                          class="btn btn-danger btn-sm" 
                          onclick="return confirm('Yakin ingin menghapus data ini?')"> 
                          <i class="fas fa-trash"></i> Delete 
                      </a> 
                    </td> 
                  </tr> 

                  <!-- Modal Edit User--> 
                  <div class="modal fade" id="myModal<?php echo $row['id']; ?>" role="dialog"> 
                    <div class="modal-dialog"> 
                                 
                    <!-- Modal content--> 
                    <div class="modal-content"> 
                      <div class="modal-header"> 
                        <h4 class="modal-title">Update Data User</h4> 
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div> 
                      <div class="modal-body"> 
                        <form role="form" action="action/ubah.php" method="post"> 
                   
                        <?php 
                          $id = $row['id'];  
                          $query_edit = mysqli_query($conn,"SELECT * FROM users WHERE id ='$id'"); 
                          while ($row_edit = mysqli_fetch_array($query_edit)) {   
                        ?> 
                   
                        <input type="hidden" name="id_user" value="<?php echo $row_edit['id']; ?>"> 
                   
                        <div class="form-group"> 
                          <label>Username</label> 
                          <input type="text" name="username" class="form-control" value="<?php echo $row_edit['username']; ?>">         
                        </div> 
                   
                        <div class="form-group"> 
                          <label>Password</label> 
                          <input type="password" name="password" class="form-control" value="<?php echo $row_edit['password']; ?>">         
                        </div> 
                   
                        <div class="form-group"> 
                          <label>Nama Lengkap</label> 
                          <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $row_edit['nama_lengkap']; ?>">         
                        </div> 

                        <!-- Input Tambahan untuk Status -->
                        <div class="form-group"> 
                          <label>Status</label> 
                          <select name="status" class="form-control">
                            <option value="aktif" <?php echo ($row_edit['status'] == 'aktif' || $row_edit['status'] == 'Aktif') ? 'selected' : ''; ?>>Aktif</option>
                            <option value="tidak aktif" <?php echo ($row_edit['status'] == 'tidak aktif') ? 'selected' : ''; ?>>Tidak Aktif</option>
                          </select>       
                        </div> 
                                           
                        <div class="modal-footer">   
                          <button type="submit" name="submit" class="btn btn-success">Simpan Perubahan Data</button> 
                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button> 
                        </div> 
                   
                        <?php   
                          } ?>         
                        </form> 
                      </div> 
                    </div> 
                  </div> 
                </div> 
                <?php } ?> 
                </tbody> 
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.0
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "columnDefs": [
        { "orderable": false, "targets": [4, 5] } // Nonaktifkan sortir untuk kolom status & aksi
      ]
    });
  });
</script>
</body>
</html>