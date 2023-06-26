<?php

class UserController {
    // Manager qui permettra de requêter nos données utilisateur
    private $userManager;
    // Partagé avec les classe enfant c'est l'utilisateur connecté
    protected $currentUser;

    //
    public function __construct()
    {
        session_start();
        $this->userManager = new UserManager();
        $this->currentUser = null;
        if(array_key_exists("user", $_SESSION)){

            $this->currentUser = unserialize($_SESSION["user"]);
        }
    }

    public function logout(){
        session_destroy();
        $this->currentUser = null;

        header('Location: index.php?controller=user&action=login');
    }

    public function login(){
        $errors = [];
        if($_SERVER["REQUEST_METHOD"] == 'POST'){
            if(empty($_POST["username"])){
                $errors["username"] = 'Veuillez saisir un username';
            }

            if(empty($_POST["password"])){
                $errors["password"] = 'Veuillez saisir un mot de passe';
            }

            if(count($errors) == 0){
                $user = $this->userManager->getByUsername($_POST["username"]);

                if(is_null($user) || !password_verify($_POST["password"], $user->getPassword())){
                    $errors["password"] = 'Identifiant ou mot de passe invalid';
                } else {
                    $this->currentUser = $user;
                    $_SESSION["user"] = serialize($user);
                    header('Location: index.php?controller=default&action=home');
                }
            }


        }
        require 'View/user/login.php';
    }
}