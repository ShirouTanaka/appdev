<html>
    <head>
        <title>Create Assignment</title>
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
            #form-wrapper{
                position: absolute;
                top: 40%;
                left: 9%;
                right: 9%;
                border: 1px solid black;
                max-height: 1500px;
                padding: 0.5em;
                margin: 0.5em auto;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                align-items: flex-start;
            }
            /*LEFT*/
            #form-wrapper #left-container{
                min-height: 277px;
                width: 480px;
                border: 1px solid black;
                margin: 0.5em;
                padding: 0.25em;
                display: flex;
                flex-wrap: wrap;
                align-content: flex-start;
                justify-content: center;
            }
            #form-wrapper #left-container .labels{
                font-family: 'Barlow Condensed', sans-serif;
                font-size: 28px;
                font-weight: 300;
                margin-top: 0.9em;
            }
            #form-wrapper #left-container .input{
                width: 63%;
                min-height: 35px;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 300;
                color: black;
                border: none;
                font-size: 1.5em;
                border-radius: 12px;
                border: 2px solid rgba(0, 0, 0, 0.25);
                outline: none;
                margin-top: 1.05em;
            }
            #form-wrapper #left-container #input1{
                margin-left: 0.5em;
            }
            #form-wrapper #left-container #input2{
                margin-left: 3em;
            }
            #form-wrapper #left-container #input3{
                margin-left: 3.4em;
            }
            /*RIGHT*/
            #form-wrapper #right-container{
                min-height: 250px;
                width: 510px;
                border: 1px solid black;
                margin: 0.5em;
                padding: 0.5em;
                display: block;
            }
            #form-wrapper #right-container #textarea-mast{
                width: 100%;
                font-family: 'Barlow Condensed', sans-serif;
                font-size: 28px;
                display: block;
                margin: 0em auto;
                text-align: center;
                font-weight: 300;
            }
            #form-wrapper #right-container #textarea{
                width: 100%;
                border: 2px solid rgba(0, 0, 0, 0.25);
                font-family: 'Barlow Condensed', sans-serif;
                font-size: 15px;
                display: block;
                font-weight: 300;
                margin: 0.90em auto;
                border-radius: 10px;
            }
            #form-wrapper #right-container #buttons-wrapper{
                width: 100%;
                display: block;
                height: 45px;
                display: flex;
                flex-wrap: wrap;
                align-content: flex-start;
                justify-content: center;
            }
            #form-wrapper #right-container #buttons-wrapper .buttons{
                height: 75%;
                width: 110px;
                font-family: 'Barlow Condensed', sans-serif;
                font-size: 18px;
                font-weight: 300;
                margin: 0.3em 1.5em;
                background-color: #F84646;
                border: none;
                outline: none;
                color: white;
                box-shadow: -3px 3px 4px rgba(0, 0, 0, 0.25);
                border-radius: 8px;
                transition: 0.2s ease-in-out;
            }
            #form-wrapper #right-container #buttons-wrapper .buttons:hover{
                cursor: pointer;
                background-color: #F02222;
            }
            #form-wrapper #right-container #buttons-wrapper .buttons:active{
                transform: scale(0.96);
                box-shadow: -0px 0px 4px rgba(0, 0, 0, 0.25);
            }
            /*MEDIA QUERY*/
            @media screen and (max-width: 1750px) {
                
            }
            @media screen and (max-width: 650px) {
                #form-wrapper #left-container .labels{
                    margin-top: 0.95em;
                    font-size: 1.3em;                }
                #form-wrapper #left-container .input{
                    min-height: 30px;
                    font-size: 1.3em;
                    width: 59%;
                }
                #form-wrapper #left-container #input1{
                    margin-left: 1em;
                }
                #form-wrapper #left-container #input2{
                    margin-left: 0em auto;
                }
                #form-wrapper #left-container #input3{
                    margin-left: 0em auto;
                }
            }
            /*SCROLL BAR*/
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
            <span id="viewsection-text">BACK TO ASSIGNMENTS</span>
        </div>
        <!-- RIGHT CARD EDIT PROFILE AND LOGOUT -->
        <div id="rightcard">
            <img src="images/edit.png" id="edit" alt="edit profile"/>
            <a href="login.php"><img src="images/logout.png" id="logout" alt="logout profile"/></a>
        </div>

        <!-- BODY PROPER -->
        <span id="pagemast">CREATE ASSIGNMENT</span>
        <div id="horizontalline"></div>
        <form id="form-wrapper" action="teachaddhw.php" method="POST">
            <div id="left-container">
                <span class="labels">Assignment Title:</span>
                <input type="text" name="hw-title" id="input1" placeholder="Enter title" class="input" required>
                <span class="labels">Start Date:</span>
                <input type="date" name="start-date" id="input2" class="input" required>
                <span class="labels">End Date:</span>
                <input type="date" name="end-date" id="input3" class="input" required>
                <span class="labels">Due Time:</span>
                <input type="time" name="due-time" id="input3" class="input" required>
            </div>
            <div id="right-container">
                <span id="textarea-mast">Assignment Description:</span>
                <textarea id="textarea" name="description" rows="8" cols="50" required>
                </textarea>
                <div id="buttons-wrapper">
                    <input type="reset" value="RESET" class="buttons">
                    <input type="submit" value="SUBMIT" class="buttons">
                </div>
            </div>
        </form>
        <?php
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $title = $_POST['hw-title'];
                $start_date = $_POST['start-date'];
                $end_date = $_POST['end-date'];
                $due_time = $_POST['due-time'];
                $description = $_POST['description'];
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
</script>