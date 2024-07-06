<?php

include 'koneksi.php';

if (isset($_SESSION['id_klinik'])) {
  $id_klinik = $_SESSION['id_klinik'];
  $sql_klinik = "SELECT * FROM tb_klinik WHERE id_klinik = '$id_klinik'";
  $eksekusi_klinik = mysqli_query($koneksi, $sql_klinik);
  $data_klinik = mysqli_fetch_array($eksekusi_klinik);
}

if (isset($_SESSION['id_owner'])) {
  $id_owner = $_SESSION['id_owner'];
}

if (isset($_SESSION['id_dokter'])) {
  $id_dokter = $_SESSION['id_dokter'];
}

if (isset($_SESSION['id_staff'])) {
  $id_staff = $_SESSION['id_staff'];
}

?>
<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
  <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
      <i class="bx bx-menu bx-sm"></i>
    </a>
  </div>

  <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    <div class="navbar-nav align-items-center">
      <div class="nav-item d-flex align-items-center">
        <?php if (isset($data_klinik)) : ?>
          <a href="klinik_info.php?id_klinik=<?= $id_klinik; ?>" class="btn btn-primary"><?= $data_klinik['nama_klinik']; ?></a>
        <?php else : ?>
          <a href="klinik_show.php" class="btn btn-primary">Manajemen Klinik</a>
        <?php endif ?>
        <?php if (isset($_SESSION['nama_owner'])) : ?>
          <a href="owner_info.php?id_owner=<?= $id_owner; ?>" class="btn btn-success"><?= $_SESSION['nama_owner']; ?></a>
        <?php elseif (isset($_SESSION['nama_dokter'])) : ?>
          <a href="dokter_info.php?id_dokter=<?= $id_dokter; ?>" class="btn btn-secondary"><?= $_SESSION['nama_dokter']; ?></a>
        <?php elseif (isset($_SESSION['nama_staff'])) : ?>
          <a href="staff_info.php?id_staff=<?= $id_staff; ?>" class="btn btn-warning"><?= $_SESSION['nama_staff']; ?></a>
        <?php endif ?>
        <?php if (isset($_SESSION['nama_owner'])) : ?>
          <a class="btn btn-success text-white">Owner</a>
        <?php elseif (isset($_SESSION['nama_dokter'])) : ?>
          <a class="btn btn-secondary text-white">Dokter</a>
        <?php elseif (isset($_SESSION['nama_staff'])) : ?>
          <a class="btn btn-warning text-white"><?= $_SESSION['role']; ?></a>
        <?php endif ?>
      </div>
    </div>

    <ul class="navbar-nav flex-row align-items-center ms-auto">

      <!-- User -->
      <li class="nav-item navbar-dropdown dropdown-user dropdown">
        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
          <div class="avatar">
            <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
          </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li>
            <?php if (isset($_SESSION['nama_owner'])) : ?>
              <a class="dropdown-item" href="owner_info.php?id_owner=<?= $id_owner; ?>">
              <?php elseif (isset($_SESSION['nama_dokter'])) : ?>
                <a class="dropdown-item" href="dokter_info.php?id_dokter=<?= $id_dokter; ?>">
                <?php elseif (isset($_SESSION['nama_staff'])) : ?>
                  <a class="dropdown-item" href="staff_info.php?id_staff=<?= $id_staff; ?>">
                  <?php endif ?>
                  <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                      <div class="avatar">
                        <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                      </div>
                    </div>
                    <div class="flex-grow-1">
                      <?php if (isset($_SESSION['nama_owner'])) : ?>
                        <span class="fw-semibold d-block"><?= $_SESSION['nama_owner']; ?></span>
                      <?php elseif (isset($_SESSION['nama_dokter'])) : ?>
                        <span class="fw-semibold d-block"><?= $_SESSION['nama_dokter']; ?></span>
                      <?php elseif (isset($_SESSION['nama_staff'])) : ?>
                        <span class="fw-semibold d-block"><?= $_SESSION['nama_staff']; ?></span>
                      <?php endif ?>

                      <?php if (isset($_SESSION['nama_owner'])) : ?>
                        <small class="text-muted">Owner</small>
                      <?php elseif (isset($_SESSION['nama_dokter'])) : ?>
                        <small class="text-muted">Dokter</small>
                      <?php elseif (isset($_SESSION['nama_staff'])) : ?>
                        <small class="text-muted"><?= $_SESSION['role']; ?></small>
                      <?php endif ?>
                    </div>
                  </div>
                  </a>
          </li>
          <li>
            <div class="dropdown-divider"></div>
          </li>
          <li>
            <a id="logout" class="dropdown-item" href="logout.php">
              <i class="bx bx-power-off me-2"></i>
              <span class="align-middle">Log Out</span>
            </a>
          </li>
        </ul>
      </li>
      <!--/ User -->
    </ul>
  </div>
</nav>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>      
    <script type="text/javascript">
      $(document).on('click', '#logout', function(e) {
        e.preventDefault();
        Swal.fire({
            icon: 'warning',
            title: 'Logout',
            text: 'Apakah Anda yakin untuk keluar dari halaman ini?',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
            confirmButtonColor: '#0097B2',
        }).then(function(result) {
            if (result.isConfirmed) {
              window.location.href = "logout.php";
            }
      })
    });
    </script>