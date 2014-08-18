<form action="?pg=gallery/ubah_post_gallery&id=<?php echo $_GET['id'];?>" method="post" enctype="multipart/form-data" name="form1">
  <table width="441" border="1" align="center">
   <?php
  include '../setting/koneksi.php';
  $data = mysql_query("select * from gallery where ID_GALLERY = '$_GET[id]'");
  $tampil = mysql_fetch_array($data);
  ?>
    <tr>
      <td colspan="3">Ubah Kontak</td>
    </tr>
    <tr>
      <td width="314">Judul</td>
      <td width="8">:</td>
      <td width="97"><input type="text" name="judul" id="judul" value="<?php echo $tampil['JUDUL'];?>"></td>
    </tr>
    <tr>
      <td>Gambar</td>
      <td>:</td>
      <td>
      <img src="../images/gallery/<?php echo $tampil['GAMBAR'];?>" width="150" height="100" /><br />
      <input type="file" name="gambar" id="gambar" /></td>
    </tr>
    <tr>
      <td>Keterangan</td>
      <td>:</td>
      <td><input type="text" name="ket" id="ket" value="<?php echo $tampil['KETERANGAN'];?>"></td>
    </tr>
    <tr>
      <td height="41">&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="button" class="klik" value="Simpan"></td>
    </tr>
  </table>
</form>
