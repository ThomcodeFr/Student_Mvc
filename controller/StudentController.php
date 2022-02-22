<?php

require('modele/Student.php');
$student = new Student();

function validForm($student)
{
  if (!isset($_POST['firstname'])) {
    return false;
  }
  $temp = trim(filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_FULL_SPECIAL_CHARS)); // trim enlève les espaces

  if ($temp === "") {
    return false;
  }
  $student->firstname = $temp;

  if (!isset($_POST['lastname'])) {
    return false;
  }
  $temp = trim(filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_FULL_SPECIAL_CHARS)); // trim enlève les espaces

  if ($temp === "") {
    return false;
  }
  $student->lastname = $temp;

  if (!isset($_POST['email'])) {
    return false;
  }
  $temp = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS)); // trim enlève les espaces

  if ($temp === "") {
    return false;
  }
  $student->email = $temp;
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
        if (validForm($student)) {
          $student->update();
        }
        $students = $student->all();
        require_once('vue/student_liste.php');
      }
    }
    break;

  default:
    $students = $student->all();
    require_once('vue/student_liste.php');
}


/* if ($table === 'student' || $table === ''); {
    require('modele/Student.php');
    $student = new Student();

    if ($op === 'delete') {
        if ($id > 0) {
            $student->delete($id);
            $students = $student->all();
            require_once('vue/student_delete.php');
            require_once('vue/student_liste.php');
        }
    } else {
        $students = $student->all();
        require_once('vue/student_liste.php');
    }
} */
