<?php
$sql 	= "SELECT * FROM slider";
$Q 		= mysql_query($sql);
$i		= 1;
?>
<div class="home_center_content">
	<div class="home_center_content">
		<?php while($data = mysql_fetch_array($Q)) : ?>
			<div class="box1" id="tab<?php echo $i; ?>">
				<div class="center_text">
					<div class="big_title"><?php echo $data['judul']; ?></div>
					<?php echo $data['isi']; ?>
				</div>
				<div class="right_img">
					<img src="uploads/gambar/home/<?php echo $data['gambar']; ?>" alt="" />
				</div>
			</div>
			<?php $i++; ?>
		<?php endwhile; ?>
		<ul class="center_button_icons tabset">
			<li id="icon1"> <a href="?pg=tentang-kami" class="tab"> <img src="assets/images/c4.png" alt="" width="120" height="120" border="0" /> </a> </li>
			<li id="icon2"> <a href="?pg=pendaftaran" class="tab"> <img src="assets/images/c3.png"  alt="" width="120" height="120" border="0"/> </a> </li>
			<li id="icon3"> <a href="?pg=siswa&do=login" class="tab"> <img src="assets/images/c5.png" alt="" width="120" height="120" border="0" /> </a> </li>
		</ul>
	</div>
</div>
<!--End of home_center_content-->
<script type="text/javascript">
		function hideall() {
			$("#tab1").hide();
			$("#tab2").hide();
			$("#tab3").hide();
			$("#tab4").hide();			
		}
		$(document).ready(function(){

			$("#icon1").mouseover(function () {
				hideall();
			$("#tab1").css("display","block");     
			});

			$("#icon2").mouseover(function () {
				hideall();
				$("#tab2").css("display","block");     
			});

			$("#icon3").mouseover(function () {
				hideall();
				$("#tab3").css("display","block");     
			});  

			hideall();
			$("#tab1").show();       

		});
		</script>