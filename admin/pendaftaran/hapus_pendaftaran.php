<?php
$hapus = mysql_query("DELETE FROM formulir WHERE nomor_formulir = '$_GET[id]'") or die(mysql_error());
if($hapus){
?>
	<script type="text/javascript">
    alert('Data Berhasil Dihapus');
    document.location='?pg=pendaftaran/data_pendaftar';
    </script>
	<?php
    }else{
    ?>
	<script type="text/javascript">
    alert('Data Gagal Dihapus');
    document.location='?pg=pendaftaran/data_pendaftar';
    </script>
<?php
}
?>