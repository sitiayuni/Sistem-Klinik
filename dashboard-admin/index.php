<?php
  include '../koneksi.php';

  $query = "SELECT * FROM transaksi 
              INNER JOIN pasien ON pasien.id = transaksi.id
              INNER JOIN layanan ON layanan.id_layanan = transaksi.id_layanan
              ORDER BY transaksi.id_tr ASC";
  $transaksi = mysqli_query($conn, $query);

  // $query = "SELECT * FROM transaksi ORDER BY id_tr ASC";
  // $result = mysqli_query($conn, $query);

  $query = "SELECT * FROM dokter ORDER BY id ASC";
  $hasil = mysqli_query($conn, $query);

  $query = "SELECT * FROM obat ORDER BY id ASC";
  $obat = mysqli_query($conn, $query);

  if(!$transaksi && !$hasil && !$obat) {
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

    <title>SiAku - Dashboard</title>

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

    <link rel="stylesheet" href="css/style.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />
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
        <li class="nav-item active">
          <a class="nav-link" href="index.php">
            <i class="fas bx bxs-dashboard"></i>
            <span>Dashboard</span></a
          >
        </li>
        <!-- Nav Item - Pendaftaran Pasien -->
        <li class="nav-item">
          <a
            class="nav-link collapsed"
            href="#"
            data-toggle="collapse"
            data-target="#collapseTwo"
            aria-expanded="true"
            aria-controls="collapseTwo"
          >
            <i class="fas fa-solid fa-user-plus"></i>
            <span>Pasien</span>
          </a>
          <div
            id="collapseTwo"
            class="collapse"
            aria-labelledby="headingTwo"
            data-parent="#accordionSidebar"
          >
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Pengaturan Pasien:</h6>
              <a class="collapse-item" href="tambah-pasien.php">Tambah Data</a>
              <a class="collapse-item" href="data-pasien.php">Lihat Data</a>
            </div>
          </div>
        </li>

        <!-- Nav Item - Transaksi -->
        <li class="nav-item">
          <a class="nav-link" href="transaksi.php">
            <i class="fas fa-regular fa-credit-card"></i>
            <span>Transaksi</span>
          </a>
        </li>

        <!-- Nav Item - Data -->
        <li class="nav-item">
          <a
            class="nav-link collapsed"
            href="#"
            data-toggle="collapse"
            data-target="#collapsePages"
            aria-expanded="true"
            aria-controls="collapsePages"
          >
            <i class="fas fa-solid fa-database"></i>
            <span>Data</span>
          </a>
          <div
            id="collapsePages"
            class="collapse"
            aria-labelledby="headingPages"
            data-parent="#accordionSidebar"
          >
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
            <span>Laporan</span></a
          >
        </li>

        <!-- Nav Item - Akun -->
        <li class="nav-item">
          <a class="nav-link" href="edit-akun.php">
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
            <button
              id="sidebarToggleTop"
              class="btn btn-link d-md-none rounded-circle mr-3"
            >
              <i class="fa fa-bars"></i>
            </button>

            <h5 class="mb-0" style="font-weight: 600">Dashboard</h5>
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
                      Administator
                    </p></span
                  >

                  <img
                    class="img-profile rounded-circle"
                    src="img/undraw_profile.svg"
                  />
                </a>
              </li>
            </ul>
          </nav>
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Content Row -->
            <div class="row">
              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div
                          class="text-xs font-weight-bold text-primary text-uppercase mb-1"
                        >
                          Pasien
                        </div>
                        <?php
                          $dash_pasien_query = "SELECT * FROM pasien";
                          $dash_pasien_query_run = mysqli_query($conn,$dash_pasien_query);

                          if($pasien_total = mysqli_num_rows($dash_pasien_query_run)){
                            echo '<div class="h5 mb-0 font-weight-bold text-gray-800">'.$pasien_total.'</div>';
                          }else{
                            echo '<div class="h5 mb-0 font-weight-bold text-gray-800"> No Data </div>';
                          }
                        ?>
                      </div>
                      <div class="col-auto">
                        <i
                          class="fas fa-solid fa-bed-pulse fa-2x text-gray-300"
                        ></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div
                          class="text-xs font-weight-bold text-success text-uppercase mb-1"
                        >
                          Dokter
                        </div>
                        <?php
                          $dash_dokter_query = "SELECT * FROM dokter";
                          $dash_dokter_query_run = mysqli_query($conn,$dash_dokter_query);

                          if($dokter_total = mysqli_num_rows($dash_dokter_query_run)){
                            echo '<div class="h5 mb-0 font-weight-bold text-gray-800">'.$dokter_total.'</div>';
                          }else{
                            echo '<div class="h5 mb-0 font-weight-bold text-gray-800"> No Data </div>';
                          }
                        ?>
                      </div>
                      <div class="col-auto">
                        <i
                          class="fas fa-solid fa-user-doctor fa-2x text-gray-300"
                        ></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div
                          class="text-xs font-weight-bold text-info text-uppercase mb-1"
                        >
                          Obat
                        </div>
                        <div class="row no-gutters align-items-center">
                          <div class="col-auto">
                          <?php
                          $dash_tersedia_query = "SELECT * FROM obat";
                          $dash_tersedia_query_run = mysqli_query($conn,$dash_tersedia_query);

                          if($tersedia_total = mysqli_num_rows($dash_tersedia_query_run)){
                            echo '<div class="h5 mb-0 font-weight-bold text-gray-800">'.$tersedia_total.'</div>';
                          }else{
                            echo '<div class="h5 mb-0 font-weight-bold text-gray-800"> No Data </div>';
                          }
                        ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i
                          class="fas fa-solid fa-capsules fa-2x text-gray-300"
                        ></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Pending Requests Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div
                          class="text-xs font-weight-bold text-warning text-uppercase mb-1"
                        >
                          Transaksi
                        </div>
                        <?php
                          $dash_transaksi_query = "SELECT * FROM transaksi";
                          $dash_transaksi_query_run = mysqli_query($conn,$dash_transaksi_query);

                          if($transaksi_total = mysqli_num_rows($dash_transaksi_query_run)){
                            echo '<div class="h5 mb-0 font-weight-bold text-gray-800">'.$transaksi_total.'</div>';
                          }else{
                            echo '<div class="h5 mb-0 font-weight-bold text-gray-800"> No Data </div>';
                          }
                        ?>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-receipt fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Content Row -->

            <div class="row">
              <!-- Transaksi -->
              <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                  <!-- Card Header - Dropdown -->
                  <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                  >
                    <h6 class="m-0 font-weight-bold text-primary">Transaksi</h6>
                    <div class="dropdown no-arrow">
                      <a
                        class="dropdown-toggle"
                        href="#"
                        role="button"
                        id="dropdownMenuLink"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                      >
                        <i
                          class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"
                        ></i>
                      </a>
                      <div
                        class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink"
                      >
                        <div class="dropdown-header">Transaksi Menu:</div>
                        <a class="dropdown-item" href="transaksi.php">Lihat Data</a>
                      </div>
                    </div>
                  </div>
                  <!-- Card Body -->
                  <div class="card-body">
                    <div class="card shadow mb-4">
                      <div class="card-body">
                        <div class="table-responsive">
                          <table
                            class="table table-bordered"
                            id="dataTable"
                            width="100%"
                            cellspacing="0"
                          >
                            <thead>
                              <tr>
                                <th>No.</th>
                                <th>Kode transaksi</th>
                                <th>Nama</th>
                                <th>Biaya Daftar</th>
                                <th>Layanan</th>
                                <th>Biaya Medis</th>
                                <th>Biaya Obat</th>
                                <th>Tanggal</th>
                              </tr>
                            </thead>
                            <tbody>

                              <?php
                                while ($row = mysqli_fetch_assoc($transaksi)) {
                              ?>
                              <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $row['kode_transaksi']; ?></td>
                                <td><?php echo $row['nama_pasien']; ?></td>
                                <td><?php echo $row['biaya_daftar']; ?></td>
                                <td><?php echo $row['layanan']; ?></td>
                                <td><?php echo $row['biaya_medis']; ?></td>
                                <td><?php echo $row['biaya_obat']; ?></td>
                                <td><?php echo $row['tanggal']; ?></td>
                              </tr>
                              <?php
                                  $no++;
                                }
                              ?>     
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Tenaga Medis -->
              <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                  <!-- Card Header - Dropdown -->
                  <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                  >
                    <h6 class="m-0 font-weight-bold text-primary">
                      Tenaga Medis
                    </h6>
                    <div class="dropdown no-arrow">
                      <a
                        class="dropdown-toggle"
                        href="#"
                        role="button"
                        id="dropdownMenuLink"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                      >
                        <i
                          class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"
                        ></i>
                      </a>
                      <div
                        class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink"
                      >
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"
                          >Something else here</a
                        >
                      </div>
                    </div>
                  </div>
                  <!-- Card Body -->
                  <div class="card-body">
                  <div class="table-responsive">
                  <table
                    class="table table-bordered"
                    id="dataTable"
                    width="100%"
                    cellspacing="0"
                  >
                    <thead>
                      <tr>                                              
                        <th>Nama</th>
                        <th>Poli</th>                      
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        while ($data = mysqli_fetch_assoc($hasil)) {
                      ?>
                      <tr>
                        <td><?php echo $data['nama_dokter']; ?></td>
                        <td><?php echo $data['poli']; ?></td>
                      </tr>
                      <?php
                        }
                      ?>     
                    </tbody>
                  </table>
                </div>
                  </div>
                </div>
              </div>
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
  </body>
</html>
