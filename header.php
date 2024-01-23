<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="layout.css">
</head>
<body>
    <div class="bandeau">
        <?php
        session_start();
        ?>
        <a href="panier.php"><button id='panier'>PANIER (<span id='nombreArticle'><?= isset($_SESSION['panier']) ? count($_SESSION['panier']) :  0 ?></span>)</button></a>
        <div class="background"></div>
        <a href="#contact">CONTACT</a>
        <?php
        if (isset($_SESSION['nickname'])) {
            echo '<a href="logout.php">' . $_SESSION['nickname'] . '</a>';
        } else {
            echo '<a href="login.php">CONNEXION</a>';
            echo '<a href="register.php">INSCRIPTION</a>';
        }
        ?>
        <img class="logo" src="assets/images/logo.png" alt="Logo">
    </div>
</body>
</html>
