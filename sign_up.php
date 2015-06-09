<?php
require_once('config2.php');
include ('function.php');

$ok = "Merci pour votre inscription.</br>Un e-mail de confirmation vous sera envoyé.";
$mail_exist = "l'e-mail indiqué est déjà existant. Veuillez introduire une autre adresse e-mail.";




if(isset($_POST['valider_bene'])){

	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$email = $_POST['email'];
	$pass = md5($_POST['pass']);
	$profil = "benevole";



	$pdo = $bdd->prepare('SELECT email FROM user');

		$pdo->execute();
		$data_email = $pdo->fetchAll();
		$verifEmail = array();

		foreach($data_email as $row_mail) {
			$verifEmail[] = $row_mail['email'];

		}
		
		



	if(in_array($email, $verifEmail)){

	
		$dupli = true;

	}

	else{
		$dupli = false;
	}


	if( isset($_POST['nom'])  && isset($_POST['prenom']) && isset($_POST['email'])  && isset($_POST['pass'])){
			$fill = true;

	}

	else{

		$fill = false;
		
	}


	$VerifierAdresseMail = VerifierAdresseMail($email);

	if($fill == true && $VerifierAdresseMail == true && $dupli == false){



		$pdo = $bdd->prepare('INSERT INTO user (nom, prenom, email, password, profil) VALUES(:nom, :prenom, :email, :pass, :profil)');



			$pdo->bindParam(':nom', $nom);
			$pdo->bindParam(':prenom', $prenom);
			$pdo->bindParam(':email', $email);
			$pdo->bindParam(':pass', $pass);
			$pdo->bindParam(':profil', $profil);
			$pdo->execute();

			$confirm = true;

			
				
	}

	elseif($dupli == true){



			$confirm = false;
		

	}

	else{
			$confirm = false;
	}

		

}

if(isset($_POST['valider_assoc'])){

	$nom = $_POST['nom'];
	$numBC = $_POST['numBC'];
	$email = $_POST['email'];
	$pass = md5($_POST['pass']);
	$profil = "association";



	if( isset($_POST['nom'])  && isset($_POST['numBC']) && isset($_POST['email'])  && isset($_POST['pass'])){
			$fill = true;

	}

	else{

		$fill = false;
		
	}


	$VerifierAdresseMail = VerifierAdresseMail($email);

	if($fill == true && $VerifierAdresseMail == true){



		$pdo = $bdd->prepare('INSERT INTO user (nom, banque_carrefour, email, password, profil) VALUES(:nom, :numBC, :email, :pass, :profil)');



			$pdo->bindParam(':nom', $nom);
			$pdo->bindParam(':numBC', $prenom);
			$pdo->bindParam(':email', $email);
			$pdo->bindParam(':pass', $pass);
			$pdo->bindParam(':profil', $profil);
			$pdo->execute();

			$confirm = true;


	}

	else{
		$confirm = false;
	}

		

}



?>