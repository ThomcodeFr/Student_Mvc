 <?php
 require_once('model/Student.php');
  $allUsers = $pdo->query('SELECT * FROM student ORDER BY id DESC ');
  $student = new Student;
  //var_dump($student->allStudentAllTags($search));
  $allUsers = $student->allStudentAllTags($search);

  require_once('vue/search.php');
