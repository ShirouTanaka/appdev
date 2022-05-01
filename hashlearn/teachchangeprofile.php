<html>
    <?php
        session_start();
        include 'connect.php';
    ?>
    <head>
        <title>Student Change Profile Page</title>
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
            #addsection{
                position: fixed;
                left: 20.5%;
                top: 5%;
                width: 20%;
                height: 15%;
                background-color: #F02222;
                z-index: 1;
                opacity: 0.8;
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
            #change-form-container{
                position: absolute;
                left: 6%;
                top:0%;
                width: 53%;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            #change-form-container #form-wrapper{
                position: relative;
                width: 90%;
                height: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                margin-bottom: 60px;
            }
            #change-form-container #form-wrapper #form-proper{
                position: absolute;
                left: 0%;
                top: 0%;
                right: 0%;
                height: 100%;
            }
            
            #change-form-container #form-wrapper #form-proper #submit-button{
                height: 13%;
                width: 95.5%;
                position: absolute;
                top: 120%;
                bottom: 5%;
                left: 2%;
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
            #change-form-container #form-wrapper #form-proper #submit-button:hover{
                opacity: 1;
                cursor: pointer;
            }
            #change-form-container #form-wrapper #form-proper #submit-button:active{
                box-shadow: 0px 0px 0px black;
                transform: scale(0.96);
            }

            #change-form-container #form-wrapper #form-proper .inputs{
                position: absolute;
                width: 87%;
                height: 13%;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                color: black;
                border: none;
                font-size: 2vw;
                background: transparent;
                outline: none;
                border-radius: 10px;
            }
            #change-form-container #form-wrapper #change-username{
                position: absolute;
                font-size: 2.2vw;
                color: black;
                top: 35%;
                left: 2%;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                text-align: left;
                user-select: none;
            }
            #change-form-container #form-wrapper #username{
                position: relative;
                border: 2px solid #aaa9a9;
                top:22%;
                height: 13%;
                width: 95%;
                border-radius: 15px;
                margin-bottom: 5%;
            }
            #change-form-container #form-wrapper #username #username-icon{
                position: absolute;
                left: 1%;
                top: 5%;
                max-width: auto;
                height: 90%;
            }
            #change-form-container #form-wrapper #change-password{
                position: absolute;
                font-size: 2.2vw;
                color: black;
                top: 73%;
                left: 2%;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                text-align: left;
                user-select: none;
            }
            #change-form-container #form-wrapper #password{
                position: relative;
                border: 2px solid #aaa9a9;
                top: 37%;
                height: 13%;
                width: 95%;
                border-radius: 15px;
                margin-bottom: 5%;
            }
            #change-form-container #form-wrapper #password #password-icon{
                position: absolute;
                left: 1%;
                top: 5%;
                max-width: auto;
                height: 90%;
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
        <div id="viewsection" onclick="navButtonHandle('view section')">
            <span id="viewsection-text">VIEW SECTION</span>
        </div>
        <div id="addsection" onclick="navButtonHandle('add section')">
            <span id="addsection-text">ADD SECTION</span>
        </div>
        <!-- RIGHT CARD EDIT PROFILE AND LOGOUT -->
        <div id="rightcard">
            <a href="teachchangeprofile.php"><img src="images/edit.png" id="edit" alt="edit profile"/></a>
            <a href="login.php"><img src="images/logout.png" id="logout" alt="logout profile"/></a>
        </div>

        <!-- BODY PROPER -->
        <span id="pagemast">Change Profile</span>
        <div id="horizontalline"></div>
        <div id="change-form-container">
            <div id="form-wrapper">
                <span id="change-username">Change Username</span>
                <div id="username" style="margin-bottom: 5%;">
                    <img src="images/user.png" id="username-icon" alt="username-icon"/>
                </div>
                <span id="change-password">Change Password:</span>
                <div id="password" style="margin-bottom: 5%;">
                    <img src="images/password.png" id="password-icon" alt="password-icon"/>
                </div>
                <form action="checkLogin2.php" method="POST" id="form-proper">
                    <input type="text" class="inputs" name="username" style="left: 9.5%; top:48.8%;" placeholder="Enter new username" required>
                    <input type="text" class="inputs" name="password" style="left: 9.5%; top:86.8%;" placeholder="Enter new password" required>
                    <input type="submit" id="submit-button" value="SIGN IN">
                </form>
            </div>
        </div>
    </body>
</html>
<script>
    var flag = false;
    function navButtonHandle(tag){ // FOR NAVBUTTON ANIMATION AND MOUSE EVENT HANDLING
        if(tag === "view section"){
            document.getElementById("addsection").style.top = "5%";
            document.getElementById("addsection").style.opacity = "0.9";

            document.getElementById("viewsection").style.top = "7%";
            document.getElementById("viewsection").style.opacity = "1";

            window.location.assign("teachhome.php");

        }else if(tag === "add section"){
            document.getElementById("viewsection").style.top = "5%";
            document.getElementById("viewsection").style.opacity = "0.9";

            document.getElementById("addsection").style.top = "7%";
            document.getElementById("addsection").style.opacity = "1";

            window.location.assign("teachaddsection.php");
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