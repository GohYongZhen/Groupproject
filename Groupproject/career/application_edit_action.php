<?php
session_start();
include("../config.php");
$id="";
$ja_name = "";
$contact = "";
$email = "";
$age = "";
$birthday = "";
$status = "";
$nationality = "";

// for upload
$target_dir = "../uploads/"; 
$target_file = ""; 
$uploadOk = 0; 
$fileType = ""; 
$uploadfileName = "";
$old_file_path="";

// This block is called when the Submit button is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Values for add or edit
    $id=$_POST["id"];
    $ja_name = $_POST["ja_name"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $age = $_POST["age"];
    $birthday = $_POST["birthday"];
    $status = $_POST["status"];
    $nationality = $_POST["nationality"];

    $filetmp = $_FILES["file"];


        $uploadfileName = $filetmp["name"];


    
   
    // Check if there is an fileto be uploaded
    // IF no file
	

	if(isset($_FILES["file"]) && $_FILES["file"]["name"] == ""){ 
    $sql = "UPDATE application SET 
    ja_name = '$ja_name', 
    ja_contact = '$contact', 
    ja_email = '$email', 
    ja_age = '$age', 
    ja_birthday = '$birthday', 
    ja_status = '$status', 
    ja_nationality = '$nationality'
    WHERE ja_id = ". $id;

	$status = update_DBTable($conn, $sql); 

if ($status) { 
	echo "Form data updated successfully!<br>"; 
		echo '<a href="application_list.php">Back</a>'; 
		} else { 
		echo '<a href="application_list.php">Back</a>'; 
		} 
		
		} 
	//IF there is image 
	else if (isset($_FILES["file"]) && $_FILES["file"]["error"] == UPLOAD_ERR_OK) { 
	//Variable to determine for image upload is OK 
		$uploadOk = 1; 
		$filetmp = $_FILES["file"]; 
	
	//file of the image/photo file 
		$uploadfileName = $filetmp["name"]; 
		$target_file = $target_dir . 
	basename($_FILES["file"]["name"]); 
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		
		
	// Check if file already exists 
	if (file_exists($target_file)) { 
		echo "ERROR: Sorry, image file $uploadfileName already exists.<br>"; 
		$uploadOk = 0; 
		} 
		
	// Check file size <= 488.28KB or 500000 bytes 
	if ($_FILES["file"]["size"] > 2000000) { echo "ERROR: Sorry, your file is too large. Try resizing your image.<br>"; 
		$uploadOk = 0; 
	} 

	// Allow only these file formats 
	if($imageFileType != "pdf"  ) {
		echo "ERROR: Sorry, only PDF files are allowed.<br>";
		$uploadOk = 0;
		} 
		
	
//If uploadOk, then try add to database first 
//uploadOK=1 if there is image to be uploaded, filename not exists, file size is ok and format ok 
	if($uploadOk){ 
	
		
        $sql =  "DELETE FROM application WHERE ja_id=" . $id . ";";

		 $selectQuery = "SELECT ja_resume FROM application WHERE ja_id = " . $id;
            $result = mysqli_query($conn, $selectQuery);
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $file = $row['ja_resume'];

                // Delete the file from the uploads folder
                $delete_file_path = '../uploads/' . $file;

                if (!empty($file) && file_exists($delete_file_path)) {
                    if (unlink($delete_file_path)) {
                        echo "Pdf deleted successfully<br>";
                    } else {
                        echo "Error deleting pdf file<br>";
                    }
                } else {
                    echo "Pdf file not found or no pdf associated with the record<br>";
                }
            }

	
        $sql = "UPDATE application SET 
        ja_name = '$ja_name', 
        ja_contact = '$contact', 
        ja_email = '$email', 
        ja_age = '$age', 
        ja_birthday = '$birthday', 
        ja_status = '$status', 
        ja_nationality = '$nationality', 
        ja_resume = '$uploadfileName' 
        WHERE ja_id = $id";


            $status = update_DBTable($conn, $sql); 
			if ($status) { 
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) { 
                    //Image file successfully uploaded 
                    //Tell successfull record 
                    echo "Form data updated successfully!<br>"; 
                    echo '<a href="application_list.php">Back</a>'; 
                } 
                else { //There is an error while uploading image
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
}
	 


//close db connection 
mysqli_close($conn);

 //Function to insert data to database table 
 function update_DBTable($conn, $sql){ 
 if (mysqli_query($conn, $sql)) { 
 return true; } else { 
 echo "Error: " . $sql . " : " . mysqli_error($conn) . "<br>"; 
 return false; 
 } 
 } 
 ?>