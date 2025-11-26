<?php
// Démarrer la session
session_start();

include './Model/model_task.php';

// Variable d'affichage
$message = '';
$title = 'Mon Compte Utilisateur';

// Connexion à la BDD
$bdd = new PDO('mysql:host=localhost;dbname=task', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

// Récupérer l'id de l'utilisateur depuis la session
$id_user = isset($_SESSION['id_user']) ? (int)$_SESSION['id_user'] : null;

// Vérifier si le formulaire a été soumis
if (isset($_POST['addTask'])) {
    if (!empty($_POST['name_task']) && !empty($_POST['content_task']) && !empty($_POST['date_task'])) {
        $name_task = htmlentities(stripslashes(strip_tags(trim($_POST['name_task']))));
        $content_task = htmlentities(stripslashes(strip_tags(trim($_POST['content_task']))));
        $date_task = $_POST['date_task'] . ' 00:00:00';

        if ($id_user) {
            $message = createTask($bdd, $name_task, $content_task, $date_task, $id_user);

            
        } else {
            $message = 'Utilisateur non connecté.';
        }
    } else {
        $message = 'Veuillez remplir tous les champs.';
    }
}

// Inclure les vues
include './View/header.php';
include './View/view_task.php';
include './View/footer.php';
echo "Mes taches: $name_task $content_task $date_task";

?>
