<?php
abstract class DbManager{
    protected $pdo;
    private $dbName = 'moto';
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';

    public function __construct(){
        try {
            $this->pdo = new PDO("mysql:dbname=".$this->dbName.";host=".$this->host,$this->user,$this->password);
        } catch (PDOException $e){
            throw $e;
        }
    }
}