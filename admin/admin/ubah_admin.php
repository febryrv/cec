<?php

include 'admin/ubah_post_admin.php';

$data = mysql_query("select * from admin where username = '$_GET[id]'");
$tampil = mysql_fetch_array($data);
?>

<h1>Ubah Admin</h1>
<form action="" method="post" enctype="multipart/form-data" name="form1">
	<table width="441" border="1" align="center">
		<tr>
			<td width="314" valign="top">Username</td>
			<td width="8" valign="top">:</td>
			<td width="97" valign="top">
				<input type="text" name="user" id="user" value="<?php echo $tampil['username'];?>">
				<input type="hidden" name="id" id="id" value="<?php echo $tampil['username'];?>">
				<?php echo isset($e_user) ? '<p class="error-message">'.$e_user.'</p>' : ''; ?>
			</td>
		</tr>
		<tr>
			<td valign="top">Nama</td>
				<td valign="top">:</td>
			<td>
				<input type="text" name="nama" id="pass" value="<?php echo $tampil['nama'];?>" />
				<?php echo isset($e_nama) ? '<p class="error-message">'.$e_nama.'</p>' : ''; ?>
			</td>
		</tr>
		<tr>
			<td valign="top">Email</td>
			<td valign="top">:</td>
			<td valign="top">
				<input type="text" name="email" id="pass" value="<?php echo $tampil['email'];?>" />
				<?php echo isset($e_email) ? '<p class="error-message">'.$e_email.'</p>' : ''; ?>
			</td>
		</tr>
		<tr>
			<td valign="top">Ubah Password<br/>*kosongkan jika tidak ingin di update</td>
			<td valign="top">:</td>
			<td valign="top">
				<input type="pass" name="pass_baru" id="pass" value="" placeholder="Masukkan password baru"/> <span></span><br/>
				<input type="pass" name="pass_baru2" id="pass" value="" placeholder="Masukkan password baru lagi"/> <span></span>
				<?php echo isset($e_pass) ? '<p class="error-message">'.$e_pass.'</p>' : ''; ?>
			</td>
		</tr>
		<tr>
			<td height="42">&nbsp;</td>
			<td>&nbsp;</td>
			<td>
				<input type="submit" name="button" class="klik" value="Simpan">
			</td>
		</tr>
	</table>
</form>