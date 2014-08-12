<?php

function check_username($username)
{
	$sql = "SELECT username 
		FROM admin
		WHERE username = '$username'
			AND username != '$_SESSION[my_user]'";
	$Q = mysql_query($sql);
	if (mysql_num_rows($Q) > 0)
		return true;
	return false;
}
function check_email($email)
{
	$sql = "SELECT email 
		FROM admin
		WHERE email = '$email'
			AND email != '$_SESSION[my_email]'";
	$Q = mysql_query($sql);
	if (mysql_num_rows($Q) > 0)
		return true;
	return false;
}