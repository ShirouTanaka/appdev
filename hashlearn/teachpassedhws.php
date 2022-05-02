<html>
    <?php
        session_start();
        include 'connect.php';
        $current_user_id= $_SESSION['user_id'];
    ?>
    <head>
        <title>Specific Section</title>
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
                border-radius: 20px;
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
                opacity: 0.9;
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
            #addsection{
                position: fixed;
                left: 20.5%;
                top: 5%;
                width: 20%;
                height: 15%;
                background-color: #F02222;
                z-index: 1;
                opacity: 0.9;
                border-bottom-right-radius: 15px;
                border-bottom-left-radius: 15px;
                box-shadow: 0px 7px 4px rgba(0, 0, 0, 0.25);
                border: 1.5px solid white;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: 0.2s ease-in-out;
            }
            #addsection #addsection-text{
                position: absolute;
                bottom: 2%;
                font-size: 2.3vw;
                color: white;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 300;
                text-align: center;
                user-select: none;
            }
            #addsection:hover{
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
            .submissions-container{
                position: absolute;
                right: 10%;
                left: 10%;
                height: 15%;
                border: 2px solid rgba(0, 0, 0, 0.25);
                border-radius: 20px;
                opacity: 0.7;
                transition: 0.2s ease-in-out;
            }
            .submissions-container .hwcode{
                position: absolute;
                font-size: 2.2vw;
                color: black;
                top: 27%;
                left: 2.3%;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                text-align: left;
                user-select: none;
            }
            .submissions-container .hw-icon{
                position: absolute;
                left: 15%;
                height: 75%;
                top: 13%;
                user-select: none;
                max-width: auto;
            }
            .submissions-container .hw-title{
                position: absolute;
                font-size: 2.3vw;
                color: black;
                top: -2%;
                left: 24%;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 600;
                text-align: left;
                user-select: none;
            }
            .submissions-container .submitted-by{
                position: absolute;
                font-size: 2vw;
                color: black;
                top: 32%;
                left: 24%;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                text-align: left;
                user-select: none;
            }
            .submissions-container .submitted-on{
                position: absolute;
                font-size: 2vw;
                color: black;
                bottom:0%;
                left: 24%;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                text-align: left;
                user-select: none;
            }
            .submissions-container:hover{
                cursor: pointer;   
                box-shadow: -8px 8px 4px rgba(0, 0, 0, 0.25);
                opacity: 1;
                border: 2px solid rgba(240, 34, 34, 0.70);
            }
            .submissions-container:active{
                transform: scale(0.96);
                box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.25);
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

            $baseTop = 44;
            $assignmentNum = 5;
            
            // Fetch submissions for this assignment within this section
            
            $section_id = $_COOKIE['section_id'];
            $assignment_id = $_COOKIE['assignment_id'];
            $assignment_code = $_COOKIE['assignment_code'];

            Print '<span id="pagemast">SUBMISSIONS IN '.$assignment_code.'</span>';
            Print '<div id="horizontalline"></div>';

            $sql_query_submissions = "
                SELECT *, assignment.assignment_name AS title, assignment.uploaded_on AS assignment_upload_date, submissions.uploaded_on AS submission_upload_date
                FROM submissions
                JOIN user_section ON user_section.user_section_id = submissions.user_section_id
                JOIN assignment ON assignment.assignment_code = submissions.assignment_name
                JOIN users ON users.user_id = user_section.user_id
                WHERE user_section.section_id = $section_id AND assignment.assignment_id = $assignment_id
                ";

            $result_submissions = mysqli_query($con, $sql_query_submissions);
            while($row = mysqli_fetch_assoc($result_submissions)) {
                Print '<a onclick="submissionLink('.$row["file_id"].', `'.$row["l_name"].', '.$row["f_name"].' '.$row["m_name"].'`)">';
                    Print '<div class="submissions-container" style="top:'.$baseTop.'%;">';
                        Print '<span class="hwcode">'.$row["assignment_code"].'</span>';
                        Print '<img src="https://cdn-icons-png.flaticon.com/512/711/711284.png" class="hw-icon" alt="hw icon"/>';
                        Print '<span class="hw-title">'.$row["title"].'</span>';
                        Print '<span class="submitted-by">Submitted by: '.$row["l_name"].', '.$row["f_name"].' '.$row["m_name"].'</span>';
                        Print '<span class="submitted-on">Submitted on: '.$row["submission_upload_date"].'</span>';
                    Print '</div>';
                Print '</a>';

                $baseTop = $baseTop + 15 + 3.4;
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

    function submissionLink(file_id, student_name) {
        document.cookie = 'file_id = ' + file_id;
        document.cookie = 'student_name = ' + student_name;
        window.location.href = "teachviewsubmission.php";
    }
</script>