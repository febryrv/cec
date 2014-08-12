<?php

include 'admin/function.php';

if ($_POST)
{
	$error = false;
	
	if ($_POST['username'] == '')
	{
		$error 		= true;
		$e_username = 'Username harus diisi.';
	}
	else if(check_username($_POST['username']))
	{
		$error 		= true;
		$e_username = 'Username sudah terpakai.';	
	}
	
	if ($_POST['nama'] == '')
	{
		$error 		= true;
		$e_nama 	= 'Nama harus diisi.';
	}
	
	if ($_POST['email'] == '')
	{	
		$error 		= true;
		$e_email 	= 'Email harus diisi.';
	}
	elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
	{
		$error 		= true;
		$e_email	= 'Format email salah.';
	}
	elseif (check_email($_POST['email']))
	{	
		$error 		= true;
		$e_email	= 'Email sudah terpakai.';
	}
	
	if ($_POST['pass'] == '')
	{
		$error 		= true;
		$e_pass 	= 'Password harus diisi.';
	}
	else if (strlen($_POST['pass']) < 5)
	{
		$error 		= true;
		$e_pass 	= 'Password minimal 6 karakter.';
	}
	else if ($_POST['pass1'] == '')
	{			
		$error 		= true;
		$e_pass 	= 'Masukkan Password sekali lagi.';		
	}
	else if ($_POST['pass'] != $_POST['pass1'])
	{
		$error 		= true;
		$e_pass 	= 'Kedua password tidak sama.';	
	}

	
	if (!$error)
	{
		$pass 		= md5($_POST['pass']);
		$username 	= str_replace(' ', '_', strtolower($_POST['username']));  
		$simpan 	= mysql_query("INSERT INTO admin (username, nama, email, password)
			VALUES ('$username', '$_POST[nama]', '$_POST[email]', '$pass')");	

		if($simpan){
		?>
			<script type="text/javascript">
			alert('Data Berhasil Disimpan');
			document.location='?pg=admin/data_admin';
			</script>
		<?php
		}else{
		?>
			<script type="text/javascript">
			alert('Data Gagal Disimpan');
			document.location='?pg=admin/data_admin';
			</script>
		<?php
		}
	}
}