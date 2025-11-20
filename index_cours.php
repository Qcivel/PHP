<?php
    /*TOUS LE PHP S'ECRIT ETRE CES 2 BALISES 
     (Bloc de commentaire) */

    //Déclaration d'une variable
    //ATTENTION : chaque instruction doit se terminer ABSOLUMENT par le point-virgule
    $affichage = "<p>LOREM IPSUM DOLORIS TATATI TATATA</p>";

    //CONSEIL : avant de programmer, réfléchir aux étapes à mettre en place
    //1) Demander le nom de l'utilisateur
    //2) Traiter le nom reçu
    // 2.1 vérifier que c'est pas vide
    // 2.1.1 Si c'est vide, j'nvoie un message d'erreur
    // ...
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello World !</h1>
    <?php //Ici je peux écrire du PHP (commentaire sur une ligne)
        echo $affichage; // echo sert à afficher le contenu d'une varibale
    ?>

    <h1>LES TYPAGES EN PHP</h1>
    <h2>Les types primitifs : valeur unique</h2>
    <ul>
        <li>STRING qui s'écrivent entre " " ou ' '</li>
        <li>INTEGER les nombre entier : 4 ; 5 ; etc.</li>
        <li>FLOAT les nombre à virgule :  4.5 ; 6.3 ; etc.</li>
        <li>BOOLEAN les booléen : true  ou  false</li>
        <li>NULL qui définit une valeur non-définie</li>
    </ul>

    <h2>Les types complexes : Collection de valeur</h2>
    <ul>
        <li>ARRAY : les tableaux [0, 1, "Bonjour", true]</li>
        <li>ARRAY : les tableaux associatifs ['clé1' => 'valeur', 'clé2' => 'valeur2']</li>
        <li>OBJECT : les objets {'clé1' => 'valeur', 'clé2' => 'valeur'}</li>
    </ul>

</body>
</html>

<?php
    /*TOUS LE PHP S'ECRIT ETRE CES 2 BALISES */
    echo "<br>Voici un affichage en dehors du HTML";

    print_r("<br>Une seconde affichage");

    $monObjet = [
        'prenom' => 'Yoann',
        'nom' => 'Depriester'
    ];

    echo '<br>'.$monObjet['prenom'];

    //Gettype : retourne le typage d'une valeur
    gettype("Hello World !"); // -> ça retourne 'string', mais ça n'affiche pas 'string'
    echo gettype("Hello World !");
?>