<?php
$gambar	= mysql_query("SELECT *
	FROM artikel 
	WHERE id_artikel = '$_GET[id]'");
$file = mysql_fetch_array($gambar);
if ($file['gambar'] != '')
	$hapus = unlink('../uploads/gambar/'.$file['gambar']);
$hapus = mysql_query("DELETE FROM artikel 
	WHERE id_artikel = '$_GET[id]'") or die(mysql_error());
if($hapus){
?>
	<script type="text/javascript">
    alert('Data Berhasil Dihapus');
    document.location='?pg=content/data_content';
    </script>
	<?php
    }else{
    ?>
	<script type="text/javascript">
    alert('Data Gagal Dihapus');
    document.location='?pg=content/data_content';
    </script>
<?php
}
?>