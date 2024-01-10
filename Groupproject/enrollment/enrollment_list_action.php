<?PHP 
session_start();
include("../config.php");
 //variables 
 $id=""; 
 $status =" "; 
 
 
 
 //this block is called when button Submit is clicked 
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //values for add or edit
    $status = $_POST['status']; 
    $id=$_POST['id'];
    
    $sql = "UPDATE enrollment SET enrol_status='$status' WHERE enrol_id = $id";


        $status = updateTo_DBTable($conn, $sql);

        if ($status) {
            echo "Status saved successfully!<br>";
            echo '<a href="enrollment_list.php">Back</a>';
        } else {
            echo '<a href="enrollment_list">Back</a>';
        }
    

 }
mysqli_close($conn); 



//Function to insert data to database table 
function updateTo_DBTable($conn, $sql){ 
if (mysqli_query($conn, $sql)) { 
return true; 
} else {
	echo "Error: " . $sql . " : " . mysqli_error($conn) . "<br>"; 
	return false; 
	}
	}
?>