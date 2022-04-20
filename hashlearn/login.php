<?php
    session_start();
    include 'connect.php';

    //get the credentials from form associated
    if(isset($_POST['username']) && isset($_POST['password'])) {
        function validate($data) {
            //this area converts the inputted data to html accepted formatting
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    if(empty($username)){
        //when username field is empty
        header("Location:login.php?error=Username is required");
        exit();
    }

    else if(empty($password)){
        //when password field is empty
        header("Location:login.php>error=Password is required");
        exit();
    }

    else{
        //this is now for validation and cross referencing the database for existing account
        $sql_query_student = "SELECT * FROM students WHERE username='$username' AND password='$password'";
        $sql_query_professor = "SELECT * FROM professors WHERE username='$username' AND password='$password'";

        $result_student = mysqli_query($con, $sql_query_student);
        $result_professor = mysqli_query($con, $sql_query_professor);

        //case where student account returns a result
        if(mysqli_num_rows($result_student) === 1){
            $row = mysqli_fetch_assoc($result_student);

            if($row['username' === $username && $row['password'] === $password]){
                //login and redirect to student page
                //not sure how to use $_SESSION properly :(
                //the things under may not be complete 
                $_SESSION['username'] = $row['username'];
                $_SESSION['student_id'] = $row['student_id'];
                $_SESSION['fName'] = $row['fName'];
                $_SESSION['mName'] = $row['mName'];
                $_SESSION['lName'] = $row['lName'];

                //redirects to the student dashboard
                header("Location:studentHome.php");
                exit();
            }

            else{
                header("Location:index.php?error=Incorrect username or password");
                exit();
            }
        }

        //case where professor account returns a result
        else if(mysqli_num_rows($result_professor) === 1){
            $row = mysqli_fetch_assoc($result_professor);

            if($row['username' === $username && $row['password'] === $password]){
                //login and redirect to professor page
                //not sure how to use $_SESSION properly :(
                //the things under may not be complete 
                $_SESSION['username'] = $row['username'];
                $_SESSION['professor_id'] = $row['professor_id'];
                $_SESSION['fName'] = $row['fName'];
                $_SESSION['mName'] = $row['mName'];
                $_SESSION['lName'] = $row['lName'];

                header("Location:professorHome.php");
                exit();
            }

            else{
                header("Location:login.php?error=Incorrect username or password");
                exit();
            }
        }

        else{
            header("Location:login.php?error=Incorrect username or password");
        }
    }
?>
