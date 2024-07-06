<?php

include 'functions.php';

//cek login
if ($_SESSION['login'] == 0) {
    header("Location: auth-login-basic.php");
}
if ($_SESSION['id_owner'] == 0) {
    header("Location: index.php");
}

$id_owner = $_SESSION['id_owner'];
$nama_owner = $_SESSION['nama_owner'];

$sql = "SELECT * FROM tb_klinik WHERE id_owner = '$id_owner'";
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
  <!-- Navbar -->
  <?php include 'navbar.php'; ?>
  <!-- / Navbar -->
    <div class="content-wrapper"> 
        <div class="container-xxl flex-grow-1 container-p-y"> 
            <h5 class="fw-bold py-3 mb-0"><span class="text-muted fw-light">Manajemen Klinik /</span> Daftar Klinik</h5>
            <h3 class="fw-bold py-2 mb-3">Daftar Klinik</h3>
            <div class="card">
                <div class="row">      
                <div class="col-md-4 align-self-end float-right ">
                    <a href="klinik_tambah.php" class="btn text-capitalize align-self-end float-right btn-primary mt-6"> tambah data 
                    </a>
                </div>
                </div> 
            <div class="table-responsive text-nowrap mt-4">
            <table class="table" id="Table">
                <caption class="ms-4">
                Display
                </caption>
                <thead>
                <tr>
                    <th width="1%">NO</th>
                    <th>NAMA KLINIK</th>
                    <th>JENIS KLINIK</th>
                    <th>ALAMAT KLINIK</th>
                    <th>NO. TELP KLINIK</th>
                    <th>JAM BUKA</th>
                    <th>JAM TUTUP</th>
                    <th>STATUS KLINIK</th>
                    <th>PEMILIK</th>
                    <th width="1%">AKSI</th>
                </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    while ($data = mysqli_fetch_array($eksekusi)) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><a href="index.php?id_klinik=<?= $data['id_klinik']; ?>"><?= $data['nama_klinik']; ?></a></td>
                        <td><?= $data['jenis_klinik']; ?></td>
                        <td><?= $data['alamat_klinik']; ?></td>
                        <td><?= $data['nomor_telp']; ?></td>
                        <td class="text-center"><?= $data['jam_buka']; ?></td>
                        <td class="text-center"><?= $data['jam_tutup']; ?></td>
                        <td style="text-align: center;">
                            <?php if ($data['status_klinik'] == 'Buka'): ?>
                            <span class="badge bg-label-primary me-1"><?= ucwords($data['status_klinik']); ?></span>
                            <?php else: ?>
                            <span class="badge bg-label-danger me-1"><?= ucwords($data['status_klinik']); ?></span>
                            <?php endif ?>
                        </td>
                        <td><?= $nama_owner; ?></td>
                        <td>
                            <a id="tombol-hapus" href="klinik_ubah.php?id_klinik=<?= $data['id_klinik']; ?>" class=""><i class='bx bx-edit'></i></a>
                            <a type="button" class="" href="#" data-id="<?= $data['id_klinik']; ?>" onclick="confirmDelete(this);"><i class='bx bxs-trash-alt'></i></a>

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


      <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    
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

    <script>
        function confirmDelete(self) {
            var id = self.getAttribute("data-id");

            document.getElementById("form-delete-user").id_klinik.value = id;
            $("#myModal").modal("show");
        }
    </script>

    <div id="myModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data</h4>
                    <a href="klinik_show.php">&times;</a>
                </div>

                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus klinik ini ?</p>
                    <form method="GET" action="klinik_hapus.php" id="form-delete-user">
                        <input type="hidden" name="id_klinik">
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="submit" form="form-delete-user" class="btn btn-danger">Hapus</button>
                    <a class="btn batal-tambah-klinik btn-outline-primary" href="klinik_show.php">Batal</a>
                </div>

            </div>
        </div>
    </div>
</body>
</html>