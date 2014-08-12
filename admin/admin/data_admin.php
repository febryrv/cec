<h1>Data Admin</h1>
<a href="?pg=admin/input_admin" class="klik">Tambah Admin</a><br /><br />
<table width="650" border="1">
	<tr id="jtabel">
		<td>No.</td>
		<td>Username</td>
		<td>Nama</td>
		<td>Email</td>
		<td>Aksi</td>
	</tr>
	<?php
	$data = mysql_query("select * from admin");
	$no = 1;
	while($tampil = mysql_fetch_array($data))
	{
	 
	?>
	<tr>
		<td height="40"><?php echo $no++;?></td>
		<td><?php echo $tampil['username'];?></td>
		<td><?php echo $tampil['nama'];?></td>
		<td><?php echo $tampil['email'];?></td>
		<td><a href="?pg=admin/ubah_admin&id=<?php echo $tampil['username'];?>" class="klik">Ubah</a> <a href="?pg=admin/hapus_admin&id=<?php echo $tampil['username'];?>" class="klik" onclick="return confirm('Data Akan Dihapus?')">Hapus</a></td>
	</tr>
	<?php } ?>
</table>
