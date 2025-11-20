<?php
    //Exercice 20
    $nombre1 = "";
    $nombre2 = "";
    $somme = "";

    if(isset($_GET['submit'])){
        $nombre1 = $_GET['nombre1'];
        $nombre2 = $_GET['nombre2']; 
        $somme=$nombre1+$nombre2;
    }
    //Exercice 21
    $prix_HT="";
    $nombre_article="";
    $TVA="";
    $prix_ttc="";

    if(isset($_GET['Calcul'])){
        $prix_HT = $_GET['prix_HT'];
        $nombre_article = $_GET['nombre_article']; 
        $TVA = $_GET['TVA']; 
        $prix_ttc=$prix_HT*(1+($TVA/100))*$nombre_article;
    }
    
    //Exercice 22
    $login="";
    $password="";
    $genre="";
    $snack="";
    $postal="";
    //chekbox
    if(isset($_POST['envoyer'])){
        $login=" {$_POST['login']} ";
        $password=" {$_POST['password']} ";
        print_r($_POST);
        foreach($_POST['genre'] as $key=>$value){
        $genre = $genre."$value, ";
    }
    //radio
    $snack=" {$_POST['snack']} ";
    //select
    $postal=" {$_POST['postal']} ";
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
    <h1>Exercice 20 </h1>
    <form action="" method="get">
        <label for="nombre1">Nombre 1</label>
        <input type="number" name="nombre1" placeholder="Nombre1">

        <label for="nombre2" >Nombre 2</label>
        <input type="number" name="nombre2" placeholder="Nombre2">

        <input type="submit" name="submit" value="Calculer">
    </form>

    <p>le resultat est <?php echo $somme?></p>
    
    <h1>Exercice 21</h1>
    <form action="" method="get">
        <label for="prix_ht" >prix HT</label>
        <input type="number" name="prix_HT" placeholder="Prix_HT">

        <label for="nombre_article">Nombre d'article</label>
        <input type="number" name="nombre_article" placeholder="Nombre_article">
        
        <label for="TVA" >TVA</label>
        <input type="number" step="0.1" name="TVA" placeholder="TVA" > <!--step permet d'avoir un chiffre après la virgule agremanter de 1 si 0.5 agrémenter de 5 en 5 -->

        <input type="submit" name="Calcul" value="Calculer">
    </form>
    <p>Le prix TTC est égal à : <?php echo $prix_ttc ?> </p>

    <h1>Exercice 22</h1>

    <form action="" method="post">
        <label for="login">login :</label>
        <input type="texte" name="login">

        <label for="password">Passeword</label>
        <input type="password" name="password">
        
        <fieldset>
            <legend>Quelle genre aimez vous ? </legend>
            <input id="Fantasy" type="checkbox" name="genre[]" value="Fantasy"><label for="Fantasy">Fantasy</label>
            <input id="Science-fiction" type="checkbox" name="genre[]" value="Science-fiction"><label for="Science-fiction">Science-fiction</label>
            <input id="Horreur" type="checkbox" name="genre[]" value="Horreur"><label for="Horreur">Horreur</label>
            <input id="Drame" type="checkbox" name="genre[]" value="Drame"><label for="Drame">Drame</label>
            <input id="Romance" type="checkbox" name="genre[]" value="Romance"><label for="Romance">Romance</label>
            <input id="Aventure" type="checkbox" name="genre[]" value="Aventure"><label for="Aventure">Romance</label>
            <input id="Comédie" type="checkbox" name="genre[]" value="Comédie"><label for="Comédie">Romance</label>
        </fieldset>
        <fieldset>
            <legend>Quelle snack au cinéma préférez vous ?</legend>
            <input id="Popcorn" type="radio" name="snack" value="Popcorn"><label for="Popcorn">Popcorn</label>
            <input id="Glace" type="radio" name="snack" value="Glace"><label for="Glace">Glace</label>
            <input id="Chips" type="radio" name="snack" value="Chips"><label for="Chips">Chips</label>
        </fieldset>

        <fieldset>
            <legend>Quelle est votre code postal ?</legend>
            <select name="postal" id="">
                <option value="31000">31000</option>
                <option value="31100">31100</option>
                <option value="31200">31200</option>
                <option value="31300">31300</option>
                <option value="31400">31400</option>
                <option value="31500">31500</option>
            </select>
        </fieldset>
        <input type="submit" name="envoyer" value="Envoyer">
    </form>
    <p>Login:<?php echo $login ?></p>
    <p>Password:<?php echo $password ?></p>
    <p>Genre :<?php echo $genre ?></p>
    <p>Snack :<?php echo $snack ?></p>
    <p>Code Postal :<?php echo $postal ?></p>
    
</body>
</html>