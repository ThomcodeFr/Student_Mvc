<?php

if ($table === 'student' || $table === ''); {
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
}
