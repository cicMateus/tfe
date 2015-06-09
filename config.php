<?php

/******************************************************
----------------Configuration Obligatoire--------------
Veuillez modifier les variables ci-dessous pour que l'
espace membre puisse fonctionner correctement.
******************************************************/

$host = "localhost";
$dbname = "tfe";
$user = "root";
$password = "root";
try
{
	$bdd = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=UTF8', $user, $password);
}catch (PDOException $e)
{
	die('Error : '.$e->getMessage());
}




?>