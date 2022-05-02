<?php
	session_start();
    include 'connect.php';
    
    $student_ids = $_POST['studentitem'];
    $section_id = $_COOKIE['section_id'];

    foreach($student_ids as $student_id) {
	    $con->query("
	        INSERT INTO user_section (user_id, section_id)
	        VALUES ($student_id, $section_id)
	        ");
    }

    header("Location: teachspecsection.php");
?>