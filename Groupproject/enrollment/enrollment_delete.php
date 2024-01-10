<?PHP 
include("../config.php");

//this action is called when the Delete link is clicked 
if(isset($_GET["id"]) && $_GET["id"] != ""){ 
    $id = $_GET["id"]; 
    $sql =  "DELETE FROM enrollment WHERE enrol_id=" . $id . "" ;
    // Get the image filename from the database
    $selectQuery = "SELECT child_photo FROM enrollment WHERE enrol_id = " . $id ." ";
    $result = mysqli_query($conn, $selectQuery);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $img_path = $row['child_photo'];

        // Delete the file from the uploads folder
        $delete_file_path = '../enrol_pic/' . $img_path;

        if (!empty($img_path) && file_exists($delete_file_path)) {
            if (unlink($delete_file_path)) {
                echo '<script>alert("File deleted successfully");</script>';
            } else {
                echo '<script>alert("Error deleting file");</script>';
            }
        } else {
            echo '<script>alert("File not found");</script>';
        }
    }

    echo $sql . "<br>";
    if (mysqli_query($conn, $sql)) { 
        echo '<script>alert("Record deleted successfully");</script>';
        echo '<script>window.location.href="enrollment_list.php";</script>';
    }
    echo '<script>alert("Error deleting record: ' . mysqli_error($conn) . '");</script>';
    echo '<script>window.location.href="enrollment_list.php";</script>';
}

mysqli_close($conn); 
?>