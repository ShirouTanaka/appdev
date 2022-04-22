<html>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select Image File to Upload:
        <input type="file" name="file">
        <input type="submit" name="submit" value="Upload">
    </form>
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
                }else{
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