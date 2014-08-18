  <?php
  include '../setting/koneksi.php';
  $data = mysql_query("select * from gallery where ID_GALLERY = '$_GET[id]';");
  $no = 1;
  while($tampil = mysql_fetch_array($data)){
  ?>
  
<style>
table {
	border:#666 1px solid;}
</style>
  <table width="441" border="1" align="center">
    <tr>
      <td width="89">Judul</td>
      <td width="3">:</td>
      <td width="333"><?php echo $tampil['JUDUL'];?></td>
    </tr>
    <tr>
      <td>Gambar</td>
      <td>:</td>
      <td><img src="../images/gallery/<?php echo $tampil['GAMBAR'];?>" width="200" height="150"/></td>
    </tr>
    <tr>
      <td>Keterangan</td>
      <td>:</td>
      <td><?php echo $tampil['KETERANGAN'];?></td>
    </tr>
    <tr>
      <td height="31">&nbsp;</td>
      <td>&nbsp;</td>
      <td><a href="?pg=gallery/data_gallery" class="klik">Kembali</a></td>
    </tr>
    <? } ?>
  </table>
