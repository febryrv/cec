<?php
function email_terdaftar($email)
{
	$sql = "SELECT email 
		FROM formulir
		WHERE email = '$email'
			AND email != '".$_SESSION['email']."'";
	$Q = mysql_query($sql);
	if (mysql_num_rows($Q) > 0)
		return true;
	return false;
}
function update_siswa($nama, $alamat, $tlp, $email, $password)
{
	$sql = "UPDATE siswa
		SET nama='$nama', alamat ='$alamat',tlp='$tlp',email='$email'";
	if ($password != '')
	{
		$sql .= ",password='".md5($password)."'";
	}
	$sql .= " WHERE nis='".$_SESSION['nis']."'";
	if (mysql_query($sql) or die(mysql_error()))
	{
		$_SESSION['nama'] 	= $nama;
		$_SESSION['email'] 	= $email;
		return true;
	}
	return false;
}
if($_POST)
{
	$err = false;
	// strip_tags() all post
	foreach($_POST as $key=>$value)
	{
		$_POST[$key] = strip_tags($_POST[$key]);
	}
	if ($_POST['nama'] == '')
	{
		$err = true;
		$err_nama = 'Nama harus diisi.';
	}
	else
	{
		$nama = filter_var($_POST['nama'], FILTER_SANITIZE_STRING);
	}
	if ($_POST['alamat'] == '')
	{
		$err = true;
		$err_alamat = 'Alamat harus diisi.';
	}
	else
	{
		$alamat = filter_var($_POST['alamat'], FILTER_SANITIZE_STRING);
	}
	if ($_POST['tlp'] == '')
	{
		$err = true;
		$err_tlp = 'Telepon harus diisi.';
	}
	else
	{
		$tlp = filter_var($_POST['tlp'], FILTER_SANITIZE_NUMBER_INT);
	}
	if ($_POST['email'] == '')
	{
		$err = true;
		$err_email = 'Email harus diisi.';
	}
	elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
	{
		$err = true;
		$err_email = 'Format Email salah.';
	}
	elseif (email_terdaftar($_POST['email']))
	{
		$err = true;
		$err_email = 'Email Anda sudah terdaftar.';
	}
	else
	{
		$email = $_POST['email'];
	}
		$password = $_POST['password'];
		if ($password != '' && strlen($password) < 6)
		{
			$err = true;
			$err_password = 'Password minimal 6 karakter.';
		}
		if (!$err)
		{
			$success = update_siswa($nama,$alamat,$tlp,$email,$password);
			if ($success == true)
			{
				echo '<script>alert("Data berhasil diperbarui.");location="index.php?pg=siswa"</script>';
				// freeup $_POST variables
				foreach($_POST as $key=>$value)
				{
					unset($_POST[$key]);
				}			
			}
		}	
	}
function get_detail_siswa($nis)
{
	$sql = "SELECT *
		FROM siswa
		WHERE nis = '$nis'";
	$Q	= mysql_query($sql);
	return mysql_fetch_assoc($Q);
}

$siswa = get_detail_siswa($_SESSION['nis']);
	?>
	<div class="main_content">
		<div class="left_content">
			<h1>Edit Profil Saya</h1>
			<form action="" method="post" enctype="multipart/form-data" name="form1">
				<center>
				<table width="100%" border="0" cellspacing="5" cellpadding="5">
					<tr>
						<td width="32%" valign="top">Nama Lengkap</td>
						<td width="2%" align="center" valign="top">:</td>
						<td width="66%">
							<input name="nama" type="text" id="nama" value="<?php echo (isset($_POST['nama'])) ? $_POST['nama'] : $siswa['nama']; ?>" size="45">
							<?php echo (isset($err_nama)) ? '<p class="error">'.$err_nama.'</p>' : ''; ?>
						</td>
					</tr>
					<tr>
						<td valign="top">Alamat</td>
						<td align="center" valign="top">:</td>
						<td>
							<textarea name="alamat" id="alamat" cols="40" rows="5"><?php echo (isset($_POST['alamat'])) ? $_POST['alamat'] : $siswa['alamat']; ?></textarea>
							<?php echo (isset($err_alamat)) ? '<p class="error">'.$err_alamat.'</p>' : ''; ?>
						</td>
					</tr>
					<tr>
						<td valign="top">No telp / Hp</td>
						<td align="center" valign="top">:</td>
						<td>
							<input name="tlp" type="text" value="<?php echo (isset($_POST['tlp'])) ? $_POST['tlp'] : $siswa['tlp']; ?>" id="tlp" size="45">
							<?php echo (isset($err_tlp)) ? '<p class="error">'.$err_tlp.'</p>' : ''; ?>
						</td>
					</tr>
					<tr>
						<td valign="top"><p>*Email </p></td>
						<td align="center" valign="top">:</td>
						<td>
							<input name="email" type="text" value="<?php echo (isset($_POST['email'])) ? $_POST['email'] : $siswa['email']; ?>" id="email" size="45">
							<?php echo (isset($err_email)) ? '<p class="error">'.$err_email.'</p>' : ''; ?>
						</td>
					</tr>
					<tr>
						<td valign="top">Password</td>
						<td align="center" valign="top">:</td>
						<td>
							<input name="password" type="password" value="" id="password" size="45">
							<?php echo (isset($err_password)) ? '<p class="error">'.$err_password.'</p>' : ''; ?>
						</td>
					</tr>
					<tr>
						<td colspan="3" align="center"><label>
							<input type="submit" name="proses" id="proses" value="PROSES">
						</label></td>
					</tr>
				</table>
				</center>
			
		</div>
		<!--End of wide_content-->
		<div class="right_content">
		<div class="employe_box_left">
			<span class="blue">Foto</span><br />
			<img src="<?php echo $siswa['foto']; ?>" alt="<?php echo $siswa['nama']; ?>" title="<?php echo $siswa['nama']; ?>" id="foto" width="200" height="200"/>
			<!--<input type="file" name="foto" id="upload" onChange="readURL(this);">-->
		</div>
		<div class="employe_box_right">
			<span class="blue">Menu Siswa</span><br />
			<ul style="margin-left: -28px;">
				<li><a href="?pg=siswa">Profil</a></li>
				<li><a href="?pg=siswa&do=edit">Edit</a></li>
				<li><a href="?pg=siswa&do=jadwal">Jadwal</a></li>
				<li><a href="?pg=siswa&do=logout">Logout</a></li>
			</ul>
		</div>
		</form>
    </div>
		<div class="clear"></div>
	</div>
	<!--End of main_content-->
	<script type="text/javascript">
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#foto').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$(function() {
		$( "#datepicker" ).datepicker( { dateFormat: "yy-mm-dd", changeYear: true } );
	});
	</script>