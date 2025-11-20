<?php
$message="";
//1) Vérifier que l'on reçoit le formulaire
if(isset($_POST['submit'])){
    //2) Sécurité n°1 : Vérifier que les champs sont bien remplis
    if(!empty($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['passwordVerify']) && (isset($_POST['plateforme']) && is_array($_POST['plateforme']) && count($_POST['plateforme']) > 0))
        
        //3) Sécurité n°2 : Vérifier le format des données
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        
            //Nettoyage du login s'il y a un login d'envoyer
                
            $login = htmlentities(stripslashes(strip_tags(trim($_POST['login']))));
            $email = htmlentities(stripslashes(strip_tags(trim($_POST['email']))));
            $password = htmlentities(stripslashes(strip_tags(trim($_POST['password']))));
            $passwordVerify = htmlentities(stripslashes(strip_tags(trim($_POST['passwordVerify']))));
            $save = [];
            foreach($_POST['plateforme'] as $key=>$value){
                array_push($save,htmlentities(stripslashes(strip_tags(trim($value)))));
            }
            //5) Vérifier la correspondance des mots de passe
                if($password === $passwordVerify){
                    //6) Sécurité n°4 : Chiffrement des données sensibles -> hasher le password
                    //password_hash() : fonction de hash de PHP
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $message = "<ul>
                        <li>login : $login</li>
                        <li>email : $email</li>";
                    $message =$message.
                        "<li>Plateforme : ";
                    foreach($save as $key=>$value){
                            $message = $message.$value;
                        } ;
                    $message =$message."</li>
                        <li>password : $password</li> 
                        </ul>";
                        
                }
        }
        else {
            echo "Veuillez entrer un email valide";
        }

    else {
        echo "Tout les champs ne sont pas rempli";
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
    <h1>Exercice 23</h1>
    <form action="" method="post" style="display:flex; flex-direction:column; width:300px">
        <label for="login">Login :</label>
        <input type="text" name="login">

        <label for="email">Email :</label>
        <input type="email" name="email">
        
        <label for="password">Password :</label>
        <input type="password" name="password">
        
        <label for="passwordVerify">Vérify Password :</label>
        <input type="password" name="passwordVerify">

        <fieldset>
            <legend>Quelle platefomrme de streaming ?</legend>
            <input id="netflix" type="checkbox" name="plateforme[]" value="Netflix"><label for="netflix">Netfix</label>
            <input id="prime" type="checkbox" name="plateforme[]" value="prime"><label for="prime">Prime</label>
            <input id="disney+" type="checkbox" name="plateforme[]" value="disney+"><label for="disney+">Disney+</label>
            <input id="hbomax" type="checkbox" name="plateforme[]" value="hbomax"><label for="hbomax">HBO Max</label>
        </fieldset>

        <input type="submit" name="submit" value="Envoyer">
        

    </form>
    <?php echo $message ?>
</body>
</html>