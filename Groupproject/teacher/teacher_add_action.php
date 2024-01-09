<?PHP
session_start();
include('../config.php');

//variables
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
    $tc_name = $_POST["tc_name"];
    $tc_email = $_POST["tc_email"];
    $tc_desc = trim($_POST["tc_desc"]);
    
    $filetmp = $_FILES["img_file"];
    //file of the image/photo file
    $uploadfileName = $filetmp["name"];

    //Upload img
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
         //Variable to determine for image upload is OK
         $uploadOk = 1;
         $filetmp = $_FILES["img_file"];
 
         //file of the image/photo file
         $uploadfileName = $filetmp["name"];
         $target_file = $target_dir .
         basename($_FILES["img_file"]["name"]);
         $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 
         // Check if file already exists
         if (file_exists($target_file)) {
             echo "ERROR: Sorry, image file $uploadfileName already exists.<br>";
             $uploadOk = 0;
         }

         // Allow only these file formats
         if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
             echo "ERROR: Sorry, only JPG, JPEG, PNG files are allowed.<br>";
             $uploadOk = 0;
         }

         //If uploadOk, then try add to database first 
         //uploadOK=1 if there is image to be uploaded, filename not exists, file size is ok and format ok
         if($uploadOk){
             $sql = "INSERT INTO teacher (tc_name, tc_desc, tc_email, tc_pic)
                 VALUES ('".$tc_name."','".$tc_desc."','".$tc_email."','". $target_file."')";
             
             $status = insertTo_DBTable($conn, $sql);
             if ($status) {
                 if (move_uploaded_file($_FILES["img_file"]["tmp_name"], $target_file)) {
                     //Image file successfully uploaded
                     //Tell successfull record
                     echo "Form data saved successfully!<br>";
                     echo '<a href="teacher.php">Back</a>';
                 }
                 else{
                     //There is an error while uploading image
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
