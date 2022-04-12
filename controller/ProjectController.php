<?php

require('modele/Project.php');
$project = new Project();

function validForm3($project)
{
  if (!isset($_POST['name_project'])) {
    return "Le champ du Nom du projet est manquant";
  }
  $temp = trim(filter_input(INPUT_POST, "name_project", FILTER_SANITIZE_FULL_SPECIAL_CHARS)); // trim enlève les espaces

  if ($temp === "") {
    return "Erreur : Champ Nom invalide";
  }
  $project->name_project = $temp;

  if (!isset($_POST['description'])) {
    return "Le champ Description est manquant";
  }
  $temp = trim(filter_input(INPUT_POST, "description", FILTER_SANITIZE_FULL_SPECIAL_CHARS)); // trim enlève les espaces

  if ($temp === "") {
    return "Erreur : Champ Description invalide";
  }
  $project->description = $temp;


  if (!isset($_POST['client_name'])) {
    return "Le champ du nom du client est manquant";
  }
  $temp = trim(filter_input(INPUT_POST, "client_name", FILTER_SANITIZE_FULL_SPECIAL_CHARS)); // trim enlève les espaces

  if ($temp === "") {
    return "Erreur : Champ Nom invalide";
  }
  $project->client_name = $temp;

  if (!isset($_POST['delivery_date'])) {
    return "Le champ de la date est manquant";
  }
  $temp = trim(filter_input(INPUT_POST, "delivery_date", FILTER_SANITIZE_FULL_SPECIAL_CHARS)); // trim enlève les espaces

  if ($temp === "") {
    return "Erreur : Champ Nom invalide";
  }
  $project->delivery_date = $temp;

  return true;
}

switch ($op) {
  case 'delete': {
      if ($id > 0) {
        $project->delete($id);
        $projects = $project->all();
        require_once('vue/project_delete.php');
        require_once('vue/project_liste.php');
        break;
      } else {
        $projects = $project->all();
        require_once('vue/project_liste.php');
        break;
      }
    }
  case 'update': {
      if ($id > 0) {
        if (empty($_POST)) {
          $project->select($id);
          require_once('vue/project_update.php');
        }
      }
      break;
    }
  case 'valid':
    if ($id > 0) {
      if (empty($_POST)) {
        $project->select($id);
        require_once('vue/project_update.php');
      } else {
        $project->select($id);
        $testForm = validForm3($project);
        if ($testForm === true) {
          $project->update();
          $projects = $project->all();
          require_once('vue/project_liste.php');
        } else {
          $errorMessage = $testForm;
          require 'vue/error.php';
          require 'vue/project_update.php';
        }
      }
    }
  case 'insert':
    if (empty($_POST)) {
      require_once('vue/project_add.php');
    } else {
      if (validForm3($project)) {
        $project->insert();
      }
      $projects = $project->all();
      require_once('vue/project_liste.php');
    }
    break;

  default:
    $projects = $project->all();
    require_once('vue/project_liste.php');
}
