<form action="?pg=kontak/ubah_post_kontak&id=<?php echo $_GET['id'];?>" method="post" enctype="multipart/form-data" name="form1">
	<table width="441" border="1" align="center">
	<?php
	$data = mysql_query("select * from buku_tamu where id = '$_GET[id]'");
	$tampil = mysql_fetch_array($data);
	?>
		<tr>
		  <td colspan="3">Ubah Kontak</td>
		</tr>
		<tr>
		  <td width="314">Nama</td>
		  <td width="8">:</td>
		  <td width="97"><input type="text" name="nama" id="nama" value="<?php echo $tampil['nama'];?>"></td>
		</tr>
		<tr>
		  <td>Email</td>
		  <td>:</td>
		  <td><input type="text" name="email" id="email" value="<?php echo $tampil['email'];?>" /></td>
		</tr>
		<tr>
		  <td>Tanggal</td>
		  <td>:</td>
		  <td><input type="text" name="tanggal" id="tanggal" value="<?php echo $tampil['tanggal'];?>"></td>
		</tr>
		<tr>
		  <td>No. Hp</td>
		  <td>:</td>
		  <td><input type="text" name="no_hp" id="no_hp" value="<?php echo $tampil['telepon'];?>" /></td>
		</tr>
		<tr>
		  <td>Isi</td>
		  <td>:</td>
		  <td><textarea name="pesan" id="pesan" cols="45" rows="5"><?php echo $tampil['pesan'];?></textarea></td>
		</tr>
		<tr>
		  <td height="42">&nbsp;</td>
		  <td>&nbsp;</td>
		  <td><input type="submit" name="button" class="klik" value="Simpan"></td>
		</tr>
	</table>
</form>