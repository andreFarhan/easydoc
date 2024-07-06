<?php 

	include 'koneksi.php';

	if (isset($_POST['submit'])) {
        $nama_owner = ucwords(strtolower($_POST['nama_owner']));
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $alamat_owner = $_POST['alamat_owner'];
        $nomor_telp = $_POST['nomor_telp'];
        $email = strtolower($_POST['email']);
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $status = $_POST['status'];

        $result = mysqli_query($koneksi, "SELECT * FROM tb_owner WHERE email = '$email'");

        if (mysqli_fetch_assoc($result)) {
            echo '
            <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
            <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">
            <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
            <script>
            $(document).ready(function() {
                Swal.fire({
                    text: "Owner Gagal ditambahkan!, Email Telah Digunakan!",
                    icon: "error",
                    confirmButtonText: "Ya",
                    confirmButtonColor: "#b20f00",
                    showConfirmButton: true,
                }).then(function(result) {
                    if (result.isConfirmed) {
                        window.location.href = "auth-register-owner.php";
                    }
                })
            });
            </script>';
			die;
        }

        $result2 = mysqli_query($koneksi, "SELECT * FROM tb_dokter WHERE email = '$email'");

        if (mysqli_fetch_assoc($result2)) {
            echo '
            <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
            <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">
            <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
            <script>
            $(document).ready(function() {
                Swal.fire({
                    text: "Owner Gagal ditambahkan!, Email Telah Digunakan!",
                    icon: "error",
                    confirmButtonText: "Ya",
                    confirmButtonColor: "#b20f00",
                    showConfirmButton: true,
                }).then(function(result) {
                    if (result.isConfirmed) {
                        window.location.href = "auth-register-owner.php";
                    }
                })
            });
            </script>';
			die;
        }

        $result3 = mysqli_query($koneksi, "SELECT * FROM tb_staff WHERE email = '$email'");

        if (mysqli_fetch_assoc($result3)) {
            echo '
            <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
            <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">
            <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
            <script>
            $(document).ready(function() {
                Swal.fire({
                    text: "Owner Gagal ditambahkan!, Email Telah Digunakan!",
                    icon: "error",
                    confirmButtonText: "Ya",
                    confirmButtonColor: "#b20f00",
                    showConfirmButton: true,
                }).then(function(result) {
                    if (result.isConfirmed) {
                        window.location.href = "auth-register-owner.php";
                    }
                })
            });
            </script>';
			die;
        }

        if ($password !== $password2) {
            echo '
            <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
            <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">
            <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
            <script>
            $(document).ready(function() {
                Swal.fire({
                    text: "Owner Gagal ditambahkan!, Konfirmasi Password Salah!",
                    icon: "error",
                    confirmButtonText: "Ya",
                    confirmButtonColor: "#b20f00",
                    showConfirmButton: true,
                }).then(function(result) {
                    if (result.isConfirmed) {
                        window.location.href = "auth-register-owner.php";
                    }
                })
            });
            </script>';
			die;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO tb_owner VALUES('','$nama_owner','$jenis_kelamin','$alamat_owner','$nomor_telp','$email','$password','$status')";
        $eksekusi = mysqli_query($koneksi, $sql);

		if ($eksekusi) {
			echo '
            <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
            <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">
            <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
            <script>
            $(document).ready(function() {
                Swal.fire({
                    text: "Owner Berhasil ditambahkan!",
                    icon: "success",
                    confirmButtonText: "Ya",
                    confirmButtonColor: "#0097B2",
                    showConfirmButton: true,
                }).then(function(result) {
                    if (result.isConfirmed) {
                        window.location.href = "auth-login-basic.php";
                    }
                })
            });
            </script>';
			die;
        }
        else{
            echo '
            <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
            <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">
            <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
            <script>
            $(document).ready(function() {
                Swal.fire({
                    text: "Owner Gagal ditambahkan!",
                    icon: "error",
                    confirmButtonText: "Ya",
                    confirmButtonColor: "#b20f00",
                    showConfirmButton: true,
                }).then(function(result) {
                    if (result.isConfirmed) {
                        window.location.href = "auth-register-owner.php";
                    }
                })
            });
            </script>';
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
            <!-- Layout container -->
            <div class="content-wrapper"> 
                <div class="container-xxl flex-grow-1 container-p-y"> 
                    <h3 class="fw-bold py-2 mb-3">Register Owner</h3>
                    <div class="row">
                        <form method="POST">
                            <div class="col">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="nama_owner" class="font-weight-bold">Nama Owner</label>
                                            <p class="font-weight-bold m-0 text-primary" style="font-size: 10px;">Lengkap dengan gelar depan &amp; belakang jika ada</p>
                                            <p class="font-weight-bold m-0 text-danger" style="font-size: 10px;">Cth:Prof.dr.John Wick, Sp.PD</p>
                                            <input type="text" class="form-control" name="nama_owner" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="jenis_kelamin">Jenis Kelamin</label>
                                            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                                                <option selected value="Jenis Kelamin" hidden>Jenis Kelamin</option>
                                                <option name="jenis_kelamin" value="Laki-laki">Laki-laki</option>
                                                <option name="jenis_kelamin" value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="alamat_owner" >Alamat</label>
                                            <textarea name="alamat_owner" class="form-control" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nomor_telp">No. Handphone</label>
                                            <input type="number" class="form-control" name="nomor_telp" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" >Email</label>
                                            <input type="text" class="form-control" name="email" required>
                                        </div>
                                        <div class="form-password-toggle mb-3">
                                            <label for="password">Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required>
                                                <span id="password" class="input-group-text cursor-pointer"
                                                    ><i class="bx bx-hide"></i
                                                ></span>
                                            </div>
                                        </div>
                                        <div class="form-password-toggle mb-3">
                                            <label for="password2">Konfirmasi Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" name="password2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required>
                                                <span id="password2" class="input-group-text cursor-pointer"
                                                    ><i class="bx bx-hide"></i
                                                ></span>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="status" >Status</label>
                                            <select class="form-select" id="status" name="status">
                                                <option selected value="status" hidden>Pilih Status</option>
                                                <option value="Aktif">Aktif</option>
                                                <option value="Tidak Aktif">Tidak Aktif</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary" name="submit">Registrasi</button>
                                            <a class="btn batal-tambah-owner btn-outline-primary" href="auth-register-basic.php">Batal</a>
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
      $(document).on('click', '.batal-tambah-owner', function(e) {
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
              window.location.href = "auth-register-basic.php";
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