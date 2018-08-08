<?php
include("config/database.php");
$kode			= $_GET['kode'];
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

$rnik=mysql_num_rows(mysql_query("select * from tb_peserta where nik='$nik'"));
//if ($rnik > 0)
//{
 //echo "<script>alert('NIK terdaftar '); window.location = 'edit_peserta.php?kode=$kode'</script>";
//}	

	$sql = "UPDATE tb_peserta set nama = '$nama', nik = '$nik', tgl_lahir = '$tgl_lahir', hp = '$hp', email = '$email', organisasi = '$organisasi', id_lokasi = '$lokasi', id_skema = '$skema', tgl_terbit = '$terbit' where nik = '$kode'";

	
$hasil = mysql_query($sql);	
if ($hasil){
	echo "<script> alert('Peserta Berhasil Di Edit'); location = 'tampil_peserta.php'; </script>";
	}
else{
	echo "<script> alert('Data Gagal Di SImpan'); location = 'tampil_peserta.php' </script>";
	}	
?>