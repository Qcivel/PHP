<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo $style ?>">
</head>
<body>
    <nav class="navbar">
        <div class="menu-container">
            <details>
                <summary>
                    <img class="imgBurgerMenu" src="/theoRenaut/public/image/menu(1).png" alt="menu">
                </summary>
                    <ul class="menu">
                        <a href="/theoRenaut/controller/galerie.php"><li>Galerie</li></a>
                        <a href="/theoRenaut/controller/presentation.php"><li>Présentation</li></a>
                        <a href="/theoRenaut/controller/contact.php"><li>Contact</li></a>
                        <a href="/theoRenaut/controller/cms.php"><li>CMS</li></a>
                        <li>Services</li>
                    </ul>
            </details>
        </div>
        <div class="logo"><a href="/theoRenaut/index.php">Théo Renaut</a></div>
        <ul class="contact">
            <li><a href="/theoRenaut/controller/login.php"><img src="/theoRenaut/public/image/contact.png" alt="contact"></a></li>
            <li><a href="#"><img src="/theoRenaut/public/image/shopping-bag.png" alt="shop"></a></li>
        </ul>
    </nav>