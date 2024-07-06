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

if (isset($_POST['submit'])) {
  if (tambahKlinik($_POST) > 0) {
    echo '
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">
    <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <script>
    $(document).ready(function() {
        Swal.fire({
            text: "Klinik berhasil ditambahkan!",
            icon: "success",
            confirmButtonText: "Ya",
            confirmButtonColor: "#0097B2",
            showConfirmButton: true,
        }).then(function(result) {
            if (result.isConfirmed) {
                window.location.href = "klinik_show.php";
            }
        })
    });
    </script>';
    die;
  } else {
      // setAlert('Gagal!', 'Klinik Gagal Ditambahkan', 'error');
      header("Location: klinik_tambah.php");
      die;
  }
}

?>
<!DOCTYPE html>
<html 
  lang="en" 
  class="light-style customizer-hide" 
  dir="ltr" 
  data-theme="theme-default" 
  data-assets-path="../assets/" data-template="vertical-menu-template-free"
>

<?php include 'head.php'; ?>

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
            <h4 class="mb-4">Menambahkan Data Klinik!</h4>

            <form class="mb-3" method="POST">
              <div class="mb-3 ">
                <label for="nama_klinik" class="form-label">Nama Klinik / Head Office</label>
                <input type="text" class="form-control" name="nama_klinik" placeholder="Masukan nama klinik/head office" autofocus required />
              </div>
              <div class="mb-3">
                <label for="jenis_klinik" class="form-label">Jenis Klinik</label>
                <select name="jenis_klinik" class="form-control" required>
                  <option selected value="Pilih Jenis Klinik" hidden>Pilih Jenis Klinik</option>
                  <option value="Klinik Umum">Klinik Umum</option>
                  <option value="Klinik Kecantikan">Klinik Kecantikan</option>
                  <option value="Klinik Gigi">Klinik Gigi</option>
                  <option value="Klinik Spesialis">Klinik Spesialis</option>
                  <option value="Klinik Psikologi">Klinik Psikologi</option>
                  <option value="Klinik Gizi">Klinik Gizi</option>
                  <option value="Klinik Kesehatan Reproduksi">Klinik Kesehatan Reproduksi</option>
                  <option value="Klinik Fisioterapi">Klinik Fisioterapi</option>
                  <option value="Klinik Kesehatan Anak">Klinik Kesehatan Anak</option>
                  <option value="Klinik Geriatri">Klinik Geriatri</option>
                </select>
              </div>
              <div class="mb-3 ">
                <label for="alamat_klinik" class="form-label">Alamat Klinik</label>
                <textarea name="alamat_klinik" class="form-control" placeholder="Masukan alamat klinik" required></textarea>
              </div>
              <div class="mb-3">
                <label for="nomor_telp" class="form-label">Nomor Telp</label>
                <input type="number" class="form-control" name="nomor_telp" placeholder="Masukan nomor telp Anda" required />
              </div>
              <div class="mb-3">
                <label for="jam_buka" class="form-label">Jam Buka</label>
                <input type="time" class="form-control" name="jam_buka" placeholder="Masukan jam buka Anda" required />
              </div>
              <div class="mb-3">
                <label for="jam_tutup" class="form-label">Jam Tutup</label>
                <input type="time" class="form-control" name="jam_tutup" placeholder="Masukan jam tutup Anda" required />
              </div>
              <div class="mb-3">
                <label for="status_klinik" class="form-label">Status Klinik</label>
                <select name="status_klinik" class="form-control" required>
                  <option value="Buka">Buka</option>
                  <option value="Tutup">Tutup</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="id_owner" class="form-label">Owner</label>
                <input type="hidden" name="id_owner" value="<?= $id_owner; ?>">
                <input type="text" class="form-control" value="<?= $nama_owner; ?>" disabled>
              </div>
              <div class="col-md-12 p-2 mb-1" style="height: auto; background-color: rgb(201, 222, 251);">
                <div class="row p-1">
                  <div class="col-sm-2 text-center">
                    <img src="data:image/png;base64,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" alt="register izidok klinik" height="45">
                  </div>
                  <small class=" col-sm-10 __text_klinik" style="font-size: 13px; margin-bottom: 0px; color: blue; font-weight: 600;">Akun ini akan menjadi akun utama yang diakses oleh penanggung jawab klinik pusat/manajemen klinik pusat.</small>
                </div>
              </div>

              <div class="mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox"/>
                  <label class="form-check-label" for="terms-conditions">
                    Saya setuju dengan semua
                    <a href="javascript:void(0);">Syarat & Ketentuan</a>
                    serta <a href="javascript:void(0);">Kebijakan Privasi</a> yang berlaku
                  </label>
                </div>
              </div>
              <button type="submit" name="submit" class="btn btn-primary d-grid w-100">Daftar</button>
              <a class="btn batal-tambah-klinik btn-outline-primary d-grid w-100" href="klinik_show.php">Batal</a>
            </form>
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
    <script src="../assets/vendor/libs/jquery/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/libs/jquery/jquery-3.4.1.min.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>      
    <script type="text/javascript">
      $(document).on('click', '.batal-tambah-klinik', function(e) {
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
              window.location.href = "klinik_show.php";
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