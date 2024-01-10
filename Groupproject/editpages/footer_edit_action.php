<?php
session_start();
//database connection
include("../config.php");


//variables  
$id = ""; 
$footer_email = ""; 
$footer_phoneNumber="";
$footer_address = ""; 

//this block is called when button Submit is clicked 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    //values for add or edit 
    $id=$_POST["ft_id"]; 
    $footer_email=$_POST["email"];
    $footer_phoneNumber =$_POST["phoneNumber"]; 
    $footer_address =$_POST["address"];

    $sql = "UPDATE footer 
                SET email ='$footer_email', 
                    phoneNumber = '$footer_phoneNumber',
                    address = '$footer_address' 
                WHERE ft_id = " . $id;

        $status = update_DBTable($conn, $sql);
        
        if (mysqli_query($conn, $sql)) {
            echo "Form data updated successfully!<br>";
            echo '<a href="editpages.php">Back</a>';
        } else {
            echo "Error: " . $sql . " : " . mysqli_error($conn) . "<br>"; 
            echo '<a href="editpages.php">Back</a>';
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