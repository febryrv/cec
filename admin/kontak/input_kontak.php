<form action="?pg=kontak/input_post_kontak" method="post" enctype="multipart/form-data" name="form1">
  <table width="441" border="1" align="center">
    <tr>
      <td colspan="3" align="center" id="jtabel">Input Kontak</td>
    </tr>
    <tr>
      <td width="314">Nama</td>
      <td width="8">:</td>
      <td width="97"><input name="nama" type="text" id="nama" size="40" class="required"></td>
    </tr>
    <tr>
      <td>Email</td>
      <td>:</td>
      <td><input name="email" type="text" id="email" size="40" class="required email" /></td>
    </tr>
    <tr>
      <td>Tanggal</td>
      <td>:</td>
      <td><input name="tanggal" type="text" id="tanggal" size="20" class="required"></td>
    </tr>
    <tr>
      <td>No. Hp</td>
      <td>:</td>
      <td><input type="text" name="no_hp" id="no_hp" class="required number" /></td>
    </tr>
    <tr>
      <td>Pesan</td>
      <td>:</td>
      <td><textarea name="pesan" id="pesan" cols="45" rows="5" class="required"></textarea></td>
    </tr>
    <tr>
      <td height="35">&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="button" class="klik" value="Simpan">
      <a href="?pg=kontak/data_kontak" class="klik">Kembali</a></td>
    </tr>
  </table>
</form>
