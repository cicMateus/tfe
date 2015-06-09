<main id="partenaires">

<h2>Nos partenaires</h2>

<?php
	$pdo = $bdd->prepare('SELECT * FROM partenaires');
	$pdo->execute();
	$data = $pdo->fetchAll();




	foreach($data as $row) {

		echo '<section>

			
			<a href="'.$row['lien'].'" target="blank"><img src="'.$row['logo'].'" alt="logo_'.$row['nom'].'"/></a>


		</section>';

	}

?>

</main>