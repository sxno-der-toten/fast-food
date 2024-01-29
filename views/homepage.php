<div class="categories">
    <a href='?page=category&category_id=1' class="category-button">PIZZAS</a>
    <a href='?page=category&category_id=2' class="category-button">BURGERS</a>

    <?php

    if (isset($_SESSION['is_admin']) &&  $_SESSION['is_admin'] === 1) {
        echo '<a href="?page=admin" class="category-button">ADMINISTRATION</a>';
    } else {
        echo '<br>' . 'Pas admin';
    }
    ?>
</div>