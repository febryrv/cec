<?php
include 'admin/input_post_admin.php';
?>
<h1>Tambah Admin</h1>
<form action="" method="post" enctype="multipart/form-data" name="form1">
  <table width="441" border="1" align="center">
    <tr>
      <td colspan="3" align="center" id="jtabel">Input Admin</td>
    </tr>
    <tr>
		<td width="314">Username</td>
		<td width="8">:</td>
		<td width="97">
			<input name="username" type="text" id="username" size="40" class="required" value="<?php echo (isset($_POST['username'])) ? $_POST['username'] : ''; ?>" />
			<?php echo isset($e_username) ? '<p class="error-message">'.$e_username.'</p>' : ''; ?>
		</td>
    </tr>
    <tr>
		<td width="314">Nama</td>
		<td width="8">:</td>
		<td width="97">
			<input name="nama" type="text" id="nama" size="40" class="required" value="<?php echo (isset($_POST['nama'])) ? $_POST['nama'] : ''; ?>" />
			<?php echo isset($e_nama) ? '<p class="error-message">'.$e_nama.'</p>' : ''; ?>
		</td>
    </tr>
    <tr>
		<td width="314">Email</td>
		<td width="8">:</td>
		<td width="97">
			<input name="email" type="text" id="email" size="40" class="required" value="<?php echo (isset($_POST['email'])) ? $_POST['email'] : ''; ?>">
			<?php echo isset($e_email) ? '<p class="error-message">'.$e_email.'</p>' : ''; ?>
		</td>
    </tr>
    <tr>
		<td valign="top">Password</td>
		<td valign="top">:</td>
		<td>
			<input name="pass" type="password" id="pass" size="40" class="required" placeholder=""/>
			<input name="pass1" type="password" id="pass" size="40" class="required"  placeholder="Masukkan lagi"/>
			<?php echo isset($e_pass) ? '<p class="error-message">'.$e_pass.'</p>' : ''; ?>
		</td>
    </tr>
    <tr>
		<td height="35">&nbsp;</td>
		<td>&nbsp;</td>
		<td>
			<input type="submit" name="button" class="klik" value="Simpan">
			<a href="?pg=admin/data_admin" class="klik">Kembali</a>
		</td>
    </tr>
  </table>
</form>
