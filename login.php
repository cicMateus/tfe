<?php

    
    $fail = "Email ou mot-de-passe incorrect";
    

	if(isset($_POST['valider'])){
        if($_POST['valider']){

       

            function test_input($data) 
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            
            //$current = 
            
            $email = test_input($_POST['email']);
            $password = md5(test_input($_POST['pass']));
            
            /*GET users*/
            $sql = "SELECT * FROM user WHERE email=:email AND password=:password";
            
            $users = $bdd->prepare($sql);
            $users->bindParam("email", $email);
            $users->bindParam("password", $password);
            $users->execute();
            $r_users = $users->fetchAll(PDO::FETCH_ASSOC);
 
        

           
            if(count($r_users) == 0) {

                $login_wrong = true;
            } 
            else { 
                $login_wrong = false;         
                $_SESSION['id'] = $r_users[0]['id'];
                $_SESSION['email'] = $r_users[0]['email'];
                $_SESSION['loger'] = "true";
                $_SESSION['nom'] = $r_users[0]['nom'];
                $_SESSION['prenom'] = $r_users[0]['prenom'];
                $_SESSION['profil'] = $r_users[0]['profil'];


                $id_user = $_SESSION['id'];
                $prenom = $_SESSION['prenom'];
                $nom =  $_SESSION['nom'];

                $connected = 'true';


                $req = 'UPDATE user SET connected = :connected WHERE id = :id AND email = :email';
				$statement = $bdd->prepare($req);
                $statement->bindParam(':id', $r_users[0]['id']);
                $statement->bindParam(':email', $r_users[0]['email']);
                $statement->bindParam(':connected', $connected);
                $statement->execute();

                
                
                
                 echo'<meta http-equiv="refresh" content="0; url=index.php"/>';
                            
                           
            }

        }
	}
?>