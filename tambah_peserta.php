<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="icon/css/font-awesome.css">
<script type="text/javascript" src="java.js"></script>
<?php 
include("config/database.php");
$lok = mysql_query("SELECT * from tb_lokasi");
$skema = mysql_query("SELECT * from tb_skema");
              
?>

<div class="form-style-10">
<h1>Pendaftaran peserta Sertifikasi SKKNI<span>Silahkan isi form di bawah ini !</span></h1>
<form method="post" action="proses_tambah.php">
    <div class="inner-wrap">
        <label>NIK <input type="text" name="nik" /></label>
		<label>Nama <input type="text" name="nama" /></label>
        <label>Tanggal Lahir <input type="date" name="tgl_lahir" /></label>
		<label>No HP<input type="text" name="hp" /></label>
        <label>Email<input type="email" name="email" /></label>
		<label>Organisasi<input type="text" name="organisasi" /></label>
        <label>Lokasi
          <select name="lokasi">
            <?php 
              while($d = mysql_fetch_array($lok)){
              echo "<option value=$d[id_lok]>$d[tuk]</option>";
            }
            ?>
			</select>
        </label>
		
		<label>Skema Sertifikasi
          <select name="skema">
            <?php 
              while($e = mysql_fetch_array($skema)){
              echo "<option value=$e[id_skema]>$e[nama_skema]</option>";
            }
            ?></select>
        </label>
	
        
		<label>Tanggal Terbit Sertifikat<input type="date" name="terbit" value="<?php echo $sql2['tgl_terbit'] ; ?>"/></label>
    </div>
    <div class="button-section">
     <input type="submit" name="Sign Up" /> <a href="tampil_peserta.php" ><input type="button" value="Kembali" /></a>
     <span class="privacy-policy">
     You agree to our Terms and Policy. 
     </span>
    </div>
</form>
</div>
<?php
?>