<?php

require_once('ConnexionBdd.php');

class Project
{
    // Class Project : qui permet de gérer nos projets

    public int $id;
    public string $name;
    public string $descripiton;
    public string $client_name;
    public string $start_date;
    public string $checkpoint_date;
    public string $delivery_date;
    private static $pdo;

    public function __construct()
    {
        self::init();
    }

    public static function init()
    {
        if (is_null(self::$pdo)) self::$pdo = getPdo();
    }

    public static function all()
    {
        self::init();
        $sql = "select id, name, description, client_name, start_date, checkpoint_date, delivery_date, from project";
        $stmt = self::$pdo->prepare($sql); // Syntaxe
        // Executer
        $data = $stmt->fetchAll(); // Récupère tout
        return $data;
    }

    public function insert()
    {
        $sql = 'insert into project (name, description, client_name, start_date, checkpoint_date, delivery_date)';
        $sql = $sql . ' values (:name, :description, :client_name, :start_date, :checkpoint_date, :delivery_date)';
        $stmt = self::$pdo->prepare($sql);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':client_name', $this->client_name);
        $stmt->bindParam(':start_date', $this->start_date);
        $stmt->bindParam(':checkpoint_date', $this->checkpoint_date);
        $stmt->bindParam(':delivery_date', $this->delivery_date);
        $stmt->execute();
        $this->id = self::$pdo->lastInsertId();
        $this->select($this->id);
    }

    public function update()
    {
        $sql = 'update project set name:name, description:description, client_name:client_name, start_date:start_date, checkpoint_date:checkpoint_date, delivery_date:delivery_date';
        $sql = $sql . ' where id = :id ';
        $stmt = self::$pdo->prepare($sql);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':client_name', $this->client_name);
        $stmt->bindParam(':start_date', $this->start_date);
        $stmt->bindParam(':checkpoint_date', $this->checkpoint_date);
        $stmt->bindParam(':delivery_date', $this->delivery_date);
        $stmt->execute();
        $this->select($this->id);
    }
}
