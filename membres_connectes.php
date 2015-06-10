<?php
	require_once("config.php");	/*include ta db*/
	$membres = array(
		'membres_connectes' =>array()
		);	/*prépare la variable qui va etre changée en json pour passer les données à js*/

	if($_POST)/*si le fichier php reçoit des données en post*/
	{
		$request = htmlspecialchars(stripslashes(trim($_POST['request'])));	/*nettoyage de la variable envoyée*/
		/*$latest_id = htmlspecialchars(stripslashes(trim($_POST['latest_id'])));*/

		if($request == "membre")/*si la variable contient "messages" ce nom sera envoyé par js tu aurais pu mettre pipicaca on s'en fout*/
		{
			$pdo = $bdd->prepare('SELECT * FROM connectes WHERE connecte = :oui');

			$oui = 'oui';
		    $pdo->bindParam(':oui', $oui);
		  	
		    $pdo->execute();
		    $result2 = $pdo->fetchAll();
			foreach($result2 as $row2) {/*la boucle qui stocke tous les messages dans la variable de départ*/ 
			
				$membres['membres_connectes'][] = array( /*les deux [] signifie à php crée une nouvelle entrée dans le array message de get_messages qui elle contient un array avec toutes les infos ci-dessous*/
					'id' => $row2['id'], /*le nom de ta colonne id dans la table connectes*/
					'last_name' =>$row2['nom'],
					'name' =>$row2['prenom'],
				);
			}
			echo json_encode($membres);
		}
	}
	else
	{
		die("403 : Forbidden");
	}
?>