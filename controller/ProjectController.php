<?php

require_once('modele/project.php');

if ($op === 'delete') {
    if ($id > 0) {
        $project = Project::select($id);
        try {
            Project::delete($project->id);
            $project = null;
        }   catch (PDOException $deletePdoException) {
        }
        $projects = Project::all();
        require_once('vue/project_liste.php');
    }
} else {
    $projects = Project::all();
    require_once('vue/project_liste.php');
}