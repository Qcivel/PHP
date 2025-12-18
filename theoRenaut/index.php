<?php
$style='./public/style/style.css';
$script = 'script.js';
include './utils/functions.php';
include './views/view_header.php' ;
include './views/view_index.php' ;
include './views/view_footer.php' ;
// include './model/model_cms.php' ;

// $request = $_SERVER['REQUEST_URI'];

// // On enlève les paramètres éventuels (?id=3 etc)
// $request = strtok($request, '?');

// switch($request){
//     case '/theoRenaut/':
//     case '/theoRenaut/accueil':
//         include './views/view_index.php';
//         break;

//      case '/theoRenaut/galerie':
//         include './controller/galerie.php';
//         break;


//     default : echo "erreur";
// }
?>
