<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="icon/css/font-awesome.css">
<script type="text/javascript" src="java.js"></script>
<?php 
include("config/database.php");
$kode = $_GET ['kode'];
$sql2 = mysql_fetch_array(mysql_query("SELECT * from tb_peserta where nik='$kode'"));
$skema = mysql_query("SELECT * from tb_skema");
$lokasi = mysql_query("SELECT * from tb_lokasi");
                
?>

<div class="form-style-10">
<h1>Edit Peserta </h1>
<form method="post" action="proses_edit_peserta.php?kode=<?php echo $sql2['nik'];?>">
    
    
    <div class="inner-wrap">
        <label>NIK <input type="text" name="nik" value="<?php echo $sql2['nik'] ; ?>" required/></label>
		<label>Nama <input type="text" name="nama" value="<?php echo $sql2['nama'] ; ?>" required/></label>
        <label>Tanggal Lahir <input type="date" name="tgl_lahir" value="<?php echo $sql2['tgl_lahir'] ; ?>" required/></label>
		<label>No HP<input type="text" name="hp" value="<?php echo $sql2['hp'] ; ?>" required/></label>
        <label>Email<input type="text" name="email" value="<?php echo $sql2['email'] ; ?>" required/></label>
		<label>Organisasi<input type="text" name="organisasi" value="<?php echo $sql2['organisasi'] ; ?>" required/></label>
        <label>Lokasi
          <select name="lokasi">
            <?php 
              while($e = mysql_fetch_array($lokasi)){
              echo "<option value=$e[id_lok]>$e[tuk]</option>";
            }
            ?>
          </select>
        </label>
		<label>Skema Sertifikasi
          <select name="skema">
            <?php 
              while($d = mysql_fetch_array($skema)){
              echo "<option value=$d[id_skema]>$d[nama_skema]</option>";
            }
            ?>
          </select>
        </label>
		<label>Tanggal Terbit Sertifikat<input type="date" name="terbit" value="<?php echo $sql2['tgl_terbit'] ; ?>" required/></label>
    </div>
    <div class="button-section">
     <input type="submit" name="Sign Up" /> <a href="tampil_peserta.php" ><input type="button" value="Kembali" /></a>
     <span class="privacy-policy">
     You agree to our Terms and Policy. 
     </span>
    </div>
</form>
</div>
<style type="text/css">
  #appadd {
    white-space: nowrap;
    overflow: hidden;
    width: 10px;
    height: 10px;
    text-overflow: ellipsis; 
}

  .responstable {
  margin: 1em 0;
  width: 1100px;
  overflow: hidden;
  background: #FFF;
  color: #024457;
  border-radius: 10px;
  border: 1px solid #167F92;
}
.responstable tr {
  border: 1px solid #D9E4E6;
}
.responstable tr:nth-child(odd) {
  background-color: #EAF3F3;
}
.responstable th {
  display: none;
  border: 1px solid #FFF;
  background-color: #167F92;
  color: #FFF;
  padding: 1em;
}
.responstable th:first-child {
  display: table-cell;
  text-align: center;
}
.responstable th:nth-child(2) {
  display: table-cell;
}
.responstable th:nth-child(2) span {
  display: none;
}
.responstable th:nth-child(2):after {
  content: attr(data-th);
}
@media (min-width: 480px) {
  .responstable th:nth-child(2) span {
    display: block;
  }
  .responstable th:nth-child(2):after {
    display: none;
  }
}
.responstable td {
  display: block;
  word-wrap: break-word;
  max-width: 7em;
}
.responstable td:first-child {
  display: table-cell;
  text-align: center;
  border-right: 1px solid #D9E4E6;
}
@media (min-width: 480px) {
  .responstable td {
    border: 1px solid #D9E4E6;
  }
}
.responstable th, .responstable td {
  text-align: left;
  margin: .5em 1em;
}
@media (min-width: 480px) {
  .responstable th, .responstable td {
    display: table-cell;
    padding: 1em;
  }
}

h1 {
  font-family: Verdana;
  font-weight: normal;
  color: #024457;
}
h1 span {
  color: #167F92;
}

</style>

<?php

  
?>