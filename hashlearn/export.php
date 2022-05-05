<?php
    session_start();
    include 'connect.php';

    function filterData(&$str){ 
        $str = preg_replace("/\t/", "\\t", $str); 
        $str = preg_replace("/\r?\n/", "\\n", $str); 
        if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
    }
    $assCode = $_COOKIE['assignment_code'];
    $filename ="".$assCode."-".$_SESSION['section-name']."-".date('Y-m-d').".xls";


    $fields=array('ASSIGNMENT NAME','SUBMISSION GRADE','FIRST NAME', 'LAST NAME');

    // Display column names as first row 
    $excelData = implode("\t", array_values($fields)) . "\n";
    $section_id = $_COOKIE['section_id'];
    $assignment_id = $_COOKIE['assignment_id'];
    $assignment_code = $_COOKIE['assignment_code'];
    $sql_query_submissions = "
                SELECT *, assignment.assignment_name AS title, assignment.uploaded_on AS assignment_upload_date, submissions.uploaded_on AS submission_upload_date
                FROM submissions
                JOIN user_section ON user_section.user_section_id = submissions.user_section_id
                JOIN assignment ON assignment.assignment_code = submissions.assignment_name
                JOIN users ON users.user_id = user_section.user_id
                WHERE user_section.section_id = $section_id AND assignment.assignment_id = $assignment_id
                ";
    $query = $con->query($sql_query_submissions); 
    if($query->num_rows > 0){ 
        // Output each row of the data 
        while($row = $query->fetch_assoc()){ 
            $lineData = array($row['assignment_name'], $row['submission_grade'],$row["f_name"],$row["l_name"]); 
            array_walk($lineData, 'filterData'); 
            $excelData .= implode("\t", array_values($lineData)) . "\n"; 
        } 
    }else{ 
        echo '<script>alert("NO RECORDS FOUND");</script>'; 
    } 


    // Headers for download 
    header("Content-Type: application/vnd.ms-excel"); 
    header("Content-Disposition: attachment; filename=\"$filename\""); 
    
    // Render excel data 
    echo $excelData; 
    
    exit;
?>