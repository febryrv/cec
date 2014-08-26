<?php
include '../setting/koneksi.php';
$file = $_FILES['gambar']['name'];
$simpan = mysql_query("INSERT INTO gallery (
JUDUL,
GAMBAR,
KETERANGAN
)
VALUES (
'$_POST[judul]',  '$file',  '$_POST[ket]'
)");	
$move=move_uploaded_file($_FILES['gambar']['tmp_name'], '../images/gallery/'.$file);
if($simpan){
?>
	<script type="text/javascript">
    alert('Data Berhasil Disimpan');
    document.location='?pg=gallery/data_gallery';
    </script>
<?php
}else{
?>
	<script type="text/javascript">
    alert('Data Gagal Disimpan');
    document.location='?pg=gallery/data_gallery';
    </script>
<?php
}
?>