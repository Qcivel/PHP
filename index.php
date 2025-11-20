<?php
    ini_set('display_errors', '1');
    error_reporting(E_ALL);
    $number= 5;
    $name= "Quentin";
    $bool=true;
    
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
    <?php
        echo $number;
        gettype($number);
        echo gettype($number);
        echo $name;
        echo gettype($bool);
    
    /*Créer une variable $sasha, qui contient "pikachu"*/
    $sasha= "pikachu";
    
/*Créer une variable $pierre, qui contient "onyx"*/
    $pierre= "onyx";
/*Faites en sorte que $sasha et $pierre s'échange leur pokémon*/
    $save = $pierre;
    $pierre= $sasha;
    $sasha = $save;
    echo "<p>$pierre</p>";
    echo "<p>$sasha</p>";


    //Exercice 3 
//-Créer 3 variables $a, $b et $c qui ont pour valeur $a =5, $b =3 et $c = $a+$b,
    $a = 5;
    $b = 3;
    $c = $a+$b;

    echo "<p>-Afficher la valeur de chaque variable (utilisez la fonction echo).</p>";
        echo "<p>$a</p>";
        echo "<p>$b</p>";
        echo "<p>$c</p>";    

    echo "<p>-passer la valeur de $a à 2,</p>";
    $a = 2; 
//
    echo "<p>-Afficher la valeur de $a,</p>";
    echo $a;
//-passer la valeur de $c à $b - $a,
    $C = $b - $a; 

//-Afficher la valeur de chaque variable (utilisez la fonction echo).
    echo "<p>$a</p>";
    echo "<p>$b</p>";
    echo "<p>$c</p>";

    //Exercice 4 :
//-Ecrire un programme qui prend le prix HT d’un article, le nombre d’articles et le taux de TVA, et qui fournit le prix total TTC correspondant.
    $prix_article = 20;
    $nombre_article = 5;
    $prix_HT = $prix_article * $nombre_article;
    $tva = 1.196;
    $prix_ttc = $prix_HT * ($tva);
    
//-Afficher le prix HT, le nbr d’articles et le taux de TVA (utilisez la fonction echo),
    echo "<p>$prix_HT</p>";
    echo "<p>$nombre_article</p>";
    echo "<p>$tva</p>";
//-Afficher le résultat (utilisez la fonction echo).
    echo "<p>$prix_ttc</p>";
//NOTE : le prix TTC = prixHT * (1 + tauxTVA)

//Exercice 5 :
//-Créer 1 variable $a qui a pour valeur « bon »,
    $a = 'bon';
//-Créer 1 variable $b qui a pour valeur « jour »,
    $b = 'jour';
//-Créer 1 variable $c qui a pour valeur 10,
    $c = 10;
//-Concaténer $a, $b et $c +1,
    $bonjour = $a.$b.$c+1;
    
//-Afficher le résultat de la concaténation.
    echo "<p>$bonjour</p>";

    echo "<p>Exercice 6 :</p>";
//-Créer une variable $a qui a pour valeur bonjour,
    $a = "bonjour";
//-Afficher un paragraphe (balise html) et à l’intérieur les mots suivants :l’adrar,
    echo "<p> l'adrar </p>";
//-Ajouter la variable $a avant la phase dans le paragraphe,
    echo "<p>$a l'adrar </p>";
//-Cela doit donner :
//<p>bonjour l’adrar</p>

echo "<p>Exercice 7</p>";
//-Créer une fonction qui soustrait à $a la variable $b (2 paramètres en entrée),
    function soustraction ($a,$b){
        $result = $a-$b;
        return $result;
    };
    
//-la fonction doit renvoyer le résultat de la soustraction $a-$b (return).
    echo soustraction(10,5);

    echo "<p>Exercice 8</p>";
//Créer une fonction qui prend en entrée un nombre à virgule (float),
    function virgule($a){
        return round ($a);
    };
//la fonction doit renvoyer l’arrondi (return) du nombre en entrée.
echo virgule(2.5);

echo "<p>Exercice 9</p>";
//Créer une fonction qui prend en entrée 3 valeurs et renvoie la somme des 3 valeurs.
    function addition ($a,$b,$c){
        return $a+$b+$c;
    };

    echo addition(1,2,3);

echo "<p>Exercice 10</p>";
//-Créer une fonction qui teste si un nombre est positif ou négatif (echo dans la page web).
    function test ($a){
        if ( $a > 0 ){
            echo "<p>le nombre est positif </p>";
        }
        if ( $a < 0 ){
            echo "<p>le nombre est négatif </p>";
        }
    };

echo test(-1);

echo "<p>Exercice 11</p>";
//-Créer une fonction qui prend en entrée 3 valeurs et retourne le nombre le plus grand (echo dans la page web).

    function plus_grand ($a,$b,$c){
        if (( $a >= $b ) && ( $a >= $c )) {
            echo "<p>$a est le plus grand </p>";
        }
        if (( $b >= $a ) && ( $b >= $c )) {
            echo "<p>$b est le plus grand $a et $c </p>";
        }
        else
            echo "<p>$c est le plus grand $a et $b </p>";
    };

 plus_grand(5,5,1);

echo "<p>Exercice 12</p>";
//Créer une fonction qui prend en entrée 3 valeurs et retourne le nombre le plus petit (echo dans la page web).
    function plus_petit ($a,$b,$c){
        if (( $a <= $b ) && ( $a <= $c )) {
            echo "<p>$a est le plus petit</p>";
        }
        elseif (( $b <= $a ) && ( $b <= $c )) {
            echo "<p>$b est le plus petit </p>";
        }
        else
            echo "<p>$c est le plus petit </p>";
    };

    plus_petit(4,2,1);

echo "<p>Exercice 13</p>";
//-Créer une fonction qui prend en entrée 1 valeur (l’âge d’un enfant). Ensuite, elle informe de sa catégorie (echo dans la page web) :
//x "Poussin" de 6 à 7 ans
//x "Pupille" de 8 à 9 ans
//x "Minime" de 10 à 11 ans
//x "Cadet" après 12 ans

    function age ($a){
        if (( $a >= 6 ) && ( $a <= 7 )) {
            echo "<p>Poussin</p>";
        }elseif (( $a >= 8 ) && ( $a <= 9 )) {
            echo "<p>Pupille</p>";
        }elseif (( $a >= 10 ) && ( $a <= 11 )) {
            echo "<p>Minime</p>";
        }elseif ($a > 12){
            echo "<p>Cadet</p>";
        }
    };
age(6);
age(8);
age(10);
age(9);
echo "<p>Exercice 14</p>";
function switch_age ($a){
    switch ($a) {
        case (( $a >= 6 ) && ( $a <= 7 )):
            echo "<p>Poussin</p>";
            break;
        case (( $a >= 8 ) && ( $a <= 9 )):
            echo "<p>Pupille</p>";
            break;
        case ($a > 12):
            echo "<p>Cadet</p>";
            break;
    }
};

switch_age(6);

echo "<p>Exercice 15</p>";
//Créer une fonction qui affiche la valeur la plus grande du tableau.
    $tab = array(1,2,3,4);
    
    

    function max_tab($tableau){
        $stockage = $tableau[0];
        foreach($tableau as $maximum) {
            if ($maximum > $stockage ){
                $stockage = $maximum;
            }
        }
        return $stockage;
    };

    echo "<p>la valeur max est :".max_tab($tab). "</p>";
echo "<p>Exercice 16</p>";
    //Créer une fonction qui affiche la moyenne du tableau.

    function somme ($tableau){
        $stockage = 0;
        foreach($tableau as $somme) {
            $stockage += $somme;
        }
        return $stockage;
    };
    echo "<p>La somme du tableau est:" .somme($tab). "</p>";

echo "<p>Exercice 17</p>";
//Créer une fonction qui affiche la valeur la plus petite du tableau.
    function min_tab($tableau){
        $stockage = $tableau[0];
        foreach($tableau as $minimum) {
            if ($minimum < $stockage ){
                $stockage = $minimum;
            }
        }
        return $stockage;
    };

    echo "<p>la valeur min est :".min_tab($tab). "</p>";

echo "<p>Exercice 18</p>";
//Créer un script qui affiche les nombres de 1 -> 5 (méthode echo).
//Version FOR et version WHILE
    for($i = 0; $i<6; $i++) {
        echo "<p> $i</p>";
    }

    $j = 0;
    while($j<6){
        echo "<p> $j</p>";
        $j++;
    }

echo "<p>Exercice 19</p>";
//Ecrire une fonction qui prend un nombre en paramètre (variable $nbr), et qui ensuite affiche les dix nombres suivants. Par exemple, si la valeur de nbr équivaut à : 17, la fonction affichera les nombres de 18 à 27 (méthode echo).Version FOR et version WHILE

    function dix($number){
        for($i = $number+1 ; $i<($number + 11 ); $i++) {
            echo "<p> $i</p>";
        }
    };

    dix(1);

        // $i=$number +1;
        // while ($i< $number +11){
        //     echo "<p>$i</p>";
        //     $i++;
        // }
// }
    // dix(1);
?>

</body>
</html>