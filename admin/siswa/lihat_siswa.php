<?php
//var_dump($_SESSION);
function get_detail_siswa($nis)
{
	$sql = "SELECT s.*, k.nama AS kursus
		FROM siswa AS s 
			INNER JOIN kursus AS k ON s.kode_program = k.kode_program
		WHERE nis = '$nis'";
	$Q	= mysql_query($sql);
	return mysql_fetch_assoc($Q);
}

$siswa = get_detail_siswa($_GET['id']);
?>
<style>
.templatemo_fullgraybox {
    border: 1px solid #cccccc;
    clear: both;
    float: left;
    margin: 0px 0px 25px;
    padding: 25px;
    width: 790px;
}
img.profil {
	display: block;
}
table.detal {
	display: inline;
	float: left;
}
</style>
<h1>Profil Mahasiswa</h1>
	<table width="100%" border="0" cellspacing="5" cellpadding="5" class="detail">
		<tr>
			<td width="20%" rowspan="20" valign="top"><img src="../<?php echo $siswa['foto']; ?>" alt="Foto profil" class="profil"/></td>
			<td width="20%" valign="top">Nama Lengkap</td>
			<td width="2%" align="center" valign="top">:</td>
			<td width="66%"><?php echo $siswa['nama']; ?></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td align="center">:</td>
			<td align="left"><?php echo $siswa['jenis_kelamin']; ?></td>
		</tr>
		<tr>
			<td valign="top">Kota kelahiran</td>
			<td align="center" valign="top">:</td>
			<td><?php echo $siswa['kota_lahir']; ?></td>
		</tr>
		<tr>
			<td valign="top">Tanggal lahir</td>
			<td align="center" valign="top">:</td>
			<td><?php echo $siswa['tanggal_lahir']; ?></td>
		</tr>
		<tr>
			<td valign="top">Agama</td>
			<td align="center" valign="top">:</td>
			<td><?php echo $siswa['agama']; ?></td>
		</tr>
		<tr>
						<td valign="top">Alamat</td>
						<td align="center" valign="top">:</td>
						<td><?php echo $siswa['alamat']; ?></td>
		</tr>
		<tr>
						<td valign="top">No telp / Hp</td>
						<td align="center" valign="top">:</td>
						<td><?php echo $siswa['tlp']; ?></td>
		</tr>
		<tr>
						<td valign="top">Asal Sekolah</td>
						<td align="center" valign="top">:</td>
						<td><?php echo $siswa['sekolah']; ?></td>
		</tr>
		<tr>
						<td valign="top">Hobi</td>
						<td align="center" valign="top">:</td>
						<td><?php echo $siswa['hobi']; ?></td>
		</tr>
		<tr>
						<td valign="top">Cita - cita</td>
						<td align="center" valign="top">:</td>
						<td><?php echo $siswa['cita']; ?>
						</td>
		</tr>
		<tr>
						<td>Nama Orang Tua</td>
						<td align="center">&nbsp;</td>
						<td>&nbsp;</td>
		</tr>
		<tr>
						<td valign="top">a. Ayah</td>
						<td align="center" valign="top">:</td>
						<td><?php echo $siswa['ayah']; ?></td>
		</tr>
		<tr>
			<td valign="top">b. Ibu</td>
			<td align="center" valign="top">:</td>
			<td><?php echo $siswa['ibu']; ?></td>
		</tr>
		<tr>
			<td>Pekerjaan Orang Tua</td>
			<td align="center">&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td valign="top">a. Ayah</td>
			<td align="center" valign="top">:</td>
			<td><?php echo $siswa['pekerjaanayah']; ?></td>
		</tr>
		<tr>
			<td valign="top">b. Ibu</td>
			<td align="center" valign="top">:</td>
			<td><?php echo $siswa['pekerjaanibu']; ?></td>
		</tr>
		<tr>
			<td valign="top"><p>*Email </p></td>
			<td align="center" valign="top">:</td>
			<td><?php echo $siswa['email']; ?></td>
		</tr>
		<tr>
			<td valign="top">Kode Program</td>
			<td align="center" valign="top">:</td>
			<td><?php echo $siswa['kode_program']; ?></td>
		</tr>
		<tr>
			<td valign="top">Kursus</td>
			<td align="center" valign="top">:</td>
			<td><?php echo $siswa['kursus']; ?></td>
		</tr>
	</table>
	<a href="?pg=mahasiswa/data_mahasiswa" class="klik" >Kembali</a>