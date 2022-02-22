<?php

require_once('modele/Tag.php');

if ($op === 'delete') {
    if ($id > 0) {
        $tag = Tag::select($id);
        try {
            Tag::delete($tag->id);
            $tag = null;
        }   catch (PDOException $deletePdoException) {
        }
        $tags = Tag::all();
        require_once('vue/tag_supprime.php');
        require_once('vue/tag_liste.php');
    }
} else {
    $tags = Tag::all();
    require_once('vue/tag_liste.php');
}