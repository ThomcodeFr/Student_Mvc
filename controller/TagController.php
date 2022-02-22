<?php
require('modele/Tag.php');
$tag = new Tag();
/* $tag->name = 'test1';
    $tag->description = 'test2';
     $tag->insert();
    $tag->name='update';
    $tag->update(); */

function validForm($tag)
{
  if (!isset($_POST['nom'])) {
    return false;
  }
  $temp = trim(filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS)); // trim enlève les espaces


  if ($temp === "") {
    return false;
  }
  $tag->name = $temp;

  $tag->description = null;
  if (isset($_POST['description'])) {
    $tag->description = trim(filter_input(INPUT_POST, "description", FILTER_SANITIZE_FULL_SPECIAL_CHARS));
  }
  if ($tag->description === "") {
    $tag->description = null;
  }
  return true;
}

switch ($op) {
  case 'delete': {
      if ($id > 0) {
        $tag->delete($id);
        $tags = $tag->all();
        require_once('vue/tag_delete.php');
        require_once('vue/tag_liste.php');
        break;
      } else {
        $tags = $tag->all();
        require_once('vue/tag_liste.php');
        break;
      }
    }
  case 'update': {
      if ($id > 0) {
        if (empty($_POST)) {
          $tag->select($id);
          require_once('vue/tag_update.php');
        }
      }
      break;
    }
  case 'valid':
    if ($id > 0) {
      if (empty($_POST)) {
        $tag->select($id);
        require_once('vue/tag_update.php');
      } else {
        $tag->select($id);
        if (validForm($tag)) {
          $tag->update();
        }
        $tags = $tag->all();
        require_once('vue/tag_liste.php');
      }
    }
    case 'insert':
      if ($id > 0) {
        if (empty($_POST))
        require_once('vue/tag_add.php');
      } else {
      if (validForm($tag)) {
        $tag->insert();
      }
      $tags = $tag->all();
      require_once('vue/tag_liste.php');

      }
    break;

  default:
    $tags = $tag->all();
    require_once('vue/tag_liste.php');
    break;
}

/*

    if ($op === 'delete') {
        if ($id > 0) {
            $tag->delete($id);
            $tags = $tag->all();
            require_once('vue/tag_delete.php');
            require_once('vue/tag_liste.php');

        }
    } else {
        $tags = $tag->all();
        require_once('vue/tag_liste.php');
    }
 */
