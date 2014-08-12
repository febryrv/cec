<?php

if ($_POST)
{
	$error = false;
	
	if ($_POST['judul'] == '')
	{
		$error		= true;
		$e_judul 	= 'Judul harus diisi.';
	}
	
	if ($_POST['isi'] == '')
	{
		$error	= true;
		$e_isi	= 'Deskripsi harus diisi.';
	}
	
	if (!$error)
	{
		$file = $_FILES['gambar']['name'];

		if(empty($file))
		{
			$ubah = mysql_query("UPDATE slider
				SET judul = '$_POST[judul]', 
					isi = '$_POST[isi]' 
				WHERE id = '$_POST[id]'");
		}
		else
		{
			$ubah = mysql_query("UPDATE slider
				SET judul = '$_POST[judul]', 
					gambar = '$file', 
					isi = '$_POST[isi]'
				WHERE id = '$_POST[id]'");
			$move=move_uploaded_file($_FILES['gambar']['tmp_name'], '../uploads/gambar/home/'.$file);
		}

		if($ubah){
		?>
		<script type="text/javascript">
			alert('Data Berhasil Diubah');
			document.location='?pg=slide/data_slide';
		</script>
		<?php
		}
		else
		{
			?>
			<script type="text/javascript">
			alert('Data Gagal Diubah');
			document.location='?pg=slide/data_slide';
			</script>
			<?php
		}
	}
}