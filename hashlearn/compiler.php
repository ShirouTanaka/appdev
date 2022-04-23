
<!DOCTYPE html>
<html>
  
<body>

    <!-- form to redirect the page
        to C++ online compiler -->
    <form method="post" action=
"https://www.jdoodle.com/api/redirect-to-post/online-compiler-c++">
        <textarea id="txtarea" name="initScript" 
            rows="8" cols="80">
            <?php
                //should work in tandem with the compiler.php where this one would retrieve the file and enter the contents
                include 'connect.php';

                $sql_query = $con->query("SELECT * FROM submissions ORDER BY uploaded_on DESC");

                if($sql_query->num_rows > 0){
                    while($row = $sql_query->fetch_assoc()){
                      
                        
                       $filename = $row["file_name"];
                        
                    }
                }
            ?>
        </textarea>
          
        <input type="submit" value="Test">
    </form>
    <script type="text/javascript">
        var filename = "<?php echo $filename; ?>"
    </script>
    <script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.11/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.6.11/firebase-analytics.js";
  import { getStorage, ref, getDownloadURL} from "https://www.gstatic.com/firebasejs/9.6.11/firebase-storage.js";
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
  const storage = getStorage(app);
  const textarea = document.querySelector("#txtarea");
  getDownloadURL(ref(storage, filename))
  .then((url) =>{
      // `url` is the download URL for 'images/stars.jpg'
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() { 
    if (xhr.readyState == 4 && xhr.status == 200)
    textarea.value += xhr.responseText; //get file and convert into text
  }
    xhr.onload = (event) => {
      const blob = xhr.response;
    };
    xhr.open('GET', url);
    xhr.send();

    
  })
  //var file = document.querySelector('#filedata').files[0];
//   var name = file.name;
//   const storageRef = ref(storage, name);

  </script>
</body>
  
</html>