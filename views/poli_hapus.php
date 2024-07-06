<?php 
	include 'functions.php';
	include 'head.php';

	//cek login
	if ($_SESSION['login'] == 0) {
		header("Location: auth-login-basic.php");
	}

	$id_poli = $_GET['id_poli'];

	if (isset($id_poli)) {
		if (hapusPoli($id_poli) > 0) {
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
		                window.location.href = "poli_show.php";
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
		                window.location.href = "poli_show.php";
		            }
		        })
		    });
		    </script>';
		      exit;
		  }
	}


 ?>