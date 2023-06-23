<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<?php
require "View/parts/header.php"
?>

<div class="container">
    <div class="row d-flex mt-3">
        <div class="col-md-6 text-center">
            <h2>Marque : <?php echo($moto->getBrand()) ?></h2>
            <h2>Modèle : <?php echo($moto->getModel()) ?></h2>
            <h2>Type : <?php echo($moto->getType()) ?></h2>
            <button onclick="window.history.back()" class="btn btn-primary">Retour</button>


        </div>


        <div class="col-md-6 border">
            <img class="img-fluid" src="public/images/<?php echo($moto->getImage()) ?>">


        </div>
    </div>
</div>

<?php
require "View/parts/footer.php"
?>

</html>
