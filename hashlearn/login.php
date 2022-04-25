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
                margin-bottom: -40px;
            }
            #left-container #form-wrapper{
                position: relative;
                width: 90%;
                height: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                margin-bottom: 60px;
            }
            #left-container #form-wrapper #form-proper{
                position: absolute;
                left: 0%;
                top: 0%;
                right: 0%;
                height: 100%;
            }
            
            #left-container #form-wrapper #form-proper #submit-button{
                height: 13%;
                width: 95.5%;
                position: absolute;
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
            #left-container #form-wrapper #form-proper #submit-button:hover{
                opacity: 1;
                cursor: pointer;
            }
            #left-container #form-wrapper #form-proper #submit-button:active{
                box-shadow: 0px 0px 0px black;
                transform: scale(0.96);
            }

            #left-container #form-wrapper #form-proper .inputs{
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
                <form action="checkLogin2.php" method="POST" id="form-proper">
                    <input type="text" class="inputs" name="username" style="left: 9.5%; top:25.3%;" placeholder="Enter username" required>
                    <input type="password" class="inputs" name="password" style="left: 9.5%; top:50.8%;" placeholder="Enter password" required>
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
