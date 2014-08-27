<?php
$do = isset($_GET['do']) ? $_GET['do'] : '';
switch ($do) :	
	case 'login' :
		include 'include/page.siswa.login.php';
		break;
	case 'edit' :
		include 'include/page.siswa.edit.php';
		break;
	case 'jadwal' :
		include 'include/page.siswa.jadwal.php';
		break;
	default :
		include 'include/page.siswa.profil.php';
		break;
endswitch;