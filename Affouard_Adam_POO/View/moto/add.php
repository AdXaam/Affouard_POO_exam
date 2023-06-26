<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<?php require 'View/parts/header.php'; ?>

<div class="container">
    <h1>Ajouter une moto !!</h1>

    <a href="index.php?controller=moto&action=list" class="btn btn-primary">Retour</a>

    <form method="post" enctype="multipart/form-data" class="row">

        <div class="col-md-12 mt-3">
            <label for="brand" class="form-label">Marque de la moto</label>
            <select class="form-select
                 <?php if(array_key_exists("brand", $errors)){echo('is-invalid');}?>" name="brand" id="brand">
                <option  value="">Pas d'infos</option>
                <?php
                foreach (MotoController::$allowedMotos as $moto){
                    $selected = '';
                    if(array_key_exists("brand",$_POST) && $_POST["brand"] == $moto){
                        $selected = 'selected';
                    }
                    echo('<option '.$selected.' value="'.$moto.'">'.$moto.'</option>');
                }
                ?>
            </select>
            <div class="invalid-feedback">
                <?php if(array_key_exists("brand", $errors)){echo($errors["brand"]);}?>
            </div>
        </div>

        <div class="col-md-12 mt-3">
            <label for="model" class="form-label">Modèle</label>
            <input type="text" class="form-control" name="model" id="model"></input>
        </div>

        <div class="col-md-12 mt-3">
            <label for="type" class="form-label">Type</label>
            <select class="form-select
                 <?php if(array_key_exists("type", $errors)){echo('is-invalid');}?>" name="type" id="type">
                <option  value="">Pas d'infos</option>
                <?php
                foreach (MotoController::$allowedType as $type){
                    $selected = '';
                    if(array_key_exists("type",$_POST) && $_POST["type"] == $type){
                        $selected = 'selected';
                    }
                    echo('<option '.$selected.' value="'.$type.'">'.$type.'</option>');
                }
                ?>
            </select>
            <div class="invalid-feedback">
                <?php if(array_key_exists("type", $errors)){echo($errors["type"]);}?>
            </div>
        </div>

        <div class="col-md-12 mt-3">
            <label for="picture" class="form-label">Photo</label>
            <input type="file" name="picture" class="form-control
            <?php if(array_key_exists("picture", $errors)){echo('is-invalid');}?>" id="picture">
            <div class="invalid-feedback">
                <?php if(array_key_exists("picture", $errors)){echo($errors["picture"]);}?>
            </div>
        </div>


        <input type="submit" class="btn btn-success m-2">

    </form>

    <?php require 'View/parts/footer.php'; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>