<html>
    <?php
        session_start();
        include 'connect.php';
    ?>
    <head>
        <title>Student View Assignment Page</title>
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
                top: 20%;
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
                top: 28%;
            }
            .assignments-container{
                position: absolute;
                right: 10%;
                left: 10%;
                top:32%;
                height: 65%;
                border: 2px solid rgba(0, 0, 0, 0.25);
                box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.25);
                border-radius: 20px;
            }

            .assignments-container .hw-info-title{
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

            .assignments-container .hw-info-line{
                position: absolute;
                border-bottom: 2px solid black;
                width: 80%;
                height: 0%;
                left: 18%;
                top: 31.5%;
            }

            .assignments-container .hw-info-description{
                position: absolute;
                font-size: 1.2vw;
                color: black;
                top: 36%;
                left: 2%;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                text-align: left;
                user-select: none;
            }

            .assignments-container .hw-title{
                position: absolute;
                font-size: 2.3vw;
                color: black;
                left: 2%;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 600;
                text-align: left;
                user-select: none;
            }
            .assignments-container .hw-code{
                position: absolute;
                font-size: 2vw;
                color: black;
                top: 9%;
                left: 2%;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                text-align: left;
                user-select: none;
            }

            .assignments-container .grade-title{
                position: absolute;
                font-size: 2vw;
                color: black;
                top: 18%;
                left: 83%;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                text-align: left;
                user-select: none;
            }

            .assignments-container .grade{
                position: absolute;
                font-size: 3vw;
                color: black;
                top: 18%;
                left: 90%;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                text-align: left;
                user-select: none;
            }
            .assignments-container .due-date-title{
                position: absolute;
                font-size: 2vw;
                color: black;
                top: 18%;
                left: 2%;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                text-align: left;
                user-select: none;
            }
            .assignments-container .due-date{
                position: absolute;
                font-size: 2vw;
                color: black;
                top: 18%;
                left: 11%;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                text-align: left;
                user-select: none;
            }

            .assignments-container .hw-submission-title{
                position: absolute;
                font-size: 2.2vw;
                color: black;
                top: 67%;
                left: 2%;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                text-align: left;
                user-select: none;
            }

            .assignments-container .hw-submission-line{
                position: absolute;
                border-bottom: 2px solid black;
                width: 73%;
                height: 0%;
                left: 25%;
                top: 71.5%;
            }
            .assignments-container .hw-submissionbox{
                height: 6%;
                width: 30.5%;
                position: absolute;
                top: 77%;
                bottom: 5%;
                left: 2%;
                background-color: #F12929;
                border: none;
                color: white;
                opacity: 0.90;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                font-size: 1.3vw;
                box-shadow: -2 px 2px 4px rgba(0, 0, 0, 0.25);
                transition: 0.3s ease-in-out;
            }

            .assignments-container .hw-submissionbox:hover{
                opacity: 1;
                cursor: pointer;
            }
            .assignments-container .hw-submissionbox:active{
                box-shadow: 0px 0px 0px black;
                transform: scale(0.96);
            }

            .assignments-container .submission-button{
                height: 13%;
                width: 20.5%;
                position: absolute;
                top: 80%;
                bottom: 5%;
                left: 75%;
                background-color: #F12929;
                border-radius: 15px;
                border: none;
                color: white;
                opacity: 0.90;
                font-family: 'Barlow Condensed', sans-serif;
                font-weight: 400;
                font-size: 1.6vw;
                box-shadow: -2 px 2px 4px rgba(0, 0, 0, 0.25);
                transition: 0.3s ease-in-out;
            }
            .assignments-container.submission-button:hover{
                opacity: 1;
                cursor: pointer;
            }
            .assignments-container .submission-button:active{
                box-shadow: 0px 0px 0px black;
                transform: scale(0.96);
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
        <span id="pagemast">VIEW ASSIGNMENT</span>
        <div id="horizontalline"></div>
        <form method="POST" action="studentviewassignment.php" class="assignments-container"  enctype="multipart/form-data">
        <?php
            $num = $_COOKIE['number'];
            
                Print '<span class="hw-title">'.$_SESSION['assignment_name'][$num].'</span>';
                Print '<span class="hw-code">HW Code: '.$_SESSION['assignment_code'][$num].'</span>';
                Print '<span class="grade-title">Points:</span>';
                Print '<span class="grade">100</span>';
                Print '<span class="due-date-title">Due Date: </span>';
                Print '<span class="due-date">'. $_SESSION['assignment_dl'][$num].'</span>';
                Print '<span class="hw-info-title">Assignment Info</span>';
                Print '<span class="hw-info-line"></span>';
                Print '<span class="hw-info-description">'.$_SESSION['assignment_desc'][$num].'</span>';
                Print '<span class="hw-submission-title">Assignment Submission</span>';
                Print '<span class="hw-submission-line"></span>';
                $_SESSION['asscode'] = $_SESSION['assignment_code'][$num];
            
                
        ?>
        <input type="file" class="hw-submissionbox" id="filedata" name="filedata" value="CHOOSE FILE">
        <input type="submit" id="submitbtn" name="submitdata" class="submission-button" value="SUBMIT">
        </form>
        <?php
             
            
                    $status_msg = "";
                    
              
                  

           
                

                    $user_id_current = $_SESSION['user_id'];

                    $sql_query_userSec_id = "
                        SELECT * 
                        FROM user_section
                        JOIN users ON user_section.user_id=users.user_id
                        WHERE user_section.user_id = $user_id_current AND users.user_type = 'student' 
                        ";

                    $result_user_section = mysqli_query($con, $sql_query_userSec_id);
                    $row = mysqli_fetch_assoc($result_user_section);
                    $user_section_id_current = $row['user_section_id'];


                    // if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    //     $targetDir = "uploads/";
                    
                    //     echo var_dump($_FILES);
                    //     $fileName = basename($_FILES['filedata']['name']);
                        
                    //     echo $fileName;
                        
                        
                    //     $targetFilePath = $targetDir . $fileName;
                    //     $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

                    //     $allowTypes = array('cpp');
                    //     if($fileName != NULL){
                    //         if(move_uploaded_file($_FILES["filedata"]["tmp_name"], $targetFilePath)){
                    //             $assignment_code = $_SESSION['assignment_code'][$num];
                    //             $sql_query = $con->query("INSERT into submissions (file_id, file_name, uploaded_on, submission_grade, assignment_name, user_section_id) 
                    //             VALUES (NULL, '".$fileName."', NOW(), NULL, '".$assignment_code."', '".$user_section_id_current."')");
                
                    //             if($sql_query){
                    //                 $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                    //             }
                    //             else{
                    //                 $statusMsg = "File upload failed, please try again.";
                    //             } 
                    //         }
                    //         else{
                    //             $statusMsg = "Sorry, there was an error uploading your file.";
                    //         }
                    //     }
                        
                    // }
                    $fileName = $_COOKIE['filename'];
                    if($fileName != "no file"){
                        
                        echo gettype($fileName);

                        $allowTypes = array('cpp');
                        
                            
                        $assignment_code = $_SESSION['asscode'];
                        $sql_query = $con->query("INSERT into submissions (file_id, file_name, uploaded_on, submission_grade, assignment_name, user_section_id) 
                        VALUES (NULL, '".$fileName."', NOW(), NULL, '".$assignment_code."', '".$user_section_id_current."')");
                        
                    }      
            ?>
    </body>
</html>

<script type="module">
        // Import the functions you need from the SDKs you need
        import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.11/firebase-app.js";
        import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.6.11/firebase-analytics.js";
        import { getStorage, ref, uploadBytes} from "https://www.gstatic.com/firebasejs/9.6.11/firebase-storage.js";
        // TODO: Add SDKs for Firebase products that you want to use
        // https://firebase.google.com/docs/web/setup#available-libraries

        // Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        const firebaseConfig = {
            apiKey: "AIzaSyA8JTIoITfG5DOYoLy29CnqDi_55-KlqV0",
            authDomain: "hashlearn-f0b12.firebaseapp.com",
            projectId: "hashlearn-f0b12",
            storageBucket: "hashlearn-f0b12.appspot.com",
            messagingSenderId: "913464562490",
            appId: "1:913464562490:web:9a2391b6c50aa49f413603",
            measurementId: "G-V2Z5CJ8TEN"
        };

        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        const analytics = getAnalytics(app);

        const btn = document.querySelector('#submitbtn');

        btn.addEventListener('click', function(e){
            e.preventDefault();

            const storage = getStorage(app);
            var file = document.querySelector('#filedata').files[0];
            var name = file.name;
            document.cookie="filename="+ name;
            const storageRef = ref(storage, name);

        

            var metadata ={
                contentType: file.type
            }

            uploadBytes(storageRef, file).then((snapshot) => {
                window.location.href = "studentviewassignment.php";
        });

            
        })
    </script>
<script>
    var flag = false;
    document.cookie='filename=' + 'no file';
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
</script>