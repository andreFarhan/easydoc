<?php 

	include 'functions.php';

	//cek login
	if ($_SESSION['login'] == 0) {
		header("Location: auth-login-basic.php");
	}

	$sql = "SELECT * FROM tb_obat
			ORDER BY kode_obat DESC
			";
	$eksekusi = mysqli_query($koneksi, $sql);
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
<?php include 'head.php'; ?>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <?php include 'aside.php'; ?>
        <!-- / Menu -->
        <div class="layout-page">
          <!-- Navbar -->
          <?php include 'navbar.php'; ?>
          <!-- / Navbar -->
            <div class="content-wrapper"> 
                <div class="container-xxl flex-grow-1 container-p-y"> 
                    <h5 class="fw-bold py-3 mb-0"><span class="text-muted fw-light">Stok /</span> Daftar Stok Obat</h5>
                    <h3 class="fw-bold py-2 mb-3">Stok Obat</h3>
                    <div class="card">
                        <div class="row">      
                        </div> 
                    <div class="table-responsive text-nowrap mt-4">
                    <table class="table" id="Table">
                        <caption class="ms-4">
                        Display
                        </caption>
                        <thead>
                        <tr>
                            <th width="1%">NO</th>
                            <th>KODE OBAT</th>
                            <th>NAMA OBAT</th>
                            <th class="text-center">STOK</th>
                            <th class="text-center">SATUAN</th>
                            <th width="1%">AKSI</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            while ($data = mysqli_fetch_array($eksekusi)) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $data['kode_obat']; ?></td>
                                <td><?= $data['nama_obat']; ?></td>
                                <td class="text-center"><?= $data['stok_obat']; ?></td>
                                <td class="text-center"><?= $data['satuan_obat']; ?></td>
                                <td>
                                    <a id="tombol-hapus" href="stok_obat_ubah.php?kode_obat=<?= $data['kode_obat']; ?>" class=""><i class='bx bx-edit'></i></a>
                                </td>
                            </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
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
    <script src="../assets/vendor/libs/jquery/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/libs/jquery/jquery-3.4.1.min.js"></script>
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
</body>
</html>