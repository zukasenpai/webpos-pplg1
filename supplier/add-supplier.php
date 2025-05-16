<?php
session_start();
if (!isset($_SESSION['ssLoginPOS'])) {
  header("location: ../auth/login.php");
  exit();
}

require '../config/config.php';
require '../config/functions.php';
require '../module/mode-supplier.php';
require '../module/mode-customer.php';

$title = 'Tambah Supplier | Market PPLG';

require '../template/header.php';
require '../template/navbar.php';
require '../template/sidebar.php';

$alert = '';

if (isset($_POST['simpan'])) {
  if (insert($_POST)) {
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <i class="icon fas fa-check"></i> Supplier berhasil ditambahkan..
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
  }
}
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Supplier</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= $main_url ?>dashboard.php">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= $main_url ?>supplier/data-supplier.php">Supplier
              </a></li>
            <li class="breadcrumb-item active">Add Supplier</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <?php if ($alert != '') {
        echo $alert;
      } ?>
      <div class="card">
        <form action="" method="post">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-plus fa-sm"></i> Add Supplier</h3>
            <button type="submit" name="simpan" class="btn btn-primary btn-sm float-right"><i class="fas fa-save"></i>
              Simpan</button>
            <button type="reset" class="btn btn-danger btn-sm float-right mr-1"><i class="fas fa-times"></i>
              Reset</button>
          </div>
          <div class="card-body">
            <div class="row">

              <div class="col-lg-8 mb-3">
                <div class="form-group">
                  <label for="name">Nama</label>
                  <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan nama supplier" autofocus autocomplete="off" required>
                </div>
                <div class="form-group">
                  <label for="telpon">Telpon</label>
                  <input type="text" name="telpon" id="telpon" class="form-control" placeholder="nomor telepon supplier" pattern="[0-9]{5,}" required>
                </div>
                <div class="form-group">
                  <label for="ketr">Deskripsi</label>
                  <textarea name="ketr" id="ketr" rows="1" class="form-control" placeholder="Keterangan supplier" required></textarea>
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <textarea name="alamat" id="alamat" rows="1" class="form-control" placeholder="Alamat supplier" required></textarea>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>

<?php require '../template/footer.php'; ?>