<html>
    <form action="" method="post" enctype="multipart/form-data">
        Select Image File to Upload:
        <input type="file" id="filedata" name="file">
        <input type="submit" id="submitbtn" name="submit" value="Upload">
    </form>
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
    const storageRef = ref(storage, name);

   

    var metadata ={
        contentType: file.type
    }

    uploadBytes(storageRef, file).then((snapshot) => {
    console.log('Uploaded a blob or file!');
});

    
  })
</script>
</html>

<?php
    //this should work in tandem to the submit assignment page and this actually uploads to the server and saves the path in the 
    //database making sure that it can go back to the file
    include 'connect.php';
    $status_msg = "";

    //File upload path
    $targetDir = "uploads/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
        $allowTypes = array('cpp');
        if(in_array($fileType, $allowTypes)){
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                $sql_query = $con->query("INSERT into submissions (file_name, uploaded_on, user_id, assignment_name) 
                VALUES ('".$fileName."', NOW(), 1, 'A1')");

                if($sql_query){
                    $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                }
                else{
                    $statusMsg = "File upload failed, please try again.";
                } 
            }
            else{
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }
        else{
            $statusMsg = 'Sorry, only .cpp files are accepted to upload.';
        }
    }
    else{
        $statusMsg = 'Please select a file to upload.';
    }
    
    echo $statusMsg;
?>