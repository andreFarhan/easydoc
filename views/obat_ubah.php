<?php 

	include 'functions.php';

	//cek login
	if ($_SESSION['login'] == 0) {
		header("Location: auth-login-basic.php");
	}

	$kode_obat = $_GET['kode_obat'];
	$sql = "SELECT * FROM tb_obat WHERE kode_obat = '$kode_obat'";
	$eksekusi = mysqli_query($koneksi, $sql);
	$data = mysqli_fetch_assoc($eksekusi);

	if (isset($_POST['submit'])) {
		if (ubahObat($_POST) > 0) {
			echo '
                <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
                <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">
                <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
                <script>
                $(document).ready(function() {
                    Swal.fire({
                        text: "Data obat berhasil diubah!",
                        icon: "success",
                        confirmButtonText: "Ya",
                        confirmButtonColor: "#0097B2",
                        showConfirmButton: true,
                    }).then(function(result) {
                        if (result.isConfirmed) {
                            window.location.href = "obat_show.php";
                        }
                    })
                });
                </script>';
			die;
		}
		else{
			// setAlert('Gagal!','Data Gagal Diubah','error');
			header("Location: obat_show.php");
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
                    <h5 class="py-3 mb-0"><span class="text-muted fw-light">Manajemen Obat /</span> Daftar Obat</h5>
                    <h3 class="fw-bold py-2 mb-3">Ubah Data Obat</h3>
                    <div class="row">
                        <form method="POST">
                            <div class="col">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="kode_obat" class="font-weight-bold">Kode Obat</label>
                                            <input type="text" class="form-control" name="kode_obat" value="<?= $data['kode_obat']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama_obat" class="font-weight-bold">Nama Obat</label>
                                            <input type="text" class="form-control" name="nama_obat"  value="<?= $data['nama_obat']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="kategori_obat">Kategori Obat</label>
                                            <select class="form-select" id="kategori_obat" name="kategori_obat">
                                                <option value="<?= $data['kategori_obat']; ?>"><?= $data['kategori_obat']; ?></option>
                                                <option value="Lainnya">Lainnya</option>
                                                <option value="Fitofarmaka">Fitofarmaka</option>
                                                <option value="Generik">Generik</option>
                                                <option value="Jamu">Jamu</option>
                                                <option value="Kosmetika">Kosmetika</option>
                                                <option value="Labor">Labor</option>
                                                <option value="Narkotik">Narkotik</option>
                                                <option value="Obat Bebas">Obat Bebas</option>
                                                <option value="Obat Bebas Terbatas">Obat Bebas Terbatas</option>
                                                <option value="Obat Hebal Terstandar">Obat Hebal Terstandar</option>
                                                <option value="Obat Keras">Obat Keras</option>
                                                <option value="OOT">OOT</option>
                                                <option value="OTC">OTC</option>
                                                <option value="Paten Antibiotik">Paten Antibiotik</option>
                                                <option value="Paten Keras">Paten Keras</option>
                                                <option value="Prekursor">Prekursor</option>
                                                <option value="Prekursor Kombinasi">Prekursor Kombinasi</option>
                                                <option value="Psikotropik">Psikotropik</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="jenis_obat">Jenis Obat</label>
                                            <select class="form-select" id="jenis_obat" name="jenis_obat">
                                                <option value="<?= $data['jenis_obat']; ?>"><?= $data['jenis_obat']; ?></option>
                                                <option value="Lainnya">Lainnya</option>
                                                <option value="Lainnya">Lainnya</option>
                                                <option value="5 Alfa Reduktase Inhibitor">5 Alfa Reduktase Inhibitor</option>
                                                <option value="Alfa Bloker">Alfa Bloker</option>
                                                <option value="Anafilaksis">Anafilaksis</option>
                                                <option value="Analgesik Narkotik">Analgesik Narkotik</option>
                                                <option value="Analgesik Non Narkotik">Analgesik Non Narkotik</option>
                                                <option value="Anastetik lokal">Anastetik lokal</option>
                                                <option value="Anastetik Umum">Anastetik Umum</option>
                                                <option value="Antasida dan ulkus Antibusa (Obat untuk saluran cerna)">Antasida dan ulkus Antibusa (Obat untuk saluran cerna)</option>
                                                <option value="Antelmentik Intestinal">Antelmentik Intestinal</option>
                                                <option value="Anti ADHD (Psikofarmaka)">Anti ADHD (Psikofarmaka)</option>
                                                <option value="Anti Alergi">Anti Alergi</option>
                                                <option value="Anti Anemia">Anti Anemia</option>
                                                <option value="Anti Hipertiroidisme">Anti Hipertiroidisme</option>
                                                <option value="Antiacne">Antiacne</option>
                                                <option value="Antiangina">Antiangina</option>
                                                <option value="Antiansietas dan Antiinsomnia (Psikofarmaka)">Antiansietas dan Antiinsomnia (Psikofarmaka)</option>
                                                <option value="Antiasma (Obat untuk Saluran Nafas)">Antiasma (Obat untuk Saluran Nafas)</option>
                                                <option value="Antibakteri">Antibakteri</option>
                                                <option value="Antibakteri Golongan Aminoglikosida">Antibakteri Golongan Aminoglikosida</option>
                                                <option value="Antibakteri Golongan Kloramfenikol">Antibakteri Golongan Kloramfenikol</option>
                                                <option value="Antibakteri Golongan Kuinolon">Antibakteri Golongan Kuinolon</option>
                                                <option value="Antibakteri Golongan lain-lain">Antibakteri Golongan lain-lain</option>
                                                <option value="Antibakteri Golongan Makrolid">Antibakteri Golongan Makrolid</option>
                                                <option value="Antibakteri Golongan Penisilin">Antibakteri Golongan Penisilin</option>
                                                <option value="Antibakteri Golongan Sefalosporin">Antibakteri Golongan Sefalosporin</option>
                                                <option value="Antibakteri Golongan Tetrasiklin">Antibakteri Golongan Tetrasiklin</option>
                                                <option value="Antidementia">Antidementia</option>
                                                <option value="Antidepresi dan Antimania (Psikofarmaka)">Antidepresi dan Antimania (Psikofarmaka)</option>
                                                <option value="Antidiabetik Oral">Antidiabetik Oral</option>
                                                <option value="Antidiabetik Parenteral">Antidiabetik Parenteral</option>
                                                <option value="Antidisritmia">Antidisritmia</option>
                                                <option value="Antidot Khusus">Antidot Khusus</option>
                                                <option value="Antidot Umum">Antidot Umum</option>
                                                <option value="Antieksem">Antieksem</option>
                                                <option value="Antiemetik (Obat untuk saluran cerna)">Antiemetik (Obat untuk saluran cerna)</option>
                                                <option value="Antiepilepsi">Antiepilepsi</option>
                                                <option value="Antifilaria">Antifilaria</option>
                                                <option value="Antifungi(Antimikroba)">Antifungi(Antimikroba)</option>
                                                <option value="Antifungi(Obat Topikal Untuk kulit)">Antifungi(Obat Topikal Untuk kulit)</option>
                                                <option value="Antihemorrhoid (Obat untuk saluran cerna)">Antihemorrhoid (Obat untuk saluran cerna)</option>
                                                <option value="Antihipertensi Gol lain-lain">Antihipertensi Gol lain-lain</option>
                                                <option value="Antihipertensi Gol. ACE Inhibitor">Antihipertensi Gol. ACE Inhibitor</option>
                                                <option value="Antihipertensi Gol.Alpha Bloker">Antihipertensi Gol.Alpha Bloker</option>
                                                <option value="Antihipertensi Gol.Angiotensin II Antagonis">Antihipertensi Gol.Angiotensin II Antagonis</option>
                                                <option value="Antihipertensi Gol.Beta Bloker">Antihipertensi Gol.Beta Bloker</option>
                                                <option value="Antihipertensi Gol.Calcium Channel Blocker">Antihipertensi Gol.Calcium Channel Blocker</option>
                                                <option value="AntiHipotiroidisme">AntiHipotiroidisme</option>
                                                <option value="Antihormon">Antihormon</option>
                                                <option value="Antiinflamasi (Obat Untuk Mata Topikal)">Antiinflamasi (Obat Untuk Mata Topikal)</option>
                                                <option value="Antikoagulan Antiplatelet & thrombolitik">Antikoagulan Antiplatelet & thrombolitik</option>
                                                <option value="Antilepraktik">Antilepraktik</option>
                                                <option value="Antimalaria">Antimalaria</option>
                                                <option value="Antimigrain">Antimigrain</option>
                                                <option value="Antimikroba (Obat Untuk Mata Topikal)">Antimikroba (Obat Untuk Mata Topikal)</option>
                                                <option value="Antimuskarinik">Antimuskarinik</option>
                                                <option value="Antineoplastik">Antineoplastik</option>
                                                <option value="Antineoplastik">Antineoplastik</option>
                                                <option value="Antiobsesi dan Antimania (Psikofarmaka)">Antiobsesi dan Antimania (Psikofarmaka)</option>
                                                <option value="Antiparkinson">Antiparkinson</option>
                                                <option value="Antipirai">Antipirai</option>
                                                <option value="Antipiretik">Antipiretik</option>
                                                <option value="Antipruritus dan Antihistamin topical">Antipruritus dan Antihistamin topical</option>
                                                <option value="Antipsikosis (Psikofarmaka)">Antipsikosis (Psikofarmaka)</option>
                                                <option value="Antiradang topical">Antiradang topical</option>
                                                <option value="Antirematik">Antirematik</option>
                                                <option value="Antiretroviral">Antiretroviral</option>
                                                <option value="Antiseptik">Antiseptik</option>
                                                <option value="Antiseptik dan Desinfektan">Antiseptik dan Desinfektan</option>
                                                <option value="Antiskabies">Antiskabies</option>
                                                <option value="Antispasmodik (Obat untuk saluran cerna)">Antispasmodik (Obat untuk saluran cerna)</option>
                                                <option value="Antituberculosis">Antituberculosis</option>
                                                <option value="Antitusif (Obat untuk Saluran Nafas)">Antitusif (Obat untuk Saluran Nafas)</option>
                                                <option value="Antivertigo">Antivertigo</option>
                                                <option value="Antivirus(Antimikroba)">Antivirus(Antimikroba)</option>
                                                <option value="Antivirus(Obat Topikal Untuk kulit)">Antivirus(Obat Topikal Untuk kulit)</option>
                                                <option value="Dekongestan Antiinfluenzadll (Obat untuk Saluran Nafas)">Dekongestan Antiinfluenzadll (Obat untuk Saluran Nafas)</option>
                                                <option value="Diagnostik">Diagnostik</option>
                                                <option value="Diuretik">Diuretik</option>
                                                <option value="Estrogen">Estrogen</option>
                                                <option value="Glikosida Jantung">Glikosida Jantung</option>
                                                <option value="GNRH Analog FSH/LH">GNRH Analog FSH/LH</option>
                                                <option value="Hematopoetik">Hematopoetik</option>
                                                <option value="Hemistatik">Hemistatik</option>
                                                <option value="Hormon lain">Hormon lain</option>
                                                <option value="Imunosupresan">Imunosupresan</option>
                                                <option value="Induktor">Induktor</option>
                                                <option value="Inotropik">Inotropik</option>
                                                <option value="Kontraseptik">Kontraseptik</option>
                                                <option value="Kortikosteroid dan Kortikotropin">Kortikosteroid dan Kortikotropin</option>
                                                <option value="Lain-lain (Obat untuk saluran cerna)">Lain-lain (Obat untuk saluran cerna)</option>
                                                <option value="Laksatif (Obat untuk saluran cerna)">Laksatif (Obat untuk saluran cerna)</option>
                                                <option value="Larutan Dialisis">Larutan Dialisis</option>
                                                <option value="Midriatik (Obat Untuk Mata Topikal)">Midriatik (Obat Untuk Mata Topikal)</option>
                                                <option value="Mineral">Mineral</option>
                                                <option value="Miotik dan antiglaukoma (Obat Untuk Mata Topikal)">Miotik dan antiglaukoma (Obat Untuk Mata Topikal)</option>
                                                <option value="Mukolitik dan Ekspektoran (Obat untuk Saluran Nafas)">Mukolitik dan Ekspektoran (Obat untuk Saluran Nafas)</option>
                                                <option value="Multivitamin">Multivitamin</option>
                                                <option value="Obat anti Obesitas">Obat anti Obesitas</option>
                                                <option value="Obat mempengaruhi Tulang">Obat mempengaruhi Tulang</option>
                                                <option value="Obat untuk Diare (Obat untuk saluran cerna)">Obat untuk Diare (Obat untuk saluran cerna)</option>
                                                <option value="Obat untuk Gigi dan Mulut">Obat untuk Gigi dan Mulut</option>
                                                <option value="Obat untuk Mistenia Gravis">Obat untuk Mistenia Gravis</option>
                                                <option value="Obat Untuk Telinga Hidung Tenggorokan">Obat Untuk Telinga Hidung Tenggorokan</option>
                                                <option value="Oral (Larutan Elektrolit Nutrisi dll)">Oral (Larutan Elektrolit Nutrisi dll)</option>
                                                <option value="Parasimpatomimetik">Parasimpatomimetik</option>
                                                <option value="Parental (Larutan Elektrolit Nutrisi dll)">Parental (Larutan Elektrolit Nutrisi dll)</option>
                                                <option value="Penghambat Neuromuscular">Penghambat Neuromuscular</option>
                                                <option value="Penurunan Kolesterol">Penurunan Kolesterol</option>
                                                <option value="Produk Darah dan Pengganti Plasma">Produk Darah dan Pengganti Plasma</option>
                                                <option value="Progesteron">Progesteron</option>
                                                <option value="Relaksan Uterus">Relaksan Uterus</option>
                                                <option value="Serum dan immunoglobulin">Serum dan immunoglobulin</option>
                                                <option value="Sistemik (Obat Untuk Mata)">Sistemik (Obat Untuk Mata)</option>
                                                <option value="Tonikum">Tonikum</option>
                                                <option value="Uterotonik">Uterotonik</option>
                                                <option value="Vaksin">Vaksin</option>
                                                <option value="Vasodilator">Vasodilator</option>
                                                <option value="Vasokonstriktor">Vasokonstriktor</option>
                                                <option value="Vitamin A">Vitamin A</option>
                                                <option value="Vitamin A & Vit.D Kombinasi">Vitamin A & Vit.D Kombinasi</option>
                                                <option value="Vitamin B">Vitamin B</option>
                                                <option value="Vitamin B dengan Kombinasi">Vitamin B dengan Kombinasi</option>
                                                <option value="Vitamin C">Vitamin C</option>
                                                <option value="Vitamin C & kalsium">Vitamin C & kalsium</option>
                                                <option value="Vitamin D">Vitamin D</option>
                                                <option value="Vitamin D kombinasi">Vitamin D kombinasi</option>
                                                <option value="Vitamin Dengan Asam Amino">Vitamin Dengan Asam Amino</option>
                                                <option value="Vitamin dengan Hormon Geriatrikum">Vitamin dengan Hormon Geriatrikum</option>
                                                <option value="Vitamin dengan mineral">Vitamin dengan mineral</option>
                                                <option value="vitamin E">vitamin E</option>
                                                <option value="Vitamin Mineral dan Asam Amino">Vitamin Mineral dan Asam Amino</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="stok">Stok Obat</label>
                                                <input type="number" class="form-control" id="stok_obat" name="stok_obat" value="<?= $data['stok_obat']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="satuan_obat">Satuan Obat</label>
                                            <select class="form-select" id="satuan_obat" name="satuan_obat">
                                                <option value="<?= $data['satuan_obat']; ?>"><?= $data['satuan_obat']; ?></option>
                                                <option value="Aerosol Foam">Aerosol Foam</option>
                                                <option value="Aerosol Metered Dose">Aerosol Metered Dose</option>
                                                <option value="Aerosol Spray">Aerosol Spray</option>
                                                <option value="Alumunium Foil">Alumunium Foil</option>
                                                <option value="Amplop">Amplop</option>
                                                <option value="Ampul">Ampul</option>
                                                <option value="Blister">Blister</option>
                                                <option value="Botol / Fls">Botol / Fls</option>
                                                <option value="Botol Kaca">Botol Kaca</option>
                                                <option value="Botol Plastik">Botol Plastik</option>
                                                <option value="Botol Spray">Botol Spray</option>
                                                <option value="Bungkus">Bungkus</option>
                                                <option value="Buscal Spray">Buscal Spray</option>
                                                <option value="Cairan Diagnostik">Cairan Diagnostik</option>
                                                <option value="Cairan Mata">Cairan Mata</option>
                                                <option value="Cairan Steril">Cairan Steril</option>
                                                <option value="Can">Can</option>
                                                <option value="Cartridge">Cartridge</option>
                                                <option value="Case">Case</option>
                                                <option value="Catch Cover">Catch Cover</option>
                                                <option value="Chewing Gum">Chewing Gum</option>
                                                <option value="Container">Container</option>
                                                <option value="Corrugated Box">Corrugated Box</option>
                                                <option value="Cup Plastik">Cup Plastik</option>
                                                <option value="Dus">Dus</option>
                                                <option value="Dus Luar">Dus Luar</option>
                                                <option value="Eliksir">Eliksir</option>
                                                <option value="Emulsi">Emulsi</option>
                                                <option value="Enema">Enema</option>
                                                <option value="Flexi Bag">Flexi Bag</option>
                                                <option value="Galon / GLN">Galon / GLN</option>
                                                <option value="Gas">Gas</option>
                                                <option value="Gel">Gel</option>
                                                <option value="Gel Mata">Gel Mata</option>
                                                <option value="Granul Effervescent">Granul Effervescent</option>
                                                <option value="Granula">Granula</option>
                                                <option value="Implant">Implant</option>
                                                <option value="Infus">Infus</option>
                                                <option value="Intra Uterine Device (Iud)">Intra Uterine Device (Iud)</option>
                                                <option value="Jerigen">Jerigen</option>
                                                <option value="Kaca">Kaca</option>
                                                <option value="Kaleng">Kaleng</option>
                                                <option value="Kantong">Kantong</option>
                                                <option value="Kantong Infus (Infus Soft Pack)">Kantong Infus (Infus Soft Pack)</option>
                                                <option value="Kaplet">Kaplet</option>
                                                <option value="Kaplet Kunyah">Kaplet Kunyah</option>
                                                <option value="Kaplet Kunyah Salut Selaput">Kaplet Kunyah Salut Selaput</option>
                                                <option value="Kaplet Pelepasan Cepat">Kaplet Pelepasan Cepat</option>
                                                <option value="Kaplet Pelepasan Lambat">Kaplet Pelepasan Lambat</option>
                                                <option value="Kaplet Salut Enterik">Kaplet Salut Enterik</option>
                                                <option value="Kaplet Salut Gula">Kaplet Salut Gula</option>
                                                <option value="Kaplet Salut Selaput">Kaplet Salut Selaput</option>
                                                <option value="Kapsul">Kapsul</option>
                                                <option value="Kapsul Lunak">Kapsul Lunak</option>
                                                <option value="Kapsul Pelepasan Lambat">Kapsul Pelepasan Lambat</option>
                                                <option value="Karton">Karton</option>
                                                <option value="Kertas">Kertas</option>
                                                <option value="Kotak (Box)">Kotak (Box)</option>
                                                <option value="Krim">Krim</option>
                                                <option value="Krim Lemak">Krim Lemak</option>
                                                <option value="Lainnya">Lainnya</option>
                                                <option value="Larutan">Larutan</option>
                                                <option value="Larutan Inhalasi">Larutan Inhalasi</option>
                                                <option value="Larutan Injeksi">Larutan Injeksi</option>
                                                <option value="Lusin / lsn">Lusin / lsn</option>
                                                <option value="Master Box">Master Box</option>
                                                <option value="Obat Kumur">Obat Kumur</option>
                                                <option value="Oral Spray">Oral Spray</option>
                                                <option value="Ovula">Ovula</option>
                                                <option value="Pack">Pack</option>
                                                <option value="Pasta">Pasta</option>
                                                <option value="Patch">Patch</option>
                                                <option value="Pc / Piece">Pc / Piece</option>
                                                <option value="Pcs /Pieces">Pcs /Pieces</option>
                                                <option value="Pensil">Pensil</option>
                                                <option value="Pessary">Pessary</option>
                                                <option value="Piece Box">Piece Box</option>
                                                <option value="Pil">Pil</option>
                                                <option value="Plastik">Plastik</option>
                                                <option value="Pot">Pot</option>
                                                <option value="Pot Plastik">Pot Plastik</option>
                                                <option value="Pouch">Pouch</option>
                                                <option value="Roll">Roll</option>
                                                <option value="Sachet">Sachet</option>
                                                <option value="Salep">Salep</option>
                                                <option value="Salep -51- Mata">Salep -51- Mata</option>
                                                <option value="Sampo">Sampo</option>
                                                <option value="Semprot Hidung">Semprot Hidung</option>
                                                <option value="Serbuk Aerosol">Serbuk Aerosol</option>
                                                <option value="Serbuk Effervescent">Serbuk Effervescent</option>
                                                <option value="Serbuk Infus">Serbuk Infus</option>
                                                <option value="Serbuk Inhaler">Serbuk Inhaler</option>
                                                <option value="Serbuk Injeksi">Serbuk Injeksi</option>
                                                <option value="Serbuk Injeksi Liofilisasi">Serbuk Injeksi Liofilisasi</option>
                                                <option value="Serbuk Obat Luar / Serbuk Tabur">Serbuk Obat Luar / Serbuk Tabur</option>
                                                <option value="Serbuk Oral">Serbuk Oral</option>
                                                <option value="Serbuk Spray">Serbuk Spray</option>
                                                <option value="Serbuk Steril">Serbuk Steril</option>
                                                <option value="Set">Set</option>
                                                <option value="Sirup">Sirup</option>
                                                <option value="Sirup Kering">Sirup Kering</option>
                                                <option value="Sirup Kering Pelepasan Lambat">Sirup Kering Pelepasan Lambat</option>
                                                <option value="Softbag">Softbag</option>
                                                <option value="Stickpack">Stickpack</option>
                                                <option value="Strip">Strip</option>
                                                <option value="Subdermal Implants">Subdermal Implants</option>
                                                <option value="Supositoria">Supositoria</option>
                                                <option value="Suspensi">Suspensi</option>
                                                <option value="Suspensi Injeksi">Suspensi Injeksi</option>
                                                <option value="Suspensi / Cairan Obat Luar">Suspensi / Cairan Obat Luar</option>
                                                <option value="Syringe">Syringe</option>
                                                <option value="Tablet">Tablet</option>
                                                <option value="Tablet Cepat Larut">Tablet Cepat Larut</option>
                                                <option value="Tablet Disintegrasi Oral">Tablet Disintegrasi Oral</option>
                                                <option value="Tablet Dispersibel">Tablet Dispersibel</option>
                                                <option value="Tablet Effervescent">Tablet Effervescent</option>
                                                <option value="Tablet Hisap">Tablet Hisap</option>
                                                <option value="Tablet Kunyah">Tablet Kunyah</option>
                                                <option value="Tablet Lapis">Tablet Lapis</option>
                                                <option value="Tablet Lapis Lepas Lambat">Tablet Lapis Lepas Lambat</option>
                                                <option value="Tablet Lepas Lambat">Tablet Lepas Lambat</option>
                                                <option value="Tablet Pelepasan Cepat">Tablet Pelepasan Cepat</option>
                                                <option value="Tablet Salut Enterik">Tablet Salut Enterik</option>
                                                <option value="Tablet Salut Gula">Tablet Salut Gula</option>
                                                <option value="Tablet Salut Selaput">Tablet Salut Selaput</option>
                                                <option value="Tablet Sublingual">Tablet Sublingual</option>
                                                <option value="Tablet Sublingual Pelepasan Lambat">Tablet Sublingual Pelepasan Lambat</option>
                                                <option value="Tablet Vaginal">Tablet Vaginal</option>
                                                <option value="Tabung">Tabung</option>
                                                <option value="Tetes Hidung">Tetes Hidung</option>
                                                <option value="Tetes Mata">Tetes Mata</option>
                                                <option value="Tetes Mata Dan Telinga">Tetes Mata Dan Telinga</option>
                                                <option value="Tetes Oral (Oral Drops)">Tetes Oral (Oral Drops)</option>
                                                <option value="Tetes Telinga">Tetes Telinga</option>
                                                <option value="Topical Spray">Topical Spray</option>
                                                <option value="Transdermal">Transdermal</option>
                                                <option value="Transdermal Spray">Transdermal Spray</option>
                                                <option value="Transdermal Urethral">Transdermal Urethral</option>
                                                <option value="Tube">Tube</option>
                                                <option value="Tube Plastik">Tube Plastik</option>
                                                <option value="Tulle / Plester Obat">Tulle / Plester Obat</option>
                                                <option value="Vaginal Cream">Vaginal Cream</option>
                                                <option value="Vaginal Douche">Vaginal Douche</option>
                                                <option value="Vaginal Gel">Vaginal Gel</option>
                                                <option value="Vaginal Ring">Vaginal Ring</option>
                                                <option value="Vaginal Tissue">Vaginal Tissue</option>
                                                <option value="Vial">Vial</option>
                                                <option value="Wrapper">Wrapper</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="harga">Harga Obat</label>
                                                <input type="number" class="form-control" id="harga_obat" name="harga_obat" value="<?= $data['harga_obat']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary" name="submit">Tambah Data</button>
                                            <a class="btn batal-edit-obat btn-outline-primary" href="obat_show.php">Batal</a>
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
      $(document).on('click', '.batal-edit-obat', function(e) {
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
              window.location.href = "obat_show.php";
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