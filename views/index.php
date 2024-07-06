<?php 
  include "functions.php";
  //cek login
  if ($_SESSION['login'] == 0) {
    header("Location: auth-login-basic.php");
  }

  if (isset($_GET['id_klinik'])) {
    $id_klinik = $_GET['id_klinik'];
    $_SESSION['id_klinik'] = $id_klinik;
  }

  if (isset($_SESSION['id_klinik'])) {
    $id_klinik = $_SESSION['id_klinik'];    
  }

  if (isset($id_klinik)) {
    $sql_klinik = "SELECT * FROM tb_klinik WHERE id_klinik = '$id_klinik'";
    $eksekusi_klinik = mysqli_query($koneksi, $sql_klinik);
    $data_klinik = mysqli_fetch_array($eksekusi_klinik);
  }else{
    header("Location: pilih_klinik.php");
    exit;
  }

?>

<!DOCTYPE html>
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>easydoc</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/4848.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" type="text/css" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">
<link rel="stylesheet" type="text/css" href="../node_modules/sweetalert2/dist/sweetalert2.css">
<script src="../node_modules/sweetalert2/dist/sweetalert2.js"></script>
<script src="../node_modules/sweetalert2/dist/sweetalert2.all.js"></script>
<script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <?php include 'aside.php'; ?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <?php include 'navbar.php'; ?>
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-md-8 mb-2 mt-2"><strong style="font-weight: 700; font-size: 20px;">Dashboard Klinik</strong></div>
                <div class="col-md-4">
                  <strong id="time" style="font-weight: 700; font-size: 20px;">Hari <?= hari_ini().', '. date('d M Y').' '; ?></strong> 
                  <strong id="jam" style="font-size:20px; font-weight: 700;"></strong></div>
                <div class="col-md-8">
                  <div class="card" style="background-color: #0097b2;">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h3 class="card-title text-white mb-4">Halo 
                            <?php if (isset($_SESSION['nama_owner'])): ?>
                              <?= $_SESSION['nama_owner']; ?>!
                            <?php elseif(isset($_SESSION['nama_dokter'])): ?>
                              <?= $_SESSION['nama_dokter']; ?>!
                            <?php else : ?>
                              <?= $_SESSION['nama_staff']; ?>!
                            <?php endif ?>
                          </h3>
                          <p class="mb-4 text-white">
                            Selamat datang
                            <br>
                            di <?= $data_klinik['nama_klinik']; ?>, 
                            <br>
                            <?= $data_klinik['alamat_klinik']; ?>
                          </p>
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="../assets/img/illustrations/welcome2.png"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/welcome2.png"
                            data-app-light-img="illustrations/welcome2.png"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                      <div class="card-body">
                          <div class="card-title text-center">
                            <h5 class="text-nowrap mt-2 mb-2">Profile</h5>
                          </div>
                          <div class="mt-sm-auto text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" viewBox="0 0 48 48"><mask id="ipSHospitalTwo0"><g fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"><path stroke="#fff" d="M32 11h8l4 10H4l4-10h8"/><path fill="#fff" stroke="#fff" d="M8 21h32v22H8V21Zm8-16h16v16H16z"/><path fill="#fff" stroke="#000" d="M16 29h8v14h-8zm8 0h8v14h-8z"/><path stroke="#000" d="M21 13h6"/><path stroke="#fff" d="M36 43H12"/><path stroke="#000" d="M24 16v-6"/></g></mask><path fill="currentColor" d="M0 0h48v48H0z" mask="url(#ipSHospitalTwo0)"/></svg>
                            <br>
                            <b class="_text-profile m-0"> <?= $data_klinik['nama_klinik']; ?> </b>
                            <p class="m-0" style="color: rgb(144, 147, 153);"> <?= $data_klinik['jenis_klinik']; ?> </p><br>
                            <b><?= $data_klinik['status_klinik']; ?></b> <br><?= $data_klinik['jam_buka']; ?> - <?= $data_klinik['jam_tutup']; ?>
                            <br>
                            <b>Telp.</b> <?= $data_klinik['nomor_telp']; ?>
                        </div>
                      </div>
                    </div>
                </div>
                <!--/ Order Statistics -->
              </div>
              <div class="row justify-content-center">
                <div class="col-md-12">
                  <div class="ticker mt-5">
                    <div class="title text-center">
                      <h5></h5>
                    </div> 
                    <div class="news"> 
                      <marquee class="news-content bg-primary text-white bold"> <b style="font-family: sans-serif;">~ Selamat datang di <?= $data_klinik['nama_klinik']; ?> ~</b></marquee> 
                    </div> 
                  </div> 
                </div>
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
<footer class="content-footer footer bg-footer-theme">
  <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
      <div class="mb-2 mb-md-0">
        ©
        <script>
          document.write(new Date().getFullYear());
        </script>
        - easydoc
        </div>
  </div>
</footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript">
      window.onload = function() { jam(); }
     
      function jam() {
          var e = document.getElementById('jam'),
          d = new Date(), h, m, s;
          h = d.getHours();
          m = set(d.getMinutes());
          s = set(d.getSeconds());
     
          e.innerHTML = h +':'+ m +':'+ s;;
     
          setTimeout('jam()', 1000);
      }
     
      function set(e) {
          e = e < 10 ? '0'+ e : e;
          return e;
      }
    </script>
  </body>
</html>