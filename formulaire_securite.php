<?php
//Initialisation des variables d'affichages
$message = '';

//1) Vérifier que l'on reçoit le formulaire
if(isset($_POST['submit'])){
    //2) Sécurité n°1 : Vérifier que les champs sont bien remplis
    //empty() : retourne true si un champ est vide
    if(!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['passwordVerify'])){
        print_r($_POST);
        
        //3) Sécurité n°2 : Vérifier le format des données
        //filter_var() + FILTER_VALIDATE_* : retourne true si la donnée correspond au filtre de validation choisi
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            //3.2) Vérifier le format des champs optionnels
            if(!empty($_POST['age']) && !filter_var($_POST['age'], FILTER_VALIDATE_INT)){
                $message = "L'Age n'est pas un entier numérique";
            }

            //3.3) Vérifier le cas où tout fonctionne bien -> le cas où l'Age (optionnel) est vide, ou qu'il est correctement rempli
            if(empty($_POST['age']) || filter_var($_POST['age'], FILTER_VALIDATE_INT)){

                //4) Sécurité n°3 : Nettoyage des données -> Cumul et imbrication de 4 fonctions
                //htmlentities() : nettoyer les balises HTML
                //stripslashes() : supprime les \ 
                //strip_tags() : supprime les balises HTML et PHP
                //trim() : supprime les espaces

                //Nettoyage du prenom s'il y a un prénom d'envoyer
                if(!empty($_POST['prenom'])){
                    $prenom = htmlentities(stripslashes(strip_tags(trim($_POST['prenom']))));
                }
                //Nettoyage de l'age si un age a été envoyé
                if(!empty($_POST['age'])){
                    $age = htmlentities(stripslashes(strip_tags(trim($_POST['age']))));
                }
                //Nettoyer : le pseudo, l'email, les 2 passwords
                $pseudo = htmlentities(stripslashes(strip_tags(trim($_POST['pseudo']))));
                $email = htmlentities(stripslashes(strip_tags(trim($_POST['email']))));
                $password = htmlentities(stripslashes(strip_tags(trim($_POST['password']))));
                $passwordVerify = htmlentities(stripslashes(strip_tags(trim($_POST['passwordVerify']))));

                //5) Vérifier la correspondance des mots de passe
                if($password === $passwordVerify){

                    //6) Sécurité n°4 : Chiffrement des données sensibles -> hasher le password
                    //password_hash() : fonction de hash de PHP
                    $password = password_hash($password, PASSWORD_DEFAULT);

                    //7) TOUTES LA SECURITE a été mise en place -> on passe enfin au traitement des données
                    //Afficher nos données
                    $message = "<ul>";
                    if(!empty($prenom)){
                        $message = $message."<li>Prenom : $prenom</li>"; 
                    }
                    $message = $message."
                        <li>Pseudo : $pseudo</li>
                        <li>Email : $email</li>
                        <li>Password : $password</li>";
                    if(!empty($age)){
                        $message = $message."<li>Age : $age ans</li>";
                    }
                    $message = $message."</ul>";

                }else{
                    $message = "Les 2 mots de passe ne correspondent pas";
                }

            }
        }else{
            $message = "Veuillez entrer un email valide";
        }


    }else{
        $message = "Veuillez remplir tous les champs possédant un * !";
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
                <li><a href="../index.php">Accueil</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Formulaire : Sécurisaté de Base</h1>
        <ul>
            <li>La methode de formulaire la plus "sécurisée" : POST. N'utilisez GET uniquement pour partager des données de manière publique. Exemple : partage d'un lien d'une page spécifique (vidéo youtube, article de blog, ...)</li>
            <li>ETAPE 1 : Vérifier que les champs obligatoires sont remplis lors de la réception du formulaire</li>
            <li>ETAPE 2 : Vérifier que le format des champs correspond au format attendu (un email doit ressembler à un email, avec @, etc. Un nombre doit être un entier numérique ou un float. Une date, doit avoir un format correspondant à celle d'ue date. Etc.)</li>
            <li>ETAPE 3 : Nettoyer les données reçues (enlever les espaces inutiles au début et fin de chaîne de caractère, enlever les baslises HTML, SCRIPT et PHP non souhaité, etc)</li>
            <li>ETAPE 4 : Dans le cas où on doit enregistrer des données sensibles, il faut les chiffrer. Pour le mot de passe, il faut le hasher.</li>
        </ul>

        <form action="" method="post" style="display:flex; flex-direction:column; width:300px">
            <label for="prenom">Prenom</label><input id="prenom" type="text" name="prenom">
            <label for="pseudo">Pseudo*</label><input id="pseudo" type="text" name="pseudo">
            <label for="email">Email*</label><input id="email" type="email" name="email">
            <label for="age">Age</label><input id="age" type="number" name="age">
            <label for="password">Password*</label><input id="password" type="password" name="password">
            <label for="passwordVerify">Retappez le Password*</label><input id="passwordVerify" type="password" name="passwordVerify">
            <input type="submit" name="submit" value="S'inscrire">
        </form>
        <p><?php echo $message ?></p>
    </main>
    <footer>

    </footer>
</body>
</html>