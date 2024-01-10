<?php
session_start();
include('config.php');

//variables
$id=null;
$ja_name="";
$contact="";
$email="";
$age="";
$birthday="";
$status="";
$nationality="";
//for upload
$target_dir = "uploads/";
$target_file = "";
$uploadOk = 0;
$imageFileType = "";
$uploadfileName = "";

//this block is called when button Submit is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //values for add or edit
    $ja_name = $_POST["ja_name"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $age = $_POST["age"];
    $birthday= $_POST["birthday"];
    $status = $_POST["status"];
    $nationality = $_POST["nationality"];
    
    $filetmp = $_FILES["file"];

    //file of the file
    $uploadfileName = $filetmp["name"];

    //Check if there is an file to be uploaded
    //IF no file
    if(isset($_FILES["file"]) && $_FILES["file"]["name"] == ""){
        $sql = " INSERT INTO application(ja_name,ja_email,ja_contact,ja_age,ja_birthday,ja_status,ja_nationality,ja_resume) VALUES ('". $ja_name ."','". $email ."','". $contact ."','". $age ."','". $birthday ."','". $status ."','". $nationality ."','". $uploadfileName ."')";
    
        $status = insertTo_DBTable($conn, $sql);
        if ($status) {
            echo "Apply successfully!<br>";
            echo '<a href="application.php">Back</a>';
        } 
        else {
            echo '<a href="application.php">Back</a>';
        }
    }
        //IF there is file
    else if (isset($_FILES["file"]) && $_FILES["file"]["error"] == UPLOAD_ERR_OK) {
        //Variable to determine for image upload is OK
        $uploadOk = 1;
        $filetmp = $_FILES["file"];

        // file
        $uploadfileName = $filetmp["name"];
        $target_file = $target_dir .
        basename($_FILES["file"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       
        // Check file size <= 488.28KB or 500000 bytes
        if ($_FILES["file"]["size"] > 20000000) {
            echo "ERROR: Sorry, your file is too large.<br>";
            $uploadOk = 0;
        }
        // Allow only these file formats
        if($imageFileType != "pdf" ) {
            echo "ERROR: Sorry, only PDF files are allowed.<br>";
            $uploadOk = 0;
        }

        //If uploadOk, then try add to database first 
        //uploadOK=1 if there is file to be uploaded, filename not exists, file size is ok and format ok
        if($uploadOk){
            $sql = " INSERT INTO application(ja_name,ja_email,ja_contact,ja_age,ja_birthday,ja_status,ja_nationality,ja_resume) VALUES ('". $ja_name ."','". $email ."','". $contact ."','". $age ."','". $birthday ."','". $status ."','". $nationality ."','". $uploadfileName ."')";
    
            $status = insertTo_DBTable($conn, $sql);
            if ($status) {
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                    //Image file successfully uploaded
                    //Tell successfull record
                    echo "Apply successfully!<br>";
                    echo '<a href="application.php">Back</a>';
                }
                else{
                    //There is an error while uploading file
                    echo "Sorry, there was an error uploading your file.<br>";
                    echo '<a href="javascript:history.back()">Back</a>';
                }
            }
            else {
                echo '<a href="javascript:history.back()">Back</a>';
            }
        }
        else{
            echo '<a href="javascript:history.back()">Back</a>';
        }


    }

function isValidPhoneNumber($contact) {
    // Add your phone number validation logic if needed
    // Example: Use a regular expression
    return preg_match('/^[0-9]{10}$/', $contact);
}

}
//close db connection
mysqli_close($conn);

//Function to insert data to database table
function insertTo_DBTable($conn, $sql){
    if (mysqli_query($conn, $sql)) {
        return true;
    } 
    else {
        echo "Error: " . $sql . " : " . mysqli_error($conn) . "<br>";
        return false;
    }
}


?>
