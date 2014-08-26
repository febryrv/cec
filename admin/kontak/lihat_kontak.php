<h1>Lihat Buku Tamu</h1>
<?php
$data = mysql_query("select * from buku_tamu where id = '$_GET[id]';");
$no = 1;
while($tampil = mysql_fetch_array($data))
{
?>	  
	<style>
	table {
		border:#666 1px solid;}
	</style>

	  <table width="441" border="1" align="center">
		<tr>
		  <td width="111">Nama</td>
		  <td width="3">:</td>
		  <td width="305"><?php echo $tampil['nama'];?></td>
		</tr>
		<tr>
		  <td>Email</td>
		  <td>:</td>
		  <td><?php echo $tampil['email'];?></td>
		</tr>
		<tr>
		  <td>Tanggal</td>
		  <td>:</td>
		  <td><?php echo $tampil['tanggal'];?></td>
		</tr>
		<tr>
		  <td>No. Hp</td>
		  <td>:</td>
		  <td><?php echo $tampil['telepon'];?> </td>
		</tr>
		<tr>
		  <td>Pesan</td>
		  <td>:</td>
		  <td><?php echo $tampil['pesan'];?></td>
		</tr>
		<tr>
		  <td height="32">&nbsp;</td>
		  <td>&nbsp;</td>
		  <td><a href="?pg=kontak/data_kontak" class="klik">Kembali</a></td>
		</tr>
	  </table>
<?php } ?>