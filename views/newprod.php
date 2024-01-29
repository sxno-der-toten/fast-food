<link rel="stylesheet" type="text/css" href="./assets/newprod.css">
<title>Ajouter Produit</title>
<h2>Ajouter un Produit</h2>


<form action="" method="post" enctype="multipart/form-data">
    <label for="name">Nom </label>
    <input type="text" id="name" name="name" required><br>

    <label for="category_id">Catégorie </label>
    <select id="category_id" name="category_id" required>
        <option value="1">Pizza</option>
        <option value="2">Burger</option>
    </select><br>

    <label for="description">Description </label>
    <textarea id="description" name="description" required></textarea><br>

    <label for="price">Prix </label>
    <input type="number" id="price" name="price" required><br>

    <label for="image_url">Image_url </label>
    <input type="file" id="image_url" name="image_url" required><br>

    <label for="purchase_price">Prix d'achat </label>
    <input type="number" id="purchase_price" name="purchase_price" required><br>

    <input type="submit" value="Ajouter">

    <div class='retour-div'>
        <a class ='retour' href="?page=admin">Retour</a>
    </div>
</form>
