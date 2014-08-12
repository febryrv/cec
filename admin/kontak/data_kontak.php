<a href="?pg=kontak/input_kontak" class="klik">Tambah Contact</a><br /><br />
<table width="650" border="1">
	<tr id="jtabel">
		<td>No.</td>
		<td>Nama</td>
		<td>Email</td>
		<td>No. Hp</td>
		<td>Pesan</td>
		<td>Tanggal</td>
		<td>Aksi</td>
	</tr>
  <?php
  $data = mysql_query("select * from buku_tamu");
  $no = 1;
  while($tampil = mysql_fetch_array($data)){
	  $view = substr($tampil['pesan'],0,50);
  ?>
	<tr>
		<td height="40"><?php echo $no++;?></td>
		<td><?php echo $tampil['nama'];?></td>
		<td><?php echo $tampil['email'];?></td>
		<td><?php echo $tampil['telepon'];?></td>
		<td><?php echo $view;?></td>
		<td><?php echo $tampil['tanggal'];?></td>
		<td><a href="?pg=kontak/lihat_kontak&id=<?php echo $tampil['id'];?>" class="klik">Lihat</a> <a href="?pg=kontak/ubah_kontak&id=<?php echo $tampil['id'];?>" class="klik">Ubah</a> <a href="?pg=kontak/hapus_kontak&id=<?php echo $tampil['id'];?>" class="klik" onclick="return confirm('Data Akan Dihapus?')">Hapus</a></td>
	</tr>
<?php } ?>
</table>
