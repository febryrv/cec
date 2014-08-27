<?php
function get_detail_siswa($nis)
{
	$sql = "SELECT *
		FROM siswa
		WHERE nis = '$nis'";
	$Q	= mysql_query($sql);
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
		<h1>Profil Saya</h1>
		<?php echo (isset($success) && $success == true) ? '<p>Pesan Anda sukses terkirim. Kami akan segera meresponya.</p>' : ''; ?>
		<div class="contact_form">
			<form method="post" >
			<div class="form_row">
				<label class="contact">nis:</label>
				<label class="profil"><?php echo $siswa['nis']; ?></label>
			</div>
			<div class="form_row">
				<label class="contact">nama:</label>
				<label class="profil"><?php echo $siswa['nama']; ?></label>
			</div>
			<div class="form_row">
				<label class="contact">email:</label>
				<label class="profil"><?php echo $siswa['email']; ?></label>
			</div>
			<div class="form_row">
				<label class="contact">kode program:</label>
				<label class="profil"><?php echo $siswa['kode_program']; ?></label>
			</div>
			<div class="form_row">
				<label class="contact">agama:</label>
				<label class="profil"><?php echo $siswa['agama']; ?></label>
			</div>
			<div class="form_row">
				<label class="contact">sekolah:</label>
				<label class="profil"><?php echo $siswa['sekolah']; ?></label>
			</div>
			<div class="form_row">
				<label class="contact">telepon:</label>
				<label class="profil"><?php echo $siswa['tlp']; ?></label>
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