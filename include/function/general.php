<?php

function tanggal_indonesia($mysql_date)
{
	$bulan_string = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
	list($tahun, $bulan, $tanggal) = explode('-',$mysql_date);
	$index = intval($bulan)-1;;
	return $tanggal.' '.$bulan_string[$index].' '.$tahun;
}