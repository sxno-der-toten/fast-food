<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="homepage.css">
    <title>Document</title>
    <style>
        
.background-rectangle {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #333;
    z-index: -1;
}
    </style>
</head>
<body>
    <?php include 'layout.html'; ?>

    <div class="background-rectangle"></div>

    <section class="rass">
        <div class="background"></div>
        <?php include 'card.html'; ?>
    </section>
</body>
</html>
