<?php 
	include "functions.php";
	//cek login
	if ($_SESSION['login'] == 0) {
	  header("Location: auth-login-basic.php");
	}
  if ($_SESSION['id_owner'] == 0) {
      header("Location: auth-login-basic.php");
  }

  $_SESSION['id_klinik'] = 0;

	$id_owner = $_SESSION['id_owner'];
	$nama_owner = $_SESSION['nama_owner'];
	$sql_klinik = "SELECT * FROM tb_klinik WHERE id_owner = '$id_owner'";
	$eksekusi_klinik = mysqli_query($koneksi, $sql_klinik);
 ?>
<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>easydoc | Klinik</title>

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
  <!-- Content -->

  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register Card -->
        <div class="card" style="width: 100%;">
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
            <h4 class="mb-4 text-center mt-2">Selamat Datang, <?= $nama_owner; ?></h4>
            <div class="mb-4 text-center">
              <div class="row">
                <div class="col-md-4">
            		<a class="btn btn-warning" href="klinik_show.php?id_owner=<?= $id_owner; ?>">
            			<svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 24 24"><circle cx="10" cy="8" r="4" fill="currentColor"/><path fill="currentColor" d="M10.67 13.02c-.22-.01-.44-.02-.67-.02c-2.42 0-4.68.67-6.61 1.82c-.88.52-1.39 1.5-1.39 2.53V20h9.26a6.963 6.963 0 0 1-.59-6.98zM20.75 16c0-.22-.03-.42-.06-.63l1.14-1.01l-1-1.73l-1.45.49c-.32-.27-.68-.48-1.08-.63L18 11h-2l-.3 1.49c-.4.15-.76.36-1.08.63l-1.45-.49l-1 1.73l1.14 1.01c-.03.21-.06.41-.06.63s.03.42.06.63l-1.14 1.01l1 1.73l1.45-.49c.32.27.68.48 1.08.63L16 21h2l.3-1.49c.4-.15.76-.36 1.08-.63l1.45.49l1-1.73l-1.14-1.01c.03-.21.06-.41.06-.63zM17 18c-1.1 0-2-.9-2-2s.9-2 2-2s2 .9 2 2s-.9 2-2 2z"/><br>Manajemen Klinik</svg>
            		</a>
            	</div>
                	<?php while($data_klinik=mysqli_fetch_array($eksekusi_klinik)): ?>
                <div class="col-md-4">
                  		<a class="btn btn-primary" href="index.php?id_klinik=<?= $data_klinik['id_klinik']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 48 48"><g fill="currentColor"><path fill-rule="evenodd" d="M13.02 11.985c.057-.71.242-1.384.531-2H6v2.481l4 3.03v26.52h28V15.531l4.5-3.03V9.984H24.449c.29.616.474 1.29.532 2h14.706L36 14.468v25.547H12V14.503l-3.324-2.518h4.343Z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M10 13.75L7.5 10.5h5.75L16.5 17H21l3.5-6.5H41l-3 4V41h-4V24h-8v17H10V13.75ZM14 24h7v7h-7v-7Z" clip-rule="evenodd"/><path d="M6 41a1 1 0 0 0 1 1h34a1 1 0 1 0 0-2H7a1 1 0 0 0-1 1Z"/><path fill-rule="evenodd" d="M25 12a6 6 0 1 1-12 0a6 6 0 0 1 12 0Zm-5-3v2h2v2h-2v2h-2v-2h-2v-2h2V9h2Z" clip-rule="evenodd"/></g></svg><br><?= $data_klinik['nama_klinik']; ?></a>
                </div>
              		<?php endwhile ?>
              </div>
            </div>  
          </div>
        </div>
        <!-- Register Card -->
      </div>
    </div>
  </div>

  <!-- / Content -->

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