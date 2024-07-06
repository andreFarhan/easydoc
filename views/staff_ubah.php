<?php  
	
	include 'functions.php';

	//cek login
	if ($_SESSION['login'] == 0) {
		header("Location: auth-login-basic.php");
	}

    $id_staff = $_GET['id_staff'];
    $sql = "SELECT * FROM tb_staff WHERE id_staff = $id_staff";
    $eksekusi = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_assoc($eksekusi);

	if (isset($_POST['submit'])) {
		if (ubahStaff($_POST) > 0 ) {
			echo '
                <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
                <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">
                <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
                <script>
                $(document).ready(function() {
                    Swal.fire({
                        text: "Data staff berhasil diubah!",
                        icon: "success",
                        confirmButtonText: "Ya",
                        confirmButtonColor: "#0097B2",
                        showConfirmButton: true,
                    }).then(function(result) {
                        if (result.isConfirmed) {
                            window.location.href = "staff_show.php";
                        }
                    })
                });
                </script>';
		}
		else{
			// setAlert('Gagal!','Data Gagal Diubah','error');
			header("Location: staff_show.php");
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
                    <h5 class="py-3 mb-0"><span class="text-muted fw-light">Manajemen Staff /</span> Daftar Staff</h5>
                    <h3 class="fw-bold py-2 mb-3">Ubah Data Staff</h3>
                    <div class="row">
                        <form method="POST">
                            <div class="col">
                                <div class="card mb-4">
                                    <div class="card-body">
                                    <input type="hidden" name="id_staff" value="<?= $id_staff; ?>">
                                        <div class="mb-3">
                                            <label for="nama_staff" class="font-weight-bold">Nama Staff</label>
                                            <input type="text" class="form-control" name="nama_staff" value="<?= $data['nama_staff']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="jenis_kelamin">Jenis Kelamin</label>
                                            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" value="<?= $data['jenis_kelamin']; ?>">
                                                <option value="<?= $data['jenis_kelamin']; ?>"><?= $data['jenis_kelamin']; ?></option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="alamat_staff">Alamat Staff</label>
                                            <textarea name="alamat_staff" class="form-control"><?= $data['alamat_staff']; ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nomor_telp">No. Handphone</label>
                                            <input type="number" class="form-control" name="nomor_telp" value="<?= $data['nomor_telp']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" >Email</label>
                                            <input type="text" class="form-control" value="<?= $data['email']; ?>" disabled>
                                            <input type="hidden" name="email" value="<?= $data['email']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="password_lama">Password Lama</label>
                                            <input type="password" class="form-control" name="password_lama" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password">Password Baru</label>
                                            <input type="password" class="form-control" name="password" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password2">Konfirmasi Password</label>
                                            <input type="password" class="form-control" name="password2" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="role" >Role</label>
                                            <select class="form-select" id="role" name="role">
                                                <option value="<?= $data['role']; ?>" hidden><?= $data['role']; ?></option>
                                                <option value="Perawat">Perawat</option>
                                                <option value="Front Desk">Front Desk</option>
                                                <option value="Kasir">Kasir</option>
                                                <option value="Apoteker">Apoteker</option>
                                                <option value="PIC Klinik">PIC Klinik</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="status">Status</label>
                                            <select class="form-select" name="status">
                                                <option value="<?= $data['status']; ?>" hidden><?= ucwords($data['status']); ?></option>
                                                <option value="Aktif">Aktif</option>
                                                <option value="Tidak Aktif">Tidak Aktif</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="id_klinik">Klinik</label>
                                            <input type="text" class="form-control" value="<?= $data_klinik['nama_klinik']; ?>" disabled>
                                            <input type="hidden" name="id_klinik" value="<?= $id_klinik; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary" name="submit">Ubah Data<i class="fa fa-paper-plane"></i></button>
                                            <a class="btn batal-edit-staff btn-outline-primary" href="staff_show.php">Batal</a>
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
      $(document).on('click', '.batal-edit-staff', function(e) {
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
              window.location.href = "staff_show.php";
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
    <?php include 'footer.php'; ?>

</body>