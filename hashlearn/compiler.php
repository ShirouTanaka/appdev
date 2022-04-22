
<!DOCTYPE html>
<html>
  
<body>
  
    <!-- form to redirect the page
        to C++ online compiler -->
    <form method="post" action=
"https://www.jdoodle.com/api/redirect-to-post/online-compiler-c++">
  
        <textarea name="initScript" 
            rows="8" cols="80">
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
        </textarea>
          
        <input type="submit" value="Test">
    </form>
</body>
  
</html>