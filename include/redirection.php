<?php
//var_dump($_SESSION);
$pg = isset($_GET['pg']) ? $_GET['pg'] : '';
$do	= isset($_GET['do']) ? $_GET['do'] : '';
if ($pg == 'siswa' && ($do == 'login' || $do == 'logout')  && isset($_SESSION['nis']))
{
	header('Location: ?pg=siswa');
}
if ($pg == 'siswa' && $do == '' && !isset($_SESSION['nis']) )
{
	header('Location: ?pg=siswa&do=login');
}
if ($pg == 'siswa' && $do == 'logout' && isset($_SESSION['nis']) )
{
	//echo 'tes';
	include 'include/page.siswa.logout.php';
}