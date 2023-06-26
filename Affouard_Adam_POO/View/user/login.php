<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>

<div class="container">

    <a href="index.php?controller=default&action=home" class="btn btn-primary">Revenir en arrière</a>


    <h1>Me connecter !!</h1>

    <form method="post">
        <div class="col-md-12">
            <label for="username">Username *</label>
            <input id="username" type="text" name="username"
                   class="form-control
                    <?php  if(array_key_exists('username', $errors)){echo('is-invalid');}?>"
                   value="<?php  if(array_key_exists("username",$_POST)){echo($_POST["username"]);}?>">

            <div class="invalid-feedback">
                <?php  if(array_key_exists("username", $errors)){echo($errors["username"]);}?>
            </div>
        </div>



        <div class="col-md-12">
            <label for="password">Mot de passe *</label>
            <input id="password" type="password"
                   name="password"
                   class="form-control  <?php  if(array_key_exists('password', $errors)){echo('is-invalid');}?>">
            <div class="invalid-feedback">
                <?php  if(array_key_exists("password", $errors)){echo($errors["password"]);}?>
            </div>
        </div>


        <input type="submit" class="btn btn-success m-2">

    </form>

    <?php require 'View/parts/footer.php'; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>