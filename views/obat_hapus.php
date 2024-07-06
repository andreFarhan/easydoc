<?php 
	include 'functions.php';

	//cek login
	if ($_SESSION['login'] == 0) {
		header("Location: auth-login-basic.php");
	}

	$kode_obat = $_GET['kode_obat'];

	if (isset($kode_obat)) {
		if (hapusObat($kode_obat) > 0) {
		echo '
		    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
		    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">
		    <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
		    <script>
		    $(document).ready(function() {
		        Swal.fire({
		            title: "Data berhasil dihapus!",
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
		      exit;
		  } else {
		    echo '
		    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
		    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">
		    <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
		    <script>
		    $(document).ready(function() {
		        Swal.fire({
		            title: "Data gagal dihapus!",
		            text: "Data gagal dihapus",
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
	}
 ?>