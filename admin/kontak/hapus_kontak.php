<?php
include"../setting/koneksi.php";

$hapus = mysql_query("DELETE FROM kontak WHERE ID_KONTAK = '$_GET[id]'")or die(mysql_error());
if($hapus){
?>
	<script type="text/javascript">
    alert('Data Berhasil Dihapus');
    document.location='?pg=kontak/data_kontak';
    </script>
	<?php
    }else{
    ?>
	<script type="text/javascript">
    alert('Data Gagal Dihapus');
    document.location='?pg=kontak/data_kontak';
    </script>
<?php
}
?>