<?php
include("config/database.php");
$nik			= $_POST['nik'];
$nama		= $_POST['nama'];
$tgl_lahir 		= $_POST['tgl_lahir'];
$hp			= $_POST['hp'];
$email 			= $_POST['email'];
$organisasi 			= $_POST['organisasi'];
$lokasi 		= $_POST['lokasi'];
$skema 	= $_POST['skema'];
$terbit 	= $_POST['terbit'];


//cek username yang sama
$query = mysql_fetch_array(mysql_query("SELECT * FROM tb_peserta WHERE nik='$nik'"));

if($query){
		echo "<script> alert('nik telah didaftarkan');location ='tambah_peserta.php' </script>";
	}
	
else{
	$sql = "insert into tb_peserta VALUES('0','$nik',  '$skema', '$lokasi', '$nama','$tgl_lahir', '$hp', '$email', '$organisasi','BERKOMPETENSI', '$terbit')";
	}
	
$hasil = mysql_query($sql);	
if ($hasil){
	echo "<script> alert('Data ditambah'); location = 'tampil_peserta.php'; </script>";
	}
else{
	echo "<script> alert('Data Gagal Di SImpan'); location = 'tampil_peserta.php'; </script>";
	}	
?>