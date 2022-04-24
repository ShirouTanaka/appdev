<?php
    $login_error = "<script>alert('Incorrect username or password');</script>";
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

    //applying the data validation to make sure that the string is formatted
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    //this is the area for the username and password validation
    $sql_query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($con, $sql_query);

    //checking whether the username and password corresponds to the database
    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);

        //checks whether entered credentials are correct
        if($row['username'] === $username && $row['password'] === $password){
            //pls verify if $_SESSION is utilized properly
            $_SESSION['user_id'] = $row['user_id']; //user_id is used for other processes
            $_SESSION['username'] = $row['username']; //debateable
            $_SESSION['f_name'] = $row['f_name']; //needed
            $_SESSION['m_name'] = $row['m_name']; //needed
            $_SESSION['l_name'] = $row['l_name']; //needed
            $_SESSION['section'] = $row['section']; //section is used as a reference to what section is displayed
            $_SESSION['icon'] = $row['icon']; //debataeble
            $_SESSION['user_type'] = $row['user_type']; //important for redirection
            //add more that are important or relevant

            //now to check the user_type for proper redirection
            if($_SESSION['user_type'] === 'student'){
                header("Location: studentHome.php");
                // echo "going to student page";
                exit();
            }

            if($_SESSION['user_type'] === 'professor'){
                header("Location: teachhome.php");
                // echo "going to instructor page";
                exit();
            }
                
            //not sure if the exit() should be here
            exit();
        }
    }
    else{
        // header("Location: login.php");
        echo '<script>window.location.href="login.php";
        alert("Incorrect username or password");
        </script>';
        exit();
    }
?>