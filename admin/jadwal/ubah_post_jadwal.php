<?php
if ($_POST)
{
	$error = false;
	if ($_POST['nama'] == '')
	{
		$error 	= true;
		$e_nama = 'Nama harus diisi.';
	}	
	if ($_POST['jadwal'] == '')
	{
		$error 	= true;
		$e_jadwal 	= 'Jadwal harus diisi.';
	}
	
	if (!$error)
	{
		$ubah = mysql_query("UPDATE kursus
		SET nama = '$_POST[nama]', 
			jadwal = '$_POST[jadwal]'
		WHERE kode_program = '$_POST[kode_program]'");
		if($ubah)
		{
		?>
		<script type="text/javascript">
			alert('Data Berhasil Diubah');
			document.location='?pg=jadwal/data_jadwal';
		</script>
		<?php
		}
		else
		{
			?>
			<script type="text/javascript">
			alert('Data Gagal Diubah');
			document.location='?pg=jadwal/data_jadwal';
			</script>
			<?php
		}
	}
}