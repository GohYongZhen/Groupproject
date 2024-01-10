<?PHP
session_start();
include('../config.php');

//variables
$faci_name="";
$faci_desc = "";
$faci_photo = "";

//for upload
$target_dir = "../facility/img/";
$target_file = "";
$uploadOk = 0;
$imageFileType = "";
$uploadfileName = "";

//this block is called when button Submit is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Directory on the server to store the uploaded image
    

    // Get other form data
    $faci_name = $_POST["faci_name"];
    $faci_desc = trim($_POST["faci_desc"]);

    // File details from the uploaded file
    $file_tmp = $_FILES["img_file"]["tmp_name"];
    $file_name = basename($_FILES["img_file"]["name"]);
    $target_file = $target_dir . $file_name;

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "ERROR: Sorry, image file $file_name already exists.<br>";
        echo '<a href="facility.php">Back</a>';
    } else {
        // Move the uploaded file to the target directory
        if (move_uploaded_file($file_tmp, $target_file)) {
            // File uploaded successfully, now insert into database
            $sql = "INSERT INTO facilities (faci_name, faci_desc, faci_photo)
                VALUES ('$faci_name', '$faci_desc', '$file_name')";

            // Execute the SQL query to insert into the database
            $status = insertTo_DBTable($conn, $sql);

            if ($status) {
                // Database insertion successful
                echo "Form data saved successfully!<br>";
                echo '<a href="facility.php">Back</a>';
            } else {
                // Database insertion failed
                echo "Failed to save data to the database.<br>";
                echo '<a href="javascript:history.back()">Back</a>';
            }
        } else {
            // Error moving the file
            echo "Sorry, there was an error uploading your file.<br>";
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
