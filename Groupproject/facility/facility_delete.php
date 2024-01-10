<?PHP 
session_start();
include('../config.php'); 

//this action is called when the Delete link is clicked 
if(isset($_GET["id"]) && $_GET["id"] != ""){ 
    $id = $_GET["id"]; 
    $sql =  "DELETE FROM facilities WHERE faci_id=" . $id . ";";

    // Get the image filename from the database
    $selectQuery = "SELECT faci_photo FROM facilities WHERE faci_id = " . $id;
    $result = mysqli_query($conn, $selectQuery);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $img_path = $row['faci_photo'];

        // Delete the file from the uploads folder
        $delete_file_path = './img/' .$img_path;

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
    
    echo $sql . "<br>";
    if (mysqli_query($conn, $sql)) { 
        echo "Record deleted successfully<br>"; 
        echo '<a href="facility.php">Back</a>';

    } 
    else { 
        echo "Error deleting record: " . mysqli_error($conn) . "<br>"; 
        echo '<a href="facility.php">Back</a>'; 
    } 
} 
mysqli_close($conn); 
?>