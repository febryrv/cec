<a href="?pg=content/input_content" class="klik">Tambah Content</a><br /><br />
<table width="688" border="1"> 
	<tr id="jtabel">
		<td width="35">No.</td>
		<td width="54">Nama</td>
		<td width="182">Gambar</td>
		<td width="100">Tanggal</td>
		<td width="67">Isi</td>
		<td width="140">Aksi</td>
	</tr>  
	<?php
	$data = mysql_query("select * from artikel");
	$no 	= 1;
	while($tampil = mysql_fetch_array($data))
	{
		$view = substr($tampil['isi_artikel'],0,55);
	?>
	<tr>
		<td><?php echo $no++;?></td>
		<td><?php echo $tampil['judul_artikel'];?></td>
		<td>
		<?php if($tampil['gambar']==''){echo "";}else{
			?>
		<img src="../images/content/<?php echo $tampil['gambar'];?>" width="150" height="100" />
		<?php } ?>
		</td>
		<td><?php echo $tampil['update_terakhir'];?></td>
		<td><?php echo $view; ?></td>
		<td>
			<a href="?pg=content/hapus_content&id=<?php echo $tampil['id_artikel'];?>" class="klik" onclick="return confirm('Data Akan Dihapus??')">Hapus</a><a href="?pg=content/ubah_content&id=<?php echo $tampil['id_artikel'];?>" class="klik">Ubah</a>
		</td>
	</tr>
	<?php 
	} 
	?>
</table>
