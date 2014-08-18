<!--<a href="?pg=slide/input_slide" class="klik">Tambah Slide</a><br />--><br />
<table width="650" border="1">
  <tr id="jtabel">
    <td width="45">No.</td>
    <td width="90">Nama</td>
    <td width="150">Gambar</td>
    <td width="145">Isi</td>
    <td width="198">Aksi</td>
  </tr>
  <?php
  $data = mysql_query("select * from slider");
  $no = 1;
  while($tampil = mysql_fetch_array($data)){
	  
  ?>
  <tr>
    <td valign="top"><?php echo $no++;?></td>
    <td valign="top"><?php echo $tampil['judul'];?></td>
    <td valign="top"><img src="../uploads/gambar/home/<?php echo $tampil['gambar'];?>" width="150" height="100" /></td>
    <td valign="top"><?php echo $tampil['isi'];?></td>
    <td valign="top"><a href="?pg=slide/ubah_slide&id=<?php echo $tampil['id'];?>" class="klik">Ubah</a></td>
  </tr>
<?php } ?>
</table>
