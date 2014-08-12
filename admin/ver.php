<?php

include"../config/koneksi.php";

if ($_POST)
{
	$uname 	= mysql_real_escape_string(trim($_POST['username']));
	$pass 	= mysql_real_escape_string(trim($_POST['password']));

	$err 	= false;
	if($uname == '')
	{
		$err		= true;
		$err_uname 	= 'Maaf username masih kosong, Harap diisi';
	}
	if($pass == '')
	{
		$err		= true;
		$err_pass	= 'Maaf password minimal 3 digit, Harap diisi';	
	}
	
	if (!$err)
	{						
		$sql 	= mysql_query("SELECT * 
			FROM admin 
			WHERE username = '$uname' 
				AND password = '".md5($pass)."'");
		$cek 	= mysql_num_rows($sql);
		$dsql	= mysql_fetch_array($sql);
		if($cek == 1)
		{
			$_SESSION['id']				= session_id();
			$_SESSION['my_user']		= $dsql['username'];
			$_SESSION['my_email']		= $dsql['email'];
			header('location:index.php');
		}
		else
		{
			$err_login	= 'Username dan password Anda salah.';	
		}
	}
}
?>