<?php

include 'functions.php';

//cek login
if ($_SESSION['login'] == 0) {
        header("Location: auth-login-basic.php");
}

if ($_SESSION['id_owner'] == 0) {
        header("Location: index.php");
}

if (isset($_POST['submit'])) {
  if (ubahKlinik($_POST) > 0) {
    echo '
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">
    <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <script>
    $(document).ready(function() {
        Swal.fire({
            text: "Data klinik berhasil diubah!",
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
    // setAlert('Gagal!', 'Klinik Gagal Diubah', 'error');
    header("Location: klinik_show.php");
    die;
  }
}

$id_klinik = $_GET['id_klinik'];

$sql_owner = "SELECT * FROM tb_owner";
$eksekusi_owner = mysqli_query($koneksi, $sql_owner);

$sql = "SELECT tb_klinik.id_klinik, tb_klinik.nama_klinik, tb_klinik.jenis_klinik, tb_klinik.alamat_klinik, tb_klinik.nomor_telp, tb_klinik.jam_buka, tb_klinik.jam_tutup, tb_klinik.status_klinik, tb_klinik.id_owner, tb_owner.nama_owner 
    FROM tb_klinik 
		INNER JOIN tb_owner ON tb_klinik.id_owner = tb_owner.id_owner
		WHERE id_klinik = '$id_klinik'";
$eksekusi = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($eksekusi);

?>
<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<?php include 'head.php'; ?>

<body>
  <!-- Navbar -->
  <?php include 'navbar.php'; ?>
  <!-- / Navbar -->
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
            <h4 class="mb-4">Mengubah Data Klinik!</h4>

            <form class="mb-3" method="POST">
              <input type="hidden" name="id_klinik" value="<?= $data['id_klinik']; ?>">
              <div class="mb-3 ">
                <label for="nama_klinik" class="form-label">Nama Klinik</label>
                <input type="text" class="form-control" name="nama_klinik" value="<?= $data['nama_klinik']; ?>" placeholder="Masukan nama klinik"/>
              </div>
              <div class="mb-3">
                <label for="jenis_klinik" class="form-label">Jenis Klinik</label>
                <select name="jenis_klinik" class="form-control">
                  <option value="<?= $data['jenis_klinik']; ?>" hidden><?= $data['jenis_klinik']; ?></option>
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
                <textarea name="alamat_klinik" class="form-control" placeholder="Masukan alamat klinik"><?= $data['alamat_klinik']; ?></textarea>
              </div>
              <div class="mb-3">
                <label for="nomor_telp" class="form-label">Nomor Telp</label>
                <input type="number" class="form-control" name="nomor_telp" value="<?= $data['nomor_telp']; ?>" placeholder="Masukan nomor telp Anda" />
              </div>
              <div class="mb-3">
                <label for="jam_buka" class="form-label">Jam Buka</label>
                <input type="time" class="form-control" name="jam_buka" value="<?= $data['jam_buka']; ?>" />
              </div>
              <div class="mb-3">
                <label for="jam_tutup" class="form-label">Jam Tutup</label>
                <input type="time" class="form-control" name="jam_tutup" value="<?= $data['jam_tutup']; ?>" />
              </div>
              <div class="mb-3">
                <label for="status_klinik" class="form-label">Status Klinik</label>
                <select name="status_klinik" class="form-control">
                  <option value="<?= $data['status_klinik']; ?>" hidden><?= $data['status_klinik']; ?></option>
                  <option value="Buka">Buka</option>
                  <option value="Tutup">Tutup</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="id_owner" class="form-label">Owner</label>
                <select name="id_owner" class="form-control">
                	<option value="<?= $data['id_owner']; ?>" hidden><?= $data['nama_owner']; ?></option>
                	<?php while($data_owner=mysqli_fetch_array($eksekusi_owner)): ?>
                	<option value="<?= $data_owner['id_owner']; ?>"><?= $data_owner['nama_owner']; ?></option>
                	<?php endwhile ?>
                </select>
              </div>
              <button type="submit" name="submit" class="btn btn-primary d-grid w-100">Ubah</button>
              <a class="btn batal-edit-klinik btn-outline-primary d-grid w-100" href="klinik_show.php">Batal</a>
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
  <script src="../assets/vendor/libs/popper/popper.js"></script>
  <script src="../assets/vendor/js/bootstrap.js"></script>
  <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="../assets/vendor/js/menu.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>      
    <script type="text/javascript">
      $(document).on('click', '.batal-edit-klinik', function(e) {
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

  <!-- Main JS -->
  <script src="../assets/js/main.js"></script>

  <!-- Page JS -->

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>