<?php
include"../setting/koneksi.php";
$gambar	= mysql_query("SELECT * FROM gallery WHERE ID_GALLERY = '$_GET[id]'");
$file = mysql_fetch_array($gambar);
$hapus = unlink('../images/gallery/'.$file['GAMBAR']);
$hapus = mysql_query("DELETE FROM gallery WHERE ID_GALLERY = '$_GET[id]'")or die(mysql_error());
if($hapus){
?>
	<script type="text/javascript">
    alert('Data Berhasil Dihapus');
    document.location='?pg=gallery/data_gallery';
    </script>
	<?php
    }else{
    ?>
	<script type="text/javascript">
    alert('Data Gagal Dihapus');
    document.location='?pg=gallery/data_gallery';
    </script>
<?php
}
?>