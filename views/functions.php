<?php 
	
	session_start();

	include 'koneksi.php';

	date_default_timezone_set('asia/jakarta');

	function tambahKlinik($data){
		global $koneksi;
		$nama_klinik = ucwords(strtolower($data['nama_klinik']));
		$jenis_klinik = $data['jenis_klinik'];
		$alamat_klinik = $data['alamat_klinik'];
		$nomor_telp = $data['nomor_telp'];
		$jam_buka = $data['jam_buka'];
		$jam_tutup = $data['jam_tutup'];
		$status_klinik = $data['status_klinik'];
		$id_owner = $data['id_owner'];

		$result = mysqli_query($koneksi, "SELECT * FROM tb_klinik WHERE nama_klinik = '$nama_klinik'");

		if (mysqli_fetch_assoc($result)) {
			echo '
		    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
		    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">
		    <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
		    <script>
		    $(document).ready(function() {
		        Swal.fire({
		            title: "Data gagal ditambahkan!",
		            text: "Nama klinik telah digunakan!",
		            icon: "error",
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
		      exit;
		}

		$sql = "INSERT INTO tb_klinik VALUES('','$nama_klinik','$jenis_klinik','$alamat_klinik','$nomor_telp','$jam_buka','$jam_tutup','$status_klinik','$id_owner')";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function tambahDokter($data){
		global $koneksi;
		$nama_dokter = $data['nama_dokter'];
		$jenis_kelamin = $data['jenis_kelamin'];
		$sip = $data['sip'];
		$masa_berlaku = $data['masa_berlaku'];
		$spesialis = $data['spesialis'];
		$alamat_dokter = $data['alamat_dokter'];
		$nomor_telp = $data['nomor_telp'];
		$email = $data['email'];
		$password = $data['password'];
		$password2 = $data['password2'];
		$status = $data['status'];
		$id_klinik = $data['id_klinik'];

		$result = mysqli_query($koneksi, "SELECT * FROM tb_owner WHERE email = '$email'");

		if (mysqli_fetch_assoc($result)) {
			echo '
		    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
		    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">
		    <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
		    <script>
		    $(document).ready(function() {
		        Swal.fire({
		            title: "Data gagal ditambahkan!",
		            text: "Email telah digunakan!",
		            icon: "error",
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
		      exit;
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
		            title: "Data gagal ditambahkan!",
		            text: "Email telah digunakan!",
		            icon: "error",
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
		      exit;
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
		            title: "Data gagal ditambahkan!",
		            text: "Email telah digunakan!",
		            icon: "error",
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
		      exit;
        }

		if ($password !== $password2) {
			echo '
		    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
		    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">
		    <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
		    <script>
		    $(document).ready(function() {
		        Swal.fire({
		            title: "Data gagal ditambahkan!",
		            text: "Konfirmasi password tidak sama!",
		            icon: "error",
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
		      exit;
		}

		$password = password_hash($password, PASSWORD_DEFAULT);

		$sql = "INSERT INTO tb_dokter VALUES('','$nama_dokter','$jenis_kelamin','$sip','$masa_berlaku','$spesialis','$alamat_dokter','$nomor_telp','$email','$password','$status','$id_klinik')";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);

	}

	function tambahStaff($data){
		global $koneksi;
		$nama_staff = ucwords(strtolower($data['nama_staff']));
		$jenis_kelamin = $data['jenis_kelamin'];
		$alamat_staff = $data['alamat_staff'];
		$nomor_telp = $data['nomor_telp'];
		$email = strtolower($data['email']);
		$password = $data['password'];
		$password2 = $data['password2'];
		$role = $data['role'];
		$status = $data['status'];
		$id_klinik = $data['id_klinik'];
		
		$result = mysqli_query($koneksi, "SELECT * FROM tb_owner WHERE email = '$email'");

		if (mysqli_fetch_assoc($result)) {
			echo '
		    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
		    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">
		    <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
		    <script>
		    $(document).ready(function() {
		        Swal.fire({
		            title: "Data gagal ditambahkan!",
		            text: "Email telah digunakan!",
		            icon: "error",
		            confirmButtonText: "Ya",
		            confirmButtonColor: "#0097B2",
		            showConfirmButton: true,
		        }).then(function(result) {
		            if (result.isConfirmed) {
		                window.location.href = "staff_show.php";
		            }
		        })
		    });
		    </script>';
		      exit;
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
		            title: "Data gagal ditambahkan!",
		            text: "Email telah digunakan!",
		            icon: "error",
		            confirmButtonText: "Ya",
		            confirmButtonColor: "#0097B2",
		            showConfirmButton: true,
		        }).then(function(result) {
		            if (result.isConfirmed) {
		                window.location.href = "staff_show.php";
		            }
		        })
		    });
		    </script>';
		      exit;
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
		            title: "Data gagal ditambahkan!",
		            text: "Email telah digunakan!",
		            icon: "error",
		            confirmButtonText: "Ya",
		            confirmButtonColor: "#0097B2",
		            showConfirmButton: true,
		        }).then(function(result) {
		            if (result.isConfirmed) {
		                window.location.href = "staff_show.php";
		            }
		        })
		    });
		    </script>';
		      exit;
        }

		if ($password !== $password2) {
			echo '
		    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
		    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">
		    <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
		    <script>
		    $(document).ready(function() {
		        Swal.fire({
		            title: "Data gagal ditambahkan!",
		            text: "Konfirmasi password tidak sama!",
		            icon: "error",
		            confirmButtonText: "Ya",
		            confirmButtonColor: "#0097B2",
		            showConfirmButton: true,
		        }).then(function(result) {
		            if (result.isConfirmed) {
		                window.location.href = "staff_show.php";
		            }
		        })
		    });
		    </script>';
		      exit;
		}

		$password = password_hash($password, PASSWORD_DEFAULT);

		$sql = "INSERT INTO tb_staff VALUES('','$nama_staff','$jenis_kelamin','$alamat_staff','$nomor_telp','$email','$password','$role','$status','$id_klinik')";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function tambahPoli($data){
		global $koneksi;
		$nama_poli = ucwords(strtolower($data['nama_poli']));
		$kategori_pasien = $data['kategori_pasien'];
		$durasi = $data['durasi'];
		$jadwal_poli = $data['jadwal_poli'];
		$id_dokter = $data['id_dokter'];
		$status_poli = $data['status_poli'];

		$result = mysqli_query($koneksi, "SELECT * FROM tb_poli WHERE nama_poli = '$nama_poli'");

		if (mysqli_fetch_assoc($result)) {
			echo '
		    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
		    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">
		    <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
		    <script>
		    $(document).ready(function() {
		        Swal.fire({
		            title: "Data gagal ditambahkan!",
		            text: "Nama poli telah digunakan!",
		            icon: "error",
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
		      exit;	
		}

		$sql = "INSERT INTO tb_poli VALUES('','$nama_poli','$kategori_pasien','$durasi','$jadwal_poli','$id_dokter','$status_poli')";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function tambahTarif($data){
		global $koneksi;
		$id_poli = $data['id_poli'];
		$kategori_poli = $data['kategori_poli'];
		$nama_layanan = $data['nama_layanan'];
		$kode_layanan = $data['kode_layanan'];
		$tarif = $data['tarif'];

		$result = mysqli_query($koneksi, "SELECT * FROM tb_tarif WHERE kode_layanan = '$kode_layanan'");

		if (mysqli_fetch_assoc($result)) {
			echo '
		    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
		    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">
		    <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
		    <script>
		    $(document).ready(function() {
		        Swal.fire({
		            title: "Data gagal ditambahkan!",
		            text: "Kode layanan telah digunakan!",
		            icon: "error",
		            confirmButtonText: "Ya",
		            confirmButtonColor: "#0097B2",
		            showConfirmButton: true,
		        }).then(function(result) {
		            if (result.isConfirmed) {
		                window.location.href = "tarif_show.php";
		            }
		        })
		    });
		    </script>';
		      exit;	
		}

		$sql = "INSERT INTO tb_tarif VALUES('','$id_poli','$kategori_poli','$nama_layanan','$kode_layanan','$tarif')";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function tambahObat($data){
		global $koneksi;
		$kode_obat = $data['kode_obat'];
		$nama_obat = $data['nama_obat'];
		$kategori_obat = $data['kategori_obat'];
		$jenis_obat = $data['jenis_obat'];
		$stok_obat = $data['stok_obat'];
		$satuan_obat = $data['satuan_obat'];
		$harga_obat = $data['harga_obat'];

		$result = mysqli_query($koneksi, "SELECT * FROM tb_obat WHERE kode_obat = '$kode_obat'");

		if (mysqli_fetch_assoc($result)) {
			echo '
		    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
		    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">
		    <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
		    <script>
		    $(document).ready(function() {
		        Swal.fire({
		            title: "Data gagal ditambahkan!",
		            text: "Kode obat telah digunakan!",
		            icon: "error",
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
		      exit;	
		}

		$sql = "INSERT INTO tb_obat VALUES('$kode_obat','$nama_obat','$kategori_obat','$jenis_obat','$stok_obat','$satuan_obat','$harga_obat')";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function tambahBhp($data){
		global $koneksi;
		$kode_bhp = $data['kode_bhp'];
		$nama_bhp = $data['nama_bhp'];
		$stok_bhp = $data['stok_bhp'];
		$satuan_bhp = $data['satuan_bhp'];
		$harga_bhp = $data['harga_bhp'];

		$result = mysqli_query($koneksi, "SELECT * FROM tb_bhp WHERE kode_bhp = '$kode_bhp'");

		if (mysqli_fetch_assoc($result)) {
			echo '
		    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
		    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">
		    <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
		    <script>
		    $(document).ready(function() {
		        Swal.fire({
		            title: "Data gagal ditambahkan!",
		            text: "Kode BHP telah digunakan!",
		            icon: "error",
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
		      exit;		
		}

		$sql = "INSERT INTO tb_bhp VALUES('$kode_bhp','$nama_bhp','$stok_bhp','$satuan_bhp','$harga_bhp')";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function ubahOwner($data){
		global $koneksi;
		$id_owner = $data['id_owner'];
		$nama_owner = ucwords(strtolower($data['nama_owner']));
		$jenis_kelamin = $data['jenis_kelamin'];
		$alamat_owner = $data['alamat_owner'];
		$nomor_telp = $data['nomor_telp'];
		$email = $data['email'];
		$password = $data['password'];
		$password_hash = password_hash($password, PASSWORD_DEFAULT);
		$password2 = $data['password2'];
		$status = $data['status'];
		$password_lama = $data['password_lama'];

		$result = mysqli_query($koneksi, "SELECT * FROM tb_owner WHERE email = '$email'");
		$fetch = mysqli_fetch_assoc($result);
		$password_lama_verify = password_verify($password_lama, $fetch['password']);

		if ($password !== $password2) {
			echo '
		    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
		    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">
		    <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
		    <script>
		    $(document).ready(function() {
		        Swal.fire({
		            title: "Data gagal diubah!",
		            text: "Konfirmasi password tidak sama!",
		            icon: "error",
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
			return false;
		}

		if ($password_lama_verify) {
			$sql = "UPDATE tb_owner SET 
				nama_owner = '$nama_owner', 
				jenis_kelamin = '$jenis_kelamin', 
				alamat_owner = '$alamat_owner', 
				nomor_telp = '$nomor_telp', 
				password = '$password_hash',
				status = '$status' WHERE id_owner = '$id_owner'";
			$eksekusi = mysqli_query($koneksi, $sql);

			return mysqli_affected_rows($koneksi);
		}else{
			echo '
		    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
		    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">
		    <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
		    <script>
		    $(document).ready(function() {
		        Swal.fire({
		            title: "Data gagal diubah!",
		            text: "Password lama tidak benar!",
		            icon: "error",
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
			return false;
		}

	}

	function ubahKlinik($data){
		global $koneksi;
		$id_klinik = $data['id_klinik'];
		$nama_klinik = ucwords(strtolower($data['nama_klinik']));
		$jenis_klinik = $data['jenis_klinik'];
		$alamat_klinik = $data['alamat_klinik'];
		$nomor_telp = $data['nomor_telp'];
		$jam_buka = $data['jam_buka'];
		$jam_tutup = $data['jam_tutup'];
		$status_klinik = $data['status_klinik'];
		$id_owner = $data['id_owner'];

		$sql = "UPDATE tb_klinik SET nama_klinik = '$nama_klinik', jenis_klinik = '$jenis_klinik', alamat_klinik = '$alamat_klinik', nomor_telp = '$nomor_telp', jam_buka = '$jam_buka', jam_tutup = '$jam_tutup', status_klinik = '$status_klinik', id_owner = '$id_owner' WHERE id_klinik = '$id_klinik'";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function ubahDokter($data){
		global $koneksi;
		$id_dokter = $data['id_dokter'];
		$nama_dokter = $data['nama_dokter'];
		$jenis_kelamin = $data['jenis_kelamin'];
		$sip = $data['sip'];
		$masa_berlaku = $data['masa_berlaku'];
		$spesialis = $data['spesialis'];
		$alamat_dokter = $data['alamat_dokter'];
		$nomor_telp = $data['nomor_telp'];
		$email = $data['email'];
		$password = $data['password'];
		$password_hash = password_hash($password, PASSWORD_DEFAULT);
		$password2 = $data['password2'];
		$status = $data['status'];
		$password_lama = $data['password_lama'];

		$result = mysqli_query($koneksi, "SELECT * FROM tb_dokter WHERE email = '$email'");
		$fetch = mysqli_fetch_assoc($result);
		$password_lama_verify = password_verify($password_lama, $fetch['password']);

		if ($password !== $password2) {
			echo '
		    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
		    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">
		    <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
		    <script>
		    $(document).ready(function() {
		        Swal.fire({
		            title: "Data gagal diubah!",
		            text: "Konfirmasi password tidak sama!",
		            icon: "error",
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
			return false;
		}

		if ($password_lama_verify) {
			$sql = "UPDATE tb_dokter SET 
				nama_dokter = '$nama_dokter', 
				jenis_kelamin = '$jenis_kelamin', 
				sip = '$sip', 
				masa_berlaku = '$masa_berlaku', 
				spesialis = '$spesialis', 
				alamat_dokter = '$alamat_dokter', 
				nomor_telp = '$nomor_telp', 
				password = '$password_hash',
				status = '$status' WHERE id_dokter = '$id_dokter'";
			$eksekusi = mysqli_query($koneksi, $sql);

			return mysqli_affected_rows($koneksi);
		}else{
			echo '
		    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
		    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">
		    <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
		    <script>
		    $(document).ready(function() {
		        Swal.fire({
		            title: "Data gagal diubah!",
		            text: "Password lama tidak benar!",
		            icon: "error",
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
			return false;
		}

	}

	function ubahStaff($data){
		global $koneksi;
		$id_staff = $data['id_staff'];
		$nama_staff = $data['nama_staff'];
		$jenis_kelamin = $data['jenis_kelamin'];
		$alamat_staff = $data['alamat_staff'];
		$nomor_telp = $data['nomor_telp'];
		$email = $data['email'];
		$password = $data['password'];
		$password_hash = password_hash($password, PASSWORD_DEFAULT);
		$password2 = $data['password2'];
		$role = $data['role'];
		$status = $data['status'];
		$password_lama = $data['password_lama'];

		$result = mysqli_query($koneksi, "SELECT * FROM tb_staff WHERE email = '$email'");
		$fetch = mysqli_fetch_assoc($result);
		$password_lama_verify = password_verify($password_lama, $fetch['password']);

		if ($password !== $password2) {
			echo '
		    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
		    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">
		    <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
		    <script>
		    $(document).ready(function() {
		        Swal.fire({
		            title: "Data gagal diubah!",
		            text: "Konfirmasi password tidak sama!",
		            icon: "error",
		            confirmButtonText: "Ya",
		            confirmButtonColor: "#0097B2",
		            showConfirmButton: true,
		        }).then(function(result) {
		            if (result.isConfirmed) {
		                window.location.href = "staff_show.php";
		            }
		        })
		    });
		    </script>';
			return false;
		}

		if ($password_lama_verify) {
			$sql = "UPDATE tb_staff SET 
				nama_staff = '$nama_staff', 
				jenis_kelamin = '$jenis_kelamin', 
				alamat_staff = '$alamat_staff', 
				nomor_telp = '$nomor_telp', 
				password = '$password_hash',
				role = '$role',
				status = '$status'
				WHERE id_staff = '$id_staff'";
			$eksekusi = mysqli_query($koneksi, $sql);

			return mysqli_affected_rows($koneksi);
		}else{
			echo '
		    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
		    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">
		    <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
		    <script>
		    $(document).ready(function() {
		        Swal.fire({
		            title: "Data gagal diubah!",
		            text: "Password lama tidak benar!",
		            icon: "error",
		            confirmButtonText: "Ya",
		            confirmButtonColor: "#0097B2",
		            showConfirmButton: true,
		        }).then(function(result) {
		            if (result.isConfirmed) {
		                window.location.href = "staff_show.php";
		            }
		        })
		    });
		    </script>';
			return false;
		}

	}

	function ubahPoli($data){
		global $koneksi;
		$id_poli = $data['id_poli'];
		$nama_poli = $data['nama_poli'];
		$kategori_pasien = $data['kategori_pasien'];
		$durasi = $data['durasi'];
		$jadwal_poli = $data['jadwal_poli'];
		$id_dokter = $data['id_dokter'];
		$status_poli = $data['status_poli'];

		$sql = "UPDATE tb_poli SET nama_poli = '$nama_poli', kategori_pasien = '$kategori_pasien', durasi = '$durasi', jadwal_poli = '$jadwal_poli', id_dokter = '$id_dokter', status_poli = '$status_poli' WHERE id_poli = '$id_poli'";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function ubahTarif($data){
		global $koneksi;
		$id_tarif = $data['id_tarif'];
		$id_poli = $data['id_poli'];
		$kategori_poli = $data['kategori_poli'];
		$nama_layanan = $data['nama_layanan'];
		$kode_layanan = $data['kode_layanan'];
		$tarif = $data['tarif'];

		$sql = "UPDATE tb_tarif SET id_poli = '$id_poli', kategori_poli = '$kategori_poli', nama_layanan = '$nama_layanan', kode_layanan = '$kode_layanan', tarif = '$tarif' WHERE id_tarif = '$id_tarif';";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function ubahObat($data){
		global $koneksi;
		$kode_obat = $data['kode_obat'];
		$nama_obat = $data['nama_obat'];
		$kategori_obat = $data['kategori_obat'];
		$jenis_obat = $data['jenis_obat'];
		$stok_obat = $data['stok_obat'];
		$satuan_obat = $data['satuan_obat'];
		$harga_obat = $data['harga_obat'];

		$sql = "UPDATE tb_obat SET nama_obat = '$nama_obat', kategori_obat = '$kategori_obat', jenis_obat = '$jenis_obat', stok_obat = '$stok_obat', satuan_obat = '$satuan_obat', harga_obat = '$harga_obat' WHERE kode_obat = '$kode_obat';";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function ubahBhp($data){
		global $koneksi;
		$kode_bhp = $data['kode_bhp'];
		$nama_bhp = $data['nama_bhp'];
		$stok_bhp = $data['stok_bhp'];
		$satuan_bhp = $data['satuan_bhp'];
		$harga_bhp = $data['harga_bhp'];

		$sql = "UPDATE tb_bhp SET nama_bhp = '$nama_bhp', stok_bhp = '$stok_bhp', satuan_bhp = '$satuan_bhp', harga_bhp = '$harga_bhp' WHERE kode_bhp = '$kode_bhp';";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function ubahStokObat($data){
		global $koneksi;
		$kode_obat = $data['kode_obat'];
		$stok_obat = $data['stok_obat'];

		$sql = "UPDATE tb_obat SET stok_obat = '$stok_obat' WHERE kode_obat = '$kode_obat';";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function ubahStokBhp($data){
		global $koneksi;
		$kode_bhp = $data['kode_bhp'];
		$stok_bhp = $data['stok_bhp'];

		$sql = "UPDATE tb_bhp SET stok_bhp = '$stok_bhp' WHERE kode_bhp = '$kode_bhp';";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function hapusKlinik($id){
		global $koneksi;
		$sql = "DELETE FROM tb_klinik WHERE id_klinik = '$id'";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function hapusDokter($id){
		global $koneksi;
		$sql = "DELETE FROM tb_dokter WHERE id_dokter = '$id'";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function hapusStaff($id){
		global $koneksi;
		$sql = "DELETE FROM tb_staff WHERE id_staff = '$id'";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function hapusPoli($id){
		global $koneksi;
		$sql = "DELETE FROM tb_poli WHERE id_poli = '$id'";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function hapusTarif($id){
		global $koneksi;
		$sql = "DELETE FROM tb_tarif WHERE id_tarif = '$id'";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function hapusObat($id){
		global $koneksi;
		$sql = "DELETE FROM tb_obat WHERE kode_obat = '$id'";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function hapusBhp($id){
		global $koneksi;
		$sql = "DELETE FROM tb_bhp WHERE kode_bhp = '$id'";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function hari_ini(){
		$hari = date ("D");
	 
		switch($hari){
			case 'Sun':
				$hari_ini = "Minggu";
			break;
	 
			case 'Mon':			
				$hari_ini = "Senin";
			break;
	 
			case 'Tue':
				$hari_ini = "Selasa";
			break;
	 
			case 'Wed':
				$hari_ini = "Rabu";
			break;
	 
			case 'Thu':
				$hari_ini = "Kamis";
			break;
	 
			case 'Fri':
				$hari_ini = "Jumat";
			break;
	 
			case 'Sat':
				$hari_ini = "Sabtu";
			break;
			
			default:
				$hari_ini = "Tidak di ketahui";		
			break;
		}
	 
		return "<b>" . $hari_ini . "</b>";
	 
	}

 ?>