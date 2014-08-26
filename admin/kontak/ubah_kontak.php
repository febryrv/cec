<?php include 'kontak/ubah_post_kontak.php'; ?>
<h1>Edit Buku Tamu</h1>
<form action="" method="post" name="form1">
	<table width="441" border="1" align="center">
	<?php
	$data 	= mysql_query("select * from buku_tamu where id = '$_GET[id]'");
	$tampil = mysql_fetch_array($data);
	?>
		<tr>
			<td valign="top">Isi</td>
			<td valign="top">:</td>
			<td>
				<textarea name="pesan" id="pesan" cols="45" rows="5"><?php echo $tampil['pesan'];?></textarea>
				<?php echo isset($e_pesan) ? '<p class="error-message">'.$e_pesan.'</p>' : ''; ?>
			</td>
		</tr>
		<tr>
			<td height="42">&nbsp;</td>
			<td>&nbsp;</td>
			<td>
				<input type="submit" name="button" class="klik" value="Simpan">
				<a href="?pg=kontak/data_kontak" class="klik">Kembali</a>
				<input type="hidden" name="id" class="klik" value="<?php echo $_GET['id']; ?>">
			</td>
		</tr>
	</table>
</form>