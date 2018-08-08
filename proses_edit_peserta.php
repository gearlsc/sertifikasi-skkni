<?php
	include("config/database.php");

	//variabel
	$kode = $_GET['kode'];

	$nik = $_POST['nik'];
	$niklama = $_POST['niklama'];

	$nama = $_POST['nama'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$hp = $_POST['hp'];
	$email = $_POST['email'];

	$alamat = $_POST['alamat'];
	$organisasi = $_POST['organisasi'];
	$lokasi = $_POST['lokasi'];
	$skema = $_POST['skema'];
	$terbit = $_POST['terbit'];


	//window.location='edit_peserta.php?kode=$kode'
	if (!is_numeric($hp)) {
		echo "<script>
 			alert('Nomor hp harus nomor'); 
 			window.history.back()
 		</script>";
 	} elseif (cek_nik($nik, $niklama) == FALSE) {
 		echo "<script>
 			alert('Nik sudah digunakan..'); 
 			window.history.back()
 		</script>";
 		
	} else {
		//query update data peserta
		$sql = "UPDATE tb_peserta SET alamat = '$alamat', 
									nama = '$nama', 
									nik = '$nik', 
									tgl_lahir = '$tgl_lahir', 
									hp = '$hp', 
									email = '$email', 
									organisasi = '$organisasi', 
									id_lokasi = '$lokasi', 
									id_skema = '$skema', 
									tgl_terbit = '$terbit' 
				WHERE nik = '$kode'";

		$hasil = mysql_query($sql);	
		if ($hasil) {
			echo "<script> alert('Peserta Berhasil Di Edit'); location = 'tampil_peserta.php'; </script>";
		} else{
			echo "<script> alert('Data Gagal Di SImpan'); location = 'tampil_peserta.php' </script>";
		}
	}


	function cek_nik($nik, $niklama)
	{
		if ($nik == $niklama) {
			return TRUE;
		} else {
			$cek = mysql_query("SELECT * FROM tb_peserta WHERE nik = '$nik'") or die(mysql_error());
			$temukan = mysql_num_rows($cek);

			if ($temukan > 0) {
				return FALSE;
			} else {
				return TRUE;
			}

		}
	}

		

	
		
?>