<?php

	$ubah = mysql_query("UPDATE buku_tamu SET 
	nama = '$_POST[nama]', 
	email= '$_POST[email]', 
	tanggal = '$_POST[tanggal]',
	telepon = '$_POST[no_hp]',
	pesan = '$_POST[pesan]' WHERE id = '$_GET[id]'
	");

if($ubah){
?>
<script type="text/javascript">
    alert('Data Berhasil Diubah');
    document.location='?pg=kontak/data_kontak';
</script>
<?php
}else{
	?>
	<script type="text/javascript">
    alert('Data Gagal Diubah');
    document.location='?pg=kontak/data_kontak';
    </script>
    <?php
}
?>