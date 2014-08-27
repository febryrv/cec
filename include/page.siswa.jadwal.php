<?php
function get_detail_siswa($nis)
{
	$sql = "SELECT s.nis, s.kode_program, s.foto, k.nama, k.jadwal
		FROM siswa AS s
			INNER JOIN kursus AS k ON s.kode_program = k.kode_program
		WHERE nis = '$nis'";
	$Q	= mysql_query($sql) or die(mysql_error());
	return mysql_fetch_assoc($Q);
}

$siswa = get_detail_siswa($_SESSION['nis']);
?>
<style>
label.profil {
	color: #868788;
    float: left;
    font-size: 14px;
    font-weight: bold;
    padding: 4px 15px 0 0;
}
</style>
<!--

`nis` , `nama` , `foto` , `kode_program` , `jenis_kelamin` , `agama` , `email` , `password` , `alamat` , `kota_lahir` , `tanggal_lahir` , `sekolah` , `kelas` , `hobi` , `cita` , `tlp` , `ayah` , `ibu` , `pekerjaanayah` , `pekerjaanibu` , `tanggal_daftar`
-->
<div class="main_content">
    <div class="left_content">
		<h1>Jadwal Kursus</h1>
		<?php echo (isset($success) && $success == true) ? '<p>Pesan Anda sukses terkirim. Kami akan segera meresponya.</p>' : ''; ?>
		<div class="contact_form">
			<form method="post" >
			<div class="form_row">
				<label class="contact">nis:</label>
				<label class="profil"><?php echo $siswa['nis']; ?></label>
			</div>
			<div class="form_row">
				<label class="contact">kode:</label>
				<label class="profil"><?php echo $siswa['kode_program']; ?></label>
			</div>
			<div class="form_row">
				<label class="contact">kursus:</label>
				<label class="profil"><?php echo $siswa['nama']; ?></label>
			</div>
			<div class="form_row">
				<label class="contact">jadwal:</label>
				<label class="profil"><?php echo $siswa['jadwal']; ?></label>
			</div>
			</form>
		</div>
    </div>
    <!--End of left_content-->
    <div class="right_content">
		<div class="employe_box_left">
			<span class="blue">Foto</span><br />
			<img src="<?php echo $siswa['foto']; ?>" alt="<?php echo $siswa['nama']; ?>" title="<?php echo $siswa['nama']; ?>"/> 
		</div>
		<div class="employe_box_right">
			<span class="blue">Menu Siswa</span><br />
			<ul style="margin-left: -28px;">
				<li><a href="?pg=siswa">Profil</a></li>
				<li><a href="?pg=siswa&do=edit">Edit</a></li>
				<li><a href="?pg=siswa&do=jadwal">Jadwal</a></li>
				<li><a href="?pg=siswa&do=logout">Logout</a></li>
			</ul>
		</div>
    </div>
    <!--End of right_content-->
	<div class="clear"></div>
</div>
<!--End of main_content-->