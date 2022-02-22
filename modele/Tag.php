<?php


require_once('ConnexionBdd.php');


class Tag
{
    // Class Tag : qui permet de gérer nos tags

    public int $id;
    public string $name;
    public string $descripiton;
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
        $sql = "select id, name, description from tag";
        $stmt = self::$pdo->prepare($sql); // Syntaxe
        $stmt->execute(); // Executer
        $data = $stmt->fetchAll(); // Récupère tout
        return $data;
    }


    public function insert()
    {
        $sql = 'insert into tag (name, description)';
        $sql = $sql . ' values (:name, :description)';
        $stmt = self::$pdo->prepare($sql);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':description', $this->description);
        $stmt->execute();
        $this->id = self::$pdo->lastInsertId();
        $this->select($this->id);
    }


    public function update()
    {
        $sql = 'update tag set name:name, description:description';
        $sql = $sql . ' where id = :id ';
        $stmt = self::$pdo->prepare($sql);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':id', $this->description);
        $stmt->execute();
        $this->select($this->id);
    }


    public static function select(int $id)
    {
        self::init();
        $sql = 'select id, name, description from tag where id = :id';
        $stmt = self::$pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch();
        $tag = new Tag();
        $tag->id = $data['id'];
        $tag->name = $data['name'];
        $tag->description = ['description'];
        return $tag;
    }


    public static function delete(int $id)
    {
        self::init();
        $sql = 'delete from tag where id= :id'; // On delete un tag bien préciser pas son id
        $stmt = self::$pdo->prepare($sql);
        $stmt->bindParam(':id', $id); // Sert à gérer les caracères spéciaux (nom, prénom, accent...)
        $stmt->execute(); // Executer
    }
}
