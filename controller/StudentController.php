<?php

require('modele/Student.php');
$student = new Student();

function validForm($student)
{
  if (!isset($_POST['firstname'])) {
    return "Le champ Prénom est manquant";
  }
  $temp = trim(filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_FULL_SPECIAL_CHARS)); // trim enlève les espaces

  if ($temp === "") {
    return "Erreur : Champ prénom invalide";
  }
  $student->firstname = $temp;

  if (!isset($_POST['lastname'])) {
    return "Le champ Nom est manquant";
  }
  $temp = trim(filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_FULL_SPECIAL_CHARS)); // trim enlève les espaces

  if ($temp === "") {
    return "Champ Nom invalide";
  }
  $student->lastname = $temp;

  if (!isset($_POST['email'])) {
    return  "Champ email invalide";
  }
  $temp = trim(filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)); // trim enlève les espaces

  if ($temp === "") {
    return "Le champ email est manquant";
  }
  $student->email = $temp;

  if (!isset($_POST['school_year_id'])) {
    return "Le champ ID de l'année scolaire est manquant";
  }
  $temp = filter_input(INPUT_POST, "school_year_id", FILTER_VALIDATE_INT);

  if ($temp === false or is_null($temp)) {
    return "Le champ du School Year ID est manquant ou incorrect";
  }
  $student->school_year_id = $temp;

  return true;
}

switch ($op) {
  case 'delete': {
      if ($id > 0) {
        $student->delete($id);
        $students = $student->all();
        require_once('vue/student_delete.php');
        require_once('vue/student_liste.php');
        break;
      } else {
        $students = $student->all();
        require_once('vue/student_liste.php');
        break;
      }
    }
  case 'update': {
      if ($id > 0) {
        if (empty($_POST)) {
          $student->select($id);
          require_once('vue/student_update.php');
        }
      }
      break;
    }
  case 'valid':
    if ($id > 0) {
      if (empty($_POST)) {
        $student->select($id);
        require_once('vue/student_update.php');
      } else {
        $student->select($id);
        $testForm = validForm($student);
        if ($testForm === true) {
          $student->update();
          $students = $student->all();
          require_once('vue/student_liste.php');
        } else {
          $errorMessage = $testForm;
          require 'vue/error.php';
          require 'vue/student_update.php';
        }
      }
    }
  case 'insert':
      if (empty($_POST)) {
        require 'modele/SchoolYear.php';
        $school_year = new SchoolYear();
        $school_years = $school_year->all();
        require_once('vue/student_add.php');
      } else {
      if (ValidForm($student)) {
        $student->insert();
      }
      $students = $student->all();
      require_once('vue/student_liste.php');
    }
    break;

  default:
    $students = $student->all();
    require_once('vue/student_liste.php');
}
