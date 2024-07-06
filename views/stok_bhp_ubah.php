<?php 

	include 'functions.php';

	//cek login
	if ($_SESSION['login'] == 0) {
		header("Location: auth-login-basic.php");
	}

	$kode_bhp = $_GET['kode_bhp'];
	$sql = "SELECT * FROM tb_bhp WHERE kode_bhp = '$kode_bhp'";
	$eksekusi = mysqli_query($koneksi, $sql);
	$data = mysqli_fetch_assoc($eksekusi);

	if (isset($_POST['submit'])) {
		if (ubahStokBhp($_POST) > 0) {
			echo '
                <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
                <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">
                <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
                <script>
                $(document).ready(function() {
                    Swal.fire({
                        text: "Stok BHP berhasil diubah!",
                        icon: "success",
                        confirmButtonText: "Ya",
                        confirmButtonColor: "#0097B2",
                        showConfirmButton: true,
                    }).then(function(result) {
                        if (result.isConfirmed) {
                            window.location.href = "stok_bhp_show.php";
                        }
                    })
                });
                </script>';
			die;
		}
		else{
			// setAlert('Gagal!','Data Gagal Diubah','error');
			header("Location: stok_bhp_show.php");
			die;
		}
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
            <!-- Layout container -->
            <div class="content-wrapper"> 
                <div class="container-xxl flex-grow-1 container-p-y"> 
                    <h5 class="py-3 mb-0"><span class="text-muted fw-light">Stok BHP /</span> Daftar Stok Bahan Habis Pakai</h5>
                    <h3 class="fw-bold py-2 mb-3">Ubah Stok BHP</h3>
                    <div class="row">
                        <form method="POST">
                            <div class="col">
                                <div class="card mb-4">
                                    <div class="card-body">
                                    <input type="hidden" class="form-control" name="kode_bhp" value="<?= $data['kode_bhp']; ?>">
                                        <div class="mb-3">
                                            <label for="kode_bhp" class="font-weight-bold">Kode BHP</label>
                                            <input type="text" class="form-control" name="kode_bhp" value="<?= $data['kode_bhp']; ?>" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama_bhp" class="font-weight-bold">Nama BHP</label>
                                            <input type="text" class="form-control" name="nama_bhp" value="<?= $data['nama_bhp']; ?>" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="stok">Stok BHP</label>
                                            <input type="number" class="form-control" id="stok_bhp" name="stok_bhp" value="<?= $data['stok_bhp']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary" name="submit">Tambah Data</button>
                                            <a class="btn batal-edit-stok-bhp btn-outline-primary" href="stok_bhp_show.php">Batal</a>
                                        </div>
                                </div>
                            </div>
                        </form>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>      
    <script type="text/javascript">
      $(document).on('click', '.batal-edit-stok-bhp', function(e) {
        e.preventDefault();
        Swal.fire({
            icon: 'warning',
            title: 'Keluar',
            text: 'Apakah Anda yakin untuk keluar dari halaman ini? Data yang telah ditulis tidak akan tersimpan.',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
            confirmButtonColor: '#0097B2',
        }).then(function(result) {
            if (result.isConfirmed) {
              window.location.href = "stok_bhp_show.php";
            }
      })
    });
    </script>
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