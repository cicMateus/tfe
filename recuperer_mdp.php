<?php

	
	$mail_fail = "Votre e-mail n'existe pas";
	$champ_vide = "Remplissez votre champ";
	$tout_ok = "Consultez votre boite e-mail";

	if(isset($_POST['recuperer'])){


		$mail_mdp = $_POST['mail_mdp'];


		if(!isset($mail_mdp)){

			$vide = true;
		}

		else{

			$vide = false;
		}




		$pdo = $bdd->prepare('SELECT * FROM user');

			
		$pdo->execute();
		$result_mdp = $pdo->fetchAll();
		$user_mail = array();



		foreach($result_mdp as $row_mdp){

			$user_mail[] = $row_mdp['email'];

	
		}


		if(in_array($mail_mdp, $user_mail)){

			$user_exist = true;

			$pdo = $bdd->prepare('SELECT * FROM user WHERE email = :mail_mdp');

			$pdo->bindParam(':mail_mdp', $mail_mdp);

			foreach($result_user as $row_user){

				$nom_user = $row_user['prenom'];
			}

		}

		else{
			$user_exist = false;
		}

			



		



		


		







		if($vide == true || $user_exist == false){

			$fail = true;
			

		}

		else{

			$fail = false;



			$to = $mail_mdp;
			$subject = "Récupération de votre mot de passe Solidaction";
			$mail_message = 'Bonjour $nom_user. </br>
			Vous avez demandé la récupération du mot de passe liée à: $mail_mdp.</br>
			Pour changer votre mot de passe, cliquez <a href="index.php?rub=recuperation">sur ce lien</a>';

			$headers = "From: Solidaction\n";
			$headers = "MIME-version: 1.0\n";
			$headers = "Content-type: text/html; charset=utf-8\n";

			mail($to ,$subject, $mail_message, $headers);
			
			

		}



	}




?>