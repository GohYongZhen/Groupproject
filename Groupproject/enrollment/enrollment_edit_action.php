</br><?php
include('config.php');
$id="";
$father_name="";
$mother_name="";
$parent_contact="";
$parent_email="";
$child_name="";
$age="";
$program="";
$message="";
$child_birthday="";


// for upload
$target_dir = "uploads/"; 
$target_file = ""; 
$uploadOk = 0; 
$fileType = ""; 
$uploadfileName = "";
$old_file_path="";

// This block is called when the Submit button is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Values for add or edit
    $id=$_POST["id"];
    $father_name =$_POST["father_name"];
    $mother_name =$_POST["mother_name"];
    $parent_contact = $_POST["parent_contact"];
    $parent_email = $_POST["parent_email"];
    $child_name = $_POST["child_name"];
    $age = $_POST["age"];
    $program = $_POST["program"];
    $message = $_POST["message"];
    $child_birthday = $_POST["child_birthday"];
    $filetmp = $_FILES["file"];


    $uploadfileName = $filetmp["name"];

    echo $id;
    
   
    // Check if there is an fileto be uploaded
    // IF no file
	

	if(isset($_FILES["file"]) && $_FILES["file"]["name"] == ""){ 
        $sql = "UPDATE enrollment SET
    father_name = '$father_name',
    mother_name = '$mother_name',
    parent_contact = '$parent_contact',
    parent_email = '$parent_email',
    child_name = '$child_name',
    age = '$age',
    program = '$program',
    message = '$message',
    child_birthday = '$child_birthday'
   
    WHERE enrol_id = $id";
     
     echo $sql;

	$status = update_DBTable($conn, $sql); 

if ($status) { 
	echo "Form data updated successfully!<br>"; 
		echo '<a href="enrollment_list.php">Back</a>'; 
		} else { 
		echo '<a href="enrollment_list.php">Back</a>'; 
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
       
    
        $sql = "UPDATE enrollment SET
    father_name = '$father_name',
    mother_name = '$mother_name',
    parent_contact = '$parent_contact',
    parent_email = '$parent_email',
    child_name = '$child_name',
    age = '$age',
    program = '$program',
    message = '$message',
    child_birthday = '$child_birthday',
    child_photo = '$uploadfileName'
    WHERE enrol_id = $id";

     
    echo $sql;
    
		$status = update_DBTable($conn, $sql); 
		
		if ($status) { 
			if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {

			//Image file successfully uploaded 
			
			//Tell successfull record 
			echo "Form data updated successfully!<br>"; 
			echo '<a href="enrollment_list.php">Back</a>'; 
			} 
			
			else{ 
			
		//There is an error while uploading image
		echo "Sorry, there was an error uploading your file.<br>"; 
		echo '<a 
		href="javascript:history.back()">Back</a>'; 
		} 
		} 
		else { 
		echo '<a href="javascript:history.back()">Back</a>'; 
		} 
		} 
		else{ 
		echo '<a href="javascript:history.back()">Back</a>'; 
		}
	 


$target_file = realpath($target_dir) . '/' . basename($_FILES["file"]["name"]);

if (file_exists($target_file) && is_writable($target_file)) {
    // Proceed with update or delete operations
} else {
    echo "Error: File not found or insufficient permissions.";
}

// Delete the old image file
if (file_exists($old_file_path)) {
    unlink($old_file_path);
}

if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    // Image file successfully uploaded
    echo "Form data updated successfully!<br>";
    echo '<a href="application_list.php">Back</a>';
} else {
    // There is an error while uploading image
    echo "Sorry, there was an error uploading your file.<br>";
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