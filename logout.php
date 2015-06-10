<?php
require_once('config.php');
session_start();

$connected = 'false';
$pdo = $bdd->prepare('UPDATE user SET connected = :connected WHERE id = :id_user');

		$id_user = $_SESSION['id'];

	    $pdo->bindParam(':connected', $connected);
	    $pdo->bindParam(':id_user', $id_user);
	  	
	    $pdo->execute();
	    $result2 = $pdo->fetchAll();





session_destroy();




 echo'<meta http-equiv="refresh" content="0; url=index.php"/>';
?>