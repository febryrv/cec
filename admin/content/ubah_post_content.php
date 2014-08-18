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
		$e_isi = 'Isi artikel harus diisi.';
	}
	
	if (!$error)
	{
		$file = $_FILES['gambar']['name'];

		if(empty($file))
		{
			$ubah = mysql_query("UPDATE artikel
			SET judul_artikel = '$_POST[nama]',
				update_terakhir = '".date('Y-m-d')."',
				isi_artikel = '$_POST[isi]' 
			WHERE id_artikel = '$_GET[id]'
			");
		}
		else
		{
			$ubah = mysql_query("UPDATE artikel SET 
			SET judul_artikel = '$_POST[nama]',
				update_terakhir = '$_POST[tanggal]',
				isi_artikel = '$_POST[isi]',
				gambar = '$file'
				isi_artikel = '$_POST[isi]'
			WHERE isi_artikel = '$_GET[id]'");
			$move=move_uploaded_file($_FILES['gambar']['tmp_name'], '../uploads/gambar/'.$file);
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