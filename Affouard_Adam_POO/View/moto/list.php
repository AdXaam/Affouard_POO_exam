<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<?php require 'View/parts/header.php'; ?>

<div class="container">
    <h1>Les motos !!!!!!!!!!!</h1>
    <a href="index.php?controller=default&action=home" class="btn btn-primary">Revenir en arrière</a>
    <br>
    <a href="index.php?controller=moto&action=add" class="btn btn-success">Ajouter une moto</a>


    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Marque</th>
            <th scope="col">Modèle</th>
            <th scope="col">Type</th>
            <th scope="col">Image</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($motos as $moto){
            ?>
            <tr>
                <th scope="row"><?php echo($moto->getId()) ?></th>
                <td><?php echo($moto->getBrand()) ?></td>
                <td><?php echo($moto->getModel()) ?></td>
                <td><?php echo($moto->getType()) ?></td>
                <td><img style="max-height: 50px" src="public/images/<?php echo($moto->getImage()) ?>" alt="une moto"></td>
                <td>
                    <a href="index.php?controller=moto&action=detail&id=<?php echo($moto->getId());?>" class="btn btn-info">
                        Voir plus</a>

                    <a href="index.php?controller=moto&action=delete&id=<?php echo($moto->getId());?>" class="btn btn-info">Supprimer la moto</a>

                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <?php require 'View/parts/footer.php'; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>