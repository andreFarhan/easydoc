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
                    <h5 class="fw-bold py-3 mb-0"><span class="text-muted fw-light">Manajemen Owner /</span> Info Owner</h5>
                    <div class="row">
                    <h3 class="fw-bold py-2 mb-3">Data Owner</h3>
                        <form method="POST">
                            <div class="col">
                                <div class="card mb-4">
                                    <div class="card-body">
                                    	<input disabled type="hidden" name="id_owner" value="<?= $id_owner; ?>">
                                        <div class="mb-3">
                                            <label for="nama_owner" class="font-weight-bold">Nama Owner</label>
                                            <input disabled type="text" class="form-control" name="nama_owner" value="<?= $data['nama_owner']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="jenis_kelamin">Jenis Kelamin</label>
                                            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" disabled>
                                                <option name="jenis_kelamin" value="<?= $data['jenis_kelamin']; ?>" hidden><?= $data['jenis_kelamin']; ?></option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="alamat_owner" >Alamat</label>
                                            <textarea name="alamat_owner" class="form-control" required disabled><?= $data['alamat_owner']; ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nomor_telp">No. Handphone</label>
                                            <input disabled type="number" class="form-control" name="nomor_telp" value="<?= $data['nomor_telp']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" >Email</label>
                                            <input disabled type="text" class="form-control" name="email" value="<?= $data['email']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="status" >Status</label>
                                            <select class="form-select" id="status" name="status" disabled>
                                                <option value="<?= $data['status']; ?>" hidden><?= $data['status']; ?></option>
                                            </select>
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