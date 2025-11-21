<?php
//Démarrer la session
session_start();

//Variable d'affichage
$title = 'Mon Compte Utilisateur';

include './View/header.php';

include './View/view_task.php';

include './View/footer.php';
?>