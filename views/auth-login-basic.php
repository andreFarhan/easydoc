<link rel="stylesheet" type="text/css" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">
<link rel="stylesheet" type="text/css" href="../node_modules/sweetalert2/dist/sweetalert2.css">
<script src="../node_modules/sweetalert2/dist/sweetalert2.js"></script>
<script src="../node_modules/sweetalert2/dist/sweetalert2.all.js"></script>
<script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<?php 
  include 'functions.php';

  if (isset($_POST['login'])) {
    $email = strtolower($_POST['email']);
    $password = $_POST['password'];

    $eksekusi_owner  = mysqli_query($koneksi, "SELECT * FROM tb_owner WHERE email = '$email'");
    $data_owner      = mysqli_fetch_array($eksekusi_owner);

    $eksekusi_dokter = mysqli_query($koneksi, "SELECT * FROM tb_dokter WHERE email = '$email'");
    $data_dokter     = mysqli_fetch_array($eksekusi_dokter);

    $eksekusi_staff = mysqli_query($koneksi, "SELECT * FROM tb_staff WHERE email = '$email'");
    $data_staff     = mysqli_fetch_array($eksekusi_staff);

    if ($data_owner) {
      if (password_verify($password, $data_owner['password'])) {
        $id_owner  = $data_owner['id_owner'];
        $nama_owner  = $data_owner['nama_owner'];
        $email  = $data_owner['email'];

        $_SESSION['id_owner']     = $id_owner;
        $_SESSION['nama_owner']   = $nama_owner;
        $_SESSION['email']        = $email;
        $_SESSION['login']        = 1;
      }else{
        
      }
    }  
    
    if ($data_dokter) {
      if (password_verify($password, $data_dokter['password'])) {
        $id_dokter  = $data_dokter['id_dokter'];
        $nama_dokter  = $data_dokter['nama_dokter'];
        $email  = $data_dokter['email'];
        $id_klinik  = $data_dokter['id_klinik'];

        $_SESSION['id_dokter']    = $id_dokter;
        $_SESSION['nama_dokter']  = $nama_dokter;
        $_SESSION['email']        = $email;
        $_SESSION['id_klinik']    = $id_klinik;
        $_SESSION['login']        = 1;

      }else{
        
      }
    }

    if ($data_staff) {
      if (password_verify($password, $data_staff['password'])) {
        $id_staff  = $data_staff['id_staff'];
        $nama_staff  = $data_staff['nama_staff'];
        $email  = $data_staff['email'];
        $role  = $data_staff['role'];
        $id_klinik  = $data_staff['id_klinik'];

        $_SESSION['id_staff']    = $id_staff;
        $_SESSION['nama_staff']  = $nama_staff;
        $_SESSION['email']       = $email;
        $_SESSION['role']        = $role;
        $_SESSION['id_klinik']   = $id_klinik;
        $_SESSION['login']       = 1;

      } else{
        
      }
  }
  if (isset($_SESSION['login'])) {
    
    echo '
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">
    <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <script>
    $(document).ready(function() {
        Swal.fire({
            title: "Login berhasil!",
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
      exit;
  } else {
    echo '
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">
    <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <script>
    $(document).ready(function() {
        Swal.fire({
            title: "Login gagal!",
            text: "Silakan cek kembali pengisian data Anda",
            icon: "error",
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
      exit;
  }
}

 ?>
<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
<?php include 'head.php'; ?>

  <body>
    <!-- Content -->

    <div class="container">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.php" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo mb-5">
                   <img src="../assets/img/favicon/4848.png">
                  </span>
                  <img src="../assets/img/easydoc3.png" style="width: 200px;" class="mb-5">
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-4">Selamat datang di easydoc!</h4>

              <form id="formAuthentication" class="mb-3" method="POST">
                <div class="mb-3">
                  <label for="email" class="form-label">Masukan Email</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Email"
                    autocomplete="email"
                    autofocus
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                <label class="form-label" for="password">Password</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="Password"
                      aria-describedby="password"
                      autocomplete="current-password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" />
                    <label class="form-check-label" for="remember-me">Ingat Saya </label>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit" name="login">Masuk</button>
                </div>
              </form>

              <p class="text-center">
                <span>Tidak memiliki akun?</span>
                <a href="auth-register-basic.php">
                  <span>Daftar disini</span>
                </a>
              </p>
            </div>
          </div>
          <!-- /Register -->
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
    <script src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="../assets/vendor/js/menu.js"></script>
    <script src="https://cdn.jsdelivr.net/sweetalert2/5.3.5/sweetalert2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
