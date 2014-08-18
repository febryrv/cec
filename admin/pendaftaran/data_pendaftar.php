<table width="650" border="1">
	<tr id="jtabel">
		<td width="40">No.</td>
		<td width="52">No. Formulir</td>
		<td width="150">Nama</td>
		<td width="180">Keterangan</td>
		<td width="206">Aksi</td>
	</tr>
	<?php
	$data = mysql_query("select * from formulir");
	$no = 1;
	while($tampil = mysql_fetch_array($data))
	{
		$view 	= substr($tampil['kode_program'], 0, 100);
		$status	= ($tampil['lunas'] == 0) ? 'Belum Dibayar' : 'Lunas'; 
	?>
	<tr>
		<td><?php echo $no++;?></td>
		<td><a href="pendaftaran/lihat_pendaftaran.php?pg=form&no=<?php echo $tampil['nomor_formulir'];?>" class="klik" target="_blank"><?php echo $tampil['nomor_formulir'];?></a></td>
		<td><?php echo $tampil['nama']; ?></td>
		<td><?php echo $view;?></td>
		<td>
			<?php if ($tampil['lunas'] == 0) : ?>
				<a href="?pg=pendaftaran/ubah_pendaftaran&id=<?php echo $tampil['nomor_formulir']; ?>" class="klik"><?php echo $status; ?></a> 
			<?php else : ?>
				<?php echo $status; ?>
			<?php endif; ?>
			<a href="?pg=pendaftaran/hapus_pendaftaran&id=<?php echo $tampil['nomor_formulir'];?>" class="klik" onclick="return confirm('Data Akan Dihapus?')">Hapus</a>
		</td>
	</tr>
<?php 
	} 
?>
</table>
