<?php
    //should work in tandem with the compiler.php where this one would retrieve the file and enter the contents
    include 'connect.php';

    $sql_query = $con->query("SELECT * FROM submissions ORDER BY uploaded_on DESC");

    if($sql_query->num_rows > 0){
        while($row = $sql_query->fetch_assoc()){
            $file_path = "uploads/".$row["file_name"];
            echo readfile($file_path);
        }
    }
        
?>
    

