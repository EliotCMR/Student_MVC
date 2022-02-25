<?php

require_once('modele/student.php');

$student = new Student();
switch ($op) {
    case 'delete':
        if ($id > 0) {
            $student->delete($id);
            $student = $student->all();
            require_once('./vue/student_liste.php');
            require_once('./vue/student_supprime.php');
            break;
        }
    case 'update':
        if ($id > 0) {
            $student->select($id);
            require_once('./vue/student_update.php');
            break;
        }
    case 'maj':
        $student->select($id);
        $student->name = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $student->name = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $student->update();
        header('location::index.php');
        $students = $student->all();
        require_once('./vue/student_liste.php');
        break;

    default:
        $students = $student->all();
        require_once('./vue/student_liste.php');
        break;
}
