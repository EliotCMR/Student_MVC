<?php

require_once('modele/project.php');

$project = new Project();
switch ($op) {
    case 'delete':
        if ($id > 0) {
            $project->delete($id);
            $project = $project->all();
            require_once('./vue/project_liste.php');
            require_once('./vue/project_supprime.php');
            break;
        }
    case 'update':
        if ($id > 0) {
            $project->select($id);
            require_once('./vue/project_update.php');
            break;
        }
    case 'maj':
        $project->select($id);
        $project->name = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $project->name = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $project->update();
        header('location::index.php');
        $projects = $project->all();
        require_once('./vue/project_liste.php');
        break;

    default:
        $projects = $project->all();
        require_once('./vue/project_liste.php');
        break;
}
