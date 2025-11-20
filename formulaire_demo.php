<?php
    /*Reception d'un Formulaire
        1) Cela dépend la méthode utilisée :
            - Method GET = superglobal $_GET
            - Method POST = superglobal $_POST
        2) Les superglobales sont tout simplement des Tableaux Associatifs. dans le cas de $_GET et $_POST, ,e nom de leur clé correspond aux attributs name des inputs.
    
    Exemple, avec le formulaire cii_dessous (dans le HTML), $_GET va ressembler à :
    $_GET = [
        login => "Yoann",
        password => '12345',
        submit => "Envoyer"
    ];
    */

    //Exemple pour exploiter la superglobal $_GET : afficher dans le HTML, après le formulaire, les données envoyées
    //1) Récupérer le donné de la superglobal dans des variables que je vais appeler dans l'affichage du HTML :

    //1.1) Je déclare des variables d'affichages avec une string vide (pour éviter les erreurs lors de l'affichage)
    $login = '';
    $password = '';

    //1.2) Je vérifie que je reçois bien un formulaire à traiter (pour éviter les erreurs la première fois que mon client arrive sur la page)
    if(isset($_GET['submit'])){
        $login = $_GET['login'];
        $password = $_GET['password']; 
    }
    

    //2) Faire un echo des variables précédentes dans le HTML à l'endroit voulu
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
        <h1>Demo Formulaire</h1>
        <p>Pour l'envoie d'un formulaire à un serveur :</p>
        <ul>
            <li>définir une méthode d'envoie (GET envoie dans l'url, POST dans le body de la requête HTTP)</li>
            <li>il faut donner un attribut name aux inputs qui doivent envoyer leur donnée. Le nom du name sera le nom de la varibale qui stockera la donnée</li>
        </ul>
        <form action="" method="get">
            <!-- IMPORTANT : dans un formulaire, seuls les inputs possédant un attribut name enverront leur donnée au serveur -->
            <label>Login : </label><input type="text" name="login">
            <label>Email : </label><input type="text"> <!-- Ici, le champ Email n'enverra pas de donnée car aucun name lui a été donné -->
            <label>Password : </label><input type="text" name="password">
            <input type="submit" name="submit" value="Envoyer">
        </form>

        <!-- Affichage des données envoyées par le formulaire et récupérer plus haut dans le php -->
        <p>Login : <?php echo $login ?></p>
        <p>Password : <?php echo $password ?></p>
    </main>
    <footer>

    </footer>
</body>
</html>