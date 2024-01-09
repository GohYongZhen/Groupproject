<?PHP 
session_start();
include('../config.php');

//variables  
$id=""; 
$admin_username = ""; 
$admin_name="";
$admin_contact = ""; 
$admin_email =" ";


//this block is called when button Submit is clicked 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    //values for add or edit 
    $id=$_POST["admin_id"]; 
    $admin_name=$_POST["admin_name"];
    $admin_contact =$_POST["admin_contact"]; 
    $admin_email =$_POST["admin_email"];

    $sql = "UPDATE admin 
                SET admin_name ='$admin_name', 
                    admin_contact = '$admin_contact',
                    admin_email = '$admin_email' 
                WHERE admin_id = " . $id;

        $status = update_DBTable($conn, $sql);
        
        if (mysqli_query($conn, $sql)) {
            echo "Form data updated successfully!<br>";
            echo '<a href="admin.php">Back</a>';
        } else {
            echo "Error: " . $sql . " : " . mysqli_error($conn) . "<br>"; 
            echo '<a href="admin.php">Back</a>';
        }  
 
} 

//close db connection 
mysqli_close($conn); 

//Function to insert data to database table 
function update_DBTable($conn, $sql){ 
    if (mysqli_query($conn, $sql)) { 
        return true; 
    } 
    else { 
        echo "Error: " . $sql . " : " . mysqli_error($conn) . "<br>"; 
        return false; 
    } 
} 
?>