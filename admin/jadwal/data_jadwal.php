<h1>Jadwal Kursus</h1>
<table width="650" border="1">
	<tr id="jtabel">
		<td width="40">No.</td>
		<td width="52">Kode Kursus</td>
		<td width="150">Kursus</td>
		<td width="180">Jadwal</td>
		<td width="206">Aksi</td>
	</tr>
	<?php
	$data = mysql_query("select * from kursus");
	$no = 1;
	while($tampil = mysql_fetch_array($data))
	{
	?>
		<tr>
			<td><?php echo $no++;?></td>
			<td><?php echo $tampil['kode_program'];?></td>
			<td><?php echo $tampil['nama'];?></td>
			<td><?php echo $tampil['jadwal'];?></td>
			<td>
				<a href="?pg=jadwal/ubah_jadwal&id=<?php echo $tampil['kode_program'];?>" class="klik">Ubah</a>
				<!--<a href="?pg=jadwal/hapus_jadwal&id=<?php echo $tampil['kode_program'];?>" class="klik" onclick="return confirm('Data Akan Dihapus?')">Hapus</a>-->
			</td>
		</tr>
<?php } ?>
</table>