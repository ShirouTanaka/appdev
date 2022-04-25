<html>
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
                top: 7%;
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
            /*FORM PROPER*/
            #form-dimensions{
                position: absolute;
                right: 10%;
                top: 44%;
                left: 10%;
                height: 120%;
            }
            #form-dimensions #sectionname-container{
                position: absolute;
                left:10%;
                top: 0%;
                right:10%;
                border: 2px solid rgba(0, 0, 0, 0.25);
                border-radius: 15px;
                height: 6.5%;
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
                font-size: 2.1vw;
                background: transparent;
                outline: none;
            }
            #form-dimensions #av-containers-label{
                position: absolute;
                top: 14.5%;
                left: 50%;
                font-size: 2.4vw;
                color: black;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 600;
                text-align: center;
                user-select: none;
                transform: translate(-50%, -50%);
            }
            #form-dimensions #available-students-container{
                position: absolute;
                right: 10%;
                top: 19%;
                left: 10%;
                border-bottom: 2px solid rgba(0, 0, 0, 0.25);
                height: 65%;
                overflow-x: hidden;
                overflow-y: auto;
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
            #form-dimensions #available-students-container .av-students-item{
                position: relative;
                border: 2px solid rgba(0, 0, 0, 0.25);
                height: 9%;
                margin-bottom: 2%;
                border-radius: 15px;
                opacity: 0.7;
                transition: 0.2s ease-in-out;
            }
            #form-dimensions #available-students-container .av-students-item:hover{
                cursor: pointer;
                opacity: 1;
                border: 2px solid #F84646;
                box-shadow: 0px 5px 4px rgba(0, 0, 0, 0.25);
            }
            #form-dimensions #available-students-container .av-students-item #student-name{
                position: absolute;
                left: 2%;
                top: 9%;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                color: black;
                font-size: 2vw;
                user-select: none;
            }
            #form-dimensions #available-students-container .av-students-item .checkbox{
                position: absolute;
                right: -12%;
                height: 55%;
                width: 30%;
                top: 15%;
            }
            #form-dimensions #available-students-container .av-students-item .checkbox:hover{
                cursor: pointer;
            }
            #form-dimensions #save-section-button{
                position: absolute;
                right: 10%;
                bottom: 6%;
                width: 17%;
                height: 5%;
                background-color: #F12929;
                border-radius: 10px;
                border: none;
                color: white;
                opacity: 0.90;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                font-size: 2vw;
                box-shadow: -5px 5px 4px rgba(0, 0, 0, 0.25);
                transition: 0.3s ease-in-out;
            }
            #form-dimensions #save-section-button:hover{
                opacity: 1;
                cursor: pointer;
            }
            #form-dimensions #save-section-button:active{
                box-shadow: 0px 0px 0px black;
                transform: scale(0.96);
            }
            /*RESULTS*/
            #results-dimensions{
                position: absolute;
                right: 10%;
                top: 175%;
                left: 10%;
                height: 120%;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            #results-dimensions #results-mast{
                position: absolute;
                top: 1%;
                font-size: 2.4vw;
                color: black;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 600;
                text-align: center;
                user-select: none;
            }
            #results-dimensions #results-submast{
                position: absolute;
                top: 7%;
                font-size: 2vw;
                color: black;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                text-align: center;
                user-select: none;
            }
            #results-dimensions #results-tri-submast{
                position: absolute;
                top: 17%;
                font-size: 1.7vw;
                color: black;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 600;
                text-align: center;
                user-select: none;
            }
            #results-dimensions #added-students-list{
                position: absolute;
                right: 10%;
                top: 23%;
                left: 10%;
                height: 60%;
                overflow-x: hidden;
                overflow-y: auto;
                border-bottom: 2px solid rgba(0, 0, 0, 0.25);
            }
            #results-dimensions #added-students-list .ad-students-item{
                position: relative;
                border: 2px solid rgba(0, 0, 0, 0.25);
                height: 9%;
                margin-bottom: 2%;
                border-radius: 15px;
                opacity: 0.7;
                transition: 0.2s ease-in-out;
            }
            #results-dimensions #added-students-list .ad-students-item #ad-student-name{
                position: absolute;
                left: 2%;
                top: 2%;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                color: black;
                font-size: 2vw;
                user-select: none;
            }
            #results-dimensions #added-students-list .ad-students-item:hover{
                cursor: pointer;
                opacity: 1;
                border: 2px solid #F84646;
                box-shadow: 0px 5px 4px rgba(0, 0, 0, 0.25);
            }
            #results-dimensions #finalize{
                position: absolute;
                right: 10%;
                bottom: 7%;
                width: 17%;
                height: 5%;
                background-color: #F12929;
                border-radius: 10px;
                border: none;
                color: white;
                outline: none;
                opacity: 0.90;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                font-size: 2vw;
                box-shadow: -5px 5px 4px rgba(0, 0, 0, 0.25);
                transition: 0.3s ease-in-out;
            }
            #results-dimensions #finalize:hover{
                opacity: 1;
                cursor: pointer;
            }
            #results-dimensions #finalize:active{
                box-shadow: 0px 0px 0px black;
                transform: scale(0.96);
            }
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
        <span id="pagemast">ADD A SECTION</span>
        <div id="horizontalline"></div>
        <form action="teachaddsection.php" id="form-dimensions" method="POST">
            <div id="sectionname-container">
                <img src="https://cdn-icons-png.flaticon.com/512/1907/1907568.png" id="section-name-icon" alt="section name icon"/>
                <div id="section-line"></div>
                <input type="text" id="name-input" name="section-name" placeholder="Enter Section Name" required>
            </div>
            <span id="av-containers-label">AVAILABLE STUDENTS</span>
            <div id="available-students-container">
                <?php
                    $available_students = array("Kyle Matthew A. Degrano", "Lenz Baron S. Balita", "Andrei Daniel A. Pamoso", "Lance Williams G. Navarro", "Maria Cassandra M. Lindio");

                    for($i = 0; $i < count($available_students); $i++){
                        Print '<div class="av-students-item">';
                            echo '<span id="student-name">'.$available_students[$i].'</span>';
                            echo '<input type="checkbox" class="checkbox" name="studentitem[]" value="'.$available_students[$i].'">';
                        Print '</div>';
                    }
                ?>
            </div>
            <input type="submit" value="SAVE SECTION" name="submit" id="save-section-button">
        </form>
        <?php
            class Section{
                public $name;
                public $students = array(); 

                function setName($name){
                    $this->name = $name;
                }
                function addStudent($student){
                    array_push($this->students, $student);
                }
            }
        
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $section = new Section();
                $section->setName($_POST['section-name']);

                if(!empty($_POST['studentitem'])){
                    Print '<div id="results-dimensions">';
                        Print '<span id="results-mast">SECTION CREATION DETAILS</span>';
                        Print '<span id="results-submast">SECTION NAME: '.$section->name.' -- STUDENT COUNT: '.count($_POST['studentitem']).'</span>';
                        Print '<span id="results-tri-submast">ACTIVE STUDENTS LIST</span>';

                        Print '<div id="added-students-list">';
                            foreach($_POST['studentitem'] as $value){
                                // DELETE SELECTED ITEMS FIRST FROM AVAILABLE STUDENTS LIST (once database is connected)
                                $section->addStudent($value);
                                Print '<div class="ad-students-item">';
                                    Print '<span id="ad-student-name">'.$value.'</span>';
                                Print '</div>';
                            }
                        Print '</div>';
                        Print '<button id="finalize" onclick="confirmation()">FINALIZE</button>';
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

    function confirmation(){
        let text = "Finalize and return to teacher home page?";
        if(confirm(text)){
            window.location.assign("teachhome.php");
        }else{
            window.location.assign("teachaddsection.php");
        }
    }
</script>