<?php

include 'functions.php';

//cek login
if ($_SESSION['login'] == 0) {
    header("Location: auth-login-basic.php");
}

$id_owner = $_GET['id_owner'];
$sql = "SELECT * FROM tb_owner WHERE id_owner = $id_owner";
$eksekusi = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($eksekusi);

if (isset($_POST['submit'])) {
    if (ubahOwner($_POST) > 0) {
        echo '
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
        <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">
        <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
        <script>
        $(document).ready(function() {
            Swal.fire({
                text: "Data owner berhasil diubah!",
                icon: "success",
                confirmButtonText: "Ya",
                confirmButtonColor: "#0097B2",
                showConfirmButton: true,
            }).then(function(result) {
                if (result.isConfirmed) {
                    window.location.href = "index.php";
                }
            })
        });
        </script>';
        die;
    } else {
        // setAlert('Gagal!', 'Data Gagal Diubah', 'error');
        header("Location: index.php");
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
                    <h5 class="fw-bold py-3 mb-0"><span class="text-muted fw-light">Manajemen owner /</span> Daftar owner</h5>
                    <h3 class="fw-bold py-2 mb-3">Ubah Data owner</h3>
                    <div class="row">
                        <form method="POST">
                            <div class="col">
                                <div class="card mb-4">
                                    <div class="card-body">
                                    	<input type="hidden" name="id_owner" value="<?= $id_owner; ?>">
                                        <div class="mb-3">
                                            <label for="nama_owner" class="font-weight-bold">Nama Owner</label>
                                            <p class="font-weight-bold m-0 text-primary" style="font-size: 10px;">Lengkap dengan gelar depan &amp; belakang jika ada</p>
                                            <p class="font-weight-bold m-0 text-danger" style="font-size: 10px;">Cth:Prof.dr.John Wick, Sp.PD</p>
                                            <input type="text" class="form-control" name="nama_owner" value="<?= $data['nama_owner']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="jenis_kelamin">Jenis Kelamin</label>
                                            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                                                <option name="jenis_kelamin" value="<?= $data['jenis_kelamin']; ?>" hidden><?= $data['jenis_kelamin']; ?></option>
                                                <option name="jenis_kelamin" value="Laki-laki">Laki-laki</option>
                                                <option name="jenis_kelamin" value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="alamat_owner" >Alamat</label>
                                            <textarea name="alamat_owner" class="form-control" required><?= $data['alamat_owner']; ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nomor_telp">No. Handphone</label>
                                            <input type="number" class="form-control" name="nomor_telp" value="<?= $data['nomor_telp']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" >Email</label>
                                            <input type="text" class="form-control" name="email" value="<?= $data['email']; ?>" required>
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
                                            <label for="status" >Status</label>
                                            <select class="form-select" id="status" name="status">
                                                <option value="<?= $data['status']; ?>" hidden><?= $data['status']; ?></option>
                                                <option value="Aktif">Aktif</option>
                                                <option value="Tidak Aktif">Tidak Aktif</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary" name="submit">Ubah Data</button>
                                            <a class="btn batal-edit-owner btn-outline-primary" href="index.php">Batal</a>
                                        </div>
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
      $(document).on('click', '.batal-edit-owner', function(e) {
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
              window.location.href = "index.php";
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