<?PHP
session_start();
include('../config.php');


//variables
$id="";
$tc_name="";
$tc_email="";
$tc_desc = "";
$tc_pic = "";

//for upload
$target_dir = "img/";
$target_file = "";
$uploadOk = 0;
$imageFileType = "";
$uploadfileName = "";

//this block is called when button Submit is clicked 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    //values for add or edit 
    $id=$_POST["teacher_id"];
    $tc_name = $_POST["tc_name"];
    $tc_email = $_POST["tc_email"];
    $tc_desc = trim($_POST["tc_desc"]);

    $filetmp = $_FILES["img_file"]; 
    //file of the image/photo file 
    $uploadfileName = $filetmp["name"]; 
    //Check if there is an image to be uploaded 
    //IF no image 
    if(isset($_FILES["img_file"]) && $_FILES["img_file"]["name"] == ""){ 
        $sql = "UPDATE teacher SET 
            tc_name= '$tc_name', 
            tc_desc = '$tc_desc', 
            tc_email = '$tc_email' 
            WHERE teacher_id = ". $id; 
            
            $status = update_DBTable($conn, $sql); 
        
        if ($status) { 
            echo "Form data updated successfully!<br>"; 
            echo '<a href="teacher.php">Back</a>'; 
        } 
        else { 
            echo '<a href="teacher.php">Back</a>'; 
        } 
    } 
    //IF there is image 
    else if (isset($_FILES["img_file"]) && $_FILES["img_file"]["error"] == UPLOAD_ERR_OK) { 
        //Variable to determine for image upload is OK 
        $uploadOk = 1; 
        $filetmp = $_FILES["img_file"]; 
        
        //file of the image/photo file 
        $uploadfileName = $filetmp["name"]; 
        $target_file = $target_dir . basename($_FILES["img_file"]["name"]); 
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if file already exists 
        if (file_exists($target_file)) { 
            echo "ERROR: Sorry, image file $uploadfileName already exists.<br>"; 
            $uploadOk = 0; 
        } 
        // Check file size <= 488.28KB or 500000 bytes 
        if ($_FILES["img_file"]["size"] > 500000) { 
            echo "ERROR: Sorry, your file is too large. Try resizing your image.<br>"; 
            $uploadOk = 0; 
        } 
        // Allow only these file formats 
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) { 
            echo "ERROR: Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>"; 
            $uploadOk = 0; 
        } 
        //If uploadOk, then try add to database first 
        //uploadOK=1 if there is image to be uploaded, filename not exists, file size is ok and format ok 
        if($uploadOk){ 
            

            $sql =  "DELETE FROM teacher WHERE teacher_id=" . $id . ";";

            // Get the image filename from the database
            $selectQuery = "SELECT tc_pic FROM teacher WHERE teacher_id = " . $id;
            $result = mysqli_query($conn, $selectQuery);
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $img_path = $row['tc_pic'];

                // Delete the file from the uploads folder
                $delete_file_path = 'img/'. $img_path;

                if (!empty($img_path) && file_exists($delete_file_path)) {
                    if (unlink($delete_file_path)) {
                        echo "Image deleted successfully<br>";
                    } else {
                        echo "Error deleting image file<br>";
                    }
                } else {
                    echo "Image file not found or no image associated with the record<br>";
                }
            }


            $sql = "UPDATE teacher SET 
            tc_name= '$tc_name', 
            tc_desc = '$tc_desc', 
            tc_email = '$tc_email',
            tc_pic = '$uploadfileName' 
            WHERE teacher_id = ". $id; 
            $status = update_DBTable($conn, $sql); 

            $status = update_DBTable($conn, $sql); if ($status) { 
                if (move_uploaded_file($_FILES["img_file"]["tmp_name"], $target_file)) { 
                    //Image file successfully uploaded 
                    //Tell successfull record 
                    echo "Form data updated successfully!<br>"; 
                    echo '<a href="teacher.php">Back</a>'; 
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
    if (mysqli_query($conn, $sql)) { return true; } 
    else { echo "Error: " . $sql . " : " . mysqli_error($conn) . "<br>"; return false; } 
} 
?>