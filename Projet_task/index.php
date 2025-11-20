<?php
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
                
                $data=[];
                
                try {
                    $req = $bdd->prepare("SELECT u.nickname_user,u.email_user FROM users u WHERE u.nickname_user = ? OR u.email_user = ?");
                    $req->bindParam(1,$nickname,PDO::PARAM_STR);
                    $req->bindParam(2,$email,PDO::PARAM_STR);
                    //Envoyer la requête
                    $req->execute();

                    //Récupérer la réponse
                    $data = $req->fetchAll();

                    //Message de confirmation
                    
                } catch (EXCEPTION $error) {
                    die($error->getMessage());
                }        

                //Verifier des $data 
                if(empty($data)){
                    $message = "$nickname et $email n'existe pas dans la bdd";
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
                }else {
                    $message = "$nickname ou $email existe déjà dans la bdd";
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
    </main>
    <footer>

    </footer>
</body>
</html>