<?php
$sql 	= "SELECT * 
	FROM artikel
	WHERE id_artikel = '1'";
$Q 		= mysql_query($sql);
$data 	= mysql_fetch_assoc($Q);
?>
<div class="main_content">
	<div class="wide_content">
		<h1><?php echo $data['judul_artikel']; ?></h1>
		<?php echo $data['isi_artikel']; ?>
	</div>
	<div class="clear"></div>
</div>
<!--End of home_center_content-->