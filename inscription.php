<?php 
require_once('config.php'); 
?>


<main class="main" id="inscription_action">


	

	<?php

		$pdo = $bdd->prepare('SELECT * FROM actions WHERE rub = :rub_action');

		$rub_action = $_GET['evenement'];  
		$pdo->bindParam(':rub_action', $rub_action);
		$pdo->execute();
		$retour = $pdo->fetchAll();

		foreach($retour as $row_data) {


			$province = $row_data['province'];
			$cause = $row_data['cause'];
		

		}


		if(isset($_SESSION['id'])){

			$prenom_session = $_SESSION['prenom']; 
			$nom_session = $_SESSION['nom']; 
			$email_session = $_SESSION['email']; 
		}
		else{
			$prenom_session = ""; 
			$nom_session = ""; 
			$email_session = ""; 
		}

		$pdo = $bdd->prepare('SELECT * FROM informations WHERE rub = :rub');

		$rub = $_GET['evenement'];  
		$pdo->bindParam(':rub', $rub);
		$pdo->execute();
		$data = $pdo->fetchAll();


		foreach($data as $row) {

				echo '<div class="inscription">';

					echo '<a href="index.php?rub=actions&province='.$province.'&cause='.$cause.'"><div id="retour">Retour <p>aux autres actions</p></div></a>';

					echo '<h2>'.$row['titre'].'</h2>';
					echo '<img src="'.$row['photo'].'">';

					echo '<div class="f_left">';
						echo '<section id="quoi"><h3>A propos</h3>'.$row['quoi'].'</section>';
						echo '<section id="quand"><h3>Quand?</h3>'.$row['quand'].'</section>';
					echo '</div>';
					echo '<div class="f_right">';
						echo '<section id="ou"><h3>Le lieu</h3>'.$row['ou'].'</section>';
						echo '<section id="prix"><h3>Combiens ça coûte?</h3>'.$row['prix'].'</section>';
					echo '</div>';

				echo '</div>';


				echo '<div class="demarche">';

					echo '<section id="avantages_insciption"><h3>Aider a des avantages</h3>'.$row['avantages'].'</section>';

					echo '<section id="comment">

					<h3>Je m\'inscris</h3>'.$row['comment'].'



					<form action="" method="post">

					<div class="form_div border_top">
						<label for="prenom">Ton prénom</label>
						<input type="text" name="prenom" placeholder="Marie" value="'.$prenom_session.'">
					</div>

					<div class="form_div">
						<label for="nom">Ton nom</label>
						<input type="text" name="nom" placeholder="Wilson" value="'.$nom_session.'">
					</div>

					<div class="form_div">
						<label for="email">Ton email</label>
						<input type="email" name="email" placeholder="marie.wilson@mail.com" value="'.$email_session.'">
					</div>

					<div class="form_div border_bottom">
						<label class="message" for="message">Message</label>
						<textarea name="message" placeholder="ce champ est facultatif, utilise-le pour des éventuelles questions..."></textarea>
					</div>

					<input type="submit" name="submit" value="Envoyer">


					</form>

					</section>';

				echo '<div id=decor_mains></div>';

				echo '</div>';


				

		}



	?>
	

</main>
