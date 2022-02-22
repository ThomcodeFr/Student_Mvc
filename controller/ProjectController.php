<?php

if ($table === 'project' || $table === ''); {
    require('modele/Project.php');
    $project = new Project();

    if ($op === 'delete') {
        if ($id > 0) {
            $project->delete($id);
            $projects = $project->all();
            require_once('vue/project_delete.php');
            require_once('vue/project_liste.php');
        }
    } else {
        $projects = $project->all();
        require_once('vue/project_liste.php');
    }
}
