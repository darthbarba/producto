<?php
require '../classes/student.php';

//nuevo objeto x los datos enviados por el form
$newStudent = new Student($_POST['last_name'], $_POST['first_name'], $_POST['career']);

$result = $newStudent->Create();
header("Location: ../get.php?message=".$result);
?>