<?php
	// Dane połączenia z bazą danych
	$config['db'] = array();
	$config['db']['host'] = 'localhost';
	$config['db']['user'] = 'minecraft';
	$config['db']['name'] = 'minecraft';
	$config['db']['pass'] = 'minecraft';

	$mysql = mysql_connect($config['db']['host'], $config['db']['user'], $config['db']['pass']) or die('Nie można uzyskać połączenia z bazą danych (<b>' . mysql_error() . '</b>)');
	$database = mysql_select_db($config['db']['name']) or die('Nie można wybrać bazy!');
	mysql_query("SET NAMES utf8");
	mysql_query("SET CHARACTER SET utf8");
	mysql_query("SET collation_connection = utf8_polish_ci");
?>
