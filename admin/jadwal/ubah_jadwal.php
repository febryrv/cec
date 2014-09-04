<?php include 'jadwal/ubah_post_jadwal.php'; ?>
<h1>Ubah Jadwal Kursus</h1>
<form action="" method="post" name="form1">
	<table width="441" border="1" align="center">
		<?php
		$data 	= mysql_query("SELECT * FROM kursus WHERE kode_program = '$_GET[id]'");
		$tampil = mysql_fetch_array($data);
		?>
		<tr>
			<td width="31" valign="top">Nama</td>
			<td width="8" valign="top">:</td>
			<td width="197">
				<input type="text" name="nama" id="nama" value="<?php echo $tampil['nama'];?>">
				<input type="hidden" name="kode_program" id="kode_program" value="<?php echo $tampil['kode_program'];?>">				
				<?php echo isset($e_nama) ? '<p class="error-message">'.$e_nama.'</p>' : ''; ?>
			</td>
		</tr>
		<tr>
			<td valign="top">Jadwal</td>
			<td valign="top">:</td>
			<td>
				<textarea name="jadwal" id="jadwal"><?php echo $tampil['jadwal'];?></textarea>
				<?php echo isset($e_jadwal) ? '<p class="error-message">'.$e_jadwal.'</p>' : ''; ?>
			</td>
		</tr>
		<tr>
			<td height="41">&nbsp;</td>
			<td>&nbsp;</td>
			<td><input type="submit" name="button" class="klik" value="Simpan"></td>
		</tr>
	</table>
</form>