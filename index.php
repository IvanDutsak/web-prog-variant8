<?php

require_once 'config/config.php';
require_once 'src/Database.php';
require_once 'src/Model.php';
require_once 'src/Course.php';
require_once 'src/Student.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'courses';
$id = isset($_GET['id']) ? intval($_GET['id']) : null;

if ($page === 'courses' && $id === null) {
    require 'views/courses_index.php';
} elseif ($page === 'courses' && $id !== null) {
    require 'views/course_show.php';
} elseif ($page === 'students' && $id === null) {
    require 'views/students_index.php';
} elseif ($page === 'students' && $id !== null) {
    require 'views/student_show.php';
} else {
    require 'views/courses_index.php';
}
