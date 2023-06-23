<?php

class DefaultController{


    public function home(){

        require 'View/home.php';
    }
    public function notFound(){
        http_response_code(404);
        require 'View/error/404.php';
    }
}
