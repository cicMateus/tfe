<main id="compte">

<h2>Mon compte</h2>

<?php
	$pdo = $bdd->prepare('SELECT * FROM user WHERE id = :id_session');

	$id_session = $_SESSION['id'];  
	$pdo->bindParam(':id_session', $id_session);

	$pdo->execute();
	$data = $pdo->fetchAll();




	foreach($data as $row) {

		$id_prenom = $row['prenom'];
		$id_nom = $row['nom'];
		$id_mail = $row['email'];


	}




?>

<section id="personnel">


	<h3>Informations personnelles</h3>

	<form action="" method="post">

			<div>
			<label for="prenom">Prénom</label>
			<input type="text" name="prenom" value="<?php if(!isset($_POST['update'])){echo $id_prenom;}else{ echo '';}?>">
			</div>
			<div>
			<label for="nom">Nom</label>
			<input type="text" name="nom" value="<?php if(!isset($_POST['update'])){echo $id_nom;}else{echo ''; }?>">
			</div>
			<div>
			<label for="email">Adresse e-email</label>
			<input type="email" name="email" value="<?php if(!isset($_POST['update'])){echo $id_mail;}else{echo '';} ?>">
			</div>
			<input type="submit" name="update" value="Modifier">


	</form>

	<?php



if(isset($_POST['update'])){

	$id_session = $_SESSION['id'];
	$prenom = $_POST['prenom'];  
	$nom = $_POST['nom'];  
	$email = $_POST['email'];  



	$sql = $bdd->prepare('UPDATE user SET nom = :nom, prenom = :prenom, email = :email WHERE id = :id_session');

	

	$sql->bindParam(':id_session', $id_session);
	$sql->bindParam(':prenom', $prenom);
	$sql->bindParam(':nom', $nom);
	$sql->bindParam(':email', $email);

	
	$sql->execute();

	echo'<meta http-equiv="refresh" content="0; url=index.php?rub=compte"/>';
                            
                            

}



?>

</section>

<section id="cofidentiel">

	<h3>Confidentialité</h3>

	<form action="" method="post">

	<div>
		<label for="pass">Mot de passe</label>
		<input type="password" name="pass" value="">
	</div>
	<input type="submit" name="changer" value="Changer mot de passe">

	</form>

	<?php



if(isset($_POST['changer'])){

	$id_session = $_SESSION['id'];
	$pass = md5($_POST['pass']);  




	$sql = $bdd->prepare('UPDATE user SET password = :pass WHERE id = :id_session');

	

	$sql->bindParam(':id_session', $id_session);
	$sql->bindParam(':pass', $pass);


	
	$sql->execute();

	echo'<meta http-equiv="refresh" content="0; url=index.php?rub=compte"/>';
                            
                            

}



?>

	<p><a href="index.php?rub=compte&action=sup">Supprimer mon compte</a></p>



	<?php



if(isset($_GET['action'])){

	$id_session = $_SESSION['id'];

	$sql = $bdd->prepare('DELETE FROM user WHERE id = :id_session');

	

	$sql->bindParam(':id_session', $id_session);



	
	$sql->execute();

	session_destroy();

	echo'<meta http-equiv="refresh" content="0; url=index.php"/>';
                            
                            

}



?>

</section>




</main>