<?php
session_start();
include 'config/koneksi.php';
include 'include/redirection.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Creative Education Course</title>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
		<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/ui-lightness/jquery-ui-1.9.2.custom.min.css" />
		<!--[if IE 6]><script type="text/javascript" src="assets/js/unitpngfix.js"></script><![endif]-->
		<script type="text/javascript" src="assets/js/jquery-1.8.3.js"></script>
		<script type="text/javascript" src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
	</head>
	<body>
		<div class="wrap">
			<div class="header">
				<div class="logo">
					<a href="index.php"><img src="assets/images/clogo.png" alt="" width="357" height="97" border="0" /></a>
</div>
				<div id="menu">
					<ul>
						<li class="<?php if(!isset($_GET['pg']) || isset($_GET['pg']) && $_GET['pg'] == '') echo 'selected'; ?>"><a href="index.php">home</a></li>
						<li class="<?php if(isset($_GET['pg']) && $_GET['pg'] == 'tentang-kami') echo 'selected'; ?>"><a href="?pg=tentang-kami">tentang kami</a></li>
						<?php if (!isset($_SESSION['nis'])) : ?>
							<li class="<?php if(isset($_GET['pg']) && $_GET['pg'] == 'pendaftaran') echo 'selected'; ?>"><a href="?pg=pendaftaran">pendaftaran</a></li>
						<?php endif; ?>
						<li class="<?php if(isset($_GET['pg']) && $_GET['pg'] == 'buku-tamu') echo 'selected'; ?>"><a href="?pg=buku-tamu">buku tamu</a></li>
						<?php if (isset($_SESSION['nis'])) : ?>
							<li class="<?php if(isset($_GET['pg']) && $_GET['pg'] == 'siswa') echo 'selected'; ?>"><a href="?pg=siswa"><?php echo $_SESSION['nama']; ?></a></li>
						<?php else : ?>
							<li><a href="?pg=siswa&do=login">login siswa</a></li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
			<!--End of header-->
			<?php
			// controller
			include "include/controller.php";
			?>
		</div>
		<!--End of wrap-->
		<div class="footer">
			<div class="footer_content">
				<div class="footer_tab1">
					<h2>Hubungi Kami</h2>
					<span class="email">Email: ceceokay@yahoo.co.id</span>
					<div class="footer_info"> <span class="orange">Alamat:</span>
						<p class="info"> Bumi Ps.Kemis  Jl. Melati 1 E4 No.20</p>
					</div>
					<div class="footer_info">
						<span class="orange">Telepon:</span>
						<p class="info">0856 9163 3930</p>
				  </div>
					<div class="footer_copyrights">
<img src="assets/images/pic1.jpg" alt="" width="272" height="69" /><br />
						&copy; <?php echo date('Y'); ?> All Rights Reserved<br />
						Develop by: <a href="http://facebook.com/febri_rv">Febry_rv</a>
					</div>
				</div>
				<!--End of footer_tab1-->
				<div class="footer_tab2">
				  <h2>Keunggulan</h2>
				  <div class="favorites_box"> <span class="fav_nr">1</span>
					<p class="favorites"> Ruang belajar dengan fasilitas belajar yang memadai untuk menunjang proses belajar yang baik. </p>
				  </div>
				  <div class="favorites_box"> <span class="fav_nr">2</span>
					<p class="favorites"> Biaya belajar yang terjangkau bagi sebagian besar masyarakat Indonesia. </p>
				  </div>
				  <div class="favorites_box"> <span class="fav_nr">3</span>
					<p class="favorites"> Kurikulum up-to-date, yang disesuaikan dengan kurikulum dari pemerintah pusat. </p>
				  </div>
				</div>
				<!--End of footer_tab2-->
				<div class="footer_tab3">
				  <h2>Links</h2>
				  <div class="footer_links">
					<ul>
					  <li><a href="index.php">Home</a></li>
					  <li><a href="?pg=tentang-kami">Tentang Kami</a></li>
					  <li><a href="?pg=pendaftaran">Pendaftaran</a></li>
					  <li><a href="?pg=buku-tamu">Buku Tamu</a></li>
					  <li><a href="admin">Login Admin</a></li>
					</ul>
				  </div>
				</div>
				<!--End of footer_tab3-->
				<div class="clear"></div>
			</div>
		  <!--End of footer_content-->
		</div>
		<!--End of footer-->
	</body>
</html>