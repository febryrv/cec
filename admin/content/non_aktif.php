<?php
include"../setting/koneksi.php";
$aktivasi=mysql_query("UPDATE content set
IS_AKTIF = '0' where ID_CONTENT = '$_GET[id]'
");
if($aktivasi){
?>
<script type="text/javascript">
alert('Content Telah di nonaktifkan');
document.location ='?pg=content/data_content';
</script>
<?php
}else{
	?>
    <script type="text/javascript">
alert('Content Gagal di nonaktifkan');
document.location ='?pg=content/data_content';
</script>
<?php
}
?>