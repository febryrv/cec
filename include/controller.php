<?php

$pg = isset($_GET['pg']) ? $_GET['pg'] : '';
switch($pg)
{
	case '' :
		include 'include/page.home.php';
		break;
	case 'tentang-kami' :
		include 'include/page.tentang-kami.php';
		break;
	case 'pendaftaran' :
		include 'include/page.pendaftaran.php';
		break;
	case 'buku-tamu' :
		include 'include/page.buku-tamu.php';
		break;
	case 'siswa' :
		include 'include/page.siswa.php';
		break;
	default :
		include 'include/404.php';
		break;
}