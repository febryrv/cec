<?php
$hapus = mysql_query("DELETE FROM admin 
	WHERE username = '$_GET[id]'") or die(mysql_error());
if($hapus){
?>
	<script type="text/javascript">
    alert('Data Berhasil Dihapus');
    document.location='?pg=admin/data_admin';
    </script>
	<?php
    }else{
    ?>
	<script type="text/javascript">
    alert('Data Gagal Dihapus');
    document.location='?pg=admin/data_admin';
    </script>
<?php
}
?>