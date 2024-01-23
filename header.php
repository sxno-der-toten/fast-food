<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="layout.css">
</head>
<body>
    <div class="bandeau">
        <a href="panier.php"><button id='panier'>Panier<span id='nombreArticle'><?= isset($_SESSION['panier']) ? count($_SESSION['panier']) : 0 ?></span></button></a>
        <div class="background"></div>
        <a href="#contact">CONTACT</a>
        <a href="#home">HOME</a>
        <img class="logo" src="assets/images/logo.png" alt="Logo">
    </div>
</body>
</html>