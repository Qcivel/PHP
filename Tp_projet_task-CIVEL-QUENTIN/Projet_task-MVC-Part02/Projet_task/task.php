<?php
// Démarrer la session
session_start();
var_dump($_SESSION);

include './Model/model_task.php';

// Variable d'affichage
$message = '';
$title = 'Mon Compte Utilisateur';

// Connexion à la BDD
$bdd = new PDO('mysql:host=localhost;dbname=task', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

// Récupérer l'id de l'utilisateur depuis la session



// Vérifier si le formulaire a été soumis
    if (isset($_POST['addTask'])) {
        if (!empty($_POST['name_task']) && !empty($_POST['content_task']) && !empty($_POST['date_task'])) {
            $name_task = htmlentities(stripslashes(strip_tags(trim($_POST['name_task']))));
            $content_task = htmlentities(stripslashes(strip_tags(trim($_POST['content_task']))));
            $date_task = htmlentities(stripslashes(strip_tags(trim($_POST['date_task'])))) . ' 00:00:00';

            
            $message = createTask($bdd, $name_task, $content_task, $date_task, $_SESSION['id']);
                
                
            
        } else {
            $message = 'Veuillez remplir tous les champs.';
        }
    }else {
        $message = 'Erreurs';
    }

// Inclure les vues
include './View/header.php';
include './View/view_task.php';
include './View/footer.php';


?>
