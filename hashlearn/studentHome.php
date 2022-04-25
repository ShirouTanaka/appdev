<html>
    <?php
        session_start();
        include 'connect.php';
    ?>
    <head>
        <title>Student Home Page</title>
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
            #activitystream{
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
            #activitystream #activitystream-text{
                position: absolute;
                bottom: 2%;
                font-size: 2.3vw;
                color: white;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 300;
                user-select: none;
                text-align: center;
            }
            #activitystream:hover{
                cursor: pointer;
            }
            #viewgrades{
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
            #viewgrades #viewgrades-text{
                position: absolute;
                bottom: 2%;
                font-size: 2.3vw;
                color: white;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 300;
                text-align: center;
                user-select: none;
            }
            #viewgrades:hover{
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
                left: 30%;
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
            .assignments-container{
                position: absolute;
                right: 10%;
                left: 10%;
                height: 15%;
                border: 2px solid rgba(0, 0, 0, 0.25);
                border-radius: 20px;
                opacity: 0.7;
                transition: 0.2s ease-in-out;
            }

            .assignments-container .date{
                position: absolute;
                font-size: 2.2vw;
                color: black;
                top: 27%;
                left: 2%;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                text-align: left;
                user-select: none;
            }
            .assignments-container .hw-icon{
                position: absolute;
                left: 23%;
                height: 75%;
                top: 13%;
                user-select: none;
                max-width: auto;
            }
            .assignments-container .hw-title{
                position: absolute;
                font-size: 2.3vw;
                color: black;
                top: -2%;
                left: 32%;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 600;
                text-align: left;
                user-select: none;
            }
            .assignments-container .hw-code{
                position: absolute;
                font-size: 2vw;
                color: black;
                top: 32%;
                left: 32%;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                text-align: left;
                user-select: none;
            }
            .assignments-container .due-date{
                position: absolute;
                font-size: 2vw;
                color: black;
                bottom:0%;
                left: 32%;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                text-align: left;
                user-select: none;
            }
            .assignments-container:hover{
                cursor: pointer;   
                box-shadow: -8px 8px 4px rgba(0, 0, 0, 0.25);
                opacity: 1;
                border: 2px solid rgba(240, 34, 34, 0.70);
            }
            .assignments-container:active{
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
            <!-- <span id="username">Kyle Matthew Degrano</span> -->
            <span id="username">
                <?php
                    $fName = $_SESSION['f_name'];
                    $mName = $_SESSION['m_name'];
                    $lName = $_SESSION['l_name'];
                    echo $lName.", ".$fName." ".$mName;
                ?>
            </span>
            <!-- <Span id="mail">kmadegrano@mymail.mapua.edu.ph</Span> -->
            <Span id="mail">
                <?php
                    echo $_SESSION['email'];
                ?>
            </Span>
        </div>
        <!-- TABS SELECTION BENEATH -->
        <div id="activitystream" onclick="navButtonHandle('activity stream')">
            <span id="activitystream-text">ACTIVITY STREAM</span>
        </div>
        <div id="viewgrades" onclick="navButtonHandle('view grades')">
            <span id="viewgrades-text">VIEW GRADES</span>
        </div>
        <!-- RIGHT CARD EDIT PROFILE AND LOGOUT -->
        <div id="rightcard">
            <a href="studentchangeprofile.php"><img src="images/edit.png" id="edit" alt="edit profile"/></a>
            <a href="login.php"><img src="images/logout.png" id="logout" alt="logout profile"/></a>
        </div>

        <!-- BODY PROPER -->
        <span id="pagemast">ACTIVITY STREAM</span>
        <div id="horizontalline"></div>
        <?php
            $baseTop = 44;
            $assignmentNum = 5;

            //this gets the section
            $user_id_current = $_SESSION['user_id'];
            $sql_query_section = "
                    SELECT * 
                    FROM user_section
                    JOIN users ON user_section.user_id=users.user_id
                    JOIN sections ON user_section.section_id=sections.section_id
                    WHERE user_section.user_id = $user_id_current AND users.user_type = 'student'
            ";
            $result_section = mysqli_query($con, $sql_query_section);
            $row_section = mysqli_fetch_assoc($result_section);
            $section_id_current = $row_section['section_id'];

            $sql_query_assignment = "
                SELECT * 
                FROM assignment 
                JOIN sections ON assignment.section_id=sections.section_id
                WHERE assignment.section_id = $section_id_current
            ";


            
            
            $result_assignment = mysqli_query($con, $sql_query_assignment);
            $total = mysqli_num_rows($result_assignment);

            while($row = mysqli_fetch_assoc($result_assignment)){
                $upload_date[] = $row['uploaded_on'];
                $assignment_name[] = $row['assignment_name'];
                $assignment_description[] = $row['assignment_desc'];
                $assignment_code[] = $row['assignment_code'];
                $assignment_dl[] = $row['assignment_dl']; 
            }

            $_SESSION['assignment_desc'] = $assignment_description;
            $_SESSION['assignment_dl'] = $assignment_dl;
            $_SESSION['assignment_code'] = $assignment_code;
            $_SESSION['assignment_name'] = $assignment_name;
            
            $k = 0;
            for($i = 0; $i < $total; $i++){
                Print '<a onclick="assignmentLink('.$k.')"><div class="assignments-container" style="top:'.$baseTop.'%;">';
                    Print '<span class="date">'.$upload_date[$k].'</span>';
                    Print '<img src="https://cdn-icons-png.flaticon.com/512/711/711284.png" class="hw-icon" alt="hw icon"/>';
                    Print '<span class="hw-title">'.$assignment_name[$k].'</span>';
                    Print '<span class="hw-code">'.$assignment_code[$k].'</span>';
                    Print '<span class="due-date">Due Date & Time: '.$assignment_dl[$k].'</span>';
                Print '</div></a>';
                
                $k++;
                $baseTop = $baseTop + 15 + 3.4;
            }
        ?>
    </body>
</html>

<script>
    var flag = false;
    function navButtonHandle(tag){ // FOR NAVBUTTON ANIMATION AND MOUSE EVENT HANDLING
        if(tag === "activity stream"){
            document.getElementById("viewgrades").style.top = "5%";
            document.getElementById("viewgrades").style.opacity = "0.8";

            document.getElementById("activitystream").style.top = "7%";
            document.getElementById("activitystream").style.opacity = "0.9";
            window.location.href = "studenthome.php";
        }else if(tag === "view grades"){
            document.getElementById("activitystream").style.top = "5%";
            document.getElementById("activitystream").style.opacity = "0.8";

            document.getElementById("viewgrades").style.top = "7%";
            document.getElementById("viewgrades").style.opacity = "0.9";
            window.location.href = "studentviewgrades.php";
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

    function assignmentLink(num){
        //testing please change to proper assignment page
        document.cookie='number=' + num;
        // <?php
        //     $_SESSION['array_num'] = $_COOKIE['number']; 
        // ?>
        // document.cookie = "number=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
        window.location.href = "studentviewassignment.php";
    }
</script>

