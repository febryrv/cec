<?php
if ($_POST)
{
	$error = false;
	if ($_POST['pesan'] == '')
	{
		$error = true;
		$e_pesan = 'Pesan harus diisi';
	}
	if (!$error)
	{
		$body_mail = '<html><head><meta http-equiv="content-type" content="text/html; charset=utf-8" /></head><body>
		'.$_POST['pesan'].'
		<br>
		</body></html>';
				$headers = "From: admin@bimbelcec.com\r\n";
				$headers .= "Reply-to: admin@bimbelcec.com\r\n";
				$headers .= "Content-type: text/html";
				if ((isset($_SERVER['HTTP_HOST']) && ($_SERVER['HTTP_HOST'] == 'www.bimbelcec.com' || $_SERVER['HTTP_HOST'] == 'bimbelcec.com')) || $_SERVER['SERVER_NAME'] == 'www.bimbelcec.com' || $_SERVER['SERVER_NAME'] == 'bimbelcec.com')
				{
					$mail_sent = mail($_POST['email'], "Reply: ".$_POST['email']." - Bimbel CEC", $body_mail, $headers);
					echo '<script>alert("Email terkirim.");location="index.php?pg=kontak/data_kontak";</script>';
				}
				else
				{
					echo '<script>alert("Maaf, saat ini sistem sedang offline..");location="index.php?pg=kontak/data_kontak";</script>';
				}
	
	}
}
?>
<h1>Lihat Buku Tamu</h1>
<?php
$data = mysql_query("select * from buku_tamu where id = '$_GET[id]';");
$no = 1;
while($tampil = mysql_fetch_array($data))
{
?>	  
	<style>
	table {
		border:#666 1px solid;}
	</style>
	<form action="" method="post">
	  <table width="441" border="1" align="center">
		<tr>
		  <td width="111">Nama</td>
		  <td width="3">:</td>
		  <td width="305"><?php echo $tampil['nama'];?><input type="hidden" name="nama" value="<?php echo $tampil['nama'];?>" /></td>
		</tr>
		<tr>
		  <td>Email</td>
		  <td>:</td>
		  <td><?php echo $tampil['email'];?><input type="hidden" name="email" value="<?php echo $tampil['email'];?>" /></td>
		</tr>
		<tr>
		  <td>Tanggal</td>
		  <td>:</td>
		  <td><?php echo $tampil['tanggal'];?></td>
		</tr>
		<tr>
		  <td>No. Hp</td>
		  <td>:</td>
		  <td><?php echo $tampil['telepon'];?> </td>
		</tr>
		<tr>
		  <td valign="top">Pesan</td>
		  <td valign="top">:</td>
		  <td><?php echo $tampil['pesan'];?></td>
		</tr>
		<tr>
		  <td valign="top">Balas</td>
		  <td valign="top">:</td>
		  <td><textarea name="pesan" id="pesan" cols="45" rows="5"><br><br><br><br>
		  -----------------------------------------------------------------------------------------<br><?php echo $tampil['pesan'];?></textarea>
				<?php echo isset($e_pesan) ? '<p class="error-message">'.$e_pesan.'</p>' : ''; ?></td>
		</tr>
		<tr>
		  <td height="32">&nbsp;</td>
		  <td>&nbsp;</td>
		  <td><input type="submit" value="Balas"class="klik">&nbsp;<a href="?pg=kontak/data_kontak" class="klik">Kembali</a></td>
		</tr>
	  </table>
	</form>
<?php } ?>