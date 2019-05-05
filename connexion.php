<?php

function connect()
{
	$HOST="localhost";
	$DBNAME="ziqmu_hugod";
	$USER="root";
	$PW="";
	try 
	{
		$connect = new PDO('mysql:host='.$HOST.';dbname='.$DBNAME, $USER,$PW, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		return $connect;
	}
	catch(PDOexecption $e)
	{
		echo "Probleme de connexion".$e->getMessage();
		return false;
	}
}

?>
