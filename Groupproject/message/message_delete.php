<?PHP 
session_start();
include('../config.php'); 

//this action is called when the Delete link is clicked 
if(isset($_GET["id"]) && $_GET["id"] != ""){ 
    $id = $_GET["id"]; 
    $sql =  "DELETE FROM message WHERE mess_id=" . $id . ";";
    
    echo $sql . "<br>";
    if (mysqli_query($conn, $sql)) { 
        echo "Record deleted successfully<br>"; 
        echo '<a href="message.php">Back</a>';

    } 
    else { 
        echo "Error deleting record: " . mysqli_error($conn) . "<br>"; 
        echo '<a href="message.php">Back</a>'; 
    } 
} 
mysqli_close($conn); 
?>