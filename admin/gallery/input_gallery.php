<form action="?pg=gallery/input_post_gallery" method="post" enctype="multipart/form-data" name="form1">
  <table width="441" border="1" align="center">
    <tr>
      <td colspan="3" align="center">Input Gallery</td>
    </tr>
    <tr>
      <td width="314">Judul</td>
      <td width="8">:</td>
      <td width="97"><input name="judul" type="text" class="required" id="judul" size="40"></td>
    </tr>
    <tr>
      <td>Gambar</td>
      <td>:</td>
      <td><input type="file" name="gambar" id="gambar" class="required" /></td>
    </tr>
    <tr>
      <td>Keterangan</td>
      <td>:</td>
      <td><textarea name="ket" id="ket" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td height="39">&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="button" class="klik" value="Simpan">
      <a href="?pg=slide/data_slide" class="klik">Kembali</a></td>
    </tr>
  </table>
</form>
