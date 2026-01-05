<?php
$style = './public/style/style.css';
$script = 'script.js';

$request = $_SERVER['REQUEST_URI'];
$request = strtok($request, '?');

switch($request){
    case '/':
    case '/accueil':
        include './views/view_header.php';
        include './views/view_index.php';
        include './views/view_footer.php';
        break;
    case '/galerie':
        include './controller/galerie.php';
        break;
    case '/contact':
        include './controller/contact.php';
        break;
    case '/presentation':
        include './controller/presentation.php';
        break;
    default:
        include './views/view_header.php';
        include './views/view_index.php';
        include './views/view_footer.php';
        break;
}