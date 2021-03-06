<?php

require_once('ConnexionBdd.php');

class Project
{
    // Class Project : qui permet de gérer nos projets

    public int $id;
    public string $name;
    public $descripiton;
    public $client_name;
    public $start_date;
    public $checkpoint_date;
    public $delivery_date;
    private $pdo;

    public function __construct()
    {
        $this->pdo = getPdo(); // il se connecter à la bdd
    }

    public function all()
    {
        $sql = "select id, name, description, client_name, start_date, checkpoint_date, delivery_date from project";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    public function insert()
    {
        $sql = 'insert into project (name, description, client_name, start_date, checkpoint_date, delivery_date) from project';
        $sql = $sql . ' values (:name, :description, :client_name, :start_date, :checkpoint_date, :delivery_date)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':client_name', $this->client_name);
        $stmt->bindParam(':start_date', $this->start_date);
        $stmt->bindParam(':checkpoint_date', $this->checkpoint_date);
        $stmt->bindParam(':delivery_date', $this->delivery_date);
        $stmt->execute();
        $this->id = $this->pdo->lastInsertId();
        $this->select($this->id);
    }

    public function update()
    {
        $sql = 'update project set name:name, description:description, client_name:client_name, start_date:start_date, checkpoint_date:checkpoint_date, delivery_date:delivery_date from project';
        $sql = $sql . ' where id = :id ';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':client_name', $this->client_name);
        $stmt->bindParam(':start_date', $this->start_date);
        $stmt->bindParam(':checkpoint_date', $this->checkpoint_date);
        $stmt->bindParam(':delivery_date', $this->delivery_date);
        $stmt->execute();
        $this->select($this->id);
    }

    public function select(int $id)
    {
        $sql = "select id, name, description, client_name, start_date, checkpoint_date, delivery_date from project";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $stmt->bindParam(':id', $id);
        $data = $stmt->fetch();
        $this->name = $data['name'];
        $this->description = $data['description'];
        $this->client_name = $data['client_name'];
        $this->start_date = $data['start_date'];
        $this->checkpoint_date = $data['checkpoint_date'];
        $this->delivery_date = $data['delivery_date'];
    }

    public function delete(int $id)
    {
        $sql = 'delete from project where id= :id from project';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
