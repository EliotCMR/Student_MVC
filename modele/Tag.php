<?php


require_once('ConnexionBdd.php');

class Tag
{
    // Class Project : qui permet de gérer nos projets

    public int $id;
    public string $name;
    public $descripiton;
    private $pdo;

    public function __construct()
    {
        $this->pdo = getPdo(); // il se connecter à la bdd
    }

    public function all()
    {
        $sql = "select id, name, description from tag";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();

        return $data;
    }

    public function insert()
    {
        $sql = 'insert into project (name, description) from tag';
        $sql = $sql . ' values (:name, :description)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':description', $this->description);
        $stmt->execute();
        $this->id = $this->pdo->lastInsertId();
        $this->select($this->id);
    }

    public function update()
    {
        $sql = 'update project set name:name, description:description from tag';
        $sql = $sql . ' where id = :id ';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':description', $this->description);
        $stmt->execute();
        $this->select($this->id);
    }

    public function select(int $id)
    {
        $sql = "select id, name, description from tag";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $stmt->bindParam(':id', $id);
        $data = $stmt->fetch();
        $this->name = $data['name'];
        $this->description = $data['description'];
    }

    public function delete(int $id)
    {
        $sql = 'delete from project where id= :id from tag';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
