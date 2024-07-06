<?php

include 'functions.php';

//cek login
if ($_SESSION['login'] == 0) {
    header("Location: auth-login-basic.php");
}

$id_klinik = $_SESSION['id_klinik'];

$sql = "SELECT * FROM tb_dokter WHERE id_klinik = '$id_klinik'
			ORDER BY id_dokter DESC
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
                    <h5 class="fw-bold py-3 mb-0"><span class="text-muted fw-light">Manajemen Dokter /</span> Daftar Dokter</h5>
                    <h3 class="fw-bold py-2 mb-3">Daftar Dokter</h3>
                    <div class="card">
                        <div class="row">      
                        <div class="col-md-4 align-self-end float-right ">
                            <a href="dokter_tambah.php" class="btn text-capitalize align-self-end float-right btn-primary mt-2"> tambah data 
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
                            <th>NAMA</th>
                            <th>JENIS KELAMIN</th>
                            <th>NO. SIP</th>
                            <th>MASA BERLAKU</th>
                            <th>SPESIALISASI</th>
                            <th>ALAMAT DOKTER</th>
                            <th>NO. HANDPHONE</th>
                            <th>EMAIL</th>
                            <th class="text-center">STATUS</th>
                            <th width="1%">AKSI</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            while ($data = mysqli_fetch_array($eksekusi)) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $data['nama_dokter']; ?></td>
                                <td><?= $data['jenis_kelamin']; ?></td>
                                <td><?= $data['sip']; ?></td>
                                <td style="text-align: center;"><?= $data['masa_berlaku']; ?></td>
                                <td><?= ucwords($data['spesialis']); ?></td>
                                <td><?= $data['alamat_dokter']; ?></td>
                                <td><?= $data['nomor_telp']; ?></td>
                                <td><?= strtolower($data['email']); ?></td>
                                <td style="text-align: center;"><span class="badge bg-label-primary me-1"><?= ucwords($data['status']); ?></span></td>
                                <td>
                                    <a id="tombol-edit" href="dokter_ubah.php?id_dokter=<?= $data['id_dokter']; ?>" class=""><i class='bx bx-edit'></i></a>
                                    <a type="button" class="" href="#" data-id="<?= $data['id_dokter']; ?>" onclick="confirmDelete(this);"><i class='bx bxs-trash-alt'></i></a>
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

    <script>
        function confirmDelete(self) {
            var id = self.getAttribute("data-id");

            document.getElementById("form-delete-user").id_dokter.value = id;
            $("#myModal").modal("show");
        }
    </script>

    <div id="myModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data</h4>
                    <a href="dokter_show.php">&times;</a>
                </div>

                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus pengguna ini ?</p>
                    <form method="GET" action="dokter_hapus.php" id="form-delete-user">
                        <input type="hidden" name="id_dokter">
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="submit" form="form-delete-user" class="btn btn-danger">Hapus</button>
                    <a class="btn batal-tambah-dokter btn-outline-primary" href="dokter_show.php">Batal</a>
                </div>

            </div>
        </div>
    </div>
</body>
</html>