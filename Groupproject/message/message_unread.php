<?PHP 
session_start();
include('../config.php'); 

//this action is called when the Delete link is clicked 
if(isset($_GET["id"]) && $_GET["id"] != ""){ 
    $id = $_GET["id"]; 
    $sql = "UPDATE message SET mess_status=0 WHERE mess_id=". $_GET["id"];
    mysqli_query($conn, $sql);
} 
mysqli_close($conn); 
?>