<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Ingrédient</title>
</head>
<body>
    <h2>Ajouter un Ingrédient</h2>
    <form action="" method="post">
    <label for="name">Nom de l'ingrédient :</label>
    <input type="text" id="name" name="name" required><br>

    <label for="poids">Poids (en g) :</label>
    <input type="number" id="poids" name="poids" required><br>

    <label for="glucides">Glucides :</label>
    <input type="number" id="glucides" name="glucides" required><br>

    <label for="lipides">Lipides :</label>
    <input type="number" id="lipides" name="lipides" required><br>

    <label for="proteines">Proteines :</label>
    <input type="number" id="proteines" name="proteines" required><br>

    <input type="submit" value="Ajouter">
</form>

</body>
</html>