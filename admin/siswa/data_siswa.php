<h1>Data Siswa</h1>
<table width="650" border="1">
	<tr id="jtabel">
		<td width="40">No.</td>
		<td width="52">No. Formulir</td>
		<td width="150">Nama</td>
		<td width="180">Kode Program</td>
		<td width="180">Jurusan</td>
		<td width="206">Aksi</td>
	</tr>
	<?php
	$data = mysql_query("SELECT s.*, k.nama AS kursus
		FROM siswa AS s 
			INNER JOIN kursus AS k ON s.kode_program = k.kode_program") or die(mysql_error());
	$no = 1;
	while($tampil = mysql_fetch_array($data))
	{
	?>
	<tr>
		<td><?php echo $no++;?></td>
		<td><?php echo $tampil['nis'];?></td>
		<td><?php echo $tampil['nama']; ?></td>
		<td><?php echo $tampil['kode_program'];?></td>
		<td><?php echo $tampil['kursus'];?></td>
		<td>
			<a href="?pg=siswa/lihat_siswa&id=<?php echo $tampil['nis'];?>" class="klik" >Lihat</a>
		</td>
	</tr>
<?php 
	} 
?>
</table>