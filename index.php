<?php
require_once('vue/head.php');
require_once('model/db_connect.php');
//resetDb(); // Sert à recharger les tags

$table = $_GET['table'] ?? '';
$id = $_GET['id'] ?? null;
$op = $_GET['op'] ?? ''; //operation deleted

// Le contrôleur permet de modifier l'affichage des pages sans avoir recours à des pages supplémentaires

if (isset($_GET['research'])) {
  $search = trim(filter_input(INPUT_GET, 'research', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
  require_once('controller/SearchController.php');
} else {
  switch ($table) {
    case 'tag':
      require('controller/TagController.php');
      break;
    case 'student':
      require('controller/StudentController.php');
      break;
    case 'project':
      require('controller/ProjectController.php');
      break;

    default:
      require('vue/content_index.php');
      break;
  }
}

require_once('vue/foot.php');
