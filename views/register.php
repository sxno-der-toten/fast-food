    <title>Inscription</title>
    <link rel="stylesheet" type="text/css" href="./assets/register.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />

</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="" method="post">
        <h3>Inscription</h3>

        <label for="nickname">Nom d'utilisateur :</label>
        <input type="text" placeholder="Nom d'utilisateur" id="nickname" name="nickname"><br>

        <label for="email">E-mail :</label>
        <input type="text" placeholder="E-mail" id="email" name="email"><br>

        <label for="password">Mot de passe</label>
        <input type="password" placeholder="Mot de passe" id="password" name="password">

        <button class="log">OK</button>
        <a href="index.php" class="retour">Retour</a>

    </form>
</body>
</html>