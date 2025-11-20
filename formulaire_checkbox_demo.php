<?php
//Initialisation de la variable d'affichage
$fruits = '';
$genre = '';
$ville = '';

//Vérifie que je reçois le formulaire
if(isset($_POST['submit'])){
    print_r($_POST);
    $fruits = "Les fruits que j'aime : ";
    //Je traite le tableau $_POST["fruits"] pour en faire une phrase à afficher
    foreach($_POST['fruits'] as $key=>$value){
        $fruits = $fruits."$value, ";
    }

    $genre="Je suis : {$_POST['genre']} ";

    $ville = "J'habite à : {$_POST['ville']} ";
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
        <h1>Formulaire : Checkbox, Radio, Select</h1>
        <p>Sondage :</p>
        <form action="" method="post">
            <fieldset>
                <legend>Checkbox : Quels fruis aimez-vous ?</legend>
                <!-- Pour récupérer des checkbox, les names de case qui vont ensemble doivent être identique et terminer par [] pour les récupérer sous forme de tableaux -->
                <input id="pomme" type="checkbox" name="fruits[]" value="pomme"><label for="pomme">Pomme</label>
                <input id="poire" type="checkbox" name="fruits[]" value="poire"><label for="poire">Poire</label>
                <input id="banane" type="checkbox" name="fruits[]" value="banane"><label for="banane">Banane</label>
                <!-- ici les chackbox cochées par l'utilisateurs seront réunis sous le tableau fruits -->
            </fieldset>

            <fieldset>
                <!-- Pour les Radios faisant parti du même groupe (1 seul choix possible parmi eux) : leur name doit être identique -->
                <legend>Radio : Etes-vous un homme ou une femme ?</legend>
                <input id="homme" type="radio" name="genre" value="homme"><label for="homme">Homme</label>
                <input id="femme" type="radio" name="genre" value="femme"><label for="femme">Femme</label>
            </fieldset>

            <fieldset>
                <!-- Pour Select : c'est la balise Select qui possède le name, et l'option qui possède le value -->
                <legend>Select : Où habitez-vous ?</legend>
                <select name="ville">
                    <option value="Toulouse">Toulouse</option>
                    <option value="Paris">Paris</option>
                    <option value="Lyon">Lyon</option>
                </select>
            </fieldset>
            <input type="submit" name="submit" value="Envoyer">
        </form>

        <p><?php echo $fruits ?></p>
        <p><?php echo $genre ?></p>
        <p><?php echo $ville ?></p>

    </main>
    <footer>

    </footer>
</body>
</html>