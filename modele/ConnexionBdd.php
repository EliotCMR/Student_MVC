<?php

require_once('env.php');

$bdd_username = $bdd_username ?? 'src_mariadb';
$bdd_password = $bdd_password ?? 'src_mariadb';
$bdd_host = $bdd_host ?? 'localhost';
$bdd_port = $bdd_port ?? 3306;
$bdd_dbname = $bdd_dbname ?? 'src_mariadb';

// DSN : Data Source Name
$dsn = "mysql:host=$bdd_host;port=$bdd_port;dbname=$bdd_dbname;charset=UTF8";

$options =
    [
        PDO::ATTR_ERRMODE =>
        PDO::ERRMODE_EXCEPTION,

        PDO::ATTR_DEFAULT_FETCH_MODE =>
        PDO::FETCH_ASSOC
    ];

// PDO : PHP Data Objects

try {
    $pdo = new PDO($dsn, $bdd_username, $bdd_password, $options);
} catch (PDOException $e) {
    echo "Erreur connection à la base de données<br>";
    echo $e->getCode() . ' ' . $e->getMessage() . '<br>';
    http_response_code(500);
    $pdo = null;
}

function getPdo()
{
    global $pdo;
    return $pdo;
}

function resetDb()
{
    global $pdo;
    $sql = file_get_contents('modele/student.sql');
    $pdo->exec($sql);
}
