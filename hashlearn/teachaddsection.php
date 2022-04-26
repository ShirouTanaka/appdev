<html>
    <?php
        session_start();
        include 'connect.php';
        $current_user_id= $_SESSION['user_id'];
    ?>
    <head>
        <title>Add Section</title>
        <meta charset="UTF-8">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS STYLES -->
        <style>
            body{
                overflow-x: hidden;
                text-rendering: optimizeLegibility;
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
            /*FORM PROPER*/
            #form-dimensions{
                position: absolute;
                right: 10%;
                top: 41%;
                left: 10%;
                height: 8%;
                display: flex;
                flex-wrap: wrap;
                align-content: flex-start;
                justify-content: center;
                border: 1px solid black;
            }
            #form-dimensions #sectionname-container{
                position: relative;
                width: 770px;
                border: 2px solid rgba(0, 0, 0, 0.25);
                border-radius: 15px;
                height: 70%;
                margin: 0.3em 0.1em;
            }
            #form-dimensions #sectionname-container #section-name-icon{
                position: absolute;
                left:1.5%;
                top: 8%;
                max-width: auto;
                height: 85%;
            }
            #form-dimensions #sectionname-container #section-line{
                position: absolute;
                width: 0%;
                left: 6.8%;
                height: 100%;
                border-left: 2px solid rgba(0, 0, 0, 0.25);
            }
            #form-dimensions #sectionname-container #name-input{
                position: absolute;
                width: 90%;
                left: 8.5%;
                height: 100%;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                color: black;
                border: none;
                font-size: 23px;
                background: transparent;
                outline: none;
            }
            #form-dimensions #save-section-button{
                position: relative;
                width: 200px;
                height: 70%;
                margin-top: 0.25em;
                margin-bottom: 0.3em;
                background-color: #F12929;
                border-radius: 10px;
                border: none;
                margin-left: 1.2em;
                color: white;
                opacity: 0.90;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                font-size: 23px;
                box-shadow: -5px 5px 4px rgba(0, 0, 0, 0.25);
                transition: 0.3s ease-in-out;
            }
            /**/
            #result-dimensions{
                position: absolute;
                right: 10%;
                top: 53%;
                left: 10%;
                max-height: 900px;
                display: block;
                padding: 1.5em;
                border: 1px solid black;
            }
            #result-dimensions #_mast{
                display: block;
                width: 100%;
                font-size: 35px;
                color: black;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 500;
                text-align: center;
                margin-bottom: 0.90em;
            }
            #result-dimensions #section-card{
                height: 350px;
                width: 350px;
                border: 2px solid #F84646;
                box-sizing: border-box;
                box-shadow: -8px 8px 4px rgba(0, 0, 0, 0.25);
                border-radius: 15px;
                display: block;
                margin: 0 auto;
            }
            #result-dimensions #section-card #_icon{
                max-width: auto;
                height: 25%;
                display: block;
                margin-top: 3.5em;
                margin-bottom: 1em;
                margin-left: auto;
                margin-right: auto;
            }
            #result-dimensions #section-card #_sectionname{
                font-size: 55px;
                color: black;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 600;
                text-align: center;
                display: block;
                user-select: none;
            }
            #result-dimensions #section-card #_studentcount{
                position: relative;
                font-size: 35px;
                color: black;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 300;
                text-align: center;
                display: block;
                user-select: none;
            }
            /**/
            @media screen and (max-width: 650px) {
                #form-dimensions #sectionname-container #section-name-icon{
                    top: 20%;
                    height: 60%;
                }
                #result-dimensions{
                    top: 65%;
                }
                #result-dimensions #section-card{
                    height: 250px;
                    width: 250px;
                }
                #result-dimensions #section-card #_icon{
                    margin-top: 2.5em;
                }
                #result-dimensions #section-card #_sectionname{
                    font-size: 40px;
                }
                #result-dimensions #section-card #_studentcount{
                    font-size: 30px;
                }
            }
            /**/
        </style>
    </head>
    <body>
        <!-- NAV BAR -->
        <div id="navbar-body">
            <img src="images/smallerlogo.png" id="logo" alt="hashlearn logo"/>
            <div onclick="profileClick()" id="profilepic"></div>
            <span id="username">Kyle Matthew Degrano</span>
            <Span id="mail">kmadegrano@mymail.mapua.edu.ph</Span>
        </div>
        <!-- TABS SELECTION BENEATH -->
        <div id="viewsection" onclick="navButtonHandle('view section')">
            <span id="viewsection-text">VIEW SECTIONS</span>
        </div> 
        <!-- RIGHT CARD EDIT PROFILE AND LOGOUT -->
        <div id="rightcard">
            <img src="images/edit.png" id="edit" alt="edit profile"/>
            <a href="login.php"><img src="images/logout.png" id="logout" alt="logout profile"/></a>
        </div>

        <!-- BODY PROPER -->
        <span id="pagemast">ADD A SECTION</span>
        <div id="horizontalline"></div>
        <form action="teachaddsection.php" id="form-dimensions" method="POST">
            <div id="sectionname-container">
                <img src="https://cdn-icons-png.flaticon.com/512/1907/1907568.png" id="section-name-icon" alt="section name icon"/>
                <div id="section-line"></div>
                <input type="text" id="name-input" name="section-name" placeholder="Enter Section Name" required>
            </div>
            <input type="file" class="hw-submissionbox" id="filedata" name="filedata" value="CHOOSE FILE">
            <input type="submit" value="SAVE SECTION" name="submit" id="save-section-button">
        </form>
        <div id="result-dimensions">
            <?php
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    if(isset($_POST["submit"])){
                        echo "<script>console.log('entered2');</script>";
                        $fileName = $_FILES['filedata']['name'];
                        echo var_dump($_FILES);
                        echo $fileName;
                    }
                    $section_name = $_POST['section-name'];
                    $sql_query_add_section = "INSERT INTO sections (section_id, section_name, module_num, course_title, course_code)
                    VALUES ( NULL ,'".$section_name."', 2, 'Computer Programming Laboratory 1', 'CS126L')
                    ";
        
                    $result_add_section = mysqli_query($con, $sql_query_add_section);

                    $last_id = $con->insert_id;

                    $sql_query_add_user_section = "INSERT INTO user_section (user_section_id ,user_id, section_id)
                    VALUES (NULL,".$current_user_id.", ".$last_id.")
                    ";
                    $result = mysqli_query($con, $sql_query_add_user_section);
                    Print '<span id="_mast">SECTION CREATED: </span>';
                    Print '<div id="section-card">';
                        Print '<img src="images/sectionicon.png" id="_icon" alt="sectionicon"/>';
                        Print '<span id="_sectionname">'.$section_name.'</span>';
                        Print '<span id="_studentcount">STUDENT COUNT: 0</span>';
                    Print '</div>';
                }
            ?>
        </div>
    </body>
</html>
<script>
    var flag = false;
    function navButtonHandle(tag){ // FOR NAVBUTTON ANIMATION AND MOUSE EVENT HANDLING
        if(tag === "view section"){
            document.getElementById("viewsection").style.top = "7%";
            document.getElementById("viewsection").style.opacity = "1";

            window.location.assign("teachhome.php");
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

    /*function confirmation(){
        let text = "Finalize and return to teacher home page?";
        if(confirm(text)){
            window.location.assign("teachhome.php");
        }else{
            window.location.assign("teachaddsection.php");
        }
    }*/
</script>