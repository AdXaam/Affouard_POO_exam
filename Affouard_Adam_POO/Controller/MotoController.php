<?php

class MotoController{
    private $mc;

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

}
