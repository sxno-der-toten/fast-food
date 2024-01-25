

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/index.css">
    <link rel="stylesheet" type="text/css" href="assets/layout.css">
</head>
<body>

<div class="bandeau">
        <a href="panier.php"><button id='panier'>PANIER (<span id='nombreArticle'><?= isset($_SESSION['panier']) ? count($_SESSION['panier']) :  0 ?></span>)</button></a>
        <div class="background"></div>
        <a href="#contact">CONTACT</a>

        <?php
        if (isset($_SESSION['nickname'])) {
            echo '<a href="logout.php">' . $_SESSION['nickname'] . '</a>';

            if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === 1) {
                echo '<a href="admin.php">ADMINISTRATION</a>';
            }

        } else {
            echo '<a href="login.php">CONNEXION</a>';
            echo '<a href="register.php">INSCRIPTION</a>';
        }
        ?>

        <a href= '?page=homepage'><img class="logo" src="assets/images/logo.png" alt="Logo"></a>
    </div>


<?php include 'controller/' . $route . '_controller.php'; ?>

    <?php include 'include/footer.php'; ?>
</body>
</html>