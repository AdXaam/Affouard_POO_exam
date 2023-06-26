<?php

class MotoController {
    private $mc;

    public static $allowedMotos = [
        "Yamaha",
        "Honda",
        "Kawasaki",
        "KTM",
        "Suzuki",
        "Harley-Davidson",
        "Ducati",
        "Triumph",
    ];

    public static $allowedType = [
        "Sport",
        "Enduro",
        "Custom",
        "Roadster"
    ];

    public static $allowedPicture = [
        "image/jpeg",
        "image/png"
    ];

    public function __construct(){

        $this->mc = new MotoManager();
    }

    public function displayAll(){
        $motos = $this->mc->getAll();
        require 'View/moto/list.php';
    }

    public function displayOne($id){
            $moto = $this->mc->getOne($id);

            if(is_null($moto)){
                header("Location: index.php?controller=default&action=not-found");
            }
            require 'View/moto/detail.php';
        }
    public function ajout(){

        $errors = [];

        if($_SERVER["REQUEST_METHOD"] == 'POST'){
            $errors = $this->checkForm();

            if(count($errors) == 0){
                $uniqFileName = null;
                // Ici je vais gérer l'upload de fichier
                if(!in_array($_FILES["picture"]["type"], self::$allowedPicture)){
                    $errors["picture"] = "Je n'accepte ce fichier veuillez ajouter une image";
                }
                if($_FILES["picture"]["error"] != 0){
                    $errors["picture"] = 'Erreur de l\'upload';
                }
                if($_FILES["picture"]["size"] > 1000000){
                    $errors["picture"] = "Le fichier est trop gros";
                }

                $extension = explode('/',$_FILES["picture"]["type"])[1];
                $uniqFileName = uniqid().'.'.$extension;
                move_uploaded_file($_FILES["picture"]["tmp_name"], "public/images/".$uniqFileName);
            }

            if(count($errors) == 0){
                $motos = new Moto(null, $_POST["brand"],
                    $_POST["model"], $_POST["type"], $uniqFileName);
                $this->mc->add($motos);
                header("Location: index.php?controller=moto&action=list");
            }
            // Si il est valide je vais enregiestrer mes données puis rediriger l'utilisateur
        }

        require "View/moto/add.php";
    }

    private function checkForm(){
        $errors = [];
        if(empty($_POST["model"])){
            $errors["model"] = 'Veuillez saisir le modèle de la moto';
        }

        if(strlen($_POST["model"])>250){
            $errors["model"] = "Le nom est trop long (250 caractères maximum)";
        }

        if(!in_array($_POST["brand"], self::$allowedMotos)){
            $errors["brand"] = "Cette marque n'est pas autorisée";
        }


        return $errors;
    }

    public function delete($id)
    {
        $moto = $this->mc->getOne($id);

        if (is_null($moto)) {
            header('Location: index.php?controller=default&action=notFound');
        } else {
            unlink("public/images/" . $moto->getImage());
            $this->mc->delete($moto->getId());
            header("Location: index.php?controller=moto&action=list");
        }
    }
}
