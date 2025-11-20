<?php
//Démarrer la session
session_start();

//Initialiser ma variable d'affichage
$message = '';

//FROMULAIRE INSCRIPTION
//Vérifier que l'on reçoit le formulaire d'inscription
if(isset($_POST['signIn'])){
    //Etape de Sécurité 1 : vérifier les champs vides
    if(!empty($_POST['nickname']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['passwordVerify']) ){

        //Etape de Sécurité 2 : Vérifier le format des données
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

            //ETAPE de Sécurité 3 : Nettoyage des données
            $nickname = htmlentities(stripslashes(strip_tags(trim($_POST['nickname']))));
            $email = htmlentities(stripslashes(strip_tags(trim($_POST['email']))));
            $password = htmlentities(stripslashes(strip_tags(trim($_POST['password']))));
            $passwordVerify = htmlentities(stripslashes(strip_tags(trim($_POST['passwordVerify']))));

            //Etape 4 : Vérifier la correspondance des mots de passe
            if($password === $passwordVerify){

                //Etape 5 : Hasher le mot de passe à enregistrer
                $password = password_hash($password, PASSWORD_DEFAULT);

                //ETAPE 6 : COMMUNICATION AVEC LA BDD
                //Etape 6.1 : Création de l'objet de connexion PDO
                $bdd = new PDO('mysql:host=localhost;dbname=task','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

                // => EXERCICE 24
                //Try...Catch -> D'envoyer une requête SELECT pour récupére les utilisateurs qui possèdent le même pseudo et le même email que ceux entrer
                $data = [];
                try{
                    //Prepare
                    $req = $bdd->prepare('SELECT u.id_user, u.nickname_user, u.email_user, u.firstname_user, u.lastname_user, u.password_user, r.id_role, r.`role` FROM users u INNER JOIN `role` r ON u.id_role = r.id_role WHERE u.nickname_user = ? OR u.email_user = ?');

                    //BindParam
                    $req->bindParam(1,$nickname,PDO::PARAM_STR);
                    $req->bindParam(2,$email,PDO::PARAM_STR);

                    //Execute
                    $req->execute();

                    //$data = FetchAll
                    $data = $req->fetchAll();

                    //[TEST] : Ici j'affiche la réponse de la BDD pour TESTER si ma requête fonctionne comme voulu
                    print_r($data);

                }catch(EXCEPTION $error){
                    die($error-getMessage());
                }

                //Vérification des $data
                if(empty($data)){
                    //$data vide -> signifie que nickname et email sont dispo
                    // Lance le try... catch d'inscription
                    // Try... Catch : nous permet de gérer les erreurs de communication avec la BDD et de requête envoyée à la BDD
                    try{
                        //ETAPE 6.2 : Vérifier si le Pseudo et l'Email sont disponible. Former la requête à envoyer
                        $req = $bdd->prepare("INSERT INTO users (nickname_user, email_user, password_user, id_role) VALUES (?,?,?, 2)");

                        //ETAPE 6.3 : Binding de Paramètre -> relier chaque ? de la requête à une valeur
                        //1er paramètre : position du ? dans la requête
                        //2nd paramètre : valeur à insérer dans la requête
                        //3eme paramètre : format du paramètre (classiquement : STRING ou INT)
                        $req->bindParam(1,$nickname,PDO::PARAM_STR);
                        $req->bindParam(2,$email,PDO::PARAM_STR);
                        $req->bindParam(3,$password,PDO::PARAM_STR);

                        //Etape 6.3 : Envoyer la requête
                        $req->execute();

                        //Etape 6.4 : Récupérer la réponse
                        $data = $req->fetchAll();

                        //Etape 6.5 : Message de confirmation
                        $message = "$nickname a été enregistré avec succès !";
                        

                    }catch(EXCEPTION $error){
                        die($error->getMessage());
                    }
                }else{
                    //$data non vide -> signifie que nickname OU email indispo
                    //message d'erreur
                    $message = 'Pseudo ou Email indisponible.';
                }
                

            }else{
                $message = "Vos mots de passe ne sont pas identiques";
            }

        }else{
            $message = "Veuillez entrer un email valide";
        }

    }else{
        $message = "Veuillez remplir tous les champs";
    }
}

//FORMULAIRE
//Vérifier que l'on reçoit le formulaire d'info
if(isset($_POST['signUp'])){
    //4)Verifier si les champs son vide
    if(!empty($_POST['nickname']) &&  !empty($_POST['passwordSignUp']) ){
    //Nettoyer les données
        $nicknameSignUp = htmlentities(stripslashes(strip_tags(trim($_POST['nicknameSignUp']))));
        $passwordSignUp = htmlentities(stripslashes(strip_tags(trim($_POST['passwordSignUp']))));
        //Conection à la BDD
        $bdd = new PDO('mysql:host=localhost;dbname=task','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        $data = [];

        try{
            $req = $bdd->prepare('SELECT  u.nickname_user, u.password_user,  FROM users u  WHERE u.nickname_user = ? OR u.password_user = ?');

            $req->bindParam(1,$nicknameSignUp,PDO::PARAM_STR);
            $req->bindParam(2,$passwordSignUp,PDO::PARAM_STR);

            //Execute
            $req->execute();

            // Récupérer la réponse
            $data = $req->fetchAll();

            //[TEST] : Ici j'affiche la réponse de la BDD pour TESTER si ma requête fonctionne comme voulu
            print_r($data);

        }catch(EXCEPTION $error){
            die($error->getMessage());
            
        }
        //Verifier si les mots de passe corespondent avec la BDD
        
            // if (password_verify($data,)){
                
            // }
    
    
            
        } else {
            $message = "Veuillez remplir tous les champs";
        }
        $_SESSION = [
            'nickname' => $_POST['nicknameSignUp'],
            'password' => $_POST['passwordSignUp']
        ];
}
print_r($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../index.php">Accueil General</a></li>
                <li><a href="./info.php">Vos Infos</a></li>
                <li><a href="./deco.php">Se Deconnecter</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Bienvenue sur le Projet Task</h1>

        <h2>Inscription Utilisateur</h2>
        <form action="" method="post">
            <label for="nickname">Pseudo</label><input type="text" id="nickname" name="nickname">
            <label for="email">Email</label><input type="text" id="email" name="email">
            <label for="password">Mot de Passe</label><input type="text" id="password" name="password">
            <label for="passwordVerify">Retappez le Mot de Passe</label><input type="text" id="passwordVerify" name="passwordVerify">
            <input type="submit" name="signIn" value="S'inscrire">
        </form>
        <p> <?php echo $message ?></p>

        <h2>Connection</h2>
        <form action="" method="post">
            <label for="nicknameSignUp">Pseudo</label><input type="text" id="nicknameSignUp" name="nicknameSignUp">
            <label for="passwordSignUp">Email</label><input type="password" id="passwordSignUp" name="passwordSignUp">
            <input type="submit" name="signUp" value="Se Connecter">
        </form>
    </main>
    <footer>

    </footer>
</body>
</html>