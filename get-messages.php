<?php
	require_once("config.php");	/*include ta db*/
	session_start();
	
	if($_POST)
	{
		$request = htmlspecialchars(strip_tags(trim($_POST['request'])));
		
		if($request == 'check message')
		{
			$sql = 'SELECT id FROM messages ORDER BY id DESC LIMIT 1';
			$statement = $bdd->prepare($sql);
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			$message= $result[0]['id'];
			echo json_encode($message);
		}
		
		if($request == 'check users')
		{
			$sql = 'SELECT COUNT(id) FROM user WHERE connected = "true"';
			$statement = $bdd->prepare($sql);
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			$users= $result[0]['COUNT(id)'];
			echo json_encode($users);
		}
		
	}
	else
	{
		die("403 : Forbidden");
	}
?>