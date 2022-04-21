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

<html>
    <head>
        <title>Login Page</title>
        <meta charset="UTF-8">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS STYLES -->
        <style>
            body{
                overflow-x: hidden;
                overflow-y: hidden;
            }
            /*RIGHT SIDE*/
            #right-container{
                position: absolute;
                right: 0%;
                top:0%;
                width: 47%;
                height: 100%;
                background: url("images/login right.png");
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center center;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
            }
            #right-container #icon{
                position: relative;
                max-width: auto;
                height: 11%;
                margin-bottom: -30px;
            }
            #right-container #sublogo{
                position: relative;
                max-width: auto;
                height: 27%;
            }
            #right-container #text{
                position: relative;
                width: 80%;
                font-size: 2.2vw;
                color: white;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 300;
                text-align: center;
                user-select: none;
            }
            /*LEFT SIDE*/
            #left-container{
                position: absolute;
                left: 0%;
                top:0%;
                width: 53%;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                box-shadow: 10px 0px 4px rgba(0, 0, 0, 0.25);
            }
            #left-container #mast{
                position: relative;
                font-size: 3.5vw;
                color: black;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                text-align: center;
                user-select: none;
                margin-bottom: 2px;
            }
            #left-container #submast{
                position: relative;
                width: 70%;
                font-size: 2.2vw;
                color: black;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 300;
                text-align: center;
                user-select: none;
                margin-bottom: 10px;
            }
            #left-container #form-wrapper{
                position: relative;
                width: 90%;
                height: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                margin-bottom: 15px;
            }
            #left-container #form-wrapper #form-proper{
                position: relative;
                width: 95%;
                margin-top: 4%;
                height: 13%;
            }
            
            #left-container #form-wrapper #form-proper #submit-button{
                width: 100%;
                height: 100%;
                position: absolute;
                left: 0%;
                top: 0%;
                background-color: #F12929;
                border-radius: 15px;
                border: none;
                color: white;
                opacity: 0.90;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                font-size: 2vw;
                box-shadow: -10px 10px 4px rgba(0, 0, 0, 0.25);
                transition: 0.3s ease-in-out;
            }
            #left-container #form-wrapper #form-proper #submit-button:hover{
                opacity: 1;
                cursor: pointer;
            }
            #left-container #form-wrapper #form-proper #submit-button:active{
                box-shadow: 0px 0px 0px black;
                transform: scale(0.96);
            }

            #left-container #form-wrapper .inputs{
                position: absolute;
                width: 91%;
                height: 100%;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                color: black;
                border: none;
                font-size: 2vw;
                background: transparent;
                outline: none;
                border-radius: 10px;
            }

            #left-container #form-wrapper #username{
                position: relative;
                border: 2px solid #aaa9a9;
                height: 13%;
                width: 95%;
                border-radius: 15px;
                margin-bottom: 5%;
            }
            #left-container #form-wrapper #username #username-icon{
                position: absolute;
                left: 1%;
                top: 5%;
                max-width: auto;
                height: 90%;
            }
            #left-container #form-wrapper #password{
                position: relative;
                border: 2px solid #aaa9a9;
                height: 13%;
                width: 95%;
                border-radius: 15px;
                margin-bottom: 5%;
            }
            #left-container #form-wrapper #password #password-icon{
                position: absolute;
                left: 1%;
                top: 5%;
                max-width: auto;
                height: 90%;
            }
            /*KNOW MORE*/
            #left-container #bottom-wrapper{
                position: relative;
                width: 80%;
                height: 15%;
            }
            #left-container #bottom-wrapper #bottom-text{
                position: absolute;
                left: 50%;
                top: 10%;
                font-family: 'Barlow Condensed', sans-serif;
                font-size: 1.5vw;
                color: black;
                font-weight: 300;
                text-align: center;
                transform: translate(-50%, -50%);
            }
            #left-container #bottom-wrapper #icon-container{
                position: absolute;
                top: 73%;
                left: 50%;
                height: 50%;
                width: 50%;
                transform: translate(-50%, -50%);
                display: flex;
                align-items: center;
                justify-content: center;
            }
            #left-container #bottom-wrapper #icon-container .icons{
                position: relative;
                max-width: auto;
                height: 75%;
                padding: 20px;
            }
        </style>
    </head>
    <body>
        <div id="right-container">
            <img src="images/icon.png" id ="icon" alt="Logo icon"/>
            <img src="images/sublogo.png" id="sublogo" alt="SUB LOGO"/>
            <span id="text">A computer science centered school application to streamline coding activities and assessments for students and teachers</span>
        </div>
        <!-- LEFT CONTAINER -->
        <div id="left-container">
            <span id="mast">WELCOME!</span>
            <span id="submast">Log in to Hashlearn Philippines as Student or Instructor</span>
            <div id="form-wrapper">
                <div id="username" style="margin-bottom: 5%;">
                    <img src="images/user.png" id="username-icon" alt="username-icon"/>
                </div>
                <div id="password" style="margin-bottom: 5%;">
                    <img src="images/password.png" id="password-icon" alt="password-icon"/>
                </div>
                <form action="login.php" method="POST" id="form-proper">
                    <input type="text" class="inputs" name="username" style="left: 8%; top:-450%;" placeholder="Enter username" required>
                    <input type="text" class="inputs" name="password" style="left: 8%; top:-256%;" placeholder="Enter password" required>
                    <input type="submit" id="submit-button" value="SIGN IN">
                </form>
            </div>
            <div id="bottom-wrapper">
                <span id="bottom-text">Know more about us through the following <span style="color: #F12929;">services</span></span>
                <div id="icon-container">
                    <img src="https://cdn-icons-png.flaticon.com/512/300/300221.png" class="icons" alt="google"/>
                    <img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" class="icons" alt="twitter"/>
                    <img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" class="icons" alt="facebook"/>
                </div>
            </div>
        </div>
    </body>
</html>