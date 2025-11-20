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
        <h1>Les Functions</h1>
            <script>
                // En JS les variables peuvent être atteintent par les fonctions
                const A = "Constante";
                function echo(){
                    console.log(A); //Afficher Constante dans la console
                }

                echo();
            </script>

            <?php
                //En PHP, les variables ne peuvent pas être appelées par les fonctions
                $a = "Constante";

                function affichage(){
                    echo $a; // -> Erreur, les variables déclarées à l'extérieur d'une fonction ne sont pas exploitable au sein de la dite fonction
                }

                //affichage();

                //Version Corrigé :
                function affichage2($param, $param2 = 'Valeur par Défaut'){ // ici $param2 possède une valeur par défaut, ce qui le rend optionnelle
                    echo '<p>'.$param.' + '.$param2.'</p>';
                }

                affichage2($a); // pas de second paramètre, mais affichera Constante + Valeur par Défaut
                affichage2($a,"Hello World !"); //va afficher Constante + Hello World !
            ?>
</main>
</body>
</html>