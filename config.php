<?php



$host = "localhost";
$dbname = "cindymateus_design_tfe";
$user = "cindymateus-desi";
$password = "SncAKtiSijocybxG";
try
{
	$bdd = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=UTF8', $user, $password);
}catch (PDOException $e)
{
	die('Error : '.$e->getMessage());
}


?>