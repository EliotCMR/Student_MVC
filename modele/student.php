<?php

require_once('ConnexionBdd.php');

class Student
{
    // Class Project : qui permet de gérer nos projets

    public int $id;
    public string $school_year_id;
    public $project_id;
    public $firstname;
    public $lastname;
    public $email;
    public $created_at;
    public $updated_at;
    private $pdo;

    public function __construct()
    {
        $this->pdo = getPdo(); // il se connecter à la bdd
    }

    public function all()
    {
        $sql = "select id, school_year_id, project_id, firstname, lastname, email, created_at, updated_at from student";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    public function insert()
    {
        $sql = 'insert into student (school_year_id, project_id, firstname, lastname, email, created_at, updated_at) from student';
        $sql = $sql . ' values (:school_year_id, :project_id, :firstname, :lastname, :email, :created_at, :updated_at)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':school_year_id', $this->school_year_id);
        $stmt->bindParam(':project_id', $this->project_id);
        $stmt->bindParam(':firstname', $this->firstname);
        $stmt->bindParam(':lastname', $this->lastname);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':created_at', $this->created_at);
        $stmt->bindParam(':updated_at', $this->updated_at);
        $stmt->execute();
        $this->id = $this->pdo->lastInsertId();
        $this->select($this->id);
    }

    public function update()
    {
        $sql = 'update project set school_year_id:school_year_id, project_id:project_id, firstname:firstname, lastname:lastname, email:email, created_at:created_at, updated_at:updated_at from student';
        $sql = $sql . ' where id = :id ';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':school_year_id', $this->school_year_id);
        $stmt->bindParam(':project_id', $this->project_id);
        $stmt->bindParam(':firstname', $this->firstname);
        $stmt->bindParam(':lastname', $this->lastname);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':created_at', $this->created_at);
        $stmt->bindParam(':updated_at', $this->updated_at);
        $stmt->execute();
        $this->select($this->id);
    }

    public function select(int $id)
    {
        $sql = "select id, school_year_id, project_id, firstname, lastname, email, created_at, updated_at from student";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $stmt->bindParam(':id', $id);
        $data = $stmt->fetch();
        $this->school_year_id = $data['school_year_id'];
        $this->project_id = $data['project_id'];
        $this->firstname = $data['firstname'];
        $this->lastname = $data['lastname'];
        $this->email = $data['email'];
        $this->created_at = $data['created_at'];
        $this->updated_at = $data['updated_at'];
    }

    public function delete(int $id)
    {
        $sql = 'delete from student where id= :id from student';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
