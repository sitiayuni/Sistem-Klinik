<?php
  include '../koneksi.php';

  $query = "SELECT * FROM obat ORDER BY id ASC";
  $result = mysqli_query($conn, $query);

  if(!$result && !$hasil) {
      die("Query Error : " . mysqli_error($conn)." - " . mysqli_error_string($conn));
  }
  $no = 1;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>SiAku - Tambah Obat</title>

    <!-- Custom fonts for this template-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <link
      rel="stylesheet"
      href="https://unpkg.com/boxicons@latest/css/boxicons.min.css"
    />

    <link rel="stylesheet" href="../dashboard-admin/css/style.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />

    <!-- Custom styles for this template-->
    <link href="../dashboard-admin/css/sb-admin-2.min.css" rel="stylesheet" />
    <link
      href="../dashboard-admin/vendor/datatables/dataTables.bootstrap4.min.css"
      rel="stylesheet"
    />
  </head>

  <body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
      <!-- Sidebar -->
      <ul
        class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
        id="accordionSidebar"
      >
        <!-- Sidebar - Brand -->
        <a
          class="sidebar-brand d-flex align-items-center justify-content-center"
          href="index.html"
        >
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
            <span>Dashboard</span></a
          >
        </li>

        <!-- Nav Item - Akun -->
        <li class="nav-item active">
          <a class="nav-link" href="data-obat.php">
          <i class="fas fa-solid fa-pills"></i>
            <span>Obat</span></a
          >
        </li>


        <!-- Nav Item - Akun -->
        <li class="nav-item">
          <a class="nav-link" href="akun.php">
            <i class="fas fa-solid fa-user"></i>
            <span>Akun</span></a
          >
        </li>
        <!-- Nav Item - Keluar -->
        <li class="nav-item">
          <a
            class="nav-link"
            href="#"
            data-toggle="modal"
            data-target="#logoutModal"
          >
            <i class="fas fa-solid fa-arrow-right-from-bracket"></i>
            <span>Keluar</span></a
          >
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
          <nav
            class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"
          >
            <!-- Sidebar Toggle (Topbar) -->
            <form class="form-inline">
              <button
                id="sidebarToggleTop"
                class="btn btn-link d-md-none rounded-circle mr-3"
              >
                <i class="fa fa-bars"></i>
              </button>
            </form>

            <h5 class="mb-0" style="font-weight: 600">Obat</h5>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="userDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"
                    >Admin <br />
                    <p class="mr-2 d-none d-lg-inline text-gray-600 small">
                      Apoteker
                    </p></span
                  >

                  <img
                    class="img-profile rounded-circle"
                    src="../dashboard-admin/img/undraw_profile.svg"
                  />
                </a>
              </li>
            </ul>
          </nav>
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <div class="heading d-flex justify-content-between">
              <h1 class="h3 mb-4 text-gray-800">Tambah Data Obat</h1>
              <a href="data-obat.php">
                <button class="btn btn-danger">Batal</button>
              </a>
            </div>

            <div class="form-box">
              <form action="../proses_tambah_obat.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-6">
                    <div class="input-box">
                      <label>Kode Obat</label><br />
                      <input
                        type="text"
                        name="kode_obat"
                        placeholder="masukan kode obat"
                        required
                      />
                    </div>
                    <div class="input-box">
                      <label>Nama Obat</label><br />
                      <input
                        type="text"
                        name="nama_obat"
                        placeholder="masukan nama obat"
                        required
                      />
                    </div>
                    <div class="input-box">
                      <label>Kategori</label><br />
                      <select
                        class="form-select"
                        aria-label="Default select example"
                        name="kategori"
                        required
                      >
                        <option selected>Pilih Kategori</option>
                        <option value="Bebas">Bebas</option>
                        <option value="Terbatas">Terbatas</option>
                        <option value="Keras">Keras</option>
                      </select>
                    </div> 
                    <div class="input-box">
                      <label>Stok</label><br />
                      <input
                        type="number"
                        name="stok"
                        placeholder="masukan stok obat"
                        required
                      />
                    </div>  
                  </div>
                  <div class="col-6">
                    <div class="input-box">
                        <label>Harga Beli</label><br />
                        <input
                            type="number"
                            name="harga_beli"
                            placeholder="masukan harga beli"
                            required
                        />
                    </div>
                    <div class="input-box">
                        <label>Harga Jual</label><br />
                        <input
                            type="number"
                            name="harga_jual"
                            placeholder="masukan harga jual"
                            required
                        />
                    </div>
                    <div class="input-box">
                      <label>Status</label><br />
                      <select
                        class="form-select"
                        aria-label="Default select example"
                        name="status"
                        required
                      >
                        <option selected>Pilih Status</option>
                        <option value="Tersedia">Tersedia</option>
                        <option value="Hampir Habis">Hampir Habis</option>
                        <option value="Habis">Habis</option>
                      </select>
                    </div> 
                    <button  type="submit" class="btn btn-success">
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
    <div
      class="modal fade"
      id="logoutModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              Yakin ingin Keluar?
            </h5>
            <button
              class="close"
              type="button"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Pilih "Keluar" jika ingin keluar.</div>
          <div class="modal-footer">
            <button
              class="btn btn-secondary"
              type="button"
              data-dismiss="modal"
            >
              Batal
            </button>
            <a class="btn btn-primary" href="../logout.php">Keluar</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../dashboard-admin/vendor/jquery/jquery.min.js"></script>
    <script src="../dashboard-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../dashboard-admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../dashboard-admin/js/sb-admin-2.min.js"></script>

    <script src="../dashboard-admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../dashboard-admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../dashboard-admin/js/demo/datatables-demo.js"></script>
  </body>
</html>
