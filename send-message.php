<?php
	require_once('config2.php');  
	session_start(); 
	
	if($_POST)
	{
		$type = htmlspecialchars(strip_tags(trim($_POST['type'])));
		
		if($type == 'public')
		{
			$id_user_from = $_SESSION['id'];
			$message = htmlspecialchars(strip_tags(trim($_POST['message'])));
			$nom = $_SESSION['prenom'].' '.$_SESSION['nom'];
			$jour = date('d m Y');
			$heure = date('H:i', time());
			$public = 'oui';
			$prive = 'non';
			$id_user_to = 0;
			
			$sql = "INSERT INTO messages(id_user_from, message, nom, jour, heure, public, prive, id_user_to) VALUES(:id_user_from, :message, :nom, :jour, :heure, :public, :prive, :id_user_to)";
			$statement = $bdd->prepare($sql);
			$statement->bindParam('id_user_from', $id_user_from);
			$statement->bindParam('message', $message);
			$statement->bindParam('nom', $nom);
			$statement->bindParam('jour', $jour);
			$statement->bindParam('heure', $heure);
			$statement->bindParam('public', $public);
			$statement->bindParam('prive', $prive);
			$statement->bindParam('id_user_to', $id_user_to);
			$statement->execute();
			
			header('Location:index.php?rub=chat');
		}
		
		if($type == 'prive')
		{
			$id_user_from = $_SESSION['id'];
			$message = htmlspecialchars(strip_tags(trim($_POST['message'])));
			$nom = $_SESSION['prenom'].' '.$_SESSION['nom'];
			$jour = date('d m Y');
			$heure = date('H:i', time());
			$public = 'non';
			$prive = 'oui';
			$id_user_to = htmlspecialchars(strip_tags(trim($_POST['to'])));
			
			$sql = "INSERT INTO messages(id_user_from, message, nom, jour, heure, public, prive, id_user_to) VALUES(:id_user_from, :message, :nom, :jour, :heure, :public, :prive, :id_user_to)";
			$statement = $bdd->prepare($sql);
			$statement->bindParam('id_user_from', $id_user_from);
			$statement->bindParam('message', $message);
			$statement->bindParam('nom', $nom);
			$statement->bindParam('jour', $jour);
			$statement->bindParam('heure', $heure);
			$statement->bindParam('public', $public);
			$statement->bindParam('prive', $prive);
			$statement->bindParam('id_user_to', $id_user_to);
			$statement->execute();
			
			header('Location:index.php?rub=chat&user='.$id_user_to);
		}
	}
?>