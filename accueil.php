<main class="main" id="accueil">

	<div id="partie1" class="parties">

		<h2>Nos actions express</h2>
		<section id="oxfam" class="action_express">
			<a href="index.php?rub=inscription&evenement=oxfam"><div class="info">
				<h3>Oxfam</h3>
				<p>Sortez vos baskets pour la nouvelles édition Trailwalker</p>
				
					<div class="hand_1 hand"></div>
					<div class="hand_2 hand"></div>
				
			</div></a>
		</section>
		<section id="croix_rouge" class="action_express">
			<a href="index.php?rub=inscription&evenement=croix-rouge"><div class="info">
				<h3>Croix-Rouge</h3>
				<p>20Km vous sépare du Burundi</p>
				
					<div class="hand_1 hand"></div>
					<div class="hand_2 hand"></div>
				
			</div></a>
		</section>
		<section id="sos_villages" class="action_express">
			<a href="index.php?rub=inscription&evenement=sos-villages-enfants"><div class="info">
				<h3>SOS Village d'Enfants</h3>
				<p>Une nouvelle école au congo? Grâce à vous, c'est possible</p>
				
					<div class="hand_1 hand"></div>
					<div class="hand_2 hand"></div>
				
			</div></a>
		</section>

	</div>
	<div id="partie2" class="parties">

		<h2>Avec nous, aider c'est facile</h2>


		<?php 


		if(!isset($_SESSION['id'])){

			

			echo '<div id="communaute" class="bloc">

				<section id="photos_public">
					<div id="association_img" class="img_communaute"></div>
					<div id="benevole_img" class="img_communaute"></div>
					<ul id="nav_communaute">
					    <li class="btn_nav" id="btn_benevole">Bénévole</li>
					    <li class="btn_nav" id="btn_association">Association</li>
					</ul>

				</section>
				<section id="avantages" class="info2">
					<div id="avantage_bene" class="public">
						
	                    <h3>Les avantages d\'un bénévole</h3>
	                    <ul>
	                        <li class="mail_ico">Nous vous tiendrons au courant des nouveautés</li>
	                        <li class="chat_ico">Soiez toujours en contact avec nous</li>
	                        <li class="profil_ico">Parlez-nous de vos goûts, compétences, plaisirs...</li>
	                                        
	                    </ul>
	                    
					</div>
					<div id="avantage_assoc" class="public">
	                    <h3>Les avantages d\'une association</h3>
	                    <ul>
	                        <li class="action_ico">Organisez plus vite vos évènements</li>
	                        <li class="chat_ico">Soyez toujours en contact avec toute la communauté</li>
	                        <li class="carnet_ico">Consultez les profils des bénévoles</li>
	                    </ul>
	                    
					</div>
				</section>
				<section id="inscription" class="info2">';

				include('sign_up.php');

				echo '<div id="inscription_bene" class="public">
						<h3>S\'inscire comme bénévole</h3>

						<form action="#inscription" method="post">
	                        <label for="prenom">Prénom</label>
	                        <input type="text" name="prenom" required="required" placeholder="Robert">
	                        <label for="nom">Nom</label>
	                        <input type="text" name="nom" required="required" value="" placeholder="Descamps">
	                        <label for="email">Adresse e-mail</label>
	                        <input type="email" name="email" required="required" placeholder="robert-descamps@gmail.com">
	                        <label for="pass">Mot de passe</label>
	                        <input type="password" name="pass" required="required" placeholder="******">
	                        <input type="submit" name="valider_bene" value="Valider">
	                       
	                    </form>

	                    
	                    
					</div>
					<div id="inscription_assoc" class="public">
						<h3>S\'inscire comme association</h3>
	                    <form action="#inscription" method="post">
	                        
	                        <label for="nom">Nom</label>
	                        <input type="text" name="nom" required="required" placeholder="Les crayons magiques"/>
	                        <label for="numBC">N° d\'entreprise</label>
	                        <input type="text" name="numBC" required="required" placeholder="1234.567.890"/>
	                        <label for="nom">Adresse e-mail</label>
	                        <input type="email" name="email" required="required" placeholder="crayons-magiques@hotmail.com"/>
	                        <label for="nom">Mot de passe</label>
	                        <input type="password" name="pass" required="required" placeholder="********"/>
	                        <input type="submit" name="valider_assoc" value="Valider"/>

	                    </form>
	                    
					</div>';

					if(isset($_POST['valider_bene']) && $confirm == true){ echo '<div id="ok_bene" class="ok"><span>Fermer</span><p>'.$ok.'</p></div>'; }
					if(isset($_POST['valider_bene']) && $confirm == false){ echo '<div id="mail_exist" class="ok"><span>Fermer</span><p>'.$mail_exist.'</p></div>'; } 
					
					if(isset($_POST['valider_assoc']) && $confirm == true){ echo '<div id="ok_assoc" class="ok"><span>Fermer</span><p>'.$ok.'</p></div>';} 

				echo '</section>

				

			</div>';

		}
		else{

			echo '<div id="bloc_chat"> 

				<section id="bloc_chat_img" class="bloc_chat"></section>
				<section id="bloc_chat_fenetre" class="bloc_chat">
					<h3>Commencez à discuter!</h3>
					<p>Vous pouvez dès maintenant discuter avec la communauté de solidaction.
					Profitez pour poser des questions directement aux associations ou pour rencontrer d\'autres bénévoles comme vous.</p>

					<a href="index.php?rub=chat">Accéder au chat</a> 
				</section>';

			echo '</div>';
		}

		

		?>
		<div id="navigation" class="bloc">

			<div id="img_decor"></div>
			<div id="nav_secondaire">
				<ul>
				    <li><a href="index.php?rub=actions">Plein d'actions pour tous les goûts</a></li>
				    <li class="middle"><a href="index.php?rub=partenaires">Les associations qui collaborent avec nous</a></li>
				    <li><a href="mailto:support.solidaction@gmail.com">Besoin d'aide? Contactez-nous</a></li>
				</ul>
			</div>



		</div>

	





</main>