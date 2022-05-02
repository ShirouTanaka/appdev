<html>
    <?php
        session_start();
        include 'connect.php';
        $current_user_id= $_SESSION['user_id'];
    ?>
    <head>
        <title>Add Section Members</title>
        <meta charset="UTF-8">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS STYLES -->
        <style>
            body{
                overflow-x: hidden;
            }
            ::-webkit-scrollbar{
                width: 8px;
            }
            ::-webkit-scrollbar-thumb{
                background-color: #ff5f5f;
                border-radius: 15px;
            }
            ::-webkit-scrollbar-thumb:hover{
                background-color: #F84646;
            }
            #navbar-body{
                position: fixed;
                top: 0%;
                height: 13%;
                left: 0%;
                right: 0%;
                background-color: #F84646;
                border-bottom-right-radius: 15px;
                border-bottom-left-radius: 15px;
                box-shadow: 0px 7px 4px rgba(0, 0, 0, 0.25);
                border: 1.5px solid #ffffff;
                z-index: 2;
            }
            #navbar-body #logo{
                position: absolute;
                left: 1.4%;
                top: -7%;
                max-width: auto;
                height: 105%;
            }
            #navbar-body #profilepic{
                position: absolute;
                right: 1.4%;
                width: 4.9%;
                top: 6.2%;
                height: 80%;
                border-radius: 50%;
                background-color: gray;
                border: 3px solid white;
                transition: 0.2s ease-in-out;
            }
            #navbar-body #profilepic:hover{
                cursor: pointer;
            }
            #navbar-body #profilepic:active{
                transform: scale(0.96);
            }
            #navbar-body #username{
                position: absolute;
                top: 7%;
                right: 8%;
                width: 80%;
                font-size: 2.2vw;
                color: white;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                text-align: right;
                user-select: none;
            }
            #navbar-body #mail{
                position: absolute;
                top: 53%;
                right: 8%;
                width: 80%;
                font-size: 1.5vw;
                color: white;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 300;
                text-align: right;
                user-select: none;
            }
            /*TABS SELECTION*/
            #viewsection{
                position: fixed;
                left: 0%;
                top: 5%;
                width: 20%;
                height: 15%;
                background-color: #F02222;
                z-index: 1;
                opacity: 0.8;
                border-bottom-right-radius: 15px;
                border-bottom-left-radius: 15px;
                box-shadow: 0px 7px 4px rgba(0, 0, 0, 0.25);
                display: flex;
                align-items: center;
                border: 1.5px solid white;
                justify-content: center;
                transition: 0.2s ease-in-out;
            }
            #viewsection #viewsection-text{
                position: absolute;
                bottom: 2%;
                font-size: 2.3vw;
                color: white;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 300;
                user-select: none;
                text-align: center;
            }
            #viewsection:hover{
                cursor: pointer;
            }
            /* EDIT AND LOGOUT CARD */
            #rightcard{
                position: fixed;
                right: 1.5%;
                top: 8%;
                width: 5%;
                height: 0%; /*23%*/
                background-color: #F02222;
                z-index: 1;
                opacity: 0.9;
                border: 1px solid white;
                border-bottom-left-radius: 15px;
                border-bottom-right-radius: 15px;
                box-shadow: 0px 7px 4px rgba(0, 0, 0, 0.25);
                display: flex;
                transition: 0.2s ease-in-out;
                align-items: center;
                justify-content: center;
            }
            #rightcard #edit{
                position: absolute;
                top: 35%;
                max-width: auto;
                height: 20%;
                transition: 0.2s ease-in-out;
                opacity: 0;
            }
            #rightcard #edit:hover{
                cursor: pointer;
            }
            #rightcard #edit:active{
                transform: scale(0.96);
            }
            #rightcard #logout{
                position: absolute;
                top: 68%;
                left: 30%;
                max-width: auto;
                height: 20%;
                transition: 0.2s ease-in-out;
                opacity: 0;
            }
            #rightcard #logout:hover{
                cursor: pointer;
            }
            #rightcard #logout:active{
                transform: scale(0.96);
            }
            /*BODY PROPER*/
            #pagemast{
                position: absolute;
                left: 10%;
                top: 30%;
                width: 50%;
                font-size: 2.7vw;
                color: black;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 600;
                text-align: left;
                user-select: none;
            }
            #horizontalline{
                position: absolute;
                border-bottom: 2px solid black;
                width: 40%;
                height: 0%;
                left: 10%;
                top: 38%;
            }
            #av-students-wrapper{
                position: absolute;
                right: 100px;
                top: 41%;
                left: 100px;
                max-height: 1200px;
                display: block;
                padding: 1.5em;
            }
            #av-students-wrapper #av-students-mast{
                text-align: center;
                width: 100%;
                display: block;
                margin-left: auto;
                margin-right: auto;
                margin-bottom: 0.5em;
                font-size: 30px;
                color: black;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 600;
                text-align: center;
                user-select: none;
            }
            #av-students-wrapper #av-students-container{
                width: 95%;
                display: block;
                margin-left: auto;
                margin-right: auto;
                margin-bottom: 0.5em;
                max-height: 390px;
                border-radius: 15px;
                border: 3px solid #67B065;
                padding: 1em;
                overflow-x: hidden;
                overflow-y: scroll;
            }
            #av-students-wrapper #av-students-container .av-item{
                border: 2px solid #67B065;
                height: 45px;
                width: 100%;
                margin: 1em auto;
                border-radius: 15px;
                transition: 0.2s ease-in-out;
                display: flex;
                justify-content: space-between;
                opacity: 0.6;
                align-items: center;
            }
            #av-students-wrapper #av-students-container .av-item:hover{
                cursor: pointer;
                opacity: 1;
                box-shadow: -1px 2px 4px rgba(0, 0, 0, 0.25);
            }
            #av-students-wrapper #av-students-container .av-item #student-name{
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                color: black;
                font-size: 1.7em;
                user-select: none;
                margin-left: 0.5em;
            }
            #av-students-wrapper #av-students-container .av-item .checkbox{
                height: 25px;
                width: 23px;
                margin-right: 1.3em;
            }
            #av-students-wrapper #av-submission-container{
                width: 95%;
                margin: 0 auto;
                max-height: 100px;
                padding: 1em;
                display: flex;
                justify-content: flex-end;
            }
            #av-students-wrapper #av-submission-container #submit-button{
                width: 150px;
                height: 40px;
                background-color: #67B065;
                border-radius: 10px;
                border: none;
                color: white;
                outline: none;
                opacity: 0.90;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                font-size: 25px;
                box-shadow: -5px 5px 4px rgba(0, 0, 0, 0.25);
                transition: 0.3s ease-in-out;
            }
            #av-students-wrapper #av-submission-container #submit-button:hover{
                cursor: pointer;
                opacity: 1;
            }
            #av-students-wrapper #av-submission-container #submit-button:active{
                box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.25);
                transform: scale(0.96);
            }
            /*AD WRAPPER*/
            #ad-students-wrapper{
                position: absolute;
                right: 100px;
                top: 120%;
                left: 100px;
                max-height: 1200px;
                display: block;
                padding: 1.5em;
            }
            #ad-students-wrapper #ad-student-mast{
                text-align: center;
                width: 100%;
                display: block;
                margin-left: auto;
                margin-right: auto;
                margin-bottom: 0.5em;
                font-size: 30px;
                color: black;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 600;
                text-align: center;
                user-select: none;
            }
            #ad-students-wrapper #ad-students-container{
                width: 95%;
                display: block;
                margin-left: auto;
                margin-right: auto;
                margin-bottom: 0.5em;
                max-height: 390px;
                border-radius: 15px;
                border: 3px solid #F84646;
                padding: 1em;
                overflow-x: hidden;
                overflow-y: scroll;
            }
            #ad-students-wrapper #ad-students-container .ad-item{
                border: 2px solid #F84646;
                height: 45px;
                width: 100%;
                margin: 1em auto;
                border-radius: 15px;
                transition: 0.2s ease-in-out;
                display: flex;
                justify-content: center;
                opacity: 0.6;
                align-items: center;
            }
            #ad-students-wrapper #ad-students-container .ad-item #ad-student-name{
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                color: black;
                font-size: 1.7em;
                user-select: none;
                margin-left: 0.5em;
            }
            #ad-students-wrapper #ad-students-container .ad-item:hover{
                cursor: pointer;
                opacity: 1;
                box-shadow: -1px 2px 4px rgba(0, 0, 0, 0.25);
            }
            #ad-students-wrapper #ad-submission-container{
                width: 95%;
                margin: 0 auto;
                max-height: 100px;
                padding: 1em;
                display: flex;
                justify-content: flex-end;
            }
            #ad-students-wrapper #ad-submission-container #redo-button{
                width: 150px;
                height: 40px;
                background-color: #F84646;
                border-radius: 10px;
                border: none;
                color: white;
                outline: none;
                opacity: 0.90;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                font-size: 25px;
                box-shadow: -5px 5px 4px rgba(0, 0, 0, 0.25);
                transition: 0.3s ease-in-out;
                margin-right: 0.5em;
            }
            #ad-students-wrapper #ad-submission-container #finalize-button{
                width: 150px;
                height: 40px;
                background-color: #F84646;
                border-radius: 10px;
                border: none;
                color: white;
                outline: none;
                opacity: 0.90;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                font-size: 25px;
                box-shadow: -5px 5px 4px rgba(0, 0, 0, 0.25);
                transition: 0.3s ease-in-out;
            }
            #ad-students-wrapper #ad-submission-container #redo-button:hover{
                cursor: pointer;
                opacity: 1;
            }
            #ad-students-wrapper #ad-submission-container #redo-button:active{
                box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.25);
                transform: scale(0.96);
            }
            #ad-students-wrapper #ad-submission-container #finalize-button:hover{
                cursor: pointer;
                opacity: 1;
            }
            #ad-students-wrapper #ad-submission-container #finalize-button:active{
                box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.25);
                transform: scale(0.96);
            }
            @media screen and (max-width: 700px) {
                /*AV MEDIA QUERIES*/
                #av-students-wrapper #av-students-mast{
                    font-size: 22px;
                }
                #av-students-wrapper #av-students-container{
                    width: 80%;
                }
                #av-students-wrapper #av-students-container .av-item{
                    height: 30px;
                }
                #av-students-wrapper #av-students-container .av-item #student-name{
                    font-size: 1.2em;
                }
                #av-students-wrapper #av-students-container .av-item .checkbox{
                    height: 20px;
                    width: 18px;
                }
                #av-students-wrapper #av-submission-container{
                    justify-content: center;
                    align-items: center;
                    width: 90%;
                }
                #av-students-wrapper #av-submission-container #submit-button{
                    width: 130px;
                    height: 25px;
                    font-size: 19px;
                }
                /*AD MEDIA QUERIES*/
                #ad-students-wrapper{
                    top: 110%;
                }
                #ad-students-wrapper #ad-student-mast{
                    font-size: 22px;
                }
                #ad-students-wrapper #ad-students-container{
                    width: 80%;
                }
                #ad-students-wrapper #ad-students-container .ad-item{
                    height: 30px;
                }
                #ad-students-wrapper #ad-students-container .ad-item #ad-student-name{
                    font-size: 1.2em;
                }
                #ad-students-wrapper #ad-submission-container{
                    justify-content: center;
                    align-items: center;
                    width: 90%;
                }
                #ad-students-wrapper #ad-submission-container #redo-button{
                    width: 130px;
                    height: 25px;
                    font-size: 19px;
                }
                #ad-students-wrapper #ad-submission-container #finalize-button{
                    width: 130px;
                    height: 25px;
                    font-size: 19px;
                }
            }
        </style>
    </head>
    <body>
        <!-- NAVBAR -->
        <div id="navbar-body">
            <img src="images/smallerlogo.png" id="logo" alt="hashlearn logo"/>
            <div onclick="profileClick()" id="profilepic"></div>
            <span id="username">
                <?php
                    $fName = $_SESSION['f_name'];
                    $mName = $_SESSION['m_name'];
                    $lName = $_SESSION['l_name'];
                    echo $lName.", ".$fName." ".$mName;
                ?>
            </span>
            <Span id="mail">
                <?php
                    echo $_SESSION['email'];
                ?>
            </Span>
        </div>
        <!-- TABS SELECTION BENEATH -->
        <div id="viewsection" onclick="navButtonHandle('view section')">
            <span id="viewsection-text">BACK TO ASSIGNMENTS</span>
        </div> 
        <!-- RIGHT CARD EDIT PROFILE AND LOGOUT -->
        <div id="rightcard">
            <img src="images/edit.png" id="edit" alt="edit profile"/>
            <a href="login.php"><img src="images/logout.png" id="logout" alt="logout profile"/></a>
        </div>
        
        <!-- BODY PROPER -->

        <?php 
            $section_id = $_COOKIE['section_id'];
            $sectionNum = $_COOKIE['student_count'];

            $sql_query_section   = "
                SELECT *
                FROM sections
                WHERE section_id = $section_id
                ";
            
            $result_section = mysqli_query($con, $sql_query_section);
            $section = mysqli_fetch_assoc($result_section);
        ?>

        <span id="pagemast">ADD SECTION MEMBERS (<?php Print $section["section_name"]?>)</span>
        <div id="horizontalline"></div>
        <form id="av-students-wrapper" method="POST">
            <span id="av-students-mast">AVAILABLE STUDENTS</span>
            <div id="av-students-container">
                <?php

                    // Select students who do not have a section yet;

                    $sql_query_students = "
                        SELECT *, users.user_id AS id
                        FROM users 
                        LEFT JOIN user_section ON user_section.user_id = users.user_id
                        WHERE user_section.user_id IS NULL
                    ";
                    $result_students = mysqli_query($con, $sql_query_students);

                    while($row = mysqli_fetch_assoc($result_students)) {
                        Print '<div class="av-item">';
                            Print '<span id="student-name">'.$row["l_name"].', '.$row["f_name"].' '.$row["m_name"].'</span>';
                            Print '<input type="checkbox" class="checkbox" name="studentitem[]" value="'.$row["id"].'"';
                            if (!empty($_POST['studentitem'])) {
                                if (in_array($row["id"], $_POST['studentitem'])) {
                                    Print 'checked';
                                }
                            }
                            Print '>';
                        Print '</div>';
                    }
                ?>
            </div>
            <div id="av-submission-container">
                <input type="submit" value="ADD MEMBERS" id="submit-button" name="submit_btn">
            </div>
        </form>
        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){




                if(!empty($_POST['studentitem'])){
                    Print '<div id="ad-students-wrapper">';
                        Print '<span id="ad-student-mast">ADDED STUDENTS</span>';
                        Print '<div id="ad-students-container">';
                            foreach($_POST['studentitem'] as $value){
                                #Print '<div class="ad-item">';
                                #    Print '<span id="ad-student-name">'.$value.'</span>';
                                #Print '</div>';

                                $sql_query_student = "
                                    SELECT *
                                    FROM users 
                                    WHERE user_id = $value
                                    ";
                                $result_student = mysqli_query($con, $sql_query_student);
                                $student = mysqli_fetch_assoc($result_student);

                                Print $student["l_name"].', '.$student["f_name"].' '.$student["m_name"].'<br>';
                            }
                        Print '</div>';
                        Print '<div id="ad-submission-container">';
                            Print '<button id="redo-button" onclick="confirmreselect()">RESELECT</button>';
                            Print '<button id="finalize-button" onclick="confirmation()">FINALIZE</button>';
                        Print '</div>';
                    Print '</div>';
                }else{
                    echo '<script>alert("Atleast one student should be added to the section");</script>';
                }
            }
        ?>
    </body>
</html>
<script>
    var flag = false;
    function navButtonHandle(tag){ // FOR NAVBUTTON ANIMATION AND MOUSE EVENT HANDLING
        if(tag === "view section"){
            document.getElementById("viewsection").style.top = "7%";
            document.getElementById("viewsection").style.opacity = "1";

            window.location.assign("teachspecsection.php");
        }
    }

    function profileClick(){ // WHEN CLICKING USER PROFILE
        if(flag === false){ // TURN TO TRUE THEN EXTEND
            document.getElementById("rightcard").style.height = "23%"
            document.getElementById("logout").style.opacity = "1";
            document.getElementById("edit").style.opacity = "1";

            flag = true; // RIGHT CARD IS NOW EXTENDED

        }else if(flag === true){
            document.getElementById("rightcard").style.height = "0%"
            document.getElementById("logout").style.opacity = "0";
            document.getElementById("edit").style.opacity = "0";

            flag = false; // RIGHT CARD IS NOT EXTENDED
        }
    }

    function confirmreselect(){
        let text = "Do you want to reselect section members?";
        if(confirm(text)){
            window.location.assign("teachaddsecmembers.php");
        }
    }

    function confirmation(){
        let text = "Finalize and return to assignments page?";
        if(confirm(text)){
            const form = document.getElementById("av-students-wrapper");
            form.action = "addstudent.php";
            form.submit();
        }
    }
</script>