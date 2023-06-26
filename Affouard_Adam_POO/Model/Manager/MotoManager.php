<?php

class MotoManager extends DbManager{

    public function getAll() {
        $query = $this->pdo->prepare("SELECT * FROM shop");
        $query->execute();
        $results = $query->fetchAll();

        $motos = [];

        foreach ($results as $res) {
            $uniqFileName = "public/images/null.png";
            if (!is_null($res["image"])) {
                $uniqFileName = $res["image"];
            }

            $motos[] = new Moto($res['id'], $res['brand'], $res['model'], $res['type'], $uniqFileName);
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

    public function add(Moto $moto)
    {

        $brand = $moto->getBrand();
        $model = $moto->getModel();
        $type = $moto->getType();
        $image = $moto->getImage();

        $query = $this->pdo->prepare(
            "INSERT INTO shop (brand, model, type, image) VALUES
                    (:brand, :model, :type, :image)");

        $query->execute(
            [
                "Brand" => $brand,
                "Model" => $model,
                "Type" => $type,
                "Image" => $image]);

        $moto->setId($this->pdo->lastInsertId());

        return $moto;
    }

    public function delete($id){
        $query = $this->pdo->prepare("DELETE FROM shop WHERE id=:id");
        $query->bindParam("id", $id);
        $query->execute();
    }


}
