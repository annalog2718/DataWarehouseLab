<?php
	$dsn = 'mysql:host=localhost;dbname=runescapemarketdata';
	$username = 'loadData';
	$password = 'P@$$w0rd';

	try
	{
		$db = new PDO($dsn, $username, $password);
	}
	catch(PDOException $error)
	{
		
	}

?>