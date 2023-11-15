<?php
include '../koneksi.php';

// if (isset($_GET['id_tr'])) {
//   $id_tr = $_GET['id_tr'];
$query = "SELECT transaksi.kode_transaksi, transaksi.biaya_daftar, transaksi.tanggal, pasien.nama_pasien, layanan.layanan, layanan.biaya_medis, layanan.biaya_obat FROM transaksi 
  INNER JOIN pasien ON transaksi.id = pasien.id
  INNER JOIN layanan ON transaksi.id_layanan = layanan.id_layanan
  WHERE transaksi.id_tr = id_tr";

$result = mysqli_query($conn, $query);

if (!$result) {
  die("Query Error : " . mysqli_error($conn) . " - " . mysqli_error_string($conn));
}

$data = mysqli_fetch_assoc($result);

if (!count($data)) {
  echo "<script>alert('Data tidak ditemukan pada tabel.');window.location='transaksi.php';</script>";
}
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>SiAku - Edit Transaksi</title>

  <!-- Custom fonts for this template -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="css/style.css" />

  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet" />

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img src="../img/logo-unila.png" />
          <p class="mb-0">KLINIK UNIVERSITAS LAMPUNG</p>
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0" />

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas bx bxs-dashboard"></i>
          <span>Dashboard</span></a>
      </li>
      <!-- Nav Item - Pendaftaran Pasien -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-solid fa-user-plus"></i>
          <span>Pasien</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pengaturan Pasien:</h6>
            <a class="collapse-item" href="tambah-pasien.php">Tambah Data</a>
            <a class="collapse-item" href="data-pasien.php">Lihat Data</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Transaksi -->
      <li class="nav-item active">
        <a class="nav-link" href="#">
          <i class="fas fa-regular fa-credit-card"></i>
          <span>Transaksi</span>
        </a>
      </li>

      <!-- Nav Item - Data -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-solid fa-database"></i>
          <span>Data</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Lihat Data:</h6>
            <a class="collapse-item" href="data-dokter.php">Dokter</a>
            <a class="collapse-item" href="data-apoteker.php">Apoteker</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Laporan -->
      <li class="nav-item">
        <a class="nav-link" href="laporan.php">
          <i class="fas fa-solid fa-file"></i>
          <span>Laporan</span></a>
      </li>

      <!-- Nav Item - Akun -->
      <li class="nav-item">
        <a class="nav-link" href="edit-akun.php">
          <i class="fas fa-solid fa-user"></i>
          <span>Akun</span></a>
      </li>
      <!-- Nav Item - Keluar -->
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-solid fa-arrow-right-from-bracket"></i>
          <span>Keluar</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block" />

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->
          <form class="form-inline">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>
          </form>

          <h5 class="mb-0" style="font-weight: 600">Transaksi</h5>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin <br />
                  <p class="mr-2 d-none d-lg-inline text-gray-600 small">
                    Administator
                  </p>
                </span>

                <img class="img-profile rounded-circle" src="img/undraw_profile.svg" />
              </a>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="heading d-flex justify-content-between">
            <h1 class="h3 mb-4 text-gray-800">Ubah Data Transaksi</h1>
            <a href="transaksi.php">
              <button class="btn btn-danger">Batal</button>
            </a>
          </div>

          <div class="form-box">
            <form action="../proses_edit_transaksi.php" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-6">
                  <div class="input-box">
                    <label>Kode Transaksi</label><br />
                    <input type="text" name="kode_transaksi" placeholder="masukan kode transaksi" value="<?php echo $data['kode_transaksi']; ?>" required />
                  </div>
                  <div class="input-box">
                    <label>Nama Pasien</label><br />
                    <select name="id">
                      <?php
                      echo "value='$data[id]'>$data[nama_pasien]";
                      $query = mysqli_query($conn, "SELECT * FROM pasien") or die(mysqli_error($conn));
                      while ($row = mysqli_fetch_assoc($query)) {
                        echo "<option value='$row[id]'> $row[nama_pasien] </option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="input-box">
                    <label>Biaya Daftar</label><br />
                    <input type="number" name="biaya_daftar" placeholder="masukan biaya daftar" value="<?php echo $data['biaya_daftar']; ?>" required />
                  </div>
                </div>
                <div class="col-6">
                  <div class="input-box">
                    <label>Layanan</label><br />
                    <select name="id_layanan">
                      <?php
                      echo "value='$data[id_layanan]'>$data[layanan]";
                      $query = mysqli_query($conn, "SELECT * FROM layanan") or die(mysqli_error($conn));
                      while ($row = mysqli_fetch_assoc($query)) {
                        echo "<option value='$row[id_layanan]'> $row[layanan] </option>";
                      }
                      ?>
                    </select>

                  </div>
                  <div class="input-box">
                    <label>Tanggal</label><br />
                    <input type="date" name="tanggal" value="<?php echo $data['tanggal']; ?>" />
                  </div>
                  <button name="proses" type="submit" class="btn btn-success">
                    Tambah
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; SiAku 2023</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            Yakin ingin Keluar?
          </h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Keluar" jika ingin keluar.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">
            Batal
          </button>
          <a class="btn btn-primary" href="../logout.php">Keluar</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
</body>

</html>