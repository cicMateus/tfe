<?php 
require_once('config2.php');  
session_start(); 
?>


<!doctype html>
<html <?php if(isset($_GET['rub'])){echo 'class="html_else"';}?>>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
     
        <title>Solidaction</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive_desktop.css">
        <link rel="stylesheet" href="css/responsive_device.css">
        <link rel="stylesheet" href="css/alertjs.css">
        <meta name='viewport' content='content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0' />
        <script src="js/jquery.js"></script>
        <script src="js/device_detect.js"></script>
        <script type="text/javascript" src="js/lancement.js"></script>
        <script type="text/javascript" src="js/localscroll/jquery.localscroll.js"></script>
        <script type="text/javascript" src="js/localscroll/jquery.scrollTo.js"></script>
        <script type="text/javascript" src="js/alertjs.js"></script>
        <script type="text/javascript" src="js/scrolldownchat.js"></script>
        <script src="//use.typekit.net/toa5xrx.js"></script>
        <script>try{Typekit.load();}catch(e){}</script>
        <link rel="icon" type="image/png" href="img/favicon.png" />


    </head>
    <body <?php if(isset($_GET['rub']) && $_GET['rub'] == "actions"){echo 'class="body_else"';}?>>

         

                
            
    	<header <?php if(!isset($_GET['rub'])){echo 'class="bg"';}?> >
            <div id="nav-header" <?php if(!isset($_GET['rub'])){echo 'class="nav_index"';}?>>
        		<a href="index.php"><div id="logo" class="rubberBand"><img src="img/logo.png"></div></a>

                <?php include('login.php');?>
                <ul id="login-box" <?php if(!isset($_GET['rub'])){echo 'class="login_index"';}?>>
                       <h2>Connexion</h2>
                        <form action="" method="post">
                            <input type="email" name="email" placeholder="Adresse e-mail">
                            <input type="password" name="pass" placeholder="Mot de passe">
                            <input type="submit" name="valider" value="valider">
                        </form>
                        <ul>
                            <li id="mdp">Mot de passe oublié?</li>
                            <li><a href="#inscription">Pas encore membre?</a></li>
                        </ul>

                        
                </ul>

                <ul id="setup-box" <?php if(!isset($_GET['rub'])){echo 'class="setup_index"';}?>>
                    <li><a href="index.php?rub=compte">Mon compte</a></li>
                    <li><a href="logout.php">Déconnexion</a></li>
                </ul>
                <ul class="ico-nav">
                        
                        <?php
                        if(isset($_SESSION['loger']) && $_SESSION['loger'] == true){
                             echo '<li id="menu" class="picto"></li>';
                            echo '<li id="setup" class="picto"></li>';
                            echo '<li id="account"><p>'.$_SESSION['prenom'].' '.$_SESSION['nom'].'</p></li>';
                            
                            
                        }

                        else{
                            echo '<li id="menu" class="picto"></li>';
                            echo '<li id="login" class="picto"></li>';

                        }
                        
                        ?>


                       
                    </ul>
                    <ul id="main-nav" <?php if(!isset($_GET['rub'])){echo 'class="nav_index"';}?>>
                        <li><a href="index.php?rub=apropos">A propos</a></li>
                        <li><a href="index.php?rub=actions">Nos actions</a></li>
                        <li><a href="index.php?rub=partenaires">Partenaires</a></li>
                        <?php  if(isset($_SESSION['id'])){echo '<li><a href="index.php?rub=chat">Chat</a></li>';}?>
                    </ul>
                </div>

                <?php 

                if(!isset($_GET['rub'])){
                    echo '<div id="phrase">';
                    echo '<h1>Avec Solidaction, être Bénévole c\'est aussi simple que prendre sa pause au soleil.</h1>';
               
                    echo '</div>';

                    echo '<a href="#accueil"><div id="scroll">Scroll down</div></a>';


                }

                ?>
                <?php include('recuperer_mdp.php');?>

                <div id="mdp_oblie" <?php if(!isset($_GET['rub'])){echo 'class="login_index"';}?>>
                    <p id="fermer">x</p>
                    <p id="avis">Remplissez le champ avec votre adresse e-mail pour recevoir votre mot de passe.</p>
                    <form action="" method="post">
                        <input type="email" name="mail_mdp" placeholder="adressemail@mail.me">
                        <input type="submit" id="recuperer" name="recuperer" value="Envoyer">
                    </form>

                    <?php 
                     if(isset($_POST['recuperer']) && $fail == true){

                        if($vide == true){
                            echo '<p><script language="javascript">alert("Oups, il y a une erreur", "'.$champ_vide.'")</script></p>';
                        }

                        else if($user_exist == false){
                            echo '<p><script language="javascript">alert("Oups, il y a une erreur","'.$mail_fail.'")</script></p>';
                        }


                    }
                  
                   
                    
                    
                    ?>

                   

                </div>
                <?php if(isset($_POST['valider']) && $login_wrong == true){echo '<p id="fail"><script language="javascript">alert("Oups, il y a une erreur","'.$fail.'")</script></p>';} ?>
                <?php if(isset($_POST['recuperer']) && $fail == false){ echo '<p class="ok_mdp"><script language="javascript">alert("Succés!","'.$tout_ok.'")</script></p>'; echo'<meta http-equiv="refresh" content="0; url=index.php"/>';} ?>
    		
    	</header>

        <div id="container" <?php if(isset($_GET['rub']) && $_GET['rub'] == "actions" && !isset($_GET['cause'])){echo 'class="rub"'; }elseif(isset($_GET['rub']) && $_GET['rub'] == 'actions' && isset($_GET['cause'])){echo 'class="rub2"';} elseif(isset($_GET['rub']) && $_GET['rub'] == 'chat' || isset($_GET['rub']) && $_GET['rub'] == 'apropos' || isset($_GET['rub']) && $_GET['rub'] == 'compte'){echo 'class="rub3"';} ?>>

            <?php
                if(!isset($_GET['rub'])){
                    include ('accueil.php');
                }
                else{
                    include ($_GET['rub'].'.php');
                }

            ?>
        	
        </div>
        <footer>
            <div id="info_footer">
                <p>©Solidaction 2015 - <a href="index.php?rub=credits">Crédits</a> - <a href="index.php?rub=mentions">Mentions Légales</a></p>
                <p>Suivez les nouvelles sur: <a href="https://www.facebook.com/solidactionBelgique" target="blank" id="fb">fb</a>  <a href="https://twitter.com/SolidactionBe" target="blank" id="twit">tw</a></p>
            </div>
        </footer>

        
        <script src="js/script.js"></script>
		<script>
		<?php
			$sql = 'SELECT id FROM messages ORDER BY id DESC LIMIT 1';
			$statement = $bdd->prepare($sql);
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		?>
			var lastId = <?php echo $result[0]['id'];?>;
			
			<?php
			$sql = 'SELECT COUNT(id) FROM user WHERE connected = "true"';
			$statement = $bdd->prepare($sql);
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		?>
		var connectedUsers = <?php echo $result[0]['COUNT(id)'];?>;
		</script>
		<script src="js/check-new-message.js"></script>
       
    </body>
</html>