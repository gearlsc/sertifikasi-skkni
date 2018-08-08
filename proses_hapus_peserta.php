<?php
include("config/database.php");
$kode = $_GET['kode'];

	$hapus = mysql_query("delete from tb_peserta where nik = '$kode'");
	if($hapus) {
		echo "<script> alert('Data Berhasil DIHAPUS!!'); location = 'tampil_peserta.php'; </script>";
 	} else {
		echo "<script> alert('Data Gagal DIHAPUS!!'); location = 'tampil_peserta.php'; </script>";
	}
?>