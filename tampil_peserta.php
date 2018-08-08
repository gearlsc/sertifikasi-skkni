<?php 
include "config/database.php";
if(isset($_GET['skema']))
	{
$query = "SELECT a.*, b.*, c.* FROM tb_peserta a 
							LEFT JOIN tb_lokasi b ON a.id_lokasi = b.id_lok 
							LEFT JOIN tb_skema c ON a.id_skema = c.id_skema 
							where a.id_skema= '$_GET[skema]' ORDER BY a.tgl_lahir ASC";

	}

	
elseif(isset($_GET['kom']))
	{
		
		if($_GET['kom']=='y')
		{
$query = "SELECT a.*, b.*, c.* FROM tb_peserta a 
							LEFT JOIN tb_lokasi b ON a.id_lokasi = b.id_lok 
							LEFT JOIN tb_skema c ON a.id_skema = c.id_skema 
							where a.rekomendasi= 'BERKOMPETENSI' ORDER BY a.tgl_lahir ASC";
		}
		else
		{
$query = "SELECT a.*, b.*, c.* FROM tb_peserta a 
							LEFT JOIN tb_lokasi b ON a.id_lokasi = b.id_lok 
							LEFT JOIN tb_skema c ON a.id_skema = c.id_skema 
							where a.rekomendasi= 'BELUM BERKOMPETENSI' ORDER BY a.tgl_lahir ASC";
		}
	}

	
elseif(isset($_GET['lokasi']))
	{
$query = "SELECT a.*, b.*, c.* FROM tb_peserta a 
							LEFT JOIN tb_lokasi b ON a.id_lokasi = b.id_lok 
							LEFT JOIN tb_skema c ON a.id_skema = c.id_skema 
							where a.id_lokasi= '$_GET[lokasi]' ORDER BY a.tgl_lahir ASC";

	}
	
else
{	
	$query = "SELECT a.*, b.*, c.* FROM tb_peserta a 
							LEFT JOIN tb_lokasi b ON a.id_lokasi = b.id_lok 
							LEFT JOIN tb_skema c ON a.id_skema = c.id_skema 
							ORDER BY a.tgl_lahir ASC";
							
}


				$result = mysql_query($query) or die(mysql_error());
				$temukan = mysql_num_rows($result);
				
	

?>
<h2>DAFTAR PESERTA</h2>

<br>

<h3><a href="tambah_peserta.php">ADD PESERTA</a></h3>
<h3><a href="tampil_peserta.php">VIEW ALL PESERTA</a></h3>
<table class="responstable">
	<tr style="font-weight:bold;font-size:20px;color: white;" bgcolor="#34495e">
		<th width="">NIK</td>
		<th width="">NAMA</td>
		<th width="">ALAMAT</td>
		<th width="">TANGGAL LAHIR</td>
		<th width="">NO HP</td>
		<th width="">EMAIL</td>
		<th width="">ORGANISASI</td>
		<th width="">REKOMENDASI</td>
		<th width="">TERBIT SERTIFIKAT</td>
		<th width="">OPTION</td>
	</tr>
	<?php
		while(($record = mysql_fetch_assoc($result))){
	?>
	<tr>
		<td><?php echo $record['nik'];?></td>
		<td><?php echo $record['nama'];?><p><small><a href="tampil_peserta.php?skema=<?php echo $record['id_skema']; ?>"><?php echo $record['nama_skema']  ?></a>-<a href="tampil_peserta.php?lokasi=<?php echo $record['id_lok']; ?>"><?php echo $record['tuk']  ?></a> </small></td>
		<td><?php echo $record['alamat'];?></td>
		<td><?php echo $record['tgl_lahir'];?></td>
		<td><?php echo $record['hp'];?></td>
		<td><?php echo $record['email'];?></td>
		<td><?php echo $record['organisasi'];?></td>
		<td>
		<?php
		if ($record['rekomendasi']=="BERKOMPETENSI")
			{ 
		?> 
		
		<a href="tampil_peserta.php?kom=y"> <?php echo $record['rekomendasi']; ?> </a> <?php 
		
		} else { 
		?> 
		<a href="tampil_peserta.php?kom=n"> <?php echo $record['rekomendasi']; ?> </a> <?php } ?> 
		
		</td>
		<td><?php echo $record['tgl_terbit'];?></td>
		<td>[<a href="edit_peserta.php?kode=<?php echo $record['nik']; ?>">edit</a>]  [<a href="proses_hapus_peserta.php?kode=<?php echo $record['nik'];?>" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini ?');">hapus</a>]</td>
	</tr>
	<?php
		}
		$count= mysql_num_rows( mysql_query ($query));
	?>
	<tr>
	<td colspan="9"><?php echo $count;?></td>
	</tr>
</table>

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
