<?php

require_once('modele/Tag.php');

$tag = new Tag();
switch ($op) {
    case 'delete':
        if ($id > 0) {
            $tag->delete($id);
            $tag = $tag->all();
            require_once('./vue/tag_liste.php');
            require_once('./vue/tag_supprime.php');
            break;
        }
    case 'update':
        if ($id > 0) {
            $tag->select($id);
            require_once('./vue/tag_update.php');
            break;
        }
    case 'maj':
        $tag->select($id);
        $tag->name = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $tag->name = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $tag->update();
        header('location::index.php');
        $tags = $tag->all();
        require_once('./vue/tag_liste.php');
        break;

    default:
        $tags = $tag->all();
        require_once('./vue/tag_liste.php');
        break;
}
