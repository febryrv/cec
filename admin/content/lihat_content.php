  <?php
  include '../setting/koneksi.php';
  $data = mysql_query("select * from content where ID_CONTENT = '$_GET[id]';");
  $no = 1;
$tampil = mysql_fetch_array($data);
  ?>

<style>
img {
	border:#666 1px solid;}
</style>

  <table width="441" border="0" align="center">
    
    <tr>
      <td width="117">Nama</td>
      <td width="3">:</td>
      <td width="305"><?php echo $tampil['NAMA_CONTENT'];?></td>
    </tr>
    <?php if($tampil['GAMBAR']==""){ echo "";}else{
	?>
    <tr>
      <td>Gambar</td>
      <td>:</td>
      <td><img src="../images/content/<?php echo $tampil['GAMBAR'];?>" width="150" height="100"/></td>
    </tr>
    <?php } ?>
    <tr>
      <td>Isi</td>
      <td>:</td>
      <td><?php echo $tampil['ISI_CONTENT'];?></td>
    </tr>
    <tr>
      <td height="36">&nbsp;</td>
      <td>&nbsp;</td>
      <td><a href="?pg=content/data_content" class="klik">Kembali</a></td>
    </tr>
  
  </table>
