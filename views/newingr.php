<link rel="stylesheet" type="text/css" href="./assets/newingr.css">
<title>Ajouter un ingrédient</title>
<h2>Ajouter un ingrédient</h2>
<form action="" method="post">
    <label for="name">Nom </label>
    <input type="text" id="name" name="name" required><br>

    <label for="poids">Poids </label>
    <input type="text" id="poids" name="poids" required><br>

    <label for="glucides">Glucides </label>
    <input type="text" id="glucides" name="glucides" required><br>

    <label for="lipides">Lipides </label>
    <input type="text" id="lipides" name="lipides" required><br>

    <label for="proteines">Proteines </label>
    <input type="text" id="proteines" name="proteines" required><br>

    <input type="submit" value="Ajouter">

    <div class='retour-div'>
        <a class ='retour' href="?page=admin">Retour</a>
    </div>
    
</form>