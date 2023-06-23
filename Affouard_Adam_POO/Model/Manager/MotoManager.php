<?php

class MotoManager extends DbManager{

    public function getAll() {
        $query = $this->pdo->prepare("SELECT * FROM shop");
        $query->execute();
        $results = $query->fetchAll();

        $motos = [];

        foreach ($results as $res){
            $motos[] = new Moto($res['id'], $res['brand'],
                $res['model'],
                $res['type'],
                $res['image']);
        }
        return $motos;
    }

    public function getOne($id){
        $query =$this->pdo->prepare("SELECT * FROM shop WHERE id = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        $res = $query->fetch();

        $moto = null;
        if($res){
            $moto = new Moto($res['id'], $res['brand'], $res['model'],
                $res["type"], $res["image"]);
        }

        return $moto;
    }
}
