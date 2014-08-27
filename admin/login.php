<?php
session_start();
if (isset($_SESSION['my_user']))
	header('Location:index.php');

include 'ver.php';
?>
<!doctype html>
<html>
	<head>
	<title>Login Admin</title>
	<style type="text/css">
	form{margin:100px 0 0 0;}
	table{text-align:center; border-collapse:collapse; border:#09F 1px solid; font-family:calibri;}
	#judul{background-color:#09F; color:#FFF;font-size:18px;}
	input[name]{height:30px; padding:0;}
	#button{background-color:#09F; border:#F90 1px solid; color:#FFF; height:30px; width:100px; margin:5px;}
	#button:hover{background-color:#0CF;}
	.error {background: red;}
	body {
		background-image: url(images/c1.png);
	}
	</style>
	</head>
	<body>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<form id="form1" name="form1" method="post" action="">
		<p>&nbsp;</p>
		<table width="244" border="0" align="center">
			  <tr>
					<td width="236" align="center" id="judul">Login Administrator
					<?php echo isset($err_login) ? '<p class="error">'.$err_login.'</p>' : ''; ?>
					</td>
				</tr>
				<tr>
					<td><h2><strong>Username</strong></h2></td>
				</tr>
				<tr>
					<td>
						<input name="username" type="text" id="username" size="35" />
						<?php echo isset($err_uname) ? '<p class="error">'.$err_uname.'</p>' : ''; ?>
					</td>
				</tr>
				<tr>
					<td><h3><strong>Password</strong></h3></td>
				</tr>
				<tr>
					<td>
						<input name="password" type="password" id="password" size="35" />				
						<?php echo isset($err_pass) ? '<p class="error">'.$err_pass.'</p>' : ''; ?>
					</td>
				</tr>
				<tr>
					<td><input type="submit" name="button" id="button" value="Masuk" /></td>
				</tr>
			</table>
		</form>
	</body>
</html>