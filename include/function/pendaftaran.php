<?php
function email_terdaftar($email)
{
	$sql = "SELECT email 
		FROM formulir
		WHERE email = '$email'";
	$Q = mysql_query($sql);
	if (mysql_num_rows($Q) > 0)
		return true;
	return false;
}

function get_no_urut()
{
	$next_year = date('Y')+1;
	$sql = "SELECT nomor_formulir
		FROM formulir
		WHERE tanggal_daftar >= '".date('Y')."-01-01 00:00:00' 
			AND tanggal_daftar < '".$next_year."-01-01 00:00:00'";
			
	$Q 		= mysql_query($sql);
	$count 	= mysql_num_rows($Q);
	$count++;
	if($count < 10)
	{
		$no_urut = '0'.$count;
	}
	elseif($count < 100)
	{
		$no_urut = $count;
	}	
	return $no_urut;
}

function simpan_formulir($nomor_formulir,$nama,$jenis_kelamin,$kota_lahir,$tanggal_lahir,$agama,$alamat,$tlp,$sekolah,$kelas,$hobi,$cita,$ayah,$ibu,$pekerjaanayah,$pekerjaanibu,$email,$kode_program)
{
	$sql = "INSERT INTO formulir(nomor_formulir, nama, jenis_kelamin, kota_lahir, tanggal_lahir, agama, alamat, tlp, sekolah, kelas, hobi, cita, ayah, ibu, pekerjaanayah, pekerjaanibu, email, kode_program)
	VALUES('$nomor_formulir', '$nama', '$jenis_kelamin', '$kota_lahir', '$tanggal_lahir', '$agama', '$alamat', '$tlp', '$sekolah', '$kelas', '$hobi', '$cita', '$ayah', '$ibu', '$pekerjaanayah', '$pekerjaanibu', '$email', '$kode_program')";
	
	return mysql_query($sql) or die(mysql_error());
}

function update_formulir($nomor_formulir, $path)
{
	$sql = "UPDATE formulir
		SET foto = '$path'
		WHERE nomor_formulir = '$nomor_formulir'";
	mysql_query($sql) or die(mysql_error());
}