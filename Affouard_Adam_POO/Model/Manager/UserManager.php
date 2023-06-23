<?php

class UserManager extends DbManager{

    public function getByUsername($username){
        $query = $this->pdo->prepare(
            "SELECT * FROM user WHERE username = :username");
        $query->bindParam("username", $username);

        $query->execute();
        $res = $query->fetch();

        $user = null;
        if($res != false){
            $user = new User($res["id"], $res["username"],
                $res["nom"], $res["prenom"],
                $res["password"]);
        }

        return $user;
    }

}
