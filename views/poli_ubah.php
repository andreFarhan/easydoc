<?php

include 'functions.php';

//cek login
if ($_SESSION['login'] == 0) {
    header("Location: auth-login-basic.php");
}

$id_poli = $_GET['id_poli'];
$sql = "SELECT * FROM tb_poli 
            INNER JOIN tb_dokter ON tb_poli.id_dokter = tb_dokter.id_dokter
            WHERE id_poli = $id_poli";
$eksekusi = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($eksekusi);

if (isset($_POST['submit'])) {
    if (ubahPoli($_POST) > 0) {
        echo '
                <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
                <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">
                <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
                <script>
                $(document).ready(function() {
                    Swal.fire({
                        text: "Data berhasil diubah!",
                        icon: "success",
                        confirmButtonText: "Ya",
                        confirmButtonColor: "#0097B2",
                        showConfirmButton: true,
                    }).then(function(result) {
                        if (result.isConfirmed) {
                            window.location.href = "poli_show.php";
                        }
                    })
                });
                </script>';
        die;
    } else {
        // setAlert('Gagal!','Data Gagal Diubah','error');
        header("Location: poli_show.php");
        die;
    }
}

$id_klinik = $_SESSION['id_klinik'];

$sql_dokter = "SELECT * FROM tb_dokter WHERE id_klinik = '$id_klinik'";
$eksekusi_dokter = mysqli_query($koneksi, $sql_dokter);
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
                    <h5 class="py-3 mb-0"><span class="text-muted fw-light">Manajemen Poliklinik /</span> Daftar Poliklinik</h5>
                    <h3 class="fw-bold py-2 mb-3">Ubah Data Poliklinik</h3>
                    <div class="row">
                        <form method="POST">
                            <div class="col">
                                <div class="card mb-4">
                                    <div class="card-body">
                                    <input type="hidden" name="id_poli" value="<?= $id_poli; ?>">
                                        <div class="mb-3">
                                            <label for="nama_poli" class="font-weight-bold">Nama Poliklinik</label>
                                            <input type="text" class="form-control" name="nama_poli" value="<?= $data['nama_poli']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="kategori_pasien">Kategori Pasien</label>
                                            <select class="form-select" id="kategori_pasien" name="kategori_pasien">
                                                <option value="<?= $data['kategori_pasien']; ?>" hidden><?= $data['kategori_pasien']; ?></option>
                                                <option value="Umum">Umum</option>
                                                <option value="BPJS">BPJS</option>
                                                <option value="Asuransi">Asuransi</option>
                                                <option value="Gratis">Gratis</option>
                                                <option value="Lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="sip">Durasi Konsultasi/Pasien</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="durasi" name="durasi" value="<?= $data['durasi']; ?>" required>
                                                <label class="input-group-text" for="durasi">Menit</label>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="jadwal_poli">Jadwal Poliklinik</label>
                                            <textarea name="jadwal_poli" id="jadwal_poli" class="form-control" required><?= $data['jadwal_poli']; ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="id_dokter" >Dokter</label>
                                            <select class="form-select" name="id_dokter" id="id_dokter" placeholder="Pilih Nama Dokter"required>
                                                <option value="<?= $data['id_dokter']; ?>" hidden><?= $data['nama_dokter']; ?></option>
                                            <?php while ($data_dokter = mysqli_fetch_array($eksekusi_dokter)) : ?>
                                                <option value="<?= $data_dokter['id_dokter']; ?>"><?= $data_dokter['nama_dokter']; ?></option>
                                            <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="status_poli" >Status Poliklinik</label>
                                            <select class="form-select" id="status_poli" name="status_poli">
                                                <option value="<?= $data['status_poli']; ?>" hidden><?= $data['status_poli']; ?></option>
                                                <option value="Buka" name="status_poli" >Buka</option>
                                                <option value="Tutup" name="status_poli">Tutup</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn edit-poli btn-primary" name="submit">Ubah Data</button>
                                            <a class="btn batal-edit-poli btn-outline-primary" href="poli_show.php">Batal</a>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>                                            
    <script src="../assets/vendor/js/menu.js"></script>
    <script type="text/javascript">
      $(document).on('click', '.batal-edit-poli', function(e) {
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
              window.location.href = "poli_show.php";
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