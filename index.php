<?php

require_once('vue/head.php');
require('modele/ConnexionBdd.php');
//resetDb();

$basedir = dirname($_SERVER['PHP_SELF']);
$uri = $_SERVER['REQUEST_URI'];
$route = str_replace($basedir,'',$uri);

$table = $_GET['table'] ?? '';
$id = intval($_GET['id'] ?? -1);
$op = $_GET['op'] ?? '';


if ($table === 'tag' || $table === '') {
    require('controller/TagController.php');

    /*require('modele/Tag.php');
    $tag = new Tag();
    $tag->name = 'test1';
    $tag->description = 'test1';


    if ($op === 'delete') {
        if($id > 0) {
            $tag->delete($id);
            $tags = $tag->all();
            require_once('vue/tag_supprime.php');
            require_once('vue/tag_liste.php');
        }

    }   else $tags = $tag->all();
        require_once('vue/tag_liste.php');*/
}

if ($table === 'project' || $table === '') {
    require('controller/ProjectController.php');
}

require_once('vue/foot.php');
