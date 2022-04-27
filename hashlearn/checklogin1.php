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
        //this is the area for the username and password validation
        $sql_query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($con, $sql_query);

        //checking whether the username and password corresponds to the database
        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);

            //checks whether entered credentials are correct
            if($row['username'] === $username && $row['password'] === $password){
                //pls help with how to use the $_SESSION properly
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['f_name'] = $row['f_name'];
                $_SESSION['m_name'] = $row['m_name'];
                $_SESSION['l_name'] = $row['l_name'];
                $_SESSION['section'] = $row['section'];
                $_SESSION['icon'] = $row['icon'];
                $_SESSION['user_type'] = $row['user_type'];

                //now to check the user_type for proper redirection
                if($_SESSION['user_type'] === 'student'){
                    echo "going to student page";
                    header('Location: studentHome.php');
                    exit();
                }

                if($_SESSION['user_type'] === 'professor'){
                    echo "going to instructor page";
                    header('Location: teachHome.php');
                    exit();
                }
                
                //not sure if the exit() should be here
                exit();
            }

            //when credentials are wrong
            else{
                echo "Incorrect username or password";
            }
        }
    }
?>