<?php
include"../setting/koneksi.php";
$aktivasi=mysql_query("UPDATE content set
IS_AKTIF = '1' where ID_CONTENT = '$_GET[id]'
");
if($aktivasi){
?>
<script type="text/javascript">
alert('Content Telah diaktifkan');
document.location ='?pg=content/data_content';
</script>
<?php
}else{
?>
<script type="text/javascript">
alert('Content Gagal diaktifkan');
document.location ='?pg=content/data_content';
</script>
<?php
}
?>