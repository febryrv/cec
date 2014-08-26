<?php
$sql 	= "SELECT * 
	FROM tentang_kami";
$Q 		= mysql_query($sql);
$data 	= mysql_fetch_assoc($Q);
?>
<div class="main_content">
	<div class="wide_content">
		<h1><?php echo $data['judul']; ?></h1>
		<div style="min-height: 800px; min-width: 800px; margin-left: auto; margin-right: auto; text-align: center; display: table-cell; padding-bottom:20px;">
			<img src="uploads/gambar/<?php echo $data['gambar']; ?>"/>
		</div>
		<?php echo $data['isi']; ?>
	</div>
	<div class="clear"></div>
</div>
<!--End of home_center_content-->