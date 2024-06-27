<?php
require '../classes/student.php';
$newStudent = new Student($_POST['last_name'], $_POST['first_name'], $_POST['career'], $_POST['idActualizar']);
$result = $newStudent->Update();
header("Location: ../get.php?message=".$result);
?>