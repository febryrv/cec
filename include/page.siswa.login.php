<?php
//var_dump($_SESSION);
function do_login($nis, $password)
{
	$sql = "SELECT * FROM siswa
		WHERE nis = '$nis'
			AND password = '$password'";
	$Q = mysql_query($sql);
	if (mysql_num_rows($Q) > 0)
	{
		$data 				= mysql_fetch_assoc($Q);
		$_SESSION['nis'] 	= $data['nis'];
		$_SESSION['nama'] 	= $data['nama'];
		$_SESSION['email'] 	= $data['email'];
		?>
		<script>
		alert('Thanks for logging in.');
		location = '?pg=siswa';
		</script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('Password atau Nis anda salah. Silahkan coba lagi.');
		</script>
		<?php
	}
}

if($_POST)
{
	$err = false;
	foreach($_POST as $key=>$value)
	{
		$_POST[$key] = strip_tags($_POST[$key]);
	}
	
	if($_POST['nis'] == '')
	{
		$err 		= true;
		$err_nis 	= 'NIS harus diisi.';
	}
	else
	{
		$nama = filter_var($_POST['nis'], FILTER_SANITIZE_STRING);
	}
	
	if($_POST['password'] == '')
	{
		$err 			= true;
		$err_password	= 'Password harus diisi.';
	}
	else
	{
		$password = md5($_POST['password']);
	}
	
	if (!$err)
	{
		do_login($_POST['nis'], $password);
	}
}
?>
<div class="main_content">
    <div class="left_content">
		<h1>Login Siswa</h1>
		<?php echo (isset($success) && $success == true) ? '<p>Pesan Anda sukses terkirim. Kami akan segera meresponya.</p>' : ''; ?>
		<div class="contact_form">
			<form method="post" >
			<div class="form_row">
				<label class="contact">NIS:</label>
				<input type="text" name="nis" value="<?php echo (isset($_POST['nis'])) ? $_POST['nis'] : ''; ?>" class="contact_input" />
				<?php echo (isset($err_nis)) ? '<p>'.$err_nis.'</p>' : ''; ?>
			</div>
			<div class="form_row">
				<label class="contact">password:</label>
				<input type="password" name="password" value="" class="contact_input" />
				<?php echo (isset($err_email)) ? '<p>'.$err_email.'</p>' : ''; ?>
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
			<p class="info_contact">Bumi Ps.Kemis Indah Jl. Melati 1 Block E4 No.20 Tangerang</p>
		</div>
		<div class="contact_info">
			<span class="orange">Email:</span>
			<p class="info_contact">cecokay@yahoo.co.id</p>
		</div>
		<div class="contact_info">
			<span class="orange">Telp:</span>
			<p class="info_contact">0856 9163 3930</p>
		</div>
		<div class="employe_box_left">
			<span class="blue">Mr.awang Setiaji, S.Pd</span><br />
<span class="orange">Email:</span>cecokay@gmail.com<br />
		  <span class="orange">Telp:</span><span class="info_contact">0856 9163 3930</span><br />
			<img src="assets/images/contact_thumb1.gif" alt="" /> 
		</div>
		<div class="employe_box_right">
        <span class="blue">Mrs.Niken, S.Pd</span><br />
	    <span class="orange">Email:</span><span class="info_contact">cecokay@yahoo.id</span><br />
			<span class="orange">Telp.:</span> 0821 1186 9843<br />
			<img src="assets/images/contact_thumb2.gif" alt="" />
		</div>
    </div>
    <!--End of right_content-->
	<div class="clear"></div>
</div>
<!--End of main_content-->