<?php

include 'functions.php';

//cek login
if ($_SESSION['login'] == 0) {
        header("Location: auth-login-basic.php");
}

$id_klinik = $_GET['id_klinik'];

$sql = "SELECT * FROM tb_klinik 
		INNER JOIN tb_owner ON tb_klinik.id_owner = tb_owner.id_owner
		WHERE id_klinik = '$id_klinik'";
$eksekusi = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($eksekusi);

?>
<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>easydoc | Klinik Ubah</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="../assets/img/favicon/4848.png" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="../assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <!-- Page CSS -->
  <!-- Page -->
  <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />
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
		      <div class="col">
		        <!-- Register Card -->
		        <div class="card mb-4">
		          <div class="card-body">
		            <!-- Logo -->
		            <div class="app-brand justify-content-center">
		              <a href="index.php" class="app-brand-link gap-2">
		                <span class="app-brand-logo demo">
		                  <img src="../assets/img/favicon/4848.png">
		                </span>
		                <span class="app-brand-text demo fw-bolder">
		                  <img src="../assets/img/easydoc3.png" style="width: 200px;" class="mt-4">
		                </span>
		              </a>
		            </div>
		            <!-- /Logo -->
		            <h4 class="mb-4">Data Klinik</h4>

		            <form class="mb-3" method="POST">
		              <input disabled type="hidden" name="id_klinik" value="<?= $id_klinik; ?>">
		              <div class="mb-3 ">
		                <label for="nama_klinik" class="form-label">Nama Klinik</label>
		                <input disabled type="text" class="form-control" name="nama_klinik" value="<?= $data['nama_klinik']; ?>" placeholder="Masukan nama klinik"/>
		              </div>
		              <div class="mb-3">
		                <label for="jenis_klinik" class="form-label">Jenis Klinik</label>
		                <select disabled name="jenis_klinik" class="form-control">
		                  <option value="<?= $data['jenis_klinik']; ?>"><?= $data['jenis_klinik']; ?></option>
		                </select>
		              </div>
		              <div class="mb-3 ">
		                <label for="alamat_klinik" class="form-label">Alamat Klinik</label>
		                <textarea disabled name="alamat_klinik" class="form-control" placeholder="Masukan alamat klinik"><?= $data['alamat_klinik']; ?></textarea>
		              </div>
		              <div class="mb-3">
		                <label for="nomor_telp" class="form-label">Nomor Telp</label>
		                <input disabled type="number" class="form-control" name="nomor_telp" value="<?= $data['nomor_telp']; ?>" placeholder="Masukan nomor telp Anda" />
		              </div>
		              <div class="mb-3">
		                <label for="jam_buka" class="form-label">Jam Buka</label>
		                <input disabled type="time" class="form-control" name="jam_buka" value="<?= $data['jam_buka']; ?>" />
		              </div>
		              <div class="mb-3">
		                <label for="jam_tutup" class="form-label">Jam Tutup</label>
		                <input disabled type="time" class="form-control" name="jam_tutup" value="<?= $data['jam_tutup']; ?>" />
		              </div>
		              <div class="mb-3">
		                <label for="status_klinik" class="form-label">Status Klinik</label>
		                <select disabled name="status_klinik" class="form-control">
		                  <option value="<?= $data['status_klinik']; ?>"><?= $data['status_klinik']; ?></option>
		                </select>
		              </div>
		              <div class="mb-3">
		                <label for="id_owner" class="form-label">Owner</label>
		                <select disabled name="id_owner" class="form-control">
		                	<option value="<?= $data['id_owner']; ?>"><?= $data['nama_owner']; ?></option>
		                </select>
		              </div>
		            </form>
		          </div>
		        </div>
		        <!-- Register Card -->
		      </div>
		    </div>
		  </div>

		  <!-- / Content -->
		</div>
	</div>
</div>
  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../assets/vendor/libs/popper/popper.js"></script>
  <script src="../assets/vendor/js/bootstrap.js"></script>
  <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="../assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->

  <!-- Main JS -->
  <script src="../assets/js/main.js"></script>

  <!-- Page JS -->

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>