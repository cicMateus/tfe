
<main class="main" id="chat">

<sidebar id="statut_bar" class="statut">
	<h1>Chat Solidaction</h1>
	<p><a href="index.php?rub=chat">La communauté</a></p>
	<p>Membres connectés</p>

	<?php 
		$connected = 'true';
		$sql = 'SELECT * FROM user WHERE connected = :connected';
		$pdo = $bdd->prepare($sql);
	    $pdo->bindParam(':connected', $connected);
	    $pdo->execute();
	    $result2 = $pdo->fetchAll();


		foreach($result2 as $row2) {

			echo '<ul id="membres_connectes">';
			echo '<li><a href="index.php?rub=chat&user='.$row2['id'].'">'.$row2['prenom'].' '.$row2['nom'].'</a></li>';
			echo '</ul>';
		}




	?>


</sidebar>
<div id="chat_ico">chat icon</div>

<section id="fenetre_message" class="fenetre_message">


	
	<?php 


		if(!isset($_GET['user'])){

			echo '<div id="messages">';

			$pdo = $bdd->prepare('SELECT * FROM messages WHERE public = :public ORDER BY jour DESC LIMIT 20'); /*J'ai modifié ici en ajoutant le tri du plus récent au plus ancien et une limite à 20 messages max, si tu en veux plus, faut refaire de l'ajax ;-)*/
			/*Pour ça tu dois légèrement transformer le fichier get-messages.php et faire en sorte de récupérer l'id du message le plus ancien affiché (le dernier de la div messages) et d'aller faire une requête en demandant les 20 messages suivant en utilisant le OFFSET en SQL je pourrai encore t'aider à ce moment là si besoin mais ça prendra plus de temps et je n'en ai pas à l'infini ^^*/
			
			$public = "oui";
			$pdo->bindParam(':public', $public);
			$pdo->execute();
			$data = $pdo->fetchAll();

			foreach($data as $row) {

				echo '<div>';
				echo '<span>'.$row['jour'].','.$row['heure'].'</span>';
				echo '<p>'.$row['nom'].' a écrit</p>';
				echo '<p>'.$row['message'].'</p>';
				echo '</div>';

			}

			echo '</div>';
			echo '<form action="send-message.php" method="post">
					<textarea name="message"></textarea>
					<input type="hidden" name="type" value="public" />
					<input type="submit" value="Envoyer">
					</form>';

		}
		else if(isset($_GET['user'])){

			echo '<div id="messages_prive">';

			$pdo = $bdd->prepare('SELECT * FROM messages WHERE prive = :prive AND (id_user_from = :get_user AND id_user_to = :user_session) OR (id_user_from = :user_session AND id_user_to = :get_user) ORDER BY jour DESC LIMIT 20'); /*J'ai modifié ici en ajoutant le tri du plus récent au plus ancien et une limite à 20 messages max, si tu en veux plus, faut refaire de l'ajax ;-)*/
			/*Pour ça tu dois légèrement transformer le fichier get-messages.php et faire en sorte de récupérer l'id du message le plus ancien affiché (le dernier de la div messages) et d'aller faire une requête en demandant les 20 messages suivant en utilisant le OFFSET en SQL je pourrai encore t'aider à ce moment là si besoin mais ça prendra plus de temps et je n'en ai pas à l'infini ^^*/
			

			$prive = "oui";
			$get_user = $_GET['user'];
			$user_session = $_SESSION['id'];
			$pdo->bindParam(':prive', $prive);
	    	$pdo->bindParam(':get_user', $get_user);
	    	$pdo->bindParam(':user_session', $user_session);



			$pdo->execute();
			$data = $pdo->fetchAll();

			foreach($data as $row) {

				echo '<div>';
				echo '<span>'.$row['jour'].','.$row['heure'].'</span>';
				echo '<p>'.$row['nom'].' a écrit</p>';
				echo '<p>'.$row['message'].'</p>';
				echo '</div>';


			}

			echo '</div>';
			?>
			<form action="send-message.php" method="post">
				<textarea name="message"></textarea>
				<input type="hidden" name="type" value="prive" />
				<input type="hidden" name="to" value="<?php echo $get_user; ?>" />
				<input type="submit" value="Envoyer">
			</form>
			<?php

		}


	?>

	

	<?php


	
		$sql = $bdd ->prepare('SELECT nom FROM user WHERE id = :id');

	    $id = $_SESSION['id'];
	    $sql->bindParam(':id', $id);
	  	
	    $sql->execute();
	    $result = $sql->fetchAll();
	


	

	if(isset($_POST['send_public'])){



		$message = $_POST['message'];
		$id_user = $id;
		$jour = date('j-m-Y');
		$heure = date('G:i');
		$nom = $result[0]['nom'];
		$public = "oui";
		$prive = "non";

		$req = $bdd->prepare('INSERT INTO messages (id_user, message, nom, jour, heure, public, prive) VALUES(:id_user, :message, :nom, :jour, :heure, :public, :prive)');



		$req->bindParam(':id_user', $id_user);
		$req->bindParam(':message', $message);
		$req->bindParam(':nom', $nom);
		$req->bindParam(':jour', $jour);
		$req->bindParam(':heure', $heure);
		$req->bindParam(':public', $public);
		$req->bindParam(':prive', $prive);
		$req->execute();

		
		

	}

	if(isset($_POST['send_prive'])){



		$message = $_POST['message'];
		$id_user = $id;
		$jour = date('j-m-Y');
		$heure = date('G:i');
		$nom = $result[0]['nom'];
		$public = "non";
		$prive = "oui";

		$req = $bdd->prepare('INSERT INTO messages (id_user, message, nom, jour, heure, public, prive) VALUES(:id_user, :message, :nom, :jour, :heure, :public, :prive)');



		$req->bindParam(':id_user', $id_user);
		$req->bindParam(':message', $message);
		$req->bindParam(':nom', $nom);
		$req->bindParam(':jour', $jour);
		$req->bindParam(':heure', $heure);
		$req->bindParam(':public', $public);
		$req->bindParam(':prive', $prive);
		$req->execute();

		
		

	}

?>

</section>




</main>