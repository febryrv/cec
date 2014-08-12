<a href="?pg=gallery/input_gallery" class="klik">Tambah Gallery</a><br /><br />
<table width="650" border="1">
  <tr id="jtabel">
    <td width="40">No.</td>
    <td width="52">Judul</td>
    <td width="150">Gambar</td>
    <td width="180">Keterangan</td>
    <td width="206">Aksi</td>
  </tr>
  <?php
  include '../setting/koneksi.php';
  $data = mysql_query("select * from gallery");
  $no = 1;
  while($tampil = mysql_fetch_array($data)){
	  $view = substr($tampil['KETERANGAN'],0,100);
  ?>
  <tr>
    <td><?php echo $no++;?></td>
    <td><?php echo $tampil['JUDUL'];?></td>
    <td><img src="../images/gallery/<?php echo $tampil['GAMBAR'];?>" width="150" height="100" /></td>
    <td><?php echo $view;?></td>
    <td><a href="?pg=gallery/lihat_gallery&id=<?php echo $tampil['ID_GALLERY'];?>" class="klik">Lihat</a> <a href="?pg=gallery/ubah_gallery&id=<?php echo $tampil['ID_GALLERY'];?>" class="klik">Ubah</a> <a href="?pg=gallery/hapus_gallery&id=<?php echo $tampil['ID_GALLERY'];?>" class="klik" onclick="return confirm('Data Akan Dihapus?')">Hapus</a></td>
  </tr>
<?php } ?>
</table>
