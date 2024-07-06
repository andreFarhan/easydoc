<?php 

	include 'functions.php';

	//cek login
	if ($_SESSION['login'] == 0) {
		header("Location: auth-login-basic.php");
	}

	if (isset($_POST['submit'])) {
		if (tambahDokter($_POST) > 0) {
            echo '
            <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
            <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">
            <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
            <script>
            $(document).ready(function() {
                Swal.fire({
                    text: "Dokter Berhasil ditambahkan!",
                    icon: "success",
                    confirmButtonText: "Ya",
                    confirmButtonColor: "#0097B2",
                    showConfirmButton: true,
                }).then(function(result) {
                    if (result.isConfirmed) {
                        window.location.href = "dokter_show.php";
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
                    text: "Dokter Gagal ditambahkan!",
                    icon: "error",
                    confirmButtonText: "Ya",
                    confirmButtonColor: "#b20f00",
                    showConfirmButton: true,
                }).then(function(result) {
                    if (result.isConfirmed) {
                        window.location.href = "dokter_tambah.php";
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
                    <h5 class="py-3 mb-0"><span class="text-muted fw-light">Manajemen Dokter /</span> Daftar Dokter</h5>
                    <h3 class="fw-bold py-2 mb-3">Tambah Data Dokter</h3>
                    <div class="row">
                        <form method="POST">
                            <div class="col">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="nama_dokter" class="font-weight-bold">Nama Dokter</label>
                                            <p class="font-weight-bold m-0 text-primary" style="font-size: 10px;">Lengkap dengan gelar depan &amp; belakang jika ada</p>
                                            <p class="font-weight-bold m-0 text-danger" style="font-size: 10px;">Cth:Prof.dr.John Wick, Sp.PD</p>
                                            <input type="text" class="form-control" name="nama_dokter" required>
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
                                            <label for="sip">SIP Dokter</label>
                                            <p class="font-weight-bold m-0 text-primary" style="font-size: 10px;">Lengkap dengan simbol/tanda baca</p>
                                            <p class="font-weight-bold m-0 text-danger" style="font-size: 10px;">Cth:446/015/SIP-DS/III.00-WW/IV/2019</p>
                                            <input type="text" class="form-control" id="sip" name="sip" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="masa_berlaku">Masa Berlaku</label>
                                            <input type="date" class="form-control" name="masa_berlaku" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="spesialis" >Spesialis</label>
                                            <select class="form-select" id="spesialis" name="spesialis">
                                            <option selected>Pilih Spesialis</option>
                                            <option value="Spesialis Penyakit Dalam">Spesialis Penyakit Dalam</option>
                                            <option value="Umum">Umum</option>
                                            <option value="Gigi">Gigi</option>
                                            <option value="Spesialis Penyakit Dalam">Spesialis Penyakit Dalam</option>
                                            <option value="Spesialis Anak">Spesialis Anak</option>
                                            <option value="Spesialis Obstetri & Ginekologi">Spesialis Obstetri & Ginekologi</option>
                                            <option value="Spesialis Jantung & Pembuluh Darah">Spesialis Jantung & Pembuluh Darah</option>
                                            <option value="Spesialis Kulit & Kelamin">Spesialis Kulit & Kelamin</option>
                                            <option value="Spesialis Mata">Spesialis Mata</option>
                                            <option value="Spesialis Saraf">Spesialis Saraf</option>
                                            <option value="Spesialis THT">Spesialis THT</option>
                                            <option value="Spesialis Paru">Spesialis Paru</option>
                                            <option value="Spesialis Urologi">Spesialis Urologi</option>
                                            <option value="Spesialis Geriatri/Gerontologi">Spesialis Geriatri/Gerontologi</option>
                                            <option value="Spesialis Gigi Anak">Spesialis Gigi Anak</option>
                                            <option value="Spesialis Konservatori Gigi">Spesialis Konservatori Gigi</option>
                                            <option value="Spesialis Ortodonsia (Gigi)">Spesialis Ortodonsia (Gigi)</option>
                                            <option value="Spesialis Prostodonsia (Gigi)">Spesialis Prostodonsia (Gigi)</option>
                                            <option value="Spesialis Periodonsia (Gigi)">Spesialis Periodonsia (Gigi)</option>
                                            <option value="Spesialis Bedah Mulut & Maksilofasial (Gigi)">Spesialis Bedah Mulut & Maksilofasial (Gigi)</option>
                                            <option value="Spesialis Gizi Klinik">Spesialis Gizi Klinik</option>
                                            <option value="Spesialis Akupunktur Medis">Spesialis Akupunktur Medis</option>
                                            <option value="Spesialis Kedokteran Jiwa">Spesialis Kedokteran Jiwa</option>
                                            <option value="Spesialis Ortopedi">Spesialis Ortopedi</option>
                                            <option value="Spesialis Kedokteran Olahraga">Spesialis Kedokteran Olahraga</option>
                                            <option value="Spesialis Kedokteran Okupasi">Spesialis Kedokteran Okupasi</option>
                                            <option value="Spesialis Kedokteran Fisik & Rehabilitasi">Spesialis Kedokteran Fisik & Rehabilitasi</option>
                                            <option value="Spesialis Alergi & Imunologi">Spesialis Alergi & Imunologi</option>
                                            <option value="Spesialis Andrologi">Spesialis Andrologi</option>
                                            <option value="Spesialis Anestesi">Spesialis Anestesi</option>
                                            <option value="Spesialis Bedah">Spesialis Bedah</option>
                                            <option value="Spesialis Bedah Anak">Spesialis Bedah Anak</option>
                                            <option value="Spesialis Bedah Plastik">Spesialis Bedah Plastik</option>
                                            <option value="Spesialis Bedah Saraf">Spesialis Bedah Saraf</option>
                                            <option value="Spesialis Bedah Toraks Kardiovaskuler">Spesialis Bedah Toraks Kardiovaskuler</option>
                                            <option value="Spesialis Endokrinologi">Spesialis Endokrinologi</option>
                                            <option value="Spesialis Gastroenterologi">Spesialis Gastroenterologi</option>
                                            <option value="Spesialis Hematologi & Transfusi Darah">Spesialis Hematologi & Transfusi Darah</option>
                                            <option value="Spesialis Kardioserebrovaskular">Spesialis Kardioserebrovaskular</option>
                                            <option value="Spesialis Kedokteran Kelautan">Spesialis Kedokteran Kelautan</option>
                                            <option value="Spesialis Kedokteran Penerbangan">Spesialis Kedokteran Penerbangan</option>
                                            <option value="Spesialis Nefrologi (Ginjal & Hipertensi)">Spesialis Nefrologi (Ginjal & Hipertensi)</option>
                                            <option value="Spesialis Onkologi">Spesialis Onkologi</option>
                                            <option value="Spesialis Patologi Klinik">Spesialis Patologi Klinik</option>
                                            <option value="Spesialis Reumatologi">Spesialis Reumatologi</option>
                                            <option value="Psikolog Klinis">Psikolog Klinis</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="alamat_dokter">Alamat Dokter</label>
                                            <textarea name="alamat_dokter" class="form-control"></textarea>
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
                                            <label for="id_klinik">Klinik</label>
                                            <input type="text" class="form-control" value="<?= $data_klinik['nama_klinik']; ?>" disabled>
                                            <input type="hidden" name="id_klinik" value="<?= $id_klinik; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary" name="submit">Tambah Data</button>
                                            <a class="btn batal-tambah-dokter btn-outline-primary" href="dokter_show.php">Batal</a>
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
      $(document).on('click', '.batal-tambah-dokter', function(e) {
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
              window.location.href = "dokter_show.php";
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