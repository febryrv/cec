<?php
if ($_POST)
{
	$error = false;
	if ($_POST['nama'] == '')
	{
		$error 	= true;
		$e_nama = 'Judul harus diisi.';
	}	
	if ($_POST['isi'] == '')
	{
		$error 	= true;
		$e_isi 	= 'Isi artikel harus diisi.';
	}
	
	if (!$error)
	{
		$file = $_FILES['gambar']['name'];

		if(empty($file))
		{
			$ubah = mysql_query("UPDATE tentang_kami
			SET judul = '$_POST[nama]',
				isi = '$_POST[isi]',
				update_terakhir = CURRENT_TIMESTAMP") or die(mysql_error());
		}
		else
		{
			$ubah = mysql_query("UPDATE tentang_kami
			SET judul = '$_POST[nama]',
				isi = '$_POST[isi]',
				gambar = '$file',
				update_terakhir = CURRENT_TIMESTAMP") or die(mysql_error());
			$move = move_uploaded_file($_FILES['gambar']['tmp_name'], '../uploads/gambar/'.$file);
		}
		if($ubah)
		{
		?>
		<script type="text/javascript">
			alert('Data Berhasil Diubah');
			document.location='?pg=content/data_content';
		</script>
		<?php
		}else{
			?>
			<script type="text/javascript">
			alert('Data Gagal Diubah');
			document.location='?pg=content/data_content';
			</script>
			<?php
		}
	}
}