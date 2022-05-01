<html>
    <head>
        <title>View Submission</title>
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

            .submission-container{
                position: absolute;
                right: 8%;
                left: 8%;
                top: 40%;
                display: flex;
                flex-wrap: wrap;
                align-content: flex-start;
                justify-content: center;
                max-height: 1500px;
                padding: 0.4em;
                margin: 0.2em auto;
            }
            .submission-container #left-info-box{
                width: 890px;
                height: 130px;
                display: flex;
                flex-wrap: wrap;
                justify-content: space-evenly;
                align-items: flex-start;
                margin-right: 1em;
                margin-bottom: 1.2em;
            }
            .submission-container #left-info-box .mast-info{
                width: 100%;
                font-size: 1.6em;
                color: black;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                text-align: left;
                user-select: none;
                padding: 0.15em;
            }
            .submission-container #right-info-box{
                width: 150px;
                height: 130px;
                border: 2px solid #F84646;
                border-radius: 20px;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                margin-bottom: 1.2em;
            }
            .submission-container #right-info-box #grade-mast{
                font-size: 1.4em;
                color: black;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                width: 100%;
                text-align: center;
                user-select: none;
            }
            .submission-container #right-info-box #grade{
                font-size: 3.5em;
                color: black;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 600;
                text-align: center;
                user-select: none;
            }
            .submission-container #center-info-box{
                width: 1055px;
                border-top: 2px solid black;
                max-height: 1200px;
                margin-bottom: 1em;
                margin-top: 1em;
                display: block;
            }
            .submission-container #center-info-box #info-mast{
                max-width: 1000px;
                max-height: 300px;
                font-size: 2em;
                color: black;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 500;
                text-align: center;
                display: block;
                user-select: none;
                padding-top: 1em;
                margin: 0 auto;
            }
            .submission-container #center-info-box #info{
                max-width: 1000px;
                max-height: 300px;
                font-size: 1.9em;
                color: black;
                display: block;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 300;
                text-align: center;
                user-select: none;
                padding: 0.8em 2.5em;
            }
            .submission-container #center-info-box #form-wrapper{
                max-width: 80%;
                min-height: 200px;
                display: flex;
                flex-wrap: wrap;
                align-content: flex-start;
                justify-content: center;
                margin: 0 auto;
                padding: 0.25em;
            }
            .submission-container #center-info-box #form-wrapper #code-area{
                width: 95%;
                min-height: 200px;
                font-family: 'Barlow Condensed', sans-serif;
                font-size: 20px;
                font-weight: 400;
                border-radius: 15px;
                color: black;
            }
            .submission-container #center-info-box #form-wrapper #grade-input{
                width: 95%;
                min-height: 40px;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                color: black;
                border: none;
                font-size: 1.5em;
                border-radius: 15px;
                border: 2px solid rgba(0, 0, 0, 0.25);
                outline: none;
                margin: 1em auto;
            }
            .submission-container #center-info-box #form-wrapper .buttons{ 
                width: 200px;
                min-height: 40px;
                border-radius: 15px;
                background-color:#F84646;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                margin: 1em;
                color: white;
                font-size: 1.5em;
                box-shadow: -5px 5px 4px rgba(0, 0, 0, 0.25);
                outline: none;
                border: none;
                transition: 0.2s ease-in-out;
            }
            .submission-container #center-info-box #form-wrapper .buttons:hover{
                cursor: pointer;
                background-color: #F02222;
            }
            .submission-container #center-info-box #form-wrapper .buttons:active{
                transform: scale(0.96);
                box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.25);
            }
            @media screen and (max-width: 1700px) {
                .submission-container{
                    left: 6%;
                    right: 6%;
                }
                .submission-container #left-info-box{
                    width: 910px;
                }
            }
            @media screen and (max-width: 600px) {
                .submission-container #left-info-box{
                    height: 110px;
                }
                .submission-container #left-info-box .mast-info{
                    font-size: 1.3em;
                }
                .submission-container #center-info-box #info-mast{
                    font-size: 1.9em;
                }
                .submission-container #center-info-box #info{
                    font-size: 1.6em;
                }
            }
            
        </style>
    </head>
    <body>
        <!-- NAVBAR -->
        <div id="navbar-body">
            <img src="images/smallerlogo.png" id="logo" alt="hashlearn logo"/>
            <div onclick="profileClick()" id="profilepic"></div>
            <span id="username">Kyle Matthew Degrano</span>
            <Span id="mail">kmadegrano@mymail.mapua.edu.ph</Span>
        </div>
        <!-- TABS SELECTION BENEATH -->
        <div id="viewsection" onclick="navButtonHandle('view section')">
            <span id="viewsection-text">VIEW SUBMISSIONS</span>
        </div>
        <!-- RIGHT CARD EDIT PROFILE AND LOGOUT -->
        <div id="rightcard">
            <img src="images/edit.png" id="edit" alt="edit profile"/>
            <a href="login.php"><img src="images/logout.png" id="logout" alt="logout profile"/></a>
        </div>

        <span id="pagemast">OOP Introductory HW</span>
        <div id="horizontalline"></div>

        <div class="submission-container">
            <div id="left-info-box">
                <span class="mast-info">
                    <span style="text-decoration: underline;">ASSIGNMENT CODE:</span>
                    <?php Print '<span style="margin-left: 0.6em">FA1.1</span>'; ?>
                </span>
                <span class="mast-info">
                    <span style="text-decoration: underline;">DATE SUBMITTED:</span>
                    <?php Print '<span style="margin-left: 1.2em">03/29/2022 10:50 P.M.</span>'; ?>
                </span>
                <span class="mast-info">
                    <span style="text-decoration: underline;">SUBMITTED BY:</span>
                    <?php Print '<span style="margin-left: 2em">Bobby Bobbers B. Bobbingston</span>'; ?>
                </span>
            </div>
            <div id="right-info-box">
                <span id="grade-mast">Total Points:</span>
                <?php Print '<span id="grade">100</span>';?>
            </div>
            <div id="center-info-box">
                <span id="info-mast">ASSIGNMENT INFO </span>
                <?php Print '<span id="info">Referring to the lectures about DI Approaches and Sample GUI App, develop your own application using the sample program attached hereto (SpringGui). Your application should create a different object that is made up of the existing objects (rectangle and circle).</span>'; ?>
                <!-- GRADING FORM -->
                <form id="form-wrapper" action="teachviewsubmission.php" method="POST">
                    <input type="number" id="grade-input" min="0" max="100" name="grade" placeholder="Enter grade" required>
                    <textarea id="code-area" name="code-submission" rows="10" cols="50"><?php // CODE SUBMISSION GOES HERE ?></textarea> 
                    <a href="https://www.jdoodle.com/online-compiler-c++/" target="_blank" rel="noopener noreferrer"><input type="button" value="VIEW CODE" name="view-code" class="buttons"></a>
                    <input type="submit" value="GRADE" name="submit" class="buttons">
                </form>
                <?php
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $grade = $_POST['grade'];
                        echo '<script>alert("GRADE HAS BEEN RECORDED");</script>';
                    }
                ?>
            </div>
        </div>
    </body> 
</html>
<script>
    var flag = false;
    function navButtonHandle(tag){ // FOR NAVBUTTON ANIMATION AND MOUSE EVENT HANDLING
        if(tag === "view section"){
            document.getElementById("viewsection").style.top = "7%";
            document.getElementById("viewsection").style.opacity = "1";

            window.location.assign("teachpassedhws.php");
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
</script>