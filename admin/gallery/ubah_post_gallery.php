<?php
include '../setting/koneksi.php';
$file = $_FILES['gambar']['name'];

if(empty($file)){
	$ubah = mysql_query("UPDATE gallery SET 
	JUDUL = '$_POST[judul]', 
	KETERANGAN = '$_POST[ket]' WHERE ID_GALLERY = '$_GET[id]'
	");
}else{
	$ubah = mysql_query("UPDATE gallery SET 
	JUDUL = '$_POST[judul]', 
	GAMBAR = '$file', 
	KETERANGAN = '$_POST[ket]' WHERE ID_GALLERY = '$_GET[id]'
	");
	$move=move_uploaded_file($_FILES['gambar']['tmp_name'], '../images/gallery/'.$file);
}

if($ubah){
?>
<script type="text/javascript">
    alert('Data Berhasil Diubah');
    document.location='?pg=gallery/data_gallery';
</script>
<?php
}else{
	?>
	<script type="text/javascript">
    alert('Data Gagal Diubah');
    document.location='?pg=gallery/data_gallery';
    </script>
    <?php
}
?>