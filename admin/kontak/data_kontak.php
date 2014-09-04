<h1>Data Buku Tamu</h1>
<?php
$data	= mysql_query("select * from buku_tamu");
$no 	= 1;
if (mysql_num_rows($data) > 0) :
?>
	<table width="650" border="1">
		<tr id="jtabel">
			<td>No.</td>
			<td>Nama</td>
			<td>Email</td>
			<td>No. Hp</td>
			<td>Pesan</td>
			<td>Tanggal</td>
			<td>Aksi</td>
		</tr>
<?php
	while($tampil = mysql_fetch_array($data)) :
		$view = substr($tampil['pesan'],0,50);
?>		
		<tr>
			<td height="40"><?php echo $no++;?></td>
			<td><?php echo $tampil['nama'];?></td>
			<td><?php echo $tampil['email'];?></td>
			<td><?php echo $tampil['telepon'];?></td>
			<td><?php echo $view;?></td>
			<td><?php echo $tampil['tanggal'];?></td>
			<td><a href="?pg=kontak/lihat_kontak&id=<?php echo $tampil['id'];?>" class="klik">Balas</a> <a href="?pg=kontak/hapus_kontak&id=<?php echo $tampil['id'];?>" class="klik" onclick="return confirm('Data Akan Dihapus?')">Hapus</a></td>
		</tr>
<?php 
	endwhile;
?>
	</table>
<?php
else :
?>
<p>Belum ada data.</p>
<?php
endif;
?>
