<?php
if (isset($_POST['pembayaran']) && $_POST['pembayaran'] == 'lunas')
{
	$data 	= mysql_query("select * from formulir where nomor_formulir = '$_POST[nomor_formulir]'");
	$tampil = mysql_fetch_array($data);
	$nis	= str_replace("FORM.", '', $tampil['nomor_formulir']);
	
	$sql 	= "INSERT INTO siswa (nis , nama, foto, kode_program, jenis_kelamin, agama, email, password, alamat, kota_lahir, tanggal_lahir, sekolah, kelas, hobi, cita, tlp, ayah, ibu, pekerjaanayah, pekerjaanibu, tanggal_daftar)
		VALUES ('".$nis."', '".$tampil['nama']."', '".$tampil['foto']."', '".$tampil['kode_program']."', '".$tampil['jenis_kelamin']."', '".$tampil['agama']."', '".$tampil['email']."', '".$tampil['password']."', '".$tampil['alamat']."', '".$tampil['kota_lahir']."', '".$tampil['tanggal_lahir']."', '".$tampil['sekolah']."', '".$tampil['kelas']."', '".$tampil['hobi']."', '".$tampil['cita']."', '".$tampil['tlp']."', '".$tampil['ayah']."', '".$tampil['ibu']."', '".$tampil['pekerjaanayah']."', '".$tampil['pekerjaanibu']."', '".$tampil['tanggal_daftar']."')";
	mysql_query($sql) or die(mysql_error());
	mysql_query("UPDATE formulir SET lunas = '1' WHERE nomor_formulir = '".$tampil['nomor_formulir']."'");
	$body_mail = '<html><head><meta http-equiv="content-type" content="text/html; charset=utf-8" /></head><body>
		<h1>Terima kasih.</h1>
		<p>Saat ini anda sudah menjadi siswa di "BIMBEL CEL"</p>
		<p>Segera lakukan login di ruang siswa untuk melihat jadwal.</p>
		<br/>
		<p>NIS : '.$nis.'</p>
		<p>Passowrd: '.$tampil['tanggal_lahir'].'</p> 
		<br>
		</body></html>';
	$headers = "From: admin@bimbelcec.com\r\n";
	$headers .= "Reply-to: admin@bimbelcec.com\r\n";
	$headers .= "Content-type: text/html";
	if ((isset($_SERVER['HTTP_HOST']) && ($_SERVER['HTTP_HOST'] == 'www.bimbelcec.com' || $_SERVER['HTTP_HOST'] == 'bimbelcec.com')) || $_SERVER['SERVER_NAME'] == 'www.bimbelcec.com' || $_SERVER['SERVER_NAME'] == 'bimbelcec.com')
	{
		$mail_sent = mail($tampil['email'], "Aktivasi Akun - Bimbel CEC", $body_mail, $headers);
		echo '<script>alert("Email terkirim.");location="index.php?pg=pendaftaran/data_kontak";</script>';
	}
	else
	{
		echo '<script>alert("Maaf, saat ini sistem sedang offline..");location="index.php?pg=kontak/data_kontak";</script>';
	}
}
?>

<form action="" method="post" enctype="multipart/form-data" name="form1">
	<table width="441" border="1" align="center">
		<?php
		$data = mysql_query("select * from formulir where nomor_formulir = '$_GET[id]'");
		$tampil = mysql_fetch_array($data);
		?>
		<tr>
			<td colspan="3">Ubah Status Pendaftaran | <?php echo $_GET['id']; ?></td>
		<tr>
			<td width="314">Nama</td>
			<td width="8">:</td>
			<td width="97">
				<?php echo $tampil['nama'];?>
				<input type="hidden" name="nomor_formulir" value="<?php echo $_GET['id'];?>" />
			</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>:</td>
			<td><?php echo $tampil['email'];?></td>
		</tr>
		<tr>
			<td>Tanggal</td>
			<td>:</td>
			<td><?php echo $tampil['tanggal_daftar']; ?></td>
		</tr>
		<tr>
			<td>Status Pembayaran</td>
			<td>:</td>
			<td>
				<select name="pembayaran" >
					<option value="lunas" >Lunas</option>
					<option value="belumlunas" selected>Belum Lunas</option>
				</select>
			</td>
		</tr>
		<tr>
		  <td height="42">&nbsp;</td>
		  <td>&nbsp;</td>
		  <td><input type="submit" name="button" class="klik" value="Simpan"></td>
		</tr>
	</table>
</form>