<html>
    <?php
        session_start();
        include 'connect.php';
    ?>
    <head>
        <title>Teacher Home Page</title>
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
                top: 7%;
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
            .sections-container{
                position: absolute;
                top: 47%;
                right: 10%;
                left: 10%;
                height: 40%;
                max-height: 120%;
                display: grid;
                grid-template-columns: auto auto auto auto;
                column-gap: 20px;
            }
            .sections-container .slot{
                border: 2px solid rgba(0, 0, 0, 0.25);
                box-sizing: border-box;
                box-shadow: -8px 8px 4px rgba(0, 0, 0, 0.25);
                border-radius: 15px;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                transition: 0.2s ease-in-out;
            }
            .sections-container .slot:hover{
                border: 2px solid rgba(240, 34, 34, 0.70);
                cursor: pointer;
            }
            .sections-container .slot:active{
                box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.25);
                transform: scale(0.96);
            }
            .sections-container .slot #sectionicon{
                position: relative;
                max-width: auto;
                height: 35%;
                margin-bottom: 20px;
            }
            .sections-container .slot #sectionname{
                position: relative;
                font-size: 2.7vw;
                color: black;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 600;
                text-align: center;
                user-select: none;
            }
            .sections-container .slot #studentcount{
                position: relative;
                font-size: 2.3vw;
                color: black;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 300;
                text-align: center;
                user-select: none;
            }
        </style>
    </head>
    <body>
        <!-- NAV BAR -->
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
            <img src="images/edit.png" id="edit" alt="edit profile"/>
            <a href="login.php"><img src="images/logout.png" id="logout" alt="logout profile"/></a>
        </div>

        <!-- BODY PROPER -->
        <span id="pagemast">ACTIVE SECTIONS</span>
        <div id="horizontalline"></div>
        <?php
            $user_id_temp = $_SESSION['user_id'];
            $sql_query = "
                    SELECT * 
                    FROM user_section
                    JOIN users ON user_section.user_id=users.user_id
                    JOIN sections ON user_section.section_id=sections.section_id
                    WHERE user_section.user_id = $user_id_temp
            ";

            $result = mysqli_query($con, $sql_query);
            $total = mysqli_num_rows($result);
            

            $numSections = $total;
            $numSectionContainer = ceil($numSections / 4);
            $baseTop = 47; // 47%

            $cnt = 0;
            
            while($row = mysqli_fetch_assoc($result)){
                $section[] = $row['section_name'];
                $current_section_id = $row['section_id']; 
                
                $sql_query_num = "SELECT * FROM user_section
                    JOIN users ON user_section.user_id=users.user_id
                    WHERE user_section.section_id =".$current_section_id." AND users.user_type = 'student' 
                ";
        
                $num_result = mysqli_query($con, $sql_query_num);

                $num[] = mysqli_num_rows($num_result);
            }

            $k = 0;
            for($i = 0; $i < $numSectionContainer; $i++){
                Print '<div class="sections-container" style="left:10%;top:'.$baseTop.'%;">';
                    for($j = 0; $j < 4; $j++){
                        if($k >= $numSections) break;
                        Print '<div class="slot">';
                            Print '<img src="images/sectionicon.png" id="sectionicon" alt="sectionicon"/>';
                            Print '<span id="sectionname">'.$section[$k].'</span>';
                            Print '<span id="studentcount">STUDENT COUNT:'.$num[$k].'</span>';
                        Print '</div>';

                        $k++;
                    }
                Print '</div>';

                $baseTop = $baseTop + 40 + 5;
            }            
        ?>
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