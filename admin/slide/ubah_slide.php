<?php
include 'slide/ubah_post_slide.php';
?>
<form action="" method="post" enctype="multipart/form-data" name="form1">
	<table width="441" border="1" align="center">
   <?php
	$data = mysql_query("select * from slider where id = '$_GET[id]'");
	$tampil = mysql_fetch_array($data);
	?>
		<tr>
			<td colspan="3">Ubah Home Slider</td>
		</tr>
		<tr>
			<td width="314">Judul</td>
			<td width="8">:</td>
			<td width="97">
				<input type="text" name="judul" id="judul" value="<?php echo $tampil['judul'];?>">
				<input type="hidden" name="id" value="<?php echo $tampil['id'];?>">
				<?php echo isset($e_judul) ? '<p class="error-message">'.$e_judul.'</p>' : ''; ?>
			</td>
		</tr>
		<tr>
			<td>Gambar</td>
			<td>:</td>
			<td>
				<img src="../uploads/gambar/home/<?php echo $tampil['gambar'];?>" width="150" height="100" /><br />
				<input type="file" name="gambar" id="gambar" />
			</td>
		</tr>
		<tr>
			<td>Isi</td>
			<td>:</td>
			<td>
				<textarea name="isi"><?php echo $tampil['isi']; ?></textarea>
				<?php echo isset($e_isi) ? '<p class="error-message">'.$e_isi.'</p>' : ''; ?>
			</td>
		</tr>
		<tr>
			<td height="34">&nbsp;</td>
			<td>&nbsp;</td>
			<td><input type="submit" name="button" class="klik" value="Simpan"></td>
		</tr>
	</table>
</form>
