<?php
include 'include/function/pendaftaran.php';

$action = (isset($_GET['action'])) ? $_GET['action'] : '';
if ($action == '') :

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
		
		if (isset($_POST['jenis_kelamin']))
		{
			$jenis_kelamin = $_POST['jenis_kelamin'];
		}
		else
		{
			$err = true;
			$err_jenis_kelamin = 'Pilih jenis kelamin.';
		}	
		
		if ($_POST['kota_lahir'] == '')
		{
			$err = true;
			$err_kota_lahir = 'Kota kelahiran harus diisi.';
		}
		else
		{
			$kota_lahir = filter_var($_POST['kota_lahir'], FILTER_SANITIZE_STRING);
		}
		
		if ($_POST['tanggal_lahir'] == '')
		{
			$err = true;
			$err_tanggal_lahir = 'Tanggal lahir harus diisi.';
		}
		else
		{
			$tanggal_lahir = filter_var($_POST['tanggal_lahir'], FILTER_SANITIZE_NUMBER_INT);
			if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $tanggal_lahir))
			{
				$err = true;
				$err_tanggal_lahir = 'Format tanggal lahir harus yyyy-mm-dd.';
			}
		}
		
		if ($_POST['agama'] == '')
		{
			$err = true;
			$err_agama = 'Agama harus diisi.';
		}
		else
		{
			$agama = filter_var($_POST['agama'], FILTER_SANITIZE_STRING);
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
			$err 		= true;
			$err_tlp 	= 'Telepon harus diisi.';
		}
		elseif (!is_numeric($_POST['tlp']))
		{
			$err 		= true;
			$err_tlp 	= 'Telepon harus diisi dengan angka.';
		}
		else
		{
			$tlp = filter_var($_POST['tlp'], FILTER_SANITIZE_NUMBER_INT);
		}
		
		if ($_POST['sekolah'] == '')
		{
			$err = true;
			$err_sekolah = 'Asal sekolah harus diisi.';
		}
		else
		{
			$sekolah = filter_var($_POST['sekolah'], FILTER_SANITIZE_STRING);
		}
		
		$kelas = $_POST['kelas'];
		
		if ($_POST['sekolah'] == '')
		{
			$err 			= true;
			$err_sekolah 	= 'Asal sekolah harus diisi.';
		}
		else
		{
			$sekolah = filter_var($_POST['sekolah'], FILTER_SANITIZE_STRING);
		}
		$hobi			= filter_var($_POST['hobi'], FILTER_SANITIZE_STRING);
		$cita			= filter_var($_POST['cita'], FILTER_SANITIZE_STRING);
		if ($_POST['ayah'] == '')
		{
			$err 		= true;
			$err_ayah 	= 'Nama ayah harus diisi.';
		}
		else
		{
			$ayah	= filter_var($_POST['ayah'], FILTER_SANITIZE_STRING);
		}
		
		if ($_POST['ibu'] == '')
		{
			$err 		= true;
			$err_ibu	= 'Nama ibu harus diisi.';
		}
		else
		{
			$ibu	= filter_var($_POST['ibu'], FILTER_SANITIZE_STRING);
		}
		$pekerjaanayah	= filter_var($_POST['pekerjaanayah'], FILTER_SANITIZE_STRING);
		$pekerjaanibu	= filter_var($_POST['pekerjaanibu'], FILTER_SANITIZE_STRING);
		
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
		
		//var_dump($_FILES['foto']);
		if ($_FILES['foto']['name'] == '')
		{
			$err 		= true;
			$err_foto 	= 'Mohon upload foto Anda.';
		}
		
		if (!$err)
		{
			$nomor_formulir	= 'FORM.'.date('y').$kelas.'.'.$kode_program.'.'.get_no_urut();
			$success 		= simpan_formulir($nomor_formulir,$nama,$jenis_kelamin,$kota_lahir,$tanggal_lahir,$agama,$alamat,$tlp,$sekolah,$kelas,$hobi,$cita,$ayah,$ibu,$pekerjaanayah,$pekerjaanibu,$email,$kode_program);
			if ($success == true)
			{
				$uploads_dir 	= './uploads/foto';
				$tmp_name 		= $_FILES['foto']['tmp_name'];
				$name 			= $nomor_formulir.'-'.$_FILES['foto']['name'];
				if (move_uploaded_file($tmp_name, "$uploads_dir/$name"))
				{
					update_formulir($nomor_formulir, "$uploads_dir/$name");
				}
				else
				{
					echo '<script>alert("Sorry, can not upload photo.");</script>';
				}
				$body_mail = '<html><head><meta http-equiv="content-type" content="text/html; charset=utf-8" /></head><body>
		<h1>Terimakasih.</h1>
		<p>Saat ini Anda sudah terdaftar sebagai calon siswa bimbel CEC. Untuk mengaktivasi akun Anda, segera lakukan pembayaran dengan datang langsung ke bimbel CEC.</p>
		<p>Anda sudah bisa masuk ke ruang siswa untuk melihat status pembayaran. Silahkan login menggunakan akun Anda.</p>
		No Formulir : '.$nomor_formulir.'<br/>
		Password: '.$tanggal_lahir.'<br/>
		<p>Silahkan login <a href="http://bimbelcec.com/?pg=siswa&do=login">disini</a>.</p>
		</body>
		</html>';
				$headers = "From: admin@bimbelcec.com\r\n";
				$headers .= "Reply-to: admin@bimbelcec.com\r\n";
				$headers .= "Content-type: text/html";
				if ((isset($_SERVER['HTTP_HOST']) && ($_SERVER['HTTP_HOST'] == 'www.bimbelcec.com' || $_SERVER['HTTP_HOST'] == 'bimbelcec.com')) || $_SERVER['SERVER_NAME'] == 'www.bimbelcec.com' || $_SERVER['SERVER_NAME'] == 'bimbelcec.com')
				{
					$mail_sent = mail($email, "Registrasi Online - Bimbel CEC", $body_mail, $headers);
				}
				else
				{
					echo '<script>alert("Maaf, saat ini sistem sedang offline. Sistem tidak bisa mengirim informasi login ke email Anda. Mohon cetak formulir Anda dan segera hubungi staf Bimbel CEC. Mohon maaf atas ketidaknyamanan Anda. Terimakasih.");</script><br/>';
				}
				// freeup $_POST variables
				foreach($_POST as $key=>$value)
				{
					unset($_POST[$key]);
				}			
			}
		}	
	}
	?>
	<div class="main_content">
		<div class="wide_content">
			<h1>Formulir Pendaftaran CEC</h1>
			<?php echo (isset($success) && $success == true) ? '<p>Pendaftaran kursus berhasil. Silahkan <a href="index.php?pg=pendaftaran&action=formprint&no='.$nomor_formulir.'">print formulir pendaftaran Anda</a>.</p>' : ''; ?>
			<?php echo (isset($success) && $success == false) ? '<p>Maaf pendaftaran gagal. Kesalahan sistem. Silahkan coba lagi.</p>' : ''; ?>
			<form action="" method="post" enctype="multipart/form-data" name="form1">
				<center>
				<table width="65%" border="0" cellspacing="5" cellpadding="5">
					<tr>
						<td width="32%" valign="top">Nama Lengkap</td>
						<td width="2%" align="center" valign="top">:</td>
						<td width="66%">
							<input name="nama" type="text" id="nama" value="<?php echo (isset($_POST['nama'])) ? $_POST['nama'] : ''; ?>" size="55">
							<?php echo (isset($err_nama)) ? '<p class="error">'.$err_nama.'</p>' : ''; ?>
						</td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td align="center">:</td>
						<td>
							<label>
								<input type="radio" name="jenis_kelamin" id="laki" value="Laki-laki" <?php echo (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == 'Laki-laki') ? 'checked' : ''; ?>> Laki-laki 
							</label>
							<label>
								<input type="radio" name="jenis_kelamin" id="cewe" value="Perempuan" <?php echo (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == 'Perempuan') ? 'checked' : ''; ?>> Perempuan
							</label>
							<?php echo (isset($err_jenis_kelamin)) ? '<p class="error">'.$err_jenis_kelamin.'</p>' : ''; ?>
						</td>
					</tr>
					<tr>
						<td valign="top">Kota kelahiran</td>
						<td align="center" valign="top">:</td>
						<td>
							<input name="kota_lahir" type="text" value="<?php echo (isset($_POST['kota_lahir'])) ? $_POST['kota_lahir'] : ''; ?>" id="ttl" size="55">
							<?php echo (isset($err_kota_lahir)) ? '<p class="error">'.$err_kota_lahir.'</p>' : ''; ?>
						</td>
					</tr>
					<tr>
						<td valign="top">Tanggal lahir</td>
						<td align="center" valign="top">:</td>
						<td>
							<input name="tanggal_lahir" type="text" value="<?php echo (isset($_POST['tanggal_lahir'])) ? $_POST['tanggal_lahir'] : ''; ?>" id="datepicker" size="55" placeholder="yyyy-mm-dd">
							<?php echo (isset($err_tanggal_lahir)) ? '<p class="error">'.$err_tanggal_lahir.'</p>' : ''; ?>
						</td>
					</tr>
					<tr>
						<td valign="top">Agama</td>
						<td align="center" valign="top">:</td>
						<td>
							<input name="agama" type="text" value="<?php echo (isset($_POST['agama'])) ? $_POST['agama'] : ''; ?>" id="agama" size="55">
							<?php echo (isset($err_agama)) ? '<p class="error">'.$err_agama.'</p>' : ''; ?>
						</td>
					</tr>
					<tr>
						<td valign="top">Alamat</td>
						<td align="center" valign="top">:</td>
						<td>
							<textarea name="alamat" id="alamat" cols="45" rows="5"><?php echo (isset($_POST['alamat'])) ? $_POST['alamat'] : ''; ?></textarea>
							<?php echo (isset($err_alamat)) ? '<p class="error">'.$err_alamat.'</p>' : ''; ?>
						</td>
					</tr>
					<tr>
						<td valign="top">No telp / Hp</td>
						<td align="center" valign="top">:</td>
						<td>
							<input name="tlp" type="text" value="<?php echo (isset($_POST['tlp'])) ? $_POST['tlp'] : ''; ?>" id="tlp" size="55">
							<?php echo (isset($err_tlp)) ? '<p class="error">'.$err_tlp.'</p>' : ''; ?>
						</td>
					</tr>
					<tr>
						<td valign="top">Asal Sekolah</td>
						<td align="center" valign="top">:</td>
						<td>
							<input name="sekolah" type="text" value="<?php echo (isset($_POST['sekolah'])) ? $_POST['sekolah'] : ''; ?>" id="sekolah" size="55">
							<?php echo (isset($err_sekolah)) ? '<p class="error">'.$err_sekolah.'</p>' : ''; ?>
						</td>
					</tr>				
					<tr>
						<td width="32%">Kelas</td>
						<td width="2%" align="center">:</td>
						<td width="66%">
							<select name="kelas">
								<option value="01" <?php echo (isset($_POST['kelas']) && $_POST['kelas'] == '01') ? 'selected' : ''; ?>>SD kelas 1</option>
								<option value="02" <?php echo (isset($_POST['kelas']) && $_POST['kelas'] == '02') ? 'selected' : ''; ?>>SD kelas 2</option>
								<option value="03" <?php echo (isset($_POST['kelas']) && $_POST['kelas'] == '03') ? 'selected' : ''; ?>>SD kelas 3</option>
								<option value="04" <?php echo (isset($_POST['kelas']) && $_POST['kelas'] == '04') ? 'selected' : ''; ?>>SD kelas 4</option>
								<option value="05" <?php echo (isset($_POST['kelas']) && $_POST['kelas'] == '05') ? 'selected' : ''; ?>>SD kelas 5</option>
								<option value="06" <?php echo (isset($_POST['kelas']) && $_POST['kelas'] == '06') ? 'selected' : ''; ?>>SD kelas 6</option>
								<option value="07" <?php echo (isset($_POST['kelas']) && $_POST['kelas'] == '07') ? 'selected' : ''; ?>>SLTP kelas VII</option>
								<option value="08" <?php echo (isset($_POST['kelas']) && $_POST['kelas'] == '08') ? 'selected' : ''; ?>>SLTP kelas VIII</option>
								<option value="09" <?php echo (isset($_POST['kelas']) && $_POST['kelas'] == '09') ? 'selected' : ''; ?>>SLTP kelas IX</option>
								<option value="10" <?php echo (isset($_POST['kelas']) && $_POST['kelas'] == '10') ? 'selected' : ''; ?>>SLTA kelas X</option>
								<option value="11" <?php echo (isset($_POST['kelas']) && $_POST['kelas'] == '11') ? 'selected' : ''; ?>>SLTA kelas XI</option>
								<option value="12" <?php echo (isset($_POST['kelas']) && $_POST['kelas'] == '12') ? 'selected' : ''; ?>>SLTA kelas XII</option>
							</select>
						</td>
					</tr>
					<tr>
						<td valign="top">Hobi</td>
						<td align="center" valign="top">:</td>
						<td>
							<input name="hobi" type="text" value="<?php echo (isset($_POST['hobi'])) ? $_POST['hobi'] : ''; ?>" id="hobi" size="55">
						</td>
					</tr>
					<tr>
						<td valign="top">Cita - cita</td>
						<td align="center" valign="top">:</td>
						<td>
							<input name="cita" type="text" value="<?php echo (isset($_POST['cita'])) ? $_POST['cita'] : ''; ?>" id="cita" size="55">
						</td>
					</tr>
					<tr>
						<td>Nama Orang Tua</td>
						<td align="center">&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td valign="top">a. Ayah</td>
						<td align="center" valign="top">:</td>
						<td>
							<input name="ayah" type="text" value="<?php echo (isset($_POST['ayah'])) ? $_POST['ayah'] : ''; ?>" id="ayah" size="55">
							<?php echo (isset($err_ayah)) ? '<p class="error">'.$err_ayah.'</p>' : ''; ?>
						</td>
					</tr>
					<tr>
						<td valign="top">b. Ibu</td>
						<td align="center" valign="top">:</td>
						<td>
							<input name="ibu" type="text" value="<?php echo (isset($_POST['ibu'])) ? $_POST['ibu'] : ''; ?>" id="ibu" size="55">
							<?php echo (isset($err_ibu)) ? '<p class="error">'.$err_ibu.'</p>' : ''; ?>
						</td>
					</tr>
					<tr>
						<td>Pekerjaan Orang Tua</td>
						<td align="center">&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td valign="top">a. Ayah</td>
						<td align="center" valign="top">:</td>
						<td>
							<input name="pekerjaanayah" type="text" value="<?php echo (isset($_POST['pekerjaanayah'])) ? $_POST['pekerjaanayah'] : ''; ?>" id="pekerjaanayah" size="55">
						</td>
					</tr>
					<tr>
						<td valign="top">b. Ibu</td>
						<td align="center" valign="top">:</td>
						<td>
							<input name="pekerjaanibu" type="text" value="<?php echo (isset($_POST['pekerjaanibu'])) ? $_POST['pekerjaanibu'] : ''; ?>" id="pekerjaanibu" value="" size="55">
						</td>
					</tr>
					<tr>
						<td valign="top"><p>*Email </p></td>
						<td align="center" valign="top">:</td>
						<td>
							<input name="email" type="text" value="<?php echo (isset($_POST['email'])) ? $_POST['email'] : ''; ?>" id="email" size="55">
							<?php echo (isset($err_email)) ? '<p class="error">'.$err_email.'</p>' : ''; ?>
						</td>
					</tr>
					<tr>
						<td valign="top">Program yang Diambil</td>
						<td align="center" valign="top">:</td>
						<td>
							<label><input type="radio" name="kode_program" value="1000" id="bimbel2" <?php echo (isset($_POST['kode_program']) && $_POST['kode_program'] == '1000') ? 'checked' : ''; ?>>Bimbel</label> <br>
							<label><input type="radio" name="kode_program" value="0100" id="kursus2" <?php echo (isset($_POST['kode_program']) && $_POST['kode_program'] == '0100') ? 'checked' : ''; ?>>Kursus B.Inggris</label><br>
							<label><input type="radio" name="kode_program" value="0010" id="komp2" <?php echo (isset($_POST['kode_program']) && $_POST['kode_program'] == '0010') ? 'checked' : ''; ?>>Kursus Komputer</label> <br>
							<label><input type="radio" name="kode_program" value="0001" id="les2" <?php echo (isset($_POST['kode_program']) && $_POST['kode_program'] == '0001') ? 'checked' : ''; ?>>Les Private </label>
							<?php echo (isset($err_program)) ? '<p class="error">'.$err_program.'</p>' : ''; ?>
						</td>
					</tr>
					<tr>
						<td valign="top">Upload Foto</td>
						<td align="center" valign="top">:</td>
						<td>
							<img id="foto" width="200" height="200">
							<input type="file" name="foto" id="upload" onChange="readURL(this);">
							<?php echo (isset($err_foto)) ? '<p class="error">'.$err_foto.'</p>' : ''; ?>
						</td>
					</tr>
					<tr>
						<td colspan="3" align="center"><label>
							<input type="submit" name="proses" id="proses" value="PROSES">
						</label></td>
					</tr>
				</table>
				</center>
			</form>
		</div>
		<!--End of wide_content-->
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
<?php
elseif ($action == 'formprint') :
	$no = isset($_GET['no']) ? $_GET['no'] : '';
	if ($no == '') :
		echo 'search formulir';
	else :
		echo '<script>location="print.php?pg=form&no='.$no.'";</script>' ;
	endif;
endif;