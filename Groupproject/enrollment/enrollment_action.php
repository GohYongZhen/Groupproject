<?PHP
session_start();
include('config.php');

//variables
$father_name="";
$mother_name="";
$parent_contact="";
$parent_email="";
$child_name="";
$age="";
$program="";
$message="";
$child_birthday="";

//for upload
$target_dir = "enrol/";
$target_file = "";
$uploadOk = 0;
$imageFileType = "";
$uploadfileName = "";

//this block is called when button Submit is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //values for add or edit
    $father_name = $_POST["father_name"];
    $mother_name = $_POST["mother_name"];
    $parent_contact = $_POST["parent_contact"];
    $parent_email = $_POST["parent_email"];
    $child_name = $_POST["child_name"];
    $age = $_POST["age"];
    $program = $_POST["program"];
    $message = $_POST["message"];
    $child_birthday = $_POST["child_birthday"];
    
    $filetmp = $_FILES["child_photo"];

    //file of the image/photo file
    $uploadfileName = $filetmp["name"];

    //Check if there is an image to be uploaded
    //IF no image
    if(isset($_FILES["child_photo"]) && $_FILES["child_photo"]["name"] == ""){
       
       $sql ="INSERT INTO enrollment(father_name, mother_name, parent_contact,parent_email, child_name, age, program, message, child_photo, child_birthday) 
        VALUES (
            '$father_name', 
            '$mother_name', 
            '$parent_contact', 
            '$parent_email', 
            '$child_name',
            '$age',
            '$program', 
            '$message', 
            '$uploadfileName', 
            '$child_birthday')";

        $status = insertTo_DBTable($conn, $sql);
        if ($status) {
            echo "Form data saved successfully!<br>";
            echo '<a href="enrollment.php">Back</a>';
        } 
        else {
            echo '<a href="enrollment.php">Back</a>';
        }
    }
        //IF there is image
    else if (isset($_FILES["child_photo"]) && $_FILES["child_photo"]["error"] == UPLOAD_ERR_OK) {
        //Variable to determine for image upload is OK
        $uploadOk = 1;
        $filetmp = $_FILES["child_photo"];

        //file of the image/photo file
        $uploadfileName = $filetmp["name"];
        $target_file = $target_dir .
        basename($_FILES["child_photo"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "ERROR: Sorry, image file $uploadfileName already exists.<br>";
            $uploadOk = 0;
        }
        // Check file size <= 488.28KB or 500000 bytes
        if ($_FILES["child_photo"]["size"] > 500000) {
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
            $sql ="INSERT INTO enrollment(father_name, mother_name, parent_contact,parent_email, child_name, age, program, message, child_photo, child_birthday) 
        VALUES (
            '$father_name', 
            '$mother_name', 
            '$parent_contact', 
            '$parent_email', 
            '$child_name',
            '$age',
            '$program', 
            '$message', 
            '$uploadfileName', 
            '$child_birthday')";


            $status = insertTo_DBTable($conn, $sql);
            if ($status) {
                if (move_uploaded_file($_FILES["child_photo"]["tmp_name"], $target_file)) {
                    //Image file successfully uploaded
                    //Tell successfull record
                    echo "Form data saved successfully!<br>";
                    echo '<a href="enrollment.php">Back</a>';
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

    // If invalid, you can redirect back to the form with an error message
if (!isValidEmail($email) || !isValidPhoneNumber($phone)) {
    header("Location: form.php?error=1");
    exit();
}

// Continue processing if validation passes

function isValidEmail($email) {
    // Use PHP's filter_var for email validation
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function isValidPhoneNumber($phone) {
    // Add your phone number validation logic if needed
    // Example: Use a regular expression
    return preg_match('/^[0-9]{10}$/', $phone);
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
