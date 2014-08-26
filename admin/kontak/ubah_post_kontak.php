<?php
if ($_POST)
{
	if ($_POST['pesan'] == '')
	{
		$e_pesan = 'Isi pesan tidak boleh kosong.';
	}
	else
	{
		$ubah = mysql_query("UPDATE buku_tamu
		SET pesan = '$_POST[pesan]'
		WHERE id = '$_POST[id]'");

		if($ubah)
		{
			?>
			<script type="text/javascript">
				alert('Data Berhasil Diubah');
				document.location='?pg=kontak/data_kontak';
			</script>
			<?php
		}
		else
		{
			?>
			<script type="text/javascript">
			alert('Data Gagal Diubah');
			document.location='?pg=kontak/data_kontak';
			</script>
			<?php
		}
	}
}