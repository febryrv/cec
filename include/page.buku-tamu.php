<?php
function simpan_buku_tamu($nama, $email, $telepon, $pesan)
{
	$sql = "INSERT INTO buku_tamu(nama, email, telepon, pesan, tanggal)
		VALUES ('$nama', '$email', '$telepon', '$pesan', CURRENT_TIMESTAMP)";
	
	return mysql_query($sql);
}

if($_POST)
{
	$err = false;
	// strip_tags() all post
	foreach($_POST as $key=>$value)
	{
		$_POST[$key] = strip_tags($_POST[$key]);
	}
	
	if($_POST['nama'] == '')
	{
		$err = true;
		$err_nama = 'Nama harus diisi.';
	}
	else
	{
		$nama = filter_var($_POST['nama'], FILTER_SANITIZE_STRING);
	}
	
	if($_POST['email'] == '')
	{
		$err = true;
		$err_email = 'Email harus diisi.';
	}
	else
	{
		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
		{
			$err = true;
			$err_email = 'Format Email salah.';
		}
		else
		{
			$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
		}
	}
	
	if($_POST['pesan'] == '')
	{
		$err = true;
		$err_pesan = 'Pesan harus diisi.';
	}
	else
	{
		$pesan = filter_var($_POST['pesan'], FILTER_SANITIZE_STRING);
	}
	
	if($_POST['telepon'] != '' && !is_numeric($_POST['telepon']))
	{
		$err = true;
		$err_telepon = 'Telepon harus angka.';
	}
	else
	{	
		$telepon = filter_var($_POST['telepon'], FILTER_SANITIZE_NUMBER_INT);
	}
	
	if (!$err)
	{
		$success = simpan_buku_tamu($nama, $email, $telepon, $pesan);
		
		// freeup $_POST variables
		foreach($_POST as $key=>$value)
		{
			unset($_POST[$key]);
		}
	}
}
?>
<div class="main_content">
    <div class="left_content">
		<h1>Buku Tamu</h1>
		<?php echo (isset($success) && $success == true) ? '<p>Pesan Anda sukses terkirim. Kami akan segera meresponya.</p>' : ''; ?>
		<div class="contact_form">
			<form method="post" >
			<div class="form_row">
				<label class="contact">nama:</label>
				<input type="text" name="nama" value="<?php echo (isset($_POST['nama'])) ? $_POST['nama'] : ''; ?>" class="contact_input" />
				<?php echo (isset($err_nama)) ? '<p>'.$err_nama.'</p>' : ''; ?>
			</div>
			<div class="form_row">
				<label class="contact">email:</label>
				<input type="text" name="email" value="<?php echo (isset($_POST['email'])) ? $_POST['email'] : ''; ?>" class="contact_input" />
				<?php echo (isset($err_email)) ? '<p>'.$err_email.'</p>' : ''; ?>
			</div>
			<div class="form_row">
				<label class="contact">telepon:</label>
				<input type="text" name="telepon" value="<?php echo (isset($_POST['telepon'])) ? $_POST['telepon'] : ''; ?>" class="contact_input" />
				<?php echo (isset($err_telepon)) ? '<p>'.$err_telepon.'</p>' : ''; ?>
			</div>
			<div class="form_row">
				<label class="contact">pesan:</label>
				<textarea class="contact_textarea" name="pesan" rows="" cols="" ><?php echo (isset($_POST['pesan'])) ? $_POST['pesan'] : ''; ?></textarea>
				<?php echo (isset($err_pesan)) ? '<p>'.$err_pesan.'</p>' : ''; ?>
			</div>
			<div class="form_row">
				<input type="image" src="assets/images/send.gif" onClick="this.form.submit()"class="send"/>
			</div>
			</form>
		</div>
    </div>
    <!--End of left_content-->
    <div class="right_content">
		<h1>Hubungi Kami</h1>
		<div class="contact_info">
			<span class="orange">Alamat:</span>
			<p class="info_contact">Jl. Sutera Raya No. 23, Alam Sutera</p>
		</div>
		<div class="contact_info">
			<span class="orange">Email:</span>
			<p class="info_contact"> info@eoc.com </p>
		</div>
		<div class="contact_info">
			<span class="orange">Telp:</span>
			<p class="info_contact"> 008 900 800 32   /    008 900 800 32 </p>
		</div>
		<div class="employe_box_left">
			<span class="blue">Febrian</span><br />
			<span class="orange">Email:</span> info@eoc.com<br />
			<span class="orange">Telp:</span> 008 900 800 32 <br />
			<img src="assets/images/contact_thumb1.gif" alt="" /> 
		</div>
		<div class="employe_box_right">
			<span class="blue">Sumanto</span><br />
			<span class="orange">Email:</span> info@eoc.com<br />
			<span class="orange">Telp.:</span> 008 900 800 32 <br />
			<img src="assets/images/contact_thumb2.gif" alt="" />
		</div>
    </div>
    <!--End of right_content-->
	<div class="clear"></div>
</div>
<!--End of main_content-->